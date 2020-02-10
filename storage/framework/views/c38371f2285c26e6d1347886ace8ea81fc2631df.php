<?php $__env->startSection('content'); ?>
<header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-6">
                <h4 class="m-t-5">
                    <i class="fa fa-home"></i>
                    Pages
                </h4>
            </div>
        </div>
    </div>
</header>
<div class="outer">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Edit Page >> <?php echo e($page->name); ?></div>
                    <div class="card-body">
                        <a href="<?php echo e(url('/admin/pages')); ?>" title="Back"><button class="btn btn-warning btn-sm"><i
                                    class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        <?php if($errors->any()): ?>
                        <ul class="alert alert-danger">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <?php endif; ?>

                        <form method="POST" action="<?php echo e(url('/admin/pages/' . $page->id)); ?>" accept-charset="UTF-8"
                            class="form-horizontal" enctype="multipart/form-data">
                            <?php echo e(method_field('PATCH')); ?>

                            <?php echo e(csrf_field()); ?>


                            <div class="form-group row">
                                <div class="col-sm-6 <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                                    <label for="name" class="control-label"><?php echo e('Name'); ?></label>
                                    <input class="form-control" name="name" type="text" id="name"
                                        value="<?php echo e(isset($page->name) ? $page->name : ''); ?>" required>
                                    <?php echo $errors->first('name', '<p class="help-block">:message</p>'); ?>

                                </div>
                                <div class="col-sm-6 <?php echo e($errors->has('slug') ? 'has-error' : ''); ?>">
                                    <label for="slug" class="control-label"><?php echo e('Slug'); ?></label>
                                    <input class="form-control" name="slug" type="text" id="slug"
                                        value="<?php echo e(isset($page->slug) ? $page->slug : ''); ?>" required>
                                    <?php echo $errors->first('slug', '<p class="help-block">:message</p>'); ?>

                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 <?php echo e($errors->has('content') ? 'has-error' : ''); ?>">
                                    <label for="content" class="control-label"><?php echo e('Content'); ?></label>
                                    <textarea class="form-control my-editor" rows="5" name="content" type="textarea" id="CMSPageContent"
                                        ><?php echo e($page->content); ?></textarea>
                                    <?php echo $errors->first('content', '<p class="help-block">:message</p>'); ?>

                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4 <?php echo e($errors->has('status') ? 'has-error' : ''); ?>">
                                    <label for="status" class="control-label"><?php echo e('Status'); ?></label>
                                    <select class="form-control" name="status" id="Status" value="<?php echo e(old('status')); ?>"
                                        required>
                                        <option value="1" <?php if($page->status == 1): ?> selected <?php endif; ?>>Publish</option>
                                        <option value="0" <?php if($page->status == 0): ?> selected <?php endif; ?>>Draft</option>
                                    </select>
                                    <?php echo $errors->first('status', '<p class="help-block">:message</p>'); ?>

                                </div>
                                <div class="col-sm-4 <?php echo e($errors->has('page_type') ? 'has-error' : ''); ?>">
                                    <label for="Page Type" class="control-label"><?php echo e('Page Type'); ?></label>
                                    <select class="form-control" name="page_type" id="page_type"
                                        value="<?php echo e(old('page_type')); ?>" required>
                                        <option value="1" <?php if($page->page_type == 1): ?> selected <?php endif; ?>>Standard</option>
                                        <option value="2" <?php if($page->page_type == 2): ?> selected <?php endif; ?>>Contact</option>
                                    </select>
                                    <?php echo $errors->first('page_type', '<p class="help-block">:message</p>'); ?>

                                </div>
                                <div class="col-sm-4 <?php echo e($errors->has('template') ? 'has-error' : ''); ?>">
                                    <label for="Template" class="control-label"><?php echo e('Template'); ?></label>
                                    <select class="form-control" name="template" id="Template"
                                        value="<?php echo e(old('template')); ?>" required>
                                        <option value="1" <?php if($page->template == 1): ?> selected <?php endif; ?>>Default(full-width)</option>
                                        <option value="2" <?php if($page->template == 2): ?> selected <?php endif; ?>>Right Sidebar</option>
                                    </select>
                                    <?php echo $errors->first('template', '<p class="help-block">:message</p>'); ?>

                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4 <?php echo e($errors->has('meta_title') ? 'has-error' : ''); ?>">
                                    <label for="Meta Title" class="control-label"><?php echo e('Meta Title'); ?></label>
                                    <input class="form-control" name="meta_title" type="text" id="MetaTitle"
                                        value="<?php echo e(isset($page->meta_title) ? $page->meta_title : ''); ?>">
                                    <?php echo $errors->first('meta_title', '<p class="help-block">:message</p>'); ?>

                                </div>
                                <div class="col-sm-4 <?php echo e($errors->has('meta_keywords') ? 'has-error' : ''); ?>">
                                    <label for="Meta Keywords" class="control-label"><?php echo e('Meta Keywords'); ?></label>
                                    <input class="form-control" name="meta_keywords" type="text" id="MetaKeywords"
                                        value="<?php echo e(isset($page->meta_keywords) ? $page->meta_keywords : ''); ?>">
                                    <?php echo $errors->first('meta_keywords', '<p class="help-block">:message</p>'); ?>

                                </div>
                                <div class="col-sm-4 <?php echo e($errors->has('canonical_url') ? 'has-error' : ''); ?>">
                                    <label for="Canonical Url" class="control-label"><?php echo e('Canonical Url'); ?></label>
                                    <input class="form-control" name="canonical_url" type="text" id="canonical_url"
                                        value="<?php echo e(isset($page->canonical_url) ? $page->canonical_url : ''); ?>">
                                    <?php echo $errors->first('canonical_url', '<p class="help-block">:message</p>'); ?>

                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="Meta Description" class="control-label"><?php echo e('Meta Description'); ?></label>
                                    <textarea name="meta_description" class="form-control" id="MetaDescription"
                                        cols="30"
                                        rows="2"><?php echo e(isset($page->meta_description) ? $page->meta_description : ''); ?></textarea>
                                    <?php echo $errors->first('meta_description', '<p class="help-block">:message</p>'); ?>

                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="Featured Image" class="control-label"><?php echo e('Featured Image'); ?></label>
                                    <input class="form-control" name="featured_image" type="file" id="FeatureImage"
                                        accept="image/*"
                                        value="<?php echo e(isset($page->featured_image) ? $page->featured_image : ''); ?>">
                                    <?php echo $errors->first('featured_image', '<p class="help-block">:message</p>'); ?>

                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <input class="btn btn-warning pull-left" type="reset" value="Reset">
                                <input class="btn btn-primary pull-right" type="submit" value="Update Page">
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.panel.design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GITHUB\LIT\resources\views/admin/pages/edit.blade.php ENDPATH**/ ?>