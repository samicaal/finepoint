<?php
/**
 * Class Baw_Widgetarchives_Widget_My_Archives
 */
class Baw_Widgetarchives_Widget_My_Archives extends WP_Widget {

	//process the new widget
	function baw_widgetarchives_widget_my_archives() {
		$widget_ops = array(
			'classname'   => 'baw_widgetarchives_widget_class',
			'description' => __( 'Display links to archives grouped by year then month.', 'better-archives-widget' ),
		);
		parent::__construct( 'baw_widgetarchives_widget_my_archives', __( 'Custom Archives Widget', 'better-archives-widget' ), $widget_ops );
	}

	//build the widget settings form
	function form( $instance ) {
		$defaults = array( 'title' => '' );
		$instance = wp_parse_args( (array) $instance, $defaults );
		$title    = $instance['title'];

		?>
		<p><?php esc_html_e( 'Title:', 'better-archives-widget' ); ?>
			<input class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php
	}

	//save the widget settings
	function update( $new_instance, $old_instance ) {
		$instance          = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );

		return $instance;
	}

	//display the widget
	function widget( $args, $instance ) {
		extract( $args );

		echo $before_widget;
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( '', 'better-archives-widget' ) : $instance['title'], $instance, $this->id_base );


		if ( ! empty( $title ) ) {
			echo $before_title . $title . $after_title;
		};

		// years - months

		global $wpdb;
		$prevYear    = '';
		$currentYear = '';

		/**
		 * Filter the SQL WHERE clause for retrieving archives.
		 */
		$where = apply_filters( 'getarchives_where', "WHERE post_type = 'post' AND post_status = 'publish' AND post_date <= now()" );

		/**
		 * Filter the SQL JOIN clause for retrieving archives.
		 */
		$join = apply_filters( 'getarchives_join', '' );

		if ( $months = $wpdb->get_results( "SELECT YEAR(post_date) AS year, MONTH(post_date) AS numMonth, DATE_FORMAT(post_date, '%M') AS month, count(ID) as post_count FROM $wpdb->posts $join $where GROUP BY YEAR(post_date), MONTH(post_date) ORDER BY post_date DESC" ) ) {
			$selectedYear  = get_query_var('year');
			$selectedMonth = get_query_var('monthnum');
			$firstOption   = 1;
			echo '<ul>';
			foreach ( $months as $month ) {
				$currentYear = $month->year;
				if ( ( $currentYear !== $prevYear ) && ( '' !== $prevYear ) ) {
					echo '</ul></li>';
				}
				if ( $currentYear !== $prevYear ) {
					if($selectedYear == $month->year || $firstOption == 1) { $active = 'active'; } else { $active = ''; }
					?>
					<li class="has-child <?php echo $active; ?>">
					<?php //echo esc_url( get_year_link( $month->year ) ); ?>
					<a href="javascript:void(0);" title="<?php echo esc_html( $month->year ); ?>"><?php echo esc_html( $month->year ); ?></a>
					<ul>
					<?php
				} ?>
				<li <?php if($month->numMonth == $selectedMonth && $month->year == $selectedYear) echo 'class="active"'; else ''; ?>>
					<a href="<?php echo esc_url( get_month_link( $month->year, $month->numMonth ) ); ?>" title="<?php echo esc_html( $month->month ); ?>"><?php echo esc_html( $month->month ); ?></a>
				</li>
				<?php
				$prevYear = $month->year;
				$firstOption++;
			}
		}
		?>
		</ul></li>
		<?php
		echo '</ul>';
		echo $after_widget;
	}
}
//register our widget
function baw_widgetarchives_register_widgets() {
	register_widget( 'Baw_Widgetarchives_Widget_My_Archives' );
}

// use widgets_init action hook to execute custom function
add_action( 'widgets_init', 'baw_widgetarchives_register_widgets' );












/**
 * Class popular_articles
 */
class Popular_Articles extends WP_Widget {
	
	function popular_articles() {
		$widget_ops = array(
			'classname'   => 'popular_articles_class',
			'description' => __( 'Display Popular Articles.', 'finepoint' ),
		);
		parent::__construct( 'popular_articles', __( 'Custom Popular Articles Widget', 'finepoint' ), $widget_ops );
	}
	function form( $instance ) {
		$defaults = array( 'title' => '', 'number_of_post' => -1 );
		$instance = wp_parse_args( (array) $instance, $defaults );
		$title    = $instance['title'];
		$number_of_post = $instance['number_of_post'];

		?>
		<p><?php esc_html_e( 'Title:', 'finepoint' ); ?>
			<input class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p><?php esc_html_e( 'Number Of Post To Disaply:', 'finepoint' ); ?>
			<input class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'number_of_post' ) ); ?>" type="text" value="<?php echo esc_attr( $number_of_post ); ?>" />
		</p>
		<?php
	}
	function update( $new_instance, $old_instance ) {
		$instance          			= $old_instance;
		$instance['title'] 			= strip_tags( $new_instance['title'] );
		$instance['number_of_post'] = strip_tags( $new_instance['number_of_post'] );

		return $instance;
	}
	function widget( $args, $instance ) {
		extract( $args );
		echo $before_widget;
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( '', 'finepoint' ) : $instance['title'], $instance, $this->id_base );

		if ( ! empty( $title ) ) {
			echo $before_title . $title . $after_title;
		};
		
		$args = array(
			'posts_per_page'   => $instance['number_of_post'],
			'orderby'          => 'meta_value_num',
			'order'            => 'DESC',
			'meta_key'         => 'wpb_post_views_count',
			'post_type'        => 'post',
			'post_status'      => 'publish',
		);
		$posts = get_posts( $args );
		if( !empty( $posts ) ){
			foreach ( $posts as $post ) {
				echo '<div class="article">';
					if(has_post_thumbnail( $post->ID )){
						$post_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large');
						echo '<div class="img-wrapper"><img src="'. $post_image[0] .'" title="'. $post->post_title .'" alt="'. $post->post_title .'" class="greyScale" /></div>';
					}
					echo '<div class="caption"><a href="'. get_permalink( $post->ID ) .'" title="'. $post->post_title .'">'. $post->post_title .'</a></div>';
				echo '</div>';
			}
		} else {
			echo '<p>'. __('No Popular articles Found.') .'</p>';
		}		
		echo $after_widget;
	}
}
//register our widget
function popular_articles_register_widgets() {
	register_widget( 'Popular_Articles' );
}

// use widgets_init action hook to execute custom function
add_action( 'widgets_init', 'popular_articles_register_widgets' );
