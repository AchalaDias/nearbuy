<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Helmesvs\Notify\Facades\Notify;
use App\Admin;
use App\Role;

class UsersController extends Controller
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
     * Show the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Admin::get();
        return view('admin.users.list')->with(compact('users'));
    }

    /**
     * Loard  users creation form.
     *
     * @return \Illuminate\Http\Response
     */
    public function loardForm() 
    {
        $roles = Role::get();
        return view('admin.users.create')->with(compact('roles'));
    }

    /**
     * Create  user.
     *
     * @return \Illuminate\Http\Response
     */
    public function createUser(Request $request) 
    {
        // Validate the form data
        $validator = $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'email' => 'required|unique:admins',
            'role' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);
        
        $data = $request->all();
        Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => $data['role']
        ]);
        
        Notify::success('User Created Successfully !', $title = null, $options = []);
        return redirect()->intended(route('admin.users'));

        // $notification = array(
        //     'message' => 'User Created Successfully !',
        //     'alert_type' => 'success'
        // );

        // $users = Admin::get();
        // Notify::info('User Created Successfully !', $title = null, $options = []);
        // return view('admin.users.list')
        //         ->with(compact('users'))
        //         ->with(compact('notification'));
        
    }

     /**
     * Loard  specific user by id.
     *
     * @return \Illuminate\Http\Response
     */
    public function loardEdit(Request $request) {

        if(is_null($request->id)){
            Notify::error('Invalid User Id ', $title = null, $options = []);
            return redirect()->intended(route('admin.users'));
        }
        
        $roles = Role::get();
        $user = Admin::find($request->id);
        return view('admin.users.edit')
                ->with(compact('user'))
                ->with(compact('roles'));
    }

    /**
     * Save Edited Data.
     *
     * @return \Illuminate\Http\Response
     */
    public function saveEdit(Request $request) {

        // Validate the form data
        $validator = $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'role_id' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);
        $data = $request->all();
        Admin::whereId($data['id'])->update($request->except(['password_confirmation','_token']));

        Notify::info('User Updated Successfully !', $title = null, $options = []);
        return redirect()->intended(route('admin.users'));
    }

     /**
     * Delete user.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request) {

        if(is_null($request->item_id)){
            Notify::error('Invalid User Id ', $title = null, $options = []);
            return redirect()->intended(route('admin.users'));
        }
        $user = Admin::find($request->item_id);
        $user->delete();

        Notify::info('User Deleted Successfully !', $title = null, $options = []);
        return redirect()->intended(route('admin.users'));
    }
    

}
