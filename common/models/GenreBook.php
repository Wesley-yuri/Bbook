<?php

namespace common\models;
use yii\behaviors\BlameableBehavior;
use arogachev\ManyToMany\behaviors\ManyToManyBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "genre_book".
 *
 * @property int $genre_id
 * @property int $book_id
 *
 * @property Book $book
 * @property Genre $genre
 */
class GenreBook extends \yii\db\ActiveRecord
{




    public  $userGenre = [];



    /**
     * @inheritdoc
     */
    public function behaviors()
    {


        return[
            'timestamp' => [
                'class' => TimestampBehavior::class
            ],
        ];




        return [     [
                'class' => ManyToManyBehavior::className(),
                'relations' => [
                    [
                        'editableAttribute' => 'userGenre', // Editable attribute name
                        'table' => 'genre_book', // Name of the junction table
                        'ownAttribute' => 'genre_id', // Name of the column in junction table that represents current model
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
        return 'genre_book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['genre_id', 'book_id'], 'required'],
            [['book_id'], 'integer'],
            [['genre_id'], 'string', 'max' => 40],
            [['genre_id', 'book_id'], 'unique', 'targetAttribute' => ['genre_id', 'book_id']],
            [['book_id'], 'exist', 'skipOnError' => true, 'targetClass' => Book::className(), 'targetAttribute' => ['book_id' => 'id']],
            [['genre_id'], 'exist', 'skipOnError' => true, 'targetClass' => Genre::className(), 'targetAttribute' => ['genre_id' => 'id']],
           
            ['userGenre', 'each','skipOnEmpty'=> false, 'rule' => ['exist', 'skipOnError' => true, 'targetClass' => Book::className(), 'targetAttribute' => ['userGenre' => 'id']]],
        
        
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'genre_id' => Yii::t('app', 'Genre ID'),
            'book_id' => Yii::t('app', 'Book ID'),
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
     * Gets query for [[Genre]].
     *
     * @return \yii\db\ActiveQuery|GenreQuery
     */
    public function getGenre()
    {
        return $this->hasOne(Genre::className(), ['id' => 'genre_id']);
    }

    /**
     * {@inheritdoc}
     * @return GenreBookQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GenreBookQuery(get_called_class());
    }
}
