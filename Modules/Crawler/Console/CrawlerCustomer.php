<?php

namespace Modules\Crawler\Console;

use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Http\Response;
use Modules\Crawler\Repositories\CustomerRepository;

class CrawlerCustomer extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'crawler:customer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description.';

    /**
     * @var \Illuminate\Foundation\Application|\Illuminate\Log\LogManager|mixed
     */
    private $log;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->log = app('log');
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(CustomerRepository $customerRepository)
    {
        $options = [
            'headers' => [
                'User-Agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.162 Safari/537.36',
                'Accept' => 'application/json',
                'token' => config('crawler.token')
            ]
        ];
        $offset = \Cache::get('customer_offset', 0);

        $client = new Client();
        $baseUrl = config('crawler.url');
        $url = $baseUrl . '?offset=' . $offset;
        $this->warn('URL: ' . $url);
        $res = $client->get($url, $options);
        if ($res->getStatusCode() != Response::HTTP_OK) {
            $this->log->error('Loi khong ket noi duoc vao server');
            die;
        }

        $data = json_decode($res->getBody()->__toString(), true);
        if (count($data) == 0) {
            $this->log->error('HET ROI');
            die;
        }
        $customerRepository->insertMulti($data);
        $this->cacheOffset($offset + count($data));

        $this->info('done');

        sleep(1);
        $this->call('crawler:customer');
    }

    private function cacheOffset($offset)
    {
        $expiresAt = Carbon::now()->addMinutes(10);
        \Cache::put('customer_offset', $offset, $expiresAt);
    }
}
