<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property int $category_id
 * @property string|null $description
 * @property int $price
 *
 * @property Cart[] $carts
 * @property Category $category
 * @property OrderItems[] $orderItems
 * @property ProductImage[] $productImages
 */
class Product extends \yii\db\ActiveRecord
{
    public $imageFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [[['description'], 'default', 'value' => null], [['name', 'category_id', 'price'], 'required'], [['category_id', 'price'], 'integer'], [['description'], 'string'], [['name'], 'string', 'max' => 200], [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'], [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']]];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'category_id' => 'Category ID',
            'description' => 'Description',
            'price' => 'Price',
        ];
    }

    /**
     * Gets query for [[Carts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarts()
    {
        return $this->hasMany(Cart::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * Gets query for [[OrderItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItems::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[ProductImages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductImages()
    {
        return $this->hasMany(ProductImage::class, ['product_id' => 'id']);
    }

     public function getProductMainImage()
    {
        return $this->hasOne(ProductImage::class, ['product_id' => 'id'])->orderBy(['order_id' => 1]);
    }

    public function getMainImageUrl()
{
    $mainImage = $this->productMainImage;
    return $mainImage ? '/admin/uploads/' . $mainImage->image : '/zay/img/shop_02.jpg';
}

    public function upload($imageName)
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('uploads/' . $imageName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }

    }
}
