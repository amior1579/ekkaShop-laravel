<?php

namespace App\Http\Services;

class ImageService{

    public function profileUser($data){
        $data['profile'] =  $data['profile']->store('images/profileUser', 'public');
        return $data;
    }
}
