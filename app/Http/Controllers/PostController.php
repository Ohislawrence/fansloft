<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;
use App\Models\User;
use Auth;
use Illuminate\Pagination\LengthAwarePaginator;


class PostController extends Controller
{
    public function AllPost()
  {
  	$posts = Post::where('active','1')->orderBy('created_at','desc')->paginate(8);
    $latestpost = Post::orderBy('created_at', 'desc')->take(3)->get();
  	return view ('blogs', ['posts' => $posts, 'latestpost' => $latestpost ]);
  }

  public function ViewPost($slug)
  {
  	$post = Post::where('slug',$slug)->first();
  	$latestpost = Post::orderBy('created_at', 'desc')->take(3)->get();
  	//$fb = Share::currentPage()->facebook();
  	return view('singlepost', ['latestpost' => $latestpost ])->withPost($post);
  }
}
