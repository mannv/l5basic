<?php

namespace Modules\Backend\Presenters;

use Modules\Backend\Transformers\TopicTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TopicPresenter.
 *
 * @package namespace Modules\Backend\Presenters;
 */
class TopicPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TopicTransformer();
    }
}
