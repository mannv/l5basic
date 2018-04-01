<?php

namespace Modules\Shutterstock\Http\Controllers;

use App\Http\Constant;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Shutterstock\Repositories\ShutterstockRepository;
use Modules\Shutterstock\Repositories\TopicRepository;

class ImageController extends Controller
{
    /**
     * @var TopicRepository
     */
    private $topicRepository;

    /**
     * @var ShutterstockRepository
     */
    private $shutterstockRepository;

    public function __construct(TopicRepository $topicRepository, ShutterstockRepository $shutterstockRepository)
    {
        $this->topicRepository = $topicRepository;
        $this->shutterstockRepository = $shutterstockRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $topicId = $request->get('topic_id', 0);
        $topic = $this->topicRepository->getTopicWithCards($topicId);
        return view('shutterstock::image.index', $topic);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $images = $request->get('image');
        foreach ($images as $cardId => $list) {
            $list = array_filter($list);
            if (empty($list)) {
                continue;
            }
            $this->shutterstockRepository->deleteByCardId($cardId);
            foreach ($list as $url) {
                $shutterstockId = validate_shutterstock_url($url);
                if ($shutterstockId == 0) {
                    continue;
                }
                $this->shutterstockRepository->createIgnore([
                    'card_id' => $cardId,
                    'shutterstock_id' => $shutterstockId,
                    'shutterstock_url' => $url
                ]);
            }
        }
        return redirect()->back()->with(Constant::SUCCESS_KEY, Constant::MESSAGE_CREATE_SUCCESS);
    }
}
