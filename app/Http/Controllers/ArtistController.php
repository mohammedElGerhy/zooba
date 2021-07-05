<?php

namespace App\Http\Controllers;

use App\Repository\ArtistRepositoryInterface;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

protected $artist;

public function __construct(ArtistRepositoryInterface $artist)
{
    $this->artist = $artist;
}

    public function index()
    {
        return $this->artist->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->artist->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->artist->show($id);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->artist->destroy($id);
    }

    public function add_presence (Request $request){
    return $this->artist->add_presence($request);
    }

    public function get_processes(){
        return $this->artist->get_processes();
    }

public function  store_comment (Request $request){
    return $this->artist->store_comment($request);
}

public function statues_success (Request $request){
    return $this->artist->statues_success($request);
}
    public function statues_end (Request $request){
        return $this->artist->statues_end($request);
    }
    public function login (){
        return $this->artist->login();
    }

    public function set_login (Request $request){
        return $this->artist->set_login($request);
    }
    public function logout(){
       return $this->artist->logout();
    }

}
