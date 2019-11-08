<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wishlist;
use Auth;
use DB;

class WishlistController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    /**
     * Add item to wishlist.
     *
     * @return void
     */
    public function add(Request $request) {
        if(is_null($request->item_id)){
            return redirect()->intended(route('home'));
        }

        $data =  Wishlist::where('item_id', $request->item_id)->where('user_id', Auth::user()->id)->get();
        if(sizeof($data) == 0) {
            Wishlist::create([
                'item_id' => $request->item_id,
                'user_id' => Auth::user()->id
            ]);
        }
        
        return redirect()->back();

    }

    /**
     * get count of wishlist.
     *
     * @return void
     */
    public function getCount(Request $request) {

        $count = Wishlist::where('user_id', Auth::user()->id)->get()->count();

        return response()->json(['msg'=> 'success', 'count' => $count ]);
    }

    /**
     * get list of items.
     *
     * @return void
     */
    public function list(Request $request) {

        $items = DB::select("SELECT * FROM newbuy.wishlists w, newbuy.items i where w.item_id = i.id and w.user_id = ".Auth::user()->id);

        return view('wish-list')
                ->with(compact('items'));
    }

    /**
     * delete list of items.
     *
     * @return void
     */
    public function delete(Request $request) {

        if(is_null($request->id)){
            return redirect()->back();
        }

        $item = Wishlist::where("item_id", $request->id)->where("user_id", Auth::user()->id);
        $item->delete();

        return redirect()->intended(route('web.wishlist.list'));
    }

}
