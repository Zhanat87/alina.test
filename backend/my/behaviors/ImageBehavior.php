<?php
/**
 * Created by PhpStorm.
 * User: zhanat
 * Date: 1/5/16
 * Time: 10:10 PM
 */

namespace backend\my\behaviors;

use yiidreamteam\upload\ImageUploadBehavior;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;

class ImageBehavior extends ImageUploadBehavior
{

    /**
     * Before save event.
     *
     * @throws \yii\base\InvalidConfigException
     */
    public function beforeSave()
    {
        if ($this->file instanceof UploadedFile) {
            if (!$this->owner->isNewRecord) {
                /** @var static $oldModel */
                $oldModel = $this->owner->findOne($this->owner->primaryKey);
                $oldModel->cleanFiles();
            }
            $this->owner->{$this->attribute} = $this->file->baseName . '.' . $this->file->extension;
        } else { // Fix html forms bug, when we have empty file field
            if (!$this->owner->isNewRecord && empty($this->owner->{$this->attribute})) {
//                $this->owner->{$this->attribute} = ArrayHelper::getValue($this->owner->oldAttributes, $this->attribute, null);
            }
        }
    }

}