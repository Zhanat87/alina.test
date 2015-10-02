<?php

namespace backend\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\ArrayHelper;

class ContractorWizard extends Widget
{

    public $step;

    private $_urls;

    public function init()
    {
        parent::init();
        $this->_urls = [
            1 => Yii::$app->getUrlManager()->createUrl(['organization/index/index']),
            2 => Yii::$app->getUrlManager()->createUrl(['department/index/index']),
            3 => Yii::$app->getUrlManager()->createUrl(['personal/index/index']),
        ];
    }

    public function run()
    {
        return $this->render('contractor-wizard', [
            'step' => $this->step,
            'next' => $this->getNext(),
            'prev' => $this->getPrev(),
            'isFirst' => $this->isFirst(),
            'isLast' => $this->isLast(),
            'nextLabel' => $this->nextLabel(),
            'liClasses' => $this->getLiClasses(),
            'badgeClasses' => $this->getBadgeClasses(),
            'urls' => $this->getUrls(),
        ]);
    }

    protected function getNext()
    {
        return ArrayHelper::getValue($this->_urls, $this->step + 1, '#');
    }

    protected function getPrev()
    {
        return ArrayHelper::getValue($this->_urls, $this->step - 1, '#');
    }

    protected function isFirst()
    {
        return $this->step == 1 ? ' disabled="disabled"' : '';
    }

    protected function isLast()
    {
        return $this->step == 3 ? ' disabled="disabled"' : '';
    }

    protected function nextLabel()
    {
        return $this->step == 3 ? 'Финиш' : 'Следующее&nbsp;&DoubleLongRightArrow;';
    }

    protected function getLiClasses()
    {
        $liClasses = [
            1 => $this->step != 1 ? 'complete' : 'active',
            2 => $this->step == 2 ? 'active' : ($this->step > 2 ? 'complete' : ''),
            3 => $this->step != 3 ? '' : 'active',
        ];
        return $liClasses;
    }

    protected function getBadgeClasses()
    {
        $badgeClasses = [
            1 => $this->step != 1 ? ' badge-success' : ' badge-primary',
            2 => $this->step == 2 ? ' badge-primary' : ($this->step > 2 ? ' badge-success' : ''),
            3 => $this->step != 3 ? '' : ' badge-primary',
        ];
        return $badgeClasses;
    }

    protected function getUrls()
    {
        return $this->_urls;
    }

}