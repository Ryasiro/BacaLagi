<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register - BacaLagi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-image: url('{{ asset('img/bukufoto.png') }}');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .card-custom {
      border-radius: 2rem;
      backdrop-filter: blur(6px);
      background-color: rgba(255, 255, 255, 0.9);
      overflow: hidden;
      box-shadow: 0 0 20px rgba(0,0,0,0.1);
    }
    .form-control {
      background-color: #f1f3ff;
      border: none;
      border-radius: 10px;
      font-size: 0.9rem;
      padding: 0.6rem 1rem;
    }
    .btn-custom {
      background-color: #2d4b3a;
      color: white;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }
    .btn-custom:hover {
      background-color: #3b5c48;
    }
    .book-image {
      object-fit: cover;
      width: 100%;
      height: 100%;
      border-top-right-radius: 2rem;
      border-bottom-right-radius: 2rem;
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="row card-custom mx-auto" style="max-width: 1000px;">
      
      <!-- Form Kiri -->
      <div class="col-md-6 p-5 d-flex flex-column justify-content-center">
        <h5 class="text-muted fw-semibold" style="color: #e698a7 !important;">BacaLagi</h5>
        <h3 class="fw-bold mb-4" style="color: #2d4b3a;">Karena setiap buku<br>pantas dibaca lagi.</h3>

        <form action="{{ route('register') }}" method="POST">
            @csrf <!-- Tambahkan CSRF token untuk keamanan -->
            <div class="mb-3">
                <input type="text" name="name" class="form-control" placeholder="Nama" required />
            </div>
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" required />
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required />
            </div>
            <div class="mb-4">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password" required />
            </div>
            <button type="submit" class="btn btn-custom w-100 mb-2">Sign up</button>
        </form>

        <p class="text-center mt-3 mb-0" style="font-size: 0.85rem;">
            Sudah punya akun? <a href="{{ route('login') }}" class="text-decoration-none">Log In</a>
        </p>
      </div>

      <!-- Gambar Kanan -->
      <div class="col-md-6 d-none d-md-block p-0">
        <img src="{{ asset('img/bukufoto.png') }}" alt="Book Preview" class="book-image" />
      </div>

    </div>
  </div>

</body>
</html>
