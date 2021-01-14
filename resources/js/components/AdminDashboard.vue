<template>
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{jumlahPendaftar}}</h3>

                <p>Pekerja Yang Mendaftar</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <router-link to="/pendaftaran-pekerja" class="nav-link" active-class="active" exact>
                <a class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
              </router-link>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{jumlahPekerja}}</h3>

                <p>Pekerja Yang Tersedia</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <router-link to="/daftar-pekerja" class="nav-link" active-class="active" exact>
                <a class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
              </router-link>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{jumlahMajikan}}</h3>

                <p>Majikan Yang Terdaftar</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <router-link to="/daftar-majikan" class="nav-link" active-class="active" exact>
                <a class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
              </router-link>
            </div>
          </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                jumlahPendaftar: '',
                jumlahPekerja: '',
                jumlahMajikan: '',
            }
        },
        methods: {
            getJumlahPekerja(){
                axios.get("api/admin/getJumlahPekerja").then(({data}) => (this.jumlahPekerja = data));
            },
            getJumlahPendaftar(){
                axios.get("api/admin/getJumlahPendaftar").then(({data}) => (this.jumlahPendaftar = data));
            },
            getJumlahMajikan(){
                axios.get("api/admin/getJumlahMajikan").then(({data}) => (this.jumlahMajikan = data));
            }
        },
        created() {
            this.getJumlahPekerja();
            this.getJumlahPendaftar();
            this.getJumlahMajikan();
        }
    }
</script>
