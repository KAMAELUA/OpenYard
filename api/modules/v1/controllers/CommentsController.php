<?php

namespace app\modules\v1\controllers;

use yii\rest\ActiveController;

class CommentsController extends ActiveController
{
    public $modelClass = 'frontend\models\Comment';
	public function actions() 
	{ 
    	$actions = parent::actions();
    	return $actions;
	}
}