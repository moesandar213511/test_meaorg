<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\Category;
use App\Company;
use App\Company_Gallery;
use App\CustomClass\CompanyData;
use App\CustomClass\Path;
use App\User;
use Auth;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        $company = Company::all();
        $company_data = CompanyData::getOptionValue($company);

        $user=User::where('type','member')->get();
        $member=[];
        foreach ($user as $data){
            $m=Member::find($data->member_id);
            array_push($member,$m);
        }
        // return $member;
        return view('admin.site_admin.admin.company')->with([
            'url' => 'company',
            'all_member' => $member,
            'category' =>$category,
            'company_data' => $company_data
        ]);
    }

    public function member_company(){
        $category = Category::all();
        $company = Company::all();
        $company_data = CompanyData::getOptionValue($company);

        $user=User::where('type','member')->get();
        $member=[];
        foreach ($user as $data){
            $m=Member::find($data->member_id);
            array_push($member,$m);
        }
        // return $member;
        return view('admin.site_admin.member.company')->with([
            'url' => 'company',
            'all_member' => $member,
            'category' =>$category,
            'company_data' => $company_data
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
        $logo_name = uniqid() . "_" . $logo->getClientOriginalName();
        $logo->move(public_path('/upload/company_logo/'),$logo_name);

        $company_id = Company::create([
            'member_id' => $request->get('member_id'),
            'logo' => $logo_name,
            'name' => $request->get('name'),
            'category_id' => $request->get('category_id'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'address' => $request->get('address'),
            'web_url' => $request->get('web_url'),
            'fb_link' => $request->get('fb_link'),
            'what_we_do' => $request->get('what_we_do'),
            'why_join_us' => $request->get('why_join_us'),
            'vision' => $request->get('vision'),
            'mission' => $request->get('mission'),
            'about_us' => $request->get('about_us'),
            'company_type' => $request->get('company_type'),
            'ad_date' => $request->get('ad_date')
        ])->id;

        if ($photos = $request->file('photos')) {
            foreach ($photos as $photo_data){
                $photoName = uniqid() . '_' . $photo_data->getClientOriginalName();
                $photo_data->move(public_path() . '/upload/company_gallery/', $photoName);
                Company_Gallery::create([
                        'photos' => $photoName,
                        'company_id' => $company_id
                ]);
            }
        }
        //  return response()->json(['message'=>true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        if (Auth::user()->type=='admin'){
            $companies = Company::orderBy('id', 'desc')->get();
        }
        else{
            $member_id = Auth::user()->member_id;
            $companies = Company::where('member_id',$member_id)->orderBy('id', 'desc')->get();
        }
        $arr = CompanyData::getCompanyFormat($companies);
        return json_encode($arr);
    }

    public function company_detail($id){
        $obj = new CompanyData($id);
        $company_detail = $obj->getCompanyData();
        return view('admin.site_admin.member.company_detail')->with([
            'url' => 'company',
            'company_detail' => $company_detail
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obj = new CompanyData($id);
        return json_encode($obj->getCompanyData());
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
           $logo_name = uniqid() . "_" . $logo->getClientOriginalName();
           $logo->move(public_path('/upload/company_logo/'),$logo_name);
            $com = Company::findOrFail($id);
            $img_path = public_path('/upload/company_logo/').$com->logo;
            if(file_exists($img_path)){
                unlink($img_path);
            }

           Company::findOrFail($id)->update([
                'member_id' => $request->get('member_id'),
                'logo' => $logo_name,
                'name' => $request->get('name'),
                'category_id' => $request->get('category_id'),
                'email' => $request->get('email'),
                'phone' => $request->get('phone'),
                'address' => $request->get('address'),
                'web_url' => $request->get('web_url'),
                'fb_link' => $request->get('fb_link'),
                'what_we_do' => $request->get('what_we_do'),
                'why_join_us' => $request->get('why_join_us'),
                'vision' => $request->get('vision'),
                'mission' => $request->get('mission'),
                'about_us' => $request->get('about_us'),
                'company_type' => $request->get('company_type'),
                'ad_date' => $request->get('ad_date')
           ]);
       }else{
           Company::findOrFail($id)->update([
                'member_id' => $request->get('member_id'),
                'name' => $request->get('name'),
                'category_id' => $request->get('category_id'),
                'email' => $request->get('email'),
                'phone' => $request->get('phone'),
                'address' => $request->get('address'),
                'web_url' => $request->get('web_url'),
                'fb_link' => $request->get('fb_link'),
                'what_we_do' => $request->get('what_we_do'),
                'why_join_us' => $request->get('why_join_us'),
                'vision' => $request->get('vision'),
                'mission' => $request->get('mission'),
                'about_us' => $request->get('about_us'),
                'company_type' => $request->get('company_type'),
                'ad_date' => $request->get('ad_date')
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
        $company = Company::findOrFail($id);
        $image_path = public_path("/upload/company_logo/").$company->logo;
        if(file_exists($image_path)){
            unlink($image_path);
        }

        $company_gallery = Company_Gallery::where('company_id',$id)->get()
        ;
        foreach ($company_gallery as $data) {
            $image_path1 = public_path("/upload/company_gallery/").$data['photos'];
            if(file_exists($image_path1)){
                unlink($image_path1);
            }
            $data->delete();
        }
        $company->delete();
    }
    public function company_photos($id){
        $gallery_id = Company_Gallery::where('company_id',$id)->get();
        $arr = [];
        foreach ($gallery_id as $data) {
            array_push($arr,$data);
        }
        // return $arr;
        return view('admin.site_admin.member.company_photos')->with([
            'url' => 'company',
            'gallery_arr' => $arr,
        ]);
    }
    public function edit_eachphoto($id){
        $gallery_each = Company_Gallery::findOrFail($id);
        $gallery_each['photos_url']=Path::$domain_url."upload/company_gallery/".$gallery_each->photos;
      //   return $gallery_each;
          return json_encode($gallery_each);
    }

    public function update_image(Request $request){
       $id = $request->get('id');
       $photo = $request->file('photo');        
       $photoName = uniqid() . '_' . $photo->getClientOriginalName();
       $photo->move(public_path() . '/upload/company_gallery/', $photoName);
       $gallery = Company_Gallery::findOrFail($id);
        $image_path = public_path("/upload/company_gallery/").$gallery->photos;
        if(file_exists($image_path)){
            unlink($image_path);
        }

       Company_Gallery::findOrFail($id)->update([
            'photos' => $photoName
       ]);
        
    }


}
