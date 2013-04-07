<?php
/**
 * Template Name: Front Page Full Width
 * This template should be used when including WooCommerce product shortcodes
 */
	get_header();
	global $woo_options;
?>

    <div id="content" class="page col-full">
        <section class="fullwidth">
            <ul class="products">
            <?php 
            $options = get_option('barila_front');

            // 9 = total of slides +1
            for ($i=1; $i < 10; $i++) { 
                $imgurl = $options["imgurl$i"];
                $title = $options["catname$i"];
                $class = $options["class$i"];
                $link = $options["link$i"];

                echo '<li class="'.$class.' product"><a href="'.$link.'"><img src="'.$imgurl.'" /><h3 class="ct">'.$title.'</h3></a></li>';
            }
             ?>

            </ul>
		</section><!-- /#main -->

    </div><!-- /#content -->

<?php get_footer(); ?>