<?php
/**
 * Функции шаблона (function.php)
 * @package WordPress
 * @subpackage your-clean-template
 */

function typical_title() { // функция вывода тайтла
	global $page, $paged; // переменные пагинации должны быть глобыльными
	wp_title('|', true, 'right'); // вывод стандартного заголовка с разделителем "|"
	bloginfo('name'); // вывод названия сайта
	$site_description = get_bloginfo('description', 'display'); // получаем описание сайта
	if ($site_description && (is_home() || is_front_page())) //если описание сайта есть и мы на главной
		echo " | $site_description"; // выводим описание сайта с "|" разделителем
	if ($paged >= 2 || $page >= 2) // если пагинация была использована
		echo ' | '.sprintf(__( 'Страница %s'), max($paged, $page)); // покажем номер страницы с "|" разделителем
}

register_nav_menus(array( // Регистрируем 2 меню
	'top' => 'Верхнее', // Верхнее
	'bottom' => 'Футер',
	'bottom-tovar' => 'Футер2'
));

add_theme_support('post-thumbnails'); // включаем поддержку миниатюр

register_sidebar(array( // регистрируем левую колонку, этот кусок можно повторять для добавления новых областей для виджитов
	'name' => 'Колонка слева', // Название в админке
	'id' => "left-sidebar", // идентификатор для вызова в шаблонах
	'description' => 'Обычная колонка в сайдбаре', // Описалово в админке
	'before_widget' => '<div id="%1$s" class="widget %2$s">', // разметка до вывода каждого виджета
	'after_widget' => "</div>\n", // разметка после вывода каждого виджета
	'before_title' => '<span class="widgettitle">', //  разметка до вывода заголовка виджета
	'after_title' => "</span>\n", //  разметка после вывода заголовка виджета
));










// ========================================================================================
// ========================================= woocommerce



add_theme_support( 'woocommerce' );

//Аяскс обновление корзины в хедере... Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );
function woocommerce_header_add_to_cart_fragment( $fragments ) {
	ob_start();

	global $woocommerce;
    $qty = $woocommerce->cart->get_cart_contents_count();
    $total = $woocommerce->cart->get_cart_total();
    $cart_url = $woocommerce->cart->get_cart_url();
        echo '<a href="'.$cart_url.'" class="cart-contents"><strong>'.$total.'</strong> ('.$qty.' тов.)</a>';

	
	$fragments['a.cart-contents'] = ob_get_clean();
	
	return $fragments;
}


// Разрешаем HTML-Код В Описании Рубрик WooCommerce
foreach ( array( 'pre_term_description' ) as $filter ) {
remove_filter( $filter, 'wp_filter_kses' );
}
foreach ( array( 'term_description' ) as $filter ) {
remove_filter( $filter, 'wp_kses_data' );
}


// Изменить текст кнопки “Добавить в Корзину” на стр. товара
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text' );    // 2.1 +
 
function woo_custom_cart_button_text() {
 
        return __( 'Купить', 'woocommerce' );
 
}


// Используем формат цены вариативного товара WC 2.0
add_filter( 'woocommerce_variable_sale_price_html', 'wc_wc20_variation_price_format', 10, 2 );
add_filter( 'woocommerce_variable_price_html', 'wc_wc20_variation_price_format', 10, 2 );
function wc_wc20_variation_price_format( $price, $product ) {
	// Основная цена
	$prices = array( $product->get_variation_price( 'min', true ), $product->get_variation_price( 'max', true ) );
	$price = $prices[0] !== $prices[1] ? sprintf( __( '%1$s', 'woocommerce' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );
	// Цена со скидкой
	$prices = array( $product->get_variation_regular_price( 'min', true ), $product->get_variation_regular_price( 'max', true ) );
	sort( $prices );
	$saleprice = $prices[0] !== $prices[1] ? sprintf( __( '%1$s', 'woocommerce' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );

	if ( $price !== $saleprice ) {
		$price = '<del>' . $saleprice . '</del> <ins>' . $price . '</ins>';
	}
	return $price;
}


// Вывод категории товара перед названием, на карточках 
function wpa89819_wc_single_product(){

    $product_cats = wp_get_post_terms( get_the_ID(), 'product_cat' );

    if ( $product_cats && ! is_wp_error ( $product_cats ) ){

        $single_cat = array_shift( $product_cats ); ?>

        <div class="product_category_title"><?php echo $single_cat->name; ?></div>

<?php }
}
add_action( 'woocommerce_shop_loop_item_title', 'wpa89819_wc_single_product', 2 );


// Вывод категории товара перед названием, на странице товара
function wpa89819_wc_single_product2(){

    $product_cats = wp_get_post_terms( get_the_ID(), 'product_cat' );

    if ( $product_cats && ! is_wp_error ( $product_cats ) ){

        $single_cat = array_shift( $product_cats ); ?>

        <div class="single-product_category_title"><?php echo $single_cat->name; ?></div>

<?php }
}
add_action( 'woocommerce_single_product_summary', 'wpa89819_wc_single_product2', 2 );




// убираем мета описание на стр товара
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
// убираем табы на стр товара
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);


// exerpt of single product
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 60);



// Вывод тканей и описания на стр товара
function my_single_prod_text(){
	
	echo "<div class=\"my-line\"></div>
			<div class=\"single-product-atr-title tkan\">Подбор ткани для мягкой мебели</div>
			<p>";
				
			$tkanCat1 = get_field('tk-cat1', 399);
			foreach ($tkanCat1 as $tkan => $tkanOptions) {
				//
				if($tkanOptions['tk-t-show'][0] == 'да') { 
					$imgUrl = $tkanOptions['tk-t-img']['url'];
					$title = $tkanOptions['tk-t-name'];
					?>

					<div class="tkan-single-item">
						<img class="tkan-single-img" src="<?php echo $imgUrl; ?>" alt="">
						<div class="tkan-single-pop">
							<img class="tkan-single-imgb" src="<?php echo $imgUrl; ?>"  />
							<div class="tkp-item-name"><?php echo  $title; ?></div>
						</div>
					</div>
				<? }
			}

			$tkanCat2 = get_field('tk-cat2', 399);
			foreach ($tkanCat2 as $tkan => $tkanOptions) {
				//
				if($tkanOptions['tk-t-show'][0] == 'да') { 
					$imgUrl = $tkanOptions['tk-t-img']['url'];
					$title = $tkanOptions['tk-t-name'];
					?>

					<div class="tkan-single-item">
						<img class="tkan-single-img" src="<?php echo $imgUrl; ?>" alt="">
						<div class="tkan-single-pop">
							<img class="tkan-single-imgb" src="<?php echo $imgUrl; ?>"  />
							<div class="tkp-item-name"><?php echo  $title; ?></div>
						</div>
					</div>
				<? }
			}

			$tkanCat3 = get_field('tk-cat3', 399);
			foreach ($tkanCat3 as $tkan => $tkanOptions) {
				//
				if($tkanOptions['tk-t-show'][0] == 'да') { 
					$imgUrl = $tkanOptions['tk-t-img']['url'];
					$title = $tkanOptions['tk-t-name'];
					?>

					<div class="tkan-single-item">
						<img class="tkan-single-img" src="<?php echo $imgUrl; ?>" alt="">
						<div class="tkan-single-pop">
							<img class="tkan-single-imgb" src="<?php echo $imgUrl; ?>"  />
							<div class="tkp-item-name"><?php echo  $title; ?></div>
						</div>
					</div>
				<? }
			}


			// echo "<pre>";
			// print_r($tkanOptions);
			// echo "</pre>";
			echo "</p>
			<div class=\"clear\"></div>
			<div class=\"my-tkan-text\">
			<p>Цена на изделие указана в 3 категории ткани. 
				Стоимость дивана в других категориях ткани просчитывается менеджером интернет-магазина мягкой мебели MYDIVAN индивидуально.
			</p>
			<a href='index.php?p=399'>показать больше тканей</a>
			</div>";
}
add_action('woocommerce_single_product_summary', 'my_single_prod_text', 57);

function my_single_prod_hr(){
	echo "<div class=\"my-line\"></div>";
}
add_action('woocommerce_single_product_summary', 'my_single_prod_hr', 58);


function my_single_prod_exerpt_title(){
	echo "<div class='single-product-exr-title'>Описание изделия</div>";
}
add_action('woocommerce_single_product_summary', 'my_single_prod_exerpt_title', 59);


/**
* WooCommerce: выводим все пользовательские свойства товара над кнопкой "Добавить в корзину" на странице отдельного товара.
*/
function devise_woo_all_pa(){
 
    global $product;
    $attributes = $product->get_attributes(); ?>

 		<div class="single-product-atributes">
 		<?php
    foreach ( $attributes as $attribute ) :
		if ( empty( $attribute['is_visible'] ) || ( $attribute['is_taxonomy'] && ! taxonomy_exists( $attribute['name'] ) ) ) {
			continue;
		} else {
			$has_row = true;
		}
		?>
		<div class="single-product-atr-item">
			<div class="single-product-atr-title"><?php echo wc_attribute_label( $attribute['name'] ); ?></div>
			<div class="single-product-atr-text"><?php
				if ( $attribute['is_taxonomy'] ) {

					$values = wc_get_product_terms( $product->id, $attribute['name'], array( 'fields' => 'names' ) );
					echo apply_filters( 'woocommerce_attribute', wpautop( wptexturize( implode( ', ', $values ) ) ), $attribute, $values );

				} else {

					// Convert pipes to commas and display values
					$values = array_map( 'trim', explode( WC_DELIMITER, $attribute['value'] ) );
					echo apply_filters( 'woocommerce_attribute', wpautop( wptexturize( implode( ', ', $values ) ) ), $attribute, $values );

				}
			?></div>
			</div>
	<?php endforeach; ?>
	<div class="clear"></div>
	</div>

<?php
 
}
  
add_action('woocommerce_after_single_product_summary', 'devise_woo_all_pa', 5);

remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

// **********************************************************************// 
// ! Search form popup
// **********************************************************************//  






// запрет обновления выборочных плагинов
// function filter_plugin_updates( $update ) {    
//     global $DISABLE_UPDATE; // см. wp-config.php
//     if( !is_array($DISABLE_UPDATE) || count($DISABLE_UPDATE) == 0 ){  return $update;  }
//     foreach( $update->response as $name => $val ){
//         foreach( $DISABLE_UPDATE as $plugin ){
//             if( stripos($name,$plugin) !== false ){
//                 unset( $update->response[ $name ] );
//             }
//         }
//     }
//     return $update;
// }
// add_filter( 'site_transient_update_plugins', 'filter_plugin_updates' );


	
	



?>
