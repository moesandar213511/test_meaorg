<?php

namespace App\CustomClass;

use App\Event;
use App\CustomClass\Path;

class EventData{

    private $event_data;

    function __construct($event_id){
        $event = Event::findOrFail($event_id);
        $this->setEventData($event);
    }

    public function getEventData(){
        $this->event_data['photo_url'] = Path::$domain_url.'upload/event/'.$this->event_data['photo'];

        return $this->event_data;
    }

    public static function getAllEvent($event){
        $arr = [];
        foreach($event as $data){
            $obj = new EventData($data->id);
            array_push($arr,$obj->getEventData());
        }
        return $arr;
    }

    private function setEventData($event_data){
        $this->event_data = $event_data;
    }

}