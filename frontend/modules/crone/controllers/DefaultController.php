<?php

namespace frontend\modules\crone\controllers;

use common\classes\Debug;
use DOMDocument;
use yii\web\Controller;

/**
 * Default controller for the `crone` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {

        /*$sitemapXml = simplexml_load_file('http://carbax/sitemap.xml');
        var_dump($sitemapXml);*/

        $sitemapXml = file_get_contents('http://carbax/sitemap.xml');
        //var_dump($sitemapXml);
        $dom_xml= new DomDocument();
        $dom_xml->loadXML($sitemapXml);

        $path="sitemap.xml";
        echo $dom_xml->save($path);
       /* $url = 'http://carbax/sitemap.xml';
        $xml = simplexml_load_file($url) or die("feed not loading");
        $Rate = $xml->Currency[1]->Rate;
        echo $Rate;
        echo 'BREAK HTML';
        echo "-----";
        echo "// "; var_dump($xml); echo " //";*/

        //return $this->render('index');
    }
}
