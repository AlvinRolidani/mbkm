<link rel="stylesheet" href="<?= base_url('assets/mbkm/') ?>style2.css">
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
<script src="<?= base_url('assets/js/leaflet.js') ?>"></script>
<script src="<?= base_url('assets/js//leaflet-panel-layers-master/src/leaflet-panel-layers.js') ?>"></script>
<script src="<?= base_url('assets/js/') ?>leaflet.ajax.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="<?= base_url('kategoriinovasi/data/kecamatan') ?>"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
<script>
    <?php
    $getId = $this->db->get('tb_kecamatan')->result();
    foreach ($getId as $row) {
        $query = $this->db->query("SELECT inovasi.id_inovasi FROM `inovasi` JOIN tb_kecamatan ON inovasi.id_kecamatan = tb_kecamatan.id_kecamatan WHERE inovasi.id_bidang_inovasi = 5 AND inovasi.id_kecamatan = '" . $row->id_kecamatan . "'");
        $data[$row->nama_kecamatan] = $query->num_rows();
    }
    echo "HOTSPOT = " . json_encode($data)
    ?>

    //ambil data json dari count

    //menampilkan map
    var map = L.map('mapgis').setView([-6.588710080503552, 106.79743511461204], 10.5)
    var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11'
    });
    map.addLayer(peta1)

    <?php
    $getId = $this->db->get('tb_kecamatan')->result();
    foreach ($getId as $row) {
        $query = $this->db->query("SELECT inovator.id_inovator,tb_kecamatan.nama_kecamatan FROM `inovator` JOIN tb_kecamatan ON inovator.id_kecamatan = tb_kecamatan.id_kecamatan INNER JOIN inovasi ON inovator.id_inovator = inovasi.id_inovasi WHERE inovasi.id_bidang_inovasi = 5 AND inovator.id_kecamatan ='" . $row->id_kecamatan . "'");
        $data[$row->nama_kecamatan] = $query->num_rows();
    }
    echo "INOVATOR = " . json_encode($data); ?>
    //mendapatkan warna berdasarkan jumlah
    function getColor(d) {
        return d > 40 ? '#0F5304' :
            d > 30 ? '#1CBE0D' :
            d > 20 ? '#67E404' :
            d > 10 ? '#DFD828' :
            '#FAFF00';
    }




    let geojson;
    let loadJsonData;
    var kategoriinovator = document.querySelector("#kategoriinovator");
    var kategoriinovasi = document.querySelector("#kategoriinovasi");
    var kategoritahun = document.querySelector("#tahun");


    getGeoJson = async () => {
        for (i = 0; i < kecamatan.length; i++) {
            var data = kecamatan[i]
            var Nama = data.nama_kecamatan

            let url = `<?= base_url() ?>assets/datakecamatan/` + data.shp
            let get = await fetch(url)
            let json = await get.json();

            geojson = L.geoJson(json, {
                style: function(feature) {
                    return {
                        color: 'white',
                        fillColor: getColor(INOVATOR[Nama]),
                        weight: 2,
                        opacity: 1,
                        fillOpacity: 0.5,
                        dashArray: 3
                    }
                }
            }).addTo(map).bindPopup('<b style="font-size:15px">Kecamatan ' + Nama + '</b><hr style="color:#f5ce42;margin-top:1px"size="7px">' + '<b>Inovasi : </b>' + HOTSPOT[Nama] + '<br><b>Inovator : </b>' + INOVATOR[Nama] + '<br><a style="margin-left:120px;text-decoration:none; color:black" href="<?= base_url('detailinovasi/Pelayanan_Masyarakat/') ?>' + data.id_kecamatan + '">Detail<i class="fa fa-info-circle" style="margin-left:5px" aria-hidden="true"></i></a>')

        }
    }
    getGeoJson();


    let changeData = async () => {
        let url;
        var inovasi = kategoriinovasi.options[kategoriinovasi.selectedIndex].value
        var inovator = kategoriinovator.options[kategoriinovator.selectedIndex].value
        var tahun = kategoritahun.options[kategoritahun.selectedIndex].value


        if (inovasi == 'semua' && inovator == 'semua' && tahun == 'semua') {
            url = "<?= base_url('home/semuadata') ?>"

        } else if (inovasi != 'semua' && inovator == 'semua' && tahun == 'semua') {
            window.location = "<?= base_url('kategoriinovasi/') ?>" + inovasi + ""

        } else if (inovasi == 'semua' && inovator != 'semua' && tahun == 'semua') {
            window.location = "<?= base_url('kategoriinovator/') ?>" + inovator + ""

        } else if (inovasi == 'semua' && inovator == 'semua' && tahun != 'semua') {
            url = "<?= base_url('home/dataTahun') ?>?tahun=" + tahun + ""

        } else if (inovasi != 'semua' && inovator == 'semua' && tahun != 'semua') {
            url = "<?= base_url('home/dataInovasiTahun') ?>?kategoriinovasi=" + inovasi + "&tahun=" + tahun + ""

        } else if (inovasi == 'semua' && inovator != 'semua' && tahun != 'semua') {
            url = "<?= base_url('home/dataInovatorTahun') ?>?kategoriinovator=" + inovator + "&tahun=" + tahun + ""

        } else {

            url = "<?= base_url('home/getkategori') ?>?kategoriinovasi=" + inovasi + "&kategoriinovator=" + inovator + "&tahun=" + tahun + ""
        }

        let get = await fetch(url)
        loadJsonData = await get.json()


    }

    //Legend
    var legend = L.control({
        position: 'bottomleft'
    });

    legend.onAdd = function(map) {

        var div = L.DomUtil.create('div', 'info legend'),
            grades = [1, 10, 20, 30, 40],
            labels = [];

        // loop through our density intervals and generate a label with a colored square for each interval
        for (var i = 0; i < grades.length; i++) {
            div.innerHTML +=
                '<i style="background:' + getColor(grades[i] + 1) + '"></i> ' + grades[i] + (grades[i + 1] ? ' &ndash; ' + grades[i + 1] + '<br>' : '+');
        }

        return div;
    };

    legend.addTo(map);
</script>


</html>