<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

class TeacherController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:create-teacher|edit-teacher|delete-teacher', ['only' => ['index','show']]);
       $this->middleware('permission:create-teacher', ['only' => ['create','store']]);
       $this->middleware('permission:edit-teacher', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-teacher', ['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $teachers = Teacher::all();
        return view('teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    // {
    //     $request->validate([
    //         // Define validation rules if needed
    //     ]);

    //     $input = $request->all();
    //     Teacher::create($input);

    //     return redirect()->route('teachers.index')->with('success', 'Teacher created successfully!');
    // }

    {
        try {
            $request->validate([
                'name' => 'required|string|max:10',
                'address' => 'required|string|max:10',
                'mobile' => 'required|numeric|digits:10',
            ]);

            $input = $request->all();
            Teacher::create($input);

            return redirect()->route('teachers.index')->with('success', 'Teacher created successfully!');
        } catch (ValidationException $e) {
            // Handle validation errors
            return redirect()->route('teachers.create')->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            // Handle other exceptions, you might want to log or display an error message
            return redirect()->route('teachers.create')->with('error', 'An error occurred while creating the teacher.');
        }
    }


    // {
    //     try {
    //         $request->validate([
    //             'name' => 'required|string|max:10',
    //             'address' => 'required|string|max:10',
    //             'mobile' => 'required|numeric|digits:10',
    //         ]);

    //         $input = $request->all();
    //         Teacher::create($input);

    //         return redirect()->route('teachers.index')->with('success', 'Teacher created successfully!');
    //     } catch (\Exception $e) {
    //         // Handle other exceptions, you might want to log or display an error message
    //         return redirect()->route('teachers.create')->with('error', 'An error occurred while creating the teacher.');
    //     }
    // }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $teacher = Teacher::find($id);

        if (!$teacher) {
            return redirect()->route('teachers.index')->with('error', 'Teacher not found');
        }

        return view('teachers.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $teacher = Teacher::find($id);

        if (!$teacher) {
            return redirect()->route('teachers.index')->with('error', 'Teacher not found');
        }

        return view('teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            // Define validation rules if needed
        ]);

        $teacher = Teacher::find($id);

        if (!$teacher) {
            return redirect()->route('teachers.index')->with('error', 'Teacher not found');
        }

        $input = $request->all();
        $teacher->update($input);

        return redirect()->route('teachers.index', $id)->with('success', 'Teacher updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $teacher = Teacher::find($id);

        if (!$teacher) {
            return redirect()->route('teachers.index')->with('error', 'Teacher not found');
        }

        $teacher->delete();

        return redirect()->route('teachers.index')->with('success', 'Teacher deleted successfully!');
    }
}
