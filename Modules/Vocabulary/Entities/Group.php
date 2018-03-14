<?php

namespace Modules\Vocabulary\Entities;

class Group extends BaseModel
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->assignTable('group');
    }

    protected $fillable = [
        'name',
        'url',
        'description',
        'is_crawler',
        'meant',
        'is_crawler_meant'
    ];
}
