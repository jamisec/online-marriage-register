<section class="my_account_area pt--80 pb--55 bg--white">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="my__account__wrapper">
                    <h3 class="account__title">লগইন</h3>
                    <form method="POST" action="{{ route('login') }}">
                        <div class="account__form">
                            <div class="input__box">
                                <label>Username or email address <span>*</span></label>
                                <input type="email" name="email">
                            </div>
                            <div class="input__box">
                                <label>Password<span>*</span></label>
                                <input type="password" name="password">
                            </div>
                            <div class="form__btn">
                                <button>লগইন করুন</button>
                                <label class="label-for-checkbox">
                                    <input id="rememberme" class="input-checkbox" name="rememberme" value="forever" type="checkbox">
                                    <span>Remember me</span>
                                </label>
                            </div>
                            <a class="forget_pass" href="#">Lost your password?</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="my__account__wrapper">
                    <h3 class="account__title">রেজিস্টার</h3>
                    <form action="#">
                        <div class="account__form">
                            <div class="input__box">
                                <label>Email address <span>*</span></label>
                                <input type="email">
                            </div>
                            <div class="input__box">
                                <label>Password<span>*</span></label>
                                <input type="password">
                            </div>
                            <div class="form__btn">
                                <button>রেজিস্টার করুন</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>