<<?=!empty($data->url) ? 'a href="'.$data->url.'"' : 'div' ;?> class="snippet-cta <?=$data->position;?> <?=$data->color;?>">
	<span class="content">
		<img src="<?= !empty($data->img) ? $data->img : 'http://placehold.it/370x240' ;?>">
		<span class="info">
			<?=$data->content;?>
		</span>
	</span>
</<?=!empty($data->url) ? 'a' : 'div' ;?>>
