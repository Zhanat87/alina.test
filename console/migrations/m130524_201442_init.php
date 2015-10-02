<?php

use yii\db\Schema;
use console\my\yii2\Migration;
use backend\my\app\Access;
use yii\rbac\Item;

class m130524_201442_init extends Migration
{

    public function safeUp()
    {
        $tableOptions = $this->getTableOptions();

        $this->createTable($this->getAuthManager()->ruleTable, [
            'name'       => Schema::TYPE_STRING . '(64) NOT NULL',
            'data'       => Schema::TYPE_TEXT,
            'created_at' => Schema::TYPE_DATETIME . ' NOT NULL' . $this->getDefaultDateTime(),
            'updated_at' => Schema::TYPE_DATETIME,
            'PRIMARY KEY (name)',
        ], $tableOptions);

        $this->createTable($this->getAuthManager()->itemTable, [
            'name'        => Schema::TYPE_STRING . '(64) NOT NULL',
            'type'        => Schema::TYPE_INTEGER . ' NOT NULL',
            'description' => Schema::TYPE_TEXT,
            'rule_name'   => Schema::TYPE_STRING . '(64)',
            'data'        => Schema::TYPE_TEXT,
            'created_at'  => Schema::TYPE_DATETIME . ' NOT NULL' . $this->getDefaultDateTime(),
            'updated_at'  => Schema::TYPE_DATETIME,
            'PRIMARY KEY (name)',
            'FOREIGN KEY (rule_name) REFERENCES ' . $this->getAuthManager()->ruleTable . ' (name) ON DELETE SET NULL ON UPDATE CASCADE',
        ], $tableOptions);
        $this->createIndex('idx-auth_item-type', $this->getAuthManager()->itemTable, 'type');

        $this->createTable($this->getAuthManager()->itemChildTable, [
            'parent' => Schema::TYPE_STRING . '(64) NOT NULL',
            'child'  => Schema::TYPE_STRING . '(64) NOT NULL',
            'PRIMARY KEY (parent, child)',
            'FOREIGN KEY (parent) REFERENCES ' . $this->getAuthManager()->itemTable . ' (name) ON DELETE CASCADE ON UPDATE CASCADE',
            'FOREIGN KEY (child) REFERENCES ' . $this->getAuthManager()->itemTable . ' (name) ON DELETE CASCADE ON UPDATE CASCADE',
        ], $tableOptions);

        $this->createTable($this->getAuthManager()->assignmentTable, [
            'item_name'  => Schema::TYPE_STRING . '(64) NOT NULL',
            'user_id'    => Schema::TYPE_STRING . '(64) NOT NULL',
            'created_at' => Schema::TYPE_DATETIME . ' NOT NULL' . $this->getDefaultDateTime(),
            'PRIMARY KEY (item_name, user_id)',
            'FOREIGN KEY (item_name) REFERENCES ' . $this->getAuthManager()->itemTable . ' (name) ON DELETE CASCADE ON UPDATE CASCADE',
        ], $tableOptions);

        $items = [
            [Access::ADMIN, Item::TYPE_ROLE, 'administrator'],
            [Access::USER, Item::TYPE_ROLE, 'easy user'],
        ];
        $this->batchInsert($this->getAuthManager()->itemTable, ['name', 'type', 'description'], $items);

        $this->createTable('{{%user}}', [
            'id'                   => $this->primaryKey(),
            'username'             => $this->string()->notNull()->unique(),
            'auth_key'             => $this->string(32)->notNull(),
            'password_hash'        => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email'                => $this->string()->notNull()->unique(),
            'role'                 => Schema::TYPE_STRING . '(64) NOT NULL',

            'status'               => $this->smallInteger()->notNull(),
            'created_at'           => $this->dateTime()->notNull(),
            'updated_at'           => $this->dateTime()->notNull(),
        ], $tableOptions);
        $this->addForeignKey('roleUserFk', '{{%user}}', 'role', $this->getAuthManager()->itemTable, 'name');

        $rows = [
            [
                Access::ADMIN,
                Yii::$app->getSecurity()->generateRandomString(),
                Yii::$app->getSecurity()->generatePasswordHash('testtest'),
                Access::ADMIN,
                'admin@admin.com',
            ],
            [
                Access::USER,
                Yii::$app->getSecurity()->generateRandomString(),
                Yii::$app->getSecurity()->generatePasswordHash('testtest'),
                Access::USER,
                'user@user.com',
            ],
        ];
        $this->batchInsert('{{%user}}', ['username', 'auth_key', 'password_hash', 'role', 'email'], $rows);

        $this->getAuthManager()->assign($this->getAuthManager()->getRole(Access::ADMIN), 1);
    }

    public function safeDown()
    {
        $this->dropTable($this->getAuthManager()->assignmentTable);
        $this->dropTable($this->getAuthManager()->itemChildTable);
        $this->dropTable($this->getAuthManager()->itemTable);
        $this->dropTable($this->getAuthManager()->ruleTable);
        $this->dropForeignKey('roleUserFk', '{{%user}}');
        $this->dropTable('{{%user}}');
    }
    
}