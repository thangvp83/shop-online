<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 26/12/2015
 * Time: 14:03
 */
$arr_options = array();
$arr_selected = array();
function cate_patent($data, $parent = 0, $str = '--', $selected = 0){
    foreach($data as $value){
        $id = $value['id'];
        $name = $value['name'];
        if($value['parent_id'] == $parent){
            /*if($selected != 0 && $selected == $id){
                echo "<option value='$id' selected = 'selected'>$str $name</option>";
            } else {
                echo "<option value='$id'>$str $name</option>";
            }*/
            if($selected != 0 && $selected == $id) {
                $GLOBALS['arr_selected'][$id] = $str .' '. $name;
            }
            $GLOBALS['arr_options'][$id] = $str .' '. $name;

            cate_patent($data, $id, $str .'--');
        }
    }

    return array(
        'data' => $GLOBALS['arr_options'],
        'selected' => $GLOBALS['arr_selected']
    );
}