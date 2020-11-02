<template>
<tr>
    <td>{{ user.name }}</td>
    <td>{{ userLocation(user) }}</td>
    <td>{{ userContactPrsn(user) }}</td>
    <td>{{ user.otp }}</td>
    <td>{{ user.phone }}</td>

    <td>
        {{ userConfirmStatus(user) }}
    </td>
    <td>
        <div class="center con-switch col-md-10">
            <vs-switch v-model="selectedUser.status">
                <template #off>In-Active</template>
                <template #on>Active</template>
            </vs-switch>
        </div>
    </td>
    <slot name="action"></slot>
</tr>
</template>

<script>
export default {
    props: ["user"],
    data() {
        return {
            users: [],
            user_details: {},
            loading: false,
            selectedUser: {
                id: "",
                name: "",
                email: "",
                phone: "",
                location: "",
                contact_person: "",
                status: false,
            },
            // selectedUser: {
            //     name: "",
            //     email: "",
            //     phone: "",
            //     location: "",
            //     contact_person: "",
            //     status: false,
            // },
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
        updateUserStatus() {
            var data = this.selectedUser;
            axios
                .post("update_status", data)
                .then((response) => {
                    // console.log(response)
                    // this.openNotification("top-right", "success");
                    console.log(response);
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
    computed: {
        // userStatus() {
        //     return (this.selectedUser.status = user.status);
        // },
    },
    watch: {
        "selectedUser.status": function (oldVal, newVal) {
            console.log("Old Val " + oldVal + " " + "New Val: " + newVal);
            this.updateUserStatus();
        },
    },
    mounted() {
        this.selectedUser.id = this.user.id;
    },
};
</script>

<style>
</style>
