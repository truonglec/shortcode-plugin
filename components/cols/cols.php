<?php 
$GLOBALS['col_count'] = 0;
$GLOBALS['cols'] = array();

$content=do_shortcode( $data->content );

?>

<div <?=isset($data->id) ? 'id="'.$data->id.'"' : '';?> class="lf-container container-fluid <?=$data->class;?>">

	<div class="row snippet-cols">
		<?php
		if( is_array( $GLOBALS['cols'] ) ) :
			foreach( $GLOBALS['cols'] as $col ) :
				$col = (object) $col;
		?>

				<div <?= !empty($col->id) ? 'id="'.$col->id.'"' : '' ?> class="col-md-<?=!empty($col->num) ? 12 / $col->num : $row_width = 12 / $GLOBALS['col_count'];?>">

				<?=$col->content;?>

				</div>
		<?php

			endforeach;
		endif;
		?>
	</div>

</div>

