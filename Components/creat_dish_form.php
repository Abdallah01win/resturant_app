<div class="popup hide-popup" id="new-dish-popup">
        <div class="login-form form">
            <div class="close-form">
                <img src="./Assets/icons/close.svg" alt="">
            </div>
            <div class="logo">Malibu's</div>
            <h3 class="title">Creat New Dish</h3>
            <form action="<?php echo htmlspecialchars('app/routes/creat_dish.php'); ?>" method="POST">
                <div class="form-input">
                    <label for="dish-name">
                        Name
                    </label>
                    <input type="text" name="dish-name" id="dish-name" required>
                </div>
                <div class="form-input">
                    <label for="dish-discription">
                        Discription
                    </label>
                    <input type="text" name="dish-discription" id="dish-discription" required>
                </div>
                <div class="form-double">
                    <div class="form-input">
                        <label for="dish-price">
                            Price
                        </label>
                        <input type="number" name="dish-price" id="dish-price" required>
                    </div>
                    <div class="form-input">
                        <label for="dish-ratting">
                            Ratting
                        </label>
                        <input type="number" name="dish-ratting" id="dish-ratting" required min="1">
                    </div>
                </div>

                <div class="form-input">
                    <label for="dish-category">
                        Category
                    </label>
                    <input type="text" name="dish-category" id="dish-category" required>
                </div>
                <div class="form-input">
                    <label for="dish-img-url">
                        Image Path
                    </label>
                    <input type="text" name="dish-img-url" id="dish-img-url" required>
                </div>
                <div class="btns-container">
                    <button type="submit" name="submit-meal" class="btn-mid">Creat dish</button>
                    <button class="btn-mid close-form">cancal</button>
                </div>
            </form>
        </div>
    </div>