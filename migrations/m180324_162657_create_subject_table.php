<?php

use yii\db\Migration;

/**
 * Handles the creation of table `subject`.
 */
class m180324_162657_create_subject_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('subject', [
            'id' => $this->primaryKey(),
            'subject' => $this->string(),
        ]);
        $this->alterColumn('subject', 'id', $this->smallInteger(8).'NOT NULL AUTO_INCREMENT');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('subject');
    }
}
