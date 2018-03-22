<?php

namespace Modules\Admin\Repositories;

use Modules\Admin\Presenters\AdminPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Modules\Admin\Repositories\AdminRepository;
use Modules\Admin\Entities\Admin;
use Modules\Admin\Validators\AdminValidator;

/**
 * Class AdminRepositoryEloquent.
 *
 * @package namespace Modules\Admin\Repositories;
 */
class AdminRepositoryEloquent extends BaseRepository implements AdminRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Admin::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
        $this->setPresenter(app(AdminPresenter::class));
    }

    public function getPaginate()
    {
        return $this->orderBy('id', 'DESC')->paginate();
    }

}
