<?php
$ymlPath= __DIR__ .'/rb-shortcode.yml';
$yamlPaths = yaml_parse_file($ymlPath);

function sortArray($yamlPaths, $b) {
  return strcmp($yamlPaths["components"], $b["components"]);
}


function yaml_to_array($yml_path){
    $parsed_shortcode = (object) yaml_parse_file($yml_path);
    if ($parsed_shortcode->is_shortcode) :


        if($parsed_shortcode->options) : 

            foreach ($parsed_shortcode->options as $options => $option) {
                $option = (object) $option;
                $optionsPrint .= ' '.$option->name.'="' .$option->values. '"';
            }

        endif;

        if ($parsed_shortcode->content == "nested") : 
        
            $closeShortcode = '[/'.$parsed_shortcode->name.']';
        
        endif;
  

        if ($parsed_shortcode->vestedshortcode) :

            foreach ($parsed_shortcode->vestedshortcode as $vestedshortcodes => $vestedshortcode ) :

                $vestedshortcode = (object) $vestedshortcode;
                
                $vestedshortcode_str = $vestedshortcode->name;

               
                if ($vestedshortcode->name) :

                    foreach ($vestedshortcode->options as $key => $value) {
                        
                        $shOption = (object) $value;

                        $vestedOption = ' '.$shOption->name. '="'. $shOption->value .'"';

                    }

                endif;
                $vestedshortcode_str = '['.$vestedshortcode->name.$vestedOption.']Content goes here.[/'.$vestedshortcode->name.']';

            endforeach;
        endif;
    endif;

    $add='{ text: "'.$parsed_shortcode->title.'",  onclick: function() { editor.insertContent(\'['.$parsed_shortcode->name.$optionsPrint.']'.$vestedshortcode_str.$closeShortcode.'\'); } },';

    return $add;
   
}

?>


tinymce.PluginManager.add("rbsh_shortcodes", function(editor, url) {
    editor.addButton("rbsh_shortcodes", {
        type: "menubutton",
        tooltip: "RB Shortcodes",
        icon: "rbsh-icon",
        menu: [

            <?php
            foreach ($yamlPaths as $components => $paths) {
                
                usort($paths, 'sortArray');

                foreach ($paths as $key => $value) {
                    $filepath = '../../components/'. $value.'/'.$value.'.yml';
                    if(file_exists($filepath)){
                       print_r(yaml_to_array($filepath));
                    }
                }
            }
            ?>
            
            ]
    });
});
