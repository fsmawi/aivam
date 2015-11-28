<?php
class Controller_Admin_Carburations extends Controller_Admin
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
		$data['carburations'] = Model_Carburation::find('all');
		$this->template->title = "Carburations";
		$this->template->content = View::forge('admin/carburations/index', $data);

	}

	public function action_view($id = null)
	{
		$data['carburation'] = Model_Carburation::find($id);

		$this->template->title = "Carburation";
		$this->template->content = View::forge('admin/carburations/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Carburation::validate('create');

			if ($val->run())
			{
				$carburation = Model_Carburation::forge(array(
					'title' => Input::post('title'),
				));

				if ($carburation and $carburation->save())
				{
					Session::set_flash('success', e('Added carburation #'.$carburation->id.'.'));

					Response::redirect('admin/carburations');
				}

				else
				{
					Session::set_flash('error', e('Could not save carburation.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Carburations";
		$this->template->content = View::forge('admin/carburations/create');

	}

	public function action_edit($id = null)
	{
		$carburation = Model_Carburation::find($id);
		$val = Model_Carburation::validate('edit');

		if ($val->run())
		{
			$carburation->title = Input::post('title');

			if ($carburation->save())
			{
				Session::set_flash('success', e('Updated carburation #' . $id));

				Response::redirect('admin/carburations');
			}

			else
			{
				Session::set_flash('error', e('Could not update carburation #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$carburation->title = $val->validated('title');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('carburation', $carburation, false);
		}

		$this->template->title = "Carburations";
		$this->template->content = View::forge('admin/carburations/edit');

	}

	public function action_delete($id = null)
	{
		if ($carburation = Model_Carburation::find($id))
		{
			$carburation->delete();

			Session::set_flash('success', e('Deleted carburation #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete carburation #'.$id));
		}

		Response::redirect('admin/carburations');

	}

}
