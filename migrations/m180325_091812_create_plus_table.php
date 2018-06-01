<?php

use yii\db\Migration;

/**
 * Handles the creation of table `plus`.
 */
class m180325_091812_create_plus_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('plus', [
            'id' => $this->primaryKey(),
            'operation' => $this->string(),
        ]);
        $this->alterColumn('plus', 'id', $this->smallInteger(8).'NOT NULL AUTO_INCREMENT');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('plus');
    }
}
