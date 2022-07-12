# Morningtrain\WP\PluginInfo

Make it easy to get information about a plugin.

## Getting started

To get started just construct an instance of `\Morningtrain\WP\PluginInfo\PluginInfo`;

### Example

```php
// plugin.php
require __DIR__ . "/vendor/autoload.php";

$plugin_info = new \Morningtrain\WP\PluginUpdater\PluginInfo(__FILE__);
```