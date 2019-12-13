<?php

namespace App;

use Illuminate\Support\Facades\DB;
use function Sodium\add;

class monitor
{
    private static $table = 'players';
    private static $table_statuses = 'statuses';
    private static $table_locations = 'locations';
    private static $table_history = 'history';
    private static $table_location = 'locations';



//    private static $table = 'cbs_bookings';
//    private static $table_event = 'cbs_events';
//    private static $table_show = 'cbs_bookings_shows';
//    private static $table_user = 'users';
//    private static $table_ticket = 'cbs_bookings_tickets';
    public static function getAll()
    {
        $query = DB::table(static::$table)
            ->join(static::$table_statuses, 'statuses.id', '=', 'players.status_id')
            ->join(static::$table_locations, 'locations.id', '=', 'players.location_id')
            ->select('players.*','players.id as id', 'statuses.name as status', 'locations.name as location')
            ->get();
        return $query;
    }

    public static function getbyId($id)
    {

        $query = DB::table(static::$table)
            ->join(static::$table_statuses, 'statuses.id', '=', 'players.status_id')
            ->join(static::$table_locations, 'locations.id', '=', 'players.location_id')
            ->select('players.*', 'players.id as id', 'statuses.name as status', 'locations.name as location')
            ->where('players.id', '=', $id)->get();
        return $query;

    }
    public static function getAll_history()
    {
        $query = DB::table(static::$table_history)
            ->join(static::$table, 'players.id', '=', 'history.player_id')
            ->select('history.*')
            ->get();
        return $query;
    }

    public static function get_History()
    {
        $query = DB::table(static::$table_history)
            ->join(static::$table, 'players.id', '=', 'history.player_id')
            ->select('history.*', 'players.id as id', 'statuses.name as status', 'locations.name as location')
            ->get();
        return $query;
    }

    public static function get_location()
    {
        $query = DB::table(static::$table_location)
            ->where('parent_id', '=', null)
            ->get();
        foreach ($query as $element){
            $childs = DB::table(static::$table_location)
                ->where('parent_id', '=', $element->id)
                ->get()->toArray();
            foreach ($childs as $child){
                $element->child = $child;
            }
        }
        return $query;
    }

};
