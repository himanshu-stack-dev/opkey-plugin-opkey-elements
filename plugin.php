<?php

/**
 * Plugin Name: Opkey Custom Elements
 * Description: Opkey custom elements created with Element Studio.
 * Author: The Break
 * Text Domain: opkey
 * Domain Path: /languages/
 * Version: 1.0.3
 */

namespace OpkeyCustomElements;

if ( ! defined( 'OPKEY_ELEMENTS_URL' ) ) {
    define( 'OPKEY_ELEMENTS_URL', plugin_dir_url( __FILE__ ) );
}

/**
 * A single source of truth for shared content defaults.
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

/* ────────────────────────────────────────────────────────────────────────────
   Guard: prevent deactivation link in plugins list
   ──────────────────────────────────────────────────────────────────────────── */
add_filter('plugin_action_links', function ($actions, $plugin_file) {
    if ($plugin_file === plugin_basename(__FILE__)) {
        unset($actions['deactivate']);
    }
    return $actions;
}, 10, 2);

add_filter('pre_update_option_active_plugins', function ($new, $old) {
    $me = plugin_basename(__FILE__);
    if (in_array($me, (array)$old, true) && !in_array($me, (array)$new, true)) {
        $new[] = $me; // re-add
    }
    return $new;
}, 10, 2);