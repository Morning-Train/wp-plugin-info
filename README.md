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

To get started just construct an instance of `\Morningtrain\WP\PluginInfo\PluginInfo`;

```php
// plugin.php
require __DIR__ . "/vendor/autoload.php";

$plugin_info = new \Morningtrain\WP\PluginUpdater\PluginInfo(__FILE__);
```

### Retrieve Information

| Function             | Example                                    | Description                                           |
|----------------------|--------------------------------------------|-------------------------------------------------------|
| getRoot              | `$plugin_info->getRoot()`                  | Get root path for the plugin                          |
| getData              | `$plugin_info->getData('Name', 'Default')` | Get data from plugins data                            |
| getBaseName          | `$plugin_info->getBaseName()`              | Base name of plugin ex. "plugin-name/plugin-name.php" |
| getName              | `$plugin_info->getName()`                  | Get name of plugin                                    |
| getTextDomain        | `$plugin_info->getTextDomain()`            | Get textdomain of plugin                              |
| getVersion           | `$plugin_info->getVersion()`               | Get version of plugin                                 |
| getDomainPath        | `$plugin_info->getDomainPath()`            | Get Translations path                                 |
| getRequiresWPVersion | `$plugin_info->getRequiresWPVersion()`     | Get which WordPress version is required at least      |
| getRequiresWPVersion | `$plugin_info->getRequiresPHPVersion()`    | Get which PHP version is required at least            |

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
