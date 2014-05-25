<?php

/**
 * Widget de Sobre o Autor
 * 
 * @author Leonardo Carlos <leonardo@leoartes.com.br>
 * @link http://www.leoartes.com.br
 */
add_action( 'widgets_init', 'vectors_tweets_widgets' );

function vectors_tweets_widgets() {
	register_widget( 'vectors_Tweet_Widget' );
}

class vectors_tweet_widget extends WP_Widget {
	
	function vectors_Tweet_Widget() {
		$widget_ops = array( 'classname' => 'widget-twitter', 'description' => __('Displays your latest tweets.', 'vectors') );
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'widget-twitter' );
		$this->WP_Widget( 'widget-twitter', __('VECTORS: Latest Tweets','vectors'), $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters('widget_title', $instance['title'] );
		$vectors_twitter_id = $instance['vectors_twitter_id'];
		$vectors_twitter_count = $instance['vectors_twitter_count'];
		$vectors_twitter_text = $instance['vectors_twitter_text'];
		echo $before_widget;
		if ( $title ) {
			echo $before_title . $title . $after_title;
			echo '<p class="subtitle"><a href="http://twitter.com/'.$vectors_twitter_id.'">'.$vectors_twitter_text.' &rarr;</a></p>';
			echo '<div class="clear"></div>';
		}
		?>
        <script type="text/javascript" src="http://www.escolasites.com/wp-content/themes/vectors/js/jquery.tweet.js"></script>
        <script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".tweet").tweet({
				username: "<?php echo $instance["vectors_twitter_id"]; ?>",
				count: <?php echo $instance["vectors_twitter_count"]; ?>
            });
          })
        </script>
        <div class="tweet"></div>
        <?php 
		echo $after_widget;
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['vectors_twitter_id'] = strip_tags( $new_instance['vectors_twitter_id'] );
		$instance['vectors_twitter_count'] = strip_tags( $new_instance['vectors_twitter_count'] );
		$instance['vectors_twitter_text'] = strip_tags( $new_instance['vectors_twitter_text'] );
		return $instance;
	}
	
	function form( $instance ) {
		$defaults = array(
		'title' => 'Recent Tweets',
		'vectors_twitter_id' => 'aaronlynch',
		'vectors_twitter_count' => '2',
		'vectors_twitter_text' => 'Follow Me On Twitter',
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'vectors') ?></label><input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" /></p>
		<p><label for="<?php echo $this->get_field_id( 'vectors_twitter_id' ); ?>"><?php _e('Twitter ID (username):', 'vectors') ?></label><input class="widefat" id="<?php echo $this->get_field_id( 'vectors_twitter_id' ); ?>" name="<?php echo $this->get_field_name( 'vectors_twitter_id' ); ?>" value="<?php echo $instance['vectors_twitter_id']; ?>" /></p>
		<p><label for="<?php echo $this->get_field_id( 'vectors_twitter_count' ); ?>"><?php _e('Number Of Tweets:', 'vectors') ?></label><input class="widefat" id="<?php echo $this->get_field_id( 'vectors_twitter_count' ); ?>" name="<?php echo $this->get_field_name( 'vectors_twitter_count' ); ?>" value="<?php echo $instance['vectors_twitter_count']; ?>" /></p>
		<p><label for="<?php echo $this->get_field_id( 'vectors_twitter_text' ); ?>"><?php _e('Follow Text (ex: Follow me on Twitter):', 'vectors') ?></label><input class="widefat" id="<?php echo $this->get_field_id( 'vectors_twitter_text' ); ?>" name="<?php echo $this->get_field_name( 'vectors_twitter_text' ); ?>" value="<?php echo $instance['vectors_twitter_text']; ?>" /></p>
	<?php
	}
}
?>