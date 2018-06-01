<?php

use yii\db\Migration;

/**
 * Handles the creation of table `visit`.
 */
class m180325_092726_create_visit_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('visit', [
            'id' => $this->primaryKey(),
            'students_id' => $this->smallInteger(8),
            'teacher_id' => $this->smallInteger(8),
            'subject_id' => $this->smallInteger(8),
            'plus_id' => $this->smallInteger(8),
            'date' => $this->date(),
        ]);

        $this->alterColumn('visit', 'id', $this->smallInteger(8).'NOT NULL AUTO_INCREMENT');

        // creates index for column `students_id`
        $this->createIndex(
            'idx-visit-students_id',
            'visit',
            'students_id'
        );

        // add foreign key for table `students`
        $this->addForeignKey(
            'fk-visit-students_id',
            'visit',
            'students_id',
            'students',
            'id',
            'CASCADE'
        );

        // creates index for column `teacher_id`
        $this->createIndex(
            'idx-visit-teacher_id',
            'visit',
            'teacher_id'
        );

        // add foreign key for table `teacher`
        $this->addForeignKey(
            'fk-visit-teacher_id',
            'visit',
            'teacher_id',
            'teacher',
            'id',
            'CASCADE'
        );

        // creates index for column `subject_id`
        $this->createIndex(
            'idx-visit-subject_id',
            'visit',
            'subject_id'
        );

        // add foreign key for table `subject`
        $this->addForeignKey(
            'fk-visit-subject_id',
            'visit',
            'subject_id',
            'subject',
            'id',
            'CASCADE'
        );

        // creates index for column `plus_id`
        $this->createIndex(
            'idx-visit-plus_id',
            'visit',
            'plus_id'
        );

        // add foreign key for table `plus`
        $this->addForeignKey(
            'fk-visit-plus_id',
            'visit',
            'plus_id',
            'plus',
            'id',
            'CASCADE'
        );

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `students`
        $this->dropForeignKey(
            'fk-visit-students_id',
            'visit'
        );

        // drops index for column `students_id`
        $this->dropIndex(
            'idx-visit-students_id',
            'visit'
        );

        // drops foreign key for table `teacher`
        $this->dropForeignKey(
            'fk-visit-teacher_id',
            'visit'
        );

        // drops index for column `teacher_id`
        $this->dropIndex(
            'idx-visit-teacher_id',
            'visit'
        );

        // drops foreign key for table `subject`
        $this->dropForeignKey(
            'fk-visit-subject_id',
            'visit'
        );

        // drops index for column `subject_id`
        $this->dropIndex(
            'idx-visit-subject_id',
            'visit'
        );

        $this->dropTable('visit');
    }
}
