<?php echo $__env->make('includes/head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="register">
    <h2>Register new account</h2>
    <form action="<?php echo e(route('register')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <input type="text" name="name" placeholder="username"><br><br>
        <input type="password" name="password" placeholder="password"><br>
        <br><button type="submit">Register</button>
    </form>
</div>

<?php /**PATH C:\xampp\htdocs\40kCampaign\resources\views/register.blade.php ENDPATH**/ ?>