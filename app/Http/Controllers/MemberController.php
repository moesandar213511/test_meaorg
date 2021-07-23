<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\CustomClass\MemberData;
use App\Member;
use App\User;
use App\Company;
use App\Company_Gallery;
use Auth;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.site_admin.admin.member')->with([
            'url' => 'member'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        $photo_name = uniqid()."_".$photo->getClientOriginalName();
        $photo->move(public_path("/upload/member/"),$photo_name);
        
        $password = $request->get('password');
        $c_password = $request->get('c_password');

        if($password == $c_password){
            $member_id = Member::create([
                'photo' => $photo_name,
                'name' => $request->get('name'),
                'phone' => $request->get('phone'),
                'position' => $request->get('position'),
                'address' => $request->get('address'),
                'education' => $request->get('education'),
                'detail' => $request->get('detail'),
                'fb_link' => $request->get('fb_link'),
                'tw_link' => $request->get('tw_link'),
                'in_link' => $request->get('in_link')
            ])->id;

            User::create([
                'email' => $request->get('email'),
                'password' => Hash::make($password),
                'member_id' => $member_id,
                'type' => 'member'
            ]);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $member = Member::orderBy('id','desc')->get();
        $arr = [];
        foreach($member as $member_each){
            $obj = new MemberData($member_each->id);
            array_push($arr,$obj->getMemberData());
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
        $obj = new MemberData($id);
        $edit_member = $obj->getMemberData();
        return json_encode($edit_member);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request){
        $id = $request->get('id');
        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            $photo_name = uniqid()."_".$photo->getClientOriginalName();
            $photo->move(public_path('/upload/member/'),$photo_name);
            $member = Member::findOrFail($id);
            $image_path = public_path('/upload/member/').$member->photo;
            if($image_path){
                unlink($image_path);
            }
            Member::findOrFail($id)->update([
                'photo' => $photo_name,
                'name' => $request->get('name'),
                'phone' => $request->get('phone'),
                'position' => $request->get('position'),
                'address' => $request->get('address'),
                'education' => $request->get('education'),
                'detail' => $request->get('detail'),
                'fb_link' => $request->get('fb_link'),
                'tw_link' => $request->get('tw_link'),
                'in_link' => $request->get('in_link')
            ]);

        }else{
            Member::findOrFail($id)->update([
                 'name' => $request->get('name'),
                'phone' => $request->get('phone'),
                'position' => $request->get('position'),
                'address' => $request->get('address'),
                'education' => $request->get('education'),
                'detail' => $request->get('detail'),
                'fb_link' => $request->get('fb_link'),
                'tw_link' => $request->get('tw_link'),
                'in_link' => $request->get('in_link')
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
        $member = Member::findOrFail($id);
        $image_path = public_path("/upload/member/").$member->photo;
        if($image_path){
            unlink($image_path);
        }
        $member->delete();

        $user = User::where('member_id',$id)->first();
        $user->delete();

        $company = Company::where('member_id',$id)->get();
        foreach($company as $data){
            $image_path1 = public_path("/upload/company_logo/").$data->logo;
            if($image_path1){
                unlink($image_path1);
            }
            $data->delete();

            $gallery = Company_Gallery::where('company_id',$data->id)->get();
            foreach($gallery as $gallery_data){
               $image_path1 = public_path("/upload/company_gallery/").$gallery_data->photos;
                if($image_path1){
                    unlink($image_path1);
                } 
                $gallery_data->delete();
            }
        }
    }

    public function count_company($id){
       $total = Company::where('member_id',$id)->get();
       return json_encode(count($total));
    }
   
    public function member_profile()
    {
        $member_id = Auth::user()->member_id;
        $member=Member::where('id',$member_id)->first();
        return view('admin.site_admin.member.member_profile')->with([
            'url' => 'member_profile',
            'member_profile' => $member
        ]); 
    }

    public function update_member(Request $request){
        $id = $request->get('id');

        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = uniqid()."_".$image->getClientOriginalName();
            $image->move(public_path() . '/upload/member/',$image_name);
            $member = Member::findOrFail($id);
            $img_path = public_path() . '/upload/member/' .$member->photo;
            if(file_exists($img_path)){
                unlink($img_path);
            }
            Member::findOrFail($id)->update([
            'photo' => $image_name,
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'address' => $request->get('address'),
            'education' => $request->get('education'),
            'detail' => $request->get('detail'),
            'fb_link' => $request->get('fb_link'),
            'tw_link' => $request->get('tw_link'),
            'in_link' => $request->get('in_link')
        ]);
        }else{
            Member::findOrFail($id)->update([
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'address' => $request->get('address'),
            'education' => $request->get('education'),
            'detail' => $request->get('detail'),
            'fb_link' => $request->get('fb_link'),
            'tw_link' => $request->get('tw_link'),
            'in_link' => $request->get('in_link')
        ]);
        }
        return redirect('member/profile');
    }
}

// Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores quaerat quibusdam, laboriosam exercitationem facere quae tempore nobis veritatis sint officiis nulla impedit voluptatum quo pariatur iste. Consequatur dolores accusantium laboriosam.