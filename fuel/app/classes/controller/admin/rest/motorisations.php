<?php

class Controller_Admin_Rest_Motorisations extends Controller_Rest
{

	public function get_list()
    {
        $items = Model_Motorisation::find('all');
        return $this->response($items);
    }
    
    public function post_motorisation()
    {
        $title = Input::post('title');
        $item = new Model_Motorisation();
        $item->title = $title;
        $item->save();
        
        return $this->response(array(
            'status' => 'ok'
        ));
    }
    

}