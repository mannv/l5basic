<?php

namespace Modules\Crawler\Entities;

/**
 * Class Customer.
 *
 * @package namespace App\Entities;
 */
class Customer extends CrawlerModule
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name', 'phone', 'email'];
    public $timestamps = false;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable('customer');
    }
}
