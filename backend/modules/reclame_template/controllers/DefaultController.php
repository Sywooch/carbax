<?php

namespace backend\modules\reclame_template\controllers;

use yii\web\Controller;

/**
 * Default controller for the `reclame_template` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
