<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Constant;
use App\Serializer\TableRender;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Input;
use Modules\Admin\Criteria\AdminListCriteria;
use Modules\Admin\Http\Requests\CreateAdminRequest;
use Modules\Admin\Http\Requests\EditAdminRequest;
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
        return view('admin::default.form');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateAdminRequest $request)
    {
        $this->adminRepository->add($request->all());
        return redirect(route('admin.index'))->with(Constant::SUCCESS_KEY, Constant::MESSAGE_CREATE_SUCCESS);
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
    public function edit($id)
    {
        $admin = $this->adminRepository->find($id);
        return view('admin::default.form', $admin);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(EditAdminRequest $request, $id)
    {
        $this->adminRepository->edit($request->all(), $id);
        return redirect(route('admin.index'))->with(Constant::SUCCESS_KEY, Constant::MESSAGE_EDIT_SUCCESS);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
