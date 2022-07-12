# Morningtrain\WP\PluginUpdater

Make it possible to update a plugin through a private plugin repo.

## Getting started

To get started with the module simply register with `\Morningtrain\WP\PluginUpdater\PluginUpdater::register()`;

### Example

```php
// plugin.php
require __DIR__ . "/vendor/autoload.php";

use Morningtrain\WP\Core\Plugin;

$plugin = Plugin::init();

// Add our module
$plguin->addModule(new \Morningtrain\WP\PluginUpdater\Module('https://plugins.morningtrain.dk/mtt-plugin-repository/[UNIQUE_TOKEN]/plugin-info/'));
```