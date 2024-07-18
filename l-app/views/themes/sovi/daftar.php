<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- left content -->
<div class="col-lg-12 col-md-12 clearfix left-content">
    <div class="post-head">
        <h4 class="pd-0 mg-0 tx-20 tx-dark tx-spacing--1">Formulir Pendaftaran</h4>
    </div>
    <div class="card mg-b-50">
        <!-- Menampilkan pesan kesalahan validasi -->
        <?= form_open('', 'id="form_add_user" autocomplete="off"'); ?>
        <div class="card-body">
            <div class="row">

                <!-- Name -->
                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <label>Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" placeholder="Masukkan nama lengkap Anda" />
                    </div>
                </div>
                <!--/ Name -->

                <!-- Email -->
                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <label>Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control" placeholder="Masukkan email Anda" />
                    </div>
                </div>
                <!--/ Email -->

                <!-- NIP / NIK -->
                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <label>NIP / NIK <span class="text-danger">*</span></label>
                        <input type="text" name="nip" class="form-control" placeholder="Masukkan NIP atau NIK Anda" />
                    </div>
                </div>
                <!--/ NIP / NIK -->

                <!-- Asal Instansi -->
                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <label>Asal Instansi <span class="text-danger">*</span></label>
                        <input type="text" name="asal_instansi" class="form-control" placeholder="Masukkan asal instansi Anda" />
                    </div>
                </div>
                <!--/ Asal Instansi -->

                <!-- Alamat -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="address" class="form-control" rows="5" placeholder="Masukkan alamat Anda"></textarea>
                    </div>
                </div>
                <!--/ Alamat -->

                <!-- Telepon -->
                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <label>Telepon</label>
                        <input type="text" name="tlpn" class="form-control" placeholder="Masukkan nomor telepon Anda" />
                    </div>
                </div>
                <!--/ Telepon -->

                <!-- Password -->
                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <label>Password <span class="text-danger">*</span></label>
                        <input type="password" name="password" class="form-control" placeholder="Password minimal 6 karakter" />
                    </div>
                </div>
                <!--/ Password -->

                <!-- Konfirmasi Password -->
                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <label>Konfirmasi Password <span class="text-danger">*</span></label>
                        <input type="password" name="confirm_password" class="form-control" placeholder="Konfirmasi password" />
                    </div>
                </div>
                <!--/ Konfirmasi Password -->

            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-lg btn-primary submit_add"><i id="submit_icon" class="cificon licon-send mr-2"></i><?= lang_line('button_submit'); ?></button>
        </div>
        <?= form_close(); ?>
    </div>
</div>
<!--/ left content -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        $('#form_add_user').submit(function(e) {
            e.preventDefault();
            
            var form = $(this);
            var url = '<?= site_url('daftar'); ?>'; // pastikan URL benar
            var method = 'post';
            var data = form.serialize();
            
            // Pengecekan untuk kolom yang wajib diisi
            var name = form.find('input[name="name"]').val();
            var email = form.find('input[name="email"]').val();
            var nip = form.find('input[name="nip"]').val();
            var asal_instansi = form.find('input[name="asal_instansi"]').val();
            var password = form.find('input[name="password"]').val();
            var confirmPassword = form.find('input[name="confirm_password"]').val();
            
            if (name.trim() == '' || email.trim() == '' || nip.trim() == '' || asal_instansi.trim() == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Pastikan semua kolom wajib diisi!',
                    confirmButtonText: 'OK'
                });
                return; // Stop further execution
            }
            
            if (password.trim() == '' || confirmPassword.trim() == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Mohon isi password dan konfirmasi password terlebih dahulu!',
                    confirmButtonText: 'OK'
                });
                return; // Stop further execution
            }
            
            // Validasi panjang minimal password
            if (password.length < 6) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Password harus memiliki minimal 6 karakter!',
                    confirmButtonText: 'OK'
                });
                return; // Stop further execution
            }
            
            // Validasi apakah password dan konfirmasi password sama
            if (password !== confirmPassword) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Password dan konfirmasi password harus sama!',
                    confirmButtonText: 'OK'
                });
                return; // Stop further execution
            }
            
            // Jika semua validasi terpenuhi, lakukan AJAX request
            $.ajax({
                type: method,
                url: url,
                data: data,
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function() {
                            window.location.href = '<?= site_url('l-admin/auth'); ?>'; // Redirect to login page
                        });
                    } else {
                        if (response.validation_errors) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Pastikan semua kolom wajib diisi!',
                                confirmButtonText: 'OK'
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: response.message,
                                confirmButtonText: 'OK'
                            });
                        }
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Terjadi kesalahan. Silakan coba lagi.',
                        confirmButtonText: 'OK'
                    });
                }
            });
        });
    });
</script>


