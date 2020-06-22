<?php get_header(); ?>

<section id="tags">
    <div class="container">
        <div class="row">
            <div class="col-sm-9 mt-3 cats">
                <!-- category row -->
                    <div class="row">
                        <?php
                            if(have_posts()){
                                    while ( have_posts() ) : the_post();?>

                                <div class="col-sm-4">
                                    <div class="card mb-3" style="width: 100%;">
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

                                    <?php
                                endwhile;
                            }
                        ?>
                    </div>
                <!-- end of category row -->

                <div class="row">
                    <div class="col-6">
                        <?php previous_posts_link(); ?>
                    </div>
                    <div class="col-6 text-right">
                        <?php next_posts_link(); ?>
                    </div>
                </div>
            </div>
            <!-- end of main content -->

            <!-- side-bar -->
            <div class="col-sm-3">
                
            </div>
            <!-- end of sidebar -->
        </div>
    </div>
</section>
<?php get_footer(); ?>