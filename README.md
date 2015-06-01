# Organicity WordPress Theme Installation

1. Set the `SCRIPT_DEBUG` constant at the top of `/organicity/functions.php` to `false` for production:
```define( 'SCRIPT_DEBUG', false );```

2. Copy the `organicity` directory in this project to the `/wp-content/themes/` folder of your WordPress install. Run the shell command `grunt` in the project root before copying to ensure the latest versions of the JS and CSS files have been concatenated and minified.

3. You can remove the `_src/` directory from the copied theme folder if you wish as this contains the unminified js and sass files and won't be used by the active theme.

4. Login to the WordPress dashboard, navigate to `Appearance > Themes` and activate the Organicity theme.

5. In the dashboard navigate to `Settings > Permalinks` and select 'Custom structure' as the permalink style. In the adjacent text field enter `/blog/%postname%/` and click 'Save Changes'.
*Custom permalinks require the `mod_rewrite` module to be active in Apache. On Nginx servers you may need to modify your config file, see [this link](https://wordpress.org/support/topic/wordpress-permalinks-on-nginx) for more details.*

6. This theme requires the [Meta Box plugin](http://metabox.io/). In the dashboard navigate to `Plugins > Add New` and search for 'meta box'. Install the plugin named Meta Box (by Rilwis) and click 'Activate Plugin' once it has downloaded.

7. Create 4 pages named 'About', 'Blog', 'Contact' and 'Home'. Navigate to `Settings > Reading` and select the 'A static page' option for the 'Front page displays' setting. In the dropdowns set 'Front page' to the 'Home' page you created and 'Posts page' to 'Blog'.

8. In `Appearance > Menus` create a new menu called 'header' and assign the following pages (and a custom link to `/events`) in the order shown below and select 'Header menu' for the 'Theme locations' setting at the bottom of the panel.
![menu setup screenshot](/organicity_readme_menus.png)

9. The Organicity theme adds a custom settings panel in `Settings > Social media`. Here you can add the URLs to the different social media pages for the project. The icon links in the site footer will use these settings.
