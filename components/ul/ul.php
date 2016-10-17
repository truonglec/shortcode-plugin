<?php 
$GLOBALS['li_count'] = 0;
$GLOBALS['lis'] = array();
$content = do_shortcode( $data->content );
?>

<ul class="snippet-list">
	<?php foreach( $GLOBALS['lis'] as $li ) : $li = (object)$li; ?>
		<li>
			<div class="content">
				<?=$li->content;?>
			</div>
		</li>
	<?php endforeach;?>

</ul>