<?php
/*

Anchors Away Plugin for MODX Revolution
Thanks to BobRay and OpenGeek

Properties
    
    onTemplates [Texfield] [Comma separated list of template IDs] - property to specify the templates you want to run this plugin on

System Events (please check)

    OnWebPagePrerender

*/

$output =& $modx->resource->_output;

if($modx->resource->get('id')  != $modx->getOption('site_start') )  {

    if($onTemplates){
        //configured templates
        $ids = explode(',',$onTemplates);
        
        foreach($ids as $id){
        
            if(intval(trim($id)) == $modx->resource->get('template')){
                $output = str_replace('href="#', 'href="' . $_SERVER['REQUEST_URI'] . '#', $output);
            }
            
        }
        
    }else{
        //all templates
        $output = str_replace('href="#', 'href="' . $_SERVER['REQUEST_URI'] . '#', $output);
        
    }

}