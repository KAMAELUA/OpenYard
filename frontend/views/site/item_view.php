<?php
use yii\helpers\Url;
/* @var $this yii\web\View */

use yii\helpers\Html;
//var_dump($model);
$desc = substr($model->description, 0, 335);
$time = new DateTime();
$time->setTimestamp($model->time);
$model->time = $time->format('D, M j H:i A');
?>
            <div class="col-lg-4 col-md-4 col-xs-12" style="height:480px;">
            <div class="panel panel-default  evnt_hearder">
   <a href="<?= Url::to(['event/view', 'id' => $model->id]); ?>"><div class="panel-heading" style="width:100%;background-image:url('<?= $model->image_url ?>');
  background-size:cover;">  
  <h2 class="stroked_text"><?= $model->title ?></h2>   
  </div>
  </a>
  <div class="panel-body fill-full-height" style="padding: 10px 15px;">
    <h5 style="margin:0;"><?= $model->time ?></h5>
    <h4 style="margin:0;"><?= $model->meeting_point?></h4>
   
  </div>
  <ul class="list-group fill-full-height" style="height: 100%;">
   <li class="list-group-item " style="height: 100%;"> <p><?= $desc?> </p><div class="fill-full-height"></div></li>
    <li class="list-group-item clearfix"> 
    <span class="pull-right">
    	<div class="btn-group">
        
  		<button type="button" title="Share" class="btn btn-default"><span class="glyphicon glyphicon-share"></span></button>
  		<button type="button" title="Save" class="btn btn-default"><span  class="glyphicon glyphicon-bookmark"></span></button>
        <a class="btn btn-default" href="<?= Url::to(['event/view', 'id' => $model->id]); ?>"><span  class="glyphicon glyphicon-eye-open"></span></a>
        </div>
	</span>
    </li>
  </ul>
</div></div>