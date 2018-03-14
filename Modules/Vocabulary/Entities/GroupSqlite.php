<?php

namespace Modules\Vocabulary\Entities;

use Illuminate\Database\Eloquent\Model;

class GroupSqlite extends Model
{
    protected $connection = 'sqlite';
    protected $table = 'group';
    protected $fillable = ['id', 'name', 'meant', 'total_word'];
}
