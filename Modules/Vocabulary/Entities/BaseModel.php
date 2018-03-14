<?php

namespace Modules\Vocabulary\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class BaseModel extends Model implements Transformable
{

    use TransformableTrait;

    protected $alias = 'vocabulary';

    protected function assignTable($table)
    {
        $this->setTable($this->alias . '_' . $table);
    }
}
