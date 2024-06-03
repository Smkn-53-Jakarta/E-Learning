<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index()
    {
        return view('teachers.materials.index');
    }

    public function create()
    {
        return view('teachers.materials.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function edit(string $id)
    {
        return view('teachers.materials.edit');
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

    public function trashed()
    {
        return view('teachers.materials.trashed');
    }
}
