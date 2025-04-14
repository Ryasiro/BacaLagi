<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/DescStyle.css') }}">

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
                  <h2>Deskripsi Buku</h2>

                  <div class="conIsi">
                  <div class="TampilanBuku">
                    <img src="{{ asset('/img/SampulBuku.png') }}" alt="">

                    <div class="actionBuku">
                      <div class="callseller">
                        <a href="{{ url('/penjual') }}">
                        Hubungi Penjual
                        </a> {{-- ganti jadi link wa --}}
                      </div>
                      <a href="{{ url('/keranjang') }}">
                        <img src="{{ asset('/img/Shopping_Cart.png') }}" alt=""></a>

                        <button style="border: none; background: none; padding: 0;">
                        <img src="{{ asset('/img/Suka.png') }}" alt="" style="cursor: pointer;">
                        </button>
                    </div>
                    
                  </div>
                  <div class="DeskripsiBuku">
                    <h3>Judul Buku</h3>
                    <p>Penulis : Penulis Buku</p>
                    <p>Penerbit : Penerbit Buku</p>
                    <p>Tahun Terbit : 2023</p>
                    <p>Harga : Rp. 100.000</p>
                    <p>Deskripsi : Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatibus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis ducimus molestiae facere accusamus repudiandae non doloribus. Illum officiis error numquam maiores fugiat repellat pariatur animi sapiente, autem quae doloremque consequatur? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Error tenetur quaerat recusandae cum deserunt autem pariatur illum? Nulla nesciunt quisquam, nisi sapiente, reprehenderit quas molestiae, maxime accusamus consequatur dolores similique. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa, porro iusto dignissimos optio nostrum eligendi minima molestiae quam distinctio, numquam laborum enim tempore error soluta fugiat ipsam pariatur tempora sapiente. </p>
                  </div></div>
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