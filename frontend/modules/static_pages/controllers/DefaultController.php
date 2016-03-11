<?php

namespace frontend\modules\static_pages\controllers;

use common\models\db\StaticPages;
use yii\web\Controller;

class DefaultController extends Controller
{
    public $layout = 'page';

    public function actionIndex()
    {

        return $this->render('index',
            [
                'page' => StaticPages::findOne($_GET['id']),
            ]
        );
    }
}
