<?php
/* @var $this yii\web\View */
use yii\widgets\ListView;
$this->title = 'Open Yard';
?>

<div class="site-index">
  <div class="body-content">
    <form class="form-horizontal" role="form">
      <div class="form-group">
        <div class="col-md-12" style="padding-left:15px; padding-right:15px;">
          <div class="form-group form-group-lg" style="margin: 0;">
            <div class="col-md-4 no_padding" style="border-radius: 4px 0 0 4px;">
              <input type="text" style="border-radius: 4px 0 0 4px;" class="form-control" id="inputKey" placeholder="Search for events of categories">
            </div>
            <div class="col-md-3 no_padding" style="border-radius: 0;">
              <input type="text" style="border-radius: 0;" class="form-control" id="inputValue" placeholder="Enter city or location">
            </div>
            <div class="col-md-3 no_padding" style="border-radius: 0;">
              <select class="form-control"  style="border-radius: 0;" id="sel1">
                <option>All Dates</option>
                <option>Today</option>
                <option>Tomorrow</option>
                <option>This Week</option>
                <option>This Weekend</option>
                <option>Next Week</option>
                <option>Next Month</option>
              </select>
            </div>
            <div class="col-md-2 no_padding" style="border-radius: 0 4px 4px 0; padding-right:0;">
              <button type="button"  class="btn btn-lg btn-primary btn-block form-control" style="border-radius: 0 4px 4px 0;">Search</button>
            </div>
          </div>
          <div class="form-group"> </div>
        </div>
      </div>
    </form>
    <div>
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
  </div>
</div>
