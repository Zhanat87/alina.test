<?php

namespace backend\my\yii2;

use Yii;
use yii\grid\GridView as YiiGridView;
use backend\widgets\MyGridView as Widget;

class GridView extends YiiGridView
{

    public $layout = "{summary}\n{items}\n{pager}\n{count}";

    public function init()
    {
        return parent::init();
    }

    public function renderSection($name)
    {
        switch ($name) {
            case '{summary}':
                return $this->renderSummary();
            case '{items}':
                return $this->renderItems();
            case '{pager}':
                return $this->renderPager();
            case '{sorter}':
                return $this->renderSorter();
            case '{count}':
                return $this->renderCount();
            default:
                return false;
        }
    }

    public function renderCount()
    {
        $totalCount = $this->dataProvider->getTotalCount();
        return $totalCount > Yii::$app->params['pageSizeMin'] ? Widget::widget([
            'totalCount' => $totalCount,
            'id' => $this->options['id'],
        ]) : null;
    }

} 