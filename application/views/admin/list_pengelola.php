<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">List User</h1>
    <!-- Page Heading -->
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Kontak</th>
                    <th>Foto</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($data_pengelola as $val) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $val['nama_pengelola']; ?></td>
                        <td><?= $val['alamat_pengelola']; ?></td>
                        <td><?= $val['kontak_pengelola']; ?></td>
                        </td>
                        <td><img src="<?php echo base_url() . 'assets/img/profile/' . $val['gambar_profil']; ?>" width="100" height="100" /></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() . 'admin/save_dataprodi'; ?>" method="post">
                    <div class="form-group">
                        <label><b>Nama Prodi</b></label>
                        <input type="text" name="nama_prodi" class="form-control" placeholder="Silahkan Masukkan Nama Prodi">
                    </div>
                    <div class="form-group">
                        <label><b>Nama Jurusan</b></label>
                        <input type="textbox" name="jurusan" class="form-control" placeholder="Silahkan Masukkan Nama Jurusan">
                    </div>
                    <div class="form-group">
                        <label><b>Nama Fakultas</b></label>
                        <input type="text" name="fakultas" class="form-control" placeholder="Silahkan Masukkan Jumlah Fakultas">
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>

    </div>
</div>
</div>
</div>