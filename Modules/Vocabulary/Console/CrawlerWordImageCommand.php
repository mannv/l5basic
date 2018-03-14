<?php

namespace Modules\Vocabulary\Console;

use App\Criteria\FirstRowIsCrawlerCriteria;
use Illuminate\Console\Command;
use Modules\Vocabulary\Repositories\WordRepository;

class CrawlerWordImageCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'vocabulary:crawler:word-image';

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
        $this->wordRepository->pushCriteria(app(FirstRowIsCrawlerCriteria::class));
        $this->word = $this->wordRepository->first();
        if (empty($this->word)) {
            $this->error('Het roi');
            die;
        }
        $imageUrl = 'http://' . $this->word->image_url;
        $imageUrl = str_replace(' ', '%20', $imageUrl);
        $arr = explode('.', $imageUrl);
        $this->warn('image: ' . $imageUrl);
        $info = getimagesize($imageUrl);
        $this->warn('W: ' . $info[0] . ' -- H: ' . $info[1]);


        $savePath = storage_path('images');
        if (!is_dir($savePath)) {
            mkdir($savePath);
        }

        $folder = $this->word->name[0];
        $savePath = storage_path('images') . '/' . $folder;
        if (!is_dir($savePath)) {
            mkdir($savePath);
        }

        $imgName = uniqid() . '.' . array_pop($arr);
        $savePath .= '/' . $imgName;
        file_put_contents($savePath, file_get_contents($imageUrl));
        $this->info('SAVE: ' . $savePath);

        $attributes = [
            'img' => $folder . '/' . $imgName,
            'imgw' => $info[0],
            'imgh' => $info[1],
        ];
        $this->crawlerSuccess($attributes);
    }

    private function crawlerSuccess($attributes = [])
    {
        $attributes['is_crawler'] = true;
        $this->wordRepository->update($attributes, $this->word->id);
        $this->info('lay anh thanh cong');
        $this->word = null;
        sleep(1);
        $this->call('vocabulary:crawler:word-image');
    }
}
