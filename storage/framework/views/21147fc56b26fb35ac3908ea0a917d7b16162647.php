<?php $__env->startSection('content'); ?>

<style>
    .fileinput-upload-button {
        display: none;
    }
</style>

<header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-6">
                <h4 class="m-t-5">
                    <i class="fa fa-home"></i>
                    Success Stories
                </h4>
            </div>
        </div>
    </div>
</header>
<div class="outer">
    <div class="container">
        <div class="row">
            <div class="col-md-12 m-auto">
                <div class="card">
                    <div class="card-header">Create New Story</div>
                    <div class="card-body">
                        <a href="<?php echo e(url('/admin/success-stories')); ?>" title="Back"><button class="btn btn-warning btn-sm"><i
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

                        <form method="POST" action="<?php echo e(url('/admin/success-stories')); ?>" accept-charset="UTF-8"
                            class="form-horizontal login_validator" id="form_inline_validator"
                            enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>


                            <div class="form-group row">
                                <div class="col-sm-6 <?php echo e($errors->has('title') ? 'has-error' : ''); ?>">
                                    <label for="title" class="control-label"><?php echo e('Story Title'); ?></label>
                                    <input class="form-control" name="title" type="text" id="StoryTitle"
                                        value="<?php echo e(old('title')); ?>" required>
                                    <?php echo $errors->first('title', '<p class="help-block">:message</p>'); ?>

                                </div>
                                <div class="col-sm-6 <?php echo e($errors->has('slug') ? 'has-error' : ''); ?>">
                                    <label for="slug" class="control-label"><?php echo e('Slug'); ?></label>
                                    <input class="form-control" name="slug" type="text" id="StorySlug"
                                        value="<?php echo e(isset($page->slug) ? $page->slug : ''); ?>" required>
                                    <?php echo $errors->first('slug', '<p class="help-block">:message</p>'); ?>

                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 <?php echo e($errors->has('content') ? 'has-error' : ''); ?>">
                                    <label for="content" class="control-label"><?php echo e('Content'); ?></label>
                                    <textarea class="form-control my-editor" rows="5" name="content" type="textarea" id="content"
                                        required><?php echo e(old('content')); ?></textarea>
                                    <?php echo $errors->first('content', '<p class="help-block">:message</p>'); ?>

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
                                    <label for="Feature Image" class="control-label"><?php echo e('Feature Image'); ?></label>
                                    <input id="input-21" type="file" accept="image/*" name="feature_image" class="form-control file-loading" value="<?php echo e(old('feature_image')); ?>">
                                    <?php echo $errors->first('feature_image', '<p class="help-block">:message</p>'); ?>

                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <input class="btn btn-warning pull-left" type="reset" value="Reset">
                                <input class="btn btn-primary pull-right" type="submit" value="Create Page">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.panel.design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GITHUB\LIT\resources\views/admin/success-story/create.blade.php ENDPATH**/ ?>