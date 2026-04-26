<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p><?php echo \Yii::t('app','This is the About page. You may modify the following file to customize its content:')?></p>
    <p><?php echo \Yii::t('app', 'Hello World')?></p>
</div>
