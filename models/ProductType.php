<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Product_type".
 *
 * @property int $id_product_type
 * @property string $name
 * @property float $koeficent_type_product
 *
 * @property Product[] $products
 */
class ProductType extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Product_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'koeficent_type_product'], 'required'],
            [['koeficent_type_product'], 'number'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_product_type' => 'Id Product Type',
            'name' => 'Name',
            'koeficent_type_product' => 'Koeficent Type Product',
        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::class, ['product_type_id' => 'id_product_type']);
    }

}
