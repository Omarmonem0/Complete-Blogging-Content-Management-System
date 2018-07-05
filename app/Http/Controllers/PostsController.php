<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.posts.index')->with("posts",Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        if($categories->count() == 0){
          Session::flash("info","There is no categories add one fist");
          return view('admin.categories.create');
        }
        else
        return view('admin.posts.create')->with('categories',$categories)
            ->with("tags",Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $this->validate($request,[
           'title' =>'required',
           'featured'=>'required|image',
           'body' => 'required',
            'category_id' =>"required",
            'tags' =>"required"
        ]);
        $featured = $request->featured;
        $new_featured_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts',$new_featured_name);

        $post = Post::create([
           "title" => $request->title,
           "content" => $request->body,
           "category_id"=> $request->category_id,
           "featured" => "uploads/posts/" .$new_featured_name,
            "slug"=>str_slug($request->title)
        ]);

        $post->tags()->attach($request->tags);
        Session::flash("success","New post stored successfully");

        return redirect()->route("home");


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $categories = Category::all();
        $post = Post::find($id);
        return view('admin.posts.edit')->with('categories',$categories)
                                            ->with('post',$post)
                                            ->with('tags',Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
           'title'=> 'required',
            'body'=>'required',
            'category_id'=>'required'
        ]);
        $post = Post::find($id);
        if ($request->hasFile('featured')){

            $featured = $request->featured;
            $new_featured_name = time().$featured->getClientOriginalName();
            $featured->move('uploads/posts',$new_featured_name);
            $post->featured = 'uploads/posts/'.$new_featured_name;
        }
        $post->title = $request->title;
        $post->content = $request->body;
        $post->category_id = $request->category_id;
        $post->save();
        Session::flash('success','Post updated successfully');
        return redirect()->route('post');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post=Post::find($id);
        $post->delete();
        Session::flash('success',"Post trashed successfully");
        return redirect()->back();

    }

    /**
     *  Display a listing of trashed resources.
     * @return \Illuminate\Http\Response
     */
    public function trash(){
        $posts = Post::onlyTrashed()->get();
        return view ('admin.posts.trash')->with('posts',$posts);
    }
    /**
     * Destroy the specified trashed resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

   public function kill($id){
       $post = Post::withTrashed()->where('id',$id)->first();
       $post->forceDelete();
       Session::flash('success',"Post deleted permanently");

       return redirect()->back();
   }
    /**
     * Restore the specified trashed resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function restore($id){
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        Session::flash('success',"Post restored successfully");

        return redirect()->back();
    }
}
