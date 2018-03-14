<?php

namespace Modules\Vocabulary\Entities;

use Illuminate\Database\Eloquent\Model;

class WordSqlite extends Model
{
    protected $connection = 'sqlite';
    protected $table = 'words';
    protected $fillable = [
        'id',
        'name',
        'group_id',
        'img',
        'imgw',
        'imgh',
        'phonic_uk',
        'phonic_us',
        'audio',
        'meant'
    ];
}
