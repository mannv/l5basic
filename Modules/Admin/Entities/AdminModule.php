<?php

namespace Modules\Admin\Entities;

use App\Entities\BaseModule;


/**
 * Class Customer.
 *
 * @package namespace App\Entities;
 */
class AdminModule extends BaseModule
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->tablePrefix = '';
    }
}
