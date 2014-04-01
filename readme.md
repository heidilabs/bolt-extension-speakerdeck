# SpeakerDeck

SpeakerDeck is a Bolt extension created to easily add SpeakerDeck presentation embeds. It will enable a new Twig function:

{{ speakerdeck('deck_url') }}

### Oembed

This extension makes a request to `http://speakerdeck.com/oembed.json` in order to get information about the deck,
returning the **html** field from the json object, which contains the embed code for that presentation with the default width (normally 710px) and height (proportional) from the slides.

This initial version does not need any configuration, but in the future we might add some options to specify the embed size amongst other things.

### Demo

I'm using this extension in my talk entries, as shown in here: [http://www.erikaheidi.com/talk/devfest-women-istanbul-getting-started-with-vagrant](http://www.erikaheidi.com/talk/devfest-women-istanbul-getting-started-with-vagrant) .