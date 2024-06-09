<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Freezer;
use App\Models\Setting;
use App\Models\Embalmment;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Corpse;
use App\Models\BroughtInBy;

class QRCodeController extends Controller
{
    public function enterQrCode()
    {
        return view('track.code');
    }

    public function scanQrCode()
    {
        return view('track.scan'); 
    }

    public function scanmyCorpseProfile($qr_code)
    {
        // Retrieve the corpse by qr_code
         $corpse = Corpse::whereRaw('BINARY `qr_code` = ?', [$qr_code])->with('broughtBy')->first();
        
        if (!$corpse) {
            return redirect()->back()->with('error', 'No corpse found with this QR code.');
        }

        // Check if the QR code image exists
        $qrCodePath = 'qrcodes/' . $corpse->qr_code . '.png';
        if (!file_exists($qrCodePath)) {
            $qrCodePath = null; // Set to null if QR code image does not exist
        }

        // Retrieve the brought_by details
        $broughtBy = $corpse->broughtBy;

        // Determine storage type
        $storageType = null;
        if ($corpse->freezer_id) {
            $storageType = 'Freezer';
        } elseif ($corpse->embalment_id) {
            $storageType = 'Embalment';
        }

        // Get available freezers and embalments (assuming you have these variables)
        $freezers = Freezer::where(function($query) use ($corpse) {
                            $query->where('status', 'active')
                                  ->orWhere('id', $corpse->freezer_id);
                        })
                        ->get();
        $embalments = Embalmment::where(function($query) use ($corpse) {
                            $query->where('status', 'available')
                                  ->orWhere('id', $corpse->embalment_id);
                        })
                        ->get();

        // Return a view with the corpse details, brought_by details, QR code image path, and storage type
        return view('track.profile', compact('corpse', 'broughtBy', 'qrCodePath', 'storageType', 'freezers', 'embalments'));
    }

    public function myCorpseProfile(Request $request)
    {
        $qr_code = $request->query('qr_code'); // Retrieve QR code from query parameters

        // Retrieve the corpse by qr_code with case-sensitive comparison
        $corpse = Corpse::whereRaw('BINARY `qr_code` = ?', [$qr_code])->with('broughtBy')->first();

        if (!$corpse) {
            return redirect()->back()->with('error', 'No corpse found with this QR code.');
        }

        // Check if the QR code image exists
        $qrCodePath = 'qrcodes/' . $corpse->qr_code . '.png';
        if (!file_exists($qrCodePath)) {
            $qrCodePath = null; // Set to null if QR code image does not exist
        }

        // Retrieve the brought_by details
        $broughtBy = $corpse->broughtBy;

        // Determine storage type
        $storageType = null;
        if ($corpse->freezer_id) {
            $storageType = 'Freezer';
        } elseif ($corpse->embalment_id) {
            $storageType = 'Embalment';
        }

        // Get available freezers and embalments
        $freezers = Freezer::where(function ($query) use ($corpse) {
            $query->where('status', 'active')
                  ->orWhere('id', $corpse->freezer_id);
        })->get();

        $embalments = Embalmment::where(function ($query) use ($corpse) {
            $query->where('status', 'available')
                  ->orWhere('id', $corpse->embalment_id);
        })->get();

        // Return a view with the corpse details, brought_by details, QR code image path, and storage type
        return view('track.profile', compact('corpse', 'broughtBy', 'qrCodePath', 'storageType', 'freezers', 'embalments'));
    }
}
