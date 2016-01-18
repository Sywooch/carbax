<?php

namespace backend\modules\media\controllers;

use common\classes\Debug;
use common\classes\Media;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\BaseUrl;
use yii\helpers\Url;
use yii\web\Controller;

class DefaultController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'upload_files' => ['post'],
                ],
            ],
            /*'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],*/
        ];
    }

    public function beforeAction($action)
    {
        if ($action->id == 'upload_files') {
            Yii::$app->controller->enableCsrfValidation = false;
        }

        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        $dir = new Media();
        $a = $dir->get_contents_directory();

        return $this->render('index',
                    ['content'=>$a]
        );
    }

    public function actionPrint_dir(){
        $dir = new Media();
        $a = $dir->get_contents_directory($_POST['path']);
        $dir->print_contents_directory($a,$_POST['path']);
    }


    public function actionNew_folder(){
        $dir = new Media();
        $dir->create_folder($_POST['path'],$_POST['namefolder']);
        $a = $dir->get_contents_directory($_POST['path']);
        $dir->print_contents_directory($a,$_POST['path']);
    }

    public function actionRemove_dir(){
        $dir = new Media();
        $dir->full_del_dir($_POST['path']);
        $path = $dir->get_link_back($_POST['path']);
        $a = $dir->get_contents_directory($path);
        $dir->print_contents_directory($a,$path);
    }
    public function actionRemove_file(){
        $dir = new Media();
        unlink($_POST['path']);
        $path = $dir->get_link_back($_POST['path']);
        $a = $dir->get_contents_directory($path);
        $dir->print_contents_directory($a,$path);
    }

    public function actionUpload_files(){
        $path = $_POST['media__path_upload'];

        $allowed = array('png', 'jpg', 'gif','zip');

        if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){

            $extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

            if(!in_array(strtolower($extension), $allowed)){
                echo '{"status":"error"}';
                exit;
            }

            if(move_uploaded_file($_FILES['upl']['tmp_name'], $path.$_FILES['upl']['name'])){
                echo '{"status":"success"}';
                exit;
            }
        }

        echo '{"status":"error"}';
        exit;
    }



    public function actionRename_dir(){
        $dir = new Media();
        $dir->rename_dir($_POST['path'],$_POST['namefolder']);
        $path = $dir->get_link_back($_POST['path']);
        $a = $dir->get_contents_directory($path);
        $dir->print_contents_directory($a,$path);
    }


}
