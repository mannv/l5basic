<?php

namespace Modules\Backend\Transformers;

use League\Fractal\TransformerAbstract;
use Modules\Backend\Entities\Card;

/**
 * Class CardTransformer.
 *
 * @package namespace Modules\Backend\Transformers;
 */
class CardTransformer extends TransformerAbstract
{
    /**
     * Transform the Card entity.
     *
     * @param \Modules\Backend\Entities\Card $model
     *
     * @return array
     */
    public function transform(Card $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
