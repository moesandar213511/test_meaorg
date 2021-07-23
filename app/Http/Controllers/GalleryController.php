<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use App\CustomClass\Path;

class GalleryController extends Controller
{
    function index(){
        return view('admin.site_admin.admin.admin_gallery')->with([
            'url' => 'gallery'
        ]);
    }
    public function insert_photo(Request $request){
        $photo = $request->file('photo');
        $photo_name = uniqid() ."_". $photo->getClientOriginalName();
        $photo->move(public_path('/upload/gallery/'),$photo_name);
        Gallery::create([
            'photo' => $photo_name,
            'name' => $request->get('name')
        ]);
    }
    public function get_all_photo(){
        $gallery = Gallery::all();
        foreach($gallery as $gallery_each){
            $gallery_each['photo_url'] = Path::$domain_url."upload/gallery/".$gallery_each['photo'];
        }
        
        return json_encode($gallery);
    }
    public function destroy($id){
        $gallery = Gallery::findOrFail($id);
        $image_path = public_path('/upload/gallery/').$gallery->photo;
        if($image_path){
            unlink($image_path);
        }
        $gallery->delete();
    }
}
