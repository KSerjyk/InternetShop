<?php

namespace app\controllers;

use app\models\ProfileForm;
use Yii;
use app\models\RecoveryForm;
use app\models\RegisterForm;
use yii\web\Controller;
use yii\helpers\Html;
use yii\helpers\Url;
class UserController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionRegister()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new RegisterForm();
        if ($model->load($post = Yii::$app->request->post()) && $model->register()) {
            Yii::$app->session->setFlash('Registered', 'Вітаємо! Перевірте вашу пошту');
        }

        return $this->render('register', [
            'model' => $model,
        ]);
    }

    public function actionFinishRegistration()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new RecoveryForm();
        if($model->finsihRegistration())
        {
            Yii::$app->session->setFlash('MailConfirmed', 'Ваша електронна адреса підтверджена!');
            $this->redirect('/site/login');
        }
        else
        {
            Yii::$app->session->setFlash('MailNotConfirmed', "Щось пішло не так. Спробуйте перейти ще раз по посиланню, або зв'яжіться з нами");
            $this->goHome();
        }
    }

    public function actionRecover()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new RecoveryForm();
        if ($model->load($post = Yii::$app->request->post()) && $model->recover()) {
            Yii::$app->session->setFlash('Recover', 'Інструкції по відновленню пароля відправлено вам на вашу електронну адресу!');
        }

        return $this->render('recover', [
            'model' => $model,
        ]);
    }

    public function actionProfile()
    {
        $model = new ProfileForm();
       return $this->render('profile', [
            'model' => $model,
        ]);
    }

    public function actionFinishRecover()
    {

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new RecoveryForm();
        if ($model->load($post = Yii::$app->request->post()) && $model->finsihRecover()) {
            //Yii::$app->session->setFlash('Recovered', 'Пароль выдновлено!');
            $this->redirect(['site/login']);
        }
        return $this->render('recover', [
            'model' => $model,
        ]);
    }
}
