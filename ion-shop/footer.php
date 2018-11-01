<?php
/**
 * Шаблон подвала (footer.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
?>
	<footer>
	<div class="footer1">
		<div class="container">
			<div class="f1-item f1i1">
				<a href="tel:+380674731470" class="f1-phone"><span>(067)</span> 473-14-70</a>
				<a href="mailto:ion_mebel@ukr.net" id="f1-mail">mydivane@gmail.com</a>
			</div>

			<div class="f1-item f1i2">
				<?php $args = array( 
					'theme_location' => 'bottom',
					'container'=> 'nav', // обертка списка
			  		'menu_id' => 'foo-nav', // id для ul
		  			);
					wp_nav_menu($args); // выводим верхнее меню
				?>
			</div>

			<div class="f1-item f1i3">
				<?php $args = array( 
					'theme_location' => 'bottom-tovar',
					'container'=> 'nav', // обертка списка
			  		'menu_id' => 'foo-nav2', // id для ul
		  			);
					wp_nav_menu($args); // выводим верхнее меню
				?>
			</div>

			<div class="f1-item f1i4">
				<p>
					Использование материалов 
					без письменного согласия 
					администрации сайта запрещено.
				</p>
			</div>
		</div>
	</div>
	<div class="footer2">
		<div class="container">
			<div class="f2-text">
				<p>© 2015 Интернет-магазин мягкой мебели MYDIVAN: прямые диваны, угловые диваны, <br> 
				диваны с креслом в Черкассах и регионах Украины. Все права защищены.</p>
			</div>
			<div class="f2-text2">
				Designed by <a href="http://murzak.org">Murzak</a><br>
				Powered by <a href="https://vk.com/html_developer">Adkalashnikov</a>
			</div>
		</div>
	</div>
	</footer>
<?php wp_footer(); // необходимо для работы плагинов и функционала  ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-78363425-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>