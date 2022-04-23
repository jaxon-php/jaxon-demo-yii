<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Url;
use Jaxon\Demo\Ajax\Bts;
use Jaxon\Demo\Ajax\Pgw;

class DemoController extends Controller
{
    public function actionIndex()
    {
        // Set the layout
        $this->layout = 'demo';
        // Get the Jaxon module
        $jaxon = jaxon()->app();

        return $this->render('index', array(
            'jaxonCss' => $jaxon->css(),
            'jaxonJs' => $jaxon->js(),
            'jaxonScript' => $jaxon->script(),
            'pageTitle' => "Yii Framework",
            // Jaxon request to the Jaxon\App\Test\Bts Jaxon class
            'bts' => $jaxon->request(Bts::class),
            // Jaxon request to the Jaxon\App\Test\Pgw Jaxon class
            'pgw' => $jaxon->request(Pgw::class),
        ));
    }
}
