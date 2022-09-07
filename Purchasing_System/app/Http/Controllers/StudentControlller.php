<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;
class StudentController extends Controller
{
    public function index() 
    {
        return view("welcome");
    }
    public function store(Request $request)
    {
        foreach ($request->addMoreInputFields as $key => $value) {
            Student::create($value);
        }
        return back();
    }
}