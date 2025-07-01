<?php

/**
 * Plugin Name: Opkey Custom Elements
 * Description: Opkey custom elements created with Element Studio.
 * Author: creens
 * Text Domain: opkey
 * Domain Path: /languages/
 * Version: 0.0.1
 */

namespace OpkeyCustomElements;

use function Breakdance\Util\getDirectoryPathRelativeToPluginFolder;

add_action('breakdance_loaded', function () {
    \Breakdance\ElementStudio\registerSaveLocation(
        getDirectoryPathRelativeToPluginFolder(__DIR__) . '/elements',
        'OpkeyCustomElements',
        'element',
        'Custom Elements',
        false
    );

    \Breakdance\ElementStudio\registerSaveLocation(
        getDirectoryPathRelativeToPluginFolder(__DIR__) . '/macros',
        'OpkeyCustomElements',
        'macro',
        'Custom Macros',
        false,
    );

    \Breakdance\ElementStudio\registerSaveLocation(
        getDirectoryPathRelativeToPluginFolder(__DIR__) . '/presets',
        'OpkeyCustomElements',
        'preset',
        'Custom Presets',
        false,
    );
},
    // register elements before loading them
    9
);