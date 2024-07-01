<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\Course;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;

class CourseController extends Controller
{
    /**
     * Instantiate a new CourseController instance.
     */
    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:create-course|edit-course|delete-course', ['only' => ['index','show']]);
       $this->middleware('permission:create-course', ['only' => ['create','store']]);
       $this->middleware('permission:edit-course', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-course', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): view
    {
        $courses = Course::all();
        return view ('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): view
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // dd($request);
        $input = $request->all();
        Course::create($input);
        // return redirect('courses')->with('flash_message', 'Courses Addedd!');
        // return redirect('courses')->with('success', 'Courses Created successfully!');
        return redirect()->route('courses.index')->with('success', 'Course created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $course = Course::find($id);

        if (!$course) {
            return redirect()->route('courses.index')->with('error', 'Course not found');
        }

        return view('courses.show', compact('course'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $course = Course::find($id);

        if (!$course) {
        return redirect()->route('courses.index')->with('error', 'Course not found');
        }

        return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $course = Course::find($id);

        if (!$course) {
            return redirect()->route('courses.index')->with('error', 'Course not found');
        }

        $input = $request->all();
        $course->update($input);
        // return redirect('courses')->with('flash_message', 'course Updated!');
        return redirect('courses')->with('success', 'Courses Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        // Course::destroy($id);
        $course = Course::find($id);

        if (!$course) {
            return redirect()->route('courses.index')->with('error', 'Course not found');
        }
        $course->delete();
        // return redirect('courses')->with('flash_message', 'Course deleted!');
        // return redirect('courses')->with('success', 'Courses Deleted successfully!');
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully!');
    }
}
