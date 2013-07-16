<?php
/**
 * Template Name: Photographer
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<?php
$taxArray = array();
$rows = get_field('image_gallery_lco');
if($rows){
 foreach($rows as $row){
		forEach($row['sub_taxonomy'] as $a){
			$taxName = get_term_by( 'id', $a, 'post_tag' );
			
			//Check if in array - add if 
			if (!in_array($taxName->name, $taxArray)) {
				array_push($taxArray,$taxName->name);
			}
			
		};  
	} 
} 
?>
<div class="packery">

<?php
$rows = get_field('image_gallery_lco');
if($rows){ ?>
 <?php foreach($rows as $row){?>
		<div class="itemPack" data-tag="<?php forEach($row['sub_taxonomy'] as $a){$taxName = get_term_by( 'id', $a, 'post_tag' );echo $taxName->name . ' ';}  ?>">
  		<img  src="<?php echo $row['sub_images'] ?>" />
  	</div>
	<?php } ?>
<?php } ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>