<?php

namespace backend\modules\user\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\user\models\User;

/**
 * UserSearch represents the model behind the search
 * form about `backend\modules\user\models\User`.
 */
class UserSearch extends User
{

    public function attributes()
    {
        $attributes = parent::attributes();
        $attributes['description'] = 'authItem.description';
        $attributes['rule_name'] = 'authItem.ruleName.name';
        return $attributes;
    }

    public function rules()
    {
        return [
            [['status'], 'integer'],
            [
                [
                    'username',
                    'email',
                    'authItem.description',
                    'authItem.ruleName.name',
                ],
                'safe'
            ],
            [
                [
                    'username',
                    'email',
                    'authItem.description',
                    'authItem.ruleName.name',
                ],
                'filter',
                'filter' => 'trim'
            ],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = User::find()
            ->joinWith([
                'authItem' => function ($query) {
                    $query->joinWith('ruleName', true, 'LEFT JOIN');
                }
            ], true, 'INNER JOIN');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => Yii::$app->current->getPageSize(),
            ],
        ]);

        $dataProvider->sort->attributes['status'] = [
            'asc' => ['user.status' => SORT_DESC],
            'desc' => ['user.status' => SORT_ASC],
        ];

        $dataProvider->sort->attributes['authItem.description'] = [
            'asc' => ['auth_item.description' => SORT_ASC],
            'desc' => ['auth_item.description' => SORT_DESC],
            'default' => SORT_ASC,
            'label' => 'test',
        ];

        $dataProvider->sort->attributes['authItem.ruleName.name'] = [
            'asc' => ['auth_rule.name' => SORT_ASC],
            'desc' => ['auth_rule.name' => SORT_DESC],
        ];

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'user.status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'user.username', $this->username])
            ->andFilterWhere(['like', 'user.email', $this->email])
            ->andFilterWhere(['like', 'auth_item.description', $this->{'authItem.description'}])
            ->andFilterWhere(['like', 'auth_rule.name', $this->{'authItem.ruleName.name'}]);

        return $dataProvider;
    }

}