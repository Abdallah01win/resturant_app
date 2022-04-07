<div class="popup hide-popup" id="login-popup">
        <div class="login-form form">
            <div class="close-form">
                <img src="./Assets/icons/close.svg" alt="">
            </div>
            <div class="logo">Malibu's</div>
            <h3 class="title">Login Now</h3>
            <form action="<?php echo htmlspecialchars('app/routes/login.php');?>" method="POST">
                <div class="form-input">
                    <label for="login-email">
                        Email Adress
                    </label>
                    <input type="email" name="login-email" id="login-email" required>
                </div>
                <div class="form-input">
                    <label for="password">
                        Password
                    </label>
                    <input type="password" name="password" id="login-password" required>
                </div>
                <div class="form-input">
                    <label for="c-password">
                        Confirm Password
                    </label>
                    <input type="password" name="c-password" id="c-password" required>
                </div>
                <div class="btns-container">
                    <button type="submit" name="login_submit"  class="btn-mid">Login</button>
                    <button class="btn-mid form-toggle">Sign up</button>
                </div>
            </form>
        </div>
    </div>