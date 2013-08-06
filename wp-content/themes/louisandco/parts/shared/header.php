<header class="transition">
<!--
<span class="label tax label-info">Personal</span>
<span class="label tax label-info">Commercial</span>
-->
<div class="container-fluid">
	<div class="row">
		<div class="span12">
			<?php 
				wp_nav_menu( array(
				    'menu'       => 'Main',
				    'depth'      => 2,
				    'container'  => false,
				    'menu_class' => 'uppercase fsl df man mtm transition'
				));
?>

			<form class="contactForm hidden-phone" id="searchform" action="<?php bloginfo('home'); ?>/" method="get">
        <fieldset>
	        <input id="s" maxlength="150" name="s" size="20" type="text" value="" class="txt mbn" />
	        <button type="submit"><i class="icon-search"></i></button>
        </fieldset>
			</form>
			
			<?php if ( is_page_template('page-images.php') ) {
				wp_nav_menu( array(
				    'menu'       => 'Sub',
				    'depth'      => 2,
				    'container'  => false,
				    'menu_class' => 'uppercase pull-right secondMenu hidden-phone'
				));
				}
			?>
		
			
		</div>
	</div>
</div>


</header>
