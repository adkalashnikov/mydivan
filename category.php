<?php
/**
 * Шаблон рубрики (category.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // подключаем header.php ?> 

<?php echo do_shortcode('[masterslider id="8"]'); ?>

<section>
<div class="container cat-container">

<?php if (have_posts()) : while (have_posts()) : the_post();  ?>
	
		<div class="nw-item cat">
			<div class="nwi-img"><?php the_post_thumbnail(array(360, 240)); ?></div>
			<div class="nwi-title">
				<?php the_title(); ?>
			</div>
			<a href="<?php the_permalink(); ?>" class="nwi-more">Посмотреть</a>				
		</div>

<?php endwhile; // конец цикла
	else: echo '<h2>Нет записей.</h2>'; endif; // если записей нет, напишим "простите" ?>	
<div class="clear"></div>
</div>


</section>
<div class="clear"></div>
<?php get_footer(); // подключаем footer.php ?>