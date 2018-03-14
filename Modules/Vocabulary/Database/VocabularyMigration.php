<?php
namespace Modules\Vocabulary\Database;
use Illuminate\Database\Migrations\Migration;
use Nwidart\Modules\Module;

class VocabularyMigration extends Migration
{
    protected $alias = '';
    protected $table = '';

    public function __construct()
    {
        $this->alias = 'vocabulary';
    }

    protected function getTable()
    {
        return $this->alias . '_' . $this->table;
    }
}
