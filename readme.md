# SpeakerDeck

SpeakerDeck is a Bolt extension created to easily add SpeakerDeck presentation embeds. It will enable a new Twig function:

{{ speakerdeck('deck_url') }}

### Oembed

This extension makes a request to `http://speakerdeck.com/oembed.json` in order to get information about the deck,
returning the **html** field from the json object, which contains the embed code for that presentation with the default width and height from the slides.

This initial version does not need any configuration, but in the future we might add some options to specify the embed size amongst other things.