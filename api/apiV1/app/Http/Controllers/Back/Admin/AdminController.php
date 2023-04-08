<?php

namespace App\Http\Controllers\Back\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "Admin index man";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $customer)
    {
        //
    }
}
