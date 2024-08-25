<?php

namespace App\Http\Services;

class ImageService{

    public function profileUser(array $data){
        if (isset($data['profile'])){
            $data['profile'] =  $data['profile']->store('images/profileUser', 'public');
            return $data;
        }
        $data['profile'] = 'images/null_images/nullProfile.jpg';
        return $data;
    }
    public function updateProfileUser(array $data)
    {
        if (isset($data['profile'])){
            $data['profile'] =  $data['profile']->store('images/profileUser', 'public');
            return $data;
        }
        return $data;
    }
}
