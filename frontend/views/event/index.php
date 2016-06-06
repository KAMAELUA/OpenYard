<?php

use yii\helpers\Html;
use yii\grid\GridView;

use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Events';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Event', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= 
ListView::widget([
    'dataProvider' => $dataProvider,
	'options' => [
        'tag' => 'div',
        'class' => 'row',
    ],
	'layout' => "{pager}\n{items}",
	'itemView' => 'item_view',

]); 
?>
</div>
