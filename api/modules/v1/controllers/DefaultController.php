<?php

namespace app\modules\v1\controllers;

use yii\web\Controller;
use yii\rest\ActiveController;

/**
 * Default controller for the `api-v1` module
 */
class DefaultController extends ActiveController
{
	public $modelClass = 'frontend\models\Event';
	public function actions()
    {
        $actions = parent::actions();
        return $actions;
    }	
	
	public function checkAccess($action, $model = null, $params = [])
	{
	
    // проверить, имеет ли пользователь доступ к $action и $model
    // выбросить ForbiddenHttpException, если доступ следует запретить
	}
	}
