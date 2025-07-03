<?php
/**
 * Plugin Name: Last Content Suggestions
 * Description: A plugin to display the latest posts and products as recommendations in user panels.
 * Version: 1.0
 * Author: IDC
 * Text Domain: last-content-suggestions
 */

// Prevent direct access
if (!defined('ABSPATH')) exit;

// Include necessary files
include plugin_dir_path(__FILE__) . 'includes/get-latest-content.php';

// Register activation and deactivation hooks
register_activation_hook(__FILE__, 'lcs_activate_plugin');
register_deactivation_hook(__FILE__, 'lcs_deactivate_plugin');

// Enqueue styles and scripts
function lcs_enqueue_assets() {
    wp_enqueue_style('lcs-styles', plugin_dir_url(__FILE__) . 'assets/css/styles.css');
    wp_enqueue_script('lcs-scripts', plugin_dir_url(__FILE__) . 'assets/js/scripts.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'lcs_enqueue_assets');

// Display the latest articles and products in a popup (only for public pages)
function lcs_display_latest_content_popup() {
    if (is_admin()) {
        return;  // Prevent from showing in admin panel
    }

    // Get latest articles
    $articles = get_latest_articles();
    
    // Get latest products
    $products = get_latest_products();

    // Output the popup content
    ?>
    <div class="notification-popup">
        <button class="close-btn">&times;</button> <!-- Close button -->
        <h3>آخرین مقالات پیشنهادی</h3>
        <?php if (!empty($articles)) : ?>
            <?php foreach ($articles as $article) : ?>
                <div class="notification">
                    <strong>پیشنهاد مقاله:</strong><br>
                    <a href="<?php echo esc_url($article['url']); ?>"><?php echo esc_html($article['title']); ?></a>
                    <p><?php echo esc_html($article['excerpt']); ?></p>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>هیچ مقاله جدیدی پیدا نشد.</p>
        <?php endif; ?>

        <h3>آخرین محصولات پیشنهادی</h3>
        <?php if (!empty($products)) : ?>
            <?php foreach ($products as $product) : ?>
                <div class="notification">
                    <strong>پیشنهاد محصول:</strong><br>
                    <a href="<?php echo esc_url($product['url']); ?>"><?php echo esc_html($product['title']); ?></a>
                    <p><?php echo esc_html($product['excerpt']); ?></p>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>هیچ محصول جدیدی پیدا نشد.</p>
        <?php endif; ?>
    </div>
    <?php
}

// Display the popup in the footer of all public pages
add_action('wp_footer', 'lcs_display_latest_content_popup');  // Shows at the bottom of all public pages

// Create shortcode to display the latest content in pages
function lcs_latest_content_shortcode() {
    ob_start(); // Start capturing the output

    // Get latest articles
    $articles = get_latest_articles();
    
    // Get latest products
    $products = get_latest_products();

    // Display the notifications
    include plugin_dir_path(__FILE__) . 'templates/notification.php';

    return ob_get_clean(); // Return the captured content
}

// Register shortcode for displaying the latest content
add_shortcode('latest_content', 'lcs_latest_content_shortcode');
