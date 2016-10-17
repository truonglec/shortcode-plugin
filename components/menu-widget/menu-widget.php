<?php 
$GLOBALS['li_count'] = 0;
$GLOBALS['lis'] = array();
// $menu_widget = $data['menu'];
$content = do_shortcode( $data->content );

?>

<div class="lf-menu-widget fixed">

	<ul class="lf-menu-widget__ul">
		<?php foreach( $GLOBALS['lis'] as $menu ) : $menu = (object)$menu;  ?>

			<li>
				<a href="#<?=$menu->id;?>">
					<?=$menu->content;?>
				</a>
			</li>

		<?php endforeach ;?>
	</ul>

</div>
