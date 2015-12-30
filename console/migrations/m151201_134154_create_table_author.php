<?php

use console\my\yii2\Migration;

class m151201_134154_create_table_author extends Migration
{

    public function safeUp()
    {
        $this->createTable(
            '{{%author}}',
            [
                'id' => $this->primaryKey(),
                'name' => $this->string()->notNull(),
                'surname' => $this->string()->notNull(),
            ],
            $this->getTableOptions()
        );
        if (YII_DEBUG) {
            $faker = \Faker\Factory::create();
            $rows = [];
            for ($i = 0; $i < 10; ++$i) {
                $rows[] = [
                    $faker->firstName,
                    $faker->lastName,
                ];
            }
            $this->batchInsert('{{%author}}', ['name', 'surname'], $rows);
        }
        echo "create table author: success up\n";
    }

    public function safeDown()
    {
        $this->dropTable('{{%author}}');
        echo "create table author: success down\n";
    }

}