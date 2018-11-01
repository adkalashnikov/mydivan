<?php
/**
 * Шаблон поиска (search.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // подключаем header.php ?> 
<section>
<div class="container">

	<h1><?php printf('Поиск по строке: %s', get_search_query()); // заголовок поиска ?></h1>
	
	<div class="woocommerce columns-4 my-prod-cat">
	<ul class="products">

	<?php 
	$args = array(
	'posts_per_page' => -1,
	'post_type' => 'product',
	// 's' => 'keyword'
	);
	$query = new WP_Query( $args );

	if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post(); ?>

		<li id="post-<?php the_ID(); ?>" <?php post_class('product'); ?>> 

		<?php if ( has_post_thumbnail() ) the_post_thumbnail('medium'); // выводим миниатюру поста, если есть ?>
		<h3><?php the_title(); ?></h3>
		<a href="<?php the_permalink(); ?>" class="cat-more-btn single">Посмотреть</a>
		</li>


	<?php }
} else {
	// Постов не найдено
}
wp_reset_postdata(); ?>	 
	</ul>
	</div>
</div>
</section>
<?php get_footer(); // подключаем footer.php ?>


