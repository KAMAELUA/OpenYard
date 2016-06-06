<?php
/* @var $this yii\web\View */
?>
  <div class="well">
                    <h4>Leave a Comment:</h4>
                    
                    <form role="form" action="/index.php?r=comment%2Fcreate" method="post">
                    <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>">
                        <div class="form-group">
                            <textarea name="Comment[comment]" class="form-control" rows="3"></textarea>
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>