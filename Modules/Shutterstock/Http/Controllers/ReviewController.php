<?php

namespace Modules\Shutterstock\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
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
    public function index()
    {
        $topics = $this->topicRepository->getAllWithCards();
        return view('shutterstock::review.index', $topics);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }
}
