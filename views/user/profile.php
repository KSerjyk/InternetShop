<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = "Мій профіль";
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>
        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'profile-form']); ?>

                <?= Html::img("https://1001golos.ru/uploads/ratings/12000/11367/pic1.jpg", [
                        'class' => ['round-image']
                ]); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>


                <?= $form->field($model,'gender') ?>

                <?= $form->field($model, 'numberPhone') ?>

                <?= $form->field($model, 'addressCountry') ?>

                <?= $form->field($model, 'addressRegion') ?>

                <?= $form->field($model, 'addressCity') ?>

                <?= $form->field($model, 'addressHouse') ?>


                <div class="form-group">
                    <?= Html::submitButton('Готово', ['class' => 'btn btn-primary', 'name' => 'profile-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

</div>
