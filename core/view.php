<?php
/**
 * @package Views
 * @subpackage View
 * @author Me
 */
class View
{
    /**
     * @param string $content_view Current content view
     * @param string $template_view Template view
     * @param string|array|int $data Data for current view
     */
    function generate($content_view, $template_view = 'view_template', $data = NULL)
    {
        include 'views/' . $template_view;
    }
    /**
     * Output just text data
     * @param string|array|int $data
     */
    function text($data)
    {
        $out = '';
        /**
         * Loop through multidimentional array
         */
        // function loopthru($pos_array) {
        //     $result = '';
        //     $tab = '  ';
        //     static $level = 0;
        //     for ($i = 0; $i < $level; $i++) {
        //         $tab .= '__';
        //     }
        //     // 'pos_' is for 'possible'
        //     if (is_array($pos_array)) {
        //         $cur_key = key($pos_array);
        //         $result .= $tab . $cur_key . '<br>';
        //         foreach ($pos_array as $pos_key => $pos_value) {
        //             $val_name = '';
        //             if (is_array($pos_value)) {
        //                 $result .= $tab . $pos_key . ' : ';
        //                 $level++;
        //                 $key = loopthru($pos_value);
        //             } else {
        //                 $key = $pos_value;
        //             }
        //             $result .= "{$tab}{$val_name}{$key}<br>";
        //         }
        //         $level = $level > 0? $level - 1: 0;
        //         return $result;
        //     } else {
        //         //$level = 0;
        //         $result = $pos_array;
        //         return $result;
        //     }
        // }
        if (is_array($data)) {
            $out = print_r($data, true);
        } else {
            $out = $data;
        }
        echo "<pre><span style='color: red'>" . htmlspecialchars($out) . "</span></pre>";
    }
}
?>