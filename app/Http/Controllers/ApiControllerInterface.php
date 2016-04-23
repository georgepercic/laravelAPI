<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

interface ApiControllerInterface {

    public function index();

    public function store(Request $request);

    public function update(Request $request, $id);

    public function show($id);

    public function destroy($id);
}