<?php $this->Html->addCrumb(__('Category'));?>
<div class="row">
    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
        <h1 class="page-title txt-color-blueDark">
            <i class="fa fa-cog fa-fw "></i>
            <?= __('Category');?>
            <span> >
                <?= $this->Html->link(__('List of Categories'), ['plugin'=>'admin','action' => 'index'])?>
            </span>
        </h1>
    </div>
</div>


<div class="row">

    <!-- NEW WIDGET START -->
    <article class="col-sm-12 col-md-12 col-lg-12">

        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false">
            <header>
                <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                <h2><?= ($category->isNew())?__('Category add'):__('Category edit') ?></h2>
            </header>

            <!-- widget div-->
            <div>
                <!-- widget content -->
                <div class="widget-body">
                    <?= $this->Form->create($category, ['id' => 'smart-form-register', 'class' => 'form-horizontal', 'templates' => 'Admin.bootstrap_form']) ?>
                    <fieldset>
                        <div class="form-group"></div>

                        <div class="form-group">
                            <label class="col-md-2 control-label"><?= __('Parent') ?></label>
                            <div class="col-md-9">
                                <?= $this->Form->input('parent_id',['type' => 'select',
                                    'options' => $category['parent'],
                                    'class'=>'form-control']) ?>
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
                            <label class="col-md-2 control-label"><?= __('Description') ?></label>
                            <div class="col-md-9">
                                <?= $this->Form->textarea('description', ['placeholder' => __('Description'),'class'=>'form-control']) ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label"><?= __('Image') ?></label>
                            <div class="col-md-9">
                                <?php
                                if ($category->image) {
                                    echo $this->Core->image($category, 'image', 100, 100, [], true, true);
                                }
                                ?>
                                <?= $this->Form->input('image',
                                    ['type' => 'file', 'preview'=>'.prevIcon', 'placeholder' => __('Image'),'class'=>'form-control']) ?>
                                <?php if($category->isNew()):?>
                                <div style="max-width: 64px;" class="prevIcon">
                                    <?= $this->Core->image($category, 'image', 64, 64, [], true, true);?>
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
                            <label class="col-md-2 control-label"><?= __('Type') ?></label>
                            <div class="col-md-9">
                                <?= $this->Form->input('type',['type' => 'select',
                                                                'options' => array(LAPTOP_TYPE => __('Laptop'), PC_TYPE => __('PC')),
                                                               'class'=>'form-control']) ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label"><?= __('Status') ?></label>
                            <div class="col-md-9">
                                <?= $this->Form->input('status', ['class'=>'checkbox','label'=>false]) ?>
                            </div>
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
                    <?= $this->Form->end() ?>
                </div>
                <!-- end widget content -->
            </div>
            <!-- end widget div -->
        </div>
        <!-- end widget -->
    </article>
    <!-- WIDGET END -->
</div>
