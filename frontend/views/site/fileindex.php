<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\FileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '文件';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="file-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('上传文件', ['upload'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],
            'id',
            'size',
            'name',
           ['attribute'=>'time',
               'format'=>['date','php:Y-m-d H:i:s'],
           ],
           // 'path',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>