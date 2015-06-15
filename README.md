# Chill Mode for Wordpress
Simple Wordpress maintenance mode plugin with custom message display. Just add water and activate.
- Requires at least: WordPress 3.5
- Tested up to: WordPress 4.2.2
- Current version: 0.2

## Features
- No extra settings, just activate it, do maintenance work, deactivate it.
- Admin interface to add custom page title, heading, message, styling, and scripts.
- Multisite support
- Alert message in the backend, when the plugin is active.
- Support for the following cache plugins: Cachify, Super Cache and W3 Total Cache.
- Sends HTTP response status code 503 Service Unavailable, especially relevant for search engines.

## Notes

If you want to change the layout of the template or simply just add more to it, edit the `template.php` file.

---
Originally built off the Slim Maintenance Mode plugin developed by [Johannes Ries](https://github.com/wpdocde/slim-maintenance-mode).
Admin interface and custom template functionality by [Ryan Gordon](http://supryan.com).