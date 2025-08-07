<?php

/**
 * Plugin Name: Opkey Custom Elements
 * Description: Opkey custom elements created with Element Studio.
 * Author: creens
 * Text Domain: opkey
 * Domain Path: /languages/
 * Version: 1.0.0
 */

namespace OpkeyCustomElements;

if ( ! defined( 'OPKEY_ELEMENTS_URL' ) ) {
    define( 'OPKEY_ELEMENTS_URL', plugin_dir_url( __FILE__ ) );
}

/**
 * A single source of truth for our shared content defaults.
 */
function getSharedDefaults(): array
{
    return [
        'eyebrow' => [ 'text' => 'Lorem ipsum dolor' ],
        'heading' => [ 'text' => 'Lorem ipsum dolor sit amet' ],
        'subhead' => [ 'text' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit' ],
        'content' => [ 'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.' ],
        'buttons' => [
            'primary_button'   => [ 'text'=>'Contact sales', 'link'=>'#' ],
            'secondary_button' => [ 'text'=>'Learn more',   'link'=>'#' ],
        ]
    ];
}

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