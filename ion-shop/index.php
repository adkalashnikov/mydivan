<?php
/*
Template Name: Главная
*/
get_header(); // подключаем header.php ?> 

<div id="first-window">
<div >
	<?php

	$args = array(
	'page_id' => 18,
		);

		$query = new WP_Query( $args );

		// Цикл
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				the_content();
			}
		} else {
			// Постов не найдено
		}
		/* Возвращаем оригинальные данные поста. Сбрасываем $post. */
		wp_reset_postdata();

	 ?>	

</div>

	
<div class="front-p-why">
<div class="container">
	
	<div class="fp-why-item w-it1">
		<span>почему</span><br>
		 покупают у нас?
	</div>
	<div class="fp-why-item w-it2">Доступные<br> цены</div>
	<div class="fp-why-item w-it3">Большой<br> выбор обивки</div>
	<div class="fp-why-item w-it4">гарантия от<br> производителя</div>
	<div class="fp-why-item w-it5">Быстрая<br> доставка</div>

</div>
</div>
</div>


<section class="content">

<div class="front-p-cat">
<div class="container">
	
	<div>
	<div class="fp-cat-50 fpc1">
		<?php echo do_shortcode('[product_categories ids="220" number="12" parent="0" columns="1"]');
		  ?>
	</div>	
	<div class="fp-cat-50 fpc2">
		<?php echo do_shortcode('[product_categories ids="8" number="12" parent="0" columns="1"]'); ?>
	</div>
	<div class="clear"></div>
	<div class="fp-cat-100">
		<?php echo do_shortcode('[product_categories ids="10" number="12" parent="0" columns="1"]'); ?>
	</div>
	</div>
	
	<div id="news-slider">
		<?php

			$args = array(
			'cat' => 11,
			'posts_per_page' => 3
				);

		$query = new WP_Query( $args );

		// Цикл
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post(); ?>

			<div class="nw-item">
				<div class="nwi-img"><?php the_post_thumbnail(array(360, 240)); ?></div>
				<div class="nwi-title">
					<?php the_title(); ?>
				</div>
				<a href="<?php the_permalink(); ?>" class="nwi-more">Посмотреть</a>				
			</div>

		<?php 
			}
		} else {
			// Постов не найдено
		}
		/* Возвращаем оригинальные данные поста. Сбрасываем $post. */
		wp_reset_postdata();
		?>
		<div class="clear"></div>
		</div>

		<div id="fp-bestsell">
			<div class="fp-block-title">Популярные модели</div>
			<?php echo do_shortcode('[best_selling_products per_page="8" columns="4"]'); ?>
		</div>

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
		?>

		<div class="clear"></div>
		<?php
		$args = array(
		'page_id' => 18,
		);
		$query = new WP_Query( $args );
		// Цикл
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
			$query->the_post(); ?>	

		<div class="fp-text">
			<?php the_field('main-text'); ?>
		</div>

		<?php
			}
		} else {
			// Постов не найдено
		}
		wp_reset_postdata();
	 ?>	
</div>
</div>
<div class="clear"></div>
</section>
<?php get_footer(); // подключаем footer.php ?>