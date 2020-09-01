<template>
<div>
        <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div>
                    <a href="javascript:void(0);" @click="productmodal" class="btn btn-success mb-2"> Add Dosage Form </a>
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
                                    <!-- <a href="javascript:void(0);" @click="editUser(user)" class="mr-1 text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class=" ri-edit-box-line font-size-18"></i></a> -->
                                    <!-- <a href="javascript:void(0);" @click="viewUser(user)" class="mr-1 text-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="ri-eye-fill font-size-18"></i></a> -->
                                    <a href="javascript:void(0);" v-on:click="deletedos(dosage_form.id, index)" class="text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="ri-delete-bin-line font-size-18"></i></a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                    <pagination :data="dosage_forms" @pagination-change-page="getResults"></pagination>
                </div>
            </div>
        </div>
    </div>
<modal name="dosage_form-modal">
    <form method = "post" name="dosage_form" id="dosage_form" action="#" enctype="multipart/form-data" @submit.prevent="adddosage">
        <div class="card">
            <div class="card-header">
                Dosage Form
            </div>
            <div class="card-body">
               <form action="" class="form" >
                   <div class="row">
                       <div class="col-lg-6 p-1">
                           <label for="">Dosage Form Name</label>
                           <input v-model="dosage_form.name" type="text" class="form-control" >
                       </div>
                        <suglify :slugify="dosage_form.name" :slug.sync="dosage_form.slug">
                    <input slot-scope="{inputBidding}" v-bind="inputBidding"
               type="text" class="form-control" placeholder="Slug ..." hidden>
</suglify>
                   </div>
                   
               </form>
               <button v-on:click="showAlert" class="btn btn-primary" >SAVE</button>
            </div>
        </div>
    </form>
    </modal>
</div>
</template>

<script>
import VueSuglify from 'vue-suglify'
export default {
   // components: { VueSuglify },
    data() {
            return {
                dosage_forms: {},
                dosage_form: {
                name: '',
                slug: ''
                },
                id: '',
            }
        },
        
        methods: {


            deletedos(id, index) {
                axios.delete('dosage_form/'+id)
                    .then(resp => {
                    this.dosage_forms.data.splice(index, 1)
                    this.$swal('Dosage Form deleted successfully');
                            })
                .catch(error => {
                    console.log(error);
                    })
                },

            adddosage() {
                axios.post('dosage_form',{
                        'name': this.dosage_form.name,
                        'slug':this.dosage_form.slug
                    })
                    .then((res) => {
                        console.log(res.data);
                        this.dosage_form.name = '';
                        this.loaddosage()
                        $('dosage_form-modal').modal('hide');
                        
                    })
                    .catch((err) =>{
                        console.log(err);
                    })
            },        

            getResults(page = 1) {
			axios.get('dosage_form?page=' + page)
				.then(response => {
					this.dosage_form = response.data;
                });
            },

            showAlert(){
            this.$swal('Dosage Form added successfully');
        },

            productmodal(){
                this.$modal.show('dosage_form-modal');
            },

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
        this.getResults();
    },

}

</script>

<style>
     table, input, a, label {
        font-family: 'Roboto' !important;
    }
</style>