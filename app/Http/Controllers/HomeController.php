<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Artist;
use App\Models\Citie;
use App\Models\Comment;
use App\Models\Presence;
use App\Models\Request_all_use;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }

    public function get_service (){
        $services = Service::all();
        return view('front.service', compact('services'));
    }
    public function get_artists (){
        $artists = Artist::all();
        return view('front.get_artist', compact('artists'));
    }


    public function get_artist($id){

        $artists = Artist::select()->where('service_id', $id)->where('Expiration', 1)->get();

        $cities = Citie::all();
    return view('front.artist', compact('artists', 'cities', 'id'));
    }

    public function getarea($id){

        $list_Area = Area::where("citie_id", $id)->pluck("name", "id");
        return $list_Area;
    }

    public function Filter_area(Request $request){

        $area = Area::all();
        $cities = Citie::all();
        $Search = Artist::select('*')->where('area_id', '=', $request->area_id)->where('service_id', '=', $request->id)->get();
        $id = $request->id;
        return view('front.artist',compact('area', 'cities' ,'id'))->withDetails($Search);
    }
    public function get_all (Request $request){

        $services = Service::select('*')->where('id', '=', $request->id_service)->get();
        $artists = Artist::select('*')->where('id', $request->id_artist)->get();
        $cities = Citie::all();
        $Presence = Presence::where('artist_id', '=', $request->id_artist)->get()->last();
        $showdates = Request_all_use::onlyTrashed()->
        where('user_id', auth()->user()->id)->
        where('service_id', $request->id_service)->
        where('artist_id', $request->id_artist)->
        get();
/*
        $success = Request_all_use::select('*')->
        where('user_id', auth()->user()->id)->
        where('service_id', $request->id_service)->
        where('artist_id', $request->id_artist)->
        where('statues', 0)->get();
   */
        return view('front.get_all', compact('services', 'artists', 'cities', 'Presence', 'showdates'));

    }
    public function get_processes (){
       $get_processes = Request_all_use::select('*')->where('user_id', auth()->user()->id)->get();
         return view('front.get_processes', compact('get_processes'));
    }


}
