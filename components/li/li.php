<?php 
$i = $GLOBALS['li_count'];

$content = do_shortcode( $data->content );

$GLOBALS['lis'][$i] = array( 'img' => $data->img, 'id' => $data->id, 'content' =>  $content );

$GLOBALS['li_count']++;
