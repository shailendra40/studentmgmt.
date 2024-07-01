<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class StudentController extends Controller
{
    /**
     * Instantiate a new CourseController instance.
     */
    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:create-student|edit-student|delete-student', ['only' => ['index','show']]);
       $this->middleware('permission:create-student', ['only' => ['create','store']]);
       $this->middleware('permission:edit-student', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-student', ['only' => ['destroy']]);
    }


    public function index()
    {
        $students = Student::all();
        // return view('students.index')->with('students', $students);    //learn here,
        return view('students.index', compact('students'));
    }

    public function create(): view
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request): RedirectResponse
    // {
    //     $input = $request->all();
    //     Student::create($input);
    //     // return redirect('students')->with('flash_message', 'Student Addedd!');
    //     return redirect()->route('students.index')->with('success', 'Student Created successfully!');
    // }

//     public function store(Request $request): RedirectResponse
// {
//     // Validate the request
//     $request->validate([
//         'name' => 'required|string',
//         'address' => 'required|string',
//         'mobile' => 'required|numeric',
//     ]);

//     // Get all input data from the request
//     $input = $request->all();

//     // Create a new Student using the create method
//     Student::create($input);

//     // Redirect to the index route with a success message
//     return redirect()->route('students.index')->with('success', 'Student created successfully!');
// }



// ???????????try catch using here,,
public function store(Request $request)
{
        // Validate the request
        $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'mobile' => 'required|numeric',
        ]);

        try {
        // Get all input data from the request
        $input = $request->all();

        // Create a slug from the name
        // $country->slug = SlugService::createSlug(Country::class, 'slug', $request->input('name'));
        $slug = Str::slug($request->input('name'));

        // Add the slug to the input data
        $input['slug'] = $slug;

        // Create a new Student using the create method
        Student::create($input);

        // Redirect to the index route with a success message
        return redirect()->route('students.index')->with('success', 'Student created successfully!');
    } catch (ValidationException $e) {
        // Handle validation errors
        return redirect()->route('students.create')->withErrors($e->errors())->withInput();
    } catch (\Exception $e) {
        // Handle other exceptions
        return redirect()->route('students.create')->with('error', 'An error occurred while creating the student.');
    }
}


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $student = Student::find($id);
        if (!$student) {
            return redirect()->route('students.index')->with('error', 'Teacher not found');
        }
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id , $slug)    // this is add for slug
    // {
    //     $student = Student::find($id);

    //     $student = Student::where('slug', $slug)->firstOrFail();    // this is add for slug

    //     return view('students.edit')->with('students', $student);
    // }


    // public function edit($id)
    // {
    //     $student = Student::find($id);

    //     if (!$student) {
    //         return redirect()->route('teachers.index')->with('error', 'Teacher not found');
    //     }

    //     return view('students.edit', compact('student'));
    // }

    //FOR SLUG:
    // StudentController.php
    public function edit($slug)
    {
    $student = Student::where('slug', $slug)->firstOrFail();
    return view('students.edit', compact('student'));
    }



    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, $id): RedirectResponse
    public function update(Request $request, $slug)
    {


        $student = Student::where('slug', $slug)->firstOrFail();
        $input = $request->all();
        $student->update($input);
        return redirect()->route('students.index')->with('success', 'Student Updated successfully!');
    }


    //     $request->validate([
    //         // Define validation rules if needed
    //     ]);

    //     $student = Student::find($id);

    //     if (!$student) {
    //         return redirect()->route('students.index')->with('error', 'Student not found');
    //     }

    //     $input = $request->all();
    //     $student->update($input);
    //     // return redirect('students')->with('flash_message', 'student Updated!');
    //     // return redirect('students')->with('success', 'Student Updated successfully!');
    //     return redirect()->route('students.index', $id)->with('success', 'Student Updated successfully!');

    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Student::destroy($id);
        // return redirect('students')->with('flash_message', 'Student deleted!');
        return redirect('students')->with('success', 'Student Deleted successfully!');
    }
    //     public function deleteMultipleItems(Request $request)
    // {
    //     $ids = $request->input('id');

    //     // Use Eloquent or Query Builder to delete items with the given IDs
    //     Student::whereIn('id', $ids)->delete();

    //     return response()->json(['message' => 'Items deleted successfully']);
    // }

//     public function deleteMultipleItems(Request $request)
// {
//     $ids = $request->input('ids'); // Change 'id' to 'ids'

//     if (!is_array($ids)) {
//         // Handle the case where 'ids' is not an array, set $ids to an empty array or handle it according to your logic
//         $ids = [];
//     }

//     // Use Eloquent or Query Builder to delete items with the given IDs
//     Student::whereIn('id', $ids)->delete();

//     // return response()->json(['message' => 'Items deleted successfully']);
//     // return redirect('students')->with('success', 'Student Deleted successfully!');

//     return redirect('students')->with('success', 'Student Deleted successfully!');

// }













// public function deleteMultipleItems(Request $request)
// {
//     $ids = $request->input('ids');
//     // dd($ids);
//     if (!is_array($ids)) {
//         // Handle the case where 'ids' is not an array, set $ids to an empty array or handle it according to your logic
//         $ids = [1];
//     }

//     Student::whereIn('id', $ids)->delete();

//     return redirect('students')->with('success', 'Students Deleted successfully!');
// }



public function deleteMultipleItems(Request $request)
{
    $ids = explode(',', $request->input('selected-ids'));
    Student::whereIn('id', $ids)->delete();

    return redirect()->back()->with('success', 'Selected items deleted successfully.');
}











// public function deleteMultipleItems(Request $request)
// {
//     try {
//         $this->validate($request, [
//             'ids' => 'required|array',
//         ]);

//         $ids = $request->input('ids');
//         // dd($ids);

//         // Ensure all IDs are numeric to prevent SQL injection
//         $ids = array_map('intval', $ids);

//         // Use mass delete with try-catch for better error handling
//         Student::whereIn('id', $ids)->delete();

//         return redirect('students')->with('success', 'Students Deleted successfully!');
//     } catch (ValidationException $e) {
//         // Handle validation errors
//         return redirect('students')->withErrors($e->errors())->withInput();
//     } catch (\Exception $e) {
//         // Handle other exceptions
//         return redirect('students')->with('error', 'An error occurred while deleting students.');
//     }
// }




// public function deleteMultipleItems(Request $request)
// {
//     $ids = $request->input('ids');

//     if (empty($ids)) {
//         return redirect('students')->with('error', 'No students selected for deletion.');
//     }

//     $confirmed = $request->has('confirmed') && $request->input('confirmed') == '1';

//     if (!$confirmed) {
//         return redirect('students')->with('info', 'Please confirm deletion.');
//     }

//     Student::whereIn('id', $ids)->delete();

//     return redirect('students')->with('success', 'Students Deleted successfully!');
// }



public function search_data(Request $request)
    {
        // Implement your search logic here
        // You can access the search query using $request->input('search')
        // Perform the search and return the results

        $data = $request->input('search');

        // $students = DB::table('students')->where('name' , 'like' , '%' . $data.'%')->get();     //Only search by name show here in this line of code
        $students = DB::table('students')->where('name' , 'like' , '%' . $data.'%')     //Multiple search by name, ph. no. etc. show here in this line of code
        ->orWhere('mobile' , 'like' , '%' . $data.'%')
        ->orWhere('address' , 'like' , '%' . $data.'%')
         ->get();
                    //HERE, WHEN WE WANT A ACCURATE DATA FOR SEARCH THEN, WE REMOVE HERE . % all THIS dot & PERCENTAGE SIGN,
                    //THEN, WE GOT A ACCURATE AND EXACT DATA WHAT WE WANT ONLY WE FETCH EXACT DATA
                    //THIS IS CALLED CASE SENSITIVE METHOD,, Okay................!!!
                    //      For e.g. like this way,↓↓↓↓↓    ↓⇓↓⇓↓⇓↓⇓    ⇟⇟⇟⇟⇟⇟⇟⇟    ⇩⇩⇩⇩⇩⇩⇩⇩⇩

        // $students = DB::table('students')->where('name' , 'like' , $data)     //Multiple search by name, ph. no. etc. show here in this line of code
        // ->orWhere('mobile' , 'like' , $data)
        // ->orWhere('address' , 'like' , $data)
        //  ->get();


        return view('students.index' , compact('students'));
    }

}
