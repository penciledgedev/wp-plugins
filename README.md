# wp-plugins
WP free plugins
# Custom Title Post Display Plugin

**Version:** 1.3

## Description
The Custom Title Post Display plugin is a WordPress plugin that allows you to display a custom title, button, and a single post from a specified category or tag using a shortcode. The plugin is highly customizable with various attributes to suit your needs.

## Installation
1. Download the plugin folder and upload it to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.

## Usage
To use the plugin, you can embed the shortcode `[custom_title_post]` on any post or page in WordPress.

### Shortcode Attributes
The shortcode accepts the following attributes to customize the display:

- `category_or_tag` (optional): Specify the category or tag to retrieve posts from.
  - Example: `category_or_tag="beauty"`
- `title` (optional): Customize the title displayed above the post.
  - Default: "Default Title"
  - Example: `title="Explore Beauty"`
- `show_title` (optional): Show or hide the title. Use `true` or `false`.
  - Default: `true`
  - Example: `show_title="false"`
- `show_buttons` (optional): Show or hide buttons below the title. Use `true` or `false`.
  - Default: `true`
  - Example: `show_buttons="false"`
- `offset` (optional): Offset the posts fetched by a specific number.
  - Default: `0`
  - Example: `offset="3"` (to skip the first 3 posts in the specified category or tag)

### Example Usage
1. Display the latest post from the "beauty" category with a custom title:
   ```
   [custom_title_post category_or_tag="beauty" title="Explore Beauty"]
   ```

2. Display the second latest post from the "lifestyle" category without a title or buttons:
   ```
   [custom_title_post category_or_tag="lifestyle" show_title="false" show_buttons="false" offset="1"]
   ```

## Features
- Displays a post from a specified category or tag with an optional title and buttons.
- Customizable via shortcode attributes.
- Supports multiple instances on the same page without conflicts.
- Responsive design that adapts to different screen sizes.
- Image hover effect that adds a subtle highlight.

## Notes
- The plugin uses unique CSS classes for each shortcode instance to prevent conflicts.
- It is recommended to clear the page cache after adding or updating the shortcode to see changes immediately.

## Troubleshooting
- **Title/Buttons Not Hiding Properly**: Ensure you are using `true` or `false` (as a string) for `show_title` and `show_buttons` attributes.
- **Overlapping Styles**: If other CSS from your theme is affecting the appearance, inspect the unique CSS classes in the browser developer tools and adjust accordingly.

## Changelog
**Version 1.3**
- Added unique CSS classes for each shortcode instance to prevent conflicts.
- Added the ability to offset posts using the `offset` attribute.
- Improved mobile responsiveness and CSS structure for better consistency.

## Author
- **Uyi Moses**  
  [https://uyimoses.com](https://uyimoses.com)