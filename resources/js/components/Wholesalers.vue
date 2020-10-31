<template>
<div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div>
                    <!-- <a href="javascript:void(0);" class="btn btn-success mb-2"><i class="fa fa-plus-square"></i> Add Wholesaler</a> -->
                </div>
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
                                <th>User Status</th>
                                <th style="width: 120px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(user, index) in users.data" :key="index">
                                <td>{{user.name}}</td>
                                <td>{{userLocation(user)}}</td>
                                <td>{{userContactPrsn(user)}}</td>
                                <td>{{user.otp}}</td>
                                <td>{{user.phone}}</td>

                                <td>
                                    {{userConfirmStatus(user)}}
                                </td>
                                <td>
                                    {{userStatus(user)}}
                                </td>
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
    <modal name="user-modal" :height="400">
        <div class="card">
            <div class="card-header">
                Wholesalers
            </div>
            <div class="card-body">
                <form action="" class="form">
                    <div class="row">
                        <div class="col-lg-6 p-1">
                            <label for="">First Name</label>
                            <input v-model="selectedUser.name" type="text" class="form-control">
                        </div>
                        <div class="col-lg-6 p-1">
                            <label for="">Email</label>
                            <input v-model="selectedUser.email" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 p-1">
                            <label for="">Location </label>
                            <select class="form-control " aria-hidden="true" v-model="selectedUser.location">
                                <option value="" disabled hidden>Location</option>
                                <option :value="region.id" v-for="(region) in locations" :key="region.id">{{region.name}}</option>
                            </select>
                        </div>
                        <div class="col-lg-6 p-1">
                            <label for="">Contact Person</label>
                            <input v-model="selectedUser.contact_person" type="text" class="form-control">
                        </div>
                        <div class="col-lg-6 p-1">
                            <label for="">User Status</label>
                            <select name="" id="" class="form-control" v-model="selectedUser.status">
                                <option value="">User Status</option>
                                <option value="1"> Active</option>
                                <option value="0"> Inactive</option>
                            </select>
                        </div>
                    </div>
                </form>
                <button @click="updateUser" class="btn btn-primary">SAVE</button>
            </div>
        </div>
    </modal>
</div>
</template>

<script>
export default {

    data() {
        return {
            users: {},
            user_details: {},
            loading: false,
            selectedUser: {
                id: '',
                name: '',
                email: '',
                phone: '',
                location: '',
                status: '',
                contact_person: ''
            },
            view: false,
            regions: [],
            locations: [],
        }
    },

    methods: {
        async loadUsers(url = 'wholesalers') {
            this.loading = !this.loading
            const loading = this.$vs.loading();
            await axios.get(`admin/${url}`)
                .then(({
                    data
                }) => {
                    this.users = data
                    this.loading != this.loading
                    loading.close();
                })
                .catch((error) => console.log(error))
        },
        editUser(user) {
            this.selectedUser.id = user.id;
            this.selectedUser.name = user.name;
            this.selectedUser.email = user.email;
            this.selectedUser.phone = user.phone;
            this.selectedUser.location = user.details.location ?? 'na';
            this.selectedUser.contact_person = user.details.contact_person;
            this.$modal.show('user-modal');
        },
        viewUser(user) {
            this.$router.push({
                name: 'user_details',
                params: {
                    'userId': user.id
                }
            })
        },
        updateUser() {
            console.log(this.selectedUser)
            axios.post('update_status', data)
                .then((response) => {
                    // console.log(response)
                    this.openNotification('top-right', 'success')
                    this.product = {}
                    // this.$noty.success("Product Save Successfully")
                })
                .catch(({
                    response
                }) => console.log("Error"))
        },
        userLocation(user) {
            var location = (((user || {}).details || {}).user_location || '') ?? '';
            return location;
        },
        userContactPrsn(user) {
            var contactperson = (((user || {}).details || {}).contact_person || '') ?? '';
            return contactperson;
        },
        openNotification(position = null, color, text = 'Unprovided') {
            const noti = this.$vs.notification({
                square: true,
                flat: true,
                color,
                position,
                title: text,
                // text: ''
            })
        },
        async loadLocations(url = 'get_locations') {
            this.loading = !this.loading
            const loading = this.$vs.loading();
            await axios.get(`${url}`)
                .then(({
                    data
                }) => {
                    this.locations = data
                    // console.log(this.regions)
                    this.openNotification('top-right', 'success', 'Loading User Details and Profile Complete');
                    this.loading != this.loading
                    loading.close();
                })
                .catch((error) => {
                    this.openNotification('top-right', 'error', 'Unable to complete Request Please Try Again');
                    loading.close();
                })
        },
        userStatus(user) {
            if (user.status) {
                return "Active";
            }
            return "Not Active"
        },
        userConfirmStatus(user) {
            if (user.pin_confirmed) {
                return "Confirmed";
            }
            return "Not Confirmed"
        },
        deleteUser(user) {

        },
    },
    mounted() {
        this.loadUsers();
        this.loadLocations();
    },

}
</script>

<style>

</style>
