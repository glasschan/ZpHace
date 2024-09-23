<?php
/**
 * Plugin Name:       ZpHace - Auto Spacing for Chinese
 * Plugin URI:        https://seafoodholdhand.com/work/zphace/
 * Description:       Automatically inserts spaces between CJK characters and English letters, numbers, and punctuation marks, while keeping Chinese punctuation without extra spaces.
 * Version:           1.1.1
 * Author:            Glass Chan
 * Author URI:        https://seafoodholdhand.com/
 * Text Domain:       zphace-auto-spacing
 * License:           GPL-2.0+ / MIT License
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt / https://opensource.org/licenses/MIT
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/seafoodholdhand/zphace
 *
 * Credits:
 * Originally created by Tunghsiao Liu (Space Lover) and Rakume Hayashi (Pangu)
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class ZpHace_Auto_Spacing {

    /**
     * List of content filters to apply.
     *
     * @var array
     */
    private $filters = array(
        'the_title',
        'the_content',
        'the_excerpt',
        'single_post_title',
        'comment_author',
        'comment_text',
        'bloginfo',
        'wp_title',
        'term_description',
        'category_description',
        'widget_title',
        'widget_text',
    );

    /**
     * Regular expression patterns for spacing adjustments.
     *
     * @var array
     */
    private $patterns = array();

    /**
     * Singleton instance.
     *
     * @var ZpHace_Auto_Spacing
     */
    private static $instance = null;

    /**
     * Get the singleton instance.
     *
     * @return ZpHace_Auto_Spacing
     */
    public static function get_instance() {
        if (null === self::$instance) {
            self::$instance = new ZpHace_Auto_Spacing();
        }
        return self::$instance;
    }

    /**
     * Constructor.
     */
    private function __construct() {
        $this->define_patterns();
        $this->add_filters();
        add_action('plugins_loaded', array($this, 'load_textdomain'));
    }

    /**
     * Define the regex patterns.
     */
    private function define_patterns() {
        // Define CJK Unicode range
        $cjk = implode('', array(
            '\x{2e80}-\x{2eff}',   // CJK Radicals Supplement
            '\x{2f00}-\x{2fdf}',   // Kangxi Radicals
            '\x{3040}-\x{309f}',   // Hiragana
            '\x{30a0}-\x{30ff}',   // Katakana
            '\x{3100}-\x{312f}',   // Bopomofo
            '\x{3200}-\x{32ff}',   // Enclosed CJK Letters and Months
            '\x{3400}-\x{4dbf}',   // CJK Unified Ideographs Extension A
            '\x{4e00}-\x{9fff}',   // CJK Unified Ideographs
            '\x{f900}-\x{faff}',   // CJK Compatibility Ideographs
            '\x{ff00}-\x{ffef}',   // Halfwidth and Fullwidth Forms
            '\x{20000}-\x{2a6df}', // CJK Unified Ideographs Extension B
            '\x{2a700}-\x{2b73f}', // CJK Unified Ideographs Extension C
            '\x{2b740}-\x{2b81f}', // CJK Unified Ideographs Extension D
            '\x{2b820}-\x{2ceaf}', // CJK Unified Ideographs Extension E
            '\x{2ceb0}-\x{2ebef}', // CJK Unified Ideographs Extension F
            '\x{30000}-\x{3134f}', // CJK Unified Ideographs Extension G
        ));

        // General patterns for spacing adjustments
        $this->patterns = array(
            // Add space between CJK and English/punctuation
            array(
                'pattern' => '/([' . $cjk . '])([A-Za-z0-9`@&%\=\$\^\*\-\+\/\|\\\\])/u',
                'replacement' => '$1 $2',
            ),
            array(
                'pattern' => '/([A-Za-z0-9`~!%&=;|\.,:\?\$\^\*\-\+\/\\\\])([' . $cjk . '])/u',
                'replacement' => '$1 $2',
            ),
            // Remove spaces around Chinese punctuation
            array(
                'pattern' => '/\s*([\x{3000}-\x{303F}\x{FF00}-\x{FFEF}])\s*/u',
                'replacement' => '$1',
            ),
            // Handle quotes and hashes
            array(
                'pattern' => '/([' . $cjk . '])(["\'])/u',
                'replacement' => '$1 $2',
            ),
            array(
                'pattern' => '/(["\'])([' . $cjk . '])/u',
                'replacement' => '$1 $2',
            ),
            array(
                'pattern' => '/(["\']+)\s*(.+?)\s*(["\']+)/u',
                'replacement' => '$1$2$3',
            ),
            array(
                'pattern' => '/([' . $cjk . '])(#(\S+))/u',
                'replacement' => '$1 $2',
            ),
            array(
                'pattern' => '/((\S+)#)([' . $cjk . '])/u',
                'replacement' => '$1 $3',
            ),
            // Handle operators
            array(
                'pattern' => '/([' . $cjk . '])([\+\-\*\/=&\\|<>])/u',
                'replacement' => '$1 $2',
            ),
            array(
                'pattern' => '/([\+\-\*\/=&\\|<>])([' . $cjk . '])/u',
                'replacement' => '$1 $2',
            ),
        );
    }

    /**
     * Add filters to WordPress hooks.
     */
    private function add_filters() {
        foreach ($this->filters as $filter) {
            add_filter($filter, array($this, 'auto_spacing'), 10, 1);
        }
    }

    /**
     * Load plugin textdomain for translations.
     */
    public function load_textdomain() {
        load_plugin_textdomain('zphace-auto-spacing', false, dirname(plugin_basename(__FILE__)) . '/languages/');
    }

    /**
     * Add spaces between CJK and English/number/punctuation, and remove spaces around Chinese punctuation.
     *
     * @param string $content The content to be filtered.
     * @return string Filtered content with added spaces.
     */
    public function auto_spacing($content) {
        // Skip if content is empty or not a string
        if (empty($content) || !is_string($content)) {
            return $content;
        }

        // Use preg_replace_callback to process only text nodes
        $content = preg_replace_callback('/(?:<[^>]+>)|([^<]+)/us', function ($matches) {
            // If this is a text node
            if (!empty($matches[1])) {
                $text = $matches[1];
                // Apply regex patterns to text
                foreach ($this->patterns as $pattern) {
                    $text = preg_replace($pattern['pattern'], $pattern['replacement'], $text);
                }
                return $text;
            }
            // Else, return the tag as is
            return $matches[0];
        }, $content);

        return $content;
    }
}

// Initialize the plugin
ZpHace_Auto_Spacing::get_instance();
