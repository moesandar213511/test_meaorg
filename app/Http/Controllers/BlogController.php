<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\CustomClass\BlogData;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.site_admin.admin.blog')->with([
            'url'=>'blog'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $photo = $request->file('photo');
        $photo_name = uniqid() . '_' . $photo->getClientOriginalName();
        $photo->move(public_path().'/upload/blog/', $photo_name);
        Blog::create([
            'photo' => $photo_name,
            'name' => $request->get('name'),
            'content' => $request->get('content')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $blog = Blog::orderBy('id','desc')->get();
        $arr = [];
        foreach($blog as $blog_each){
            $obj = new BlogData($blog_each->id);
            array_push($arr,$obj->getBlogData());
        }
        
        return json_encode($arr);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $obj = new BlogData($id);
        $edit_blog = $obj->getBlogData();
        return json_encode($edit_blog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->get('id');
        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            $photo_name = uniqid() .'_'. $photo->getClientOriginalName();
            $photo->move(public_path('/upload/blog/'),$photo_name);
            $blog = Blog::findOrFail($id);
            $image_path = public_path('/upload/blog/').$blog->photo;
            if(file_exists($image_path)){
                unlink($image_path);
            }
            Blog::findOrFail($id)->update([
                'photo' => $photo_name,
                'name' => $request->get('name'),
                'content' => $request->get('content')
            ]);
        }else{
            Blog::findOrFail($id)->update([
                'name' => $request->get('name'),
                'content' => $request->get('content')
            ]); 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $delete_blog = Blog::findOrFail($id);
       $image_path = public_path('/upload/blog').$delete_blog->photo;
       if(file_exists($image_path)){
           unlink($image_path);
       }
       $delete_blog->delete();
    }
}
