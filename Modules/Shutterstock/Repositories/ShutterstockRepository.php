<?php

namespace Modules\Shutterstock\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ShutterstockRepository.
 *
 * @package namespace Modules\Shutterstock\Repositories;
 */
interface ShutterstockRepository extends RepositoryInterface
{
    const STATUS_APPROVE = 'approve';
    const STATUS_REJECT = 'reject';

    public function deleteByCardId($cardId);
    public function createIgnore($attributes);
}