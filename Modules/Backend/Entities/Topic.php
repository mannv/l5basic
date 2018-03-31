<?php

namespace Modules\Backend\Entities;

use App\Entities\BaseModule;

/**
 * Class Topic.
 *
 * @package namespace Modules\Backend\Entities;
 */
class Topic extends BaseModule
{
    protected $table = 'topics';
    protected $fillable = ['name'];
}
