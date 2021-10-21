<?php

namespace common\models;
use yii\db\ActiveRecord;
use arogachev\ManyToMany\behaviors\ManyToManyBehavior;
use Yii;
/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property int $client_id
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Book[] $books
 * @property Client $client
 * @property OrderBook[] $orderBooks
 */
class Order extends ActiveRecord
{
    public  $editableUsers = [];



/**
 * @inheritdoc
 */
public function behaviors()
{
    return [
        [
            'class' => ManyToManyBehavior::className(),
            'relations' => [
                [
                    'editableAttribute' => 'editableUsers', // Editable attribute name
                    'table' => 'order_book', // Name of the junction table
                    'ownAttribute' => 'order_id', // Name of the column in junction table that represents current model
                    'relatedModel' => Book::class, // Related model class
                    'relatedAttribute' => 'book_id', // Name of the column in junction table that represents related model
                ],
            ],
        ],
    ];
}





    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_id','editableUsers'], 'required'],
            [['client_id', 'created_at', 'updated_at'], 'integer'],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Client::className(), 'targetAttribute' => ['client_id' => 'id']],
            ['editableUsers', 'each','skipOnEmpty'=> false, 'rule' => ['exist', 'skipOnError' => true, 'targetClass' => Book::className(), 'targetAttribute' => ['editableUsers' => 'id']]],
        ];

    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'client_id' => 'Client ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Books]].
     *
     * @return \yii\db\ActiveQuery|BookQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Book::className(), ['id' => 'book_id'])->viaTable('order_book', ['order_id' => 'id']);
    }

    /**
     * Gets query for [[Client]].
     *
     * @return \yii\db\ActiveQuery|ClientQuery
     */
    public function getClient()
    {
        return $this->hasOne(Client::className(), ['id' => 'client_id']);
    }

    /**
     * Gets query for [[OrderBooks]].
     *
     * @return \yii\db\ActiveQuery|OrderBookQuery
     */
    public function getOrderBooks()
    {
        return $this->hasMany(OrderBook::className(), ['order_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return OrderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrderQuery(get_called_class());
    }

  
}
