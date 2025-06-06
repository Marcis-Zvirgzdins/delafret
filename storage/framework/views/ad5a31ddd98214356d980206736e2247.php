<div class="navbar mw14 center">
    <a href="<?php echo e(route('index')); ?>" class="logo">
        <img src="assets/logo-title-w-1200-400.png" alt="Delafret">
    </a>

    <div class="profile">
        <?php if(auth()->guard()->guest()): ?>
            <a href="<?php echo e(route('login')); ?>" class="button">Pierakstīties</a>
            <a href="<?php echo e(route('register')); ?>" class="button">Reģistrēties</a>
        <?php else: ?>
            <a href="<?php echo e(route('profile')); ?>">
                <div class="user">
                    <?php echo e(auth()->user()->username); ?>

                    <?php if(auth()->user()->profile_picture): ?>
                        <img src="<?php echo e(asset('storage/' . auth()->user()->profile_picture)); ?>" alt="Profile">
                    <?php else: ?>
                        <img src="assets/user-icon-blank-512.png" alt="Profile Picture">
                    <?php endif; ?>
                </div>
            </a>
            
            <form method="POST" action="<?php echo e(route('logout')); ?>" onsubmit="this.querySelector('button').disabled = true;">
                <?php echo csrf_field(); ?>
                <button type="submit" class="button">Izrakstīties</button>
            </form>
        <?php endif; ?>
    </div>

    <div class=misc>
        <button type="button" class="button"><img src="icons/search-b-32.svg" alt="Search"></button> 
    </div>
</div>
<div class="category mw14 center">
    <a href="/" class="games">Videospēles</a>
    <a href="/" class="tech">Tehnoloģija</a>
    <a href="/" class="movies">Filmas & TV</a>
    <a href="/" class="entertainment">Izklaides</a>
</div><?php /**PATH C:\Wamp.NET\sites\delafret.net\resources\views/components/navbar.blade.php ENDPATH**/ ?>