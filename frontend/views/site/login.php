<?php

/* @var $this yii\web\View */
/* @var $form \yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;
$this->title = '登陆';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-default-login">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4">
                <h1 class="text-center login-title"><?php echo 'Login to access the System';?></h1>
                <div class="account-wall">
                    <img class="profile-img" src="<?php echo Yii::$app->request->baseUrl;?>/images/logo-profile.png" alt="">
                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                    <?= $form->field($model, 'username')->label(false,['class'=>'label-class'])->textInput(['placeholder' => 'E-mail or Username']) ?>
                    <?= $form->field($model, 'password')->label(false,['class'=>'label-class'])->passwordInput(['placeholder' => 'Password']) ?>
                    <?php echo $form->field($model, 'rememberMe', [
                        'template' => "{label}<div class=\"checkbox pull-left\">{input}</div>\n<div class=\"col-lg-7\">{error}</div>",
                    ])->checkbox(['label' => 'Remember Me']) ?>
                    <?= Html::submitButton('Login', ['class' => 'btn btn-lg btn-primary btn-block']) ?>
                    <?= Html::a('忘记密码?', ['site/request-password-reset'], ['class' => 'text-center new-account']) ?>
                    <?= Html::a('未收到验证邮件?', ['site/resend-verification-email'], ['class' => 'text-center new-account']) ?>
                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
    </div>
</div>