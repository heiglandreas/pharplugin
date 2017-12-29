# PHAR-Plugin

A plugin for composer to handle PHAR-dependencies for your project

> This plugin only affects DEV-dependencies!

The idea is to be able to do a `composer require --dev vendor/tool` that will then install the phar-file of vendor/tool 
instead of installing the source-version and resolving all the dependencies and - most probably - running into dependency-errors due to 
that tool.

This plugin tool will try to install *all* dev-dependencies as Phar-package. When
no PHAR can be found it will fall back to the default installation way.

By default the tool will try to resolve the path to the binary using the required 
tag as well as the name of the binary given in the `bin`-entry of the tools 
composer.json and then we try to resolve that to a path based on the repository.
Additionally there will be a way to identify the path to binaries using a 
configuration option within the tools composer.json-file.

## Current Status

Pre-Alpha!!!

We are looking forward to contributions!


## Installation

Well, how can I say: 

```bash
composer require --dev org_heigl/pharplugin
```

## Usage

after installation the plugin works in the background.

Though there will be some configuration-options.

At the moment you will need to add them within the `config`-section like this:

```json
{
  "config" : {
    "phar-plugin" : {
      "exclude-packages" : [
        "namespace/package"
      ]
    }
  }
}
```
