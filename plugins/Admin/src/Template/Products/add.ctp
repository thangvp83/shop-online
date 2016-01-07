<?php $this->Html->addCrumb(__('Product'));?>
<div class="row">
    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
        <h1 class="page-title txt-color-blueDark">
            <i class="fa fa-cog fa-fw "></i>
            <?= __('Product');?>
            <span> >
                <?= $this->Html->link(__('List of products'), ['plugin'=>'admin','action' => 'index'])?>
            </span>
        </h1>
    </div>
</div>


<div class="row">

<!-- NEW WIDGET START -->
    <?php $this->loadHelper('Form', ['templates' => 'Admin.bootstrap_form']); ?>
    <?= $this->Form->create($product, ['id' => 'smart-form-register', 'class' => 'form-horizontal', 'templates' => 'Admin.bootstrap_form', ' enctype'=>'multipart/form-data']) ?>
<article class="col-sm-12 col-md-12">
        <!-- Widget ID (each widget will need unique ID)-->
    <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false">
        <header>
            <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
            <h2><?= ($product->isNew())?__('Product add'):__('Product edit') ?></h2>
        </header>

        <!-- widget div-->
        <div class="row">
            <div class="col-sm-7 col-md-7">
                <!-- widget content -->
                <div class="widget-body">
                    <fieldset>
                        <div class="form-group"></div>

                        <div class="form-group">
                            <label class="col-md-2 control-label"><?= __('Category id') ?></label>
                            <div class="col-md-9">
                            <?= $this->Form->input('category_id', ['placeholder' => __('Category Id'),'class'=>'form-control', 'options' => $categories]) ?>
                            </div>
                            </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label"><?= __('Feature') ?></label>
                            <div class="col-md-9">
                                    <?= $this->Form->input('feature', ['class'=>'checkbox','label'=>false]) ?>
                        </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label"><?= __('Name') ?></label>
                            <div class="col-md-9">
                                    <?= $this->Form->input('name', ['placeholder' => __('Name'),'class'=>'form-control']) ?>
                        </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label"><?= __('Brand name') ?></label>
                            <div class="col-md-9">
                                    <?= $this->Form->input('brand_name', ['placeholder' => __('Brand name'),'class'=>'form-control']) ?>
                        </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label"><?= __('Description') ?></label>
                            <div class="col-md-9">
                                    <?= $this->Form->textarea('description', ['placeholder' => __('Description'),'class'=>'form-control']) ?>
                        </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label"><?= __('Image') ?></label>
                            <div class="col-md-9">
                                <?php
                                if ($product->image) {
                                    echo $this->Core->image($product, 'image', 100, 100, [], true, true);
                                }
                                ?>
                                <?= $this->Form->input('image',
                                    ['type' => 'file', 'preview'=>'.prevIcon', 'placeholder' => __('Image'),'class'=>'form-control']) ?>
                                <?php if($product->isNew()):?>
                                    <div style="max-width: 64px;" class="prevIcon">
                                        <?= $this->Core->image($product, 'image', 64, 64, [], true, true);?>
                                    </div>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label"><?= __('Thumbnail') ?></label>
                            <div class="col-md-9">
                                    <?= $this->Form->input('thumbnail', ['placeholder' => __('Thumbnail'),'class'=>'form-control']) ?>
                        </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label"><?= __('Price') ?></label>
                            <div class="col-md-9">
                                    <?= $this->Form->input('price', ['placeholder' => __('Price'),'class'=>'form-control']) ?>
                        </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label"><?= __('Status') ?></label>
                            <div class="col-md-9">
                                    <?= $this->Form->input('status', ['class'=>'checkbox','label'=>false]) ?>
                        </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label"><?= __('Sale off') ?></label>
                            <div class="col-md-9">
                                <?= $this->Form->input('sale_off', ['class'=>'checkbox','label'=>false]) ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <?= $this->Form->input('sale_off_date_start', ['placeholder' => __('Sale Off Date Start'), 'empty' => true, 'default' => '']) ?>
                        </div>
                        <div class="form-group">
                            <?= $this->Form->input('sale_off_date_end', ['placeholder' => __('Sale Off Date End'), 'empty' => true, 'default' => '']) ?>
                        </div>
                        <div class="form-group">
                        </div>
                    </fieldset>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-11">
                                <?= $this->Html->link(__('Cancel'), ['plugin'=>'admin','action' => 'index'], ['class' => 'btn btn-default']) ?>
                                <?= $this->Form->button('<i class="fa fa-save"></i> '.__('Submit'), ['class' => 'btn btn-primary']) ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end widget content -->
            </div>
            <div class="col-sm-5 col-md-5">
                <div id="listCard">
                    <div class="form-group">
                        <label class="col-md-4 left-align control-label"><?= __('Product Image') ?></label>
                        <div class="col-md-8">
                            <?= $this->Form->input('image', ['type' => 'file','placeholder' => __('Image'),'class'=>'form-control']) ?>
                        </div>
                    </div>
                </div>
                <a href="" class="btn_add">Add card</a>Add
            </div>
        </div>
        <!-- end widget div -->
        <!-- end widget -->
    </div>
</article>

<?= $this->Form->end() ?>
<!-- WIDGET END -->
</div>
