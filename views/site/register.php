<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Реєстрація';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php if (Yii::$app->session->hasFlash('AlreadyExists')): ?>
    <div class="alert alert-error">
        <?= Yii::$app->session->getFlash('AlreadyExists'); ?>
    </div>
    <?php elseif (Yii::$app->session->hasFlash('Registered')): ?>

        <div class="alert alert-success">
            <?= Yii::$app->session->getFlash('Registered'); ?>
        </div>

    <?php else: ?>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <?= $form->field($model, 'login')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'password_hash')->passwordInput() ?>

                    <?= $form->field($model, 'password_hash_repeat')->passwordInput() ?>

                    <?= $form->field($model, 'surname') ?>

                    <?= $form->field($model, 'name') ?>

                    <?= $form->field($model, 'secondname') ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Зареєструватись', ['class' => 'btn btn-primary', 'name' => 'register-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>
