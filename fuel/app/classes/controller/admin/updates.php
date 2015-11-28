<?php
class Controller_Admin_Updates extends Controller_Admin
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
		$data['updates'] = Model_Update::find('all');
		$this->template->title = "Updates";
		$this->template->content = View::forge('admin/updates/index', $data);

	}

	public function action_view($id = null)
	{
		$data['update'] = Model_Update::find($id);

		$this->template->title = "Update";
		$this->template->content = View::forge('admin/updates/view', $data);

	}

	public function action_create()
	{

		if (Input::method() == 'POST')
		{

            $conditions = $changes = array();
            foreach ($_POST as $key => $value) {
                if(trim($value) != '' && $key != 'submit') {
                    if(strpos($key, "2")) {
                        $changes[rtrim($key, "2")] = trim($value);
                    }else{
                        $conditions[$key] = trim($value);
                    }
                }
            }
           if(count($conditions) < 1 && count($changes) < 1) {
               Session::set_flash('error', "Minimum 1 condition and 1 action of change !");
           }else{

               $update = new Model_Update();
               $update->conditions = serialize($conditions);
               $update->changes = serialize($changes);
               $update->save();

               $log = Model_Log::find('last', array('order_by' => array('created_at' => 'desc')));

               Aivam_Util::processException($update->id, $log->id);

               Session::set_flash('success', "New exception added !");
               Response::redirect('admin/updates');
           }

		}

		$this->template->title = "Updates";
		$this->template->content = View::forge('admin/updates/create');

	}

	public function action_delete($id = null)
	{
		if ($update = Model_Update::find($id))
		{
			$update->delete();

			Session::set_flash('success', e('Deleted update #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete update #'.$id));
		}

		Response::redirect('admin/updates');

	}

}
