<?php

namespace app\models;

use yii\helpers\Html;
use Imagine\Image\Box;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\imagine\Image;

/**
 * This is the model class for table "house".
 *
 * @property int $id
 * @property string|null $img Rasmlarni tanlang
 * @property int|null $address_id Uy joylashgan tuman
 * @property int|null $rooms Xonalar soni
 * @property string|null $price Narxi
 * @property int|null $status Xolati
 * @property string|null $description Qo'shimcha ma'lumot
 * @property int $create_at Qo'shilgan vaqti
 *
 * @property District $address
 */
class House extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'house';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
            'attributes' =>[
                ActiveRecord::EVENT_BEFORE_INSERT => ['create_at']
            ],
                ],

                    ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description', 'price'], 'string'],
            [['address_id','status', 'rooms','create_at'], 'integer'],
            [['address_id'], 'exist', 'skipOnError' => true, 'targetClass' => District::className(), 'targetAttribute' => ['address_id' => 'id']],
//            [['img'],'file','skipOnEmpty' => false,'extensions' => 'jpg png jpeg', 'maxFiles' => 4],
        ];
    }
    /**
    *
    */
    public function upload()
    {
        if ($this->validate()) {
            $path = null;
            foreach ($this->img as $file) {

                $file->saveAs('img/' . $file->baseName . '.' . $file->extension);
                $path[] = 'img/' . $file->baseName . '.' . $file->extension;
                Image::getImagine()
                    ->open('img/' . $file->baseName . '.' . $file->extension)
                    ->thumbnail(new Box(1280,1280))
                    ->save();
            }
                $this->img = json_encode($path);
            return true;
        } else {
            return false;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'img' => 'Rasmlarni tanlang',
            'address_id' => 'Uy joylashgan tuman',
            'rooms' => 'Xonalar soni',
            'price' => 'Narxi',
            'status' => 'Xolati',
            'description' => 'Qo\'shimcha ma\'lumot',
            'create_at' => 'Qo`shilgan vaqti',
        ];
    }

    /**
     * Gets query for [[Address]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAddress()
    {
        return $this->hasOne(District::className(), ['id' => 'address_id']);
    }

    public function getImages()
    {

        return json_decode($this->img);
    }

    public function getImagesforcarousel()
    {
        $readytoCarousel = null;
        $images = $this->getImages();
        foreach ($images as $image){
            $readytoCarousel []= [
                'content' => Html::img(\yii\helpers\Url::to(["@web/".$image]))
            ];
        }
        return $readytoCarousel;
    }
}
