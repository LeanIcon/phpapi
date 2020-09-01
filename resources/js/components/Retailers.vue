<template>
  <div>
      <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <!-- <div>
                    <a href="javascript:void(0);" class="btn btn-success mb-2"><i class="fa fa-plus-square"></i> Add Retailer</a>
                </div> -->
                <div class="table-responsive mt-3">
                    <table class="table table-centered datatable dt-responsive nowrap dataTable no-footer" style="border-collapse: collapse; border-spacing: 0; width: 100%;" id="DataTables_Table_0">
                        <thead class="thead-light">
                            <tr>
                                <th>Name</th>
                                <th>Location</th>
                                <th>Contact Person</th>
                                <th>Verification Code</th>
                                <th>Phone</th>
                                <th>Confirmation</th>
                                <th>Status</th>
                                <th style="width: 120px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(user, index) in users.data" :key="index" >
                                <!-- -->

                                <td>{{user.name}}</td>
                                <td>{{getLocation(user)}}</td>
                                <td>{{getContactPerson(user)}}</td>
                                <td>{{user.otp}}</td>
                                <td>{{user.phone}}</td>

                                <td>
                                    {{user.is_active}}
                                </td>
                                <td>
                                    {{user.pin_confirmed}}
                                </td>
                                <td>
                                    <a href="javascript:void(0);" @click="editUser(user)" class="mr-3 text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-edit font-size-18"></i></a>
                                    <a href="javascript:void(0);" @click="viewUser(user)" class="mr-3 text-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-eye font-size-18"></i></a>
                                    <a href="javascript:void(0);" @click="deleteUser(user)" class="text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-trash font-size-18"></i></a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
     <modal name="user-modal">
        <div class="card">
            <div class="card-header">
                Retailer
            </div>
            <div class="card-body">
               <form action="" class="form" >
                   <div class="row">
                       <div class="col-lg-6 p-1">
                           <label for="">Name</label>
                           <input v-model="selectedUser.name" type="text" class="form-control" >
                       </div>
                       <div class="col-lg-6 p-1">
                            <label for="">Email</label>
                           <input v-model="selectedUser.email" type="text" class="form-control" >
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-lg-6 p-1">
                            <label for="">Location </label>
                           <input v-model="selectedUser.location" type="text" class="form-control" >
                       </div>
                       <div class="col-lg-6 p-1">
                            <label for="">Contact Person</label>
                           <input v-model="selectedUser.contact_person" type="text" class="form-control" >
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

    data () {
        return {
            users: {},
            user_details: {},
            loading: false,
            selectedUser: {
                name: '',
                email: '',
                phone: '',
                location: '',
                contact_person: ''
            },
            view: false
        }
    },

    methods: {
        async loadUsers(url = 'retailers') {
            this.loading = !this.loading
            const loading = this.$vs.loading();
            await axios.get(`admin/${url}`)
            .then(({data}) => {
                this.users = data
                this.loading != this.loading
                loading.close();
                })
            .catch((error) => console.log(error))
        },
        editUser(user){
            this.selectedUser.name = user.name;
            this.selectedUser.email = user.email;
            this.selectedUser.phone = user.phone;
            this.selectedUser.location = user.details.location ?? 'na';
            this.selectedUser.contact_person = user.details.contact_person ;
            this.$modal.show('user-modal');
        },
        viewUser(user){
            this.$router.push({name: 'user_page', params: {'userId': user.id}})
        },
        getLocation(user){
            return user.details?.location ?? "Not Available";
        },
        getContactPerson(user){
            return user.details?.contact_person ?? "Not Available";
        },
        deleteUser(user){

        },
    },
    mounted() {
        this.loadUsers();
    },

}
</script>

<style>

</style>