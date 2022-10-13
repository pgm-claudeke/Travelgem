<div class="form-box">
    <div class="form-box__title-box">
        <h3 class="form-box__title">@yield('form title')</h3>
        <p>@yield('form description')</p>
    </div>
    <div class="form-box__container">
        @yield('form')
    </div>
    <div class="form-box__register">
        <p>Don't have an account?</p>
        <a href="" class="btn btn--large btn--reversed">Sign up</a>
    </div>
</div>

