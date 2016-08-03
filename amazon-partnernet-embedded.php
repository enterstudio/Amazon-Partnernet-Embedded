<?php

/*
  Plugin Name: Partner Links for Amazon
  Plugin URI:https://plugin.sebastianselinger.de/amazon-artikel-widget/
  Description: Dieses Plugin erm&ouml;glicht die einfache Integration von Amazon Partnernetlinks mit Text und Grafik. Mit vielen Features ereichtert sie die Monetarisierung und Vermartktung der Produkte.
  Author: Sebastian Selinger (Huskynarr)
  Author URI: https://www.sebastianselinger.de
  Version: 1.0
  License: GPLv2 or later
  License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

/**
 * 
 */
require_once(dirname(__FILE__) . '/amazon-options.php');
require_once(dirname(__FILE__) . '/amazon-content.php');

/**
 *  Load amazon Actions
 */
if (function_exists('add_action')) {
  /**
   *  Registers Options Page to Settings Menu
   */
  add_action('the_content', 'amazonContent');

  /**
   *  Admin Page
   */
  add_action('admin_menu', 'amazonAdminSetup');

  /**
   *  Registers Options Page to Settings Menu
   */
  add_filter('plugin_row_meta', 'plugin_row_meta', 10, 2);

  /**
   * 
   */
  add_action('admin_enqueue_scripts', 'add_css');
}

/**
 *  Registers Options Page to Settings Menu
 */
function amazonAdminSetup() {
  /* Base Menu */
  add_options_page('Amazon Partnernet', 'Amazon Partnernet', 8, basename(__FILE__), 'amazonOptionsPage');
}

/**
 * 
 */
function add_css() {
  wp_enqueue_style('prefix-style', plugins_url('css/style.css', __FILE__));
}


/**
 * Registers additional links for the sitemap plugin on the WP plugin configuration page
 *
 * Registers the links if the $plugin_file param equals to the sitemap plugin
 * @param -
 * @param -
 * @param -
 * @param -
 * @return array[]
 */
function plugin_row_meta($plugin_meta, $plugin_file, $plugin_data, $status) {
  $plugin = plugin_basename(__FILE__);
  if ($plugin_file == $plugin) {// only for this plugin
    $plugin_meta[] = sprintf('<a href="%s">%s</a>', 'https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=UFGKHZB2FJA7A', 'Unterstützen');
    $plugin_meta[] = sprintf('<a href="%s">%s</a>', 'https://github.com/Huskynarr/Amazon-Partnernet-Embedded/issues', 'Problem melden');
    $plugin_meta[] = sprintf('<a href="%s">%s</a>', 'https://github.com/Huskynarr/Amazon-Partnernet-Embedded/wiki', 'Documentation');
  }
  return $plugin_meta;
}
