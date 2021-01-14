<template>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-3" v-for="pem in babysitter.data" :key="pem.id">
                <div class="card">
                    <img :src="getFoto(pem.list_pekerja.fotoDiri)" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{pem.list_pekerja.nama}}</h5>
                        <p class="card-text">Usia : {{pem.list_pekerja.usia}}</p>
                        <p class="card-text">Alamat : {{pem.list_pekerja.alamat}}</p>
                        <p class="card-text">Agama : {{pem.list_pekerja.agama}}</p>
                        <p class="card-text">Gaji : {{pem.list_pekerja.gaji | currency}}</p>
                        <p class="card-text">Keahlian : {{pem.list_pekerja.keahlian}}</p>
                        <p class="card-text">Kondisi Khusus : {{pem.list_pekerja.kondisiKhusus}}</p>
                        <star-rating v-model="pem.list_pekerja.rating" :read-only="true" :increment="0.5" :star-size="30"></star-rating>
                        <br>
                        <a href="#" class="btn btn-primary">Pesan</a>
                    </div>
                </div>
            </div>            
        </div>
        <pagination :data="babysitter" @pagination-change-page="getResults"></pagination>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                babysitter: {},
            }
        },
        methods: {
            loadBabysitter(){
                axios.get("api/majikan/showBabysitter").then(({data}) => (this.babysitter = data));
            },
            getFoto(a){
                return "storage/img/profile/" + a;
            },
            getResults(page = 1){
              axios.get('api/majikan/showBabysitter?page=' + page)
                .then(response => {
                  this.babysitter = response.data;
                })
            },
        },
        created() {
            this.loadBabysitter();
        }
    }
</script>
