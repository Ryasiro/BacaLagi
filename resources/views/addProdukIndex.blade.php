<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/AddProdukStyle.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    
    <title>BacaLagi</title>
  </head>
  <body>



    <div class="conUtama">
        
        <div class="cardUtama">
            <div class="navbar">
                <div class="logo">
                    <a href="{{ url('/home') }}">BacaLagi</a>
                </div>

            <div class="Searchmiddle">
                <div class="search">
                    <li><input type="text" placeholder="Lagi cari buku apa?" name="search"></li>
                    <a href="{{ url('/search') }}">
                    <li><img src="{{ asset('/img/search.png') }}" alt=""></li></a>  
                </div>
                <div class="ShpCart">
                  <a href="{{ url('/keranjang') }}">
                  <img src="{{ asset('/img/Shopping_Cart.png') }}" alt=""></a>
                </div>
            </div>
            <div class="picprofile">
               <a href="{{ url("/profile") }}">
               <img src="{{ asset('/img/Profile.jpg') }}" alt=""></a>
            </div>
            </div>

            <div class="alignbody">
                <div class="Cart-body">
                    <h2>Form Penjualan</h2>
                    <form action="{{ url('/add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Upload Foto -->
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" name="foto" id="foto" class="form-control">
                        </div>
                    
                        <!-- Nomor WA -->
                        <div class="form-group">
                            <label for="nomor_wa">Nomor WA</label>
                            <input type="text" name="nomor_wa" id="nomor_wa" class="form-control" required>
                        </div>
                    
                        <!-- Harga Jual -->
                        <div class="form-group">
                            <label for="harga_jual">Harga Jual</label>
                            <input type="number" name="harga_jual" id="harga_jual" class="form-control" required>
                        </div>
                    
                        <!-- Judul Buku -->
                        <div class="form-group">
                            <label for="judul_buku">Judul Buku</label>
                            <input type="text" name="judul_buku" id="judul_buku" class="form-control" required>
                        </div>
                    
                        <!-- Informasi Buku -->
                        <div class="form-group">
                            <label for="informasi_buku">Informasi Buku</label>
                            <textarea name="informasi_buku" id="informasi_buku" class="form-control" required></textarea>
                        </div>
                    
                        <!-- Detail Buku -->
                        <div class="form-group">
                            <label for="detail_buku">Detail Buku</label>
                            <textarea name="detail_buku" id="detail_buku" class="form-control" required></textarea>
                        </div>
                    
                        <button type="submit" class="btn btn-primary">Tambah Produk</button>
                    </form>
                </div>
            </div>
        </div>
    
    </div>




    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK'
            });
        </script>
    @endif




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>