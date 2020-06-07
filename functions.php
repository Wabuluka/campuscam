<?php

    // Excerpt Length Control
    function wpb_set_excerpt_length(){
        return 15;
    }
    add_filter('excerpt_length', 'wpb_set_excerpt_length');

    function trim_custom_excerpt($excerpt) {
        if (has_excerpt()) {
            $excerpt = wp_trim_words(get_the_excerpt(), apply_filters("excerpt_length", 55));
        }
    
        return $excerpt;
    }
    
    add_filter("the_excerpt", "trim_custom_excerpt", 999);

    /* Function which displays your post date in time ago format */
    function meks_time_ago() {
        return human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ).' '.__( 'ago' );
    }