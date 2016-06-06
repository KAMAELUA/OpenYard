<?php

namespace frontend\models;

use Yii;
use yii\web\UploadedFile;
use frontend\models\Comment;
use common\models\User;

/**
 * This is the model class for table "event".
 *
 * @property integer $id
 * @property string $title
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $description
 * @property integer $type
 * @property integer $user_id
 * @property integer $time
 * @property integer $free_places
 * @property integer $total_places
 * @property file $image_url
 * @property string $meeting_point
 */
 
 
class Event extends \yii\db\ActiveRecord
{
	public $image;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event';
    }
	
	public function getTypeName()
    {
        return $this->hasOne(EventTypes::className(), ['id' => 'type']);
    }
	
	public function getComments()
    {
        return $this->hasMany(Comment::className(), ['event_id' => 'id']);
    }
	
	public function getEventOwner()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
	
	public function getCommentCount()
    {
		$count = Comment::find()		
		->where(['event_id' => $this->id])
		->count();
        return $count;
    }
	
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
			[['image_url'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [['title', 'description', 'type', 'time', 'free_places', 'total_places'], 'required'],
            [['created_at', 'updated_at', 'type', 'free_places', 'total_places'], 'integer'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 256],
            [['meeting_point'], 'string', 'max' => 512],
            [['title'], 'unique'],
        ];
    }
	
	public function upload($image_hash)
    {
        if ($this->validate()) {
            $this->image->saveAs($image_hash);
            return true;
        } else {
            return false;
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'description' => 'Description',
            'type' => 'Type',
            'time' => 'Time',
            'free_places' => 'Free Places',
            'total_places' => 'Total Places',
            'meeting_point' => 'Meeting Point',
        ];
    }
}
