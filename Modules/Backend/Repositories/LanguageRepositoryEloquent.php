<?php

namespace Modules\Backend\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Modules\Backend\Repositories\LanguageRepository;
use Modules\Backend\Entities\Language;
use Modules\Backend\Validators\LanguageValidator;

/**
 * Class LanguageRepositoryEloquent.
 *
 * @package namespace Modules\Backend\Repositories;
 */
class LanguageRepositoryEloquent extends BaseRepository implements LanguageRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Language::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return LanguageValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
