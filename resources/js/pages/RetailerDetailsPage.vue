<template>
  <div>
      <div class="card">
          <div class="card-body">
              <div class="form-group col-lg-5">
                        <label for="manufacturername">Retailers</label>
                           <select v-model="selectedUser" @change="userChanged($event)" class="form-control select2 select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                            <option value="" disabled hidden >Select</option>
                            <option :value="user.id"  v-for="(user, index) in users.data" :key="index" >{{user.name}}</option>
                        </select>
                    </div>
          </div>
      </div>
      <!-- <user-details :userId="selectedUser ? selectedUser : userId" ></user-details> -->
      <retailer-details :userId="selectedUser ? selectedUser : userId"></retailer-details>
  </div>
</template>

<script>
import UserDetailsVue from '../components/UserDetails.vue'
import RetailerDetailsVue from '../components/RetailerDetails.vue'
export default {
    props: ['userId'],
    data() {
        return {
            user: {},
            users: {},
            loading: false,
            // userId: this.$route.params.id,
            selectedUser: ''
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
        userChanged(event){
            console.log("Changed Event User", event.target.value);
            this.$emit('retailerOptionChanged', event.target.value)
        }
    },
    components: {
        'userDetails': UserDetailsVue,
        'retailerDetails': RetailerDetailsVue
    },
    computed: {
        userSelected() {
            return this.userId ?? this.selectedUser;
        }
    },
    watch: {
        '$route': function(to, from) {
            this.selectedUser = this.userId = this.to.params.id
        },
        selectedUser: function(val) {
            return this.userId
        }
    },
    mounted() {
        this.loadUsers();
        // this.fetchDetails(this.userId);
    },

}
</script>

<style>

</style>