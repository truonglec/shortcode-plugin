<?php
$GLOBALS['li_count'] = 0;
$GLOBALS['lis'] = array();
$content = do_shortcode( $data->content );

?>

<ul class="snippet-list-icons">

	<?php
	foreach( $GLOBALS['lis'] as $li ) :
		$li = (object)$li;
	
	?>
		<li <?=!empty( $li->img ) ? 'class="wrap-img"' : ''; ?>>

			<?php if( !empty( $li->img ) ) : ?>
			<img src="<?=$li->img;?>" alt="<?=$li->content;?>">
			<?php endif;?>


		<div class="content">
			<?=$li->content;?>
		</div>
	</li>

	<?php endforeach;?>

</ul>
