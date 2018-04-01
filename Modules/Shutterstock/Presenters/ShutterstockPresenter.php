<?php

namespace Modules\Shutterstock\Presenters;

use Modules\Shutterstock\Transformers\ShutterstockTransformer;
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
