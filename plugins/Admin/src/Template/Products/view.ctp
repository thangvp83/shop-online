
<?php $this->Html->addCrumb(__('Product'));?>
<div class="row">
    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
        <h1 class="page-title txt-color-blueDark">
            <i class="fa fa-cog fa-fw "></i>
            <?= __('Product');?>
            <span>&gt;
                <?= $this->Html->link(__('List of products'), ['plugin'=>'admin','action' => 'index'])?>
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
                <h2><?= h($product->name) ?></h2>
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
                                <td style="width:65%">
                                    <?= h($product->id) ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:35%;"><?= __('Category id') ?></td>
                                <td style="width:65%">
                                    <?= h($product->category_id) ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:35%;"><?= __('Feature') ?></td>
                                <td style="width:65%">
                                    <?= ($product->feature)?__('Yes'):__('No') ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:35%;"><?= __('Name') ?></td>
                                <td style="width:65%">
                                    <?= h($product->name) ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:35%;"><?= __('Brand name') ?></td>
                                <td style="width:65%">
                                    <?= h($product->brand_name) ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:35%;"><?= __('Description') ?></td>
                                <td style="width:65%">
                                    <?= h($product->description) ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:35%;"><?= __('Image') ?></td>
                                <td style="width:65%">
                                    <?= h($product->image) ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:35%;"><?= __('Thumbnail') ?></td>
                                <td style="width:65%">
                                    <?= h($product->thumbnail) ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:35%;"><?= __('Price') ?></td>
                                <td style="width:65%">
                                    <?= h($product->price) ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:35%;"><?= __('Status') ?></td>
                                <td style="width:65%">
                                    <?= ($product->status)?__('Yes'):__('No') ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:35%;"><?= __('Sale off') ?></td>
                                <td style="width:65%">
                                    <?= h($product->sale_off) ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:35%;"><?= __('Sale off date start') ?></td>
                                <td style="width:65%">
                                    <?= $this->Core->datetime($product->sale_off_date_start,false) ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:35%;"><?= __('Sale off date end') ?></td>
                                <td style="width:65%">
                                    <?= $this->Core->datetime($product->sale_off_date_end,false) ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:35%;"><?= __('Created') ?></td>
                                <td style="width:65%">
                                    <?= $this->Core->datetime($product->created) ?>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </fieldset>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12">
                                <?= $this->Html->link(__('Back'), ['plugin'=>'admin','action' => 'index'], ['class' => 'btn btn-default']) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $product->id], ['class' => 'btn btn-primary']) ?>
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
