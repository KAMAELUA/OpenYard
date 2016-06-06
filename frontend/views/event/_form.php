<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\frontend\models;
use dosamigos\ckeditor\CKEditor;
use yii\bootstrap\Modal;
use kartik\datetime\DateTimePicker;


/* @var $this yii\web\View */
/* @var $model frontend\models\Event */
/* @var $form yii\widgets\ActiveForm */

$eventTypes = frontend\models\EventTypes::find()->all();
$eventTypesArray = ArrayHelper::map($eventTypes,'id','type');
$time = new DateTime();
$time->setTimestamp($model->time);
$model->time = $time->format('d-M-Y H:i');
?>

<div class="event-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ; ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'time')->widget(DateTimePicker::classname(), [
	'options' => ['placeholder' => 'Enter event time ...'],
	'pluginOptions' => [
		'autoclose' => true,
		'format' => 'dd-M-yyyy hh:ii'
	]
]); ?>

	<?= $form->field($model, 'type')->dropDownList($eventTypesArray);?>
    
    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>

    <?= $form->field($model, 'free_places')->textInput() ?>

    <?= $form->field($model, 'total_places')->textInput() ?>
    
    <?= $form->field($model, 'image')->fileInput() ?>

    <?= $form->field($model, 'meeting_point')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
