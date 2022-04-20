<div class="popup hide-popup" id="signup-popup">
        <div class="sign-up-form form">
            <div class="close-form">
                <img src="./Assets/icons/close.svg" alt="">
            </div>
            <div class="logo">Malibu's</div>
            <h3 class="title">Sign Up Now</h3>
            <form action="<?php echo htmlspecialchars('app/routes/sign_up.php');?>" method="POST">
                <div class="form-input">
                    <label for="name">
                        User Name
                    </label>
                    <input type="text" name="name" maxlength="10" id="name" required>
                </div>
                <div class="form-input">
                    <label for="email">
                        Email Adress
                    </label>
                    <input type="email" name="sign-up-email" id="sign-up-email" required>
                </div>
                <div class="form-input">
                    <label for="password">
                        Password
                    </label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="btns-container">
                    <button type="submit" name="sign_up_submit" class="btn-mid">Sign up</button>
                    <button class="btn-mid form-toggle">Login</button>
                </div>
            </form>
        </div>
    </div>