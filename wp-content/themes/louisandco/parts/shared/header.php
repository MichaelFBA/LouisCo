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
