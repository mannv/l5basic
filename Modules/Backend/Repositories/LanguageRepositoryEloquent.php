<?php

namespace Modules\Backend\Repositories;

use Modules\Backend\Presenters\LanguagePresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Modules\Backend\Entities\Language;

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
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
        $this->setPresenter(app(LanguagePresenter::class));
    }

    public function getAll()
    {
        return $this->orderBy('id')->all();
    }

}
