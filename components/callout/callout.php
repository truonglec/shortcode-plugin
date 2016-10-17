<?php
// if( $data['img'] ) {
// 	$img = '';
// }

// if( !empty($data['position'] ) ) {
// 	$position = ' '.$data['position'];
// } else {
// 	$position = '';
// }

// if( $data['title']) {
// 	$title = '';
// }

// if( empty( $data['content'] ) ) {
// 	$content = "[ADD CONTENT]";
// }
// else{
// 	$content = do_shortcode( $data['content'] );
// }

// $return = '<div class="snippet-callout'.$position.'"><div class="wrap">';

// if( !empty( $title ) ) {
// 	$return .= '<div class="title">
// 		'.$title.'
// 	</div>';
// }

// $return .= '<div class="content">';

// if( !empty( $img ) ) {
// 	$return .= '<div class="snippet-img-wrap">
// 		<img src="'.$img.'">
// 	</div>';
// }

// $return .= '<div class="info">'.$content.'</div></div></div></div>';

// print_r( $return );

?>

<div class="snippet-callout <?= $data->postion; ?>">
	<div class="wrap">

		<?php if ($data->title) : ?>
		<div class="title">
			<?= $data->title; ?>
		</div>
		<?php endif; ?>

		<div class="content">

			<?php if ($data->img) : ?>
			<div class="snippet-img-wrap">
				<img src="<?= $data->img; ?>">
			</div>
			<?php endif; ?>

			<?= do_shortcode($data->content);?>

		</div>

	</div>
</div>