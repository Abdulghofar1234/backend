<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public $animals = [
        ["name" => "kucing"],
        ["name" => "ayam"],
        ["name" => "ikan"]
    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    # method index - menampilkan data animals
    {
        echo "Menampilkan data animals";
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
        echo "Nama hewan: $request->nama";
        echo "<br>";
        echo "Menambahkan hewan baru";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        echo "Nama hewan: $request->nama";
        echo "<br>";
        echo "Mengupdate data hewan id $id";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        echo "Mengupdate data hewan id $id";
    }
}
