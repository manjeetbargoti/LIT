<!-- footer Box -->

<footer>
    <div class="container">
        <div class="row ">
            <div class="col-md-12 col-lg-3 pr-5">
                <img src="<?php echo e(asset('front/dist/img/logo.png')); ?>" class="mb-3" alt="" />
                <p> Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or
                    web designs.</p>
                <p> Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or
                    web designs.</p>
            </div>

            <div class="col-md-12 col-lg-3 pr-5">
                <h5 class="h5"> Address: </h5>
                <address>
                    <p> <?php echo config('app.address'); ?> </p>
                </address>

                <h5 class="h5"> Email: </h5>
                <p> <?php echo e(config('app.email')); ?> </p>

                <h5 class="h5"> Follow: </h5>
                <ul class="social">
                    <li> <a href="<?php echo e(config('app.twitter')); ?>"> <i class="fa fa-twitter"> </i> </a> </li>
                    <li> <a href="<?php echo e(config('app.fb')); ?>"> <i class="fa fa-facebook"> </i> </a> </li>
                    <li> <a href="<?php echo e(config('app.insta')); ?>"> <i class="fa fa-instagram"> </i> </a> </li>
                </ul>
            </div>

            <div class="col-md-12 col-lg-4">
                <h5 class="h5"> Instagram: </h5>
                <div class="instabx">
                    <img src="<?php echo e(asset('front/dist/img/home/insta1.jpg')); ?>" class="img-fluid" />
                    <img src="<?php echo e(asset('front/dist/img/home/insta2.jpg')); ?>" class="img-fluid" />
                    <img src="<?php echo e(asset('front/dist/img/home/insta3.jpg')); ?>" class="img-fluid" />
                    <img src="<?php echo e(asset('front/dist/img/home/insta4.jpg')); ?>" class="img-fluid" />
                    <img src="<?php echo e(asset('front/dist/img/home/insta5.jpg')); ?>" class="img-fluid" />
                    <img src="<?php echo e(asset('front/dist/img/home/insta6.jpg')); ?>" class="img-fluid" />
                </div>
            </div>

            <div class="col-md-12 col-lg-2">
                <h5 class="h5"> Useful Links: </h5>
                <ul class="ulinks">
                    <li> <a href="<?php echo e(url('/about-us')); ?>"> About us </a> </li>
                    <li> <a href="<?php echo e(url('/csr-market-place')); ?>">CSR Market Place</a> </li>
                    <li> <a href="<?php echo e(url('/success-stories')); ?>"> Success Story </a> </li>
                    <li> <a href="<?php echo e(url('/contact-us')); ?>"> Contact Us </a> </li>
                </ul>
            </div>

            <div class="col-md-12 col-lg-12 btmfooter mt-5">
                <p> <?php echo config('app.copyright'); ?> </p>
                <ul class="ulinks">
                    <li> <a href="#"> Privacy Policy </a> </li>
                    <li> <a href="#"> | </a> </li>
                    <li> <a href="#"> Terms Of Services</a> </li>
                </ul>
            </div>
        </div>
    </div>

</footer>

<?php if(session('cart')): ?>

<?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="QueryForm<?php echo e($details['rid']); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo e($details['name']); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(url('/submit-query')); ?>" method="Post">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Full Name">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email Address">
                    </div>
                    <div class="form-group">
                        <input type="tel" name="phone" class="form-control" placeholder="Phone Number">
                    </div>
                    <div class="form-group">
                        <input type="text" name="position" class="form-control" placeholder="Position">
                    </div>
                    <div class="form-group">
                        <input type="text" name="organization" class="form-control" placeholder="Organization">
                    </div>
                    <div class="form-group d-none">
                        <input type="text" name="type" class="form-control" value="<?php echo e($details['type']); ?>">
                    </div>
                    <div class="form-group d-none">
                        <input type="text" name="impact_id" class="form-control" value="<?php echo e($details['id']); ?>">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                </form>
            </div>
            <!-- <div class="modal-footer"> -->
                <!-- <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Close</button> -->
                <!-- <input type="submit" class="btn btn-primary" value="Submit"> -->
            <!-- </div> -->
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?><?php /**PATH D:\GITHUB\LIT\resources\views/layouts/front/footer2.blade.php ENDPATH**/ ?>