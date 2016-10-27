<?php
/**
 * Created by PhpStorm.
 * User: Anik Dey
 * Date: 10/17/2016
 * Time: 1:04 PM
 */

namespace App\ViewComposer;


use Illuminate\View\View;

class SidebarComposer {


//    public function __construct(UserRepository $users)
//    {
//        // Dependencies automatically resolved by service container...
//        $this->users = $users;
//    }


    public function compose(View $view)
    {
        $view->with('count', 10);
        $view->with('message', "Loaded From The Composer");
    }
}