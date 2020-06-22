<?php
/* Social Share Buttons template for Wordpress
 * By Daan van den Bergh 
 */
$postUrl = 'http' . ( isset( $_SERVER['HTTPS'] ) ? 's' : '' ) . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}"; ?>

  <a target="_blank"  href="https://twitter.com/intent/tweet?url=<?php echo $postUrl; ?>&text=<?php echo the_title(); ?>&via=<?php the_author_meta( 'twitter' ); ?>" title="Tweet this"><i class="fa fa-twitter-square"></i> </a>
  <a target="_blank"  href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $postUrl; ?>" title="Share on Facebook"><i class="fa fa-facebook-square"></i> </a></a>
  <a target="_blank"  href="whatsapp://send?text=<?php echo $postUrl; ?>" title="Share on Whatsapp"><i class="fa fa-whatsapp"></i> </a>
