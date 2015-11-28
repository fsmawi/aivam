<?php
class Model_Log extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'user_id',
		'number',
        'month',
        'year',
		'status',
		'created_at',
		'updated_at',
	);
    
    protected static $_has_many = array(
        'items' => array(
            'key_from' => 'id',
            'model_to' => 'Model_Item',
            'key_to' => 'log_id',
            'cascade_save' => true,
            'cascade_delete' => false,
        )
    );
    
    protected static $_belongs_to = array(
        'user' => array(
            'key_from' => 'user_id',
            'model_to' => 'Model_User',
            'key_to' => 'id',
            'cascade_save' => true,
            'cascade_delete' => false,
        )
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
		$val->add_field('user_id', 'User Id', 'required|valid_string[numeric]');
		$val->add_field('year', 'Year', 'required|valid_string[numeric]');
		$val->add_field('month', 'Month', 'required|valid_string[numeric]');
		$val->add_field('date', 'Date', 'required');
		$val->add_field('number', 'Number', 'required|valid_string[numeric]');
		$val->add_field('status', 'Status', 'required|max_length[10]');

		return $val;
	}

}
