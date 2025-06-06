<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Workshop".
 *
 * @property int $id_workshop
 * @property string $name
 * @property int $workshop_type_id
 * @property int $count_people
 *
 * @property ProductWorkshop[] $productWorkshops
 * @property WorkshopType $workshopType
 */
class Workshop extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Workshop';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'workshop_type_id', 'count_people'], 'required'],
            [['workshop_type_id', 'count_people'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['workshop_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => WorkshopType::class, 'targetAttribute' => ['workshop_type_id' => 'id_workshop_type']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_workshop' => 'Id Workshop',
            'name' => 'Name',
            'workshop_type_id' => 'Workshop Type ID',
            'count_people' => 'Count People',
        ];
    }

    /**
     * Gets query for [[ProductWorkshops]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductWorkshops()
    {
        return $this->hasMany(ProductWorkshop::class, ['workshop_id' => 'id_workshop']);
    }

    /**
     * Gets query for [[WorkshopType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkshopType()
    {
        return $this->hasOne(WorkshopType::class, ['id_workshop_type' => 'workshop_type_id']);
    }

}
