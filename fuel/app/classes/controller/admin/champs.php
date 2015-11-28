<?php
class Controller_Admin_Champs extends Controller_Admin
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
		$data['champs'] = Model_Champ::find('all');
		$this->template->title = "Champs";
		$this->template->content = View::forge('admin/champs/index', $data);

	}

	public function action_view($id = null)
	{
		$data['champ'] = Model_Champ::find($id);

		$this->template->title = "Champ";
		$this->template->content = View::forge('admin/champs/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Champ::validate('create');

			if ($val->run())
			{
				$champ = Model_Champ::forge(array(
					'champ' => Input::post('champ'),
					'val_init' => Input::post('val_init'),
					'val_final' => Input::post('val_final'),
					'status' => Input::post('status'),
				));

				if ($champ and $champ->save())
				{
					Session::set_flash('success', e('Added champ #'.$champ->id.'.'));

					Response::redirect('admin/champs');
				}

				else
				{
					Session::set_flash('error', e('Could not save champ.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Champs";
		$this->template->content = View::forge('admin/champs/create');

	}

	public function action_edit($id = null)
	{
		$champ = Model_Champ::find($id);
		$val = Model_Champ::validate('edit');

		if ($val->run())
		{
			$champ->champ = Input::post('champ');
			$champ->val_init = Input::post('val_init');
			$champ->val_final = Input::post('val_final');
			$champ->status = Input::post('status');

			if ($champ->save())
			{
				Session::set_flash('success', e('Updated champ #' . $id));

				Response::redirect('admin/champs');
			}

			else
			{
				Session::set_flash('error', e('Could not update champ #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$champ->champ = $val->validated('champ');
				$champ->val_init = $val->validated('val_init');
				$champ->val_final = $val->validated('val_final');
				$champ->status = $val->validated('status');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('champ', $champ, false);
		}

		$this->template->title = "Champs";
		$this->template->content = View::forge('admin/champs/edit');

	}

	public function action_delete($id = null)
	{
		if ($champ = Model_Champ::find($id))
		{
			$champ->delete();

			Session::set_flash('success', e('Deleted champ #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete champ #'.$id));
		}

		Response::redirect('admin/champs');

	}

}
