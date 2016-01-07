<?php

namespace App\View\Helper;

use Cake\Core\App;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use Cake\View\Helper;
use Cake\View\View;

/**
 * @property Helper|void Form
 * @property  Settings
 * @property  Settings
 */
class CoreHelper extends Helper {

    var $helpers = array('Form', 'Html', 'Url');

    public function active($entity, $field)
    {
        $formStart = $this->Form->create(null, ['url' => ['action' => 'set_active', $field], 'class' => 'hw-active']);
        $idHidden = $this->Form->hidden('id', ['value' => $entity->id]);
        $formEnd = $this->Form->end();
        $checkbox = $this->Form->checkbox($field, ['class' => 'onoffswitch-checkbox', 'id' => 'inline_'.$field.'_'.$entity->id, 'checked' => $entity->$field]);
        $spanContainer = '
            <span class="onoffswitch">
                '.$idHidden.$checkbox.'
                <label class="onoffswitch-label" for="inline_'.$field.'_'.$entity->id.'">
                    <span class="onoffswitch-inner" data-swchon-text="Yes" data-swchoff-text="No"></span>
                    <span class="onoffswitch-switch"></span>
                </label>
            </span>
        ';

        return $formStart.$spanContainer.$formEnd;
    }

    /**
     * @param $inputData
     * @param $field
     * @param null $dst_w
     * @param null $dst_h
     * @param array $htmlAttributes
     * @param bool|false $preview
     * @param bool|false $delete
     * @param bool|false $returnUrl
     * @return string
     */
    function image($inputData, $field, $dst_w = null, $dst_h = null, $htmlAttributes = array(), $preview = false, $delete = false, $returnUrl = false) {

        $path = $inputData;

        if (is_object($inputData)) {
            if (!$inputData->$field) {
                return null;
            }
            $path = $inputData->source().'/'.$inputData->$field;
        } else {
            $returnUrl = $delete;
            $delete = $preview;
            $preview = $htmlAttributes;
            $htmlAttributes = $dst_h;
            $dst_h = $dst_w;
            $dst_w = $field;
            $field = null;
        }

        $imageTypes = array(1 => "gif", "jpeg", "png", "swf", "psd", "wbmp", 'jpg'); // used to determine image type

        $extension = pathinfo(basename($path), PATHINFO_EXTENSION);

        $notImage = false;

        //type images
        if (in_array(strtolower($extension), $imageTypes)) {
            $optionDefault = array(
                'alt' => basename($path)
            );
            $htmlAttributes = array_merge($optionDefault, $htmlAttributes);

            $url = PATH_IMAGE_FILE.$path;

            if (!is_file($url)) {
                return null;
            }
            if ($dst_h == null || $dst_w == null) {
                if ($returnUrl) {
                    return $this->Url->build('/upload/'.$path, true);
                }
                return $this->Html->image('../upload/'.$path, $htmlAttributes);
            }

            list($w, $h, $type) = getimagesize($url);
            $r = $w / $h;
            $dst_r = $dst_w / $dst_h;

            if ($r > $dst_r) {
                $src_w = $h * $dst_r;
                $src_h = $h;
                $src_x = ($w - $src_w) / 2;
                $src_y = 0;
            } else {
                $src_w = $w;
                $src_h = $w / $dst_r;
                $src_x = 0;
                $src_y = ($h - $src_h) / 2;
            }

            $relFile = '../upload/cache_image/'.$dst_w.'-'.$dst_h.'-'.basename($path); // relative file
            $cacheFile = PATH_IMAGE_FILE.'cache_image'.DS.$dst_w.'-'.$dst_h.'-'.basename($path);

            if (file_exists($cacheFile)) {
                if (@filemtime($cacheFile) >= @filemtime($url)) {
                    $cached = true;
                } else {
                    $cached = false;
                }
            } else {
                $cached = false;
            }

            if (!$cached) {
                if (!is_dir(PATH_IMAGE_FILE.'cache_image')) {
                    @mkdir(PATH_IMAGE_FILE.'cache_image', 0777, true);
                }
                $image = call_user_func('imagecreatefrom'.$imageTypes[$type], $url);
                if (function_exists("imagecreatetruecolor")) {
                    $temp = imagecreatetruecolor($dst_w, $dst_h);
                    imagealphablending($temp, true);
                    imagesavealpha($temp, true);
                    imagefill($temp,0,0,0x7fff0000);
                    imagecopyresampled($temp, $image, 0, 0, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h);
                } else {
                    $temp = imagecreate ($dst_w, $dst_h);
                    imagefill($temp,0,0,0x7fff0000);
                    imagecopyresized($temp, $image, 0, 0, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h);
                }
                call_user_func("image".$imageTypes[$type], $temp, $cacheFile);
                imagedestroy($image);
                imagedestroy($temp);
            }
            if ($returnUrl) {
                return $relFile;
            }
            $imageReturn = $this->Html->image($relFile, $htmlAttributes);

            if ($preview) {
                $imageReturn = '<a class="fancybox" href="'.Router::url('/upload/'.$path).'">'.$imageReturn.'</a>';
            }

        } else { // file
            $notImage = true;
            $imageFile = 'default.png';
            switch ($extension) {
                case 'zip':
                case 'rar':
                case '7zip':
                case '7z':
                case 'gz':
                    $imageFile = 'zip.png';
                    break;
                case 'mp3':
                case 'wma':
                    $imageFile = 'music.png';
                    break;
                case 'mp4':
                case 'flv':
                case 'wav':
                    $imageFile = 'video.png';
                    break;
                case 'xls':
                case 'xlxs':
                    $imageFile = 'xls.png';
                    break;
                case 'ppt':
                    $imageFile = 'ppt.png';
                    break;
                case 'doc':
                case 'docx':
                    $imageFile = 'docx.png';
                    break;
                case 'txt':
                    $imageFile = 'text.png';
                    break;
            }
            $relFile = 'core/files/'.$imageFile;
            if ($returnUrl) {
                return $this->Url->build('/upload/'.$path, true);
            }
            $imageReturn = $this->Html->image($relFile, $htmlAttributes);

            if ($preview) {
                $imageReturn = '<a href="'.Router::url('/upload/'.$path).'">'.$imageReturn.'</a>';
            }
        }
        if ($delete) {
            $iconSmall = null;
            if ($dst_w <= 64 || $dst_h <= 64 || $notImage) {
                $iconSmall = 'small';
            }
            $imageReturn .= '<a class="hw-delete-link" image="'.basename($path).'" field="'.$field.'" href="#"><i class="icon-close '.$iconSmall.'"></i></a>';
        }

        $imageReturn = '<div class="hw-image">'.$imageReturn.'</div>';

        return $imageReturn;
    }

    public function setting($field)
    {
        $this->Settings = TableRegistry::get('Settings');
        $settings = $this->Settings->find()->first();

        return $settings ? $settings->$field : null;
    }
    
    public function datetime($datetime,$showTime = true)
    {
        if($showTime)
        {
            $datetime->setToStringFormat('YYYY-MM-dd HH:mm:ss');
        }
        else
        {
            $datetime->setToStringFormat('YYYY-MM-dd');
        }
        
        return $datetime;
    }
}
?>