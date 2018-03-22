<?php

namespace Modules\Backend\Http\Controllers;

use App\Serializer\TableRender;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Backend\Repositories\LanguageRepository;

class LanguageController extends BackendController
{
    /**
     * @var LanguageRepository
     */
    private $languageRepository;

    public function __construct(LanguageRepository $languageRepository)
    {
        $this->languageRepository = $languageRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $result = $this->languageRepository->all();
        $tableHeader = [
            'id' => '#',
            'code' => 'Mã',
            'name' => 'Ngôn ngữ',
            'created_at' => 'Ngày tạo'
        ];
        $functions = [
            [
                'text' => 'Sửa',
                'icon' => 'pencil',
                'route' => 'language.edit',
                'params' => ['name' => 'id', 'field' => 'id']
            ]
        ];

        $table = new TableRender('Ngôn ngữ', $tableHeader, $result['data']);
        $table->setFunction($functions);
        $table->setCreateUrl(route('language.create'));
        return view('backend::language.index', ['table' => $table->render()]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('backend::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('backend::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('backend::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
