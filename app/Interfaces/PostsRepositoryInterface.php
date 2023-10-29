<?php
namespace App\Interfaces;

use Illuminate\Http\Request;

interface PostsRepositoryInterface 
{
    public function SavePost(Request $request);
    public function GetPosts(int $page);

}



?>