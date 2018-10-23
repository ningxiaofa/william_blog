<?php
defined('YII_DEBUG') or define('YII_DEBUG', true); //检查YII_DEBUG常量是否存在,否则定义常量.很严谨的做法.
defined('YII_ENV') or define('YII_ENV', 'dev');

require(__DIR__ . '/../../vendor/autoload.php'); //看过<<Modern PHP>>,就会知道符合PSR-4自动加载规范
require(__DIR__ . '/../../vendor/yiisoft/yii2/Yii.php');//加载yii框架的核心代码.
require(__DIR__ . '/../../common/config/bootstrap.php');//打开该文件,可知:定义四个模块的路径别名,方便后续的使用.
require(__DIR__ . '/../config/bootstrap.php');//加载该[自己]模块的特别配置,目前未有配置项,可结合自身系统进行配置.

$config = yii\helpers\ArrayHelper::merge(  //merge(),跳转过去发现,只有两个参数,但是这里传递四个参数,可知php允许这种写法,此处框架这样的写法目的是:至少传递两个参数,或者说也是一种技巧.
    require(__DIR__ . '/../../common/config/main.php'),//require() 如果能找到引用的文件,返回int(1),否则报错.
    require(__DIR__ . '/../../common/config/main-local.php'),
    require(__DIR__ . '/../config/main.php'),
    require(__DIR__ . '/../config/main-local.php')
);
//上述引用四个配置文件,可知frontend 模块只会引用common和自身的配置,同时优先级从前往后依次升高.同理,backend亦是.
$application = new yii\web\Application($config);//加载配置上述的配置,但是没有找到该类的构造函数,到底是如何加载配置,以及如何使得配置生效.层层继承关系.===>TBD
$application->run();//开始运行程序,看到run();就会想到delta系统中inc/tasks/各种task php  类文件中的run();[开始运行task,也是执行workflow的一个环节]
