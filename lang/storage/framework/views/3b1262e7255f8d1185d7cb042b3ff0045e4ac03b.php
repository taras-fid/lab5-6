<?php $__env->startSection('title'); ?>
    registration page
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
    input {
        position: absolute;
        width: 260px;
        height: 45px;
        left: 40px;
        background: rgba(255,255,255,0.0);
        border: none;

        font-family: 'Montserrat';
        font-weight: 100;
        font-size: 14px;
        line-height: 20px;
        color: black;
    }
    *:focus {
        outline: none;
    }
    ::placeholder {
        color: gray;
    }
    .log_in_page {
        position: relative;
        width: 330px;
        top: 50px;
        left: 0%;
        margin: 0 auto;  /*позиционирование по центру*/
    }
    .log_in_page .log_in_box li {
        position: relative;
        width: 300px;
        height: 45px;
        border: solid black;
        border-radius: 4px;
        border-width: 1px;
        list-style-type: none;
    }
    .log_in_page .log_in_box h5 {
        position: relative;
        top: 23px;
        right: 0px;
        font-family: 'Montserrat';
        font-weight: 500;
        font-size: 18px;
        line-height: 20px;
        text-align: right;
        color: black;
    }
    .log_in_page .log_in_box button {
        position: relative;
        top: 32px;
        width: 300px;
        height: 45px;
        bottom: 159px;
        background: #FFD912;
        border-radius: 5px;
        border: none; /*рамка*/
    }

    .log_in_page .log_in_box button a {
        color: black;
        position: absolute;
        width: 300px;
        height: 45px;
        left: 0px;
        top: 0px;
        font-family: 'Montserrat';
        font-weight: 600;
        font-size: 16px;
        line-height: 45px;
        letter-spacing: 0.05em;
        border-radius: 5px;
    }

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="log_in_page">
        <h1 style="position:relative; left: 10%">Registration</h1>
        <form action="registration/check" method="POST">
            <?php echo csrf_field(); ?>
            <ul class="log_in_box">
                <li>
                    <input type="text" name="login" placeholder="ЛОГІН.." />
                </li>
                <li style=" top: 17px;">
                    <input type="password" name="password" placeholder="ПАРОЛЬ.." />
                </li>
                <li style=" top: 34px;">
                    <input type="password" name="rep_password" placeholder="ПАРОЛЬ.." />
                </li>
                <a href="login"><h5 style="top: 40px;">Увійти</h5></a>
                <button style=" top: 45px;" type="submit">Зареєструватись</button>
                <?php if($errors): ?>
                    <?php $__currentLoopData = $errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <h2 style="position:relative; top: 50px; color: red; font-size: 20px;">ERROR: <?php echo e($error); ?></h2>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </ul>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\taras\lab5\resources\views/registration.blade.php ENDPATH**/ ?>