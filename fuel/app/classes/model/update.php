<?php
class Model_Update extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'conditions',
		'changes',
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
		$val->add_field('conditions', 'Conditions', 'required');
		$val->add_field('changes', 'Changes', 'required');

		return $val;
	}

}
