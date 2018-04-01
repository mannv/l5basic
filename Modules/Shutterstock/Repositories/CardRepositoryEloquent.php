<?php

namespace Modules\Shutterstock\Repositories;

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
    }
    
}
