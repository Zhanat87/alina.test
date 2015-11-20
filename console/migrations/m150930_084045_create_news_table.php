<?php

use console\my\yii2\Migration;

class m150930_084045_create_news_table extends Migration
{

    public function safeUp()
    {
        $this->createNewTable('{{%news}}', [
            'title' => $this->string()->notNull(),
            'text' => $this->text()->notNull(),
        ]);
        if (YII_DEBUG) {
            $faker = \Faker\Factory::create();
            $rows = [];
            for ($i = 0; $i < 100; ++$i) {
                $rows[] = [
                    $faker->word,
                    $faker->sentences(10, true),
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