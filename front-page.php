<?php get_header(); ?>
<section>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
        <?php
            $args = array(
                    'posts_per_page' => 1,
                    'post__in' => get_option( 'sticky_posts' ),
                    'ignore_sticky_posts' => 1
                );
                $query = new WP_Query( $args );
                
                if ( $query -> have_posts() ) :
                    while ($query ->  have_posts()) : $query ->  the_post(); ?>
                    <!-- sticky post -->
                        <?php if(has_post_thumbnail()):
                            $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                            <!-- sticky post div -->
                            <?php
                            echo '<div class="col-sm-12 front-sticky" style=
                            "       background-image: linear-gradient(to top, rgba(70,70,70,0.5), rgba(10, 0, 0, 0.5)), url('.$url.');
                                                           
                            ">';
                            endif ?>
                                <!-- sticky post body -->
                                <div class="row">
                                <div class="sticky-body">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <span class="">
                                            <?php
                                            // Displaying only the first and main category for the post
                                                $categories = get_the_category();
                                                if(!empty($categories)){
                                                    echo esc_html($categories[0]->name);
                                                }
                                            ?>
                                        </span>
                                        <span class="">
                                            <?php 
                                                echo meks_time_ago(); 
                                            ?>
                                        </span>
                                        <h1>
                                            <a href="<?php the_permalink();?>">
                                                <?php 
                                                    the_title();
                                                ?>
                                            </a>
                                        </h1>
                                        <p><?php the_excerpt();?></p>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of sticky post body -->
                            </div>
                                </div>
                    <!-- emd of sticky post -->
        <?php endwhile; endif;?>
        </div>
    </div>
</div>
</section>


<section id="latest">
    <div class="container mb-4">
        <div class="row">
            <div class="col-sm-12 mb-2 latest-heading">
                <span>Latest Stories</span>
            </div>
        </div>

        <div class="row latests">
            <div class="col-lg-12">
                <div class="card-group">
                    <?php
                        $recent_posts = wp_get_recent_posts(array(
                            'numberposts' => 4, // Number of recent posts thumbnails to display
                            'post_status' => 'publish' // Show only the published posts
                        ));
                        foreach($recent_posts as $post) : ?>
                        <div class="card rounded-0">
                            <span class="">
                                <?php 
                                    $category_detail=get_the_category($post['ID']);
                                    if(!empty($category_detail)){
                                        echo esc_html($category_detail[0]->name);
                                    }
                                ?>
                            </span>
                            <h3><a href="<?php the_permalink($post['ID']);?>"><?php echo $post['post_title'] ?></a></h3>
                        </div>
                        <?php endforeach; wp_reset_query(); ?>
                </div>
            </div>
        </div>                                    
    </div>
</section>

<section id="campus-news">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 campus-news-heading">
                <span>Campus News</span>
            </div>
        </div>
        
        <div class="row">
            <?php
                $args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'category_name' => 'campus-news',
                    'posts_per_page' => 6,
                );
                $campus = new WP_Query( $args );
                if (  $campus->have_posts() ) :

                while ( $campus->have_posts() ) :  $campus->the_post(); ?>
                <div class="col-sm-4 mt-4">
                    <div class="card" style="max-width: 100%;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <?php if(has_post_thumbnail()):?>
                                    <div class="card-img">
                                        <a href="<?php the_permalink()?>">    
                                            <?php the_post_thumbnail();?> 
                                        </a>
                                    </div>
                                <?php endif ?>
                            </div>
                            <div class="col-md-8">
                                <div class="cardbody">
                                    <h5 class="cardtitle"><a href="<?php the_permalink();?>"><?php the_title();?></a></h5>
                                    <span><?php echo meks_time_ago(); ?></span> . <span><?php the_author(); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; endif; ?>
        </div>

    </div>
</section>

<section id="horizontal">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <hr>
            </div>
        </div>
    </div>
</section>

<section id="front-one">
    <div class="container">
        <div class="row">
            <!-- lifestyle -->
            <div class="col-md-3 lifestyle">
                <div class="row">
                    <div class="col-sm-12 lifestyle-heading">
                        <span>Lifestyle</span>
                    </div>

                    <!-- col for lifestyle cards -->
                    <div class="col-sm-12">
                        <?php
                            $args = array(
                                'post_type' => 'post',
                                'post_status' => 'publish',
                                'category_name' => 'campus-news',
                                'posts_per_page' => 6,
                            );
                            $lifestyle = new WP_Query( $args );
                            if (  $lifestyle->have_posts() ) :

                                while ( $lifestyle->have_posts() ) :
                                    $lifestyle->the_post();
                                    ?>
                        <!-- card -->
                        <div class="card mb-3" style="max-width: 100%;">
                            <div class="row no-gutters">
                                <div class="col-4">
                                    <?php if(has_post_thumbnail()):?>
                                        <div class="card-img">
                                            <a href="<?php the_permalink()?>">    
                                                <?php the_post_thumbnail();?> 
                                            </a>
                                        </div>
                                    <?php endif ?>
                                </div>
                                <div class="col-8">
                                    <div class="cardbody">
                                        <h5 class="cardtitle"><a href="<?php the_permalink();?>"><?php the_title();?></a></h5>
                                        <span><?php echo meks_time_ago(); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end of card -->
                        <?php endwhile; endif; ?>
                    </div>
                    <!-- end of col for lifestyle cards -->
                </div>
            </div>
            <!-- end of lifestyle -->

            <!-- fetured -->
            <div class="col-md-6 featured">
                <div class="row">
                    <div class="col-sm-12 featured-heading">
                        <span>Featured</span>
                    </div>
                    <!-- featured post -->
                        <?php
                            $args = array(
                                'post_type' => 'post',
                                'post_status' => 'publish',
                                'category_name' => 'featured',
                                'posts_per_page' => 2,
                            );
                            $featured = new WP_Query( $args );
                            if (  $featured->have_posts() ) :

                                while ( $featured->have_posts() ) :
                                    $featured->the_post();
                                    ?>

                            <div class="col-sm-12 mb-1">
                                <?php if(has_post_thumbnail()):
                                    $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                                    <?php
                                        echo '<div class="featured-post "style=
                                        "background-image: linear-gradient(to top, rgba(70,70,70,0.5), rgba(10, 0, 0, 0.5)), url('.$url.');
                                            ">'
                                        ?>
                                <?php endif ?>
                                    <div class="row">
                                        <div class="col">
                                            <div class="featuredbody">
                                                <h5><a href="<?php the_permalink();?>"><?php the_title();?></a></h5>
                                                <span><?php echo meks_time_ago(); ?></span>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                                    
                                <!-- end of featured post -->
                    <?php endwhile; endif; ?>
                </div>
            </div>
            <!-- end of featured -->
            <div class="col-md-3 personalities">
                <div class="row">
                    <div class="col-sm-12 perosnality-heading">
                        <span>Personalities</span>
                    </div>
                    <div class="col-sm-12">
                        <!-- php -->
                        <?php
                                $args = array(
                                    'post_type' => 'post',
                                    'post_status' => 'publish',
                                    'category_name' => 'campus-news',
                                    'posts_per_page' => 2,
                                );
                                $personality = new WP_Query( $args );
                                if (  $personality->have_posts() ) :

                                    while ( $personality->have_posts() ) :
                                        $personality->the_post();
                                        ?>
                                    <div class="card mb-3 rounded-0">
                                        <?php if(has_post_thumbnail()):?>
                                            <div class="card-img-top rounded-0">
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
                        <?php endwhile; endif; ?>
                        
                    </div>
                </div>
            </div>
            <!-- personality -->
        </div>
    </div>
</section>

<section id="horizontal">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <hr>
            </div>
        </div>
    </div>
</section>

<section id="front-two">
    <div class="container">
        <div class="row">
            <!-- col-one -->
            <div class="col-sm-6 tales">
                <div class="row">
                    <div class="col-sm-12  tales-heading">
                        <span>Campus Tales</span>
                    </div>
                    <div class="col-sm-12">
                        <?php
                            $args = array(
                                'post_type' => 'post',
                                'post_status' => 'publish',
                                'category_name' => 'featured',
                                'posts_per_page' => 3,
                            );
                            $tales = new WP_Query( $args );
                            if (  $tales->have_posts() ) :

                                while ( $tales->have_posts() ) :
                                    $tales->the_post();
                                    ?>
                                    <div class="card mb-3" style="max-width: 100%;">
                                        <div class="row no-gutters">
                                            <div class="col-4">
                                            <?php if(has_post_thumbnail()):?>
                                                <div class="tales-img">
                                                    <a href="<?php the_permalink()?>">    
                                                        <?php the_post_thumbnail();?> 
                                                    </a>
                                                </div>
                                            <?php endif ?>
                                            </div>
                                            <div class="col-8">
                                                <div class="cardbody">
                                                    <h5 class="card-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h5>
                                                    <p class="card-text"><?php the_excerpt();?></p>
                                                    <span><?php echo meks_time_ago(); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        <?php endwhile; endif; ?>
                    </div>
                </div>
            </div>
            <!-- end of col one -->

            <!-- col-two -->
            <div class="col-sm-6 intern">
            <div class="row">
                    <div class="col-sm-12  intern-heading">
                        <span>Career Guidance</span>
                    </div>
                    <div class="col-sm-12">
                        <?php
                            $args = array(
                                'post_type' => 'post',
                                'post_status' => 'publish',
                                'category_name' => 'featured',
                                'posts_per_page' => 3,
                            );
                            $tales = new WP_Query( $args );
                            if (  $tales->have_posts() ) :

                                while ( $tales->have_posts() ) :
                                    $tales->the_post();
                                    ?>
                                    <div class="card mb-3" style="max-width: 100%;">
                                        <div class="row no-gutters">
                                            <div class="col-4">
                                            <?php if(has_post_thumbnail()):?>
                                                <div class="tales-img">
                                                    <a href="<?php the_permalink()?>">    
                                                        <?php the_post_thumbnail();?> 
                                                    </a>
                                                </div>
                                            <?php endif ?>
                                            </div>
                                            <div class="col-8">
                                                <div class="cardbody">
                                                    <h5 class="card-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h5>
                                                    <p class="card-text"><?php the_excerpt();?></p>
                                                    <span><?php echo meks_time_ago(); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        <?php endwhile; endif; ?>
                    </div>
                </div>
            </div>
            <!-- end of col two -->
        </div>
    </div>
</section>

<section id="horizontal">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <hr>
            </div>
        </div>
    </div>
</section>

<section id="front-three">
    <div class="container">
        <div class="row">
            <!-- editors pick -->
            <div class="col-sm-6 editors">
                <div class="row">
                <?php
                        if ( false === ( $totd_trans_post_id = get_transient( 'totd_trans_post_id' ) ) ) {
                            $args = array('numberposts' => 1, 'orderby' => 'rand');
                            $totd = get_posts($args);
                            $midnight = strtotime('midnight +1 day');
                            $timenow = time();
                            $timetillmidnight = $midnight - $timenow;
                            echo $midnight;
                            echo ",".$timenow;
                            set_transient('totd_trans_post_id', $totd[0]->ID, $timetillmidnight);
                        } else {
                            $args = array('post__in' => array($totd_trans_post_id));
                            $totd = get_posts($args);
                        }

                        foreach( $totd as $post ) : setup_postdata($post); ?>
                        <div class="col-sm-12">
                            <?php if(has_post_thumbnail()):
                                $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                                <?php
                                    echo '<div class="card editors" style=
                                    "   background-image: linear-gradient(to top, rgba(70,70,70,0.5), rgba(10, 0, 0, 0.5)), url('.$url.');
                                             
                                            background-size: cover; ">'
                                    ?>
                            <?php endif ?>
                                <div class="card-editor-content">
                                    <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
                                    <p><?php the_excerpt();?></p>
                                    <span class="">
                                        <?php
                                        // Displaying only the first and main category for the post
                                            $categories = get_the_category();
                                            if(!empty($categories)){
                                                echo esc_html($categories[0]->name);
                                            }
                                        ?>
                                    </span>
                                    <span>
                                        <?php the_time( 'F jS, Y' );?>
                                    </span>
                                    <span>
                                        Editor's Pick
                                    </span>
                                </div>
                            </div>
                        </div>

                        <?php endforeach; ?>
                </div>
            </div>
            <!-- end of editors pick -->


            <!-- sex and relationships -->
            <div class="col-sm-3 sex">
                <div class="row">
                    <div class="col-sm-12 sex-heading">
                        <span>Sex &amp; Relationships</span>
                    </div>
                    <div class="col-sm-12">
                        <?php
                            $args = array(
                                'post_type' => 'post',
                                'post_status' => 'publish',
                                'category_name' => 'campus-news',
                                'posts_per_page' => 3,
                            );
                            $sex = new WP_Query( $args );
                            if (  $sex->have_posts() ) :

                                while ( $sex->have_posts() ) :
                                    $sex->the_post();
                                    ?>

                                    <!-- card -->
                        <div class="card mb-3" style="max-width: 100%;">
                            <div class="row no-gutters">
                                <div class="col-4">
                                    <?php if(has_post_thumbnail()):?>
                                        <div class="card-img">
                                            <a href="<?php the_permalink()?>">    
                                                <?php the_post_thumbnail();?> 
                                            </a>
                                        </div>
                                    <?php endif ?>
                                </div>
                                <div class="col-8">
                                    <div class="cardbody">
                                        <h5 class="cardtitle"><a href="<?php the_permalink();?>"><?php the_title();?></a></h5>
                                        <span><?php echo meks_time_ago(); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end of card -->
                        <?php endwhile; endif; ?>
                    </div>
                </div>
            </div>
            <!-- end of sex and relationships -->

            <!-- entertainment -->
            <div class="col-sm-3 entertainment">
                <div class="row">
                    <div class="col-sm-12 entertainment-heading">
                        <span>Entertainment</span>
                    </div>
                    <div class="col-sm-12">
                        <?php
                            $args = array(
                                'post_type' => 'post',
                                'post_status' => 'publish',
                                'category_name' => 'campus-news',
                                'posts_per_page' => 3,
                            );
                            $sex = new WP_Query( $args );
                            if (  $sex->have_posts() ) :

                                while ( $sex->have_posts() ) :
                                    $sex->the_post();
                                    ?>

                                    <!-- card -->
                        <div class="card mb-3" style="max-width: 100%;">
                            <div class="row no-gutters">
                                <div class="col-4">
                                    <?php if(has_post_thumbnail()):?>
                                        <div class="card-img">
                                            <a href="<?php the_permalink()?>">    
                                                <?php the_post_thumbnail();?> 
                                            </a>
                                        </div>
                                    <?php endif ?>
                                </div>
                                <div class="col-8">
                                    <div class="cardbody">
                                        <h5 class="cardtitle"><a href="<?php the_permalink();?>"><?php the_title();?></a></h5>
                                        <span><?php echo meks_time_ago(); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end of card -->
                        <?php endwhile; endif; ?>
                    </div>
                </div>
            </div>
            <!-- end of entertainment -->
        </div>
    </div>
</section>
<?php get_footer(); ?>