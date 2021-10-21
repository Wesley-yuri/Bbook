<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[OrderBook]].
 *
 * @see OrderBook
 */
class OrderBookQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return OrderBook[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return OrderBook|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
