<?php

namespace Modules\Vocabulary\Console;

use Illuminate\Console\Command;
use Modules\Vocabulary\Repositories\GroupRepository;

class CrawlerGroupCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'vocabulary:crawler:group';

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
    public function handle(GroupRepository $groupRepository)
    {
        $pages = [
            'https://learnenglish.britishcouncil.org/en/vocabulary-exercises',
            'https://learnenglish.britishcouncil.org/en/vocabulary-exercises?page=1',
            'https://learnenglish.britishcouncil.org/en/vocabulary-exercises?page=2'
        ];
        $count = 0;
        foreach ($pages as $url) {
            $html = $html = get_web_page($url);
            $dom = str_get_html($html);
            $groups = $dom->find('#content .views-row');
            $count += count($groups);
            foreach ($groups as $item) {
                $a = $item->find('.views-field-nothing a', 0);
                $p = $item->find('.views-field-nothing p', 0);
                $groupRepository->create([
                    'name' => $a->text(),
                    'url' => 'https://learnenglish.britishcouncil.org' . $a->href,
                    'description' => $p->text(),
                ]);
            }
        }
        $this->info('crawler ' . $count . ' groups success');
    }
}
