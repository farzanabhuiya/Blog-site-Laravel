<?php
namespace App\Http\Helpers;

trait MediaUpload{
function uploadSingleMedia( $title, $media, $path ='posts',$type ='public'){
    $fileName= $title . '.' . $media->extension();
     $upload =$media->storeAS($path, $fileName,$type);
    return  $upload;
}

}