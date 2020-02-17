<div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
    <label for="name" class="control-label"><?php echo e('Name'); ?></label>
    <input class="form-control" name="name" type="text" id="name" value="<?php echo e(isset($permission->name) ? $permission->name : ''); ?>" >
    <?php echo $errors->first('name', '<p class="help-block">:message</p>'); ?>

</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="<?php echo e($formMode === 'edit' ? 'Update' : 'Create'); ?>">
</div>
<?php /**PATH D:\GITHUB\LIT\resources\views/admin/permission/form.blade.php ENDPATH**/ ?>