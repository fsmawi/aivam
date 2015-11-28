<?php
class Controller_Admin_Users extends Controller_Admin
{

	public function before()
  {
      parent::before();

      $admin_group_id = Config::get('auth.driver', 'Simpleauth') == 'Ormauth' ? 6 : 100;
      if ( ! Auth::member($admin_group_id))
      {
          Session::set_flash('error', e('You don\'t have access to the admin panel'));
          Response::redirect('admin/export');
      }

  }

  public function action_index()
	{
		$data['users'] = Model_User::find('all');
		$this->template->title = "Users";
		$this->template->content = View::forge('admin/users/index', $data);

	}

	public function action_view($id = null)
	{
		$data['user'] = Model_User::find($id);

		$this->template->title = "User";
		$this->template->content = View::forge('admin/users/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_User::validate('create');

      $role = 50;
      if(Input::post('admin')) {
          $role = Input::post('admin');
      }

			if ($val->run())
			{

        if($this->validatePassword(Input::post('password')) && Input::post('password') == Input::post('password2')) {
            try {
                Auth::create_user(Input::post('username'), Input::post('password'), Input::post('email'), $role);
                Response::redirect('admin/users');
            } catch (SimpleUserUpdateException $exc) {
                 Session::set_flash('success', $exc->getMessage());
            }

        }else {
            if(!$this->validatePassword(Input::post('password'))) {
                Session::set_flash('error', e('Invalid Password.'));
            }else {
                Session::set_flash('error', e('Password <> Password2.'));
            }

        }

			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Users";
		$this->template->content = View::forge('admin/users/create');

	}

	public function action_edit($id = null)
	{
		$user = Model_User::find($id);
		$val = Model_User::validate('edit');

		if ($val->run())
		{
			Response::redirect('admin/users');
		}

		else
		{
//			if (Input::method() == 'POST')
//			{
//				$user->username = $val->validated('username');
//				$user->password = $val->validated('password');
//				$user->group = $val->validated('group');
//				$user->email = $val->validated('email');
//				$user->last_login = $val->validated('last_login');
//				$user->login_hash = $val->validated('login_hash');
//				$user->profile_fields = $val->validated('profile_fields');
//
//				Session::set_flash('error', $val->error());
//			}
//
//			$this->template->set_global('user', $user, false);
		}

		$this->template->title = "Users";
		$this->template->content = View::forge('admin/users/edit');

	}

  public function action_edit_profile()
  {

  }
	public function action_delete($id = null)
	{
		if ($user = Model_User::find($id))
		{
			$user->delete();

			Session::set_flash('success', e('Deleted user #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete user #'.$id));
		}

		Response::redirect('admin/users');

	}

}

