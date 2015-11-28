<?php

class Controller_Admin extends Controller_Base
{
	public $template = 'admin/template';

	public function before()
	{
		parent::before();

		if (Request::active()->controller !== 'Controller_Admin' or ! in_array(Request::active()->action, array('login', 'logout')))
		{
			if (Auth::check())
			{
				$admin_group_id = Config::get('auth.driver', 'Simpleauth') == 'Ormauth' ? 6 : 100;
				if ( ! Auth::member($admin_group_id) && ! Auth::member(50))
				{
					Session::set_flash('error', e('You don\'t have access to the admin panel'));
					Response::redirect('/');
				}
			}
			else
			{
				Response::redirect('admin/login');
			}
		}
	}

	public function action_login()
	{
		// Already logged in
		Auth::check() and Response::redirect('admin');

		$val = Validation::forge();

		if (Input::method() == 'POST')
		{
			$val->add('email', 'Email or Username')
			    ->add_rule('required');
			$val->add('password', 'Password')
			    ->add_rule('required');

			if ($val->run())
			{
				$auth = Auth::instance();

				// check the credentials. This assumes that you have the previous table created
				if (Auth::check() or $auth->login(Input::post('email'), Input::post('password')))
				{
					// credentials ok, go right in
					if (Config::get('auth.driver', 'Simpleauth') == 'Ormauth')
					{
						$current_user = Model\Auth_User::find_by_username(Auth::get_screen_name());
					}
					else
					{
						$current_user = Model_User::find_by_username(Auth::get_screen_name());
					}

					Session::set_flash('success', e('Welcome, '.$current_user->username));
          if($current_user->group == '50') {
             Response::redirect('admin/export');
          }else{
					   Response::redirect('admin');
          }
				}
				else
				{
					$this->template->set_global('login_error', 'Fail');
				}
			}
		}

		$this->template->title = 'Login';
		$this->template->content = View::forge('admin/login', array('val' => $val), false);
	}

	/**
	 * The logout action.
	 *
	 * @access  public
	 * @return  void
	 */
	public function action_logout()
	{
		Auth::logout();
		Response::redirect('admin');
	}

	/**
	 * The index action.
	 *
	 * @access  public
	 * @return  void
	 */
	public function action_index()
	{
        $whereClause = " 1=1";
        $params = array();

        //filter status
        if(!is_null(Input::get('status', null)) && Input::get('status', null) != "") {
            $whereClause .= "  AND status = :status";
            $params['status'] = Input::get('status', null);
        }

//        //filter month
//        if(!is_null(Input::get('month', null)) && Input::get('month', null) != "") {
//            $whereClause .= "  AND MONTH(FROM_UNIXTIME(created_at)) = :month";
//            $params['month'] = Input::get('month', null);
//        }
//
//        //filter year
//        if(!is_null(Input::get('year', null)) && Input::get('year', null) != "") {
//            $whereClause .= "  AND YEAR(FROM_UNIXTIME(created_at)) = :year";
//            $params['year'] = Input::get('year', null);
//        }

        $result = DB::query("SELECT count(DISTINCT l.id) as `count` FROM logs l
            WHERE " . $whereClause." ORDER BY created_at DESC", DB::SELECT)
                        ->parameters($params)->execute()->as_array();
        $url_param = "";
        if(count($params)) {
           $url_param = "?".http_build_query($params);
        }

        $config = array(
            'pagination_url' => '/admin/logs/list/pg'.$url_param,
            'total_items' => $result[0]['count'],
            'per_page' => 5,
            'uri_segment' => 4,
        );

        $pagination = Pagination::forge('mypagination', $config);

        $params['offset'] = $pagination->offset;
        $params['per_page'] = $pagination->per_page;


        $logs_arr = DB::query("SELECT * FROM logs l
            WHERE " . $whereClause." ORDER BY created_at DESC LIMIT :offset, :per_page ", DB::SELECT)
                        ->parameters($params)->execute();

        $logs_arr = $logs_arr->as_array();

        $return = array();
        foreach ($logs_arr as $key => $log) {
           $log['user'] = Model_User::find($log['user_id']);
            $return[] = $log;
        }

		$this->template->title = 'Dashboard';

        $data['logs'] = $return;
        $data['pagination'] = $pagination;

		$this->template->content = View::forge('admin/logs/index', $data, FALSE);
	}

}

/* End of file admin.php */
