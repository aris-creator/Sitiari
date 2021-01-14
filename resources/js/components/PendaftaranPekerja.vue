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
                          <a href="#" @click="konfirmasiPekerja(pkj)">
                              <i class="fa fa-check blue"></i>
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
    </div>
</template>

<script>
    export default {
        data(){
            return{
              form: new Form({
                  id: '',
                  email: '',
                  password: '',
                  status: '',
                  jenisPekerjaan: '',
              }),
              pekerja : {},
              search : '',
            }
        },
        methods: {
            searchit(){
              axios.get('api/admin/findPendaftar?q=' + this.search)
              .then((data) => {
                this.pekerja = data.data
              })
              .catch(() => {
              })
            },
            getResults(page = 1){
              axios.get('api/admin/showPendaftar?page=' + page)
                .then(response => {
                  this.pekerja = response.data;
                })
            },
            loadUsers(){
              axios.get("api/admin/showPendaftar").then(({data}) => (this.pekerja = data));
            },
            konfirmasiPekerja(user){
              this.$Progress.start();
              this.form.id = user.id;
              this.form.password = user.password;
              this.form.email = user.email;
              this.form.status = 'tersedia';
              this.form.jenisPekerjaan = user.jenisPekerjaan;
              this.form.put('api/admin/konfirmasiPendaftar/' + this.form.id)
              .then(() => {
                //sukses
                this.loadUsers();
                toast.fire({
                    icon: 'success',
                    title: 'Pekerja Berhasil Dikonfirmasi'
                  })
                this.$Progress.finish();
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
                  this.form.delete('api/admin/hapusPendaftar/' + id).then(()=>{                  
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
            getFoto(a){
            
              return "storage/img/profile/" + a;
            }
        },
        created() {
            this.loadUsers();
        }
    }
</script>
