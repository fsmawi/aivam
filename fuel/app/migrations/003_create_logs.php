<?php

namespace Fuel\Migrations;

class Create_logs
{
	public function up()
	{
		\DBUtil::create_table('logs', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'user_id' => array('constraint' => 11, 'type' => 'int'),
			'date' => array('type' => 'datetime'),
			'number' => array('constraint' => 11, 'type' => 'int'),
			'status' => array('constraint' => 10, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('logs');
	}
}