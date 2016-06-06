<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Event */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="event-view">
  <h1>
    <?= Html::encode($this->title) ?>
  </h1>
    <p class="lead">
                    by <a href="#">Start Bootstrap</a>
                </p>

  <div class="row">
    <div class="container">
      <div class="col-md12">
      <div class="thumbnail">
                    <img class="img-responsive" style="width:100%" alt="" src="<?= $model->image_url?>">
                    <div class="caption-full">
                        <h4 class="pull-right">$24.99</h4>
                        <h4><a href="#">Product Name</a>
                        </h4>
                        <p>
                        <?= $model->description ?>
                        </p>                    
                    </div>
                    <div class="ratings">
                        <p class="pull-right"><?= $model->commentCount ?> reviews</p>
                        <p>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            4.0 stars
                        </p>
                    </div>
                </div></div>
    </div>
  </div>
                <div class="well">
                    <?= 
ListView::widget([
    'dataProvider' => $commentsDataProvider,
	'options' => [
        'tag' => 'div',
    ],
	'layout' => "{pager}\n{items}",
	'itemView' => 'comment_view',
	'separator' => '<hr>',

]); 
?>

                </div>
  <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
            'description:ntext',
            'type',
            'time:datetime',
            'free_places',
            'total_places',
            'meeting_point',
        ],
    ]) ?>
</div>
