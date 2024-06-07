<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\UserSession;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Freezer;
use App\Models\Setting;
use App\Models\Embalmment;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Corpse;
use App\Models\BroughtInBy;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $test = 101010101201201;
        $imagePath = Storage::get('/assets/img/logo.png');
        // $qrcode = QrCode::format('png')->mergeString('https://mortuary.cloud/assets/img/logo.png', .3)->generate($test);
        $qrCodePath = public_path('qrcodes/test.png');
        $qrcode = QrCode::format('png')->size(350)->color(50, 150, 170)->generate($test, $qrCodePath);
        // $qrcode = QrCode::SMS(237673909858, '/public/qrcodes/qrcode.png');
        $staff = User::where('role', 'staff')->count(); 
        return view('home', compact('staff', 'qrcode')); 
    }


    public function profile(Request $request)
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function generateqrcode(Request $request)
    {
        $corpses = Corpse::all();
        return view('corpse.qr_code', compact('corpses'));
    }

   public function accountSetting()
    {
        return view('profile.settings');
    }

   public function settings()
    {
        $settings = Setting::pluck('value', 'key')->toArray();
        return view('settings', compact('settings'));
    }

   public function add_corpse()
    {
        // Get freezers that are not associated with any corpse or associated with a removed corpse
        $freezers = Freezer::where('status', '!=', 'maintenance')
            ->where(function($query) {
                $query->whereDoesntHave('corpses')
                      ->orWhereHas('corpses', function ($query) {
                          $query->where('status', 'Removed');
                      });
            })
            ->get();

        // Get embalments that are not associated with any corpse or associated with a removed corpse
       $embalments = Embalmment::where('status', '!=', 'maintenance')
            ->where(function($query) {
                $query->whereDoesntHave('corpses', function ($query) {
                    $query->where('status', '!=', 'Removed');
                })
                ->orWhereHas('corpses', function ($query) {
                    $query->select(DB::raw('count(*)'))
                          ->where('status', '!=', 'Removed')
                          ->groupBy('embalment_id')
                          ->havingRaw('count(*) < embalmments.capacity');
                });
            })
            ->get();

        return view('corpse.add', compact('freezers', 'embalments'));
    }

   public function freezer()
    {
        $freezer = Freezer::all(); 
        return view('storage.freezer', compact('freezer'));
    }

     public function showScanner()
    {
        return view('scan');
    }


     public function showAddStaff()
    {
        return view('staff.add');
    }

     public function showAllStaff()
    {
        $staffs = User::where('role', 'staff')->get();
        return view('staff.all', compact('staffs'));
    }

   public function allCorpse()
{
    $allCorpse = Corpse::with(['embalmment', 'freezer'])->get(); 
    return view('corpse.all_corpse', compact('allCorpse'));
}


   public function availableCorpse()
    {
        $availableCorpse = Corpse::where('status', 'available')->with(['freezer', 'embalmment'])->get();
        return view('corpse.present_corpse', compact('availableCorpse'));
    }

   public function missingCorpse()
    {
        $missingCorpse = Corpse::where('status', 'missing')->with(['freezer', 'embalmment'])->get();
        return view('corpse.missing_corpse', compact('missingCorpse'));
    }


   public function removedCorpse()
    {
        $removedCorpse =Corpse::where('status', 'removed')->get();
        return view('corpse.removed_corpse', compact('removedCorpse'));
    }


   public function autopsyCorpse()
    {
        $autopsyCorpse =Corpse::where('status', 'autopsy')->with(['freezer', 'embalmment'])->get();
        return view('corpse.autopsy', compact('autopsyCorpse'));
    }

   public function embalm()
    {
        $embalment = Embalmment::all(); 
        return view('storage.embalm', compact('embalment'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phoneNumber' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:800', // Validate photo upload
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phoneNumber = $request->input('phoneNumber');
        $user->address = $request->input('address');
        $user->region = $request->input('region');
        $user->country = $request->input('country');

        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($user->photo) {
                Storage::delete($user->photo);
            }

            // Store new photo
            $path = $request->file('photo')->store('photos', 'public');
            $user->photo = $path;
        }

        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        // Check if the current password matches the one in the database
        if (Hash::check($request->current_password, $user->password)) {
            // Update the password
            $user->update([
                'password' => Hash::make($request->new_password),
            ]);

            return redirect()->route('home')->with('success', 'Password updated successfully.');
        } else {
            return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        // Create a new Freezer instance and save it to the database
        Freezer::create([
            'name' => $request->input('name'),
            'location' => $request->input('location'),
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Freezer added successfully!');
    }

    public function storeembalments(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'capacity' => 'required|int|max:255',
        ]);

        // Create a new Freezer instance and save it to the database
        Embalmment::create([
            'name' => $request->input('name'),
            'location' => $request->input('location'),
            'capacity' => $request->input('capacity'),
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Embalmment added successfully!');
    }

    public function updatefreezer(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'location' => 'required|string|max:255',
        'status' => 'required|string|in:active,inactive,maintenance',
    ]);

    $freezer = Freezer::findOrFail($id);
    $freezer->name = $request->input('name');
    $freezer->location = $request->input('location');
    $freezer->status = $request->input('status');
    $freezer->save();

    return redirect()->back()->with('success', 'Freezer updated successfully.');
}

    public function updateembalments(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'location' => 'required|string|max:255',
        'capacity' => 'required|int|max:255',
        'status' => 'required|string|in:available,in-use,maintenance',
    ]);

    $embalm = Embalmment::findOrFail($id);
    $embalm->name = $request->input('name');
    $embalm->location = $request->input('location');

 $corpseCount = Corpse::where('embalment_id', $id)
                             ->where('status', 'available')
                             ->count();
    // Check if capacity is being decreased
    if ($request->input('capacity') < $embalm->capacity) {
        // Check if the number of associated corpses exceeds the new capacity
       
        if ($corpseCount > $request->input('capacity')) {
            return redirect()->back()->with('error', 'Cannot decrease capacity. Number of associated corpses exceeds the new capacity.');
        }
    }

    // Update status to "in-use" if capacity is equal to the count of available corpses
    if ($request->input('capacity') == $corpseCount) {
        $embalm->status = 'in-use';
    } else {
        $embalm->status = $request->input('status');
    }

    $embalm->capacity = $request->input('capacity');
    $embalm->save();

    return redirect()->back()->with('success', 'Embalmment updated successfully.');
}


    public function addCorpse(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'corpse_name' => 'required|string|max:255',
        'cause_of_death' => 'required|string|max:255',
        'relative_number' => 'required|string|max:255',
        'country' => 'required|string|max:255',
        'identified' => 'required|boolean',
        'removal_date' => 'required|date',
        'embalment_id' => 'nullable|integer|exists:embalmments,id',
        'freezer_id' => 'nullable|integer|exists:freezers,id',
        'brought_in_by_name' => 'required|string|max:255',
        'brought_in_by_relationship' => 'required|string|max:255',
        'brought_in_by_from' => 'required|string|max:255',
    ]);

    try {
        // Create the brought_in_by record
        $broughtInBy = new BroughtInBy();
        $broughtInBy->name = $request->input('brought_in_by_name');
        $broughtInBy->relationship = $request->input('brought_in_by_relationship');
        $broughtInBy->from = $request->input('brought_in_by_from');
        $broughtInBy->save();

        // Generate a unique QR code
        $qrCode = $this->generateUniqueQrCode();

        // Create the corpse record
        $corpse = new Corpse();
        $corpse->name = $request->input('corpse_name');
        $corpse->brought_by_id = $broughtInBy->id;
        $corpse->cause_of_death = $request->input('cause_of_death');
        $corpse->relative_number = $request->input('relative_number');
        $corpse->country = $request->input('country');
        $corpse->identified = $request->input('identified');
        $corpse->qr_code = $qrCode;
        $corpse->removal_date = $request->input('removal_date');
        $corpse->embalment_id = $request->input('embalment_id');
        $corpse->freezer_id = $request->input('freezer_id');
        $corpse->save();

        // Update Freezer status if freezer_id is provided
        if ($request->filled('freezer_id')) {
            $freezer = Freezer::find($request->input('freezer_id'));
            if ($freezer) {
                $freezer->status = 'inactive';
                $freezer->save();
            }
        }

        // Update Embalment status if embalment_id is provided
        if ($request->filled('embalment_id')) {
            $embalment = Embalmment::find($request->input('embalment_id'));
            if ($embalment) {
                // Check the number of corpses in the embalment
                $corpseCount = $embalment->corpses()->where('status', '!=', 'Removed')->count();
                if ($corpseCount >= $embalment->capacity) {
                    $embalment->status = 'in-use';
                    $embalment->save();
                }
            }
        }

        // Return a successful response
        return redirect()->back()->with('success', 'Corpse Enrolled successfully.');
    } catch (\Exception $e) {
        // Return an error response
        return response()->json(['message' => 'Failed to create records.', 'error' => $e->getMessage()], 500);
    }
}


    /**
     * Generate a unique 8-character QR code.
     *
     * @return string
     */
    private function generateUniqueQrCode()
    {
        do {
            $qrCode = Str::random(8);
        } while (Corpse::where('qr_code', $qrCode)->exists());

        return $qrCode;
    }

    public function savesetting(Request $request)
    {
       $request->validate([
            'freezers' => 'required|integer|min:0',
            'embalment_room' => 'required|integer|min:0',
        ]);

        $this->updateOrCreateSetting('freezers', $request->input('freezers', 0));
        $this->updateOrCreateSetting('embalment_room', $request->input('embalment_room', 0));

        return redirect()->back()->with('success', 'Settings saved successfully.');
    }

    private function updateOrCreateSetting($key, $value)
    {
        Setting::updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );
    }

     public function qrCode(Request $request)
    {
        $request->validate([
            'corpse' => 'required|exists:corpses,id',
        ]);

        $corpse = Corpse::find($request->corpse);
        $corpses = Corpse::all(); // Fetch all corpses for the form dropdown

        if ($corpse) {
            $qrCodePath = 'qrcodes/' . $corpse->qr_code . '.png';
            QrCode::format('png')
                ->size(350)
                // ->merge('/public/assets/img/logo.png', .3)
                ->color(50, 150, 170)
                ->generate($corpse->qr_code, public_path($qrCodePath));

            return view('corpse.qr_code', [
                'corpses' => $corpses,
                'selectedCorpse' => $corpse,
                'qrCodePath' => $qrCodePath,
            ]);
        }

        return redirect()->back()->with('error', 'Invalid corpse selected.');
    }

       public function corpseProfile($qr_code)
    {
        // Retrieve the corpse by qr_code
        $corpse = Corpse::where('qr_code', $qr_code)->with('broughtBy')->first();
        
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
        return view('profile.corpse', compact('corpse', 'broughtBy', 'qrCodePath', 'storageType', 'freezers', 'embalments'));
    }


   public function updateCorpse(Request $request, $qr_code)
{
    // Retrieve the corpse by qr_code
    $corpse = Corpse::where('qr_code', $qr_code)->first();
    
    if (!$corpse) {
        return redirect()->back()->with('error', 'No corpse found with this QR code.');
    }

    // Validate the incoming request data
    $request->validate([
        'name' => 'required|string|max:255',
        'country' => 'required|string|max:255',
        'status' => 'required|string|in:available,autopsy,removed,missing',
        'bill' => 'required|numeric',
        'identified' => 'required|boolean',
        'paid' => 'required|boolean',
        'removal_date' => 'nullable|date',
        'cause_of_death' => 'nullable|string|max:255',
        'storage_type' => 'required|string|in:Freezer,Embalment',
        'freezer_id' => 'nullable|integer|exists:freezers,id',
        'embalment_id' => 'nullable|integer|exists:embalmments,id',
        'brought_by_name' => 'required|string|max:255',
        'from' => 'required|string|max:255',
        'relationship' => 'required|string|max:255',
        'relative_number' => 'required|string|max:15',
    ]);

    // Start a transaction
    DB::beginTransaction();

    try {
        // Update corpse details
        $corpse->update([
            'name' => $request->input('name'),
            'country' => $request->input('country'),
            'status' => $request->input('status'),
            'bill' => $request->input('bill'),
            'identified' => $request->input('identified'),
            'paid' => $request->input('paid'),
            'removal_date' => $request->input('removal_date'),
            'cause_of_death' => $request->input('cause_of_death'),
            'relative_number' => $request->input('relative_number'),
        ]);

        // Update BoughtInBy details
        $broughtBy = BroughtInBy::where('id', $corpse->brought_by_id)->first();
        if ($broughtBy) {
            $broughtBy->update([
                'name' => $request->input('brought_by_name'),
                'from' => $request->input('from'),
                'relationship' => $request->input('relationship'),
            ]);
        }

        // Update storage details
        $storageType = $request->input('storage_type');
        $freezerId = $request->input('freezer_id');
        $embalmentId = $request->input('embalment_id');

        if ($storageType === 'Freezer') {
            // Update Freezer table
            if ($corpse->freezer_id) {
                Freezer::where('id', $corpse->freezer_id)->update(['status' => 'active']);
            }
            $corpse->freezer_id = $freezerId;
            $corpse->embalment_id = null;
            Freezer::where('id', $freezerId)->update(['status' => 'inactive']);
        } elseif ($storageType === 'Embalment') {
            // Update Embalmment table
            if ($corpse->embalment_id) {
                Embalmment::where('id', $corpse->embalment_id)->update(['status' => 'available']);
            }
            $corpse->embalment_id = $embalmentId;
            $corpse->freezer_id = null;
            Embalmment::where('id', $embalmentId)->update(['status' => 'in-use']);
        }

        $corpse->save();

        // Commit the transaction
        DB::commit();

        return redirect()->back()->with('success', 'Corpse details updated successfully.');
    } catch (\Exception $e) {
        // Rollback the transaction in case of an exception
        DB::rollBack();

        // Log the error or handle it appropriately
        \Log::error('Error updating corpse: '.$e->getMessage());

        return redirect()->back()->with('error', 'An error occurred while updating corpse details. Please try again.');
    }
}

    public function addStaff(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'email' => 'required|email|unique:users',
            'phoneNumber' => 'required',
            'country' => 'required',
            'region' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        // Create a new user
        $user = new User();
        $user->name = $request->input('name');
        $user->address = $request->input('address');
        $user->email = $request->input('email');
        $user->phoneNumber = $request->input('phoneNumber');
        $user->country = $request->input('country');
        $user->region = $request->input('region');
        $user->password = Hash::make($request->input('password'));
        $user->role = 'staff'; 
        $user->save();

        // Redirect back or wherever you prefer
        return redirect()->route('showAllStaff')->with('success', 'Staff added successfully!');
    }

     public function updateStaff(Request $request, User $staffs)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phoneNumber' => 'required',
            'email' => 'required',
        ]);

        $staffs->update([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'phoneNumber' => $request->input('phoneNumber'),
            'email' => $request->input('email'),
        ]);

        return redirect()->route('showAllStaff')->with('success', 'Staff updated successfully!');
    }
    

}
