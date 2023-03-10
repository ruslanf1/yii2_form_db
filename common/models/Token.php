<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "token".
 *
 * @property int $id
 * @property string $access_token
 * @property int $user_id
 * @property int $created_at
 * @property int $updated_at
 *
 * @property User $user
 */
class Token extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'token';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['access_token', 'user_id'], 'required'],
            [['user_id'], 'integer'],
            [['access_token'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * @return string[]
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    /**
     * @return array|\yii\db\ActiveRecord|null
     */
    public static function findLastAddedToken()
    {
        return static::find()
            ->orderBy(['id' => SORT_DESC])
            ->one();
    }

    /**
     * @param $accessToken
     * @param $userId
     * @return static
     */
    public static function add($accessToken, $userId)
    {
        $model = new static([
            'access_token' => $accessToken,
            'user_id' => $userId
        ]);

        $model->save();
        return $model;
    }
}
