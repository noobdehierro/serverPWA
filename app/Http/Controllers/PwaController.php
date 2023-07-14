<?php

namespace App\Http\Controllers;

use App\Models\Pwa;
use Illuminate\Http\Request;

class PwaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return 'hola';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|numeric|digits:10',
            'message' => 'required|string|min:5|max:255'
        ]);


        try {
            $response = Pwa::create($validatedData);
            $success = [
                "status" => "success",
                "message" => $response
            ];
            return response()->json($success);
        } catch (\Throwable $th) {
            // throw $th;

            $error = [
                "status" => "error",
                "message" => $th->getMessage()
            ];

            return response()->json($error, 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pwa $pwa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pwa $pwa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pwa $pwa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pwa $pwa)
    {
        //
    }
}
