<?php

namespace Modules\Shutterstock\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Shutterstock\Repositories\ShutterstockRepository;
use Modules\Shutterstock\Repositories\TopicRepository;

class ReviewController extends Controller
{
    /**
     * @var TopicRepository
     */
    private $topicRepository;

    public function __construct(TopicRepository $topicRepository)
    {
        $this->topicRepository = $topicRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $type = $request->get('type', '');
        $topics = $this->topicRepository->getAllWithCards();
        return view('shutterstock::review.index', [
            'data' => $topics['data'],
            'type' => $type
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $id = $request->get('id', 0);
        $action = $request->get('action', '');
        $shutterstockRepository = app(ShutterstockRepository::class);
        if ($action == ShutterstockRepository::STATUS_APPROVE) {
            $shutterstockRepository->approveImage($id);
        }
        if ($action == ShutterstockRepository::STATUS_REJECT) {
            $shutterstockRepository->rejectImage($id);
        }
        return \response()->json(['id' => $id, 'action' => $action]);
    }
}
