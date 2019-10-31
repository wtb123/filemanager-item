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
        <?= Html::a('<span class="glyphicon glyphicon-upload"></span> ' . '上传文件',
                ['file/upload'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                    'attribute'=>'size',
                   'value'=>function($model)
                   {
                       return ($model->size).'B';
                   }
            ],
            'name',
            ['attribute'=>'time',
                'format'=>['date','php:Y-m-d H:i:s']],
            'path',
            ['class' => 'yii\grid\ActionColumn',
             'template'=>'{view}{update}{delete}{download}',
             'buttons'=>[

              'download'=>function($url,$model,$key)
              {
                  $options=[
                      'title'=>Yii::t('yii','下载'),
                      'aria-label'=>Yii::t('yii','下载'),
                      'data-method'=>'post',
                      'data-pjax'=>0,
                  ];
                 // $icon = Html::tag('span', '', ['class' => "glyphicon glyphicon-check]);
                //  return Html::a($icon, $url, $options);
                  return Html::a('<span class="	glyphicon glyphicon-circle-arrow-down"></span>'
                      ,$url,$options);
              }
             ],
                ],
        ],
    ]); ?>
</div>