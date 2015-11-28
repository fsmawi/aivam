<?php
class Controller_Admin_Rest_Marques extends Controller_Rest
{

	public function get_list()
    {
        $marques = Model_Marque::find('all');
        return $this->response($marques);
    }
    
    public function post_marque()
    {
        $title = Input::post('title');
                    
        $entry = Model_Marque::find('all', array(
            'where' => array(
                array('title', $title)
            )
        ));
        
        if(!count($entry)) {
            $marque = new Model_Marque();
            $marque->title = $title;
            $marque->save();
        }
        
        return $this->response(array(
            'status' => 'ok',
            'count' => count($entry)
        ));
    }
    

}
