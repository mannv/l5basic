<?php

namespace Modules\Backend\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ShutterstockRepository.
 *
 * @package namespace Modules\Backend\Repositories;
 */
interface ShutterstockRepository extends RepositoryInterface
{
    const STATUS_APPROVE = 'approve';
    const STATUS_REJECT = 'reject';
}
