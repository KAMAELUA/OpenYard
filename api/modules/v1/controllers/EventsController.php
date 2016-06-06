<?php

namespace app\modules\v1\controllers;

use yii\rest\ActiveController;

class EventsController extends ActiveController
{
    public $modelClass = 'frontend\models\Event';
	
	public function actions() 
	{ 
    	$actions = parent::actions();
    	return $actions;
	}
	public function actionEventcomments($id)
	{
		$eventModel = \frontend\models\Event::find()->where(['id' => $id])->one();

		if(!is_null($eventModel))
		{
			return $eventModel->comments;
		}
		
		throw new \yii\web\HttpException(404, 'Event not found');
	}
}