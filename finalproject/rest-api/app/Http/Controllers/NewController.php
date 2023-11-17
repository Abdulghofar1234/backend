<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\New;

class NewController extends Controller
{
    public function index()
	{
        # menggunakan model Student untuk select data
		$news = News::all();

		if (!empty($news)) {
			$response = [
				'message' => 'Menampilkan Data Semua Student',
				'data' => $news,
			];
			return response()->json($response, 200);
		} else {
			$response = [
				'message' => 'Data tidak ada'
			];
			return response()->json($response, 404);
		}
	}

	public function store(Request $request)
    {
        #validate
        $validateData = $request->validate([
            'nama' => 'required',
            'berita' => 'numeric|required',
            'kejadian' => 'email|required',
            'lokasi' => 'required'
        ]);

        $student = Student::create($validateData);


        $data = [
            'message' => 'New is created succesfully',
            'data' => $student,
        ];

        // mengembalikan data (json) dan kode 201
        return response()->json($data, 201);
    }

	public function show($id)
	{
		$new = Student::find($id);

		if ($new) {
			$response = [
				'message' => 'Get detail student',
				'data' => $new
			];
	
			return response()->json($response, 200);
		} else {
			$response = [
				'message' => 'Data not found'
			];
			
			return response()->json($response, 404);
		}
	}

	public function update(Request $request, $id)
	{
		$new = Student::find($id);

		if ($new) {
			$response = [
				'message' => 'New is updated',
				'data' => $new->update($request->all())
			];
	
			return response()->json($response, 200);
		} else {
			$response = [
				'message' => 'Data not found'
			];

			return response()->json($response, 404);
		}
	}

	public function destroy($id)
	{
		$new = News::find($id);

		if ($new) {
			$response = [
				'message' => 'New is delete',
				'data' => $new->delete()
			];

			return response()->json($response, 200); 
		} else {
			$response = [
				'message' => 'Data not found'
			];

			return response()->json($response, 404);
		}
	}
}