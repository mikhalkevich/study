<?php namespace App\Libs;

use Image;
use Auth;

class Imag
{
    public function url($puth = null, $dir = null, $name = null)
    {
        if ($puth != null) {
            if ($dir != null) {
                $dirrect = public_path() . $dir;
            } else {
                if (Auth::guest()) {
                    $dirrect = public_path() . '/uploads/0/';
                } else {
                    $dirrect = public_path() . '/uploads/' . Auth::user()->id.'/';
                }
                if (!file_exists($dirrect)) {
                    mkdir($dirrect, 0777, true);
                }
            }
            if ($name != null) {
                $filename = $name;
            } else {
                $filename = date('y-m-d-h-i-s') . '.jpg';
            }
            $img = Image::make($puth);
            $img->save($dirrect.$filename);
            $img->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($dirrect.'s_'.$filename);
            return $filename;
        } else {
            return false;
        }
    }
}
