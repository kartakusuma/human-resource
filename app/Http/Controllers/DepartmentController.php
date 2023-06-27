<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DepartmentController extends Controller
{
    public function index()
    {
        $apiURL = "localhost:8080/api/v1/departments/";

        $response = Http::get($apiURL);
        if ($response->successful()) {
            $data = $response->json();
            $departments = $data["data"];

            return view("department.index", compact("departments"));
        } else {
            return view("error", [
                "error" => "Gagal mengambil data", 
                "status" => $response->status(),
            ]);
        }
    }

    public function create()
    {
        return view("department.create");
    }

    public function store(Request $request)
    {
        $apiURL = "localhost:8080/api/v1/departments/";
        $data = [
            "name" => $request->input("name"),
            "city" => $request->input("city"),
        ];
        
        $response = Http::post($apiURL, $data);
        if ($response->successful()) {
            return redirect()->route("departments");
        } else {
            return view("error", [
                "error" => "Gagal menyimpan data", 
                "status" => $response->status(),
            ]);
        }
    }

    public function show($id)
    {
        $apiURL = "localhost:8080/api/v1/departments/";

        $response = Http::get($apiURL.$id);
        if ($response->successful()) {
            $data = $response->json();
            $department = $data["data"];

            return view("department.show", compact("department"));
        } else {
            return view("error", [
                "error" => "Gagal mengambil data", 
                "status" => $response->status(),
            ]);
        }
    }

    public function edit($id)
    {
        $apiURL = "localhost:8080/api/v1/departments/";

        $response = Http::get($apiURL.$id);
        if ($response->successful()) {
            $data = $response->json();
            $department = $data["data"];

            return view("department.edit", compact("department"));
        } else {
            return view("error", [
                "error" => "Gagal mengambil data", 
                "status" => $response->status(),
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $apiURL = "localhost:8080/api/v1/departments/";

        $data = [
            "name" => $request->input("name"),
            "city" => $request->input("city"),
        ];

        $response = Http::put($apiURL.$id, $data);
        if ($response->successful()) {
            return redirect()->route("departments");
        } else {
            return view("error", [
                "error" => "Gagal mengupdate data", 
                "status" => $response->status(),
            ]);
        }
    }

    public function destroy($id)
    {
        $apiURL = "localhost:8080/api/v1/departments/";

        $response = Http::delete($apiURL.$id);
        if ($response->successful()) {
            return redirect()->route("departments");
        } else {
            return view("error", [
                "error" => "Gagal menghapus data", 
                "status" => $response->status(),
            ]);
        }
    }
}
