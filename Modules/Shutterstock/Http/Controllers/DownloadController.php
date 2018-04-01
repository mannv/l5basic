<?php

namespace Modules\Shutterstock\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Shutterstock\Repositories\ShutterstockRepository;

class DownloadController extends Controller
{
    /**
     * @var ShutterstockRepository
     */
    private $repository;

    public function __construct(ShutterstockRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $images = $this->repository->getImageNeedDownload();
        return view('shutterstock::download.index', $images);
    }
}
