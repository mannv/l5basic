<?php

namespace Modules\Backend\Presenters;

use Modules\Backend\Transformers\ShutterstockTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ShutterstockPresenter.
 *
 * @package namespace Modules\Backend\Presenters;
 */
class ShutterstockPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ShutterstockTransformer();
    }
}
