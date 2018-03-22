<?php

namespace Modules\Admin\Entities;

/**
 * Class Admin.
 *
 * @package namespace Modules\Admin\Entities;
 */
class Admin extends AdminModule
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name', 'email'];
    protected $hidden = ['password', 'remember_token'];
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable('users');
    }
}
