<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Product".
 *
 * @property int $id_product
 * @property int $product_type_id
 * @property string $name
 * @property int $article
 * @property float $min_price_partner
 * @property int $material_type_id
 *
 * @property MaterialType $materialType
 * @property ProductType $productType
 * @property ProductWorkshop[] $productWorkshops
 */
class Product extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_type_id', 'name', 'article', 'min_price_partner', 'material_type_id'], 'required'],
            [['product_type_id', 'article', 'material_type_id'], 'integer'],
            [['min_price_partner'], 'number'],
            [['name'], 'string', 'max' => 255],
            [['material_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => MaterialType::class, 'targetAttribute' => ['material_type_id' => 'id_material_type']],
            [['product_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductType::class, 'targetAttribute' => ['product_type_id' => 'id_product_type']],
        ];
    }



    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_product' => 'Id Product',
            'product_type_id' => 'Тип продукта',
            'name' => 'Название продукта',
            'article' => 'Артикул',
            'min_price_partner' => 'Минимальная цена для партнеров',
            'material_type_id' => 'Тип материала',
        ];
    }

    /**
     * Gets query for [[MaterialType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialType()
    {
        return $this->hasOne(MaterialType::class, ['id_material_type' => 'material_type_id']);
    }

    /**
     * Gets query for [[ProductType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductType()
    {
        return $this->hasOne(ProductType::class, ['id_product_type' => 'product_type_id']);
    }

    /**
     * Gets query for [[ProductWorkshops]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductWorkshops()
    {
        return $this->hasMany(ProductWorkshop::class, ['product_id' => 'id_product']);
    }

}
