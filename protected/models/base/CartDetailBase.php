<?php

/**
 * This is the model class for table "cart_detail".
 *
 * The followings are the available columns in table 'cart_detail':
 * @property integer $id
 * @property integer $cart_id
 * @property integer $product_id
 * @property integer $qty
 * @property string $total_price
 * @property string $item_price
 *
 * The followings are the available model relations:
 * @property Cart $cart
 * @property Product $product
 */
class CartDetailBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CartDetailBase the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cart_detail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cart_id, product_id, qty, total_price, item_price', 'required'),
			array('cart_id, product_id, qty', 'numerical', 'integerOnly'=>true),
			array('total_price, item_price', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, cart_id, product_id, qty, total_price, item_price', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'cart' => array(self::BELONGS_TO, 'Cart', 'cart_id'),
			'product' => array(self::BELONGS_TO, 'Product', 'product_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'cart_id' => 'Cart',
			'product_id' => 'Product',
			'qty' => 'Qty',
			'total_price' => 'Total Price',
			'item_price' => 'Item Price',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('cart_id',$this->cart_id);
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('qty',$this->qty);
		$criteria->compare('total_price',$this->total_price,true);
		$criteria->compare('item_price',$this->item_price,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}