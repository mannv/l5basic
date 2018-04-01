<?php

namespace Modules\Shutterstock\Entities;

/**
 * Class Shutterstock.
 *
 * @package namespace Modules\Backend\Entities;
 */
class Shutterstock extends ShutterstockBaseModel
{
    protected $table = 'shutterstocks';
    protected $fillable = ['card_id', 'shutterstock_id', 'shutterstock_url', 'status', 'downloaded'];
}
