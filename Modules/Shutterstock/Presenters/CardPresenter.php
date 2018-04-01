<?php

namespace Modules\Shutterstock\Presenters;

use Modules\Backend\Transformers\CardTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CardPresenter.
 *
 * @package namespace Modules\Backend\Presenters;
 */
class CardPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CardTransformer();
    }
}
