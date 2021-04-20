<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Faker\Core\Number;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $validated = $request->validate([
            'filter' => 'nullable',
            'sort' => 'nullable|in:first_name,last_name,title,created_at',
        ]);

        $query = Employee::query();

        if($request->filter){
            $query = $query
                ->where('first_name', 'like', '%'.$request->filter.'%')
                ->orWhere('last_name', 'like', '%'.$request->filter.'%')
                ->orWhere('title', 'like', '%'.$request->filter.'%');
        }
        if($request->sort){
            $query = $query->orderBy($request->sort);
        }
        return response()->json($query->paginate(Config::get('employees.per_page', 10)));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($employee)
    {
        $employee = Employee::with('articles')->findOrFail($employee);
        return response()->json($employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
