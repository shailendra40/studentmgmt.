<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Payment;
use App\Models\Student;
use Illuminate\Bus\Batch;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

class PaymentController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:create-payment|edit-payment|delete-payment', ['only' => ['index','show']]);
       $this->middleware('permission:create-payment', ['only' => ['create','store']]);
       $this->middleware('permission:edit-payment', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-payment', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::all();
        // return view('payments.index')->with('payments', $payments);
        return view('payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('payments.create');
        // $batches = Batch::all();
        $enrollments = Enrollment::all();
        // $enrollments = Enrollment::pluck('enroll_no','id');

        return view('payments.create', compact('enrollments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):  RedirectResponse
    {
        $input = $request->all();
        // dd($input);
        // $formattedDate = Carbon::createFromFormat('d-m-Y', $input['paid_date'])->toDateTimeString();
        $formattedDate = Carbon::createFromFormat('d-M-Y', $input['paid_date'])->toDateTimeString();

        $input['paid_date'] = $formattedDate;
        Payment::create($input);
        // return redirect('payments')->with('flash_message', 'payments Addedd!');
        return redirect('payments')->with('success', 'Payment Added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $payments = Payment::find($id);
        return view('payments.show')->with('payments', $payments);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $enrollments = Enrollment::all();
        // $students = Student::all();
        $payments = Payment::find($id);
        return view('payments.edit', compact('enrollments' ,'payments'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id): RedirectResponse
    // {
    //     $payments = Payment::find($id);
    //     $input = $request->all();
    //     // dd($input);
    //     $payments->update($input);
    //     return redirect('payments')->with('flash_message', 'Payment Update!');
    // }

//     public function update(Request $request, $id)
//     {
//     $request->validate([
//         // Other validation rules...
//         'paid_date' => 'required|date_format:d-M-Y',
//     ]);

//     $input = $request->all();

//     // Convert the date format using STR_TO_DATE
//     $input['paid_date'] = DB::raw("STR_TO_DATE('{$input['paid_date']}', '%d-%b-%Y')");


//     Payment::find($id)->update($input);

//     return redirect('payments')->with('flash_message', 'Payment Updated!');
// }

public function update(Request $request, $id)
{
    $request->validate([
        'paid_date' => 'required|date_format:d-M-Y',
    ]);

    $input = $request->all();

    // Convert the date format using Carbon
    $formattedDate = Carbon::createFromFormat('d-M-Y', $input['paid_date'])->format('Y-m-d H:i:s');

    // Update the 'paid_date' with the formatted date
    $input['paid_date'] = $formattedDate;

    Payment::find($id)->update($input);

    // return redirect('payments')->with('flash_message', 'Payment Updated!');
    return redirect('payments')->with('success', 'Payment Updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Payment::destroy($id);
        // return redirect('payments')->with('flash_message', 'Payment deleted!');
        return redirect('payments')->with('success', 'Payment Deleted successfully!');
    }
}
