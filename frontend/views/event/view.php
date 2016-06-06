<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Event */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$isOwner = Yii::$app->user->id == $model->user_id;
?>

<div class="event-view">
  <h1>
    <?= Html::encode($this->title) ?>
  </h1>
  <p class="lead"> by <a href="#"><?= $model->eventOwner->username ?></a> </p>
  <p> <?php echo $isOwner?Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']):""; ?>
    <?= $isOwner?Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]):"" ?>
  </p>
  <div class="row">
    <div class="container">
      <div class="col-md12">
        <div class="thumbnail"> <img class="img-responsive" style="width:100%" alt="" src="<?= $model->image_url?>">
          <div class="caption-full">
            <h4 class="pull-right">$24.99</h4>
            <h4><a href="#">Product Name</a> </h4>
            <p>
              <?= $model->description ?>
            </p>
          </div>
          <div class="ratings">
            <p class="pull-right">
              <?= $model->commentCount ?>
              reviews</p>
            <p> <span class="glyphicon glyphicon-star"></span> <span class="glyphicon glyphicon-star"></span> <span class="glyphicon glyphicon-star"></span> <span class="glyphicon glyphicon-star"></span> <span class="glyphicon glyphicon-star-empty"></span> 4.0 stars </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!--Leave a Comment block if not guest-->
  <?= !Yii::$app->user->isGuest?$this->render('comment_form'):"" ?>
  <div class="well">
    <?= 
ListView::widget([
    'dataProvider' => $commentsDataProvider,
	'options' => [
        'tag' => 'div',
    ],
	
	'pager' => ['options' => ['class' => 'text-center pagination pagination-centered' ]],
	'layout' => "{pager}\n{items}\n{pager}",
	'itemView' => 'comment_view',
	'separator' => '<hr>',

]); 
?>
  </div>
  <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
            'type',
            'time:datetime',
            'free_places',
            'total_places',
            'meeting_point',
        ],
    ]) ?>
</div>
