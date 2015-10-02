<?php

namespace backend\widgets;

use Yii;
use yii\base\Widget;

class MyGridView extends Widget
{

    public $totalCount, $id;

    public function run()
    {
        $pageSize = intval(Yii::$app->request->getQueryParam('pageSize'));
        return $this->render('my-grid-view', [
            'counts' => $this->getCounts($this->totalCount),
            'grid' => $this->id,
            'pageSize' => $pageSize < $this->totalCount ? ($pageSize > 0 ?
                    $pageSize : Yii::$app->params['pageSizeMin']) : $this->totalCount,
        ]);
    }

    private function getCounts($totalCount)
    {
        $data = [
            Yii::$app->params['pageSizeMin'] => Yii::$app->params['pageSizeMin'],
        ];
        foreach ([40, 60, 80, 100, $totalCount] as $v) {
            if ($v < $totalCount) {
                $data[$v] = $v;
            } else {
                $data[$totalCount] = 'Все';
            }
        }
        return $data;
    }

} 