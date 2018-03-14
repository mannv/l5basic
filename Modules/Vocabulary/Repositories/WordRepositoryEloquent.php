<?php

namespace Modules\Vocabulary\Repositories;

use Modules\Vocabulary\Entities\Word;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class WordRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class WordRepositoryEloquent extends BaseRepository implements WordRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Word::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
