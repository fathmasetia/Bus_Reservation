<?php
include '.includes/header.php';
include '.includes/toast_notification.php';
?>
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Tabel data rute -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>RUTE</h4>
            <!-- Tombol untuk menambah rute baru -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRute">Tambah Rute</button>
        </div>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table id="datatable" class="table table-hover">
                    <thead>
                        <tr class="text-center">
                            <th width="50px">#</th>
                            <th>Rute</th>
                            <th>Kota Asal</th>
                            <th>Kota Tujuan</th>
                            <th width="150px">Opsi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <!-- Mengambil data kategori dari database -->
                        <?php
                        $index = 1;
                        $query = "SELECT * FROM rute";
                        $exec = mysqli_query($conn, $query);
                        while ($rute = mysqli_fetch_assoc($exec)) :
                        ?>
                        <tr>
                            <!-- Menampilkan nomor, nama ketegori, dan opsi -->
                            <td><?= $index++; ?></td>
                            <td><?= $rute['kota_asal']; ?></td>
                            <td><?= $rute['kota_tujuan']; ?></td>
                            <td><?= $rute['harga']; ?></td>
                            <td>
                                <!-- Dropdown untuk opsi edit dan Delete -->
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editRute_<?= $rute['rute_id']; ?>"><i class="bx bx-edit-alt me-2"></i>Edit</a>
                                        <a href="#" class="dropdown-item" data-bs-toggle="modal"data-bs-target="#deleteRute_<?= $rute['rute_id']; ?>"><i class="bx bx-trash me-2"></i>Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <!-- Modal untuk Hapus Data rute -->
                        <div class="modal fade" id="deleteRute_<?= $rute['rute_id']; ?>" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Hapus Rute?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="proses_rute.php" method="POST">
                                            <div>
                                                <p>Tindakan ini tidak bisa dibatalkan.</p>
                                                <input type="hidden" name="catID" value="<?= $rute['rute_id']; ?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" name="delete" class=btn btn-primary">Hapus</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal untuk Update Data rute -->
                        <div id="editRute_<?= $rute['rute_id']; ?>" class="modal fade" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Update Rute</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="proses_rute.php" method="POST">
                                            <!-- input tersembunyi untuk menyimpan update rute -->
                                                <input type="hidden" name="catID" value="<?= $rute['rute_id']; ?>">
                                            <div class="form-group">
                                                <label>Nama Rute</label>
                                                <!-- Input untuk nama rute -->
                                                <input type="text" value="<?= $rute['kota_asal']; ?>" name="kota_asal" class="form-control">
                                                <input type="text" value="<?= $rute['kota_tujuan']; ?>" name="kota_tujuan" class="form-control">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" name="update" class="btn btn-warning">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    <?php include '.includes/footer.php'; ?>
    <!-- Modal untuk Tambah Data Kategori -->
    <div class="modal fade" id="addCategory" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="proses_kategori.php" method="POST">
                        <div>
                            <label for="namaKategori" class="form-label">Nama Kategori</label>
                            <!-- Input untuk nama kategori baru -->
                            <input type="text" class="form-control" name="category_name" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>