<?php
/**
 * tag template (tag.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // подключаем header.php ?> 
<section>
<div class="container">
	<h1><?php printf('Посты с тэгом: %s', single_tag_title('', false)); // заголовок тэга ?></h1>
	<?php if (have_posts()) : while (have_posts()) : the_post(); // если посты есть - запускаем цикл wp ?>
		<?php get_template_part('loop'); // для отображения каждой записи берем шаблон loop.php ?>
	<?php endwhile; ?>
	</div>	 
</section>
<?php get_footer(); // подключаем footer.php ?>