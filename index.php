<?php include_once "php/header.inc.php" ?>

<div class="wrapper">
    <section class="form signup">
        <header>RealTime Chat App</header>
        <form action="#" enctype="multipart/form-data">
            <div class="error-txt">This is an error message !</div>
            <div class="name-details">
                <div class="field input">
                    <label for="">First Name</label>
                    <input type="text" name="fname" placeholder="First Name" require>
                </div>
                <div class="field input">
                    <label for="">Last Name</label>
                    <input type="text" name="lname" placeholder="Last Name" require>
                </div>
            </div>
            <div class="field input">
                <label for="">Email Address</label>
                <input type="text" name="email" placeholder="Enter Your Email" require>
            </div>
            <div class="field input">
                <label for="">Password</label>
                <input type="password" name="password" placeholder="Enter New Password" require>
                <i class="fas fa-eye"></i>
            </div>
            <div class="field image">
                <label for="">Select Image</label>
                <input type="file" name="image" require>
            </div>
            <div class="field button">
                <input type="submit" value="Continue to Chat">
            </div>
        </form>
        <div class="link">Already Signed Up ? <a href="login.php">Login Now</a></div>
    </section>
</div>

<script src="js/signup.js"></script>
<script src="js/pass-show-hide.js"></script>

<?php include_once "php/footer.inc.php" ?>