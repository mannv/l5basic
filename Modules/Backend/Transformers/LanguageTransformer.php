<?php

namespace Modules\Backend\Transformers;

use League\Fractal\TransformerAbstract;
use Modules\Backend\Entities\Language;

/**
 * Class LanguageTransformer.
 *
 * @package namespace Modules\Backend\Transformers;
 */
class LanguageTransformer extends TransformerAbstract
{
    /**
     * Transform the Language entity.
     *
     * @param \Modules\Backend\Entities\Language $model
     *
     * @return array
     */
    public function transform(Language $model)
    {
        return $model->toArray();
    }
}
