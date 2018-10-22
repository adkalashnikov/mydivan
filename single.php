<?php
/**
 * Шаблон отдельной записи (single.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // подключаем header.php ?>
<section>
<div class="container">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); // старт цикла ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> <?php // контэйнер с классами и id ?>
		<h1><?php the_title(); // заголовок поста ?></h1>
		
		<?php the_content(); // контент ?>
	</article>
<?php endwhile; // конец цикла ?>

</div>
</section>
<?php get_footer(); // подключаем footer.php ?>
