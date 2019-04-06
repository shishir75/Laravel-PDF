<?php

namespace App\Http\Controllers;

use App\employee;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::latest()->get();

        return view('pdf.details', compact('employees'));
    }

    public function download()
    {
        $employees = Employee::latest()->get();
        $pdf = PDF::loadView('pdf.invoice', ['employees'=>$employees]);
        return $pdf->download('invoice.pdf', $pdf);
    }
}
