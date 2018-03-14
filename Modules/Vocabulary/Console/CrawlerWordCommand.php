<?php

namespace Modules\Vocabulary\Console;

use App\Criteria\FirstRowIsCrawlerCriteria;
use Illuminate\Console\Command;
use Modules\Vocabulary\Repositories\GroupRepository;
use Modules\Vocabulary\Repositories\WordRepository;

class CrawlerWordCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'vocabulary:crawler:word';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crawler words detail';

    /**
     * @var GroupRepository
     */
    private $groupRepository;
    /**
     * @var WordRepository
     */
    private $wordRepository;

    private $group;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(GroupRepository $groupRepository, WordRepository $wordRepository)
    {
        parent::__construct();
        $this->groupRepository = $groupRepository;
        $this->wordRepository = $wordRepository;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->groupRepository->pushCriteria(app(FirstRowIsCrawlerCriteria::class));
        $this->group = $this->groupRepository->first();
        if (empty($this->group)) {
            $this->error('Het roi');
            die;
        }
        $url = $this->group->url;
        $this->warn('URL: ' . $url);
        $html = get_web_page($url);
        $dom = str_get_html($html);
        $a = $dom->find('a.embed', 0);
        $url = $a->href;
        $xml = get_web_page($url);
        $this->warn('URL: ' . $url);
        $json = XML2JSON($xml);

        $words = $json['SimpleQuestionItems']['SimpleAssembledQuestionItem'];
        if(isset($words['SimpleQuestionItem'])) {
            foreach ($words['SimpleQuestionItem'] as $item) {
                $row = $item;
                $this->warn($row['Answer']);
                $imageUrl = trim($row['Image']['URL']);
                $imageUrl = substr($imageUrl, 2, strlen($imageUrl));
                $this->wordRepository->create([
                    'group_id' => $this->group->id,
                    'name' => trim($row['Answer']),
                    'image_url' => $imageUrl
                ]);
            }
        } else {
            foreach ($words as $item) {
                $row = $item['SimpleQuestionItem'];
                $this->warn($row['Answer']);
                $imageUrl = trim($row['Image']['URL']);
                $imageUrl = substr($imageUrl, 2, strlen($imageUrl));
                $this->wordRepository->create([
                    'group_id' => $this->group->id,
                    'name' => trim($row['Answer']),
                    'image_url' => $imageUrl
                ]);
            }
        }


        $this->crawlerSuccess();
    }

    private function crawlerSuccess()
    {
        $this->groupRepository->update(['is_crawler' => true], $this->group->id);
        $this->info('crawler thanh cong');
        $this->group = null;
        sleep(rand(1, 5));
        $this->call('vocabulary:crawler:word');
    }
}
