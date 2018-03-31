<?php

namespace Modules\Backend\Transformers;

use League\Fractal\TransformerAbstract;
use Modules\Backend\Entities\Shutterstock;

/**
 * Class ShutterstockTransformer.
 *
 * @package namespace Modules\Backend\Transformers;
 */
class ShutterstockTransformer extends TransformerAbstract
{
    /**
     * Transform the Shutterstock entity.
     *
     * @param \Modules\Backend\Entities\Shutterstock $model
     *
     * @return array
     */
    public function transform(Shutterstock $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
