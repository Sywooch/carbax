<?php

namespace frontend\modules\news\controllers;

class NewsController extends \yii\web\Controller
{
    public function actionNews()
    {
        return $this->render('news');
    }

}
