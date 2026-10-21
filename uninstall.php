<?php
/**
 * Uninstall handler for __PLUGIN_NAME__.
 *
 * Runs when the plugin is deleted from Plugins → Installed Plugins. Deactivation
 * alone does NOT trigger this file. Clean up all plugin data (database tables,
 * options, transients, cron hooks) so the site is returned to the state it
 * was in before the plugin was installed.
 *
 * @package __PLUGIN_PACKAGE__
 */

defined( 'WP_UNINSTALL_PLUGIN' ) || exit;

// Example cleanup — adjust as the plugin grows:
//
// delete_option( '__prefix___settings' );
// delete_option( '__prefix___db_version' );
//
// global $wpdb;
// $wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}__prefix___my_table" );
