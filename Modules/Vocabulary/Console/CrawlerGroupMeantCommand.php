<?php

namespace Modules\Vocabulary\Console;

use App\Criteria\FirstRowCrawlerAudioCriteria;
use App\Criteria\FirstRowIsCrawlerCriteria;
use App\Criteria\FirstRowIsCrawlerMeantCriteria;
use Google\Cloud\Translate\TranslateClient;
use Illuminate\Console\Command;
use Modules\Vocabulary\Repositories\GroupRepository;
use Modules\Vocabulary\Repositories\WordRepository;

class CrawlerGroupMeantCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'vocabulary:crawler:group-meant';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crawler words image';

    /**
     * @var GroupRepository
     */
    private $groupRepository;

    private $group;
    private $languages = ['vi', 'ko', 'fr', 'es', 'pt', 'nl', 'zh-CN', 'zh-TW', 'ja', 'it', 'th', 'id'];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(GroupRepository $groupRepository)
    {
        parent::__construct();
        $this->groupRepository = $groupRepository;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->groupRepository->pushCriteria(app(FirstRowIsCrawlerMeantCriteria::class));
        $this->group = $this->groupRepository->first();
        if (empty($this->group)) {
            $this->error('Het roi');
            die;
        }


        # Instantiates a client
        $translate = new TranslateClient([
            'projectId' => 'mannv-190101'
        ]);

        $text = $this->group->name;
        $meant = [];
        foreach ($this->languages as $target) {
            $translation = $translate->translate($text, [
                'target' => $target,
                'source' => 'en'
            ]);
            $meant[$target] = $translation['text'];
        }
        $this->warn($text);
        $this->info(var_export($meant, true));

        $attributes = [
            'meant' => json_encode($meant),
            'is_crawler_meant' => true
        ];
        $this->crawlerSuccess($attributes);
    }

    private function crawlerSuccess($attributes = [])
    {
        $this->groupRepository->update($attributes, $this->group->id);
        $this->info('translate thanh cong: ' . $this->group->name);
        $this->word = null;
//        sleep(1);
//        $this->call('vocabulary:crawler:word-meant');
    }
}
