<div class="popup hide-popup" id="checkout-popup">
    <div class="login-form form">
        <div class="close-form">
            <img src="./Assets/icons/close.svg" alt="">
        </div>
        <div class="logo">Malibu's</div>
        <h3 class="title">Checkout</h3>
        <div>
            <!-- form -->
            <div class="form-input">
                <label for="cc-num">
                    Credit Card Number
                </label>
                <input type="tel" inputmode="numeric" pattern="[0-9\s]{13,19}" autocomplete="cc-number" maxlength="19" placeholder="xxxx xxxx xxxx xxxx" name="cc-num" required>
            </div>
            <div class="form-double">
            <div class="form-input">
                <label for="name-on-card">
                    Name on Card
                </label>
                <input type="text" name="name-on-card" required>
            </div>
            <div class="form-input">
                <label for="ccv">
                    CCV
                </label>
                <input type="tel" name="ccv" maxlength="4" required>
            </div>
            </div>
            
            <div class="form-input">
                <label for="adress">
                    Dilivery Address
                </label>
                <input type="adress" name="adress" required>
            </div>
            <div class="btns-container">
                <button type="submit" name="" class="btn-mid">Place Order</button>
                <a class="btn-mid form-toggle">Cancel</a>
            </div>
        </div> <!-- form -->
    </div>
</div>