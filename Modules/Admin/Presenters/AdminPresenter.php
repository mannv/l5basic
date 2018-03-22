<?php

namespace Modules\Admin\Presenters;

use Modules\Admin\Transformers\AdminTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class AdminPresenter.
 *
 * @package namespace Modules\Admin\Presenters;
 */
class AdminPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new AdminTransformer();
    }
}
