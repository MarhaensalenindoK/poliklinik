<div class="modal fade" id="createClinic" tabindex="-1" role="dialog" aria-labelledby="Create Clinic" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createClinicTitle">Create Clinic</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="create-clinic-form" action="{{ url('/database/clinic') }}" method="POST" enctype='multipart/form-data'>
                @csrf
            <div class="modal-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="name" placeholder="Masukan nama klinik" required>
                    </div>
                    <div class="form-group">
                        <label>Tentang klinik</label>
                        <textarea class="form-control mt-3" rows="5" name="about" cols="30" placeholder="Masukan tentang" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="address" placeholder="Masukan alamat klinik" required>
                    </div>
                    <div class="form-group">
                        <label>Fasilitas</label>
                        <div id="input-facility">
                            <div class="inputManyFacility input-facility-1">
                                <input type="text" class="form-control" name="nameFacility[]" placeholder="Nama Fasilitas" required>
                                <textarea class="form-control mt-3" rows="5" name="descriptionFacility[]" cols="30" placeholder="Deskripsi Fasilitas" required></textarea>
                            </div>
                        </div>
                        <div>
                            <a href="javascript:void(0)" class="btn btn-primary mt-3" onclick="addInputFacility()">Tambah Fasilitas</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Layanan</label>
                        <div id="input-service">
                            <div class="inputManyService input-service-1">
                                <input type="text" class="form-control" name="nameService[]" placeholder="Layanan" required>
                            </div>
                        </div>
                        <div>
                            <a href="javascript:void(0)" class="btn btn-primary mt-3" onclick="addInputService()">Tambah Layanan</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Kontak</label>
                        <input type="number" class="form-control" name="contact" placeholder="Masukan kontak klinik" >
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Masukan email klinik" >
                    </div>
                    <div class="form-group">
                        <label>Gambar Profil</label>
                        <input type="file" name="image" class="dropify" data-max-file-size="2000K" accept="image/*">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-round btn-primary" >Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
