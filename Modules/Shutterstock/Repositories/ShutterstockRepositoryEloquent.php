<?php

namespace Modules\Shutterstock\Repositories;

use Carbon\Carbon;
use Modules\Shutterstock\Presenters\ShutterstockPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Modules\Shutterstock\Entities\Shutterstock;

/**
 * Class ShutterstockRepositoryEloquent.
 *
 * @package namespace Modules\Shutterstock\Repositories;
 */
class ShutterstockRepositoryEloquent extends BaseRepository implements ShutterstockRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Shutterstock::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
        $this->setPresenter(app(ShutterstockPresenter::class));
    }

    public function deleteByCardId($cardId)
    {
        return $this->deleteWhere([
            'card_id' => $cardId,
            'downloaded' => false,
            'status' => ShutterstockRepository::STATUS_PENDING
        ]);
    }

    public function createIgnore($attributes)
    {
        $attributes['created_at'] = Carbon::now();
        $attributes['updated_at'] = Carbon::now();
        return $this->model->insertIgnore($attributes);
    }

    public function approveImage($id)
    {
        $this->update(['status' => ShutterstockRepository::STATUS_APPROVE], $id);
    }

    public function rejectImage($id)
    {
        $this->update(['status' => ShutterstockRepository::STATUS_REJECT], $id);
    }
}
