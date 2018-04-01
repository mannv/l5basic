<?php

namespace Modules\Shutterstock\Repositories;

use Modules\Shutterstock\Presenters\CardPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Modules\Shutterstock\Entities\Card;

/**
 * Class CardRepositoryEloquent.
 *
 * @package namespace Modules\Shutterstock\Repositories;
 */
class CardRepositoryEloquent extends BaseRepository implements CardRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Card::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
        $this->setPresenter(app(CardPresenter::class));
    }

    public function createCards($cards, $topicId)
    {
        if (empty($cards)) {
            return;
        }
        $cards = array_unique($cards);
        foreach ($cards as $cardName) {
            $name = trim($cardName);
            if (empty($name)) {
                continue;
            }
            $this->create(['topic_id' => $topicId, 'name' => $name]);
        }
    }

}
