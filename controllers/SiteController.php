<?php

namespace app\controllers;

use app\models\RecoveryForm;
use app\models\RegisterForm;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\helpers\Html;
use yii\helpers\Url;
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
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

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionFinishRegistration()
    {
        $_user = User::findByUsername(Yii::$app->request->get()['login']);
        if($_user !== null){
            $connection = Yii::$app->db;
            if($connection->createCommand()->update('users',['status'=>2], 'login="'.$_user->login.'"')->execute()) {
                Yii::$app->session->setFlash('Confirmed', 'Ваша електронна адреса підтверджена!');
                Yii::$app->mailer->compose()
                    ->setFrom(Yii::$app->params['mailerMail'])
                    ->setTo($_user->email)
                    ->setSubject("Best Shop")
                    ->setTextBody($_user->surname.' '.$_user->name.'('.$_user->login.'). Вітаємо вас з успішною реєстрацією!')
                    ->send();
                $this->goHome();
            }
        }
    }
}
