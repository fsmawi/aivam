<?php

class Controller_Admin_Rest_Caracteristiques extends Controller_Rest
{

	public function get_list()
    {
        $items = Model_Caracteristique::find('all');
        return $this->response($items);
    }
    
    public function post_caracteristique()
    {
        $title = Input::post('title');
        
        $entry = Model_Caracteristique::find('all', array(
            'where' => array(
                array('title', $title)
            )
        ));
        
        if(!count($entry)) {
            $item = new Model_Caracteristique();
            $item->title = $title;
            $item->save();
        }
        
            
        
        return $this->response(array(
            'status' => 'ok',
            'count' => count($entry)
        ));
    }
    

}