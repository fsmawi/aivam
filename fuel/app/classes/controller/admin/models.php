<?php
class Controller_Admin_Models extends Controller_Admin
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
		$data['models'] = Model_Model::find('all');
		$this->template->title = "Models";
		$this->template->content = View::forge('admin/models/index', $data);

	}

	public function action_view($id = null)
	{
		$data['model'] = Model_Model::find($id);

		$this->template->title = "Model";
		$this->template->content = View::forge('admin/models/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Model::validate('create');

			if ($val->run())
			{
				$model = Model_Model::forge(array(
					'title' => Input::post('title'),
				));

				if ($model and $model->save())
				{
					Session::set_flash('success', e('Added model #'.$model->id.'.'));

					Response::redirect('admin/models');
				}

				else
				{
					Session::set_flash('error', e('Could not save model.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Models";
		$this->template->content = View::forge('admin/models/create');

	}

	public function action_edit($id = null)
	{
		$model = Model_Model::find($id);
		$val = Model_Model::validate('edit');

		if ($val->run())
		{
			$model->title = Input::post('title');

			if ($model->save())
			{
				Session::set_flash('success', e('Updated model #' . $id));

				Response::redirect('admin/models');
			}

			else
			{
				Session::set_flash('error', e('Could not update model #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$model->title = $val->validated('title');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('model', $model, false);
		}

		$this->template->title = "Models";
		$this->template->content = View::forge('admin/models/edit');

	}

	public function action_delete($id = null)
	{
		if ($model = Model_Model::find($id))
		{
			$model->delete();

			Session::set_flash('success', e('Deleted model #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete model #'.$id));
		}

		Response::redirect('admin/models');

	}

}
