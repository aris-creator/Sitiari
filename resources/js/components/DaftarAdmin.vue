<template>
    <div class="container">
        <div class="row mt-5">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Admin</h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" v-model="search" name="table_search" class="form-control float-right" @keyup.enter="searchit" placeholder="Search">
                    <button type="submit" class="btn btn-default" @click="searchit"><i class="fas fa-search"></i></button>
                  </div>
                  <button class="btn btn-success" @click="addAdminModal"><i class="fas fa-user-plus"></i> Tambah Admin</button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Tanggal Registrasi</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="user in users.data" :key="user.id" >
                      <td>{{user.id}}</td>
                      <td>{{user.name}}</td>
                      <td>{{user.email}}</td>
                      <td>{{user.created_at | myDate}}</td>
                      <td>
                          <a href="#" @click="editAdminModal(user)">
                              <i class="fa fa-edit blue"></i>
                          </a>
                          /
                          <a href="#" @click="deleteAdmin(user.id)">
                              <i class="fa fa-trash red"></i>
                          </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <pagination :data="users" @pagination-change-page="getResults"></pagination>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addAdminModal" tabindex="-1" role="dialog" aria-labelledby="addAdminModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 v-show="editMode" class="modal-title" id="addAdminModalLabel">Edit Data Admin</h5>
                <h5 v-show="!editMode" class="modal-title" id="addAdminModalLabel">Tambah Admin Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form @submit.prevent="editMode ? editAdmin() : addAdmin()">
                <div class="modal-body">                
                    <div class="form-group">
                        <label>Nama</label>
                        <input v-model="form.name" type="text" name="name" class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                        <has-error :form="form" field="name"></has-error>
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
                  name: '',
                  email: '',
                  password: ''
              }),
              users : {},
              search : ''
            }
        },
        methods: {
            searchit(){
              axios.get('api/admin/findAdmin?q=' + this.search)
              .then((data) => {
                this.users = data.data
              })
              .catch(() => {
              })
            },
            getResults(page = 1){
              axios.get('api/admin?page=' + page)
                .then(response => {
                  this.users = response.data;
                })
            },
            loadUsers(){
              axios.get("api/admin").then(({data}) => (this.users = data));
            },
            addAdmin(){
                this.$Progress.start();
                this.form.post('api/admin')
                .then(()=>{
                  
                  toast.fire({
                    icon: 'success',
                    title: 'Admin Berhasil Dibuat'
                  })
                  
                  $('#addAdminModal').modal('hide')
                  
                  this.loadUsers();
                  
                  this.$Progress.finish();
                })
                .catch(()=>{
                  this.$Progress.fail()
                })                                
            },
            editAdmin(){
              this.$Progress.start();
              this.form.put('api/admin' + this.form.id)
              .then(() => {
                //sukses
                toast.fire({
                    icon: 'success',
                    title: 'Admin Berhasil Diedit'
                  })
                    this.loadUsers();
                this.$Progress.finish();
                $('#addAdminModal').modal('hide')
              })
              .catch(() => {
                //gagal

                this.$Progress.fail()
              })
            },
            deleteAdmin(id){
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
                  this.form.delete('api/admin' + id).then(()=>{                  
                    toast.fire({
                    icon: 'success',
                    title: 'Admin Berhasil Dihapus'
                  })
                    this.loadUsers();
                    
                  }).catch(()=>{
                    swal.fire("Gagal!", "Terjadi kesalahan.", "warning");
                    this.loadUsers();
                  })
                }
              })                
            },
            addAdminModal(){
              this.editMode = false;
              this.form.reset();
              $('#addAdminModal').modal('show')
            },
            editAdminModal(user){
              this.editMode = true;
              this.form.reset();
              $('#addAdminModal').modal('show');
              this.form.fill(user);
            }
        },
        created() {
            this.loadUsers();
        }
    }
</script>
