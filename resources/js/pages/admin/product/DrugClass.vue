<template>
<div>
        <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div>
                    <a href="javascript:void(0);" @click="drugclassmodal" class="btn btn-success mb-2"> Add Drug Class </a>
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
                                <th>Drug Class</th>
                               
                                <th style="width: 120px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(drug_class, index) in drug_classes.data" :key="index">
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customercheck3">
                                        <label class="custom-control-label" for="customercheck3">&nbsp;</label>
                                    </div>
                                </td>

                                <td>{{ drug_class.id }}</td>
                                <td>{{ drug_class.name }}</td>
                                
                                <td>
                                    <!-- <a href="javascript:void(0);" @click="editUser(user)" class="mr-1 text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class=" ri-edit-box-line font-size-18"></i></a>
                                    <a href="javascript:void(0);" @click="viewUser(user)" class="mr-1 text-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="ri-eye-fill font-size-18"></i></a> -->
                                    <a href="javascript:void(0);" @click="deletedru(drug_class.id, index)" class="text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="ri-delete-bin-line font-size-18"></i></a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                                <pagination :data="category_types" @pagination-change-page="getResults"></pagination>
                </div>
            </div>
        </div>
    </div>
    <modal name="drug_class-modal">
        <div class="card">
            <div class="card-header">
                Drug Class
            </div>
            <div class="card-body">
               <form method = "post" name="drug_class" id="drug_class" action="#" enctype="multipart/form-data" @submit.prevent="adddrugcl">
                   <div class="row">
                       <div class="col-lg-6 p-1">
                           <label for="">Drug Class Name</label>
                           <input v-model="drug_class.name" type="text" class="form-control" >
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
                drug_classes: {},
                drug_class: {
                name: '',
                }
            }
        },
        
        methods: {

            getResults(page = 1) {
			axios.get('drug_class?page=' + page)
				.then(response => {
					this.drug_class = response.data;
                });
            },

            adddrugcl() {
                axios.post('drug_class',{
                        'name': this.drug_class.name,
                        
                    })
                    .then((res) => {
                        console.log(res.data);
                        this.drug_class.name = '';
                        this.loading != this.loading
                        this.$swal('Drug Class added successfully');
                        loading.close()
                        $('drug_class-modal').modal('hide');
                        
                    })
                    .catch((err) =>{
                        console.log(err);
                    })
            },        

             deletedru(id, index) {
                axios.delete('drug_class/'+id)
                    .then(resp => {
                    this.drug_classes.data.splice(index, 1)
                    this.$swal('Drug Class deleted successfully');
                            })
                .catch(error => {
                    console.log(error);
                    })
                },

            drugclassmodal(){
                this.$modal.show('drug_class-modal');
            },


            async loaddrugclass(url = 'drug_class') {
            this.loading = !this.loading
            const loading = this.$vs.loading();
            await axios.get(url)
            .then(({data}) => {
                this.drug_classes = data
                this.loading != this.loading
                loading.close();
                })
            .catch((error) => console.log(error))
            
            }
            
        },

        mounted() {
        this.loaddrugclass();
    },


}
</script>

<style>
     table, input, a, label {
        font-family: 'Roboto' !important;
    }
</style>
</style>