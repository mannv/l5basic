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
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('shutterstock::create');
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

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('shutterstock::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('shutterstock::edit');
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
