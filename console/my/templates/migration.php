<?php
$migrateMessage = str_replace('_', ' ', preg_replace('/^m[\d]{6}_[\d]{6}_/', '', $className));
echo "<?php\n";
?>

use yii\db\Schema;
use console\my\yii2\Migration;

class <?php echo $className; ?> extends Migration
{

    public function safeUp()
    {

        echo "<?php echo $migrateMessage; ?>: success up\n";
    }

    public function safeDown()
    {

        echo "<?php echo $migrateMessage; ?>: success down\n";
    }

}