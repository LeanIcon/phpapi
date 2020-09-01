<template>
<div>
        <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div>
                    <a href="javascript:void(0);" @click="locationmodal" class="btn btn-success mb-2"> Add Location </a>
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
                                <th>Location</th>
                               
                                <th style="width: 120px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(location, index) in locations.data" :key="index">
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customercheck3">
                                        <label class="custom-control-label" for="customercheck3">&nbsp;</label>
                                    </div>
                                </td>

                                <td>{{ location.id }}</td>
                                <td>{{ location.name }}</td>
                                
                                <td>
                                    <!-- <a href="javascript:void(0);" @click="editUser(user)" class="mr-1 text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class=" ri-edit-box-line font-size-18"></i></a>
                                    <a href="javascript:void(0);" @click="viewUser(user)" class="mr-1 text-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="ri-eye-fill font-size-18"></i></a> -->
                                    <a href="javascript:void(0);" @click="deletedru(location.id, index)" class="text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="ri-delete-bin-line font-size-18"></i></a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                                <pagination :data="locations" @pagination-change-page="getResults"></pagination>
                </div>
            </div>
        </div>
    </div>
    <modal name="location-modal">
        <div class="card">
            <div class="card-header">
                Location
            </div>
            <div class="card-body">
               <form method = "post" name="location" id="location" action="#" enctype="multipart/form-data" @submit.prevent="addloc">
                   <div class="row">
                       <div class="col-lg-6 p-1">
                           <label for="">Location</label>
                           <input v-model="location.name" type="text" class="form-control" >
                       </div>
                       
                   </div>
                   <button class="btn btn-primary" >SAVE</button>
               </form>
               
            </div>
        </div>
    </modal>
</div>
</template>

<script>
export default {
     data() {
            return {
                locations: {},
                location: {
                name: '',
                }
            }
        },
        
        methods: {

            getResults(page = 1) {
			axios.get('location?page=' + page)
				.then(response => {
					this.location = response.data;
                })
                .catch((err) =>{
                        console.log(err);
                    })
            },

            addloc() {
                axios.post('location',{
                        'name': this.location.name,
                        
                    })
                    .then((res) => {
                        console.log(res.data);
                        this.drug_class.name = '';
                        this.loading != this.loading
                        this.$swal('Location added successfully');
                        loading.close()
                        $('location-modal').modal('hide');
                        
                    })
                    .catch((err) =>{
                        console.log(err);
                    })
            },        

             deletedru(id, index) {
                axios.delete('location/'+id)
                    .then(resp => {
                    this.drug_classes.data.splice(index, 1)
                    this.$swal('Location deleted successfully');
                            })
                .catch(error => {
                    console.log(error);
                    })
                },

            locationmodal(){
                this.$modal.show('location-modal');
            },


            async loadloc(url = 'location') {
            this.loading = !this.loading
            const loading = this.$vs.loading();
            await axios.get(url)
            .then(({data}) => {
                this.locations = data
                this.loading != this.loading
                loading.close();
                })
            .catch((error) => console.log(error))
            
            }
            
        },

        mounted() {
        this.loadloc();
        this.getResults();
    },


}
</script>

<style>
     table, input, a, label {
        font-family: 'Roboto' !important;
    }
</style>