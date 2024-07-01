<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\ReportController;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;

class ReportController extends Controller
{
    /**
     * Generate a PDF for a specific payment receipt.
     */
    public function report1($pid)
    {
    $payment = Payment::find($pid);
    $pdf = App::make('dompdf.wrapper');
    $print = "<div style='margin:20px; padding:20px;'>";
    // $print.= "<h1 align='center'> Payment Receipt </h1>";
    $print.= "<h1 align=''> Payment Receipt </h1>";
    $print.= "<hr/>";
    $print.= "<p> Receipt No : <b>" . $pid . "</b> </p>";
    $print.= "<p> Date : <b> " . $payment->paid_date . "</b></p>";
    $print.="<p> Enrollment No : <b>" . $payment->enrollments->enroll_no . "</b></p>";

    $print.="<p> Student Name : <b>" . $payment->enrollments->students->name . "</b></p>";

    $print.= "<hr/>";
    $print.= "<table style='width: 100%;'>";

    $print.= "<tr>";
    $print.= "<td>Batch</td>";
    $print.= "<td>Amount</td>";

    $print.= "</tr>";


    $print.= "<tr>";
    $print.= "<td> <h3>" . $payment->enrollments->batches->name .  "</h3> </td>";
    $print.= "<td> <h3>" . $payment->amount . "</h3> </td>";
    $print.= "</tr>";


    $print.= "</table>";
    $print.= "<hr/>";


    $print.= "<span> Printed By: <b>". Auth::user()->name .  "</b> </span>";
    $print.= "<span> Printed Date: <b>". date('Y-m-d') .  "</b> </span>";

    $print.= "</div>";
    $pdf->loadHTML($print);
    return $pdf->stream();
    }
}
