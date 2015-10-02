<?php

namespace common\my\yii2;

use Yii;
use yii\db\ActiveRecord as YiiActiveRecord;
use common\my\traits\CachedKeyValueData;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\HtmlPurifier;

/**
 * Class ActiveRecord
 * @package common\my\yii2
 */
class ActiveRecord extends YiiActiveRecord
{

    use CachedKeyValueData;

    /**
     * @return array
     */
    public function behaviors()
    {
        $data = [];
        if ($this->isTimestampBehavior()) {
            $data['timestamp'] = [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'created_at',
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'updated_at',
                ],
                'value' => new Expression('NOW()'),
            ];
        }
        return $data;
    }

    /**
     * @return bool
     */
    protected function isTimestampBehavior()
    {
        return $this->hasAttribute('created_at') && $this->hasAttribute('updated_at');
    }

    /**
     * @return bool
     */
    protected function deleteCache()
    {
        $tableName = trim(self::tableName(), '{%}');
        if ($this->hasMethod('getAllForLists')) {
            Yii::$app->cache->delete($tableName . 'getAllForLists');
        }
        if ($this->hasMethod('getAllForLists2')) {
            Yii::$app->cache->delete($tableName . 'getAllForLists2');
        }
        return true;
    }

    /**
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->deleteCache();
            if ($this->isTimestampBehavior() && !$this->isNewRecord) {
                $this->created_at = Yii::$app->current->setDateTimeForDb($this->created_at);
            }
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return bool
     */
    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            $this->deleteCache();
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return bool
     */
    public function afterFind()
    {
        if ($this->isTimestampBehavior()) {
            $this->created_at = Yii::$app->current->getDateTimeFromDb($this->created_at);
            $this->updated_at = Yii::$app->current->getDateTimeFromDb($this->updated_at);
        }
        return parent::afterFind();
    }

    /**
     * @param $v
     * @return string
     */
    public function clearText($v)
    {
        return HtmlPurifier::process(trim($v));
    }

} 