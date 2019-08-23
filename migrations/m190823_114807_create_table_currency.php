<?php

use yii\db\Migration;

/**
 * Class m190823_114807_create_table_currency
 */
class m190823_114807_create_table_currency extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('currency', array(
            'id' => 'pk',
            'name' => 'string',
            'rate' => 'string'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('currency');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190823_114807_create_table_currency cannot be reverted.\n";

        return false;
    }
    */
}
