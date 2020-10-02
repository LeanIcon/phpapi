<template>
<div>
        <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div>
                    <a href="javascript:void(0);" @click="productmodal" class="btn btn-success mb-2"> Add Manufacturer </a>
                </div>
                <div class="table-responsive mt-3">
                    <table class="table table-centered datatable dt-responsive nowrap dataTable no-footer" style="border-collapse: collapse; border-spacing: 0; width: 100%;" id="DataTables_Table_0">
                        <thead class="thead-light">
                            <tr>
                                <th style="width: 20px;">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customercheck">
                                        <label class="custom-control-label" for="customercheck">&nbsp;</label>
                                    </div>
                                </th>
                                <th>ID</th>
                                <th>Manufacturer</th>
                               
                                <th style="width: 120px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(manufacturer, index) in manufacturers.data" :key="index">
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customercheck3">
                                        <label class="custom-control-label" for="customercheck3">&nbsp;</label>
                                    </div>
                                </td>

                                <td>{{ manufacturer.id }}</td>
                                <td>{{ manufacturer.name }}</td>
                                
                                <td>
                                     <a href="javascript:void(0);" @click.prevent="editmanu(manufacturer)" class="mr-1 text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class=" ri-edit-box-line font-size-18"></i></a> 
                                    <!-- <a href="javascript:void(0);" @click="viewUser(user)" class="mr-1 text-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="ri-eye-fill font-size-18"></i></a> -->
                                    <a href="javascript:void(0);" v-on:click="deletemanu(manufacturer.id, index)" class="text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="ri-delete-bin-line font-size-18"></i></a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                    <pagination :data="manufacturers" @pagination-change-page="getResults"></pagination>
                </div>
            </div>
        </div>
    </div>
    <modal name="manufacturer-modal">
    <form method = "post" name="manufacturer" id="manufacturer" action="#" enctype="multipart/form-data" @submit.prevent="addmanu">
        <div class="card">
            <div class="card-header">
                Manufacturer
            </div>
            <div class="card-body">
               <form action="" class="form" >
                   <div class="row">
                       <div class="col-lg-6 p-1">
                           <label for="">Manufacturer Name</label>
                           <input v-model="manufacturer.name" type="text" class="form-control" >

                           <suglify :slugify="manufacturer.name" :slug.sync="manufacturer.slug">
                    <input slot-scope="{inputBidding}" v-bind="inputBidding"
               type="text" class="form-control" placeholder="Slug ..." hidden>
                </suglify>
                       </div>
                       <div class="col-lg-6 p-1">
                           <label for="manufacturerbrand">Status</label>
                            <select v-model="manufacturer.status" class="form-control select2 select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                            <option v-for="option in options" v-bind:value="option.value">
                            {{ option.text }}
                                </option>
                            </select>
                       </div>
                       
                   </div>
                   
               </form>
               <button v-on:click="showAlert" class="btn btn-primary">SAVE</button>
            </div>
        </div>
    </form>
    </modal>




    <modal name="manu-modal">
    <form method="PUT"  name="manu" id="manu" action="#" enctype="multipart/form-data" @submit.prevent="editmanufacturer(id)">
        <div class="card">
            <div class="card-header">
                Manufacturer
            </div>
            <div class="card-body">
               <form action="" class="form" >
                   <div class="row">
                       <div class="col-lg-6 p-1">
                           <label for="manufacturername">Manufacturer Name</label>
                           <input v-model="manufacturer.name" type="text" class="form-control" name="name" id="name">
                       </div>
            
                       
                   </div>
                   
               </form>
               <button class="btn btn-primary">SAVE</button>
            </div>
        </div>
    </form>
    </modal>











</div>
</template>

<script>
export default {
   // components: { VueSuglify },
    data() {
            return {
                manufacturers: {},
                manufacturer: {
                name: '',
                status: '',
                slug: ''
                },
                id: '',
                options: [
      { text: 'Pending', value: 0 },
      { text: 'Approved', value: 1 },
      
    ]
            }
        },
        
        methods: {
            

            deletemanu(id, index) {
                axios.delete('manufacturers/'+id)
                    .then(resp => {
                    this.manufacturers.data.splice(index, 1)
                    this.$swal('Manufacturer deleted successfully');
                            })
                .catch(error => {
                    console.log(error);
                    })
                },


            editmanu(manufacturer){
                this.$modal.show('manu-modal');
                this.manufacturer.name = manufacturer.name,
                //this.manufacturer.status = manufacturer.status,
                console.log("Worked")
                
            },

            editmanufacturer(id){
                console.log(id)
                axios.put('manufacturers/'+ id, this.manufacturer.name
                    )
                    .then(resp => {
                        this.manufacturer.name = ''
                        this.$swal('Manufacturer edited successfully');
                    })
                    .catch(error => {
                    console.log(error);
                    })
            },

            
             showAlert(){
            this.$swal('Manufacturer added successfully');
            },
            
            editAlert(){
            this.$swal('Manufacturer added successfully');
            },


            async loadmanu(url = 'manufacturers') {
            this.loading = !this.loading
            const loading = this.$vs.loading();
            await axios.get(url)
            .then(({data}) => {
                this.manufacturers = data
                this.loading != this.loading
                loading.close();
                })
            .catch((error) => console.log(error))
            
            },    
            productmodal(){
                this.$modal.show('manufacturer-modal');
            },

            manumodal(){
                this.$modal.show('manu-modal')
            },

            getResults(page = 1) {
			axios.get('manufacturers?page=' + page)
				.then(response => {
					this.manufacturers = response.data;
				});
        },
        

            addmanu() {
                axios.post('manufacturers',{
                        'name': this.manufacturer.name,
                        'status': this.manufacturer.status,
                        'slug': this.manufacturer.slug
                        
                    })
                    .then((res) => {
                        console.log(res.data);
                        this.manufacturer.name = '';
                        this.manufacturer.status = '';
                        this.manufacturer.slug = ''
                        this.loadmanu()
                        this.loading != this.loading
                        loading.close()
                        this.loadmanu();
                    })
                    .catch((err) =>{
                        console.log(err);
                    })
            }        

        },

        mounted() {""
        this.loadmanu();
        this.getResults();
        

    },  

}

</script>

<style>
     table, input, a, label {
        font-family: 'Roboto' !important;
    }
</style>