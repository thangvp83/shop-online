<?php

/**
 * All functions that not related to cakephp should be here
 */
class Core 
{
    public static function randomCode()
    {
        return mt_rand(1111111111, 9999999999) . time() . mt_rand(1111111111, 9999999999);
    }

    public static function uploadFile($file, $model, $path = null)
    {
        if (!$path) {
            $path = PATH_IMAGE_FILE;
        }
        $path .= $model.DS;
        if (!is_dir($path)) {
            @mkdir($path, 0777, true);
        }

        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $newName = time().rand(0, 1000).'.'.$extension;

        if (@move_uploaded_file($file['tmp_name'], $path.$newName))
        {
            return $newName;
        };
        return null;
    }
    
    public static function toSlug($string)
    {
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string)));
    }
}

?>