<?php

namespace Modules\Vocabulary\Console;

use Illuminate\Console\Command;
use Modules\Vocabulary\Entities\GroupSqlite;
use Modules\Vocabulary\Entities\WordSqlite;
use Modules\Vocabulary\Repositories\GroupRepository;
use Modules\Vocabulary\Repositories\WordRepository;

class ConvertDbCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'vocabulary:sqlite';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(GroupRepository $groupRepository, WordRepository $wordRepository)
    {
        $this->info('truncate table group');
        GroupSqlite::truncate();
        $this->info('truncate table words');
        WordSqlite::truncate();

        $groups = $groupRepository->all();
        $data = [];
        foreach ($groups as $item) {
            $data[] = [
                'id' => $item->id,
                'name' => $item->name,
                'meant' => $item->meant,
                'total_word' => $item->total_word
            ];
        }
        GroupSqlite::insert($data);

        $words = $wordRepository->all();
        $data = [];
        foreach ($words as $item) {
            $data[] = [
                'id' => $item->id,
                'name' => $item->name,
                'group_id' => $item->group_id,
                'img' => $item->img,
                'imgw' => $item->imgw,
                'imgh' => $item->imgh,
                'phonic_uk' => $item->phonic_uk,
                'phonic_us' => $item->phonic_us,
                'audio' => $item->audio,
                'meant' => $item->meant
            ];
        }
        $rows = array_chunk($data, 50);
        foreach ($rows as $row) {
            WordSqlite::insert($row);
        }

    }
}
