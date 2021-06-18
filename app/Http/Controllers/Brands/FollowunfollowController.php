<?php

namespace App\Http\Controllers\Brands;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\FollowController;

class FollowunfollowController extends Controller
{
    public function __construct() {
        $this->middleware('role:brand');
      }
      

    public function followuser(Request $request)
    {
    	\DB::table('user_follower')->insert([
            'following_id' => $request->following_id, //This Code coming from ajax request
            'follower_id' => Auth::user()->id, //This Chief coming from ajax request
        ]);

        return response()->json(
            [
                'success' => true,
                'message' => 'Data inserted successfully'
            ]
        );
    }
}
