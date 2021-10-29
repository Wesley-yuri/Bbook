<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "author_book".
 *
 * @property int $author_id
 * @property int $book_id
 *
 * @property Author $author
 * @property Book $book
 */
class AuthorBook extends \yii\db\ActiveRecord
{



    

    
//     public  $userGenre = [];



// /**
//  * @inheritdoc
//  */
// public function behaviors()
// {
//     return [
//         [
//             'class' => ManyToManyBehavior::className(),
//             'relations' => [
//                 [
//                     'editableAttribute' => 'userGenre', // Editable attribute name
//                     'table' => 'genre_book', // Name of the junction table
//                     'ownAttribute' => 'genre_id', // Name of the column in junction table that represents current model
//                     'relatedModel' => Book::class, // Related model class
//                     'relatedAttribute' => 'book_id', // Name of the column in junction table that represents related model
//                 ],
//             ],
//         ],
//     ];





    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'author_book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['author_id', 'book_id'], 'required'],
            [['author_id', 'book_id'], 'integer'],
            [['author_id', 'book_id'], 'unique', 'targetAttribute' => ['author_id', 'book_id']],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => Author::className(), 'targetAttribute' => ['author_id' => 'id']],
            [['book_id'], 'exist', 'skipOnError' => true, 'targetClass' => Book::className(), 'targetAttribute' => ['book_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'author_id' => Yii::t('app', 'Author ID'),
            'book_id' => Yii::t('app', 'Book ID'),
        ];
    }

    /**
     * Gets query for [[Author]].
     *
     * @return \yii\db\ActiveQuery|AuthorQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Author::className(), ['id' => 'author_id']);
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
     * {@inheritdoc}
     * @return AuthorBookQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AuthorBookQuery(get_called_class());
    }
}
