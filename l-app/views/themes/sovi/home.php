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
    <!-- <form method="get" action="" style="padding: 2rem;" class="input-group" autocomplete="off">
        <input type="search" name="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>" />
        <button type="submit" class="btn btn-outline-primary" data-mdb-ripple-init>Search</button>
    </form> -->


    <!-- Ruang Lavender -->
    <div class="col-md-6 mt-3 mb-3">
        <div class="card" style="background: #fff;color: #636262; box-shadow: rgba(0, 0, 0, 0.20) 0px 0px 15px; min-height: 200px;">
            <div class="row">
                <div id="carauselRuangSedapMalam" class="carousel slide col-xl-6" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="http://localhost/sipar/l-content/uploads/Ruang_lavender/IMG_9987.JPG" alt="Card image cap" style="height: 220px; border-radius: 15px; transform: scale(0.95);">
                        </div>
                        <!-- Add more carousel items here if needed -->
                        <div class="carousel-item">
                            <img class="d-block w-100" src="http://localhost/sipar/l-content/uploads/Ruang_lavender/IMG_9987.JPG" alt="Card image cap" style="height: 220px; border-radius: 15px; transform: scale(0.95);">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carauselRuangSedapMalam" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carauselRuangSedapMalam" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div class="col-xl-6 d-flex flex-column justify-content-center py-3">

                    <p style="margin-inline: 20px; color: black; font-weight: bold; font-family: Montserrat">

                    </p>
                    <div class="p-2" style="">
                        <h4 style="font-family: Montserrat; color: black; margin: 0;">Ruang Lavender</h4>
                    </div>
                    <div>
                        <p style="margin: 0; margin-top: 10px;" class="">
                            <a href="/sipar/daftar"><button type="button" class="btn btn-success">Pesan</button></a>
                            <span style="font-family: 'Open Sans',sans-seriff;">

                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ruang Serbaguna Lt.3 -->
    <div class="col-md-6 mt-3 mb-3">
        <div class="card" style="background: #fff;color: #636262; box-shadow: rgba(0, 0, 0, 0.20) 0px 0px 15px; min-height: 200px;">
            <div class="row">
            <div id="carauselRuangSerbaguna" class="carousel slide col-xl-6" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="http://localhost/sipar/l-content/uploads/Ruang_serbaguna_lt_3/IMG_0314.JPG" alt="Card image cap" style="height: 220px; border-radius: 15px; transform: scale(0.95);">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carauselRuangSerbaguna" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carauselRuangSerbaguna" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div class="col-xl-6 d-flex flex-column justify-content-center py-3">

                    <p style="margin-inline: 20px; color: black; font-weight: bold; font-family: Montserrat">

                    </p>
                    <div class="p-2" style="">
                        <h4 style="font-family: Montserrat; color: black; margin: 0;">Ruang Sebaguna Lt.3</h4>
                    </div>
                    <div>
                        <p style="margin: 0; margin-top: 10px;" class="">
                            <a href="/sipar/daftar"><button type="button" class="btn btn-success">Pesan</button></a>
                            <span style="font-family: 'Open Sans',sans-seriff;">

                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ruang Sedap Malam Lt.4 -->
    <div class="col-md-6 mt-3 mb-3">
        <div class="card" style="background: #fff;color: #636262; box-shadow: rgba(0, 0, 0, 0.20) 0px 0px 15px; min-height: 200px;">
            <div class="row">
            <div id="carouselRuangSedapMalam" class="carousel slide col-xl-6" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="http://localhost/sipar/l-content/uploads/Ruang_sedap_malam_lt_4/IMG_0373.JPG" alt="Card image cap" style="height: 220px; border-radius: 15px; transform: scale(0.95);">
                        </div>
                        <!-- Add more carousel items here if needed -->
                        <div class="carousel-item">
                            <img class="d-block w-100" src="http://localhost/sipar/l-content/uploads/Ruang_sedap_malam_lt_4/IMG_0378.JPG" alt="Card image cap" style="height: 220px; border-radius: 15px; transform: scale(0.95);">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselRuangSedapMalam" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselRuangSedapMalam" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div class="col-xl-6 d-flex flex-column justify-content-center py-3">

                    <p style="margin-inline: 20px; color: black; font-weight: bold; font-family: Montserrat">

                    </p>
                    <div class="p-2" style="">
                        <h4 style="font-family: Montserrat; color: black; margin: 0;">Ruang Sedap Malam Lt.4</h4>
                    </div>
                    <div>
                        <p style="margin: 0; margin-top: 10px;" class="">
                            <a href="/sipar/daftar"><button type="button" class="btn btn-success">Pesan</button></a>
                            <span style="font-family: 'Open Sans',sans-seriff;">

                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ruang Teratai Lt.4 -->
    <div class="col-md-6 mt-3 mb-3">
        <div class="card" style="background: #fff;color: #636262; box-shadow: rgba(0, 0, 0, 0.20) 0px 0px 15px; min-height: 200px;">
            <div class="row">
            <div id="carouselRuangTeratai" class="carousel slide col-xl-6" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="http://localhost/sipar/l-content/uploads/Ruang_teratai_lt_4/IMG_0019.JPG" alt="Card image cap" style="height: 220px; border-radius: 15px; transform: scale(0.95);">
                        </div>
                        <!-- Add more carousel items here if needed -->
                        <div class="carousel-item">
                            <img class="d-block w-100" src="http://localhost/sipar/l-content/uploads/Ruang_teratai_lt_4/IMG_0399.JPG" alt="Card image cap" style="height: 220px; border-radius: 15px; transform: scale(0.95);">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselRuangTeratai" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselRuangTeratai" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div class="col-xl-6 d-flex flex-column justify-content-center py-3">

                    <p style="margin-inline: 20px; color: black; font-weight: bold; font-family: Montserrat">

                    </p>
                    <div class="p-2" style="">
                        <h4 style="font-family: Montserrat; color: black; margin: 0;">Ruang Teratai Lt.4</h4>
                    </div>
                    <div>
                        <p style="margin: 0; margin-top: 10px;" class="">
                            <a href="/sipar/daftar"><button type="button" class="btn btn-success">Pesan</button></a>
                            <span style="font-family: 'Open Sans',sans-seriff;">

                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ruang Edelweis Lt.1 -->
    <div class="col-md-6 mt-3 mb-3">
        <div class="card" style="background: #fff;color: #636262; box-shadow: rgba(0, 0, 0, 0.20) 0px 0px 15px; min-height: 200px;">
            <div class="row">
            <div id="carouselRuangEdelweis" class="carousel slide col-xl-6" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="http://localhost/sipar/l-content/uploads/Ruang_edelweis_lt_1/IMG_0031.JPG" alt="Card image cap" style="height: 220px; border-radius: 15px; transform: scale(0.95);">
                        </div>
                        <!-- Add more carousel items here if needed -->
                        <div class="carousel-item">
                            <img class="d-block w-100" src="http://localhost/sipar/l-content/uploads/Ruang_edelweis_lt_1/IMG_0685.JPG" alt="Card image cap" style="height: 220px; border-radius: 15px; transform: scale(0.95);">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselRuangEdelweis" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselRuangEdelweis" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div class="col-xl-6 d-flex flex-column justify-content-center py-3">

                    <p style="margin-inline: 20px; color: black; font-weight: bold; font-family: Montserrat">

                    </p>
                    <div class="p-2" style="">
                        <h4 style="font-family: Montserrat; color: black; margin: 0;">Ruang Edelweis Lt.1</h4>
                    </div>
                    <div>
                        <p style="margin: 0; margin-top: 10px;" class="">
                            <a href="/sipar/daftar"><button type="button" class="btn btn-success">Pesan</button></a>
                            <span style="font-family: 'Open Sans',sans-seriff;">

                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Kamar Asrama -->
    <div class="col-md-6 mt-3 mb-3">
        <div class="card" style="background: #fff;color: #636262; box-shadow: rgba(0, 0, 0, 0.20) 0px 0px 15px; min-height: 200px;">
            <div class="row">
            <div id="carouselKamarAsrama" class="carousel slide col-xl-6" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="http://localhost/sipar/l-content/uploads/Kamar_asrama/IMG_0657.JPG" alt="Card image cap" style="height: 220px; border-radius: 15px; transform: scale(0.95);">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="http://localhost/sipar/l-content/uploads/Kamar_asrama/IMG_0659.JPG" alt="Card image cap" style="height: 220px; border-radius: 15px; transform: scale(0.95);">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="http://localhost/sipar/l-content/uploads/Kamar_asrama/IMG_0661.JPG" alt="Card image cap" style="height: 220px; border-radius: 15px; transform: scale(0.95);">
                        </div>
                        <!-- Add more carousel items here if needed -->
                        <div class="carousel-item">
                            <img class="d-block w-100" src="http://localhost/sipar/l-content/uploads/Kamar_asrama/IMG_0665.JPG" alt="Card image cap" style="height: 220px; border-radius: 15px; transform: scale(0.95);">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselKamarAsrama" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselKamarAsrama" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div class="col-xl-6 d-flex flex-column justify-content-center py-3">

                    <p style="margin-inline: 20px; color: black; font-weight: bold; font-family: Montserrat">

                    </p>
                    <div class="p-2" style="">
                        <h4 style="font-family: Montserrat; color: black; margin: 0;">Kamar Asrama</h4>
                    </div>
                    <div>
                        <p style="margin: 0; margin-top: 10px;" class="">
                            <a href="/sipar/daftar"><button type="button" class="btn btn-success">Pesan</button></a>
                            <span style="font-family: 'Open Sans',sans-seriff;">

                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


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
            if (window.innerWidth >= 992 && infoOffsetTop >= triggerOffset) {

                if (window.innerWidth < 1200 && window.innerWidth > 992) {
                    info.style.width = "265.46px"
                    info.style.top = `200px`; // Adjust top offset as needed
                    info.style.right = `${rightOffset}px`; // Set right offset

                    detail.style.width = "531px"

                    return
                }

                info.classList.add('position-fixed');
                info.style.top = `200px`; // Adjust top offset as needed
                info.style.right = `${rightOffset}px`; // Set right offset
                info.style.width = `378.8px`;
                detail.style.width = `757.6px`;
                detail.classList.remove('col-lg-8');
                detail.classList.add('col-md-12');

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

            if (window.innerWidth >= 992 && infoOffsetTop >= triggerOffset) {

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