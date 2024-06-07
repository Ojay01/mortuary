<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QRCodeController extends Controller
{
    public function showScanner()
    {
        return view('scan');
    }

    public function handleScanResult(Request $request)
    {
        $code = $request->input('code');
        // Process the scanned code
        // For example, you could save it to the database or perform some action
        return response()->json(['success' => true, 'code' => $code]);
    }
}
