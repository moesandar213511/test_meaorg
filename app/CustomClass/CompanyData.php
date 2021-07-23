<?php

namespace App\CustomClass;

use App\Company;
use App\Company_Gallery;
use App\Member;
use App\Category;
use App\CustomClass\Path;

class CompanyData{
     
    private $company_data;

    function __construct($company_id){
       $company = Company::findOrFail($company_id);
       $this->setCompanyData($company);
    }

    public function getCompanyData(){
        $this->company_data['logo_url'] = Path::$domain_url."upload/company_logo/".$this->company_data['logo'];

        // <=== change member_id 
        $id = $this->company_data['member_id'];
        $member = Member::where('id',$id)->get();
        $this->company_data['member_id'] = $member['0']['name'];

        $id = $this->company_data['category_id'];
        $category = Category::findOrFail($id);
        $this->company_data['category_id'] = $category['name'];


        $company_id = $this->company_data['id'];
        $arr = [];
        $company_photos = Company_Gallery::where('company_id',$company_id)->get();
        foreach($company_photos as $company_data){
           array_push($arr,Path::$domain_url.'/upload/company_gallery/'.$company_data->photos);
        }
        $this->company_data['photos'] = $arr;

        return $this->company_data;
    }

    public static function getOptionValue($company){
        $arr = [];
        foreach($company as $item){
            $obj = new CompanyData($item->id);
            array_push($arr,$obj->getCompanyData());
        }
        return $arr;
    }

    public static function getCompanyFormat($companies){
        $arr = [];
        foreach($companies as $company_data){
           $obj = new CompanyData($company_data->id);
            array_push($arr,$obj->getCompanyData());
        }
        return $arr;
    }


    private function setCompanyData($company_data){
        $this->company_data = $company_data;
    } 
}