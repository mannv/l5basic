<?php

namespace App\Entities;

use Modules\Vocabulary\Entities\BaseModel;
/**
 * Class Word.
 *
 * @package namespace App\Entities;
 */
class Word extends BaseModel
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->assignTable('words');
    }

    protected $fillable = [
        'group_id',
        'name',
        'image_url',
        'audio_uk',
        'audio_us',
        'meant',
        'is_crawler'
    ];

}
