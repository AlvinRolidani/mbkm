<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <title>Hello, world!</title>
</head>

<body>

    <!-- awal header -->
    <header class="header_area" style=" position: relative;
  z-index: 10;">
        <div class="main-menu">
            <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #f3D900;">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"><img src="<?= base_url('assets/mbkm/') ?>img/logo bappeda.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link active" href="#" style="color:  #0C4885; font-weight: bold; font-size: 1.3rem;">Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="<?= base_url('home/peta') ?>" style="color:  #0C4885; font-weight: bold; font-size: 1.3rem;">Peta Sebaran</a>
                            </li>
                            <li class="nav-item">
                                <div class="dropdown">
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #f3D900; border-radius: 7px; color:#0C4885; width: 130px; border: none; font-weight: bold; font-size: 1.3rem;">
                                        Tentang
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <li><a class="dropdown-item" href="#inovasi">Inovasi</a></li>
                                        <li><a class="dropdown-item" href="#inovator">Inovator</a></li>
                                        <li><a class="dropdown-item" href="#kontak">Kontak Kami</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <button class="login" type="submit" style="background-color: #0C4885; color: white; border-radius: 15px; border: 0px; width: 100px; height: 30px; ">Login</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!-- akhir header -->


    <!-- awal img slider -->

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?= base_url('assets/mbkm/') ?>img/WhatsApp Image 2022-05-17 at 3.45.46 PM (1).jpeg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="<?= base_url('assets/mbkm/') ?>img/WhatsApp Image 2022-05-17 at 3.45.46 PM.jpeg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="<?= base_url('assets/mbkm/') ?>img/WhatsApp Image 2022-05-17 at 3.45.46 PM (2).jpeg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- akhir img slider -->

    <div class="sambutan">
        <div class="row">
            <div class="col-lg-2">
                <figure class="figure">
                    <img src="<?= base_url('assets/mbkm/') ?>img/image 1.png" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
            </div>
            <div class="col-lg-10">
                <div class="caption">
                    <h2 style="font-weight: bolder;">Sambutan Kepala Badan</h2>
                    <p>Ir.Suryanto Putra, M.Si <br> Assalamualaikum Wr. Wb</p>
                    <p>Pertama - kami mengucapkan selamat datang kepada pengunjung website Bappepdalitbang Kabupaten Bogor. <br>Website ini merupakan wujud kerja keras kami untuk menjawab derasnya tuntutan akan transparasi dan akuntabilitas lembaga pelayanan Publik </p>


                </div>
            </div>
        </div>
    </div>



    <!-- awal services -->
    <section class="services">
        <div class="inovasi">
            <h2 id="inovasi" style="font-style: italic;">Inovasi</h2>
            <div class="garis"></div>
            <p class="caption">
                Inovasi adalah Kegiatan penelitian, pengembangan, dan ataupun
                perekayasaan yang dilakukan dengan tujuan melakukan pengembangan
                penerapan praktis nilai dan konteks ilmu pengetahuan yang baru, ataupun
                cara baru untuk menerapkan ilmu pengetahuan dan teknologi yang sudah
                ke dalam produk ataupun proses produksinya.
            </p>
        </div>
        <div class="inovasi">
            <h2 id="inovator" style="font-style: italic;">Inovator</h2>
            <div class="garis"></div>
            <p class="caption">Inovator dibutuhkan untuk memberi solusi atas berbagai permasalahan
                yang muncul. tentunya perubahan yang lebih baiklah yang diharapkan
                ketika tercipta sebuah inovasi. dan diharapkan pula inovasi tersebut dapat
                mempermudah kehidupan sehari - hari masyarakat. inovasi ini terutama
                sangat dibutuhkan dalam berbisnis. jika bisnis dijalankan tanpa adanya
                inovasi, maka ia akan tenggelam di tengah derasnya arus persaingan.</p>
        </div>

    </section>
    <!-- akhir services -->

    <footer>
        <div class="alamat">
            <h4>Alamat</h4>
            <p>jl.Segar III Kav.2 komplek <br>Perkantoran Pemda Bogor <br>Tengah, Cibinong Bogor, Jawa Barat 1694</p>
        </div>

        <div class="kontak">
            <h4>Kontak Kami</h4>
            <p>Telepon: (021)87906240<br>Fax: 87906242<br>Email: bappepdalitbang@bogorkab.go.id</p>
        </div>

        <div class="medsos" id="kontak">
            <h4>Media Sosial</h4>
            <ul>
                <li><a href="">Facebook</a></li>
                <li><a href="">Instagram</a></li>
                <li><a href="">Youtube</a></li>
                <li><a href="">Twitter</a></li>
            </ul>
        </div>
    </footer>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->


    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>