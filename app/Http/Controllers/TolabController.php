<?php

namespace App\Http\Controllers;

use App\Models\Tolab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class TolabController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */


public function create(Request $request)
{

}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
                'firstname' => 'required|string|max:255',
                'secname' => 'required|string|max:255',
                'phone' => 'required|string|unique:tolabs,phone|regex:/^01[0-2,5]{1}[0-9]{8}$/',
                'walyphone' => 'required|string|regex:/^01[0-2,5]{1}[0-9]{8}$/',
                'governorate' => 'required|string',
                'year' => 'required|in:ola,tanya,talta',
                'pass' => 'required|string|min:6',
            ]);

            $taleb = Tolab::create($data);
            return response()->json([
                'success' => true,
                'message' => 'تم التسجيل بنجاح',
                'user' => $taleb,
            ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tolab $tolab)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tolab $tolab)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tolab $tolab)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tolab $tolab)
    {
        //
    }
}
