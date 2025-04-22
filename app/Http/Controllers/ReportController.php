<?php

namespace App\Http\Controllers;

use App\Models\report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    
    public function create(Request $request)
    {
        dd('chi haja');
        // Validate the request data
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'annonce_id' => 'required|exists:annonces,id',
            'message' => 'required|string|max:255',
        ]);

        // Create a new report
        $report = new report();
        $report->user_id = $validatedData['user_id'];
        $report->annonce_id = $validatedData['annonce_id'];
        $report->message = $validatedData['message'];
        $report->save();

        return redirect()->back()->with('success', 'Report created successfully.');
    }
}
