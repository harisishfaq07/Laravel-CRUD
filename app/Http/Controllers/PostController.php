<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
        public function index() {
            $posts = Post::all();
            $count = count($posts);
             return \View::make('posts.index', compact('posts', 'count'));
         } #index

        // public function create() {
        //     // dump();
        // }

        public function new() {            
             return \View::make('posts.new');
        } #new
            
        public function store(Request $request)
                {
                    $request->validate([
                        'title' => 'required',
                        'description' => 'required',
                        'password' => 'required'
                    ]);
               
                    Post::create($request->all());
                    // return redirect()->back()->with(['success' => 'Thank you for contacting us. We will get back to you shortly.']);
                    return Redirect::to('/posts')->with(['success' => 'Post created successfully!']);

                } #store
        // public function show($id)
        //         {
        //             // Read - Display a single item
        //         }

        public function edit($id)
                {

                    $post = Post::find($id);
                    return \View::make('posts.edit', compact('post'));
                    // return redirect()->back()->with(['success' => 'Editied']);
                } #edit

        public function update(Request $request, $id)
                {
                    $request->validate([
                        'title' => 'required',
                        'description' => 'required',
                        'password' => 'required'
                    ]);

                    return redirect()->back()->with(['success' => 'updated']);
                } #update

        public function updatepost(Request $request, $id)
                {
                    $request->validate([
                        'title' => 'required',
                        'description' => 'required',
                        'password' => 'required'
                    ]);
            
                    $post = Post::find($id);
            
                    if ($post) {
                        $post->update($request->all());
                        return redirect()->back()->with(['success' => 'Post updated successfullt']);
                    } else {
                        // Redirect back with an error message if the post is not found
                        return redirect()->back()->with(['error' => 'Post not found']);
                    }
                } #updatepost

        public function destroy($id)
                {
                    $post = Post::find($id);
                    $post->delete();
                    return redirect()->back()->with(['success' => 'Deleted']);
                } #destroy

}
