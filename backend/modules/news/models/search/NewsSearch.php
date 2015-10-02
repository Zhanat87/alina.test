<?php

namespace backend\modules\news\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\news\models\News;

/**
 * NewsSearch represents the model behind the search form about
 * `backend\modules\news\models\News`.
 */
class NewsSearch extends News
{

    public function rules()
    {
        return [
            [['title', 'text', 'created_at'], 'safe'],
            [['status'], 'integer'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = News::find();

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
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'text', $this->text]);

        if ($this->created_at) {
            $interval = Yii::$app->current->getDateInterval($this->created_at);
            $query->andFilterWhere([
                'between', 'created_at', $interval[0], $interval[1]
            ]);
        }

        return $dataProvider;
    }

}