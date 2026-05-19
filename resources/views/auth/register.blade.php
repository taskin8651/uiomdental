@extends('frontend.master')

@section('content')

<div class="auth-premium-page">

    <div class="auth-bg-shape auth-shape-one"></div>
    <div class="auth-bg-shape auth-shape-two"></div>

    <div class="auth-wrapper">

        {{-- LEFT SIDE --}}
        <div class="auth-brand-panel">
            <div class="auth-brand-content">
                <span class="auth-badge">
                    <i class="fas fa-tooth"></i>
                    New Admin Account
                </span>

                <h1>
                    Create your clinic admin account securely.
                </h1>

                <p>
                    Register to manage services, gallery, testimonials, FAQ, dentist profile,
                    clinic timings and website content from one clean dashboard.
                </p>

                <div class="auth-stats">
                    <div>
                        <strong>CMS</strong>
                        <span>Easy Manage</span>
                    </div>

                    <div>
                        <strong>Safe</strong>
                        <span>Secure Signup</span>
                    </div>

                    <div>
                        <strong>Fast</strong>
                        <span>Quick Access</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- RIGHT SIDE --}}
        <div class="auth-form-panel">

            <div class="auth-card">

                <div class="auth-card-head">
                    <div class="auth-logo-icon">
                        <i class="fas fa-user-plus"></i>
                    </div>

                    <h2>Create Account</h2>

                    <p>
                        Register for {{ trans('panel.site_title') }}
                    </p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="auth-form">
                    @csrf

                    {{-- NAME --}}
                    <div class="auth-field">
                        <label for="name">
                            {{ trans('global.user_name') }}
                        </label>

                        <div class="auth-input-wrap">
                            <i class="fas fa-user"></i>

                            <input type="text"
                                   name="name"
                                   id="name"
                                   value="{{ old('name') }}"
                                   required
                                   autofocus
                                   placeholder="Enter full name"
                                   class="{{ $errors->has('name') ? 'is-invalid' : '' }}">
                        </div>

                        @if($errors->has('name'))
                            <p class="auth-error">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $errors->first('name') }}
                            </p>
                        @endif
                    </div>

                    {{-- EMAIL --}}
                    <div class="auth-field">
                        <label for="email">
                            {{ trans('global.login_email') }}
                        </label>

                        <div class="auth-input-wrap">
                            <i class="fas fa-envelope"></i>

                            <input type="email"
                                   name="email"
                                   id="email"
                                   value="{{ old('email') }}"
                                   required
                                   placeholder="admin@example.com"
                                   class="{{ $errors->has('email') ? 'is-invalid' : '' }}">
                        </div>

                        @if($errors->has('email'))
                            <p class="auth-error">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $errors->first('email') }}
                            </p>
                        @endif
                    </div>

                    {{-- PASSWORD --}}
                    <div class="auth-field">
                        <label for="password">
                            {{ trans('global.login_password') }}
                        </label>

                        <div class="auth-input-wrap">
                            <i class="fas fa-lock"></i>

                            <input type="password"
                                   name="password"
                                   id="password"
                                   required
                                   placeholder="Create password"
                                   class="{{ $errors->has('password') ? 'is-invalid' : '' }}">

                            <button type="button" class="auth-eye-btn" onclick="togglePassword('password', 'passwordEye')">
                                <i id="passwordEye" class="fas fa-eye"></i>
                            </button>
                        </div>

                        @if($errors->has('password'))
                            <p class="auth-error">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $errors->first('password') }}
                            </p>
                        @endif
                    </div>

                    {{-- CONFIRM PASSWORD --}}
                    <div class="auth-field">
                        <label for="password_confirmation">
                            {{ trans('global.login_password_confirmation') }}
                        </label>

                        <div class="auth-input-wrap">
                            <i class="fas fa-shield-alt"></i>

                            <input type="password"
                                   name="password_confirmation"
                                   id="password_confirmation"
                                   required
                                   placeholder="Confirm password">

                            <button type="button" class="auth-eye-btn" onclick="togglePassword('password_confirmation', 'confirmEye')">
                                <i id="confirmEye" class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    {{-- REGISTER BUTTON --}}
                    <button type="submit" class="auth-submit-btn">
                        <i class="fas fa-user-plus"></i>
                        {{ trans('global.register') }}
                    </button>

                    {{-- LOGIN LINK --}}
                    <div class="auth-register">
                        <span>Already have an account?</span>
                        <a href="{{ route('login') }}">
                            Login
                        </a>
                    </div>

                </form>

            </div>

            <p class="auth-copy">
                © {{ date('Y') }} {{ trans('panel.site_title') }}. All rights reserved.
            </p>

        </div>

    </div>
</div>

<style>
.auth-premium-page {
    position: relative;
    min-height: 100vh;
    overflow: hidden;
    background:
        radial-gradient(circle at 12% 18%, rgba(0, 188, 212, 0.18), transparent 32%),
        radial-gradient(circle at 88% 75%, rgba(0, 125, 145, 0.14), transparent 35%),
        linear-gradient(135deg, #f7fdff 0%, #ffffff 48%, #eefcff 100%);
    font-family: "Inter", sans-serif;
    color: var(--text, #4b6475);
}

.auth-premium-page::before {
    content: "";
    position: absolute;
    inset: 0;
    background-image:
        linear-gradient(rgba(0, 166, 184, 0.038) 1px, transparent 1px),
        linear-gradient(90deg, rgba(0, 166, 184, 0.038) 1px, transparent 1px);
    background-size: 44px 44px;
    pointer-events: none;
}

.auth-bg-shape {
    position: absolute;
    border-radius: 999px;
    pointer-events: none;
    filter: blur(5px);
}

.auth-shape-one {
    width: 330px;
    height: 330px;
    left: -135px;
    top: 80px;
    background: linear-gradient(135deg, rgba(0, 213, 240, 0.20), rgba(0, 125, 145, 0.08));
}

.auth-shape-two {
    width: 470px;
    height: 470px;
    right: -205px;
    bottom: -190px;
    background: linear-gradient(135deg, rgba(0, 125, 145, 0.13), rgba(0, 188, 212, 0.08));
}

.auth-wrapper {
    position: relative;
    z-index: 2;
    min-height: 100vh;
    display: grid;
    grid-template-columns: 1.05fr 0.95fr;
}

.auth-brand-panel {
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    padding: 70px;
    color: #ffffff;
    background:
        radial-gradient(circle at 10% 20%, rgba(255,255,255,0.22), transparent 30%),
        linear-gradient(135deg, #041e2f 0%, #06283d 48%, #031724 100%);
}

.auth-brand-panel::before {
    content: "";
    position: absolute;
    inset: 0;
    background-image:
        linear-gradient(rgba(126, 231, 243, 0.045) 1px, transparent 1px),
        linear-gradient(90deg, rgba(126, 231, 243, 0.045) 1px, transparent 1px);
    background-size: 44px 44px;
}

.auth-brand-content {
    position: relative;
    z-index: 2;
    max-width: 650px;
}

.auth-badge {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 24px;
    padding: 10px 17px;
    border-radius: 999px;
    color: #eaffff;
    font-size: 13px;
    font-weight: 900;
    background: rgba(255,255,255,.12);
    border: 1px solid rgba(255,255,255,.20);
    backdrop-filter: blur(14px);
}

.auth-badge i {
    width: 28px;
    height: 28px;
    display: grid;
    place-items: center;
    border-radius: 50%;
    color: #007d91;
    background: #ffffff;
}

.auth-brand-content h1 {
    margin: 0 0 24px;
    max-width: 680px;
    color: #ffffff;
    font-size: clamp(42px, 5vw, 66px);
    line-height: 1.03;
    letter-spacing: -2px;
    font-weight: 950;
}

.auth-brand-content p {
    max-width: 620px;
    color: rgba(255,255,255,.76);
    font-size: 17px;
    line-height: 1.85;
    font-weight: 500;
}

.auth-stats {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 16px;
    margin-top: 42px;
}

.auth-stats div {
    padding: 22px 20px;
    border-radius: 26px;
    background: rgba(255,255,255,.10);
    border: 1px solid rgba(255,255,255,.14);
    backdrop-filter: blur(14px);
}

.auth-stats strong {
    display: block;
    color: #ffffff;
    font-size: 26px;
    line-height: 1;
    font-weight: 950;
}

.auth-stats span {
    display: block;
    margin-top: 8px;
    color: rgba(255,255,255,.68);
    font-size: 12px;
    font-weight: 800;
}

.auth-form-panel {
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding: 50px 28px;
}

.auth-card {
    width: min(100%, 500px);
    margin: 0 auto;
    overflow: hidden;
    border-radius: 38px;
    background: linear-gradient(145deg, rgba(255,255,255,.98), rgba(244,252,255,.92));
    border: 1px solid rgba(6, 40, 61, 0.08);
    box-shadow: 0 34px 90px rgba(6, 40, 61, 0.14), 0 12px 34px rgba(0, 166, 184, 0.08);
}

.auth-card-head {
    text-align: center;
    padding: 34px 34px 24px;
    border-bottom: 1px solid rgba(6, 40, 61, 0.07);
}

.auth-logo-icon {
    width: 70px;
    height: 70px;
    margin: 0 auto 18px;
    display: grid;
    place-items: center;
    border-radius: 26px;
    color: #ffffff;
    font-size: 26px;
    background:
        radial-gradient(circle at 30% 24%, rgba(255,255,255,.42), transparent 32%),
        linear-gradient(135deg, #00d5f0 0%, #00a6b8 45%, #007d91 100%);
    box-shadow: 0 18px 38px rgba(0,166,184,.30);
}

.auth-card-head h2 {
    margin: 0;
    color: #06283d;
    font-size: 31px;
    line-height: 1.1;
    letter-spacing: -1px;
    font-weight: 950;
}

.auth-card-head p {
    margin: 8px 0 0;
    color: #617989;
    font-size: 14px;
    font-weight: 600;
}

.auth-form {
    padding: 30px 34px 34px;
}

.auth-field {
    margin-bottom: 18px;
}

.auth-field label {
    display: block;
    margin-bottom: 9px;
    color: #06283d;
    font-size: 14px;
    font-weight: 900;
}

.auth-input-wrap {
    position: relative;
}

.auth-input-wrap > i {
    position: absolute;
    left: 17px;
    top: 50%;
    transform: translateY(-50%);
    color: #00a6b8;
    font-size: 15px;
}

.auth-input-wrap input {
    width: 100%;
    height: 56px;
    padding: 0 52px 0 48px;
    border-radius: 20px;
    outline: none;
    color: #06283d;
    font-size: 15px;
    font-weight: 700;
    background: linear-gradient(145deg, rgba(255,255,255,.96), rgba(248,252,253,.94));
    border: 1px solid rgba(6, 40, 61, 0.09);
    box-shadow: 0 10px 24px rgba(6, 40, 61, 0.045);
    transition: .3s ease;
}

.auth-input-wrap input::placeholder {
    color: #8aa0ad;
    font-weight: 700;
}

.auth-input-wrap input:focus {
    border-color: rgba(0, 166, 184, 0.45);
    background: #ffffff;
    box-shadow: 0 0 0 4px rgba(0, 188, 212, 0.11), 0 16px 34px rgba(0, 166, 184, 0.09);
}

.auth-input-wrap input.is-invalid {
    border-color: rgba(239, 68, 68, .65);
}

.auth-eye-btn {
    position: absolute;
    right: 16px;
    top: 50%;
    transform: translateY(-50%);
    border: 0;
    background: transparent;
    color: #7b93a1;
    cursor: pointer;
    font-size: 15px;
}

.auth-eye-btn:hover {
    color: #007d91;
}

.auth-error {
    display: flex;
    align-items: center;
    gap: 6px;
    margin-top: 8px;
    color: #dc2626;
    font-size: 12px;
    font-weight: 700;
}

.auth-submit-btn {
    position: relative;
    overflow: hidden;
    width: 100%;
    min-height: 58px;
    border: 0;
    border-radius: 999px;
    cursor: pointer;
    color: #ffffff;
    font-size: 15px;
    font-weight: 950;
    background:
        radial-gradient(circle at 25% 20%, rgba(255,255,255,.36), transparent 30%),
        linear-gradient(135deg, #00d5f0 0%, #00a6b8 45%, #007d91 100%);
    box-shadow: 0 18px 38px rgba(0, 166, 184, 0.30);
    transition: .35s ease;
}

.auth-submit-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 24px 50px rgba(0, 166, 184, 0.38);
}

.auth-register {
    margin-top: 22px;
    text-align: center;
    color: #617989;
    font-size: 14px;
    font-weight: 650;
}

.auth-register a {
    color: #007d91;
    font-size: 14px;
    font-weight: 900;
    text-decoration: none;
}

.auth-register a:hover {
    color: #06283d;
}

.auth-copy {
    width: min(100%, 500px);
    margin: 22px auto 0;
    text-align: center;
    color: #7f97a6;
    font-size: 13px;
    font-weight: 600;
}

@media (max-width: 991px) {
    .auth-wrapper {
        grid-template-columns: 1fr;
    }

    .auth-brand-panel {
        display: none;
    }

    .auth-form-panel {
        min-height: 100vh;
        padding: 34px 18px;
    }
}

@media (max-width: 520px) {
    .auth-card {
        border-radius: 28px;
    }

    .auth-card-head {
        padding: 28px 22px 20px;
    }

    .auth-card-head h2 {
        font-size: 27px;
    }

    .auth-form {
        padding: 24px 20px 28px;
    }

    .auth-input-wrap input {
        height: 53px;
        border-radius: 17px;
        font-size: 14px;
    }

    .auth-submit-btn {
        min-height: 54px;
    }
}
</style>

<script>
function togglePassword(inputId, eyeId) {
    const input = document.getElementById(inputId);
    const eye = document.getElementById(eyeId);

    if (!input || !eye) return;

    if (input.type === 'password') {
        input.type = 'text';
        eye.classList.remove('fa-eye');
        eye.classList.add('fa-eye-slash');
    } else {
        input.type = 'password';
        eye.classList.remove('fa-eye-slash');
        eye.classList.add('fa-eye');
    }
}
</script>

@endsection