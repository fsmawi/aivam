<?php

class Controller_Admin_Rest_Segments extends Controller_Rest
{

	public function get_list()
    {
        $query = DB::select(array('segment', 'title'))->from('items');

        if(Input::get('make')) {
            $query->where('make', Input::get('make'));
        }

        if(Input::get('model')) {
            $query->where('model', Input::get('model'));
        }

        if(Input::get('premium_segment')) {
            $query->where('premium_segment', Input::get('premium_segment'));
        }

        if(Input::get('body_type')) {
            $query->where('body_type', Input::get('body_type'));
        }

        $items = $query->distinct(true)
                       ->order_by('segment','asc')
                       ->execute();

        return $this->response($items);
    }

    public function post_segment()
    {
        $title = Input::post('title');

        $entry = Model_Segment::find('all', array(
            'where' => array(
                array('title', $title)
            )
        ));

        if(!count($entry)) {
            $item = new Model_Segment();
            $item->title = $title;
            $item->save();
        }

        return $this->response(array(
            'status' => 'ok',
            'count' => count($entry)
        ));
    }


}
