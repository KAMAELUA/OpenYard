<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Event;
use frontend\models\Comment;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use \DateTime;

/**
 * EventController implements the CRUD actions for Event model.
 */
class EventController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Event models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Event::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Event model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		$commentsDataProvider = new ActiveDataProvider([
            'query' => Comment::find()
			->where(['event_id' => $id])
			->orderBy('creation_time DESC'),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

		
			return $this->render('view', [
            'model' => $this->findModel($id),
			'commentsDataProvider' => $commentsDataProvider
        ]);
			
		
    }

    /**
     * Creates a new Event model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Event();

        if ($model->load(Yii::$app->request->post()))
		{
			$model->created_at = time();
			$model->updated_at = time();
			$model->user_id = Yii::$app->user->id;
			$model->image = UploadedFile::getInstance($model, 'image');
			$image_hash = "uploads/".time() . "_" . md5($model->image->baseName). '.' . $model->image->extension;
			$model->image_url = $image_hash;
			$time = DateTime::createFromFormat('d-M-Y H:i', $model->time);
			$int = $time->getTimestamp();
			$model->time = $int;
			//echo 1;
			//var_dump($model);
			if($model->save())
			{
				
								$model->upload($image_hash);
             return $this->redirect(['view', 'id' => $model->id]);
			}
			else
			{
			}
        		} else {
            	return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Event model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()))
		{
			$time = DateTime::createFromFormat('d-M-Y H:i', $model->time);
			$int = $time->getTimestamp();
			$model->time = $int;

			$new_image = UploadedFile::getInstance($model, 'image');
			$model->updated_at = time();
			$image_hash = NULL;
			$isNewImage = false;
			if(!is_null($new_image)
			)
			{
				$model->image = $new_image;
				$image_hash = "uploads/".time() . "_" . md5($model->image->baseName). '.' . $model->image->extension;
				$old_image = $model->image_url;
				$model->image_url = $image_hash;
				if(!empty($old_image))
				unlink($old_image);
				$isNewImage = true;
			}
			
			if($model->save() && $isNewImage)
			{
				$model->upload($image_hash);
            	return $this->redirect(['view', 'id' => $model->id]);
			}
			elseif(!$isNewImage)
			{
				return $this->redirect(['view', 'id' => $model->id]);
			}
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Event model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Event model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Event the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Event::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
