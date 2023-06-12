<?php

use Workerman\Worker;
use Workerman\Connection\TcpConnection;
use Workerman\Lib\Timer;


require_once __DIR__ . '/vendor/autoload.php';
//引用这个TCP协议,端口任意,不给占用
$ws_worker = new Worker('tcp://0.0.0.0:8383');

//服务器与mqtt开始连接
$ws_worker->onWorkerStart = function ($ws_worker) {//连接成功就执行下面
    echo "websocket starting....\n";
    global $mqtt;//定义一个全局的变量
    $opts = array();//定义一个数组，用来放mqtt的配置参数，如用户名，密码
    $opts['username'] = 'mqtt';//mqtt的用户名
    $opts['password'] = 'mqtt';//mqtt的用户名密码
    $mqtt = new Workerman\Mqtt\Client('mqtt://127.0.0.1:1883', $opts);//连接服务器
    $mqtt->onConnect = function ($mqtt) {//如成功就执行下面代码
        echo "mqtt:ok\n";//打印一下mqtt链接完成
        $mqtt->subscribe('rsp/1010021966/cmd_id');// 响应主题，旧版的写法
        $mqtt->subscribe('dp/1010021966');//订阅模块数据点主题
    };

    $mqtt->onMessage = function ($topic, $date) {//主板返回来信息
        var_dump($topic, $date);
    };

    $mqtt->connect();//链接服务器安装的mqtt服务器
};


$ws_worker->onMessage = function ($connection, $data) {//gwj_jk.php发来信息这收
    global $mqtt;
    echo json_encode($data);
    $getmes = json_decode($data, true);
    $message = $getmes['message'];
    $GLOBALS['ddh'] = $getmes['ddh'];//会点像会话，全局变量
    echo 'fs_new:' . $message;
    $mqtt->publish('1010021966/cmd/cmd_id', $message);//把客户端发来的内容转给主板，主板发布主题

};


// 客户端关闭，服务器的黑柜显示
$ws_worker->onClose = function ($connection) {
    echo "Close";
    global $ws_worker;
    if (isset($connection->uid)) {
        // 连接断开时删除映射
        unset($ws_worker->hy[$connection->uid]);
    }
};
Worker::runAll();
?>
