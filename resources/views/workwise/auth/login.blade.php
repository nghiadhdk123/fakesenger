<!DOCTYPE html>
<html>

{{-- Header --}}
@include('workwise.includes.header', ['title' => 'WorkWise - Đăng nhập hoặc đăng ký'])

<body class="sign-in">
    <div class="wrapper">
        <div class="sign-in-page">
            <div class="signin-popup">
                <div class="signin-pop">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="cmp-info">
                                <div class="cm-logo">
                                    <img src="/workwise/images/cm-logo.png" alt>
                                    <p>Workwise, là một nền tảng trao đổi trên mạng xã hội, nơi mọi người và chuyên gia độc lập kết nối và cộng tác từ xa</p>
                                </div>
                                <img src="/workwise/images/cm-main-img.png" alt>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="login-sec">
                                <ul class="sign-control">
                                    <li data-tab="tab-1" class="current"><a href="#" title>Đăng nhập</a></li>
                                    <li data-tab="tab-2"><a href="#" title>Đăng ký</a></li>
                                </ul>
                                <div class="sign_in_sec " id="tab-1">
                                    <h3>Đăng nhập</h3>
                                    <form>
                                        <div class="row">
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input type="text" name="email" placeholder="Email">
                                                    <i class="la la-user"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input type="password" name="password" placeholder="Mật khẩu">
                                                    <i class="la la-lock"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="checky-sec">
                                                    <div class="fgt-sec">
                                                        <input type="checkbox" name="cc" id="c1">
                                                        <label for="c1">
                                                            <span></span>
                                                        </label>
                                                        <small>Ghi nhớ đăng nhập</small>
                                                    </div>
                                                    <a href="#" title>Quên mật khẩu?</a>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <button type="submit" value="submit">Đăng nhập</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="login-resources">
                                        <h4>Đăng nhập qua tài khoản xã hội</h4>
                                        <ul>
                                            <li><a href="#" title class="fb"><i
                                                        class="fa fa-facebook"></i>Đăng nhập với tài khoản Facebook</a></li>
                                            <li><a href="#" title class="tw"><i
                                                        class="fa fa-google"></i>Đăng nhập với tài khoản Google</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="sign_in_sec current" id="tab-2">
                                    <h3>Đăng ký</h3>
                                    <div class="dff-tab current" id="tab-3">
                                        <form>
                                            <div class="row">
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="text" name="name" placeholder="Họ và tên">
                                                        <i class="la la-user"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="text" name="country" placeholder="Email">
                                                        <i class="la la-envelope"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="password" name="password" placeholder="Mật khẩu">
                                                        <i class="la la-lock"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="password" name="repeat-password"
                                                            placeholder="Nhập lại nhập khẩu">
                                                        <i class="la la-lock"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="checky-sec st2">
                                                        <div class="fgt-sec">
                                                            <input type="checkbox" name="cc" id="c2">
                                                            <label for="c2">
                                                                <span></span>
                                                            </label>
                                                            <small>Có, tôi hiểu và đồng ý với Điều khoản & Điều kiện WorkWise.</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <button type="submit" value="submit">Đăng ký</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footy-sec">
                <div class="container">
                    <p><img src="/workwise/images/copy-icon.png" alt>2023 WorkWise. Được phát triển bởi DNDev</p>
                </div>
            </div>
        </div>
    </div>
    
    {{-- Footer --}}
    @include('workwise.includes.footer')
</body>

<!-- Mirrored from gambolthemes.net/workwise-new/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Apr 2023 14:59:04 GMT -->

</html>
