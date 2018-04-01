<?php

namespace Modules\Shutterstock\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Modules\Shutterstock\Entities\Topic;

/**
 * Class TopicRepositoryEloquent.
 *
 * @package namespace Modules\Shutterstock\Repositories;
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
