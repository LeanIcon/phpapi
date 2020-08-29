<template>
<div>
        <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div>
                    <a href="javascript:void(0);" @click="regionmodal" class="btn btn-success mb-2"> Add Region </a>
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
                                <th>Region</th>
                               
                                <th style="width: 120px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(region, index) in regions.data" :key="index">
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customercheck3">
                                        <label class="custom-control-label" for="customercheck3">&nbsp;</label>
                                    </div>
                                </td>

                                <td>{{ region.id }}</td>
                                <td>{{ region.name }}</td>
                                
                                <td>
                                    <!-- <a href="javascript:void(0);" @click="editUser(user)" class="mr-1 text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class=" ri-edit-box-line font-size-18"></i></a>
                                    <a href="javascript:void(0);" @click="viewUser(user)" class="mr-1 text-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="ri-eye-fill font-size-18"></i></a> -->
                                    <a href="javascript:void(0);" v-on:click="deletereg(region.id, index)" class="text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="ri-delete-bin-line font-size-18"></i></a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <modal name="region-modal">
        <div class="card">
            <div class="card-header">
                Region
            </div>
            <div class="card-body">
               <form method = "post" name="region" id="region" action="#" enctype="multipart/form-data" @submit.prevent="addreg">
                   <div class="row">
                       <div class="col-lg-6 p-1">
                           <label for="">Region</label>
                           <input v-model="region.name" type="text" class="form-control" >
                       </div>
                       
                   </div>    
               </form>
               <button v-on:click="addreg" class="btn btn-primary" >SAVE</button>
            </div>
        </div>
    </modal>
</div>
</template>

<script>
export default {
    data() {
            return {
                regions: {},
                region: {
                name: '',
                }
            }
        },
        
        methods: {

            showAlert(){
            this.$swal('Manufacturer added successfully');
        },

            deletereg(id, index) {
                axios.delete('region/'+id)
                    .then(resp => {
                    this.regions.data.splice(index, 1)
                    this.$swal('Region deleted successfully');
                            })
                .catch(error => {
                    console.log(error);
                    })
                },


            addreg() {
                axios.post('region',{
                        'name': this.region.name,
                        
                    })
                    .then((res) => {
                        console.log(res.data);
                        this.region.name = '';
                        this.loading != this.loading
                         this.$swal('Region added successfully');
                        loading.close()
                        $('region-modal').modal('hide');
                        
                    })
                    .catch((err) =>{
                        console.log(err);
                    })
            },        

            regionmodal(){
                this.$modal.show('region-modal');
            },

            async loadregion(url = 'region') {
            this.loading = !this.loading
            const loading = this.$vs.loading();
            await axios.get(url)
            .then(({data}) => {
                this.regions = data
                this.loading != this.loading
                loading.close();
                })
            .catch((error) => console.log(error))
            
            }
            
        },

        mounted() {
        this.loadregion();
    },

}

</script>

<style>
     table, input, a, label {
        font-family: 'Roboto' !important;
    }
</style>