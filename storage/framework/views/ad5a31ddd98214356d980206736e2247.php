<div class="navbar mw14 center">
    <a href="<?php echo e(route('index')); ?>" class="logo">
        <img src="assets/logo-title-w-1200-400.png" alt="Delafret">
    </a>

    <div class="profile">
        <?php if(auth()->guard()->guest()): ?>
            <a href="<?php echo e(route('login')); ?>" class="button">Pierakstīties</a>
            <a href="<?php echo e(route('register')); ?>" class="button">Reģistrēties</a>
        <?php else: ?>
            <div class="user">
                <?php echo e(auth()->user()->username); ?>

                <img src="assets/user-icon-blank-512.png" alt="Profile">
            </div>
            
            <form method="POST" action="<?php echo e(route('logout')); ?>" style="display: inline;">
                <?php echo csrf_field(); ?>
                <button type="submit" class="button">Izrakstīties</button>
            </form>
        <?php endif; ?>
    </div>

    <div class=misc>
        <button type="button">Meklēt</button> 
    </div>
</div>
<div class="category mw14 center">
    <a href="/">Videospēles</a>
    <a href="/">Tehnoloģija</a>
    <a href="/">Filmas Un TV</a>
    <a href="/">Izklaides</a>
</div><?php /**PATH C:\Wamp.NET\sites\delafret.net\resources\views/components/navbar.blade.php ENDPATH**/ ?>