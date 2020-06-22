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

    // thumbnail support for posts
    add_theme_support( 'post-thumbnails' );

    // dealing with views of a post
    function getPostViews($postID){
        $count_key = 'post_views_count';
        $count = get_post_meta($postID, $count_key, true);
        if($count==''){
            delete_post_meta($postID, $count_key);
            add_post_meta($postID, $count_key, '0');
            return "0 ";
        }
        return $count.' ';
    }
    function setPostViews($postID) {
        $count_key = 'post_views_count';
        $count = get_post_meta($postID, $count_key, true);
        if($count==''){
            $count = 0;
            delete_post_meta($postID, $count_key);
            add_post_meta($postID, $count_key, '0');
        }else{
            $count++;
            update_post_meta($postID, $count_key, $count);
        }
    }

    // pagination
    add_action('pre_get_posts', 'archive_paginations');
        function archive_paginations($query){
            if ( !is_admin() && $query->is_archive() && $query->is_main_query() ) {
                global $wp_query;
                $cat = $wp_query->get_queried_object();
                $query->set( 'post_type', array( 'your_post_type', 'post' ) );
                $query->set( 'posts_per_page', '9' );
                
                $query->set( 'cat', $cat->slug );
        
            }
            return $query;
        }