<?php
return array(
	'_root_'  => 'welcome/index',  // The default route
	'_404_'   => 'welcome/404',    // The main 404 route
    'admin/items/create' => 'admin/items/create',
    'admin/items/edit/:id' => 'admin/items/edit/$1',
//    'admin/items/:id' => 'admin/items/list/$1'
);