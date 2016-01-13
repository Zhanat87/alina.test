<?php

namespace backend\modules\rbac\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\rbac\models\AuthItemChild;

/**
 * AuthItemChildSearch represents the model behind the search form about
 * `backend\modules\rbac\models\AuthItemChild`.
 */
class AuthItemChildSearch extends AuthItemChild
{

    public function rules()
    {
        return [
            [['parent', 'child'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = AuthItemChild::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => Yii::$app->current->getPageSize(),
            ],
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'parent' => $this->parent,
            'child'  => $this->child,
        ]);

        return $dataProvider;
    }

}