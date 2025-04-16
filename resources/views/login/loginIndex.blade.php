<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login - BacaLagi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-image: url('{{ asset('img/bukufoto.png') }}'); /* Ganti dengan gambar latar belakang */
      background-size: cover;
      background-position: center;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .card-custom {
      border-radius: 2rem;
      background-color: rgba(255, 255, 255, 0.95);
      overflow: hidden;
      box-shadow: 0 0 20px rgba(0,0,0,0.1);
    }
    .form-control {
      background-color: #f1f3ff;
      border: 2px solid #d9e0f2;
      border-radius: 20px;
      font-size: 0.9rem;
      padding: 0.6rem 1rem;
    }
    .btn-custom {
      background-color: #2d4b3a;
      color: white;
      border-radius: 20px;
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
    .forgot-pass {
      font-size: 0.8rem;
      text-align: right;
      color: #6c757d;
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="row card-custom mx-auto" style="max-width: 1000px;">
      
      <!-- Form Login -->
      <div class="col-md-6 p-5 d-flex flex-column justify-content-center">
        <h5 class="fw-semibold mb-0" style="color: #c57d92;">BacaLagi</h5>
        <h3 class="fw-bold mb-4 mt-2" style="color: #2d4b3a;">Karena setiap buku<br>pantas dibaca lagi.</h3>

        <form>
          <div class="mb-3">
            <input type="email" class="form-control" placeholder="Email" required />
          </div>
          <div class="mb-2">
            <input type="password" class="form-control" placeholder="Password" required />
          </div>
          <div class="mb-3 forgot-pass">
            <a href="#" class="text-decoration-none">Lupa Password?</a>
          </div>
          <button type="submit" class="btn btn-custom w-100 mb-2">Log In</button>
        </form>

        <p class="text-center mt-3 mb-0" style="font-size: 0.85rem;">Belum punya akun?</p>
      </div>

      <!-- Gambar Kanan -->
      <div class="col-md-6 d-none d-md-block p-0">
        <img src="{{ asset('img/bukufoto.png') }}" alt="Book Preview" class="book-image" />
      </div>

    </div>
  </div>

</body>
</html>
