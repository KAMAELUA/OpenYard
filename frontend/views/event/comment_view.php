<?php
use yii\helpers\Url;
/* @var $this yii\web\View */
use yii\helpers\Html;
use common\models\User;
?>

<div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            <?= $model->user->username ?> 
                            <span class="pull-right"><?= $model->dayCounter ?></span>
                            <p><?= $model->comment ?></p>
                        </div>
                    </div>  