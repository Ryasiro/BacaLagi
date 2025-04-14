<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/KeranjangStyle.css') }}">

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
                <div class="atas">
                    <div class="judul">
                        Keranjang Belanja
                    </div>
                    <div class="conselect">
                        <a href="#">Pilih Semua</a>
                        
                        <button class="hapus">
                          <div class="hpsbtn">
                          <img src="{{ asset('/img/hapus.png') }}" alt="hps" class="hpsimg">
                          Hapus
                          </div>
                        </button>
                    </div>
                </div>
            
                <!-- Produk -->
                <div class="produk">
                    <input type="checkbox" class="checkbox produk-checkbox">
                    <div class="produk-detail">
                        <img src="{{ asset('/img/SampulBuku.png') }}" alt="Produk" class="produk-img">
                        <div class="produk-info">
                            <h4>Berani Tidak Disukai</h4>
                            <p>Ichiro Kishimi Dan Fumitake Koga<br>Oleh: [namapenjual]</p>
                            <p><strong>Rp 60.000,00</strong></p>
                            <button class="hubungi-penjual">Hubungi Penjual</button>
                        </div>
                    </div>
                    <button class="hapus-produk">Hapus</button>
                </div>
            </div>
            </div>
        </div>
    
    </div>









    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>