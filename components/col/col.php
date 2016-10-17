<?php 
$x = $GLOBALS['col_count'];

$content = do_shortcode( $data->content );

$GLOBALS['cols'][$x] = array( 'content' =>  $content, 'num' => $data->num, 'id' => $data->id );

$GLOBALS['col_count']++;
