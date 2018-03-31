<?php

namespace Modules\Backend\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Modules\Backend\Repositories\CardRepository;
use Modules\Backend\Entities\Card;
use Modules\Backend\Validators\CardValidator;

/**
 * Class CardRepositoryEloquent.
 *
 * @package namespace Modules\Backend\Repositories;
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
    }
    
}
