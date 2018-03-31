<?php

namespace Modules\Backend\Transformers;

use League\Fractal\TransformerAbstract;
use Modules\Backend\Entities\Topic;

/**
 * Class TopicTransformer.
 *
 * @package namespace Modules\Backend\Transformers;
 */
class TopicTransformer extends TransformerAbstract
{
    /**
     * Transform the Topic entity.
     *
     * @param \Modules\Backend\Entities\Topic $model
     *
     * @return array
     */
    public function transform(Topic $model)
    {
        return $model->toArray();
    }
}
