<?php
class Controller_Admin_Segments extends Controller_Admin
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
		$data['segments'] = Model_Segment::find('all');
		$this->template->title = "Segments";
		$this->template->content = View::forge('admin/segments/index', $data);

	}

	public function action_view($id = null)
	{
		$data['segment'] = Model_Segment::find($id);

		$this->template->title = "Segment";
		$this->template->content = View::forge('admin/segments/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Segment::validate('create');

			if ($val->run())
			{
				$segment = Model_Segment::forge(array(
					'title' => Input::post('title'),
				));

				if ($segment and $segment->save())
				{
					Session::set_flash('success', e('Added segment #'.$segment->id.'.'));

					Response::redirect('admin/segments');
				}

				else
				{
					Session::set_flash('error', e('Could not save segment.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Segments";
		$this->template->content = View::forge('admin/segments/create');

	}

	public function action_edit($id = null)
	{
		$segment = Model_Segment::find($id);
		$val = Model_Segment::validate('edit');

		if ($val->run())
		{
			$segment->title = Input::post('title');

			if ($segment->save())
			{
				Session::set_flash('success', e('Updated segment #' . $id));

				Response::redirect('admin/segments');
			}

			else
			{
				Session::set_flash('error', e('Could not update segment #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$segment->title = $val->validated('title');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('segment', $segment, false);
		}

		$this->template->title = "Segments";
		$this->template->content = View::forge('admin/segments/edit');

	}

	public function action_delete($id = null)
	{
		if ($segment = Model_Segment::find($id))
		{
			$segment->delete();

			Session::set_flash('success', e('Deleted segment #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete segment #'.$id));
		}

		Response::redirect('admin/segments');

	}

}
