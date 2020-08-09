<template>
<div>
    <div class="table-responsive mt-3">
        <table class="table table-centered dt-responsive nowrap no-footer" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead class="thead-light">
                <tr>
                    <th>Wholesaler Logo</th>
                    <th>Wholesaler Name</th>
                    <th>Phone Number</th>
                    <th>Location</th>
                    <th style="width: 120px;">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(wholesaler, index) in wholesalers.data" :key="index">
                    <td>Image</td>
                    <td>{{wholesaler.name}}</td>
                    <td>{{wholesaler.phone}}</td>
                    <td>{{typeof(wholesaler.details.location) != 'undefined' ? wholesaler.details.location: 'Not Availabe' }}</td>

                    <td>
                            <vs-button
                                size="small"
                                border
                                @click="viewDetails(wholesaler.id)"
                            >
                                View
                            </vs-button>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
  </div>
</template>

<script>
export default {
    data() {
        return {
            wholesalers: {}
        }
    },
    methods: {
        async loadWholesalers(url = 'wholesalers') {
            this.loading = !this.loading
            const loading = this.$vs.loading();
            await axios.get(`admin/${url}`)
            .then(({data}) => {
                this.wholesalers = data
                this.loading != this.loading
                loading.close();
                })
            .catch((error) => console.log(error))
        },
        viewDetails(w){
            this.$router.push({name: 'wholesaler.detail', params: {'userId': w} })
        }
    },
    mounted() {
        this.loadWholesalers();
    },

}
</script>

<style>

</style>