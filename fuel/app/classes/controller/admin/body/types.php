<?php
class Controller_Admin_Body_Types extends Controller_Admin
{

	public function action_index()
	{
		$data['body_types'] = Model_Body_Type::find('all');
		$this->template->title = "Body_types";
		$this->template->content = View::forge('admin/body/types/index', $data);

	}

	public function action_view($id = null)
	{
		$data['body_type'] = Model_Body_Type::find($id);

		$this->template->title = "Body_type";
		$this->template->content = View::forge('admin/body/types/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Body_Type::validate('create');

			if ($val->run())
			{
				$body_type = Model_Body_Type::forge(array(
					'title' => Input::post('title'),
				));

				if ($body_type and $body_type->save())
				{
					Session::set_flash('success', e('Added body_type #'.$body_type->id.'.'));

					Response::redirect('admin/body/types');
				}

				else
				{
					Session::set_flash('error', e('Could not save body_type.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Body_Types";
		$this->template->content = View::forge('admin/body/types/create');

	}

	public function action_edit($id = null)
	{
		$body_type = Model_Body_Type::find($id);
		$val = Model_Body_Type::validate('edit');

		if ($val->run())
		{
			$body_type->title = Input::post('title');

			if ($body_type->save())
			{
				Session::set_flash('success', e('Updated body_type #' . $id));

				Response::redirect('admin/body/types');
			}

			else
			{
				Session::set_flash('error', e('Could not update body_type #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$body_type->title = $val->validated('title');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('body_type', $body_type, false);
		}

		$this->template->title = "Body_types";
		$this->template->content = View::forge('admin/body/types/edit');

	}

	public function action_delete($id = null)
	{
		if ($body_type = Model_Body_Type::find($id))
		{
			$body_type->delete();

			Session::set_flash('success', e('Deleted body_type #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete body_type #'.$id));
		}

		Response::redirect('admin/body/types');

	}

}
