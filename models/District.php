<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "district".
 *
 * @property int $id
 * @property string|null $name Tuman nomi
 *
 * @property House[] $houses
 */
class District extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'district';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Tuman nomi',
        ];
    }

    /**
     * Gets query for [[Houses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHouses()
    {
        return $this->hasMany(House::className(), ['address_id' => 'id']);
    }
}
