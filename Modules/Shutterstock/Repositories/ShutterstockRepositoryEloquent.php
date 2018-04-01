<?php

namespace Modules\Shutterstock\Repositories;

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
    }
    
}
