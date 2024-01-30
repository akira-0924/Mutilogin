<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mockery\Generator\Method;

class LifeCycleTestController extends Controller
{
    public function showServiceContainerTest() {
        //引数：取り出す時の名前,機能
        app()->bind("lifeCycleTest", function() {
            return 'ライフサイクルテスト';
        });

        $test = app()->make('lifeCycleTest');

        // dd($test, app());


        // サービスコンテナなし
        $message = new Message();
        $sample = new Sample($message);
        $sample->run();

        // サービスコンテナあり
        app()->bind('sample', Sample::class);
        $sample = app()->make('sample');
        $sample->run();
    }
}


class Message {
    public function send(){
        echo "メッセージ表示";
    }
}

class Sample {
    public $message;
    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    public function run() {
        $this->message->send();
    }
}

