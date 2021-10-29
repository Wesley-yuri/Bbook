<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "genre".
 *
 * @property int $id
 * @property string|null $title
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Book[] $books
 * @property GenreBook[] $genreBooks
 */
class Genre extends ActiveRecord
{

    public function behaviors(){

        return[
            'timestamp' => [
                'class' => TimestampBehavior::class
            ],
        ];
    }


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'genre';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['title'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Books]].
     *
     * @return \yii\db\ActiveQuery|BookQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Book::className(), ['id' => 'book_id'])->viaTable('genre_book', ['genre_id' => 'id']);
    }

    /**
     * Gets query for [[GenreBooks]].
     *
     * @return \yii\db\ActiveQuery|GenreBookQuery
     */
    public function getGenreBooks()
    {
        return $this->hasMany(GenreBook::className(), ['genre_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return GenreQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GenreQuery(get_called_class());
    }
}
