<?php

namespace Modules\Crawler\Entities;

use App\Entities\BaseModule;


/**
 * Class Customer.
 *
 * @package namespace App\Entities;
 */
class CrawlerModule extends BaseModule
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->tablePrefix = config('crawler.table_prefix');
    }
}
