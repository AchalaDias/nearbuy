<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Helmesvs\Notify\Facades\Notify;
use App\Vendor;
use Auth;

class VendorProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the Vendor Profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role_id != 3) {
            return view('admin.admin-home');
        }
        $vendor = Vendor::where('auth_id', '=', Auth::user()->id)->first();
        if(!$vendor) {
            Vendor::create([
                'name' => '',
                'web_url' => '',
                'image' => '/img/admin/vendor.png',
                'contact_no' => '',
                'auth_id' => Auth::user()->id
            ]);
        }
        $vendor = Vendor::where('auth_id', '=', Auth::user()->id)->first();
        return view('vendor.profile')->with(compact('vendor'));
    }

    /**
     * update the Vendor Profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        $vendor = Vendor::where('auth_id', '=', Auth::user()->id)->first();
        // Validate the form data
        $validator = $this->validate($request, [
            'name' => 'required',
            'image' => 'required|base64mimes:jpeg,jpg,png|base64max:5000',
        ]);

        $data = $request->all();
        Vendor::whereId($vendor->id)->update($request->except(['auth_id']));
        Notify::info('Profile Saved Successfully !', $title = null, $options = []);
        return view('home');
    }
}
