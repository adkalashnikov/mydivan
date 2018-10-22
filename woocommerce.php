<?php
/**
 * Шаблон обычной страницы (page.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // подключаем header.php ?>


<?php 

    if(is_product_category(7)) {
        masterslider(2);
    }

    if(is_product_category(8)) {
        masterslider(3);
    }

    if(is_product_category(10)) {
        masterslider(4);
    }

    if(is_product_category(119)) {
        masterslider(5);
    }

    if(is_product_category(120)) {
        masterslider(9);
    }

?>





<section>
<div class="container">
<?php


if (is_product()) {
if ( have_posts() )  : // старт цикла ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class('my-prod-cat'); ?>>
	<?php woocommerce_breadcrumb(); ?>
		<?php woocommerce_content();?>
	</div>
	<?php  endif; 
}






if(is_product_category()){ 

	if ( have_posts() )  : // старт цикла ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class('my-prod-cat'); ?>>

		<?php 
			$cat = get_query_var( 'product_cat');
			echo do_shortcode('[product_category category="'.$cat.'" per_page="999" orderby="date" order="desc"]'); 
		?>

	</div>
	<?php  endif; ?>






<div class="clear"></div>

<?php

			$args = array(
			'cat' => 12,
			'posts_per_page' => 1
				);

		$query = new WP_Query( $args );

		// Цикл
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post(); ?>

			<div class="nw-item big">
				<div class="nwi-img"><?php the_post_thumbnail(array(1140, 240)); ?></div>
				<div class="nwi-title">
					<?php the_title(); ?>
				</div>
				<a href="index.php?p=399" class="nwi-more">Посмотреть</a>				
			</div>

		<?php 
			}
		} 
		wp_reset_postdata();



	} //END  if(is_product_category())
		?>

	<div class="clear"></div>


	<?php
        // Вывод текста в конце, для категорий товаров
        if(is_product_category(7)) {
            $page_data = get_page(77);
            echo "<div class=\"cat-text\">";
            echo apply_filters('the_content', $page_data->post_content);
            echo "</div>";
        }

        if(is_product_category(8)) {
            $page_data = get_page(75);
            echo "<div class=\"cat-text\">";
            echo apply_filters('the_content', $page_data->post_content);
            echo "</div>";
        }

        if(is_product_category(10)) {
            $page_data = get_page(79);
            echo "<div class=\"cat-text\">";
            echo apply_filters('the_content', $page_data->post_content);
            echo "</div>";
        }

        if(is_product_category(119)) {
            $page_data = get_page(81);
            echo "<div class=\"cat-text\">";
            echo apply_filters('the_content', $page_data->post_content);
            echo "</div>";
        }

        if(is_product_category(120)) {
            $page_data = get_page(560);
            echo "<div class=\"cat-text\">";
            echo apply_filters('the_content', $page_data->post_content);
            echo "</div>";
        }
    ?>
</div>
</section>
<?php get_footer(); ?>