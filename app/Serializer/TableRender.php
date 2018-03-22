<?php
/**
 * Created by PhpStorm.
 * User: man.nv
 * Date: 3/22/18
 * Time: 1:24 PM
 */

namespace App\Serializer;

class TableRender
{
    private $caption = '';
    private $header = [];
    private $data = [];
    private $paginate = '';
    private $functions = [];
    private $renderCallback = [];

    public function __construct($caption, $header, $data, $paginate)
    {
        $this->caption = $caption;
        $this->header = $header;
        $this->data = $data;
        $this->paginate = $paginate;
    }

    /**
     * @param $functions
     * [
     *      'text' => 'Sửa',
     *      'icon' => 'pencil',
     *      'route' => 'admin.edit',
     *      'params' => ['name' => 'id', 'field' => 'id']
     * ]
     */
    public function setFunction($functions)
    {
        $this->functions = $functions;
    }

    /**
     * @param $field
     * @param $cb
     * sample
     * $table->setRenderCallback('id', function($id){
     *      return 'test ' . $id;
     * });
     */
    public function setRenderCallback($field, $cb)
    {
        $this->renderCallback[$field] = $cb;
    }

    public function render()
    {
        return view('table', [
            'caption' => $this->caption,
            'header' => $this->header,
            'data' => $this->data,
            'paginate' => $this->paginate,
            'functions' => $this->functions,
            'renderCallback' => $this->renderCallback
        ]);
    }
}
