<?php
/**
 * Template Name: Ткани
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // подключаем header.php ?>

<?php masterslider(7); ?>
<section>
<div class="container">


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">

		<?php if( have_rows('tk-cat1') ): ?>

		<?php 
			$field_name = "tk-cat1";
			$field = get_field_object($field_name);
		?>

		<div class="tk-cat-t"><?php echo $field['label'] ?></div>
		<div class="clear"></div>
		<div class="tk-box">
		<?php while( have_rows('tk-cat1') ): the_row();  
			// vars
			$image = get_sub_field('tk-t-img');
			$name = get_sub_field('tk-t-name');

		  if( $image ): ?>
				<div class="tkp-item">
					<img class="tkp-item-img" src="<?php echo $image['url']; ?>"  />
					<div class="tkp-item-name"><?php echo  $name; ?></div>
				</div>
			<?php endif; ?>

		<?php endwhile; ?>
		</div>
		<?php endif; ?>


		<div class="clear"></div>
		<?php if( have_rows('tk-cat2') ): ?>

		<?php 
			$field_name = "tk-cat2";
			$field = get_field_object($field_name);
		?>
		<div class="clear"></div>

		<div class="tk-cat-t"><?php echo $field['label'] ?></div>
		<div class="clear"></div>
		<div class="tk-box">
		<?php while( have_rows('tk-cat2') ): the_row();  
			// vars
			$image = get_sub_field('tk-t-img');
			$name = get_sub_field('tk-t-name');

		  if( $image ): ?>
				<div class="tkp-item">
					<img class="tkp-item-img" src="<?php echo $image['url']; ?>"  />
					<div class="tkp-item-name"><?php echo  $name; ?></div>
				</div>
			<?php endif; ?>

		<?php endwhile; ?>
		</div>
		<?php endif; ?>


		<div class="clear"></div>
		<?php if( have_rows('tk-cat3') ): ?>

		<?php 
			$field_name = "tk-cat3";
			$field = get_field_object($field_name);
		?>
		<div class="clear"></div>

		<div class="tk-cat-t"><?php echo $field['label'] ?></div>
		<div class="clear"></div>
		<div class="tk-box">
		<?php while( have_rows('tk-cat3') ): the_row();  
			// vars
			$image = get_sub_field('tk-t-img');
			$name = get_sub_field('tk-t-name');

		  if( $image ): ?>
				<div class="tkp-item">
					<img class="tkp-item-img" src="<?php echo $image['url']; ?>"  />
					<div class="tkp-item-name"><?php echo  $name; ?></div>
				</div>
			<?php endif; ?>

		<?php endwhile; ?>
		</div>
		<?php endif; ?>



				<div class="clear"></div>
				 <?php the_content(); ?>
       <div class="clear"></div>
			
		</div>
	<?php endwhile; else: ?>
		<p></p>
<?php endif; ?>

<div class="clear"></div>
</div>
</section>
<?php get_footer(); // подключаем footer.php ?>