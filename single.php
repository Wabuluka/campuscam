<?php get_header(); ?>

<section id="single">
    <div class="container">
        <div class="row">
            <!-- main content -->
            <div class="col-sm-9">
            <?php if ( have_posts() ) : while (have_posts()) : the_post(); setPostViews(get_the_ID()); ?>
            <div class="row">
                <!-- heading of the blog -->
                <div class="col-sm-12 heading">
                    <h3><?php the_title()?></h3>
                </div>
                <!-- end of heading of the blog -->

                <!-- hr -->
                <div class="col-sm-12">
                    <hr>
                </div>
                <!-- end hr -->
                
                <!-- meta -->
                <div class="col-sm-12 meta">
                    <div class="row">
                        <div class="col-8">
                            <span>
                                <small class="p-1">
                                    <?php echo getPostViews(get_the_ID());?>
                                    <i class="fa fa-eye"></i>
                                </small>
                            </span>
                            <span class="text-uppercase">
                                <small><?php the_time( 'F jS, Y' );?></small>
                            </span>
                        </div>

                        <!-- share -->
                        <div class="col-4 text-right">
                            <span><?php get_template_part('template', 'sharing-box');?></span>
                        </div>
                        <!-- end share -->
                    </div>
                </div>
                <!-- end of meta -->

                <!-- hr -->
                <div class="col-sm-12">
                    <hr>
                </div>
                <!-- end hr -->

                <!-- Image -->
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-2"></div>

                        <div class="col-sm-8">
                            <?php if(has_post_thumbnail()):?>
                                <div class="single-featured-img">    
                                    <?php the_post_thumbnail();?> 
                                </div>
                            <?php endif ?>                
                        </div>

                        <div class="col-sm-2"></div>
                    </div>
                </div>
                <!-- end of image -->                
                
                <!-- content -->
                <div class="col-sm-12 mt-2 content">
                   <div class="row">
                       <div class="col-sm-2"></div>
                       <div class="col-sm-8">
                            <?php the_content()?>
                       </div>
                       <div class="col-sm-2"></div>
                   </div>
                </div>
                <!-- end of content -->

                <!-- hr -->
                <div class="col-sm-12">
                    <hr>
                </div>
                <!-- end hr -->

                <!-- category and tags -->
                <div class="col-sm-12">
                    <div class="row">
                        <!-- cats -->
                        <div class="col-sm-12 category">
                            <?php
                                // Displaying only the first and main category for the post
                                $categories = get_the_category();
                                $separator = '-';
                                $div = '<span>';
                                $endDiv = '</span>';
                                $output = '';
                                if ( ! empty( $categories ) ) {
                                    foreach( $categories as $category ) {
                                    
                                        $output .= $div . '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>'. $endDiv;
                                        
                                    }
                                    echo trim( $output, $separator );
                                }
                            ?>
                        </div>
                        <!-- end cats -->

                        <!-- hr -->
                        <div class="col-sm-12">
                            <hr>
                        </div>
                        <!-- end hr -->
                        
                        <!-- tags -->
                        <div class="col-sm-12 tags">
                            <?php
                                // Displaying only the first and main category for the post
                                $tags = get_the_tags();
                                $separator = '-';
                                $div = '<span>';
                                $endDiv = '</span>';
                                $output = '';
                                if ( ! empty( $tags ) ) {
                                    foreach( $tags as $tag ) {
                                    
                                        $output .= $div . '<a href="' . esc_url( get_category_link( $tag->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $tag->name ) ) . '">' . esc_html( $tag->name ) . '</a>'. $endDiv;
                                        
                                    }
                                    echo trim( $output, $separator );
                                }
                            ?>
                        </div>
                        <!-- end tags -->
                    </div>
                </div>
                <!-- end of category and tags-->

                <!-- hr -->
                <div class="col-sm-12">
                    <hr>
                </div>
                <!-- end hr -->

                <!-- author -->
                <div class="col-sm-12">
                    <div class="media align-items-center border-top border-bottom py-5 my-8">
                        <div class="avatar avatar-circle avatar-xl">
                            <div class="avatar-img">
                                <?php echo get_avatar( get_the_author_meta('user_email'), '80', '' ); ?>
                            </div>
                        </div>
                        <div class="media-body ml-3">
                            <small class="d-block small font-weight-bold text-cap">About Author</small>
                            <h3 class="mb-0"><?php the_author_posts_link() ?></a> </h3>
                            <p class="mb-0"><?php the_author_meta('description'); ?></p>
                        </div>
                    </div>
                </div>
                <!-- end of author -->



                <!-- Related Posts -->
                <div class="col-sm-12 mt-3 related">
                    <!-- heading -->
                    <div class="row">
                        <div class="col-sm-12 heading">
                            <span>Related Stories</span>
                        </div>
                    </div>
                    <!-- end of heading -->
                    <div class="row">
                        <?php 
                            $orig_post = $post;
                            global $post;
                            $tags = wp_get_post_tags($post->ID);
                            if ($tags) {
                                $tag_ids = array();
                                foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
                                $args=array(
                                'tag__in' => $tag_ids,
                                'post__not_in' => array($post->ID),
                                'posts_per_page'=>4, // Number of related posts to display.
                                'caller_get_posts'=>1
                                );
                                 
                                $my_query = new wp_query( $args );
                               
                                while( $my_query->have_posts() ) {
                                $my_query->the_post();
                        ?>
                            <div class="col-sm-3 mb-3">
                                <div class="card" style="width: 100%;">
                                    <?php if(has_post_thumbnail()):?>
                                        <div class="card-img-top">
                                            <a href="<?php the_permalink()?>">    
                                                <?php the_post_thumbnail();?> 
                                            </a>
                                        </div>
                                    <?php endif ?>
                                    <div class="cardbody">
                                        <h5 class="card-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h5>
                                        <span><?php echo meks_time_ago(); ?></span>
                                    </div>
                                </div>
                            </div>
                            
                        <?php }
                            }
                            $post = $orig_post;
                            wp_reset_query();
                        ?>
                    </div>
                </div>
                <!-- end of related posts -->

                <!-- hr -->
                <div class="col-sm-12">
                    <hr>
                </div>
                <!-- end hr -->

                <!-- Blog Navigation -->
                <div class="col-sm-12 mt-3 mb-3">
                    <div class="row">
                        <div class="col-6 text-left">
                            <?php previous_post_link(); ?>
                        </div>
                        <div class="col-6 text-right">
                            <?php next_post_link(); ?>
                        </div>
                    </div>
                </div>
                <!-- end of blog navigation -->


            </div>
            <?php endwhile; endif;?>
            </div>
            <!-- end of main content -->

            <!-- sidebar -->
            <div class="col-sm-3 single-post-sidebar">
                <!-- latest -->
                <div class="row latest">
                    <div class="col-sm-12 heading">
                        <span>Latest Stories</span>
                    </div>
                    <div class="col-sm-12">
                    <?php
                    $recent_posts = wp_get_recent_posts(array(
                        'numberposts' => 5, // Number of recent posts thumbnails to display
                        'post_status' => 'publish' // Show only the published posts
                    ));
                    foreach($recent_posts as $post) : ?>
                        <div class="card mt-2 rounded-0" style="max-width: 100%;">
                                <div class="row no-gutters">
                                    <div class="col-4">
                                        <?php echo get_the_post_thumbnail($post['ID'], 'full'); ?>
                                    </div>
                                    <div class="col-8">
                                    <div class="cardbody pt-0">
                                        <h3 class="card-title"><a href="<?php the_permalink($post['ID']);?>"><?php echo $post['post_title'] ?></a></h3>
                                        
                                    </div>
                                    </div>
                                </div>
                            </div>
                    <?php endforeach; wp_reset_query(); ?>
                    </div>
                </div>
                <!-- end of latest -->
            </div>
            <!-- end of sidebar -->
        </div>
    </div>
</section>
<?php get_footer(); ?>