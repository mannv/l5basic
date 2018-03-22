<?php

namespace Modules\Admin\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface AdminRepository.
 *
 * @package namespace Modules\Admin\Repositories;
 */
interface AdminRepository extends RepositoryInterface
{
    public function getPaginate();
    public function add($attributes = []);
    public function edit($attributes = [], $id);
}
