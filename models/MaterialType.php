<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Material_type".
 *
 * @property int $id_material_type
 * @property string $name
 * @property float $percent_loss_material
 *
 * @property Product[] $products
 */
class MaterialType extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Material_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'percent_loss_material'], 'required'],
            [['percent_loss_material'], 'number'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_material_type' => 'Id Material Type',
            'name' => 'Name',
            'percent_loss_material' => 'Percent Loss Material',
        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::class, ['material_type_id' => 'id_material_type']);
    }

}
