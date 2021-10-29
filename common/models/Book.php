<?php

namespace common\models;

use arogachev\ManyToMany\behaviors\ManyToManyBehavior;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\base\Behavior;
use Yii;

/**
 * This is the model class for table "book".
 *
 * @property int $id
 * @property string|null $title
 * @property string $author_book
 * @property int $launch_date
 * @property string $genre_book_id
 * @property int $created_at
 * @property int $updated_at
 *
 * @property OrderBook[] $orderBooks
 * @property Order[] $orders
 */
class Book extends ActiveRecord
{


    public  $genreMultiple = [];

    public function behaviors(){
    
    // return
    // [
    //     'timestamp' => [
    //         'class' => TimestampBehavior::class
    //     ]
    // ]





    return [
        [
            
            'class' => ManyToManyBehavior::className(),
            'relations' => [
                [
                    'editableAttribute' => 'genreMultiple', // Editable attribute name
                    'table' => 'genre_book', // Name of the junction table
                    'ownAttribute' => 'book_id', // Name of the column in junction table that represents current model
                    'relatedModel' => Genre::class, // Related model class
                    'relatedAttribute' => 'genre_id', // Name of the column in junction table that represents related model
                ],
            ],
        ],
        
            'timestamp' => [
                'class' => TimestampBehavior::class
            ]
        
    ];




}






/**
 * @inheritdoc
 */

// 



    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book';
    }


   

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['author_id'], 'required'],
            [['author_id','launch_date', 'created_at', 'updated_at'], 'integer'],
            [['title'], 'string', 'max' => 40],
            //[[], 'string', 'max' => 30],
            //[[''], 'string', 'max' => 255],

            ['genreMultiple', 'each','skipOnEmpty'=> false, 'rule' => ['exist', 'skipOnError' => true, 'targetClass' => Genre::className(), 'targetAttribute' => ['genreMultiple' => 'id']]],
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
            'author_id' => 'Author',
            'launch_date' => 'Launch Date',
            'genreMultiple' => 'Genre from book',
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
