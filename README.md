# jet-paginate

## Purpose

This plugin lets you mark up snippets of a single page's content to be paginated, so that you can link to a single page and provide next/previous // back/forward navigation within your page content without having to create separate pages to do so or use more complicated programming under the hood.

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
