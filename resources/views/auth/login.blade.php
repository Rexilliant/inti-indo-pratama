<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Minimalis</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      background-color: #f7faf8;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }

    .login-card {
      background: #ffffff;
      width: 100%;
      max-width: 400px;
      padding: 40px 32px;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
      border-top: 5px solid #2e7d32; /* Aksen hijau */
    }

    .header-text {
      text-align: center;
      margin-bottom: 24px;
    }

    .header-text h2 {
      color: #1f2937;
      font-size: 24px;
      font-weight: 700;
    }

    .header-text p {
      color: #6b7280;
      font-size: 14px;
      margin-top: 6px;
    }

    /* Alert Banner (Global Error / Session Error) */
    .alert-error {
      background-color: #fef2f2;
      border-left: 4px solid #ef4444;
      color: #991b1b;
      padding: 12px 14px;
      border-radius: 6px;
      font-size: 13px;
      margin-bottom: 20px;
      line-height: 1.4;
    }

    .alert-error ul {
      margin-left: 16px;
      margin-top: 4px;
    }

    .form-group {
      margin-bottom: 18px;
    }

    .form-group label {
      display: block;
      font-size: 13px;
      font-weight: 600;
      color: #374151;
      margin-bottom: 8px;
    }

    .form-group input {
      width: 100%;
      padding: 12px 14px;
      border: 1.5px solid #e5e7eb;
      border-radius: 8px;
      font-size: 14px;
      color: #1f2937;
      background-color: #fff;
      transition: all 0.2s ease;
      outline: none;
    }

    .form-group input:focus {
      border-color: #2e7d32; /* Fokus hijau */
      box-shadow: 0 0 0 3px rgba(46, 125, 50, 0.12);
    }

    /* State Input Error */
    .form-group input.is-invalid {
      border-color: #ef4444;
      background-color: #fffdfd;
    }

    .form-group input.is-invalid:focus {
      box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.15);
    }

    .invalid-feedback {
      color: #dc2626;
      font-size: 12px;
      margin-top: 6px;
      display: block;
      font-weight: 500;
    }

    .form-actions {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 24px;
      font-size: 13px;
    }

    .remember-me {
      display: flex;
      align-items: center;
      gap: 6px;
      color: #4b5563;
      cursor: pointer;
    }

    .remember-me input {
      accent-color: #2e7d32;
    }

    .btn-login {
      width: 100%;
      padding: 13px;
      background-color: #ff7043; /* Tombol oranye energik */
      color: #ffffff;
      border: none;
      border-radius: 8px;
      font-size: 15px;
      font-weight: 600;
      cursor: pointer;
      transition: background-color 0.2s ease, transform 0.1s ease;
    }

    .btn-login:hover {
      background-color: #f4511e;
    }

    .btn-login:active {
      transform: scale(0.99);
    }
  </style>
</head>
<body>

  <div class="login-card">
    <div class="header-text">
      <h2>Selamat Datang</h2>
      <p>Masuk ke akun Anda untuk melanjutkan</p>
    </div>

    {{-- Pesan error flash session (opsional, jika dikirim via with('error', '...')) --}}
    @if (session('error'))
      <div class="alert-error">
        {{ session('error') }}
      </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <div class="form-group">
        <label for="email">Email</label>
        <input 
          type="email" 
          id="email" 
          name="email" 
          value="{{ old('email') }}" 
          class="@error('email') is-invalid @enderror" 
          placeholder="nama@email.com" 
          required 
          autofocus 
        />
        @error('email')
          <span class="invalid-feedback">{{ $message }}</span>
        @enderror
      </div>

      <div class="form-group">
        <label for="password">Kata Sandi</label>
        <input 
          type="password" 
          id="password" 
          name="password" 
          class="@error('password') is-invalid @enderror" 
          placeholder="••••••••" 
          required 
        />
        @error('password')
          <span class="invalid-feedback">{{ $message }}</span>
        @enderror
      </div>

      <div class="form-actions">
        <label class="remember-me">
          <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
          Ingat saya
        </label>
      </div>

      <button type="submit" class="btn-login">Masuk</button>
    </form>
  </div>

</body>
</html>