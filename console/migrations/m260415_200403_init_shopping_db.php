<?php

use yii\db\Migration;

class m260415_200403_init_shopping_db extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $sql = " CREATE TABLE `customer` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `user_id` INT NOT NULL,
    `first_name` VARCHAR(100) NOT NULL,
    `last_name` VARCHAR(100) NOT NULL,
    `address` TEXT,
    `phone` VARCHAR(255),
    FOREIGN KEY (`user_id`) REFERENCES `user`(`id`) ON DELETE CASCADE
);

CREATE TABLE `category` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `PID` INT,
    `name` VARCHAR(100) NOT NULL,
    `description` TEXT
);

CREATE TABLE `product` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(200) NOT NULL,
    `category_id` INT NOT NULL,
    `description` TEXT,
    `price` INT NOT NULL,
    FOREIGN KEY (`category_id`) REFERENCES `category`(`id`) ON DELETE CASCADE
);

CREATE TABLE `product_image` (
    `product_id` INT NOT NULL,
    `image` VARCHAR(255),
    `order_id` INT NOT NULL,
    FOREIGN KEY (`product_id`) REFERENCES `product`(`id`) ON DELETE CASCADE
); ";
        $this->execute($sql);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m260415_200403_init_shopping_db cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m260415_200403_init_shopping_db cannot be reverted.\n";

        return false;
    }
    */
}
