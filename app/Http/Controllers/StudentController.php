<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PHPUnit\Framework\MockObject\Builder\Stub;

class StudentController extends Controller
{
    //
    public function index()
    {
        $students = Student::all();
        return response()->json(['status' => 200, 'students' => $students]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'course' => 'required',
            'phone' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 422, 'errors' => $validator->messages()], 422);
        } else {
            $student = Student::create([
                'name' => $request->name,
                'course' => $request->course,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);

            if ($student)
                return response()->json(['status' => 200, 'message' => 'success'], 200);
            else
                return response()->json(['status' => 500, 'message' => 'warnign'], 500);
        }
    }

    public function edit($id)
    {
        $student = Student::find($id);
        if ($student)
            return response()->json($student);
        else
            return response()->json(['status' => 404, 'message' => 'Student not found'], 404);
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'course' => 'required',
            'phone' => 'required',
        ]);


        if ($validator->fails()) {
            return response()->json(['status' => 422, 'errors' => $validator->messages()], 422);
        } else {
            $student->update([
                'name' => $request->name,
                'course' => $request->course,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);

            if ($student)
                return response()->json(['status' => 200, 'message' => 'success'], 200);
            else
                return response()->json(['status' => 404, 'message' => 'Student not found'], 404);
        }
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return response()->json(['status' => 200, 'message' => 'success']);
    }
}
