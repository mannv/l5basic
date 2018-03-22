<?php

namespace Modules\Backend\Entities;

use App\Entities\BaseModule;


/**
 * Class Customer.
 *
 * @package namespace App\Entities;
 */
class BackendModule extends BaseModule
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->tablePrefix = '';
    }
}
