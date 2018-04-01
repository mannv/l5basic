<?php

namespace Modules\Shutterstock\Entities;

use App\Entities\BaseModule;

/**
 * Class Card.
 *
 * @package namespace Modules\Backend\Entities;
 */
class Card extends BaseModule
{
    protected $table = 'cards';
    protected $fillable = ['topic_id', 'name'];
}
