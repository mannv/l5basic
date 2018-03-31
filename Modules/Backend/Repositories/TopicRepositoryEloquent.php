<?php

namespace Modules\Backend\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Modules\Backend\Repositories\TopicRepository;
use Modules\Backend\Entities\Topic;
use Modules\Backend\Validators\TopicValidator;

/**
 * Class TopicRepositoryEloquent.
 *
 * @package namespace Modules\Backend\Repositories;
 */
class TopicRepositoryEloquent extends BaseRepository implements TopicRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Topic::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
