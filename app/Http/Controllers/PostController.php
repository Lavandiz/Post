<?php

namespace App\Http\Controllers;

use App\Interfaces\PostsRepositoryInterface;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{

    private PostsRepositoryInterface $post;

    public function __construct(PostsRepositoryInterface $post) 
    {
        $this->post = $post;
        $this->middleware(['auth']);
    }

    public function index(){
        
        $ps = new PostService($this->post);

        return  view('post.index',[
            "posts" =>$ps->GetPosts(5)
        ]);
        


    }

    public function store(Request $request){

        $ps = new PostService($this->post);

        return $ps->SavePost($request);

    }

    public function destroy(Post $post){
        $this->authorize('delete',$post);
       
            $post->delete();
        
      
        return back();
    }
}
