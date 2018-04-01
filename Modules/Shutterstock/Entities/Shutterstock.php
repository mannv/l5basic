<?php

namespace Modules\Shutterstock\Entities;

use App\Entities\BaseModule;

/**
 * Class Shutterstock.
 *
 * @package namespace Modules\Backend\Entities;
 */
class Shutterstock extends BaseModule
{
    protected $table = 'shutterstocks';
    protected $fillable = ['card_id', 'shutterstock_id', 'shutterstock_url', 'status', 'downloaded'];
}
