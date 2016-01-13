<?php

namespace backend\modules\book\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\book\models\Book;

/**
 * BookSearch represents the model behind the search form about
 * `backend\modules\book\models\Book`.
 */
class BookSearch extends Book
{

    public function rules()
    {
        return [
            [['name', 'publish_date', 'created_at'], 'safe'],
            [['id', 'author_id', 'status'], 'integer'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Book::find();

        if (!isset($params['sort'])) {
            $query->orderBy(['created_at' => SORT_DESC]);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => Yii::$app->current->getPageSize(),
            ],
        ]);

        $dataProvider->sort->attributes['status'] = [
            'asc' => ['status' => SORT_DESC],
            'desc' => ['status' => SORT_ASC],
        ];

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'author_id' => $this->author_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        if ($this->created_at) {
            $interval = Yii::$app->current->getDateInterval($this->created_at);
            $query->andFilterWhere([
                'between', 'created_at', $interval[0], $interval[1]
            ]);
        }

        if ($this->publish_date) {
            $interval = Yii::$app->current->getDateRangeInterval($this->publish_date, false);
            $query->andFilterWhere([
                'between', 'publish_date', $interval[0], $interval[1]
            ]);
        }

        return $dataProvider;
    }

}