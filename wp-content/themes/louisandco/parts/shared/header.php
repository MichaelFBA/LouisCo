<header class="transition">

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
			
			<?php 
				wp_nav_menu( array(
				    'menu'       => 'Sub',
				    'depth'      => 2,
				    'container'  => false,
				    'menu_class' => 'uppercase pull-right secondMenu'
				));
			?>
			
		</div>
	</div>
</div>


</header>
