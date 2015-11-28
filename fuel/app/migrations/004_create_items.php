<?php

namespace Fuel\Migrations;

class Create_items
{
	public function up()
	{
		\DBUtil::create_table('items', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'year' => array('constraint' => 11, 'type' => 'int'),
			'month' => array('constraint' => 11, 'type' => 'int'),
			'city' => array('constraint' => 50, 'type' => 'varchar'),
			'group' => array('constraint' => 50, 'type' => 'varchar'),
			'make' => array('constraint' => 50, 'type' => 'varchar'),
			'premium_segment' => array('constraint' => 50, 'type' => 'varchar'),
			'model_gnr' => array('constraint' => 50, 'type' => 'varchar'),
			'model' => array('constraint' => 50, 'type' => 'varchar'),
			'segment' => array('constraint' => 50, 'type' => 'varchar'),
			'ckd_cbu' => array('constraint' => 50, 'type' => 'varchar'),
			'pc_cv' => array('constraint' => 50, 'type' => 'varchar'),
			'engine_type' => array('constraint' => 50, 'type' => 'varchar'),
			'type' => array('constraint' => 100, 'type' => 'varchar'),
			'displacement' => array('constraint' => 11, 'type' => 'int'),
			'sales' => array('constraint' => 11, 'type' => 'int'),
			'origine' => array('constraint' => 50, 'type' => 'varchar'),
			'body_type' => array('constraint' => 50, 'type' => 'varchar'),
			'rsp' => array('constraint' => 11, 'type' => 'int'),
			'suv_type' => array('constraint' => 50, 'type' => 'varchar'),
			'price_class' => array('constraint' => 50, 'type' => 'varchar'),
			'log_id' => array('constraint' => 11, 'type' => 'int'),
			'status' => array('constraint' => 10, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('items');
	}
}