<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->element('core') ?>

    <?php
    /* ---------- Shop Online css ---------- */
    echo $this->Html->css([
        'prettyPhoto.css',
        'price-range.css',
        'animate.css',
        'main.css',
        'responsive.css',
    ]);
    ?>

    <?php
    /* ---------- Shop Online js ---------- */
    echo $this->Html->script([
        'price-range.js',
        'jquery.scrollUp.min.js',
        'jquery.prettyPhoto.js',
        'main.js',
    ]);
    ?>
    <!--[if lt IE 9]>
    <?php
    echo $this->Html->script([
    'html5shiv.js',
    'respond.min.js',
    ]);
    ?>
    <![endif]-->
</head>
<body>
<!--<?= $this->element('popup'); ?>-->
    <div id="container">
        <?= $this->element('header'); ?>
        <div id="content">
            <?= $this->Flash->render() ?>
            <div class="row">
                <?= $this->fetch('content') ?>
            </div>
        </div>
        <?= $this->element('footer'); ?>
    </div>
</body>
</html>
