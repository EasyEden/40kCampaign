<?php echo $__env->make('includes/head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="login">
    <h2>Login into an existing account</h2>
    <form action="<?php echo e(route('login')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <input type="text" name="name" placeholder="username"><br><br>
        <input type="text" name="password" placeholder="password"><br>
        <br><button type="submit">Login</button>
    </form>
</div>
<?php /**PATH C:\xampp\htdocs\40kCampaign\resources\views/login.blade.php ENDPATH**/ ?>