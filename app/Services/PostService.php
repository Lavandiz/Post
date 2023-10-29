<?php

namespace App\Services;
use App\Interfaces\PostsRepositoryInterface;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class PostService{
    use  ValidatesRequests;
    private PostsRepositoryInterface $post;

    public function __construct(PostsRepositoryInterface $post) //dependency injection
    {
        $this->post = $post;
    }

    public function SavePost(Request $request){

        $this->PostValidate($request); // validate the post request 
        $this->post->SavePost($request); // if validation is succesffull save the request
        
        return back(); //go back
      
    }

    public function PostValidate(Request $request){ //validate the post request

        return $this->validate($request,[
             "body"=>"required"
         ]);
 
         
     }

     public function GetPosts(int $page){ // get the posts by paginate count

      return $this->post->GetPosts($page);

     }

}


?>