<?php
namespace App\Repositories;
use App\Interfaces\PostsRepositoryInterface;
use App\Models\Post;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;


class PostRepository implements PostsRepositoryInterface{
    use  ValidatesRequests;

    public function SavePost(Request $request){

       return  $request->user()->posts()->create($request->only('body'));

    }
    public function GetPosts(int $page){
        $posts = Post::orderBy('created_at','desc')->paginate($page);
        //Post::with(['user','likes'])->paginate($page); for efficency
        return $posts;
    }

}



?>