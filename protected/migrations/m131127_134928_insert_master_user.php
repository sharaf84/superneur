<?php

class m131127_134928_insert_master_user extends CDbMigration {

    public function up() {
        $this->execute('INSERT INTO `sprnr_users` (`id`, `username`, `email`, `type`, `password`, `verified`, `activated`, `created`, `updated`) VALUES ("1", "master", "a.abdelaziz.eg@gmail.com", "1", "$2a$13$DUHMrppgCZwbPQv0eDHUme02UAYMsyyCrYUb0Gsa1j6EVYkaJtHya", "1", "1", NOW(), NOW());');
    }

    public function down() {
        echo "m131127_134928_insert_master_user does not support migration down.\n";
        return false;
    }

    /*
      // Use safeUp/safeDown to do migration with transaction
      public function safeUp()
      {
      }

      public function safeDown()
      {
      }
     */
}
