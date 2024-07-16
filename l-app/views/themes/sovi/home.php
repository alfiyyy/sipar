<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php
function getCategoryIcon($categoryName)
{
    switch ($categoryName) {
        case (strpos($categoryName, "Asrama") !== false):
            echo '<i class="fa fa-bed" aria-hidden="true"></i>';
            break;
        case (strpos($categoryName, "Aula") !== false):
            echo '<i class="fa fa-building" aria-hidden="true"></i>';
            break;
        case (strpos($categoryName, "Dara") !== false):
            echo '<i class="fa fa-home" aria-hidden="true"></i>';
            break;
        case (strpos($categoryName, "Kamar") !== false):
            echo '<i class="fa fa-bed" aria-hidden="true"></i>';
            break;
        case (strpos($categoryName, "Smart meeting room") !== false):
            echo '<i class="fa fa-lightbulb-o" aria-hidden="true"></i>';
            break;
        case (strpos($categoryName, "Nuri") !== false):
            echo '<i class="fa fa-building" aria-hidden="true"></i>';
            break;
        case (strpos($categoryName, "Reguler") !== false):
            echo '<i class="fa fa-bed" aria-hidden="true"></i>';
            break;
        case (strpos($categoryName, "Standar") !== false):
            echo '<i class="fa fa-bed" aria-hidden="true"></i>';
            break;
        case (strpos($categoryName, "Mess") !== false):
            echo '<i class="fa fa-home" aria-hidden="true"></i>';
            break;
        case (strpos($categoryName, "VIP") !== false):
            echo '<i class="fa fa-bed" aria-hidden="true"></i>';
            break;
        case (strpos($categoryName, "Wisma") !== false):
            echo '<i class="fa fa-home" aria-hidden="true"></i>';
            break;
        case (strpos($categoryName, "WISMA") !== false):
            echo '<i class="fa fa-home" aria-hidden="true"></i>';
            break;
        case (strpos($categoryName, "PAVILION") !== false):
            echo '<i class="fa fa-home" aria-hidden="true"></i>';
            break;
        case (strpos($categoryName, "Paviliun") !== false):
            echo '<i class="fa fa-home" aria-hidden="true"></i>';
            break;
        default:
            echo '';
            break;
    }
}
?>

<!-- left content -->
<div class="row" style="margin-left: -15px;">
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body" style="height: 650px; overflow: auto;">
                    <div id="hmodal" class="text-center"></div>
                    <div class="row" id="display" style="display: none;">
                        <div class="col-md-12">
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner" id="imageModal"></div>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        <div style="margin: 0;" class="row">
                            <div class="detail col-lg-8" style="margin-bottom: 20px;">
                                <div class="pt-4">
                                    <p class="p-0">Tipe Kamar</p>
                                    <h5 id="room" class="pb-2 text-primary"></h5>
                                    <p>Kamar Dikelola Oleh</p>
                                    <h5 id="title" class="mb-2 font-weight-bold"></h5>
                                </div>
                                <div class="" id="deskripsiRoom" style="border-top: 1px solid #eae9e9; border-bottom: 1px solid #eae9e9; padding-top: 10px"></div>
                                <div style="padding-block: 2rem;">
                                    <h5>Fasilitas</h5>
                                    <div id="fasilitas"></div>
                                </div>
                                <div style="padding-block:2rem">
                                    <h5>Layanan yang bisa kamu dapatkan</h5>
                                    <table class="table table-striped w-100">
                                        <thead>
                                            <tr>
                                                <th scope="col">Layanan</th>
                                                <th scope="col">Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody id="layanan"></tbody>
                                    </table>
                                </div>
                                <div>
                                    <h5 style="border-top: 1px solid #eae9e9;">Peraturan Kamar</h5>
                                    <div class="d-flex justify-content-evenly align-items-center">
                                        <span style="width: 50px;" class="">
                                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        </span>
                                        <span class="font-size-sm font-weight-normal">Akses 24 Jam</span>
                                    </div>
                                    <div class="d-flex justify-content-evenly align-items-center">
                                        <span style="width: 50px;" class="">
                                            <i class="fa fa-bed" aria-hidden="true"></i>
                                        </span>
                                        <span class="font-size-sm font-weight-normal">Maks. 2 orang/ kamar</span>
                                    </div>
                                    <div class="d-flex justify-content-evenly align-items-center">
                                        <span style="width: 50px;" class="">
                                            <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                        </span>
                                        <span class="font-size-sm font-weight-normal">Menunjukan bukti (-) Swab saat check-in</span>
                                    </div>
                                </div>
                                <!-- <div class="text-white">HALLO</div> -->
                            </div>
                            <div class="col-lg-4" style="top: 20px;" id="info">
                                <div class="p-2 mb-3 border rounded">
                                    <p class="font-weight-bold">Telepon:</p>
                                    <div id="telp"></div>
                                    <p class="font-weight-bold">Email:</p>
                                    <div id="email"></div>
                                    <p class="font-weight-bold">Alamat:</p>
                                    <div id="alamat"></div>
                                    <a href="<?= $this->CI->config->base_url("daftar"); ?>" class="btn btn-success btn-block">Pesan Kamar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Search Form -->
    <form method="get" action="" style="padding: 2rem;" class="input-group" autocomplete="off">
        <input type="search" name="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>" />
        <button type="submit" class="btn btn-outline-primary" data-mdb-ripple-init>Search</button>
    </form>

    <?php
    // Capture the search term
    $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

    // Fetch data based on the search term
    $post1b = $this->CI->index_model->get_unker_by_search($searchTerm, '', 'result');

    foreach ($post1b as $res_post1b) :
        $getDataKategori = $this->CI->index_model->get_post_lmit_by_unker($res_post1b['unker_id'], [10, 0]);
        $telpUnker = $this->CI->index_model->get_unker_by('unker_id', $res_post1b['unker_id'], 'row');
    ?>
        <div class="col-md-6 mt-3 mb-3">
            <div class="card" style="background: #fff;color: #636262; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; min-height: 200px;">
                <div class="row">
                    <div class="col-xl-6">
                        <img class="card-img-top" src="<?= post_images($res_post1b['unker_image'], 'small', TRUE); ?>" alt="Card image cap" style="height: 220px; border-radius: 15px; transform: scale(0.95);">
                    </div>
                    <div class="col-xl-6 d-flex flex-column justify-content-center py-3">
                        <?php if ($getDataKategori->num_rows() > 0) : ?>
                            <p style="margin-inline: 20px; color: black; font-weight: bold; font-family: Montserrat">
                                Tersedia <?= $getDataKategori->num_rows(); ?> pilihan ruangan
                            </p>
                            <?php if ($getDataKategori->num_rows() > 2) : ?>
                                <div class="p-2" style="height: 115px; margin-inline: 20px; border: 1px solid #dfdfdf; overflow: auto">
                                    <ul class="list-group">
                                        <?php foreach ($getDataKategori->result_array() as $rowKategori) : ?>
                                            <a style="font-family: 'Open Sans',sans-seriff;" href="#!" data-id="<?= $rowKategori['kategori_id']; ?>" data-toggle="modal" data-target=".bd-example-modal-lg" class="list-group-item list-group-item-action actionsBed">
                                                <span class="mr-1">
                                                    <?php getCategoryIcon($rowKategori['kategori_nama']); ?>
                                                </span>
                                                <?= $rowKategori['kategori_nama']; ?>
                                                <span class="float-right" data-toggle="tooltip" data-placement="top" title="view">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </span>
                                            </a>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                                <div>
                                    <p style="margin: 0; margin-top: 10px;" class="">
                                        <span style="margin-inline:20px" class="mr-1" data-toggle="tooltip" data-placement="top" title="Nomor Kontak">
                                            <i class="fa fa-phone"></i>
                                        </span>
                                        <span style="font-family: 'Open Sans',sans-seriff;">
                                            <?= $telpUnker['unker_telp'] ?>
                                        </span>
                                    </p>
                                </div>
                            <?php else : ?>
                                <div class="p-2" style="height: 115px; margin-inline: 20px; border: 1px solid #dfdfdf;">
                                    <div class="list-group">
                                        <?php foreach ($getDataKategori->result_array() as $rowKategori) : ?>
                                            <a style="font-family: 'Open Sans',sans-seriff;" href="#!" data-id="<?= $rowKategori['kategori_id']; ?>" data-toggle="modal" data-target=".bd-example-modal-lg" class="list-group-item list-group-item-action actionsBed">
                                                <span class="mr-1">
                                                    <?php getCategoryIcon($rowKategori['kategori_nama']); ?>
                                                </span>
                                                <?= $rowKategori['kategori_nama']; ?>
                                                <span class="float-right" data-toggle="tooltip" data-placement="top" title="view">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </span>
                                            </a>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                                <div>
                                    <p style="margin: 0; margin-top: 10px;" class="">
                                        <span style="margin-inline:20px" class="mr-1" data-toggle="tooltip" data-placement="top" title="Nomor Kontak">
                                            <i class="fa fa-phone"></i>
                                        </span>
                                        <span style="font-family: 'Open Sans',sans-seriff;">
                                            <?= $telpUnker['unker_telp'] ?>
                                        </span>
                                    </p>
                                </div>
                            <?php endif; ?>
                        <?php else : ?>
                            <div class="p-2">
                                <div style="padding: 10px; font-weight: 700; text-align: center; background-color: #eae9e9; border-radius: 10px; font-family:'Montserrat'">
                                    Saat ini belum <br> menyediakan pilihan kamar
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>

</div>
<!--/ left content -->

<!-- javascript -->
<script>
    // untuk konten popup
    document.addEventListener("DOMContentLoaded", function() {
        const actions = document.querySelectorAll(".actionsBed");
        const title = document.querySelector("#title");
        const room = document.querySelector("#room");
        const fasilitas = document.querySelector("#fasilitas");
        const layanan = document.querySelector("#layanan");
        const imageModal = document.querySelector("#imageModal");
        const alamat = document.querySelector("#alamat");
        const telpon = document.querySelector("#telp");
        const email = document.querySelector("#email");
        const scrolls = document.querySelector(".modal-body");
        const info = document.querySelector("#info");
        const deskripsi = document.querySelector("#deskripsiRoom");
        const body = document.querySelector("#hmodal");
        const rows = document.querySelector("#display");
        const detail = document.querySelector(".detail");

        const triggerOffset = 248; // Offset value where the info section should become sticky

        const formatter = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR'
        });

        const decodeHTML = function(html) {
            var textArea = document.createElement('textarea');
            textArea.innerHTML = html;
            return textArea.value;
        };

        window.addEventListener('resize', () => {
            const originalInfoWidth = info.offsetWidth;
            const originalDetailWidth = detail.offsetWidth;
            const infoOffsetTop = scrolls.scrollTop;
            const modalRightEdge = scrolls.getBoundingClientRect().right;
            const viewportRightEdge = window.innerWidth;
            const rightOffset = viewportRightEdge - modalRightEdge + 18;
            if (window.innerWidth >= 992) {

                if(infoOffsetTop >= triggerOffset){
                    info.classList.add('position-fixed');
                    info.style.top = `200px`; // Adjust top offset as needed
                    info.style.right = `${rightOffset}px`; // Set right offset
                    info.style.width = `${originalInfoWidth}px`;
                    detail.style.width = `${originalDetailWidth}px`;
                    detail.classList.remove('col-lg-8');
                    detail.classList.add('col-md-12');
                }

                // info.classList.remove('position-fixed');
                // info.style.top = "";
                // info.style.right = "";
                // info.style.width = "";
                // detail.style.width = "";
                // detail.classList.remove('col-md-12');
                // detail.classList.add('col-lg-8');
            } else {
                info.classList.remove('position-fixed');
                info.style.top = "";
                info.style.right = "";
                info.style.width = "";
                detail.style.width = "";
                detail.classList.remove('col-md-12');
                detail.classList.add('col-lg-8');
                
            }
        });

        // Script to make the info section sticky within the popup
        scrolls.addEventListener('scroll', () => {
            const originalInfoWidth = info.offsetWidth;
            const originalDetailWidth = detail.offsetWidth;
            const infoOffsetTop = scrolls.scrollTop;
            const modalRightEdge = scrolls.getBoundingClientRect().right;
            const viewportRightEdge = window.innerWidth;
            const rightOffset = viewportRightEdge - modalRightEdge + 18;

            if (window.innerWidth >= 992) {

                if (infoOffsetTop >= triggerOffset) {
                    info.classList.add('position-fixed');
                    info.style.top = `200px`; // Adjust top offset as needed
                    info.style.right = `${rightOffset}px`; // Set right offset
                    info.style.width = `${originalInfoWidth}px`;
                    detail.style.width = `${originalDetailWidth}px`;
                    detail.classList.remove('col-lg-8');
                    detail.classList.add('col-md-12');
                } else {
                    info.classList.remove('position-fixed');
                    info.style.top = "";
                    info.style.right = "";
                    info.style.width = "";
                    detail.style.width = "";
                    detail.classList.remove('col-md-12');
                    detail.classList.add('col-lg-8');
                }
            } else {
                info.classList.remove('position-fixed');
                info.style.top = "";
                info.style.right = "";
                info.style.width = "";
                detail.style.width = "";
                detail.classList.remove('col-md-12');
                detail.classList.add('col-lg-8');

            }

        });

        actions.forEach(row => {
            row.addEventListener('click', async () => {
                rows.style.display = 'none';
                body.style.display = 'block';
                body.innerHTML = `
                <div style="width: 100%;">
                    <img class="d-block" style="margin: 0 auto; width: 60px; height: 60px;" src="https://bpsdm.pu.go.id/sipar/l-content/thumbs/loading.gif" alt="Loading">
                    <h6 class="text-center ml-1">Loading...</h6>
                </div>
            `;

                try {
                    const response = await fetch(`<?= $this->CI->config->base_url(FWEB . "/Daftar/getDataDetailRoom?id=") ?>${row.getAttribute('data-id')}`);
                    const data = await response.json();

                    setTimeout(() => {
                        body.innerHTML = '';
                        room.innerHTML = '';
                        title.innerHTML = '';
                        alamat.innerHTML = '';
                        fasilitas.innerHTML = '';
                        layanan.innerHTML = '';
                        imageModal.innerHTML = '';

                        room.innerHTML = data.dataKamar.kategori_nama?.toUpperCase();
                        title.innerHTML = data.dataKamar.nama;
                        telpon.innerHTML = data.dataKamar.telephone;
                        email.innerHTML = data.dataKamar.email;
                        alamat.innerHTML = decodeHTML(data.dataKamar.alamat);
                        deskripsi.innerHTML = decodeHTML(data.dataKamar.deskripsi);

                        if (data.dataGambar?.length > 0) {
                            data.dataGambar?.map((image, key) => {
                                if (key === 0) {
                                    imageModal.innerHTML += `
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" style="height: 400px;" src="https://bpsdm.pu.go.id/sipar/l-content/uploads/${image.rg_image}" alt="Slide image">
                                    </div>
                                `;
                                } else {
                                    imageModal.innerHTML += `
                                    <div class="carousel-item">
                                        <img class="d-block w-100" style="height: 400px;" src="https://bpsdm.pu.go.id/sipar/l-content/uploads/${image.rg_image}" alt="Slide image">
                                    </div>
                                `;
                                }
                            });
                        } else {
                            imageModal.innerHTML += `
                            <div class="carousel-item active">
                                <img class="d-block w-100" style="height: 400px;" src="https://bpsdm.pu.go.id/sipar/l-content/images/noimage.jpg" alt="No image">
                            </div>
                        `;
                        }

                        if (data?.dataFasilitas.length > 0) {
                            data.dataFasilitas.map(row => {
                                fasilitas.innerHTML += `
                                <div class=d-flex justify-content-evenly align-items-center">
                                    <span style="width:50px" class="">
                                        <i class="fa fa-${row.rf_icon}" aria-hidden="true"></i>
                                    </span>
                                    <span style="font-size: 14px; font-weight: normal;">${row.rf_nama}</span>
                                </div>
                            `;
                            });
                        } else {
                            fasilitas.innerHTML = 'Tidak ada fasilitas';
                        }

                        if (data.dataLayanan?.length > 0) {
                            data.dataLayanan.map(row => {
                                layanan.innerHTML += `
                                <tr>
                                    <td>${row.rl_nama}</td>
                                    <td>${formatter.format(row.rl_harga)}</td>
                                </tr>
                            `;
                            });
                        } else {
                            layanan.innerHTML += `
                            <tr>
                                <td colspan="2" class="text-center">Tidak ada layanan yang tersedia</td>
                            </tr>
                        `;
                        }

                        body.style.display = 'none';
                        rows.style.display = '';
                    }, 800);
                } catch (error) {
                    console.log(error);
                }
            });
        });
    });

    //tambahan script
</script>
<!-- end javascript -->

<!-- sidebar -->
<!-- <div class="col-lg-4 col-md-12 clearfix mb-5 sidebar">
	<?php //$this->CI->_layout('sidebar'); 
    ?>
</div> -->
<!--/ sidebar -->