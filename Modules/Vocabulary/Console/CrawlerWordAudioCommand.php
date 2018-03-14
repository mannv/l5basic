<?php

namespace Modules\Vocabulary\Console;

use App\Criteria\FirstRowCrawlerAudioCriteria;
use App\Criteria\FirstRowIsCrawlerCriteria;
use Illuminate\Console\Command;
use Modules\Vocabulary\Repositories\WordRepository;

class CrawlerWordAudioCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'vocabulary:crawler:word-audio';

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
        $this->wordRepository->pushCriteria(app(FirstRowCrawlerAudioCriteria::class));
        $this->word = $this->wordRepository->first();
        if (empty($this->word)) {
            $this->error('Het roi');
            die;
        }
        $url = 'https://www.oxfordlearnersdictionaries.com/definition/english/consideration?q=' . urlencode($this->word->name);
        $html = get_web_page($url);
        $dom = str_get_html($html);

        $audio = $this->getAudio($dom->find('#entryContent', 0));
        $attributes = [
            'phonic_uk' => $audio['uk'][0]['phonic'] ?? '',
            'phonic_us' => $audio['us'][0]['phonic'] ?? '',
            'audio' => json_encode($audio),
            'is_crawler_audio' => true
        ];
        $this->crawlerSuccess($attributes);
    }

    private function crawlerSuccess($attributes = [])
    {
        $this->wordRepository->update($attributes, $this->word->id);
        $this->info('lay audio thanh cong: ' . $this->word->name);
        $this->word = null;
        sleep(1);
        $this->call('vocabulary:crawler:word-audio');
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

        $folder = $this->word->name[0];
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
