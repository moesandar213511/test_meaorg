<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Company;
use App\Company_Gallery;
use App\CustomClass\CategoryData;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.site_admin.admin.category')->with([
            'url' => 'category'
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
        $logo = $request->file('logo');
        $logo_name = uniqid() ."_". $logo->getClientOriginalName();
        $logo->move(public_path('/upload/category/'),$logo_name);
        
        Category::create([
            'logo' => $logo_name,
            'name' => $request->get('name')
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
        $category = Category::all();
        $arr = [];
        foreach($category as $cat_each){
            $obj = new CategoryData($cat_each->id);
            array_push($arr,$obj->getCatData());
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
       $obj = new CategoryData($id);
       return json_encode($obj->getCatData());
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
        if($request->hasFile('logo')){
            $logo = $request->file('logo');
            $logo_name = uniqid() ."_". $logo->getClientOriginalName();
            $logo->move(public_path("/upload/category/"),$logo_name);
            $cat = Category::findOrFail($id);
            $image_path = public_path("/upload/category/").$cat->logo;
            if($image_path){
                unlink($image_path);
            }
            Category::findOrFail($id)->update([
                'logo' => $logo_name,
                'name' => $request->get('name')
            ]);
        }else{
            Category::findOrFail($id)->update([
                'name' => $request->get('name')
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
        $data = Category::findOrFail($id);
        $image_path=public_path().'/upload/category/'.$data->logo;
        if(file_exists($image_path)){
            unlink($image_path);
        }
        $data->delete();

        $companies = Company::where('category_id',$id)->get();
        foreach($companies as $com_data){
            $image_path=public_path().'/upload/company_logo/'.$com_data->logo;
            if(file_exists($image_path)){
                unlink($image_path);
            }
            $com_data->delete();
            $gallery = Company_Gallery::where('company_id',$com_data['id'])->get();
            foreach($gallery as $data){
            $image_path1=public_path().'/upload/company_gallery/'.$data->photos;
            if(file_exists($image_path1)){
                unlink($image_path1);
            }
            $data->delete();

            }
        }


    }

    public function count_company($id){
        $total = Company::where('category_id',$id)->get();
        return json_encode(count($total));
    }
}
