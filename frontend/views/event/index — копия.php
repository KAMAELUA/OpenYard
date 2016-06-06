<?php

use yii\helpers\Html;
use yii\grid\GridView;

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
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'title',
            //'created_at',
            //'updated_at',
            //'description:ntext',
            ['attribute' => 'typeName', 'value' => 'typeName.type'],
            'time:datetime',
            // 'free_places',
            // 'total_places',
            'meeting_point',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
