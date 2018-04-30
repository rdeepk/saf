<?php

use yii\db\Migration;

/**
 * Class m180423_022019_create_tbl_children_data
 */
class m180423_022019_create_tbl_children_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%children}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string()->notNull()->unique(),
            'old_code' => $this->string(),
            'name' => $this->string()->notNull(),
            'gender' => 'ENUM("male", "female") NOT NULL DEFAULT "male"',
            'race' => $this->string(),
            'grade' => $this->integer()->notNull(),
            'gpa' => $this->double(),
            'father_id' => $this->integer(),
            'mother_id' => $this->integer(),
            'city' => $this->string()->notNull(),
            'district' => $this->string()->notNull(),
            'phone_no' => $this->integer(),
            'approval_date' => $this->date(),
            'sponsership_start_date' => $this->date(),
            'yearly_school_fee' => $this->double(),
            'water_filter_year' => $this->integer(4),
            'wash_year' => $this->integer(4),
            'field_officer_id' => $this->integer(),
            'year_graduated' => $this->integer(),
            'notes' => $this->text(),
            'medical_aid' => $this->string(),
            'sponsered' => $this->integer()->notNull(),
            'sponser_id' => $this->integer(),
            'school_id' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
        // $this->addForeignKey(
        //     'fk-user_id', 'children', 'user_id', 'user', 'id', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180423_022019_create_tbl_children_data cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180423_022019_create_tbl_children_data cannot be reverted.\n";

        return false;
    }
    */
}
