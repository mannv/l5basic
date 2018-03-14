<?php

namespace Modules\Vocabulary\Console;

use App\Criteria\FirstRowCrawlerAudioCriteria;
use App\Criteria\FirstRowIsCrawlerCriteria;
use App\Criteria\FirstRowIsCrawlerMeantCriteria;
use Google\Cloud\Translate\TranslateClient;
use Illuminate\Console\Command;
use Modules\Vocabulary\Repositories\WordRepository;

class CrawlerWordMeantCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'vocabulary:crawler:word-meant';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crawler words image';

    /**
     * @var WordRepository
     */
    private $wordRepository;

    private $word;
    private $languages = ['vi', 'ko', 'fr', 'es', 'pt', 'nl'];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(WordRepository $wordRepository)
    {
        parent::__construct();
        $this->wordRepository = $wordRepository;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->wordRepository->pushCriteria(app(FirstRowIsCrawlerMeantCriteria::class));
        $this->word = $this->wordRepository->first();
        if (empty($this->word)) {
            $this->error('Het roi');
            die;
        }


        # Instantiates a client
        $translate = new TranslateClient([
            'projectId' => 'mannv-190101'
        ]);

        $text = $this->word->name;
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
        $this->wordRepository->update($attributes, $this->word->id);
        $this->info('translate thanh cong: ' . $this->word->name);
        $this->word = null;
        sleep(1);
        $this->call('vocabulary:crawler:word-meant');
    }

    private function getAudio($dom)
    {
        $audio = ['uk' => [], 'us' => []];
        $listAudio = $dom->find('.pron-gs', 0);
        if (count($listAudio) <= 0) {
            return $audio;
        }

        $listAudio = $listAudio->find('.pron-g');

        $mp3Path = storage_path('mp3');
        if (!is_dir($mp3Path)) {
            mkdir($mp3Path);
        }

        $folder = strtolower($this->word->name[0]);
        $mp3Path = storage_path('mp3') . '/' . $folder;
        if (!is_dir($mp3Path)) {
            mkdir($mp3Path);
        }

        foreach ($listAudio as $item) {
            $uk = false;
            $sound = $item->find('.sound', 0);
            if (strpos($sound->class, 'pron-uk') !== false) {
                $uk = true;
            }
            $attr = 'data-src-mp3';
            $mp3 = trim($sound->$attr);

            $prefix = [];
            $pre = $item->find('.prefix');
            foreach ($pre as $p) {
                $prefix[] = trim_space($p->text());
            }

            $phonic = $item->find('.phon', 0);
            if ($phonic->find('.bre', 0)) {
                $phonic->find('.bre', 0)->innertext = '';
            }
            if ($phonic->find('.name', 0)) {
                $phonic->find('.name', 0)->innertext = '';
            }
            $phonic->find('.separator', 0)->innertext = '';
            $phonic->find('.separator', 1)->innertext = '';
            $phonic->find('.wrap', 0)->innertext = '';
            $phonic->find('.wrap', 1)->innertext = '';
            $phonic = trim_space($phonic->text());


            $audioName = uniqid() . '.mp3';
            file_put_contents($mp3Path . '/' . $audioName, file_get_contents($mp3));

            $audio[$uk ? 'uk' : 'us'][] = [
                'prefix' => $prefix,
                'phonic' => $phonic,
                'mp3' => $mp3,
                'local_mp3' => $folder . '/' . $audioName
            ];
        }
        return $audio;
    }

}
