<template>
<div>
        <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div>
                    <a href="javascript:void(0);" @click="productmodal" class="btn btn-success mb-2"> Add Drug Legal Status </a>
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
                                <th>Drug Legal Status</th>
                               
                                <th style="width: 120px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(category_type, index) in category_types.data" :key="index">
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customercheck3">
                                        <label class="custom-control-label" for="customercheck3">&nbsp;</label>
                                    </div>
                                </td>

                                <td>{{ category_type.id }}</td>
                                <td>{{ category_type.name }}</td>
                                
                                <td>
                                    <!-- <a href="javascript:void(0);" @click="editUser(user)" class="mr-1 text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class=" ri-edit-box-line font-size-18"></i></a>
                                    <a href="javascript:void(0);" @click="viewUser(user)" class="mr-1 text-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="ri-eye-fill font-size-18"></i></a> -->
                                    <a href="javascript:void(0);" v-on:click="deletedrul(category_type.id, index)" class="text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="ri-delete-bin-line font-size-18"></i></a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                    <pagination :data="category_types" @pagination-change-page="getResults"></pagination>
                </div>
            </div>
        </div>
    </div>
    <modal name="category_type-modal">
        <form method = "post" name="category_type" id="category_type" action="#" enctype="multipart/form-data" @submit.prevent="adddrug">
        <div class="card">
            <div class="card-header">
                Drug Legal Status
            </div>
            <div class="card-body">
                   <div class="row">
                       <div class="col-lg-6 p-1">
                           <label for="">Drug Legal Status Name</label>
                           <input v-model="category_type.name" type="text" class="form-control" >
                       </div>
                       
                   </div>
                   
               
               <button v-on:click="showAlert" class="btn btn-primary" >SAVE</button>
            </div>
        </div>
        </form>
    </modal>
</div>
</template>

<script>
export default {
    data() {
            return {
                category_types: {},
                category_type: {
                name: '',
                },
                
            }
        },
        
        methods: {


            showAlert(){
            this.$swal('Drug Legal Status added successfully');
        },

            getResults(page = 1) {
			axios.get('category_types?page=' + page)
				.then(response => {
					this.category_types = response.data;
                });
            },

            adddrug() {
                axios.post('category_types',{
                        'name': this.category_type.name,
                        
                    })
                    .then((res) => {
                        console.log(res.data);
                        this.category_type.name = '';
                        this.loadcattypes()
                        this.loading != this.loading
                        loading.close()
                        $('category_type-modal').modal('hide');
                        
                    })
                    .catch((err) =>{
                        console.log(err);
                    })
            },        

            productmodal(){
                this.$modal.show('category_type-modal');
            },

            deletedrul(id, index) {
                axios.delete('category_types/'+id)
                    .then(resp => {
                    this.category_types.data.splice(index, 1)
                    this.$swal('Drug Legal Status deleted successfully');
                            })
                .catch(error => {
                    console.log(error);
                    })
                },

            async loadcattypes(url = 'category_types') {
            this.loading = !this.loading
            const loading = this.$vs.loading();
            await axios.get(url)
            .then(({data}) => {
                this.category_types = data
                this.loading != this.loading
                loading.close();
                })
            .catch((error) => console.log(error))
            
            }
            
        },

        mounted() {
        this.loadcattypes();
    },

}

</script>

<style>
     table, input, a, label {
        font-family: 'Roboto' !important;
    }
</style>