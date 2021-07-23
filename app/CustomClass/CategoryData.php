<?php

namespace App\CustomClass;

use App\Category;
use App\CustomClass\Path;
use App\Company;
use App\CustomClass\CompanyData;

class CategoryData{

    private $cat_data;

    function __construct($cat_id){
        $cats = Category::findOrFail($cat_id);
        $this->setCatData($cats);
    }

    public function getCatData(){
        $this->cat_data['logo_url'] = Path::$domain_url.'upload/category/'.$this->cat_data['logo'];

        $cat_id = $this->cat_data['id'];
        $company = Company::where('category_id',$cat_id)->get();
        $arr = [];
        foreach($company as $com){
            $obj = new CompanyData($com->id);
            array_push($arr,$obj->getCompanyData());
        }
        $this->cat_data['total_company'] = count($arr);
        
        return $this->cat_data;
    } 

    public static function getCustomLimitCompany($category){
        $arr = [];
        foreach($category as $cat){
            $obj = new CategoryData($cat->id);
            array_push($arr,$obj->getCatData());
        }
        return $arr;
    }

    public static function categoryCompany($id){
        $com = Company::where('category_id',$id)->get();
        $arr = [];
        foreach($com as $com_data){
            $obj = new CompanyData($com_data->id);
            array_push($arr,$obj->getCompanyData());
        }
        return $arr;

    }

    public static function allCategory($categories){
         $arr = [];
        foreach($categories as $cat_data){
           $obj = new CategoryData($cat_data->id);
            array_push($arr,$obj->getCatData());
        }
        return $arr;
    }
    
    private function setCatData($cat_data){
        $this->cat_data = $cat_data;
    }
}