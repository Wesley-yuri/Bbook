<?php

namespace common\models;
use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "order_book".
 *
 * @property int $order_id
 * @property int $book_id
 *
 * @property Book $book
 * @property Order $order
 */
class OrderBook extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'book_id'], 'required'],
            [['order_id', 'book_id'], 'integer'],
            [['order_id', 'book_id'], 'unique', 'targetAttribute' => ['order_id', 'book_id']],
            [['book_id'], 'exist', 'skipOnError' => true, 'targetClass' => Book::className(), 'targetAttribute' => ['book_id' => 'id']],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'book_id' => 'Book ID',
        ];
    }

    /**
     * Gets query for [[Book]].
     *
     * @return \yii\db\ActiveQuery|BookQuery
     */
    public function getBook()
    {
        return $this->hasOne(Book::className(), ['id' => 'book_id']);
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery|OrderQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }

    /**
     * {@inheritdoc}
     * @return OrderBookQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrderBookQuery(get_called_class());
    }
}
