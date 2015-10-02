<?php

use yii\db\Schema;
use console\my\yii2\Migration;

class m150930_084045_create_news_table extends Migration
{

    public function safeUp()
    {
        $this->createTable('{{%news}}', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . "(255) NOT NULL",
            'text' => Schema::TYPE_TEXT . " NOT NULL",
            'created_at' => Schema::TYPE_DATETIME . " NOT NULL" . $this->getDefaultDateTime(),
            'updated_at' => Schema::TYPE_DATETIME,
            'status' => Schema::TYPE_SMALLINT . "(1) NOT NULL DEFAULT 1",
        ], $this->getTableOptions());
        if (YII_DEBUG) {
            $faker = \Faker\Factory::create();
            $rows = [];
            for ($i = 0; $i < 100; ++$i) {
                $rows[] = [
                    $faker->word,
                    $faker->sentence(),
                ];
            }
            $this->batchInsert('{{%news}}', ['title', 'text'], $rows);
        }
        echo "create news table: success up\n";
    }

    public function safeDown()
    {
        $this->dropTable('{{%news}}');
        echo "create news table: success down\n";
    }

}