<?php
global $woocommerce, $woo_options, $loop, $_product;
?>

<li class="best-seller <?php if ( $woo_options[ 'woo_homepage_best_selling_products_display' ] == "Grid" ) { echo 'product'; } ?>">

	<a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">
		<?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_single'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="'.$woocommerce->get_image_size('shop_single_image_width').'px" height="'.$woocommerce->get_image_size('shop_single_image_height').'px" />'; ?>


		<div class="slider-excerpt">

			<h3><?php the_title(); ?></h3>

			<?php woocommerce_template_loop_price(); ?>

			<mark class="best-seller"><?php _e('Best Seller', 'woothemes'); ?></mark>

			<?php
			if ( $woo_options[ 'woo_homepage_best_selling_products_display' ] == "Grid" ) {
			echo '<div class="excerpt">';
				the_excerpt();
			echo '</div>';
			} else {
				the_excerpt();
			}
			?>

		</div>

		<?php if ( $woo_options[ 'woo_homepage_best_selling_products_display' ] == "Grid" ) { ?>

		<?php do_action('woocommerce_after_shop_loop_item'); ?>

		<?php } ?>

	</a>

</li>