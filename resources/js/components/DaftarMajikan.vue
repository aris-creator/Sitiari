<template>
    <div class="container">
        <div class="row mt-5">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Majikan</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" v-model="search" name="table_search" class="form-control float-right" @keyup.enter="searchit" placeholder="Search">
                    <button type="submit" class="btn btn-default" @click="searchit"><i class="fas fa-search"></i></button>
                  </div>
                  <button class="btn btn-success" @click="addMajikanModal"><i class="fas fa-user-plus"></i>Tambah Majikan</button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Email</th>
                      <th>Nama</th>
                      <th>Nomor KTP</th>
                      <th>Telepon</th>
                      <th>Alamat</th>
                      <th>Tanggal Masuk</th>
                      <th>Status</th>
                      <th>Foto KTP</th>
                      <th>Foto Diri</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="mjk in majikan.data" :key="mjk.id" >
                      <td>{{mjk.id}}</td>
                      <td>{{mjk.email}}</td>
                      <td>{{mjk.list_majikan.nama}}</td>
                      <td>{{mjk.list_majikan.nomorKTP}}</td>
                      <td>{{mjk.list_majikan.tel}}</td>
                      <td>{{mjk.list_majikan.alamat}}</td>
                      <td>{{mjk.list_majikan.tanggalMasuk | myDate}}</td>
                      <td>{{mjk.status}}</td>
                      <td>
                        <img class="img-fluid img-thumbnail" :src="getFoto(mjk.list_majikan.fotoKTP)">
                      </td>
                      <td>
                        <img class="img-fluid img-thumbnail" :src="getFoto(mjk.list_majikan.fotoDiri)">
                      </td>
                      <td>
                          <a href="#" @click="editMajikanModal(mjk)">
                              <i class="fa fa-edit blue"></i>
                          </a>
                          /
                          <a href="#" @click="deleteMajikan(mjk.id)">
                              <i class="fa fa-trash red"></i>
                          </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <pagination :data="majikan" @pagination-change-page="getResults"></pagination>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addMajikanModal" tabindex="-1" role="dialog" aria-labelledby="addMajikanModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 v-show="editMode" class="modal-title" id="addMajikanModalLabel">Edit Data Majikan</h5>
                <h5 v-show="!editMode" class="modal-title" id="addMajikanModalLabel">Tambah Majikan Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form @submit.prevent="editMode ? editMajikan() : addMajikan()">
                <div class="modal-body">                
                    <div class="form-group">
                        <label>Nama</label>
                        <input v-model="form.nama" type="text" name="nama" class="form-control" :class="{ 'is-invalid': form.errors.has('nama') }">
                        <has-error :form="form" field="nama"></has-error>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input v-model="form.email" type="email" name="email" class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                        <has-error :form="form" field="email"></has-error>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input v-model="form.password" type="password" name="password" class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                        <has-error :form="form" field="password"></has-error>
                    </div> 

                    <div class="form-group">
                        <label>Nomor KTP</label>
                        <input v-model="form.nomorKTP" type="number" name="nomorKTP" class="form-control" :class="{ 'is-invalid': form.errors.has('nomorKTP') }">
                        <has-error :form="form" field="nomorKTP"></has-error>
                    </div> 

                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input v-model="form.tel" type="number" name="tel" class="form-control" :class="{ 'is-invalid': form.errors.has('tel') }">
                        <has-error :form="form" field="tel"></has-error>
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input v-model="form.alamat" type="text" name="alamat" class="form-control" :class="{ 'is-invalid': form.errors.has('alamat') }">
                        <has-error :form="form" field="alamat"></has-error>
                    </div>

                    <div class="form-group">
                      <label for="status">Status</label>
                      <select v-model="form.status" name="status" class="form-control" :class="{ 'is-invalid': form.errors.has('status') }">
                      <has-error :form="form" field="status"></has-error> 
                        <option>aktif</option>
                        <option>nonaktif</option>
                        <option>blacklist</option>
                      </select>
                    </div>

                    <div class="form-group">
                        <label>Foto KTP</label>
                        <input type="file" @change="updatePhotoKTP" name="fotoKTP" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Foto Diri</label>
                        <input type="file" @change="updatePhotoDiri" name="fotoDiri" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    <button v-show="!editMode" type="submit" class="btn btn-primary">Tambah</button>
                    <button v-show="editMode" type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
              editMode : true,
              form: new Form({
                  id: '',
                  nama: '',
                  email: '',
                  password: '',
                  nomorKTP: '',
                  tel: '',
                  alamat: '',
                  fotoKTP: '',
                  fotoDiri: '',
                  status: ''
              }),
              majikan : {},
              search: '',
            }
        },
        methods: {
            searchit(){
              axios.get('api/admin/findMajikan?q=' + this.search)
              .then((data) => {
                this.majikan = data.data
              })
              .catch(() => {
              })
            },
            getResults(page = 1){
              axios.get('api/admin/showMajikan?page=' + page)
                .then(response => {
                  this.majikan = response.data;
                })
            },
            loadUsers(){
              axios.get("api/admin/showMajikan").then(({data}) => (this.majikan = data));
            },
            addMajikan(){
                this.$Progress.start();
                this.form.post('api/admin/addMajikan')
                .then(()=>{
                  
                  toast.fire({
                    icon: 'success',
                    title: 'Majikan Berhasil Dibuat'
                  })
                  
                  $('#addMajikanModal').modal('hide')
                  
                  this.loadUsers();
                  
                  this.$Progress.finish();
                })
                .catch(()=>{
                  this.$Progress.fail()
                  swal.fire("Oops...", "Terjadi kesalahan", "error");
                })                                
            },
            editMajikan(){
              this.$Progress.start();
              this.form.put('api/admin/editMajikan/' + this.form.id)
              .then(() => {
                //sukses
                this.loadUsers();
                toast.fire({
                    icon: 'success',
                    title: 'Majikan Berhasil Dibuat'
                  })
                this.$Progress.finish();
                $('#addMajikanModal').modal('hide')
              })
              .catch(() => {
                //gagal
                swal.fire("Oops...", "Terjadi kesalahan", "error");
                this.$Progress.fail()
                this.loadUsers();
              })
            },
            deleteMajikan(id){
              swal.fire({
                title: 'Apa anda yakin?',
                text: "Perubahan ini tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
              }).then((result) => {
                if (result.value) {
                  this.form.delete('api/admin/hapusMajikan/' + id).then(()=>{                  
                    toast.fire({
                    icon: 'success',
                    title: 'Majikan Berhasil Dihapus'
                  })
                    this.loadUsers();
                    
                  }).catch(()=>{
                    swal.fire("Gagal!", "Terjadi kesalahan.", "warning");
                    this.loadUsers();
                  })
                }
              })                
            },
            addMajikanModal(){
              this.editMode = false;
              this.form.reset();
              $('#addMajikanModal').modal('show')
            },
            editMajikanModal(user){
              this.editMode = true;
              this.form.reset();
              $('#addMajikanModal').modal('show');
              this.form.id = user.id;
              this.form.nama = user.list_majikan.nama;
              this.form.email = user.email;
              this.form.nomorKTP = user.list_majikan.nomorKTP;
              this.form.tel = user.list_majikan.tel;
              this.form.alamat = user.list_majikan.alamat;
              this.form.fotoKTP = user.list_majikan.fotoKTP;
              this.form.fotoDiri = user.list_majikan.fotoDiri;
              this.form.status = user.status;
            },
            updatePhotoKTP(e){
              this.$Progress.start();
              let file = e.target.files[0];
              let reader = new FileReader();
              if(file['size'] < 6291456){
                reader.onloadend = ( file ) => {
                  this.form.fotoKTP = reader.result;
                }
                reader.readAsDataURL(file);
                this.$Progress.finish();
              } else{
                swal.fire("Oops...", "File terlalu besar", "error");
                this.$Progress.fail();
              }
              
            },
            updatePhotoDiri(e){
              this.$Progress.start();
              let file = e.target.files[0];
              let reader = new FileReader();
              if(file['size'] < 6291456){
                reader.onloadend = ( file ) => {
                  this.form.fotoDiri = reader.result;
                }
                reader.readAsDataURL(file);
                this.$Progress.finish();
              } else{
                swal.fire("Oops...", "File terlalu besar", "error");
                this.$Progress.fail();
              }
              
            },
            getFoto(a){
            
              return "storage/img/profile/" + a;
            }
        },
        created() {
            this.loadUsers();
        }
    }
</script>
