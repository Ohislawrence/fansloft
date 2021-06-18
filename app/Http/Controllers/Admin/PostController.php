<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;
use App\Models\User;
use Auth;
use Image;

class PostController extends Controller
{
    public function __construct() {
    $this->middleware('role:admin');
  }

  public function AllPost()
  {
  	$post = Post::orderBy('id', 'DESC')->get();
  	return view ('admin.post', ['post' => $post ]);
  }

  public function AddNew()
  {
  	return view ('admin.addpost');
  }

  public function AddNewPost(Request $request)
  {
  	
  $featuredimage = $request->file('featuredimage');
  $filename = time() . '.' . $featuredimage->getClientOriginalExtension();
  Image::make($featuredimage)->resize(710, 400)->save( public_path('uploads/blogs/'. $filename ) );

  	$post = new Post();
    $post->title = $request->get('title');
    $post->body = $request->get('kt-ckeditor-1');
    $post->slug = Str::slug($post->title);
    $post->image = $filename;
    $post->category = $request->get('category');

    $duplicate = Post::where('slug', $post->slug)->first();
    if ($duplicate) {
      return redirect('admin/blogs/addpost')->withErrors('Title already exists.')->withInput();
    }

    $post->user_id = Auth::user()->id;
    if ($request->has('save')) {
      $post->active = 0;
      $message = 'Post saved successfully';
    } else {
      $post->active = 1;
      $message = 'Post published successfully';
    }
    $post->save();
    return redirect('admin/blogs/addpost')->withMessage($message);
  
}

 


  public function edit(Request $request,$slug)
  {
    $post = Post::where('slug',$slug)->first();
    if($post && ($request->user()->id == $post->author_id || $request->user()->is_admin()))
      return view('posts.edit')->with('post',$post);
    return redirect('/')->withErrors('you have not sufficient permissions');
  }


  public function destroy(Request $request, $id)
  {
    //
    $post = Post::find($id);
    if($post && ($post->author_id == $request->user()->id || $request->user()->is_admin()))
    {
      $post->delete();
      $data['message'] = 'Post deleted Successfully';
    }
    else 
    {
      $data['errors'] = 'Invalid Operation. You have not sufficient permissions';
    }
    return redirect('/')->with($data);
  }

}
