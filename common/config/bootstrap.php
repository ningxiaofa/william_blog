<?php
Yii::setAlias('@common', dirname(__DIR__));  //刚好是common模块的相对路径,下面同理.可以写PHP code进行测试验证
Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('@backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');
