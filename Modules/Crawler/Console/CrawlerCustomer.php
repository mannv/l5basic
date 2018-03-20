<?php

namespace Modules\Crawler\Console;

use Carbon\Carbon;
use Illuminate\Console\Command;
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
        try {
            $offset = \Cache::get('customer_offset', 0);
            $baseUrl = config('crawler.url');
            $url = $baseUrl . '?offset=' . $offset;
            $this->warn('URL: ' . $url);

            $res = $this->getCURL($url);

            $data = json_decode($res, true);
            if (count($data) == 0) {
                $this->log->error('HET ROI');
                die;
            }
            $customerRepository->insertMulti($data);
            $this->cacheOffset($offset + count($data));

            $this->info('DONE: ' . implode(', ', array_column($data, 'id')));

            $this->refresh();
        } catch (\Exception $e) {
            $this->warn('Error: ' . $e->getMessage());
            $this->refresh();
        }
    }

    private function refresh()
    {
        sleep(1);
        $this->call('crawler:customer');
    }

    private function cacheOffset($offset)
    {
        $expiresAt = Carbon::now()->addMonths(10);
        \Cache::put('customer_offset', $offset, $expiresAt);
    }


    private function getCURL($url)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "token: " . config('crawler.token')
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            throw new \Exception('Error CURL');
        } else {
            return $response;
        }
    }
}
