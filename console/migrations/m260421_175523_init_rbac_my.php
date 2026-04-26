<?php

use yii\db\Migration;

class m260421_175523_init_rbac_my extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = \Yii::$app->authManager;

        $createCustomer = $auth->createPermission('createCustomer');
        $createCustomer->description = 'Create new customer';
        $auth->add($createCustomer);

        $updateCustomer = $auth->createPermission('updateCustomer');
        $updateCustomer->description = 'Update a customer';
        $auth->add($updateCustomer);

        $deleteCustomer = $auth->createPermission('deleteCustomer');
        $deleteCustomer->description = 'Delete a customer';
        $auth->add($deleteCustomer);

        $listCustomer = $auth->createPermission('listCustomer');
        $listCustomer->description = 'List a customer';
        $auth->add($listCustomer);

        $viewCustomer = $auth->createPermission('viewCustomer');
        $viewCustomer->description = 'View a customer';
        $auth->add($viewCustomer);

        $moderator = $auth->createRole('moderator');
        $auth->add($moderator);

        $auth->addChild($moderator, $listCustomer);
        $auth->addChild($moderator, $viewCustomer);
        
        $admin = $auth->createRole('admin');
        $auth->add($admin);

        $auth->addChild($admin, $listCustomer);
        $auth->addChild($admin, $viewCustomer);
        $auth->addChild($admin, $createCustomer);
        $auth->addChild($admin, $updateCustomer);
        $auth->addChild($admin, $deleteCustomer);

        $auth->assign($admin, 1);
        $auth->assign($moderator, 3);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $auth = \Yii::$app->authManager;

        $auth->removeAll();
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m260421_175523_init_rbac_my cannot be reverted.\n";

        return false;
    }
    */
}
