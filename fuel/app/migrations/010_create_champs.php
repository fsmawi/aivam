<?php

namespace Fuel\Migrations;

class Create_champs
{
	public function up()
	{
		\DBUtil::create_table('champs', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'champ' => array('constraint' => 255, 'type' => 'varchar'),
			'val_init' => array('constraint' => 255, 'type' => 'varchar'),
			'val_final' => array('constraint' => 255, 'type' => 'varchar'),
			'status' => array('constraint' => 10, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('champs');
	}
}