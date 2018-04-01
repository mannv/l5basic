<?php

namespace Modules\Shutterstock\Transformers;

use League\Fractal\TransformerAbstract;
use Modules\Shutterstock\Entities\Card;

/**
 * Class CardTransformer.
 *
 * @package namespace Modules\Shutterstock\Transformers;
 */
class CardTransformer extends TransformerAbstract
{
    /**
     * Transform the Card entity.
     *
     * @param \Modules\Shutterstock\Entities\Card $model
     *
     * @return array
     */
    public function transform(Card $model)
    {
        return $model->toArray();
    }
}
