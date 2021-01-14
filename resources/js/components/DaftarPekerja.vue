<template>
    <div class="container">
        <div class="row mt-5">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Pekerja</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" v-model="search" name="table_search" class="form-control float-right" @keyup.enter="searchit" placeholder="Search">
                    <button type="submit" class="btn btn-default" @click="searchit"><i class="fas fa-search"></i></button>
                  </div>
                  <button class="btn btn-success" @click="addPekerjaModal"><i class="fas fa-user-plus"></i>Tambah Pekerja</button>
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
                      <th>Usia</th>
                      <th>Telepon</th>
                      <th>Alamat</th>
                      <th>Keahlian</th>
                      <th>Kondisi Khusus</th>
                      <th>Agama</th>
                      <th>Gaji</th>
                      <th>Jenis Pekerjaan</th>
                      <th>Tanggal Masuk</th>
                      <th>Status</th>
                      <th>Foto KTP</th>
                      <th>Foto Diri</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="pkj in pekerja.data" :key="pkj.id" >
                      <td>{{pkj.id}}</td>
                      <td>{{pkj.email}}</td>
                      <td>{{pkj.list_pekerja.nama}}</td>
                      <td>{{pkj.list_pekerja.nomorKTP}}</td>
                      <td>{{pkj.list_pekerja.usia}}</td>
                      <td>{{pkj.list_pekerja.tel}}</td>
                      <td>{{pkj.list_pekerja.alamat}}</td>
                      <td>{{pkj.list_pekerja.keahlian}}</td>
                      <td>{{pkj.list_pekerja.kondisiKhusus}}</td>
                      <td>{{pkj.list_pekerja.agama}}</td>
                      <td>{{pkj.list_pekerja.gaji}}</td>
                      <td>{{pkj.jenisPekerjaan}}</td>
                      <td>{{pkj.list_pekerja.tanggalMasuk | myDate}}</td>
                      <td>{{pkj.status}}</td>
                      <td>
                        <img class="img-fluid img-thumbnail" :src="getFoto(pkj.list_pekerja.fotoKTP)">
                      </td>
                      <td>
                        <img class="img-fluid img-thumbnail" :src="getFoto(pkj.list_pekerja.fotoDiri)">
                      </td>
                      <td>
                          <a href="#" @click="editPekerjaModal(pkj)">
                              <i class="fa fa-edit blue"></i>
                          </a>
                          /
                          <a href="#" @click="deletePekerja(pkj.id)">
                              <i class="fa fa-trash red"></i>
                          </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <pagination :data="pekerja" @pagination-change-page="getResults"></pagination>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addPekerjaModal" tabindex="-1" role="dialog" aria-labelledby="addPekerjaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 v-show="editMode" class="modal-title" id="addPekerjaModalLabel">Edit Data Pekerja</h5>
                <h5 v-show="!editMode" class="modal-title" id="addPekerjaModalLabel">Tambah Pekerja Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form @submit.prevent="editMode ? editPekerja() : addPekerja()">
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
                        <label>Usia</label>
                        <input v-model="form.usia" type="number" name="usia" class="form-control" :class="{ 'is-invalid': form.errors.has('usia') }">
                        <has-error :form="form" field="usia"></has-error>
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
                        <label>Keahlian</label>
                        <textarea v-model="form.keahlian" rows="3" name="keahlian" class="form-control" :class="{ 'is-invalid': form.errors.has('keahlian') }"></textarea>
                        <has-error :form="form" field="keahlian"></has-error>
                    </div>

                    <div class="form-group">
                        <label>Kondisi Khusus</label>
                        <textarea v-model="form.kondisiKhusus" rows="2" name="kondisiKhusus" class="form-control" :class="{ 'is-invalid': form.errors.has('kondisiKhusus') }"></textarea>
                        <has-error :form="form" field="kondisiKhusus"></has-error>
                    </div>

                    <div class="form-group">
                        <label>Agama</label>
                        <input v-model="form.agama" type="text" name="agama" class="form-control" :class="{ 'is-invalid': form.errors.has('agama') }">
                        <has-error :form="form" field="agama"></has-error>
                    </div>

                    <div class="form-group">
                        <label>Gaji</label>
                        <input v-model="form.gaji" type="text" name="gaji" class="form-control" :class="{ 'is-invalid': form.errors.has('gaji') }">
                        <has-error :form="form" field="gaji"></has-error>
                    </div>

                    <div class="form-group">
                      <label for="status">Jenis Pekerjaan</label>
                      <select v-model="form.jenisPekerjaan" name="jenisPekerjaan" class="form-control" :class="{ 'is-invalid': form.errors.has('jenisPekerjaan') }">
                      <has-error :form="form" field="jenisPekerjaan"></has-error> 
                        <option>pembantu</option>
                        <option>babysitter</option>
                        <option>perawat</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="status">Status</label>
                      <select v-model="form.status" name="status" class="form-control" :class="{ 'is-invalid': form.errors.has('status') }">
                      <has-error :form="form" field="status"></has-error> 
                        <option>tersedia</option>
                        <option>bekerja</option>
                        <option>resign</option>
                        <option>blacklist</option>
                        <option>pending</option>
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
                  usia: '',
                  tel: '',
                  alamat: '',
                  keahlian: '',
                  kondisiKhusus: '',
                  agama: '',
                  fotoKTP: '',
                  fotoDiri: '',
                  status: '',
                  gaji: '',
                  jenisPekerjaan: '',
              }),
              pekerja : {},
              search : '',
            }
        },
        methods: {
            searchit(){
              axios.get('api/admin/findPekerja?q=' + this.search)
              .then((data) => {
                this.pekerja = data.data
              })
              .catch(() => {
              })
            },
            getResults(page = 1){
              axios.get('api/admin/showPekerja?page=' + page)
                .then(response => {
                  this.pekerja = response.data;
                })
            },
            loadUsers(){
              axios.get("api/admin/showPekerja").then(({data}) => (this.pekerja = data));
            },
            addPekerja(){
                this.$Progress.start();
                this.form.post('api/admin/addPekerja')
                .then(()=>{
                  
                  toast.fire({
                    icon: 'success',
                    title: 'Pekerja Berhasil Dibuat'
                  })
                  
                  $('#addPekerjaModal').modal('hide')
                  
                  this.loadUsers();
                  
                  this.$Progress.finish();
                })
                .catch(()=>{
                  this.$Progress.fail()
                  swal.fire("Oops...", "Terjadi kesalahan", "error");
                })                                
            },
            editPekerja(){
              this.$Progress.start();
              this.form.put('api/admin/editPekerja/' + this.form.id)
              .then(() => {
                //sukses
                this.loadUsers();
                toast.fire({
                    icon: 'success',
                    title: 'Pekerja Berhasil Diedit'
                  })
                this.$Progress.finish();
                $('#addPekerjaModal').modal('hide')
              })
              .catch(() => {
                //gagal
                swal.fire("Oops...", "Terjadi kesalahan", "error");
                this.$Progress.fail()
                this.loadUsers();
              })
            },
            deletePekerja(id){
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
                  this.form.delete('api/admin/hapusPekerja/' + id).then(()=>{                  
                    toast.fire({
                    icon: 'success',
                    title: 'Pekerja Berhasil Dihapus'
                  })
                    this.loadUsers();
                    
                  }).catch(()=>{
                    swal.fire("Gagal!", "Terjadi kesalahan.", "warning");
                    this.loadUsers();
                  })
                }
              })                
            },
            addPekerjaModal(){
              this.editMode = false;
              this.form.reset();
              $('#addPekerjaModal').modal('show')
            },
            editPekerjaModal(user){
              this.editMode = true;
              this.form.reset();
              $('#addPekerjaModal').modal('show');
              this.form.id = user.id;
              this.form.nama = user.list_pekerja.nama;
              this.form.email = user.email;
              this.form.nomorKTP = user.list_pekerja.nomorKTP;
              this.form.usia = user.list_pekerja.usia;
              this.form.tel = user.list_pekerja.tel;
              this.form.alamat = user.list_pekerja.alamat;
              this.form.keahlian = user.list_pekerja.keahlian;
              this.form.kondisiKhusus = user.list_pekerja.kondisiKhusus;
              this.form.agama = user.list_pekerja.agama;
              this.form.fotoKTP = user.list_pekerja.fotoKTP;
              this.form.fotoDiri = user.list_pekerja.fotoDiri;
              this.form.status = user.status;
              this.form.gaji = user.list_pekerja.gaji;
              this.form.jenisPekerjaan = user.jenisPekerjaan;
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
