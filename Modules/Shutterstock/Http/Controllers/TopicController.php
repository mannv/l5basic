<?php

namespace Modules\Shutterstock\Http\Controllers;

use App\Http\Constant;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Shutterstock\Http\Requests\CreateTopicRequest;
use Modules\Shutterstock\Repositories\CardRepository;
use Modules\Shutterstock\Repositories\TopicRepository;

class TopicController extends Controller
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
        return view('shutterstock::topic.index', $topics);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('shutterstock::topic.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateTopicRequest $request)
    {
        $params = $request->all();
        $cards = explode("\r\n", $params['cards']);
        $topic = $this->topicRepository->create(['name' => $params['name']]);
        $cardRepository = app(CardRepository::class);
        $cardRepository->createCards($cards, $topic['data']['id']);
        return redirect(route('topic.index'))->with(Constant::SUCCESS_KEY, Constant::MESSAGE_CREATE_SUCCESS);
    }
}
