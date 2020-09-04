<template>
  <div>
  <form method = "post" name="dosage_form" id="dosage_form" action="#" enctype="multipart/form-data" @submit.prevent="adddosage">
     <div class="card">
        <div class="card-body">
         <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name">Dosage Form Name</label>
                        <input v-model="dosage_form.name" id="name" name="name" type="text" class="form-control">
                    </div>
                </div>


            </div>
         </div>    
        </div>
    <div class="form-group">
         <div class="col-lg-5">
        <button type="submit" class="btn btn-primary col-md-5" @click="adddosage">SAVE</button>
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
            dosage_form :{
                name : ''
            }
        }

    },

    methods: {

        adddosage() {
                axios.post('dosage_form',{
                        'name': this.dosage_form.name,
                        
                    })
                    .then((res) => {
                        console.log(res.data);
                        this.dosage_form.name = '';
                        this.loading != this.loading
                        loading.close();
                    })
                    .catch((err) =>{
                        console.log(err);
                    })
            }        

        //  saveDosage(url = 'dosage_form') {
        //  const data  = this.dosage_form;
        //     axios.post('dosage_form', data, {headers: {'Content-type': 'application/json'}})
        //      .then((response) => {
        //              this.openNotification('top-right','success')
        //              this.dosage_form = {}
        //              // this.$noty.success("Product Save Successfully")
        //          })
        //      .catch(({response}) => console.log("Error"))
        //  },

    }
}
</script>