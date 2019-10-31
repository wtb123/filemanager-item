<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\File */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '文件', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="file-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('下载', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '您确定要删除这份文件吗?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
        //  [
          //   'attribute'=>'userId',
            // 'value'=>$model->user->username,
            //],
            ['attribute'=>'size',
                'value'=>$model->size.'B'],
          'name',
          ['attribute'=>'time',
              'value'=>date('Y-m-d H:i:s',$model->time)],
          //如果是图片则显示图片，如果不是则显示存储路径
          ['attribute'=>'path',
            'format'=>'raw',
            'value'=> (strrchr($model->path,'.')==='.png' ||
                strrchr($model->path,'.')==='.jpg'
            ) ? Html::img($model->path):$model->path],
         //   'path',
        ],

    ]) ?>

</div>