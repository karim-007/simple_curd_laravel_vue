<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeController extends Controller
{

    /*
     * method for get all employees info
     * */

    public function employees()
    {
        $employees = Employee::all();
        return response()->json($employees,200);
    }

    /*
     * method for store employee
     * */
    public function store(Request $request)
    {
        /*request data validate*/
        Validator::make($request->all(),[
            'first_name'=>'required|string|max:50',
            'last_name'=>'required|string|max:50',
            'phone_number'=>'required|string|numeric|unique:employees,phone_number',
        ])->validate();

        /*if email validate*/
        if ($request->input('email')){
            Validator::make($request->all(),[
                'email'=>'required|email|unique:employees,email'
            ])->validate();
        }
        $ss = Employee::create($request->all());
        if (isset($ss))
            return response()->json(['status'=>'success','message'=>'successfully created','employee'=>$ss],200);
        else return response()->json(['status'=>'fail','message'=>'Invalid request'],404);
    }

    /*
     * method for update employee
     * */
    public function update(Request $request, Employee $employee)
    {
        /*
         * request data validate
         * */
        Validator::make($request->all(),[
            'first_name'=>'string|max:50',
            'last_name'=>'string|max:50',
            'phone_number'=>'string|numeric|unique:employees,phone_number,'.$employee->id,
            'date_of_birth'=>'required|date',
            'salary'=>'required|numeric|not_in:-1',
        ])->validate();

        $ss = $employee->update($request->all());
        if (isset($ss))
            return response()->json(['status'=>'success','message'=>'successfully update'],200);
        else return response()->json(['status'=>'fail','message'=>'Invalid request'],404);

    }

    /*
     * method for employee remove
     * */
    public function remove(Employee $employee)
    {
        $ss= $employee->delete();
        if (isset($ss))
            return response()->json(['status'=>'success','message'=>'successfully remove'],200);
        else return response()->json(['status'=>'fail','message'=>'Invalid request'],404);

    }
}
