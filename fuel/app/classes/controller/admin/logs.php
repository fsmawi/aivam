<?php

class Controller_Admin_Logs extends Controller_Admin {

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

    public function action_view($id = null) {
        $data['log'] = Model_Log::find($id);

        $this->template->title = "Log";
        $this->template->content = View::forge('admin/logs/view', $data);
    }

    public function action_create() {

        $data['current_year'] = intval(date('Y'));

        if (Input::method() == 'POST') {

            if (Input::post('fichier_brute')) {

                $file_input = Input::post('fichier_brute');

                $log = new Model_Log();
                $log->user_id = $this->current_user->id;
                $log->number = 0;
                $log->year = Input::post('year');
                $log->month = implode('-', Input::post('month'));
                $log->status = 'check';
                $log->save();

                ob_start();

                $return = system("java -Xms256M -Xmx1024M -cp bat/lib/dom4j-1.6.1.jar;bat/lib/jxl.jar;bat/lib/mysql-connector-java-5.1.30-bin.jar;bat/lib/systemRoutines.jar;bat/lib/userRoutines.jar;.;bat/index/index_0_1.jar;bat/index/main_process_0_1.jar;bat/index/model_11_0_1.jar;bat/index/model_6_0_1.jar;bat/index/model_13_0_1.jar;bat/index/model_9_0_1.jar;bat/index/models_0_1.jar;bat/index/model_7_0_1.jar;bat/index/premium_sport_0_1.jar;bat/index/model_0_0_1.jar;bat/index/model_3_0_1.jar;bat/index/model_vp_vul_0_1.jar;bat/index/group_0_1.jar;bat/index/model_5_0_1.jar;bat/index/model_delta_0_1.jar;bat/index/model_10_0_1.jar;bat/index/model_8_0_1.jar;bat/index/model_2_0_1.jar;bat/index/model_4_0_1.jar;bat/index/model_0_gnr_0_1.jar;bat/index/origine_0_1.jar;bat/index/premium_segment2_0_1.jar;bat/index/model_12_0_1.jar;bat/index/model_1_0_1.jar; aivam.index_0_1.index --context_param log_id=".$log->id." --context_param file_brute=".$file_input." %*  2>&1",$output) ;

                $return = ob_get_contents();

                ob_end_clean();

                if(!$return) {
                    Session::set_flash('error', $output);
                }

                $log->status = $this->checkLogStatus($log->id);
                $log->number = $this->getCountLogs($log->id);
                $log->save();

                Aivam_Util::processAllChanges($log->id, 'ok');

                Aivam_Util::processAllExceptions();

                $files = glob('files/*'); // get all file names

                foreach($files as $file){ // iterate files
                  if(is_file($file))
                    unlink($file); // delete file
                }

                Response::redirect('admin/items/list/'.$log->id.'?status=check');
            }
        }

        $this->template->title = "Fichier brute";
        $this->template->content = View::forge('admin/logs/create', $data);
    }

    public function action_create2() {

        $data['current_year'] = intval(date('Y'));

        if (Input::method() == 'POST') {

            if (Input::post('fichier_brute')) {

                $file_input = Input::post('fichier_brute');

                $log = new Model_Log();
                $log->user_id = $this->current_user->id;
                $log->number = 0;
                $log->year = Input::post('year');
                $log->month = implode('-', Input::post('month'));
                $log->status = 'treated';
                $log->save();

                ob_start();

                $return = system("java -Xms256M -Xmx1024M -cp bat/lib/dom4j-1.6.1.jar;bat/lib/jxl.jar;bat/lib/mysql-connector-java-5.1.30-bin.jar;bat/lib/systemRoutines.jar;bat/lib/userRoutines.jar;.;bat/traited_file/traited_file_0_1.jar; aivam.traited_file_0_1.traited_file --context_param log_id=".$log->id." --context_param file_brute=".$file_input." %*  2>&1",$output) ;
                $return = ob_get_contents();

                ob_end_clean();

                if(!$return) {
                    Session::set_flash('error', $output);
                }

                $files = glob('files/*');

                foreach($files as $file){
                  if(is_file($file))
                    unlink($file);
                }

                Response::redirect('admin/items/list/'.$log->id);
            }
        }

        $this->template->title = "Fichier traité";
        $this->template->content = View::forge('admin/logs/create', $data);
    }

    public function action_edit($id = null) {
        $log = Model_Log::find($id);
        $val = Model_Log::validate('edit');

        if ($val->run()) {
            $log->user_id = Input::post('user_id');
            $log->number = Input::post('number');
            $log->status = Input::post('status');

            if ($log->save()) {
                Session::set_flash('success', e('Updated log #' . $id));

                Response::redirect('admin');
            } else {
                Session::set_flash('error', e('Could not update log #' . $id));
            }
        } else {
            if (Input::method() == 'POST') {
                $log->user_id = $val->validated('user_id');
                $log->number = $val->validated('number');
                $log->status = $val->validated('status');

                Session::set_flash('error', $val->error());
            }

            $this->template->set_global('log', $log, false);
        }

        $this->template->title = "Logs";
        $this->template->content = View::forge('admin/logs/edit');
    }

    public function action_delete($id = null) {
        if ($log = Model_Log::find($id)) {

            $result = DB::delete('items')->where('log_id', '=', $id)->execute();
            $log->delete();

            Session::set_flash('success', e('Deleted log #' . $id));
        } else {
            Session::set_flash('error', e('Could not delete log #' . $id));
        }

        Response::redirect('admin');
    }

    function getCountLogs($id) {
        $result = DB::select(DB::expr('COUNT(*) as count'))->from('items')->where('log_id', '=', $id)->execute();

        // Get the current/first result
        $result_arr = $result->current();

        return $result_arr['count'];
    }

    function checkLogStatus($id) {
        $result = DB::select(DB::expr('COUNT(*) as count'))->from('items')->where('log_id', '=', $id)->and_where('status', 'check')->execute();

        // Get the current/first result
        $result_arr = $result->current();

        return ($result_arr['count'])?'check':'ok';
    }

    public function action_list()
	{
        $whereClause = " 1=1";
        $params = array();

        //filter status
        if(!is_null(Input::get('status', null)) && Input::get('status', null) != "") {
            $whereClause .= "  AND status = :status";
            $params['status'] = Input::get('status', null);
        }

//        //filter month
//        if(!is_null(Input::get('month', null)) && Input::get('month', null) != "") {
//            $whereClause .= "  AND MONTH(FROM_UNIXTIME(created_at)) = :month";
//            $params['month'] = Input::get('month', null);
//        }
//
//        //filter year
//        if(!is_null(Input::get('year', null)) && Input::get('year', null) != "") {
//            $whereClause .= "  AND YEAR(FROM_UNIXTIME(created_at)) = :year";
//            $params['year'] = Input::get('year', null);
//        }

        $result = DB::query("SELECT count(DISTINCT l.id) as `count` FROM logs l
            WHERE " . $whereClause." ORDER BY created_at DESC", DB::SELECT)
                        ->parameters($params)->execute()->as_array();
        $url_param = "";
        if(count($params)) {
           $url_param = "?".http_build_query($params);
        }

        $config = array(
            'pagination_url' => '/admin/logs/list/pg'.$url_param,
            'total_items' => $result[0]['count'],
            'per_page' => 5,
            'uri_segment' => 4,
        );

        $pagination = Pagination::forge('mypagination', $config);

        $params['offset'] = $pagination->offset;
        $params['per_page'] = $pagination->per_page;


        $logs_arr = DB::query("SELECT * FROM logs l
            WHERE " . $whereClause." ORDER BY created_at DESC LIMIT :offset, :per_page ", DB::SELECT)
                        ->parameters($params)->execute();

        $logs_arr = $logs_arr->as_array();

        $return = array();
        foreach ($logs_arr as $key => $log) {
           $log['user'] = Model_User::find($log['user_id']);
            $return[] = $log;
        }

        $this->template->title = 'Dashboard';

        $data['logs'] = $return;
        $data['pagination'] = $pagination;

		$this->template->content = View::forge('admin/logs/index', $data, FALSE);
	}

}
