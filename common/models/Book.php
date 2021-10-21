<?php

namespace common\models;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use Yii;

/**
 * This is the model class for table "book".
 *
 * @property int $id
 * @property string|null $title
 * @property string $author_book
 * @property int $launch_date
 * @property string $genre_book
 * @property int $created_at
 * @property int $updated_at
 *
 * @property OrderBook[] $orderBooks
 * @property Order[] $orders
 */
class Book extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book';
    }


    
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['author_book', 'launch_date', 'genre_book'], 'required'],
            [['launch_date', 'created_at', 'updated_at'], 'integer'],
            [['title'], 'string', 'max' => 15],
            [['author_book'], 'string', 'max' => 22],
            [['genre_book'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'author_book' => 'Author Book',
            'launch_date' => 'Launch Date',
            'genre_book' => 'Genre Book',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[OrderBooks]].
     *
     * @return \yii\db\ActiveQuery|OrderBookQuery
     */
    public function getOrderBooks()
    {
        return $this->hasMany(OrderBook::className(), ['book_id' => 'id']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery|OrderQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['id' => 'order_id'])->viaTable('order_book', ['book_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return BookQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BookQuery(get_called_class());
    }
}
