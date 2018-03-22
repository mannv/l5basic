<?php

namespace Modules\Backend\Presenters;

use Modules\Backend\Transformers\LanguageTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class LanguagePresenter.
 *
 * @package namespace Modules\Backend\Presenters;
 */
class LanguagePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new LanguageTransformer();
    }
}
