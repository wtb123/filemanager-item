<?php
/* @var $this yii\web\View */

use yii\web\View;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<?php $form=ActiveForm::begin(['options'=>['entype'=>'multipart/form-data']]);?>

<?= $form->field($model,'file')->fileInput()?>

<p><?= Html::submitButton('Upload', ['class' => 'btn btn-primary']) ?></p>

<?php ActiveForm::end();?>
