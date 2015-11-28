<?php
class Controller_Admin_Marques extends Controller_Admin
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
		$data['marques'] = Model_Marque::find('all');
		$this->template->title = "Marques";
		$this->template->content = View::forge('admin/marques/index', $data);

	}

	public function action_view($id = null)
	{
		$data['marque'] = Model_Marque::find($id);

		$this->template->title = "Marque";
		$this->template->content = View::forge('admin/marques/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Marque::validate('create');

			if ($val->run())
			{
				$marque = Model_Marque::forge(array(
					'title' => Input::post('title'),
				));

				if ($marque and $marque->save())
				{
					Session::set_flash('success', e('Added marque #'.$marque->id.'.'));

					Response::redirect('admin/marques');
				}

				else
				{
					Session::set_flash('error', e('Could not save marque.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Marques";
		$this->template->content = View::forge('admin/marques/create');

	}

	public function action_edit($id = null)
	{
		$marque = Model_Marque::find($id);
		$val = Model_Marque::validate('edit');

		if ($val->run())
		{
			$marque->title = Input::post('title');

			if ($marque->save())
			{
				Session::set_flash('success', e('Updated marque #' . $id));

				Response::redirect('admin/marques');
			}

			else
			{
				Session::set_flash('error', e('Could not update marque #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$marque->title = $val->validated('title');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('marque', $marque, false);
		}

		$this->template->title = "Marques";
		$this->template->content = View::forge('admin/marques/edit');

	}

	public function action_delete($id = null)
	{
		if ($marque = Model_Marque::find($id))
		{
			$marque->delete();

			Session::set_flash('success', e('Deleted marque #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete marque #'.$id));
		}

		Response::redirect('admin/marques');

	}

}
