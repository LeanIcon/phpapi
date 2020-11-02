<template>
<div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div>
                    <!-- <a href="javascript:void(0);" class="btn btn-success mb-2"><i class="fa fa-plus-square"></i> Add Wholesaler</a> -->
                </div>
                <div class="table-responsive mt-3">
                    <table class="table table-centered datatable dt-responsive nowrap dataTable no-footer" style="border-collapse: collapse; border-spacing: 0; width: 100%" id="DataTables_Table_0">
                        <thead class="thead-light">
                            <tr>
                                <th>Name</th>
                                <th>Location</th>
                                <th>Contact Person</th>
                                <th>Verification Code</th>
                                <th>Phone</th>
                                <th>Confirmation</th>
                                <th>User Status</th>
                                <th style="width: 120px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <user-row v-for="user in users.data" :key="user.id" :user="user">
                                <td slot="action" style="width: 150px">
                                    <a href="javascript:void(0);" @click="editUser(user)" class="mr-1 text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="ri-edit-box-line font-size-18"></i></a>
                                    <a href="javascript:void(0);" @click="viewUser(user)" class="mr-1 text-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="ri-eye-fill font-size-18"></i></a>
                                    <a href="javascript:void(0);" @click="deleteUser(user)" class="text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="ri-delete-bin-line font-size-18"></i></a>
                                </td>
                            </user-row>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <modal name="user-modal" :height="400">
        <div class="card">
            <div class="card-header">Wholesalers</div>
            <div class="card-body">
                <form action="" class="form">
                    <div class="row">
                        <div class="col-lg-6 p-1">
                            <label for="">First Name</label>
                            <input v-model="selectedUser.name" type="text" class="form-control" />
                        </div>
                        <div class="col-lg-6 p-1">
                            <label for="">Email</label>
                            <input v-model="selectedUser.email" type="text" class="form-control" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 p-1">
                            <label for="">Location </label>
                            <select class="form-control" aria-hidden="true" v-model="selectedUser.location">
                                <option value="" disabled hidden>Location</option>
                                <option :value="region.id" v-for="region in locations" :key="region.id">
                                    {{ region.name }}
                                </option>
                            </select>
                        </div>
                        <div class="col-lg-6 p-1">
                            <label for="">Contact Person</label>
                            <input v-model="selectedUser.contact_person" type="text" class="form-control" />
                        </div>
                        <div class="col-lg-6 p-1">
                            <label for="">User Status</label>
                            <select name="" id="" class="form-control" v-model="selectedUser.status">
                                <option value="">User Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
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
import {
    UserTypes
} from "../_helpers/role";
import UserRowVue from "./admin/UserRow.vue";
export default {
    components: {
        UserRow: UserRowVue,
    },
    data() {
        return {
            users: {},
            user_details: {},
            loading: false,
            selectedUser: {
                name: "",
                email: "",
                phone: "",
                location: "",
                contact_person: "",
                status: false,
            },
            view: false,
            regions: [],
            locations: [],
        };
    },

    computed: {
        userLogin() {
            return this.$store.getters.account;
        },

        isAdmin() {
            return this.$store.getters["account/userType"] == UserTypes.admin;
        },

        userType() {
            return this.$store.getters["account/userType"];
        },
    },

    methods: {
        async loadUsers(url = "retailers") {
            this.loading = !this.loading;
            const loading = this.$vs.loading();
            await axios
                .get(`admin/${url}`)
                .then(({
                    data
                }) => {
                    this.users = data;
                    this.loading != this.loading;
                    loading.close();
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        editUser(user) {
            this.selectedUser.name = user.name;
            this.selectedUser.email = user.email;
            this.selectedUser.phone = user.phone;
            this.selectedUser.status = user.status;
            this.selectedUser.location = user.details.location ?? "na";
            this.selectedUser.contact_person = user.details.contact_person;
            this.$modal.show("user-modal");
        },
        viewUser(user) {
            this.$router.push({
                name: "user_page",
                params: {
                    userId: user.id,
                },
            });
        },
        getLocation(user) {
            return user.details?.location ?? "Not Available";
        },
        getContactPerson(user) {
            return user.details?.contact_person ?? "Not Available";
        },
        deleteUser(user) {},
        userContactPrsn(user) {
            var contactperson =
                (((user || {}).details || {}).contact_person || "") ?? "";
            return contactperson;
        },
        updateUser() {
            console.log(this.selectedUser);
            return;
            axios
                .post("update_status", data)
                .then((response) => {
                    // console.log(response)
                    this.openNotification("top-right", "success");
                    this.product = {};
                    // this.$noty.success("Product Save Successfully")
                })
                .catch(({
                    response
                }) => console.log("Error"));
        },
        userLocation(user) {
            var location = (((user || {}).details || {}).user_location || "") ?? "";
            return location;
        },
        ustatus(user) {
            if (user.status) {
                return true;
            }
            return false;
        },
        userStatus(user) {
            if (user.status) {
                return "Active";
            }
            return "Not Active";
        },
        userConfirmStatus(user) {
            if (user.pin_confirmed) {
                return "Confirmed";
            }
            return "Not Confirmed";
        },
    },
    watch: {
        "selectedUser.status": function (oldVal, newVal) {
            console.log("Old Val " + oldVal + " " + "New Val: " + newVal);
            this.updateUser();
        },
    },
    mounted() {
        this.loadUsers();
    },
};
</script>

<style>
</style>
