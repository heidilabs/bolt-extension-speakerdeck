<?php
// SpeakerDeck Extension for Bolt, by erikaheidi

namespace SpeakerDeck;

class Extension extends \Bolt\BaseExtension
{

    /**
     * Info block for SpeakerDeck Extension.
     */
    function info()
    {
        $data = array(
            'name' => "SpeakerDeck",
            'description' => "An extension to easily add SpeakerDeck presentations",
            'keywords' => "speakerdeck, slides, presentations, talks",
            'author' => "erikaheidi",
            'link' => "http://erikaheidi.com",
            'version' => "0.1",
            'required_bolt_version' => "1.4",
            'highest_bolt_version' => "1.4",
            'type' => "General",
            'first_releasedate' => "2014-04-01",
            'latest_releasedate' => "2014-04-01",
            'dependencies' => "",
            'priority' => 10
        );

        return $data;

    }

    /**
     * Initialize SpeakerDeck. Called during bootstrap phase.
     */
    function initialize()
    {
        // If your extension has a 'config.yml', it is automatically loaded.
        // $foo = $this->config['bar'];

        // Initialize the Twig function
        $this->addTwigFunction('speakerdeck', 'twigSpeakerdeck');

    }


    /**
     * Twig function {{ speakerdeck('url') }} in SpeakerDeck extension.
     */
    function twigSpeakerdeck($deckUrl = "")
    {
        if(!filter_var($deckUrl, FILTER_VALIDATE_URL))
        {
            return 0;
        }

        $deck = $this->fetchOembed($deckUrl);

        $html = "";

        if ($deck) {
            $content = json_decode($deck, 1);
            $html = $content['html'];
        } else {
            $html = '<a href="' . $deckUrl . '">' . $deckUrl . '</a>';
        }

        return new \Twig_Markup($html, 'UTF-8');

    }

    private function fetchOembed($url)
    {
        $url = "http://speakerdeck.com/oembed.json?url=$url";
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);

        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }
}


