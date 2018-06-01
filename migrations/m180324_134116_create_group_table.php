<?php

use yii\db\Migration;

/**
 * Handles the creation of table `group`.
 */
class m180324_134116_create_group_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('group', [
            'id' => $this->primaryKey(),
            'group' => $this->string(32),
        ]);
        $this->alterColumn('group', 'id', $this->smallInteger(8).'NOT NULL AUTO_INCREMENT');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('group');
    }
}
