<?php
//Menyertakan header halaman
include '.includes/header.php';
?>
<div class="container-xxl flex grow-1 container-p-y">
    <!--- Judul halaman -->
    <div class="row">
        <!-- Form untuk menambahkan pesanan baru -->
        <div class="col-md-10">
            <div class="card mb-4">
                <div class="card-body">
                    <form method="POST" action="proses_post.php" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Pemesan</label>
                            <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Anda" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Alamat Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Masukkan Email Anda (name@example.com)">
                        </div>
                        <div class="mb-3">
                            <label for="nomor_telepon" class="col-md-2 col-form-label">Nomor Telepon</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="tel" value="+62" id="html5-tel-input">
                                </div>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal Pesanan</label>
                            <div class="col-md-10">
                            <input class="form-control" type="date" value="" id="tanggal">
                        </div>
                        </div>
                        <div class="mb-3">
                            <label for="rute_id" class="form-label">Pilih Rute</label>
                            <select class="form-select" name="rute_id" required>
                                <option value="" selected disabled>Pilih salah satu</option>
                                <?php
                                $query = "SELECT * FROM rute"; 
                                $result = $conn->query($query); 
                                if ($result->num_rows > 0){
                                    while ($row = $result->fetch_assoc()){ 
                                        echo "<option value='" . $row["rute_id"] ."'>" . $row["kota_asal"] . " - " . $row["kota_tujuan"] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
// Meneyratkan footer halaman
include '.includes/footer.php';
?>