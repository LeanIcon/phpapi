<template>
  <div>
  <form method = "post" name="manufacturer" id="manufacturer" action="#" enctype="multipart/form-data" @submit.prevent="addmanu">
     <div class="card">
        <div class="card-body">
         <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name">Manufacturers Name</label>
                        <input v-model="manufacturer.name" id="name" name="name" type="text" class="form-control">
                    </div>
                </div>


            </div>
         </div>    
        </div>
    <div class="form-group">
         <div class="col-lg-5">
        <button type="submit" class="btn btn-primary col-md-5">SAVE</button>
         </div>
     </div>
    </div>
    </form>

    


    </div>

</template>

<script>
export default {
    data () {
        return{
            manufacturer :{
                name : ''
            }
        }

    },

    methods: {

        addmanu() {
                axios.post('manufacturers',{
                        'name': this.manufacturer.name,
                        
                    })
                    .then((res) => {
                        console.log(res.data);
                        this.manufacturer.name = '';
                        this.loading != this.loading
                        loading.close();
                    })
                    .catch((err) =>{
                        console.log(err);
                    })
            }        

    }
}
</script>