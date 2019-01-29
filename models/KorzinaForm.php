<?php
/**
 * Created by PhpStorm.
 * User: Boss
 * Date: 24.01.2019
 * Time: 18:59
 */

namespace app\models;

use app\models\Basket;
use yii\base\Model;

class KorzinaForm extends Model
{
    public $idProduct;
    public $description;
    public $avail;
    public $unitPrice;
    public $quantity;
    public $totalPrice;
    public $idUser;


    //$test =
    public function f()
    {
        Basket::tableName();
        $idProduct = \app\models\Basket::find()->orderBy('product_id')->all();
        $quality = \app\models\Basket::find()->orderBy('quantity')->all();
        $idUser = \app\models\Basket::find()->orderBy('user_id')->all();
    }

}