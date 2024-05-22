<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //GET
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //POST
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //GET CON ID  /category/{id}

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //patch o put

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //DELETE
    }
}
