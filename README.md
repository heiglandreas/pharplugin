# PHAR-Plugin

A plugin for composer to handle PHAR-dependencies for your project

The idea is to be able to do a `composer require --dev --prefer-bin vendor/tool` that will then install the phar-file of vendor/tool 
instead of installing the source-version and resolving all the dependencies and - most probably - running into dependency-errors due to 
that tool.

The tool will add an additional `--prefer-bin` switch to the `require`-command that will only work in conjunction with the `--dev` switch.

By default the tool will try to resolve the path to the binary using the required tag as well as the name of the binary given in the `bin`-entry of the tools composer.json and then we try to resolve that to a path based on the repository. Additionally there will be a way to identify the path to binaries using a configuration option within the tools composer.json-file.

## Current Status

Pre-Alpha!!!

We are looking forward to contributions!
