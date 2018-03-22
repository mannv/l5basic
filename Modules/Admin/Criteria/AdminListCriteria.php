<?php

namespace Modules\Admin\Criteria;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class AdminListCriteria.
 *
 * @package namespace Modules\Admin\Criteria;
 */
class AdminListCriteria implements CriteriaInterface
{
    /**
     * Apply criteria in query repository
     *
     * @param Model $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        $params = request()->all();
        if (!empty($params['name'])) {
            $model->where('name', 'like', '%' . $params['name'] . '%');
        }
        if (!empty($params['email'])) {
            $model->where(['email' => $params['email']]);
        }
        return $model;
    }
}
