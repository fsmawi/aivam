<?php

class Controller_Admin_Rest_Segments extends Controller_Rest
{

	public function get_list()
    {
        $items = Model_Segment::find('all');
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