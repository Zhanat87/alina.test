<?php

namespace console\my\yii2;

use yii\db\Migration as Yii2Migration;
use yii\db\Schema;
use yii\helpers\ArrayHelper;
use yii\base\InvalidConfigException;
use yii\rbac\DbManager;
use Yii;

/**
 * Class Migration
 * @package console\my\yii2
 */
class Migration extends Yii2Migration
{

    /**
     * @var string
     */
    protected  $tableOptions;

    /** @var string */
    protected $defaultDateTime;

    /**
     * @param string $engine
     * @return string return sql query, which set table options
     */
    public function getTableOptions($engine = 'InnoDB')
    {
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $this->tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=' . $engine;
        }
        return $this->tableOptions;
    }

    public function getDefaultDateTime()
    {
        switch ($this->db->driverName) {
            case 'mysql' :
                $this->defaultDateTime = ' DEFAULT NOW()';
                break;
            case 'mssql' :
                $this->defaultDateTime = ' DEFAULT GETDATE()';
                break;
        }
        return $this->defaultDateTime;
    }

    /**
     * @return array
     */
    protected function getServiceColumns()
    {
        return [
            'id' => Schema::TYPE_PK,
            'created_at' => Schema::TYPE_DATETIME . " NOT NULL" . $this->getDefaultDateTime(),
            'updated_at' => Schema::TYPE_DATETIME,
            'status' => Schema::TYPE_SMALLINT . "(1) NOT NULL DEFAULT 1",
        ];
    }

    /**
     * @param $tableName
     * @param $columns
     * @param bool $withServiceColumns
     */
    protected function createNewTable($tableName, $columns, $withServiceColumns = true)
    {
        $this->createTable($tableName, $withServiceColumns ?
            ArrayHelper::merge($this->getServiceColumns(), $columns) : $columns, $this->getTableOptions());
    }

    /**
     * @return DbManager
     * @throws InvalidConfigException
     */
    protected function getAuthManager()
    {
        $authManager = Yii::$app->getAuthManager();
        if (!$authManager instanceof DbManager) {
            throw new InvalidConfigException(
                'You should configure "authManager" component to use database before executing this migration.');
        }
        return $authManager;
    }

} 