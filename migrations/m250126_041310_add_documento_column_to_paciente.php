<?php

use yii\db\Migration;

/**
 * Class m250126_041310_add_documento_column_to_paciente
 */
class m250126_041310_add_documento_column_to_paciente extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m250126_041310_add_documento_column_to_paciente cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250126_041310_add_documento_column_to_paciente cannot be reverted.\n";

        return false;
    }
    */
}
