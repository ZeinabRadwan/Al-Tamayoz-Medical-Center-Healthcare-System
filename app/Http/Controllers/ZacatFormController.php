<?php

namespace App\Http\Controllers;

use App\Models\ZacatForm;
use Illuminate\Http\Request;

class ZacatFormController extends Controller
{
    public function create()
    {
        return view('zacat-form.create');
    }

    public function store(Request $request)
    {
        dd('sa');
        $request->validate([
            'otp' => 'required|string',
            'tax_number' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|email',
            'organization_name' => 'required|string',
            'unit_name' => 'required|string',
        ]);

//        $pdfPaths = [];
//        if ($request->hasFile('pdf_files')) {
//            foreach ($request->file('pdf_files') as $pdf) {
//                $pdfPaths[] = $pdf->store('pdfs', 'public');
//            }
//        }
//
//        ZacatForm::create([
//            'otp' => $request->otp,
//            'tax_number' => $request->tax_number,
//            'address' => $request->address,
//            'email' => $request->email,
//            'organization_name' => $request->organization_name,
//            'unit_name' => $request->unit_name,
//            'pdf_files' => $pdfPaths,
//        ]);

        return redirect()->route('zacat-form.create')->with('success', 'Form submitted successfully!');
    }

        public function list()
    {
        $forms = ZacatForm::latest()->get();
        return view('zacat-form.index', compact('forms'));
    }
}
