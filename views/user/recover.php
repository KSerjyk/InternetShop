<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Відновлення пароля';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php if (Yii::$app->session->hasFlash('NotRecovered')): ?>
        <div class="alert alert-danger">
            <?= Yii::$app->session->getFlash('NotRecovered'); ?>
        </div>
    <?php elseif (Yii::$app->session->hasFlash('Recover')): ?>

    <div class="alert alert-success">
        <?= Yii::$app->session->getFlash('Recover'); ?>
    </div>

    <?php elseif($_GET['pasword_reset_token']): ?>
    <p>Заповніть форми для відновлення пароля</p>
    <?php else: ?>
    <p>Будь ласка заповніть поля, щоб увійти:</p>

    <?php $form = ActiveForm::begin(['id' => 'recovery-form']); ?>

    <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Надіслати', ['class' => 'btn btn-primary', 'name' => 'recover-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
    <?php endif; ?>
</div>
