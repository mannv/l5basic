<?php

namespace Modules\Backend\Entities;

use App\Entities\BaseModule;
use Prettus\Repository\Traits\TransformableTrait;

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
