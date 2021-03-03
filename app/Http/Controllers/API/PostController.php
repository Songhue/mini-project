<?php

namespace App\Http\Controllers\API;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    function createPost(Request $request)
    {
        // Validator::validate([
        //     'title' => 'required|max:50',
        //     'content'=>'required|max:50'

        // ]);
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = $request->user_id;
        
        $post->save();
        $categories = $request->get('categories');
        $post->categories()->attach($categories);

        if($post != null)
        {
            return response()->json([
                'status' => true,
                'post' => $post
            ]);
        }else
        {
            return response()->json([
                'status' => false,
                'post' => null
            ]);

        }
    }

    function getAllPosts()
    {
        $posts = Post::all();
        foreach($posts as $post){
            $post->user;
        }
        return response()->json([
            'status' => true,
            'data' => $posts
        ]);
    }


    function getPostsByPagination(Request $request)
    {
        $posts = Post::paginate($request->limit);
        return response()->json([
            'status' => true,
            'data' => $posts
        ]);
    }

    function getPostById($id)
    {
        $post = Post::find($id);
        // $post->user = $post->user;
        // $post->user;
        if($post !=null){
            $post->user;
             return response()->json([
            'status' => true,
            'data' => $post
        ]);
        }else{
            return response()->json([
                'status'=>false,
                'data'=>null
            ]);
        }
    }

    function deletePost($id)
    {
        $post = Post::find($id);
        $post->delete();
        if($post != null)
        {
            $post->delete();
            return response()->json([
                'status' => true,
                'data' => $post
            ], 200);
        }else
        {
            return response()->json([
                'status' => false,
                'data' => null
            ], 404);
            
        }

    }
    
}
