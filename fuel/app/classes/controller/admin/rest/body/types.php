<?php
class Controller_Admin_Rest_Body_Types extends Controller_Rest
{

	public function get_list()
    {
        // $items = Model_Body_Type::find('all');
        // return $this->response($items);

        $query = DB::select(array('body_type', 'title'))->from('items');

        if(Input::get('make')) {
            $query->where('make', Input::get('make'));
        }

        if(Input::get('model')) {
            $query->where('model', Input::get('model'));
        }

        if(Input::get('segment')) {
            $query->where('segment', Input::get('segment'));
        }

        if(Input::get('premium_segment')) {
            $query->where('premium_segment', Input::get('premium_segment'));
        }

        $items = $query->where('body_type', '!=', "0")
                       ->where('body_type', '!=', "")
                       ->distinct(true)
                       ->order_by('body_type','asc')
                       ->execute();

        return $this->response($items);

    }

    public function post_body_type()
    {
        $title = Input::post('title');

        $entry = Model_Body_Type::find('all', array(
            'where' => array(
                array('title', $title)
            )
        ));

        if(!count($entry)) {
            $item = new Model_Body_Type();
            $item->title = $title;
            $item->save();
        }

        return $this->response(array(
            'status' => 'ok',
            'count' => count($entry)
        ));
    }


}
