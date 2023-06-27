<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EmployeeController extends Controller
{
    public function index()
    {
        $apiURL = "localhost:8080/api/v1/employees";

        $response = Http::get($apiURL);
        if ($response->successful()) {
            $data = $response->json();
            $employees = $data["data"];

            $departmentsURL = "localhost:8080/api/v1/departments";
            $departmentsResponse = Http::get($departmentsURL);
            if ($departmentsResponse->successful()) {
                $departmentsData = $departmentsResponse->json();
                $departments = $departmentsData["data"];

                return view("employee.index", compact('employees', 'departments'));
            } else {
                return view("error", [
                    "error" => "Gagal mengambil data", 
                    "status" => $response->status(),
                ]);
            }
        } else {
            return view("error", [
                "error" => "Gagal mengambil data", 
                "status" => $response->status(),
            ]);
        }
    }

    public function create()
    {
        $apiURL = "localhost:8080/api/v1/departments";

        $response = Http::get($apiURL);
        if ($response->successful()) {
            $data = $response->json();
            $departments = $data["data"];

            return view("department.create", compact("departments"));
        } else {
            return view("error", [
                "error" => "Gagal mengambil data", 
                "status" => $response->status(),
            ]);
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'foto' => 'image|mimes:jpeg,jpg,png',
        ]);

        $picture = $request->input('picture');
        $picture_path = time().'.'.$picture->getClientOriginalExtension();
        $picture->move('pictures/employees/', $picture_path);

        $data = [
            "name" => $request->input("name"),
            "age" => $request->input("age"),
            "sex" => $request->input("sex"),
            "phone" => $request->input("phone"),
            "email" => $request->input("email"),
            "address" => $request->input("address"),
            "picture" => $picture_path,
            "department_id" => $request->input("department_id"),
        ];

        $apiURL = "localhost:8080/api/v1/employees";

        $response = Http::post($apiURL, $data);
        if ($response->successful()) {
            return redirect()->route("employees");
        } else {
            return view("error", [
                "error" => "Gagal menyimpan data", 
                "status" => $response->status(),
            ]);
        }
    }

    public function show($id)
    {
        $apiURL = "localhost:8080/api/v1/employees";

        $response = Http::get($apiURL.$id);
        if ($response->successful()) {
            $data = $response->json();
            $employee = $data["data"];

            $departmentsURL = "localhost:8080/api/v1/departments";
            $departmentsResponse = Http::get($departmentsURL);
            if ($departmentsResponse->successful()) {
                $departmentsData = $departmentsResponse->json();
                $departments = $departmentsData["data"];

                return view("employee.show", compact('employee', 'departments'));
            } else {
                return view("error", [
                    "error" => "Gagal mengambil data", 
                    "status" => $response->status(),
                ]);
            }
        } else {
            return view("error", [
                "error" => "Gagal mengambil data", 
                "status" => $response->status(),
            ]);
        }
    }

    public function edit($id)
    {
        $apiURL = "localhost:8080/api/v1/employees";

        $response = Http::get($apiURL.$id);
        if ($response->successful()) {
            $data = $response->json();
            $employee = $data["data"];

            $departmentsURL = "localhost:8080/api/v1/departments";
            $departmentsResponse = Http::get($departmentsURL);
            if ($departmentsResponse->successful()) {
                $departmentsData = $departmentsResponse->json();
                $departments = $departmentsData["data"];

                return view("employee.edit", compact('employee', 'departments'));
            } else {
                return view("error", [
                    "error" => "Gagal mengambil data", 
                    "status" => $response->status(),
                ]);
            }
        } else {
            return view("error", [
                "error" => "Gagal mengambil data", 
                "status" => $response->status(),
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        if ($request->has("picture")) {
            $picture = $request->input('picture');
            $picture_path = time().'.'.$picture->getClientOriginalExtension();
            $picture->move('pictures/employees/', $picture_path);
        } else {
            $oldDataURL = "localhost:8080/api/v1/employees";
            $oldDataResponse = Http::get($oldDataURL.$id);
            if ($oldDataResponse->successful()) {
                $oldData = $oldDataResponse->json();
                $oldDataEmployee = $oldData["data"];

                $picture_path = $oldDataEmployee["picture"];
            } else {
                return view("error", [
                    "error" => "Gagal mengambil data", 
                    "status" => $oldDataResponse->status(),
                ]);
            }
        }

        $data = [
            "name" => $request->input("name"),
            "age" => $request->input("age"),
            "sex" => $request->input("sex"),
            "phone" => $request->input("phone"),
            "email" => $request->input("email"),
            "address" => $request->input("address"),
            "picture" => $picture_path,
            "department_id" => $request->input("department_id"),
        ];

        $apiURL = "localhost:8080/api/v1/employees";

        $response = Http::put($apiURL, $data);
        if ($response->successful()) {
            return redirect()->route("employees");
        } else {
            return view("error", [
                "error" => "Gagal mengupdate data", 
                "status" => $response->status(),
            ]);
        }
    }

    public function destroy($id)
    {
        $apiURL = "localhost:8080/api/v1/employees";

        $response = Http::delete($apiURL.$id);
        if ($response->successful()) {
            return redirect()->route("employees");
        } else {
            return view("error", [
                "error" => "Gagal menghapus data", 
                "status" => $response->status(),
            ]);
        }
    }
}
