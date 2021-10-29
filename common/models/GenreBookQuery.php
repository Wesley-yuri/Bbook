<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[GenreBook]].
 *
 * @see GenreBook
 */
class GenreBookQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return GenreBook[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return GenreBook|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
