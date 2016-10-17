<?php 
namespace Rb\Shortcodes;

use Rb\Component;

add_action( 'init', function(){
    if( is_admin() ) {
        wp_enqueue_style( 'rbsh_admin_style', get_template_directory_uri().'/functions/rb-shortcode/assets/css/rb-shortcode-admin.css' );
    }

    if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
        return;
    }

    if ( get_user_option( 'rich_editing' ) == 'true' ) {

        add_filter( 'mce_external_plugins', 
            function($plgs){
                $plgs[ 'rbsh_shortcodes' ] = get_template_directory_uri().'/functions/rb-shortcode/rb-shortcode-btn-js.php';
                return $plgs;
            }
        );
        add_filter( 'mce_buttons', 
            function( $buttons ){
                array_push( $buttons, 'rbsh_shortcodes' );
                return $buttons;
            }
        );
    }
});

$yml_path= __DIR__ .'/rb-shortcode.yml';
$yamlPaths = (object) yaml_parse_file($yml_path);


foreach ($yamlPaths as $components => $paths) {

    foreach ($paths as $key => $name) {
        
        $filepath = get_template_directory() . '/components/' . $name.'/'.$name.'.yml';

        if(file_exists($filepath)){
          make_shortcodes($filepath);
        }
    }
}

/**
 * Clean `$content` of empty paragraphs
 */
function clean_content($string) {
    $patterns = array(
        '#^\s*</p>#',
        '#<p>\s*$#',
        '#<p>(\s|&nbsp;)*+(<br\s*/*>)?(\s|&nbsp;)*</p>#'
    );
    // $patterns = '#<p>(\s|&nbsp;)*+(<br\s*/*>)?(\s|&nbsp;)*</p>#i';

    return preg_replace($patterns, '', $string);
}

function make_shortcodes($yamlPath, $isDebug = false) {
    $manifest = (object) yaml_parse_file($yamlPath);

    if (isset($manifest->options) && count($manifest->options)) {
        foreach ($manifest->options as $option) {
            // TODO: add value validation on option values
            // TODO: add validation for required fields
            $defaults[$option['name']] = isset($option['default'])
                ? $option['default'] : '';
        }
    }

    make_shortcode($manifest, $defaults, $isDebug);
}

function make_shortcode($manifest, $defaults, $isDebug) {
    if ($isDebug) {
        \debug("Make Shortcode: $manifest->name");
        \debug($manifest);
        \debug($defaults);
    }
    add_shortcode(
        $manifest->name,
        function($attrs, $content) use ($defaults, $manifest) {
            if (isset($manifest->content) && $manifest->content) {
                $content = clean_content($content);
                if ( $manifest->content === 'nested' && !isset($manifest->vestedshortcode) ) {
                    $content = do_shortcode($content);
                }
                

                $defaults['content'] = $content;
            }
            $path = "/components/$manifest->name/$manifest->name.php";
            $data = shortcode_atts($defaults, $attrs);

            return get_html_with($path, (object)$data);
        }
    );
}