<!-- Modal Create-->
<div class="modal fade" id="modalSemester4Create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form id="form-create" method="POST">
            @csrf
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Create Data</h1>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" placeholder="Name" name="name" required>
                </div>

                <div class="form-group">
                    <label>Nisn</label>
                    <input type="text" class="form-control" placeholder="Nisn" name="nisn" required>
                </div>

                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select class="form-control" name="jekel">
                      <option selected value="L">Laki-Laki</option>
                      <option value="P">Perempuan</option>
                    </select>
                </div>

            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save Data</button>
            </div>
        </form>
      </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="modalSemester4Edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form id="form-edit" method="POST">
            @csrf
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" placeholder="Name" name="name" required>
                    <input type="hidden" name="id">
                </div>

                <div class="form-group">
                    <label>Nisn</label>
                    <input type="text" class="form-control" placeholder="Nisn" name="nisn" required>
                </div>

                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select class="form-control" name="jekel">
                      <option selected value="L">Laki-Laki</option>
                      <option value="P">Perempuan</option>
                    </select>
                </div>

            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update Data</button>
            </div>
        </form>
      </div>
    </div>
</div>
