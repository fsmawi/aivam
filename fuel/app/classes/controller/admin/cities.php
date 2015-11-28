<?php
class Controller_Admin_Cities extends Controller_Admin
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
		$data['cities'] = Model_City::find('all');
		$this->template->title = "Cities";
		$this->template->content = View::forge('admin/cities/index', $data);

	}

	public function action_view($id = null)
	{
		$data['city'] = Model_City::find($id);

		$this->template->title = "City";
		$this->template->content = View::forge('admin/cities/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_City::validate('create');

			if ($val->run())
			{
				$city = Model_City::forge(array(
					'title' => Input::post('title'),
				));

				if ($city and $city->save())
				{
					Session::set_flash('success', e('Added city #'.$city->id.'.'));

					Response::redirect('admin/cities');
				}

				else
				{
					Session::set_flash('error', e('Could not save city.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Cities";
		$this->template->content = View::forge('admin/cities/create');

	}

	public function action_edit($id = null)
	{
		$city = Model_City::find($id);
		$val = Model_City::validate('edit');

		if ($val->run())
		{
			$city->title = Input::post('title');

			if ($city->save())
			{
				Session::set_flash('success', e('Updated city #' . $id));

				Response::redirect('admin/cities');
			}

			else
			{
				Session::set_flash('error', e('Could not update city #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$city->title = $val->validated('title');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('city', $city, false);
		}

		$this->template->title = "Cities";
		$this->template->content = View::forge('admin/cities/edit');

	}

	public function action_delete($id = null)
	{
		if ($city = Model_City::find($id))
		{
			$city->delete();

			Session::set_flash('success', e('Deleted city #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete city #'.$id));
		}

		Response::redirect('admin/cities');

	}

}
