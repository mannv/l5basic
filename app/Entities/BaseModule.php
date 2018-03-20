<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use jdavidbakr\ReplaceableModel\ReplaceableModel;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Customer.
 *
 * @package namespace App\Entities;
 */
class BaseModule extends Model implements Transformable
{
    use TransformableTrait;
    use ReplaceableModel;
    protected $tablePrefix = '';

    public function setTable($table)
    {
        return parent::setTable($this->tablePrefix . $table);
    }

}
