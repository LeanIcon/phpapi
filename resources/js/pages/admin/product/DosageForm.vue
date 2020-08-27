<template>
<div>
        <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div>
                    <a href="javascript:void(0);" class="btn btn-success mb-2"> Add Dosage Form </a>
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
                                <th>Dosage Form</th>
                               
                                <th style="width: 120px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(dosage_form, index) in dosage_forms.data" :key="index">
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customercheck3">
                                        <label class="custom-control-label" for="customercheck3">&nbsp;</label>
                                    </div>
                                </td>

                                <td>{{ dosage_form.id }}</td>
                                <td>{{ dosage_form.name }}</td>
                                
                                <td>
                                    <a href="javascript:void(0);" @click="editUser(user)" class="mr-1 text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class=" ri-edit-box-line font-size-18"></i></a>
                                    <a href="javascript:void(0);" @click="viewUser(user)" class="mr-1 text-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="ri-eye-fill font-size-18"></i></a>
                                    <a href="javascript:void(0);" @click="deleteUser(user)" class="text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="ri-delete-bin-line font-size-18"></i></a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <modal name="dosage_form-modal">
        <div class="card">
            <div class="card-header">
                Dosage Form
            </div>
            <div class="card-body">
               <form action="" class="form" >
                   <div class="row">
                       <div class="col-lg-6 p-1">
                           <label for="">Dosage Form Name</label>
                           <input v-model="selectedUser.name" type="text" class="form-control" >
                       </div>
                       
                   </div>
                   
               </form>
               <button class="btn btn-primary" >SAVE</button>
            </div>
        </div>
    </modal>
</div>
</template>

<script>
export default {
    data() {
            return {
                dosage_forms: {},
                selectedUser: {
                name: '',
                }
            }
        },
        
        methods: {

            async loaddosage(url = 'dosage_form') {
            this.loading = !this.loading
            const loading = this.$vs.loading();
            await axios.get(url)
            .then(({data}) => {
                this.dosage_forms = data
                this.loading != this.loading
                loading.close();
                })
            .catch((error) => console.log(error))
            
            }
            
        },

        mounted() {
        this.loaddosage();
    },

}

</script>

<style>
     table, input, a, label {
        font-family: 'Roboto' !important;
    }
</style>
</style>