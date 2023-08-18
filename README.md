# Morningtrain\WP\PluginInfo

Get information information about a plugin, based on the plugin file.

## Table of Contents

- [Introduction](#introduction)
- [Getting Started](#getting-started)
  - [Installation](#installation)
- [Usage](#usage)
  - [Initialize](#initialize)
  - [Retrieve Information](#retrieve-information)
- [Contributing](#contributing)
- [Contributors](#contributors)
- [Testing](#testing)
- [License](#license)


## Introduction

Get information information about a plugin, based on the plugin file.

## Getting Started

To get started install the package as described below in [Installation](#installation).

To use the tool have a look at [Usage](#usage)

### Installation

Install with composer

```bash
composer require morningtrain/wp-plugin-info
```

## Usage

### Initialize

To get started register a plugin file;

```php
// plugin.php
require __DIR__ . "/vendor/autoload.php";

$plugin_info = Morningtrain\WP\PluginUpdater\PluginInfo::register(__FILE__);
```

### Set Slug
You can set a slug by setting `Plugin Slug` header in the plugin header.
Alternatively you can set the slug with the `setSlug` method on the `PluginInfo` instance.
This is useful get the information about your plugin later.


### Set a named path
You can set a named path, that you can use to get the path later. It must be an absolute path. You can set a path in the plugin folder or any other place.

```php
$plugin_info->setNamedPath('app', __DIR__ . '/app');
$plugin_info->setNamedPath('logs', WP_CONTENT_DIR . '/logs');
```

### Set a named URL
You can set a named URL, that you can use to get the URL later. It must be an absolute URL. You can set a URL in the plugin folder or any other place.

```php
$plugin_info->setNamedUrl('images', $plugin_info->getRootUrl() . 'public/iamges');
$plugin_info->setNamedUrl('invoices', content_url('private/invoices'));
```

### Set a named Parameter
You can set a named parameter, that you can use to get the parameter later. You can set anything with relevance to your plugin.

```php
$plugin_info->setNamedParameter('license', $license);
```


### Retrieve a PluginInfo instance
You can retrieve a PluginInfo instance by using the `get` method on the `PluginInfo` class.

```php
$plugin_info = Morningtrain\WP\PluginUpdater\PluginInfo::get('pluginSlug');
```

### Retrieve Information

| Function             | Example                                            | Description                                           |
|----------------------|----------------------------------------------------|-------------------------------------------------------|
| getData              | `$plugin_info->getData('Name', 'Default')`         | Get data from plugins data                            |
| getNamedPath         | `$plugin_info->getNamedPath('pathName')`           | Get named path                                        |
| getNamedUrl          | `$plugin_info->getNamedUrl('urlName')`             | Get named URL                                         |
| getNamedParameter    | `$plugin_info->getNamedParameter('parameterName')` | Get named parameter                                   |
| getRoot              | `$plugin_info->getRoot()`                          | Get root path for the plugin                          |
| getRootUrl           | `$plugin_info->getRootUrl()`                       | Get root URL for the plugin                           |
| getPluginFilePath    | `$plugin_info->getPluginFilePath()`                | Get path to plugin file                               |
| getBaseName          | `$plugin_info->getBaseName()`                      | Base name of plugin ex. "plugin-name/plugin-name.php" |
| getSlug              | `$plugin_info->getSlug()`                          | Get slug of plugin                                    |
| getName              | `$plugin_info->getName()`                          | Get name of plugin                                    |
| getPluginURI         | `$plugin_info->getPluginURI()`                     | Get plugin URI                                        |
| getVersion           | `$plugin_info->getVersion()`                       | Get version of plugin                                 |
| getDescription       | `$plugin_info->getDescription()`                   | Get description of plugin                             |
| getAuthor            | `$plugin_info->getAuthor()`                        | Get author of plugin - Formatted as link              |
| getAuthorURI         | `$plugin_info->getAuthorURI()`                     | Get author URI                                        |
| getTextDomain        | `$plugin_info->getTextDomain()`                    | Get textdomain of plugin                              |
| getDomainPath        | `$plugin_info->getDomainPath()`                    | Get Translations path                                 |
| getRequiresWPVersion | `$plugin_info->getRequiresWPVersion()`             | Get which WordPress version is required at least      |
| getRequiresWPVersion | `$plugin_info->getRequiresPHPVersion()`            | Get which PHP version is required at least            |
| getUpdateURI         | `$plugin_info->getUpdateURI()`                     | Get update URI                                        |
| getTitle             | `$plugin_info->getTitle()`                         | Get title of plugin                                   |
| getAuthorName        | `$plugin_info->getAuthorName()`                    | Get author of plugin - Formatted as text              |

## Contributing

Thank you for your interest in contributing to the project.

### Bug Report

If you found a bug, we encourage you to make a pull request.

To add a bug report, create a new issue. Please remember to add a telling title, detailed description and how to reproduce the problem.

### Support Questions

We do not provide support for this package.

### Pull Requests

1. Fork the Project
2. Create your Feature Branch (git checkout -b feature/AmazingFeature)
3. Commit your Changes (git commit -m 'Add some AmazingFeature')
4. Push to the Branch (git push origin feature/AmazingFeature)
5. Open a Pull Request

## Contributors

- [Martin Schadegg Brønniche](https://github.com/mschadegg)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.


---

<div align="center">
Developed by <br>
</div>
<br>
<div align="center">
<a href="https://morningtrain.dk" target="_blank">
<img src="https://morningtrain.dk/wp-content/themes/mtt-wordpress-theme/assets/img/logo-only-text.svg" width="200" alt="Morningtrain logo">
</a>
</div>
