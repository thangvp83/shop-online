
<?php $this->Html->addCrumb(__('Cms'));?>
<div class="row">
    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
        <h1 class="page-title txt-color-blueDark">
            <i class="fa fa-cog fa-fw "></i>
            <?= __('Cms');?>
            <span>&gt;
                <?= $this->Html->link(__('List of cms'), ['action' => 'index'])?>
            </span>
        </h1>
    </div>
</div>

<div class="row">
    <article class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">
        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget jarviswidget-sortable jarviswidget-color-darken" id="wid-id-4" data-widget-editbutton="false" data-widget-custombutton="false" role="widget" style="">
            <header role="heading">
                <span class="widget-icon">
                    <i class="fa fa-user"></i>
                </span>
                <h2><?= h($cms->name) ?></h2>
            </header>
            <!-- widget div-->
            <div role="content">
                <!-- widget edit box -->
                <div class="jarviswidget-editbox">
                    <!-- This area used as dropdown edit box -->
                </div>
                <!-- end widget edit box -->
                <!-- widget content -->
                <div class="widget-body">
                    <fieldset>
                        <table id="user" class="table table-bordered table-striped" style="clear: both">
                            <tbody>
                                                    <tr>
                                <td style="width:35%;"><?= __('Id') ?></td>
                                <td style="width:65%"><?= h($cms->id) ?></td>
                            </tr>
                                                    <tr>
                                <td style="width:35%;"><?= __('Parent Id') ?></td>
                                <td style="width:65%"><?= h($cms->parent_id) ?></td>
                            </tr>
                                                    <tr>
                                <td style="width:35%;"><?= __('Level') ?></td>
                                <td style="width:65%"><?= h($cms->level) ?></td>
                            </tr>
                                                    <tr>
                                <td style="width:35%;"><?= __('Icon') ?></td>
                                <td style="width:65%"><?= h($cms->icon) ?></td>
                            </tr>
                            <tr>
                                <td style="width:35%;"><?= __('Banner') ?></td>
                                <td style="width:65%"><?= h($cms->banner) ?></td>
                            </tr>
                                                    <tr>
                                <td style="width:35%;"><?= __('Url') ?></td>
                                <td style="width:65%"><?= h($cms->url) ?></td>
                            </tr>
                                                    <tr>
                                <td style="width:35%;"><?= __('Url Popup') ?></td>
                                <td style="width:65%"><?= h($cms->url_popup) ?></td>
                            </tr>
                                                    <tr>
                                <td style="width:35%;"><?= __('Name') ?></td>
                                <td style="width:65%"><?= h($cms->name) ?></td>
                            </tr>
                                                    <tr>
                                <td style="width:35%;"><?= __('Content') ?></td>
                                <td style="width:65%"><?= h($cms->content) ?></td>
                            </tr>
                                                    <tr>
                                <td style="width:35%;"><?= __('Active') ?></td>
                                <td style="width:65%"><?= h($cms->active) ?></td>
                            </tr>
                                                    <tr>
                                <td style="width:35%;"><?= __('Created') ?></td>
                                <td style="width:65%"><?= h($cms->created) ?></td>
                            </tr>
                                                    </tbody>
                        </table>
                    </fieldset>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12">
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cms->id], ['class' => 'btn btn-primary']) ?>
                                <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end widget content -->
            </div>
            <!-- end widget div -->
        </div>
        <!-- end widget -->
    </article>
</div>
