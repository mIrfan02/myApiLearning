<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{

    public function store(Request $request)
    {
        $course = new Course();
        $course->title = $request->input('title');
        $course->description = $request->input('description');
        $course->user_id = auth()->id(); // Assign authenticated user's ID
        $course->save();

        return response()->json(['message' => 'Course created successfully'], 201);
    }

    public function index()
    {
        $courses = Course::where('user_id', auth()->id())->get();
        return response()->json($courses);
    }
}
