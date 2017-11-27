<?php

namespace App\Console\Commands;

use App\Models\Item;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Workerman\Worker;

class test_cw extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:cw.php';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
    public function handle()
    {
        DB::table('item')->truncate();
        $client = new Client();
        $res = $client->get('https://www.smzdm.com/fenlei', ['verify' => false]);
        $content = (string)$res->getBody();
        $first = [];
        preg_match_all('/class=\"brand-waterfall\".*?class=\"title\"/si', $content, $data);
        preg_match_all('/class=\"title\".*?\/div/si', $content, $first_tmp);

        foreach ($first_tmp[0] as $key => $item) {
            $first[$key] = $this->test($item)[0];
        }
        unset($first[17]);
        $second = [];
        foreach ($data[0] as $key => $datum) {
            preg_match_all('/h3.*?\/h3/', $datum, $tmp);
            $all_third = $this->third_fun($datum);
            foreach ($tmp[0] as $k => $item) {
                $second[$key][$k] = $this->test($item);
                $second[$key][$k]['third'] = $all_third[$k];
            }
        }
        $this->createItem($first, $second);
    }

    public function createItem($first, $second)
    {
        foreach ($first as $key => $item) {
            Item::create([
                'name' => $item,
                'order' => $key + 1,
            ]);
        }
        $data = Item::where('pid', 0)->get();
        foreach ($second as $key => $datum) {
            foreach ($datum as $k => $item) {
                $second_model = Item::create([
                    'name' => $item[0],
                    'pid' => $data[$key]->id,
                ]);
                foreach ($item['third'] as $value) {
                    Item::create([
                        'name' => $value,
                        'pid' => $second_model->id,
                    ]);
                }
            }

        }
    }

    public function third_fun($data)
    {
        $third = [];
        preg_match_all('/class=\"con\".*?\/div/si', $data, $third_tmp);
        foreach ($third_tmp[0] as $key => $item) {
            $third[$key] = $this->test($item);
        }
        return $third;
    }

    public function test($str)
    {
        preg_match_all('/[\x{4e00}-\x{9fff}]+/u', $str, $zh);
        return $zh[0];
    }

    public function workerman()
    {
        // 建立socket连接到内部推送端口
        $client = stream_socket_client('tcp://127.0.0.1:5678', $errno, $errmsg, 1);
        // 推送的数据，包含uid字段，表示是给这个uid推送
        $data = array('uid' => 1, 'percent' => '88%');
        // 发送数据，注意5678端口是Text协议的端口，Text协议需要在数据末尾加上换行符
        fwrite($client, json_encode($data) . "\n");
        // 读取推送结果
        echo fread($client, 8192);
    }
}
