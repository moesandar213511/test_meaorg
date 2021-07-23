<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['id','member_id','logo','name','category_id','email','phone','address','web_url','fb_link','what_we_do','why_join_us','vision','mission','about_us','company_type','ad_date'];
}
