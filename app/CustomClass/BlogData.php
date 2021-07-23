<?php

namespace App\CustomClass;

use App\Blog;
use App\CustomClass\Path;

class BlogData{

    private $blog_data;

    function __construct($blog_id){
        $blogs = Blog::findOrFail($blog_id);
        $this->setBlogData($blogs);
    }

    public function getBlogData(){
        $this->blog_data['photo_url'] = Path::$domain_url.'upload/blog/'.$this->blog_data['photo'];
        
        return $this->blog_data;
    } 

    public static function getAllBlog($all_blogs){
        $arr = [];
        foreach($all_blogs as $data){
            $obj = new BlogData($data->id);
            array_push($arr,$obj->getBlogData());
        }
        return $arr;
    }


    public static function getLatestBlog($count){
        $blogs = Blog::orderBy('id','desc')->paginate($count);
        // $datas = Blog::orderBy('id', 'DESC')->take($count)->get();
        $arr = [];
        foreach($blogs as $data){
            $obj = new BlogData($data->id);
            array_push($arr,$obj->getBlogData());
        }
        return $arr;
    }


    
    private function setBlogData($blog_data){
        $this->blog_data = $blog_data;
    }
}