<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Course;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

class BatchController extends Controller
{
    /**
     * Instantiate a new CourseController instance.
     */
    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:create-batch|edit-batch|delete-batch', ['only' => ['index','show']]);
       $this->middleware('permission:create-batch', ['only' => ['create','store']]);
       $this->middleware('permission:edit-batch', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-batch', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // $batches = Batch::with('courses')->get();
        $batches = Batch::all();
        return view('batches.index', compact('batches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $courses = Course::all();
        // $courses = Course::pluck('name','id');

        return view('batches.create', compact('courses'));
        // return view('batches.create')->with('success', 'Payment Added successfully!', compact('courses'));
        // return view('batches.create')->with(['success' => 'Batches Created successfully!'])->with(compact('courses'));

    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // dd("hiuhihij");
        $input = $request->all();
        Batch::create($input);
        // return redirect('batches')->with('flash_message', 'Batch Addedd!');
        // return redirect('batches')->with('success', 'Batches Created successfully!');

        return redirect()->route('batches.index')->with('success', 'Batch created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $batch = Batch::find($id);

    //     return view('batches.show')->with('batches', $batches);
    // }

    if (!$batch) {
        return redirect()->route('batches.index')->with('error', 'Batch not found');
    }

    return view('batches.show', compact('batch'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $courses = Course::all();
        $batch = Batch::find($id);

        if (!$batch) {
            return redirect()->route('batches.index')->with('error', 'Batch not found');
        }

        return view('batches.edit', compact('batch', 'courses'));
    }

        // return view('batches.edit', compact('courses', 'batches'));

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $batch = Batch::find($id);

        if (!$batch) {
            return redirect()->route('batches.index')->with('error', 'Batch not found');
        }

        $input = $request->all();
        $batch->update($input);

        return redirect()->route('batches.index', $id)->with('success', 'Batch updated successfully!');
    }

        // return redirect('batches')->with('flash_message', 'Batch Updated!');
        // return redirect('batches')->with('success', 'Batches Updated successfully!');

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        // Batch::destroy($id);

        $batch = Batch::find($id);

        if (!$batch) {
            return redirect()->route('batches.index')->with('error', 'Batch not found');
        }

        $batch->delete();

        return redirect()->route('batches.index')->with('success', 'Batch deleted successfully!');
        // return redirect('batches')->with('flash_message', 'Batch deleted!');
        // return redirect('batches')->with('success', 'Batches Deleted successfully!');
    }
}
