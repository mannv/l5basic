<?php

namespace Modules\Shutterstock\Transformers;

use League\Fractal\TransformerAbstract;
use Modules\Shutterstock\Entities\Topic;

/**
 * Class TopicTransformer.
 *
 * @package namespace Modules\Shutterstock\Transformers;
 */
class TopicTransformer extends TransformerAbstract
{
    /**
     * Transform the Topic entity.
     *
     * @param \Modules\Shutterstock\Entities\Topic $model
     *
     * @return array
     */
    public function transform(Topic $model)
    {
        $attributes = $model->toArray();
        if (isset($attributes['card_with_image'])) {
            $attributes['cards'] = $attributes['card_with_image'];
            unset($attributes['card_with_image']);
        }
        return $attributes;
    }
}
