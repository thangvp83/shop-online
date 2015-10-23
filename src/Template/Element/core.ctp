<?php
use Cake\Core\Configure;

$this->Html->charset() ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home | Shopper Online</title>
<?= $this->Html->meta('icon') ?>

<?= $this->fetch('meta') ?>
<?= $this->fetch('css') ?>
<?= $this->fetch('script') ?>

<?php 
    /* ---------- Core css ---------- */
    echo $this->Html->css([
        'core/jquery-ui.min.css',
        'core/core.css',
        'core/bootstrap.min.css',
        'core/font-awesome.min.css',
        '../js/core/fancybox/jquery.fancybox.css',
    ]);
?>

<?php 
    /* ---------- Core js ---------- */
    echo $this->Html->script([
        'core/jquery-2.1.1.min.js',
        'core/jquery-ui.min.js',
        'core/jquery.form',
        'core/core.js',
        'core/fb-login.js',
        'core/bootstrap.min.js',
        'core/tinymce/tinymce.min.js',
        'core/fancybox/jquery.fancybox.js',
    ]);
?>

<script type="text/javascript">
    var BASE_URL = "<?= $this->Url->build('/',true); ?>";
    var FB_APP_ID = "<?= Configure::read('System.Facebook.AppID') ?>";
    var CUR_SMART_THEME = "<?= $this->CurUser->smart_admin_themes; ?>";
    var FILE_ERROR_MAX_SIZE = <?php echo FILE_ERROR_MAX_SIZE ?>;
    var FILE_ERROR_EXTENSION = <?php echo FILE_ERROR_EXTENSION ?>;
    var FILE_ERROR_EMPTY = <?php echo FILE_ERROR_EMPTY ?>;
    var IMAGE_FIELDS = <?php echo json_encode($imageFields); ?>;
</script>



<script type="text/javascript">
$(document).ready(function() 
{   
    <?php 
        if(!empty($buildHasMany))
        {
            foreach($buildHasMany as $item)
            {
                echo 'Core.buildHasMany('.json_encode($item).');';
            }
        }
    ?>
            
    <?php 
        if(!empty($buildAjaxMore))
        {
            echo "Core.buildAjaxMore({'model':'".$buildAjaxMore['model']."','element':'".$buildAjaxMore['element']."','page':'".$buildAjaxMore['page']."','pageCount':'".$buildAjaxMore['pageCount']."','container':'".$buildAjaxMore['container']."','link':'".$buildAjaxMore['link']."'});";
        }
    ?>
});
</script>