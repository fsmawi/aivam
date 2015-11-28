<?php
class Controller_Admin_Motorisations extends Controller_Admin
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
		$data['motorisations'] = Model_Motorisation::find('all');
		$this->template->title = "Motorisations";
		$this->template->content = View::forge('admin/motorisations/index', $data);

	}

	public function action_view($id = null)
	{
		$data['motorisation'] = Model_Motorisation::find($id);

		$this->template->title = "Motorisation";
		$this->template->content = View::forge('admin/motorisations/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Motorisation::validate('create');

			if ($val->run())
			{
				$motorisation = Model_Motorisation::forge(array(
					'title' => Input::post('title'),
				));

				if ($motorisation and $motorisation->save())
				{
					Session::set_flash('success', e('Added motorisation #'.$motorisation->id.'.'));

					Response::redirect('admin/motorisations');
				}

				else
				{
					Session::set_flash('error', e('Could not save motorisation.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Motorisations";
		$this->template->content = View::forge('admin/motorisations/create');

	}

	public function action_edit($id = null)
	{
		$motorisation = Model_Motorisation::find($id);
		$val = Model_Motorisation::validate('edit');

		if ($val->run())
		{
			$motorisation->title = Input::post('title');

			if ($motorisation->save())
			{
				Session::set_flash('success', e('Updated motorisation #' . $id));

				Response::redirect('admin/motorisations');
			}

			else
			{
				Session::set_flash('error', e('Could not update motorisation #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$motorisation->title = $val->validated('title');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('motorisation', $motorisation, false);
		}

		$this->template->title = "Motorisations";
		$this->template->content = View::forge('admin/motorisations/edit');

	}

	public function action_delete($id = null)
	{
		if ($motorisation = Model_Motorisation::find($id))
		{
			$motorisation->delete();

			Session::set_flash('success', e('Deleted motorisation #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete motorisation #'.$id));
		}

		Response::redirect('admin/motorisations');

	}

}
