<?php

namespace Modules\Admin\Http\Controllers;

use App\Serializer\TableRender;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Criteria\AdminListCriteria;
use Modules\Admin\Repositories\AdminRepository;

class AdminController extends Controller
{

    /**
     * @var AdminRepository
     */
    private $adminRepository;

    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $this->adminRepository->pushCriteria(app(AdminListCriteria::class));
        $result = $this->adminRepository->getPaginate();
        $tableHeader = [
            'id' => '#',
            'name' => 'Tên',
            'email' => 'Email',
            'created_at' => 'Ngày tạo'
        ];
        $functions = [
            [
                'text' => 'Sửa',
                'icon' => 'pencil',
                'route' => 'admin.edit',
                'params' => ['name' => 'id', 'field' => 'id']
            ],
            [
                'text' => 'Chi tiết',
                'route' => 'admin.show',
                'params' => ['name' => 'id', 'field' => 'id']
            ]
        ];

        $table = new TableRender('Danh sách admin', $tableHeader, $result['data'], $result['meta']['pagination']);
        $table->setFunction($functions);
        $table->setRenderCallback('id', function ($id) {
            return '<a href="' . route('admin.edit', ['id' => $id]) . '">' . $id . '</a>';
        });
        return view('admin::default.index', ['table' => $table->render()]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('admin::default.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $params = $request->all();
        dd($params);
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('admin::edit');
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
