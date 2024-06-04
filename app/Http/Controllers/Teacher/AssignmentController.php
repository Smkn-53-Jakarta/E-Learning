<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('teachers.assignments.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teachers.assignments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //return view('teachers.assignments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('teachers.assignments.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('teachers.assignments.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //return view('teachers.assignments.update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //return view('teachers.assignments.index');
    }

    public function trashed()
    {
        return view('teachers.assignments.trashed');
    }
}
