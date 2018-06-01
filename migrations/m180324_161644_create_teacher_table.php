<?php

use yii\db\Migration;

/**
 * Handles the creation of table `teacher`.
 */
class m180324_161644_create_teacher_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('teacher', [
            'id' => $this->primaryKey(),
            'teacher_sur_name' => $this->string(),
            'teacher_name' => $this->string(),
            'teacher_patronymic_name' => $this->string(),
            'teacher_phone_number' => $this->string(20),
        ]);
        $this->alterColumn('teacher', 'id', $this->smallInteger(8).'NOT NULL AUTO_INCREMENT');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('teacher');
    }
}
