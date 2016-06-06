<?php

namespace frontend\models;

use common\models\User;



use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $event_id
 * @property string $comment
 * @property integer $rating
 * @property integer $creation_time
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['comment'], 'required'],
            [['comment'], 'string'],
        ];
    }
	
	public function getDayCounter()
	{
		$time = time();
		$day = 60 * 60 * 24;
		$hour = 60 * 60;
		$minute = 60;
		
		$delta = $time - $this->creation_time;
		if($delta > $day)
		{
			return intval($delta / $day) . " days ago.";
		}
		elseif($delta > $hour)
		{
			return intval($delta / $hour) . " hours ago.";
		}
		elseif($delta > $minute)
		{
			return intval($delta / $minute) . " minutes ago.";
		}
		else
		{
			return $delta . " seconds ago.";
		}
		
	}	
	
	
	public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'event_id' => 'Event ID',
            'comment' => 'Comment',
            'rating' => 'Rating',
            'creation_time' => 'Creation Time',
        ];
    }
}
