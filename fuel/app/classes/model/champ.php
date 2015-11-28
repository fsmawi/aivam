<?php
class Model_Champ extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'champ',
		'val_init',
		'val_final',
		'status',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('champ', 'Champ', 'required|max_length[255]');
		$val->add_field('val_init', 'Val Init', 'required|max_length[255]');
		$val->add_field('val_final', 'Val Final', 'required|max_length[255]');
		$val->add_field('status', 'Status', 'required|max_length[10]');

		return $val;
	}

}
