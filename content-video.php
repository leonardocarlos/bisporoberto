<article>

				<div class="post">
						<h1><a href="#">Galeria de Videos</a></h1>

     <?php /* Loop the stuff from the videos post type */
          $args = array( 'post_type' => 'videos', 'posts_per_page' => 10 );
          $loop = new WP_Query( $args );
          while ( $loop->have_posts() ) : $loop->the_post();?>
          <div class="galvidpre">
               <div class="galvidprevid">
               <?php
               /* Set variables and create if stament */
				$videosite = get_post_meta($post->ID, 'video_image', single);
				$videoid = get_post_meta($post->ID, "video_id", single);
				if ($videosite == youtube) {
  				echo '<iframe width="280" height="190" src="http://www.youtube.com/embed/'.$videoid.'?rel=0" frameborder="0" allowfullscreen></iframe>';
				} else if ($videosite == vimeo) {
  				echo '<iframe src="http://player.vimeo.com/video/'.$videoid.'" width="280" height="190" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
				} else {
  				echo 'Please Select Video Site Via the CMS';
				}
				?>
               </div><!-- .galvidprevid -->
               <div class="galvidpretext">
                    <h4><?php the_title(); ?></h4>
                    <p>
                    <?php /* this is just a limit on characters displayed */
                    $words = explode(" ",strip_tags(the_excerpt()));
                    $content = implode(" ",array_splice($words,0,20));
                    echo $content; ?>
					<!-- Links de Compartilhamento -->
                    </p>
               </div><!-- .galvidpretext -->
</div><!-- .galvidpre -->
     <?php endwhile;?>

     </div><!-- .post -->

</article><!-- #post-<?php the_ID(); ?> -->