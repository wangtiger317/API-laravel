<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\monitor;
class monitorController extends Controller
{
    public function getPlayers(){
        $data = monitor::getAll();

        return json_encode($data);
    }//
    public function getPlayerbyId($id){

        $data = monitor::getbyId($id);

        return json_encode($data);
    }//

    public function getHistory(){
        $data = monitor::getAll_history();
        return json_encode($data);
    }
    public function getLocation(){
        $data = monitor::get_location();
        return json_encode($data);
    }
    public function test_PHP($variable)
    {
        echo '<script>';
        echo 'console.log(' . json_encode($variable) . ')';
        echo '</script>';
    }
}
