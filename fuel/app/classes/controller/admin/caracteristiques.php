<?php
class Controller_Admin_Caracteristiques extends Controller_Admin
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
		$data['caracteristiques'] = Model_Caracteristique::find('all');
		$this->template->title = "Caracteristiques";
		$this->template->content = View::forge('admin/caracteristiques/index', $data);

	}

	public function action_view($id = null)
	{
		$data['caracteristique'] = Model_Caracteristique::find($id);

		$this->template->title = "Caracteristique";
		$this->template->content = View::forge('admin/caracteristiques/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Caracteristique::validate('create');

			if ($val->run())
			{
				$caracteristique = Model_Caracteristique::forge(array(
					'title' => Input::post('title'),
				));

				if ($caracteristique and $caracteristique->save())
				{
					Session::set_flash('success', e('Added caracteristique #'.$caracteristique->id.'.'));

					Response::redirect('admin/caracteristiques');
				}

				else
				{
					Session::set_flash('error', e('Could not save caracteristique.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Caracteristiques";
		$this->template->content = View::forge('admin/caracteristiques/create');

	}

	public function action_edit($id = null)
	{
		$caracteristique = Model_Caracteristique::find($id);
		$val = Model_Caracteristique::validate('edit');

		if ($val->run())
		{
			$caracteristique->title = Input::post('title');

			if ($caracteristique->save())
			{
				Session::set_flash('success', e('Updated caracteristique #' . $id));

				Response::redirect('admin/caracteristiques');
			}

			else
			{
				Session::set_flash('error', e('Could not update caracteristique #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$caracteristique->title = $val->validated('title');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('caracteristique', $caracteristique, false);
		}

		$this->template->title = "Caracteristiques";
		$this->template->content = View::forge('admin/caracteristiques/edit');

	}

	public function action_delete($id = null)
	{
		if ($caracteristique = Model_Caracteristique::find($id))
		{
			$caracteristique->delete();

			Session::set_flash('success', e('Deleted caracteristique #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete caracteristique #'.$id));
		}

		Response::redirect('admin/caracteristiques');

	}

}
