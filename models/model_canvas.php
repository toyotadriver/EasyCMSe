<?php
class Model_Canvas extends Model{
    public $scripts = [];
    private $template = ['script' => 'requirejs.org_docs_release_2.3.6_comments_require.js', 'params' => ['data-main="game/main"']];
    function get_data(){
        $data = ['HEAD_scripts' => []];
        array_push($data['HEAD_scripts'], $this->template);
        return $data;
    }
}