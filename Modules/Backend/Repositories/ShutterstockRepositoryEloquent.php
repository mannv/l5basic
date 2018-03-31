<?php

namespace Modules\Backend\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Modules\Backend\Repositories\ShutterstockRepository;
use Modules\Backend\Entities\Shutterstock;
use Modules\Backend\Validators\ShutterstockValidator;

/**
 * Class ShutterstockRepositoryEloquent.
 *
 * @package namespace Modules\Backend\Repositories;
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
