<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>LOGIN | SIGPUKAN</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="icon" type="image/png" href="/assets/images/favicon.png">

    <link href="assets-login/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets-login/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="assets-login/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets-login/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <script src="assets-login/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .info-box {
            min-height: 58px;
        }

        .info-box-icon {
            height: 58px;
            line-height: 58px;
        }

        .info-box-content {
            padding: 5px 10px;
            margin-left: 100px;
        }
    </style>
</head>

<body class="hold-transition login-page" style="background-image: url('assets-login/bcg.jpg'); background-size: 2560px 1440px;">
    <div class="login-box">
        <div class="login-logo" style="font-size: 28px;">
            <a style="color: white;" href="/"><b>SIGPUKAN</b><br />
                <div style="font-size: 18px;">Dinas Kelautan dan Perikanan Jawa Timur</div>
            </a>
        </div>

        <div class="login-box-body">
            <center><img src="/assets/images/favicon.png" class="img-responsive" width="80" alt="User Image"><br /><strong style="font-size: 15px;"> LOGIN FORM</strong></center>

            <form action="login/authenticate" method="post" enctype="multipart/form-data">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Username" name="username" value="petugas1" required>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="password" value="password1" required>
                </div>
                <select name="role" class="form-group form-control" id="role" required>
                    <option value="" selected>Pilih Peran</option>
                    <option value="kepala_bidang">Kepala Bidang</option>
                    <option value="petugas_lapangan">Petugas Lapangan</option>
                    <option value="kepala_tpi">Kepala TPI</option>
                </select> 
                <select name="lokasi" class="form-group form-control" id="lokasi" style="display: none;">
                    <option value="" selected>Pilih Lokasi</option>
                    <option value="TPI Kidang Lor">TPI Kidang Lor</option>
                    <option value="Roban Barat">Roban Barat</option>
                    <option value="Roban Timur">Roban Timur</option>
                    <option value="Celong">Celong</option>
                </select>
                <button id="btn_login" type="submit" class="btn btn-primary btn-lg btn-block btn-flat">LOGIN</button>
                <button id="btn_home" type="button" onclick="home()" class="btn btn-success btn-block btn-flat"> HOME</button>
            </form>
        </div>

    </div>

    <script src="assets-login/bootstrap.min.js"></script>
    <script>
        function home() {
            window.location.href = "../index.php";
        } 

        // Menampilkan lokasi jika role bukan kepala bidang
        document.getElementById('role').addEventListener('change', function() {
            const lokasiSelect = document.getElementById('lokasi');
            if (this.value === 'kepala_tpi' || this.value === 'petugas_lapangan') {
                lokasiSelect.style.display = 'block';
            } else {
                lokasiSelect.style.display = 'none';
            }
        });

        // Tampilkan SweetAlert jika ada error
        <?php if (session()->getFlashdata('error')): ?>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '<?= session()->getFlashdata('error') ?>',
                showConfirmButton: true,
            });
        <?php endif; ?>
    </script>
</body>

</html>