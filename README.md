# jet-paginate

## Usage

1. Download this Zip.
1. Upload the Zip to your Plugins in the Dashboard
1. Activate the plugin
1. Use the following shorttags conventions. There are also some optional parameters to change the "Next" and "Prev" texts on the nav links.
```
[jet-paginate]
  Page 1 blah blah blah
  [jet-page]
  Page 2 blah blah blah
[/jet-paginate]

[jet-paginate next="Continue" prev="Go back"]
  Page 1 blah blah blah
  [jet-page]
  Page 2 blah blah blah
[/jet-paginate]
```
## Additional Notes
 * You'll need to use the 'Excerpt' feature in your posts, or else the default excerpt appears blank (because you've wrapped your content in a shortcode that the default excerpt process ignores).
