<div class="lf-quote <?=isset($data->position)? 'lf-quote__'.$data->position : '';?> <?=isset($data->border)? 'lf-quote__border-'.$data->border : '';?> <?=$data->border == 'top-bottom' ? ($data->position!= 'full' ? ' lf-quote__spacing-small': ' lf-quote__spacing-big') : ($data->position== 'left' ? ' lf-quote__spacing-big' : ' lf-quote__spacing-small');?>">
	<div class="content">

		<?=$data->content;?>

		<?php if( $data->by ) :?>
			<cite>
				<?=$data->by;?>
			</cite>
		<?php endif;?>
	</div>
</div>
