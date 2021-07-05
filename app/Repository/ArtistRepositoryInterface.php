<?php


namespace App\Repository;


interface ArtistRepositoryInterface
{
    public function index();
    public function show($id);
    public function destroy($id);
    public function store($request);
    public function add_presence($request);
    public function get_processes();
    public function store_comment($request);
    public function statues_success($request);
    public function statues_end($request);
    public function login();
    public function set_login($request);
    public function logout();

}
