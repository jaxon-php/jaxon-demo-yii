<?php

namespace app\controllers;

use Jaxon\Demo\Ajax\Bts;
use Jaxon\Demo\Ajax\Pgw;
use Jaxon\Yii\Filter\JaxonConfigFilter;
use Yii;
use yii\web\Controller;
use yii\helpers\Url;

use function Jaxon\jaxon;
use function Jaxon\pm;

class DemoController extends Controller
{
    public function behaviors()
    {
        return [
            [
                'class' => JaxonConfigFilter::class,
                'only' => ['index', 'jaxon'],
            ],
        ];
    }

    /**
     * Process Jaxon ajax requests. This route must be the same that is set in the Jaxon config.
     */
    public function actionJaxon()
    {
        $jaxon = jaxon()->app();
        if(!$jaxon->canProcessRequest())
        {
            // Jaxon failed to find a plugin to process the request
            return; // Todo: return an error message
        }

        $jaxon->processRequest();
        return $jaxon->httpResponse();
    }

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
            // Jaxon Parameter Factory
            'pm' => pm(),
        ));
    }
}
