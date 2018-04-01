<?php

namespace Modules\Shutterstock\Entities;

/**
 * Class Topic.
 *
 * @package namespace Modules\Backend\Entities;
 */
class Topic extends ShutterstockBaseModel
{
    protected $table = 'topics';
    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cards()
    {
        return $this->hasMany(Card::class, 'topic_id', 'id');
    }

    public function cardWithImage()
    {
        return $this->hasMany(Card::class, 'topic_id', 'id')->with('images');
    }
}
