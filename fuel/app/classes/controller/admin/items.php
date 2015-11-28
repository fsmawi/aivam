<?php

class Controller_Admin_Items extends Controller_Admin {

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

    public function action_index() {
        $this->getItems();
    }

    public function action_list($id) {
        $this->getItems($id);
    }

    public function getItems($id = null) {

        $whereClause = " 1=1";
        $params = array();
        $url = "";

        if(!is_null($id) && $id != 0) {
            $whereClause .= " AND log_id = :log_id";
            $params['log_id'] = $id;
            $url = $id."/";
        }  else {
            $url = "0/";
        }

        $filter = "";
        //filter status
        if(!is_null(Input::get('status', null)) && Input::get('status', null) != "") {
            $whereClause .= "  AND status = :status";
            $params['status'] = Input::get('status', null);
            $filter = "?status=".Input::get('status', null);
        }

        $result = DB::query("SELECT count(DISTINCT i.id) as `count` FROM items i
            WHERE " . $whereClause." ORDER BY created_at DESC", DB::SELECT)
                        ->parameters($params)->execute()->as_array();

        $config = array(
            'pagination_url' => 'admin/items/list/'.$url.$filter,
            'total_items' => $result[0]['count'],
            'per_page' => 15,
            'uri_segment' => 5,
        );

        $pagination = Pagination::forge('mypagination', $config);

        $params['offset'] = $pagination->offset;
        $params['per_page'] = $pagination->per_page;


        $items_arr = DB::query("SELECT * FROM items i
            WHERE " . $whereClause." ORDER BY created_at DESC LIMIT :offset, :per_page ", DB::SELECT)
                        ->parameters($params)->execute();

        $items_arr = $items_arr->as_array();

        $return = array();
        foreach ($items_arr as $key => $item) {
            $return[] = $item;
        }


        $data['items'] = $return;
        $data['pagination'] = $pagination;
        $data['id'] = $id;

        $this->template->title = "Items";
        $this->template->content = View::forge('admin/items/index', $data, FALSE);
    }

    public function action_view($id = null) {
        $data['item'] = Model_Item::find($id);

        $this->template->title = "Item";
        $this->template->content = View::forge('admin/items/view', $data);
    }

    public function action_edit($id = null) {
        $item = Model_Item::find($id);
        $val = Model_Item::validate('edit');

        if ($val->run()) {
            $item->year = Input::post('year');
            $item->month = Input::post('month');

            $this->recordeChange('city', $item->city, Input::post('city'), Input::post('city_check'));
            $item->city = Input::post('city');

            $item->group = Input::post('group');

            $this->recordeChange('make', $item->make, Input::post('make'), Input::post('make_check'));
            $item->make = Input::post('make');

            $item->premium_segment = Input::post('premium_segment');
            $item->model_gnr = Input::post('model_gnr');

            $this->recordeChange('model', $item->model, Input::post('model'), Input::post('model_check'));
            $item->model = Input::post('model');

            $this->recordeChange('segment', $item->segment, Input::post('segment'), Input::post('segment_check'));
            $item->segment = Input::post('segment');

            $item->ckd_cbu = Input::post('ckd_cbu');
            $item->pc_cv = Input::post('pc_cv');

            $this->recordeChange('engine_type', $item->engine_type, Input::post('engine_type'), Input::post('engine_type_check'));
            $item->engine_type = Input::post('engine_type');

            $this->recordeChange('type', $item->type, Input::post('type'), Input::post('type_check'));
            $item->type = Input::post('type');

            $item->displacement = Input::post('displacement');
            $item->sales = Input::post('sales');
            $item->origine = Input::post('origine');

            $this->recordeChange('body_type', $item->body_type, Input::post('body_type'), Input::post('body_type_check'));
            $item->body_type = Input::post('body_type');

            $item->rsp = Input::post('rsp');
            $item->suv_type = Input::post('suv_type');
            $item->price_class = Input::post('price_class');
            $item->log_id = Input::post('log_id');

            if(Input::post('validate') && Input::post('status') == "check" ) {
                $item->status = 'ok';
            }

            $this->template->set_global('item', $item, false);

            if ($item->save()) {
                Session::set_flash('success', e('Updated item #' . $id));

                Aivam_Util::processAllChanges($item->log_id);

                Response::redirect('admin/items');
            } else {
                Session::set_flash('error', e('Could not update item #' . $id));
            }
        } else {
            if (Input::method() == 'POST') {
                $item->year = $val->validated('year');
                $item->month = $val->validated('month');
                $item->city = $val->validated('city');
                $item->group = $val->validated('group');
                $item->make = $val->validated('make');
                $item->premium_segment = $val->validated('premium_segment');
                $item->model_gnr = $val->validated('model_gnr');
                $item->model = $val->validated('model');
                $item->segment = $val->validated('segment');
                $item->ckd_cbu = $val->validated('ckd_cbu');
                $item->pc_cv = $val->validated('pc_cv');
                $item->engine_type = $val->validated('engine_type');
                $item->type = $val->validated('type');
                $item->displacement = $val->validated('displacement');
                $item->sales = $val->validated('sales');
                $item->origine = $val->validated('origine');
                $item->body_type = $val->validated('body_type');
                $item->rsp = $val->validated('rsp');
                $item->suv_type = $val->validated('suv_type');
                $item->price_class = $val->validated('price_class');
                $item->log_id = $val->validated('log_id');
                $item->status = $val->validated('status');

                Session::set_flash('error', $val->error());
            }

            $this->template->set_global('item', $item, false);
        }

        $this->template->title = "Items";
        $this->template->content = View::forge('admin/items/edit');
    }

//    public function action_delete($id = null) {
//        if ($item = Model_Item::find($id)) {
//            $item->delete();
//
//            Session::set_flash('success', e('Deleted item #' . $id));
//        } else {
//            Session::set_flash('error', e('Could not delete item #' . $id));
//        }
//
//        Response::redirect('admin/items');
//    }

    function recordeChange($itemType, $val_init, $val_final, $flag) {
        if(!$flag && $val_init !== $val_final){
            $item = new Model_Champ();
            $item->champ = $itemType;
            $item->val_init = $val_init;
            $item->val_final = $val_final;
            $item->status = "ko";
            $item->save();
        }
    }



}
