<?php
/**
 * @package Views
 * @subpackage View
 * @author Me
 */
class View{
    /**
    * @param string $content_view Current content view
    * @param string $template_view Template view
    * @param string|array|int $data Data for current view
    */
    function generate($content_view,  $template_view, $data = NULL){
        include 'views/' . $template_view;
    }
}
?>