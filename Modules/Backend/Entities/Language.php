<?php

namespace Modules\Backend\Entities;

use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Language.
 *
 * @package namespace Modules\Backend\Entities;
 */
class Language extends BackendModule
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable('languages');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'code', 'name'];
}
