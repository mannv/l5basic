<?php

namespace Modules\Backend\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface LanguageRepository.
 *
 * @package namespace Modules\Backend\Repositories;
 */
interface LanguageRepository extends RepositoryInterface
{
    public function getAll();
}
