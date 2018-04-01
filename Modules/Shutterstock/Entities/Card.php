<?php

namespace Modules\Shutterstock\Entities;

/**
 * Class Card.
 *
 * @package namespace Modules\Backend\Entities;
 */
class Card extends ShutterstockBaseModel
{
    protected $table = 'cards';
    protected $fillable = ['topic_id', 'name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(Shutterstock::class, 'card_id', 'id');
    }
}
