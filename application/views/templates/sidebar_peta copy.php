<style>
    .filter nav .form-group select {
        background: black;
        color: white;
        opacity: 0.6;
        font-weight: bolder;
        border-radius: 20px 20px 20px 20px;

    }
</style>

<body>
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-10" id="title">
                <div class="title" style="margin-left: 30px;">
                    <ul>
                        <li><img src="<?= base_url('assets/mbkm/') ?>img/logo kab bogor 1.png" alt="" style="width: 50px;"></li>
                        <li><img src="<?= base_url('assets/mbkm/') ?>img/sidebar/text.png"></li>
                    </ul>


                </div>
                <div id="mapgis"></div>

                <div class="row">
                    <div class="col-lg-10">
                        <img src="<?= base_url('assets/mbkm/') ?>img/map/chart.png" alt="" style="width: 1536px; object-fit: cover; transform: translateX(-27px) translateY(6px);">
                    </div>
                </div>
            </div>


        </div>
    </div>

    <?php

    $kategoriinovasi = $this->db->get('bidang_inovasi')->result();
    $kategoriinovator = $this->db->get('kategori_inovator')->result();
    ?>
    <div class="filter">
        <nav>
            <a href="<?= base_url('home/peta') ?>">
                <img src="<?= base_url('assets/mbkm/') ?>img/reset.png" style="height:75px;width:65px;margin-top:-10px">
            </a>
            <div class="form-group">
                <select name="kategoriinovasi" id="kategoriinovasi" class="form-control">
                    <option value="" selected>Pilih Inovasi</option>
                    <option value="semua" style="font-weight:bolder ;">Semua</option>
                    <?php foreach ($kategoriinovasi as $a) : ?>
                        <option value="<?= str_replace(' ', '_', $a->nama_bidang_inovasi) ?>" style="font-weight:bolder ;"><?= $a->nama_bidang_inovasi ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <select id="kategoriinovator" name="kategoriinovator" id="kategoriinovator" class="form-control" style="font-weight:bolder ;">
                    <option value="" selected style="font-weight:bolder ;">Pilih Inovator</option>
                    <option value="semua" style="font-weight:bolder ;">Semua</option>
                    <?php foreach ($kategoriinovator as $b) : ?>
                        <option value="<?= str_replace(' ', '_', $b->nama_kategori_inovator) ?>" style="font-weight:bolder ;"><?= $b->nama_kategori_inovator ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <select id="tahun" selected name="tahun" class="form-control" style="font-weight:bolder ;">
                    <option value="">Pilih Tahun</option>
                    <option value="semua" style="font-weight:bolder ;">Semua</option>
                    <?php for ($i = 2016; $i <= date('Y'); $i++) : ?>
                        <option value="<?= $i ?>" style="font-weight:bolder ;"><?= $i ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            <button onclick="changeData()" style="background: transparent;border:none;margin-top:-40px">
                <img src="<?= base_url('assets/mbkm/') ?>img/vector (1).png">
            </button>

        </nav>
    </div>
    </form>
</body>