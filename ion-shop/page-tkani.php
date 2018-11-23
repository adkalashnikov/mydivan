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

<div class="grid">
<?php 
$args = array(
	'post_parent'            => '399',
	'post_type'              => array( 'page' ),
	'posts_per_page'         => '-1',
);
$query = new WP_Query( $args );
if ( $query->have_posts() ) { while ( $query->have_posts() ) { $query->the_post(); ?>
<div class="itm">
<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
</div>
<?php } } wp_reset_postdata(); ?>
</div>
<?php

if (have_posts()) : while (have_posts()) : the_post(); ?>
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