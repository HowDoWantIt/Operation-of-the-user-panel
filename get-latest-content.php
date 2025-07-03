<?php
// Get the latest articles
function get_latest_articles() {
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 1,  // Only one article
        'order' => 'DESC',
        'orderby' => 'date'
    );

    $query = new WP_Query($args);
    $articles = [];

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $articles[] = [
                'title' => get_the_title(),
                'url' => get_permalink(),
                'excerpt' => wp_trim_words(get_the_excerpt(), 20)
            ];
        }
    }

    wp_reset_postdata();  // Reset query
    return $articles;
}

// Get the latest products (WooCommerce)
function get_latest_products() {
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 1,  // Only one product
        'order' => 'DESC',
        'orderby' => 'date'
    );

    $query = new WP_Query($args);
    $products = [];

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $products[] = [
                'title' => get_the_title(),
                'url' => get_permalink(),
                'excerpt' => wp_trim_words(get_the_excerpt(), 20)
            ];
        }
    }

    wp_reset_postdata();  // Reset query
    return $products;
}
