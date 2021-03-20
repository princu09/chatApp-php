<?php include_once "php/header.inc.php" ?>

<div class="wrapper">
    <section class="form login">
        <header>RealTime Chat App</header>
        <form action="#" autocomplete="off">
            <div class="error-txt"></div>
            <div class="field input">
                <label for="">Email Address</label>
                <input type="text" name="email" placeholder="Enter Your Email">
            </div>
            <div class="field input">
                <label for="">Password</label>
                <input type="password" name="password" placeholder="Enter New Password">
                <i class="fas fa-eye"></i>
            </div>
            <div class="field button">
                <input type="submit" value="Continue to Chat">
            </div>
        </form>
        <div class="link">Not yet Signed Up ? <a href="index.php">Signup Now</a></div>
    </section>
</div>

<script src="js/login.js"></script>
<script src="js/pass-show-hide.js"></script>

<?php include_once "php/footer.inc.php" ?>