<?php

use yii\db\Migration;

/**
 * Handles the creation of table `students`.
 * Has foreign keys to the tables:
 *
 * - `group`
 */
class m180324_134218_create_students_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('students', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'sur_name' => $this->string(),
            'patronymic_name' => $this->string(),
            'group_id' => $this->smallInteger(8),

        ]);
        $this->alterColumn('students', 'id', $this->smallInteger(8).'NOT NULL AUTO_INCREMENT');

        // creates index for column `group_id`
        $this->createIndex(
            'idx-students-group_id',
            'students',
            'group_id'
        );

        // add foreign key for table `group`
        $this->addForeignKey(
            'fk-students-group_id',
            'students',
            'group_id',
            'group',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `group`
        $this->dropForeignKey(
            'fk-students-group_id',
            'students'
        );

        // drops index for column `group_id`
        $this->dropIndex(
            'idx-students-group_id',
            'students'
        );

        $this->dropTable('students');
    }
}
