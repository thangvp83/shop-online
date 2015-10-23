<?php
use Cake\Core\Configure;

$this->Html->addCrumb(__('System'));
?>
<div class="row">
    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
        <h1 class="page-title txt-color-blueDark">
            <i class="fa fa-cog fa-fw "></i>
            <?= __('System');?>
            <span>&gt;
                <?= __('List of users')?>
            </span>
        </h1>
    </div>
    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
        <ul id="sparks" class="">
            <li class="sparks-info">
                <?= $this->Html->link(__('Add new'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
            </li>
        </ul>
    </div>
</div>

<div class="row">
    <!-- NEW WIDGET START -->
    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-colorbutton="false" data-widget-deletebutton="false" data-widget-editbutton="true">
            <header>
                <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                <h2><?= __('List of users')?></h2>
            </header>

            <!-- widget div-->
            <div>
                <!-- widget edit box -->
                <div class="jarviswidget-editbox">
                    <!-- This area used as dropdown edit box -->
                </div>
                <!-- end widget edit box -->

                <!-- widget content -->
                <div class="widget-body no-padding">

                    <table id="datatable_fixed_column" class="table table-striped table-bordered" width="100%">
                        <thead>
                        <tr>
                            <th class="hasinput">
                                <input type="text" class="form-control" placeholder="<?= __('Filter') ?> <?= __('Name') ?>" />
                            </th>
                            <th class="hasinput">
                                <input type="text" class="form-control" placeholder="<?= __('Filter') ?> <?= __('Email') ?>" />
                            </th>
                            <th class="hasinput" style="width:16%">
                                <input type="text" class="form-control" placeholder="<?= __('Filter') ?> <?= __('First name') ?>" />
                            </th>
                            <th class="hasinput">
                                <input type="text" class="form-control" placeholder="<?= __('Filter') ?> <?= __('Last name') ?>" />
                            </th>
                            <th class="hasinput" ></th>
                            <th class="hasinput" ></th>
                        </tr>
                        <tr>
                            <th><?php echo __('Id') ?></th>
                            <th><?php echo __('Email')?></th>
                            <th><?php echo __('Name')?></th>
                            <th><?php echo __('Group')?></th>
                            <th><?php echo __('Status')?></th>
                            <th width="13%"><?php echo __('Action') ?></th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?= $this->Number->format($user->id) ?></td>
                                <td><?= h($user->email) ?></td>
                                <td><?= h($user->first_name.' '.$user->last_name) ?></td>
                                <td><?= h(Configure::read('Core.Users.group.'.$user->group)) ?></td>
                                <td><?= $this->Core->active($user, 'status')?></td>
                                <td>
                                    <?php echo $this->element('link_action', array('item' => $user, 'model'=> 'User')) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
                <!-- end widget content -->

            </div>
            <!-- end widget div -->

        </div>
        <!-- end widget -->

    </article>
    <!-- WIDGET END -->
</div>