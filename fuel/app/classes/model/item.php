<?php
class Model_Item extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'year',
		'month',
		'city',
		'group',
		'make',
		'premium_segment',
		'model_gnr',
		'model',
		'segment',
		'ckd_cbu',
		'pc_cv',
		'engine_type',
		'type',
		'displacement',
		'sales',
		'origine',
		'body_type',
		'rsp',
		'suv_type',
		'price_class',
		'log_id',
		'status',
		'created_at',
		'updated_at',
	);
    
    protected static $_belongs_to = array(
        'log' => array(
            'key_from' => 'log_id',
            'model_to' => 'Model_Log',
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
		$val->add_field('year', 'Year', 'required|valid_string[numeric]');
		$val->add_field('month', 'Month', 'required|valid_string[numeric]');
		$val->add_field('city', 'City', 'required|max_length[50]');
		$val->add_field('group', 'Group', 'required|max_length[50]');
		$val->add_field('make', 'Make', 'required|max_length[50]');
		$val->add_field('premium_segment', 'Premium Segment', 'required|max_length[50]');
		$val->add_field('model_gnr', 'Model Gnr', 'required|max_length[50]');
		$val->add_field('model', 'Model', 'required|max_length[50]');
		$val->add_field('segment', 'Segment', 'required|max_length[50]');
		$val->add_field('ckd_cbu', 'Ckd Cbu', 'required|max_length[50]');
		$val->add_field('pc_cv', 'Pc Cv', 'required|max_length[50]');
		$val->add_field('engine_type', 'Engine Type', 'required|max_length[50]');
		$val->add_field('type', 'Type', 'required|max_length[100]');
		$val->add_field('displacement', 'Displacement', 'required|valid_string[numeric]');
		$val->add_field('sales', 'Sales', 'required|valid_string[numeric]');
		$val->add_field('origine', 'Origine', 'required|max_length[50]');
		$val->add_field('body_type', 'Body Type', 'required|max_length[50]');
		$val->add_field('rsp', 'Rsp', 'required|valid_string[numeric]');
		$val->add_field('suv_type', 'Suv Type', 'required|max_length[50]');
		$val->add_field('price_class', 'Price Class', 'required|max_length[50]');
		$val->add_field('log_id', 'Log Id', 'required|valid_string[numeric]');
		$val->add_field('status', 'Status', 'required|max_length[10]');

		return $val;
	}

}
