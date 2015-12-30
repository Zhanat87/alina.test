<?php

use console\my\yii2\Migration;

class m151201_134203_create_table_book extends Migration
{

    public function safeUp()
    {
        $this->createNewTable(
            '{{%book}}',
            [
                'author_id' => $this->integer(11)->notNull(),
                'name' => $this->string()->notNull(),
                'image' => $this->string()->notNull(),
                'publish_date' => $this->date()->notNull(),
            ]
        );
        $this->addForeignKey('authorIdBookFk', '{{%book}}', 'author_id', '{{%author}}', 'id');
        if (YII_DEBUG) {
            $faker = \Faker\Factory::create();
            $rows = [];
            for ($i = 0; $i < 100; ++$i) {
                $rows[] = [
                    mt_rand(1, 10),
                    $faker->name,
                    'image',
                    $faker->date(),
                ];
            }
            $this->batchInsert('{{%book}}', ['author_id', 'name', 'image', 'publish_date'], $rows);
        }
        echo "create table book: success up\n";
    }

    public function safeDown()
    {
        $this->dropForeignKey('authorIdBookFk', '{{%user}}');
        $this->dropTable('{{%book}}');
        echo "create table book: success down\n";
    }

}