<?php

namespace Modules\Crawler\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface CustomerRepository.
 *
 * @package namespace App\Repositories;
 */
interface CustomerRepository extends RepositoryInterface
{
    public function insertMulti($data = []);
}
