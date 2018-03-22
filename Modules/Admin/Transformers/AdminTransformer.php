<?php

namespace Modules\Admin\Transformers;

use League\Fractal\TransformerAbstract;
use Modules\Admin\Entities\Admin;

/**
 * Class AdminTransformer.
 *
 * @package namespace Modules\Admin\Transformers;
 */
class AdminTransformer extends TransformerAbstract
{
    /**
     * Transform the Admin entity.
     *
     * @param \Modules\Admin\Entities\Admin $model
     *
     * @return array
     */
    public function transform(Admin $model)
    {
        return $model->toArray();
    }
}
