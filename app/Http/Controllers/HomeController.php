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
        $freezers = Freezer::all();
        $embalments = Embalmment::all();
        return view('corpse.add', compact('freezers', 'embalments'));
    }

   public function freezer()
    {
        $freezer = Freezer::all(); 
        return view('storage.freezer', compact('freezer'));
    }

   public function allCorpse()
    {
        $allCorpse = Corpse::all(); 
        return view('corpse.all_corpse', compact('allCorpse'));
    }

   public function availableCorpse()
    {
        $availableCorpse = Corpse::where('status', 'available')->get();
        return view('corpse.present_corpse', compact('availableCorpse'));
    }

   public function missingCorpse()
    {
        $missingCorpse = Corpse::where('status', 'missing')->get();
        return view('corpse.missing_corpse', compact('missingCorpse'));
    }


   public function removedCorpse()
    {
        $removedCorpse =Corpse::where('status', 'removed')->get();
        return view('corpse.removed_corpse', compact('removedCorpse'));
    }


   public function autopsyCorpse()
    {
        $autopsyCorpse =Corpse::where('status', 'autopsy')->get();
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
    $embalm->capacity = $request->input('capacity');
    $embalm->status = $request->input('status');
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

        return redirect()->back()->withErrors(['corpse' => 'Invalid corpse selected.']);
    }

}
