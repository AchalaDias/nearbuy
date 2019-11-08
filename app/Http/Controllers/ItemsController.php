<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Helmesvs\Notify\Facades\Notify;
use App\Item;
use App\Category;
use App\Wishlist;

class ItemsController extends Controller
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
     * Show the items.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2) {
            $items = Item::get();
        } else {
            $items = Item::where('user_id','=',Auth::user()->id)->get();
        }
        return view('admin.items.list')->with(compact('items'));
    }

    /**
     * Loard  items creation form.
     *
     * @return \Illuminate\Http\Response
     */
    public function loardForm() 
    {
        $main_categories = Category::where('parent', 0)->orderBy('id', 'asc')->get();
        $sub_categories = Category::where('parent', '!=', 0)->orderBy('id', 'asc')->get();

        return view('admin.items.create')
        ->with(compact('main_categories'))
        ->with(compact('sub_categories'));
    }

    /**
     * Create  Item.
     *
     * @return \Illuminate\Http\Response
     */
    public function createItem(Request $request) 
    {
        // Validate the form data
        $validator = $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'promo_start' => 'required',
            'promo_until' => 'required',
            'status' => 'required',
            'image' => 'required|base64mimes:jpeg,jpg|base64max:5000',
        ]);
      
        $data = $request->all();
        $item = Item::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'category_id' => $data['category_id'],
            'promo_start' => $data['promo_start'],
            'promo_until' => $data['promo_until'],
            'status' => $data['status'],
            'image' => $data['image'],
            'user_id' => Auth::user()->id
        ]);

        Notify::success('Item Created Successfully !' . $item->id, $title = null, $options = []);
        return response()->json(['msg'=> 'success', 'redirect' => route('admin.items') ]);    
    }

    /**
     * loard data for edit Item.
     *
     * @return \Illuminate\Http\Response
     */
    public function editItem(Request $request) {    
        if(is_null($request->id)){
            Notify::error('Invalid Item Id ', $title = null, $options = []);
            return redirect()->intended(route('admin.items'));
        }
        
        $main_categories = Category::where('parent', 0)->orderBy('id', 'asc')->get();
        $sub_categories = Category::where('parent', '!=', 0)->orderBy('id', 'asc')->get();
        $item = Item::find($request->id);

        return view('admin.items.edit')
        ->with(compact('main_categories'))
        ->with(compact('sub_categories'))
        ->with(compact('item'));
    }

    /**
     * save edited data in Item.
     *
     * @return \Illuminate\Http\Response
     */
    public function saveEdit(Request $request) {    
        // Validate the form data
        $validator = $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'promo_start' => 'required',
            'promo_until' => 'required',
            'status' => 'required',
            'image' => 'required|base64mimes:jpeg,jpg|base64max:5000',
        ]);

        $data = $request->all();
        Item::whereId($data['id'])->update($request->except([]));

        Notify::info('Item Updated Successfully !', $title = null, $options = []);
        return response()->json(['msg'=> 'success', 'redirect' => route('admin.items') ]);
    }

    /**
     * Delete item.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request) {

        if(is_null($request->item_id)){
            Notify::error('Invalid Item Id ', $title = null, $options = []);
            return redirect()->intended(route('admin.users'));
        }
        $item = Item::find($request->item_id);
        $item->delete();

        $witems = Wishlist::where("item_id", $request->item_id);
        $witems->delete();

        Notify::info('Item Deleted Successfully !', $title = null, $options = []);
        return redirect()->intended(route('admin.items'));
    }

}
