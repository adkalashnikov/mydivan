<?php
/**
 * Шаблон шапки (header.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); // вывод атрибутов языка ?>>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();  ?>/style.css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" type="text/javascript" ></script>
  <script src="<?php bloginfo('template_url');?>/js/common.js" type="text/javascript"></script>
	 <!--[if lt IE 9]>
	 <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	 <![endif]-->
	<title><?php typical_title(); // выводи тайтл, функция лежит в function.php ?></title>
	<?php wp_head(); // необходимо для работы плагинов и функционала ?>
</head>
<body <?php body_class(); // все классы для body ?>>
<div class="pad-top-head"></div>


<header>

	<div class="head-top">
		<div class="container">
			<div class="head-t-left">
				интернет-магазин мягкой мебели MYDIVAN
			</div>
			<div class="head-t-right">
				<a href="tel:+380674731470"><span>(067)</span> 473-14-70</a>
							</div>
		</div>
		<div class="my-woo-search-wrap">
			
			<div class="yith-ajaxsearchform-container">
			<div id="my-woo-search-close"></div>
				<?php //get_product_search_form(); ?>
				<?php dynamic_sidebar('left-sidebar'); // выводим сайдбар, имя определено в function.php ?>

			</div>
		</div>

	</div>

	<div class="head-main">
	<div class="container">

		<div class="head-m-logo"><a href="<?php echo home_url(); ?>"></a></div>
		<a href="#" id="head-m-nav-btn"></a>
		<a href="#" id="head-m-search-btn"></a>
	
		<?php $args = array( // опции для вывода верхнего меню, чтобы они работали, меню должно быть создано в админке
			'theme_location' => 'top', // идентификатор меню, определен в register_nav_menus() в function.php
			'container'=> 'nav', // обертка списка
	  		'menu_id' => 'main-nav', // id для ul
  			);
			wp_nav_menu($args); // выводим верхнее меню
		?>

		<div class="head-m-cart">
			<?php
	    global $woocommerce;
	    $qty = $woocommerce->cart->get_cart_contents_count();
	    $total = $woocommerce->cart->get_cart_total();
	    $cart_url = $woocommerce->cart->get_cart_url();
	        echo '<a href="'.$cart_url.'" class="cart-contents"><strong>'.$total.'</strong> ('.$qty.' тов.)</a>';
	  
			?>

		</div>

	<div class="clear"></div>	
	</div>
	</div>

	</header>


<div class="c-menu--slide-left" id="c-menu--slide-left">
	<div id="msl-logo"><a href="<?php echo home_url(); ?>"></a></div>
	<div id="close-left"></div>
	<div class="clear"></div>
	<?php $args = array( 
		'theme_location' => 'bottom',
		'container'=> 'nav', // обертка списка
  	'menu_id' => 'slideleft-nav', // id для ul
			);
		wp_nav_menu($args); // выводим верхнее меню
?>
</div>

