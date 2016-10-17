<div class="snippet-img <?=$data->position;?> <?= !empty($data->breakout) ? 'img-breakout__'.$data->breakout : ''; ?>">
	<div class="content">
		<?php if( !empty($data->modal)) : ?>
		<a href="<?=$data->src;?>" data-plugin="popup" data-type="image">
		<?php endif; ?>
			<img src="<?=$data->src;?>" alt="<?=$data->alt;?>">
		<?php if( !empty($data->modal)) : ?>
		</a>
		<?php endif; ?>
		
		<?php if( !empty( $content ) ) : ?>
				<div class="caption <?= !empty($data->overlay) ? $data->overlay : '' ;?>">
					<?=$data->content;?>
				</div>
		<?php endif;?>

	</div>
</div>
