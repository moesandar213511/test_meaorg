<?php

namespace App\CustomClass;

use App\Member;
use App\CustomClass\Path;

class MemberData{
    private $member_data;

    function __construct($member_id){
        $member = Member::findOrFail($member_id);
        $this->setMemberData($member);
    }

    public function getMemberData(){
        $this->member_data['photo_url'] = Path::$domain_url."upload/member/".$this->member_data['photo'];
        return $this->member_data;
    }

    private function setMemberData($member_data){
        $this->member_data = $member_data;
    }
}

