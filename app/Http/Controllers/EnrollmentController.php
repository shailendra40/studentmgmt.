<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Student;
use Illuminate\View\View;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enrollments = Enrollment::all();
        // return view('enrollments.index')->with('enrollments', $enrollments);
        return view('enrollments.index', compact('enrollments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('enrollments.create');
        $batches = Batch::all();
        $students = Student::all();

        return view('enrollments.create', compact('batches','students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        Enrollment::create($input);
        // return redirect('enrollments')->with('flash_message', 'enrollments Addedd!');
        return redirect('enrollments')->with('success', 'Enrollments Created successfully!');
    }
    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:create-enrollment|edit-enrollment|delete-enrollment', ['only' => ['index','show']]);
       $this->middleware('permission:create-enrollment', ['only' => ['create','store']]);
       $this->middleware('permission:edit-enrollment', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-enrollment', ['only' => ['destroy']]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $enrollments = Enrollment::find($id);
        return view('enrollments.show')->with('enrollments', $enrollments);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $batches = Batch::all();
        $students = Student::all();
        // $batches = Batch::all();
        $enrollments = Enrollment::find($id);
        return view('enrollments.edit', compact('batches' ,'enrollments', 'students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $enrollments = Enrollment::find($id);
        $input = $request->all();
        $enrollments->update($input);
        // return redirect('enrollments')->with('flash_message', 'Enrollment Update!');
        return redirect('enrollments')->with('success', 'Enrollments Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Enrollment::destroy($id);
        // return redirect('enrollments')->with('flash_message', 'Enrollment deleted!');
        return redirect('enrollments')->with('success', 'Enrollments Deleted successfully!');
    }
}
