<?php

namespace Modules\Shutterstock\Transformers;

use League\Fractal\TransformerAbstract;
use Modules\Shutterstock\Entities\Shutterstock;

/**
 * Class ShutterstockTransformer.
 *
 * @package namespace Modules\Shutterstock\Transformers;
 */
class ShutterstockTransformer extends TransformerAbstract
{
    /**
     * Transform the Shutterstock entity.
     *
     * @param \Modules\Shutterstock\Entities\Shutterstock $model
     *
     * @return array
     */
    public function transform(Shutterstock $model)
    {
        return $model->toArray();
    }
}
