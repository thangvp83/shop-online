<?php $this->Html->addCrumb(__('Product')); ?>
<div class="row">
    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
        <h1 class="page-title txt-color-blueDark">
            <i class="fa fa-cog fa-fw "></i>
            <?= __('Product');?>
            <span>&gt;
                <?= __('List of products')?>
            </span>
        </h1>
    </div>
    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
        <ul id="sparks" class="">
            <li class="sparks-info">
                <?= $this->Html->link(__('New product'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
            </li>
        </ul>
    </div>
</div>

<div class="row">
    <!-- NEW WIDGET START -->
    <article class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-colorbutton="false" data-widget-deletebutton="false" data-widget-editbutton="true">
            <header>
                <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                <h2><?= __('List of products')?></h2>
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
                            <th class="hasinput"><input type="text" class="form-control" placeholder="Filter id" /></th>
                            <th class="hasinput"><input type="text" class="form-control" placeholder="Filter category id" /></th>
                            <th class="hasinput"><input type="text" class="form-control" placeholder="Filter feature" /></th>
                            <th class="hasinput"><input type="text" class="form-control" placeholder="Filter name" /></th>
                            <th class="hasinput"><input type="text" class="form-control" placeholder="Filter brand name" /></th>
                            <th class="hasinput"><input type="text" class="form-control" placeholder="Filter description" /></th>
                            <th class="hasinput"><input type="text" class="form-control" placeholder="Filter image" /></th>
                            <th class="hasinput" ></th>
                        </tr>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Category id') ?></th>
                            <th><?= __('Feature') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Brand name') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Image') ?></th>
                            <th width="13%"><?php echo __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <td><?= $this->Number->format($product->id) ?></td>
                                <td>
                                    <?= $product->has('category') ? $this->Html->link($product->category->name, ['controller' => 'Categories', 'action' => 'view', $product->category->id]) : '' ?>
                                </td>
                                <td width="10%"><center><?= $this->Core->active($product, 'feature') ?></center></td>
                                <td><?= h($product->name) ?></td>
                                <td><?= h($product->brand_name) ?></td>
                                <td><?= h($product->description) ?></td>
                                <td><?= h($product->image) ?></td>
                                <td>
                                    <center>
                                    <?= $this->Html->link('<i class="fa fa-eye"></i> ', ['action' => 'view', $product->id], ['title' => __('View'), 'escape' => false, 'class' => 'btn btn-sm btn-default']);?>
                                    <?= $this->Html->link('<i class="fa fa-edit"></i> ', ['action' => 'edit', $product->id], ['title' => __('Edit'), 'escape' => false, 'class' => 'btn btn-sm btn-default']); ?>
                                    <?= $this->Form->postLink('<i class="fa fa-trash-o"></i> ', ['action' => 'delete', $product->id], ['title' => __('Delete'), 'data-action' => 'deleteLin', 'data-delete-msg' => __('Are you sure you want to delete # {0}', $product->id), 'class' => 'btn btn-sm btn-default deleteLin', 'escape' => false]) ?>
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