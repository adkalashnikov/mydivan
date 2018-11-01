<?php
/**
 * Шаблон обычной страницы (page.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // подключаем header.php ?>
<section>
<div class="container">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
           <div class="title"><h1><?php the_title(); ?></h1></div>
			
				 <?php the_content(); ?>
       <div class="clear"></div>
			
		</div>
	<?php endwhile; else: ?>
		<p>Нет такой страницы</p>
<?php endif; ?>

<div class="clear"></div>
</div>
</section>
<?php get_footer(); // подключаем footer.php ?>