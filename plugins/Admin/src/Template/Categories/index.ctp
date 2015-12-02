<?php $this->Html->addCrumb(__('Categories')); ?>
<div class="row">
    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
        <h1 class="page-title txt-color-blueDark">
            <i class="fa fa-cog fa-fw "></i>
            <?= __('Category');?>
            <span>&gt;
                <?= __('List of category')?>
            </span>
        </h1>
    </div>
    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
        <ul id="sparks" class="">
            <li class="sparks-info">
                <?= $this->Html->link(__('New category'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
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
                <h2><?= __('List of categorys')?></h2>
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
                            <th class="hasinput"><input type="text" class="form-control" placeholder="Filter category id" /></th>
                            <th class="hasinput"><input type="text" class="form-control" placeholder="Filter feature" /></th>
                            <th class="hasinput"><input type="text" class="form-control" placeholder="Filter name" /></th>
                            <th class="hasinput"><input type="text" class="form-control" placeholder="Filter description" /></th>
                            <th class="hasinput"><input type="text" class="form-control" placeholder="Filter image" /></th>
                            <th class="hasinput"><input type="text" class="form-control" placeholder="Filter status" /></th>
                            <th class="hasinput"><input type="text" class="form-control" placeholder="Filter created" /></th>
                            <th class="hasinput" ></th>
                        </tr>
                        <tr>
                            <th><?= __('Category id') ?></th>
                            <th><?= __('Feature') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Image') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Created') ?></th>
                            <th width="13%"><?php echo __('Actions') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($categories as $category): ?>
                            <tr>
                                <td><?= $this->Number->format($category->id) ?></td>
                                <td width="10%"><center><?= $this->Core->active($category, 'feature') ?></center></td>
                                <td><?= h($category->name) ?></td>
                                <td><?= h($category->description) ?></td>
                                <td><?= h($category->image) ?></td>
                                <td width="10%"><center><?= $this->Core->active($category, 'status') ?></center></td>
                                <td><?= h($category->created) ?></td>
                                <td>
                                    <center>
                                        <?= $this->Html->link('<i class="fa fa-eye"></i> ', ['action' => 'view', $category->id], ['title' => __('View'), 'escape' => false, 'class' => 'btn btn-sm btn-default']);?>
                                        <?= $this->Html->link('<i class="fa fa-edit"></i> ', ['action' => 'add', $category->id], ['title' => __('Edit'), 'escape' => false, 'class' => 'btn btn-sm btn-default']); ?>
                                        <?= $this->Form->postLink('<i class="fa fa-trash-o"></i> ', ['action' => 'delete', $category->id], ['title' => __('Delete'), 'data-action' => 'deleteLin', 'data-delete-msg' => __('Are you sure you want to delete # {0}', $category->id), 'class' => 'btn btn-sm btn-default deleteLin', 'escape' => false]) ?>
                                    </center>
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