<?php

namespace api\modules\v2\controllers;

use api\controllers\MyController;


/**
 * Default controller for the `v1` module
 */
class DefaultController extends MyController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return "hello";
    }
}
