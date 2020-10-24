<template>
<div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div>
                    <a href="javascript:void(0);" @click="locationmodal" class="btn btn-success mb-2"> Add Location </a>
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
                                <th>Location</th>

                                <th style="width: 120px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(location, index) in locations.data" :key="index">
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customercheck3">
                                        <label class="custom-control-label" for="customercheck3">&nbsp;</label>
                                    </div>
                                </td>

                                <td>{{ location.id }}</td>
                                <td>{{ location.name }}</td>

                                <td>
                                    <a href="javascript:void(0);" @click="editloc(location)" class="mr-1 text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class=" ri-edit-box-line font-size-18"></i></a>
                                    <!-- <a href="javascript:void(0);" @click="viewUser(user)" class="mr-1 text-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="ri-eye-fill font-size-18"></i></a> -->
                                    <a href="javascript:void(0);" @click="deletedru(location.id, index)" class="text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="ri-delete-bin-line font-size-18"></i></a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                    <pagination :data="locations" @pagination-change-page="getResults"></pagination>
                </div>
            </div>
        </div>
    </div>
    <modal name="location-modal">
        <div class="card">
            <div class="card-header">
                Location
            </div>
            <div class="card-body">
                <form method="post" name="location" id="location" action="#" enctype="multipart/form-data" @submit.prevent="addloc">
                    <div class="row">
                        <div class="col-lg-6 p-1">
                            <label for="">Location</label>
                            <input v-model="location.name" type="text" class="form-control">
                        </div>
                        <div>
                            <label for="regionname">Region</label>
                            <select v-model="location.region_id" class="form-control select2 select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option value="undefined" disabled>Select</option>
                                <option :value="region.id" v-for="(region, index) in regions.data" :key="index">{{region.name}}</option>
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-primary">SAVE</button>
                </form>

            </div>
        </div>
    </modal>

    <modal name="loca-modal">
        <div class="card">
            <div class="card-header">
                Location
            </div>
            <div class="card-body">
                <form method="PUT" name="loca" id="loca" action="#" enctype="multipart/form-data" @submit.prevent="editlocation">
                    <div class="row">
                        <div class="col-lg-6 p-1">
                            <label for="">Location</label>
                            <input v-model="location.name" type="text" class="form-control">
                        </div>
                        <div>
                            <label for="regionname">Region</label>
                            <select v-model="location.region_id" class="form-control select2 select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option value="undefined" disabled>Select</option>
                                <option :value="region.id" v-for="(region, index) in regions.data" :key="index">{{region.name}}</option>
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-primary">SAVE</button>
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
            locations: {},
            regions: {},
            location: {
                name: '',
                region_id: ''
            }
        }
    },

    methods: {

        editloc(location) {
            this.$modal.show('loca-modal');
            this.location.name = location.name,
                this.location.id = location.id,
                this.location.region_id = location.region_id
            // console.log("Worked")
        },

        editlocation() {
            var id = this.location.id
            axios.put('location/' + id, this.location)
                .then(resp => {
                    this.location.name = '',
                        this.location.region_id = ''
                    this.loadloc()
                    this.$modal.hide('loca-modal')
                    this.$swal('Location edited successfully');
                })
                .catch(error => {
                    console.log("Error");
                })
        },

        async loadreg() {
            await axios.get('region')
                .then(({
                    data
                }) => {
                    this.regions = data
                })
                .catch(({
                    response
                }) => console.log("Error"))
        },

        getResults(page = 1) {
            axios.get('location?page=' + page)
                .then(response => {
                    this.locations = response.data;
                })
                .catch((err) => {
                    console.log("Error");
                })
        },

        addloc() {
            axios.post('location', {
                    'name': this.location.name,
                    'region_id': this.location.region_id
                })
                .then((res) => {
                    // console.log(res.data);
                    this.location.name = '';
                    this.loadloc()
                    this.$swal('Location added successfully');
                    loading.close()
                    $('location-modal').modal('hide');

                })
                .catch((err) => {
                    console.log(err);
                })
        },

        deletedru(id, index) {
            axios.delete('location/' + id)
                .then(resp => {
                    this.locations.data.splice(index, 1)
                    this.$swal('Location deleted successfully');
                })
                .catch(error => {
                    console.log("Error");
                })
        },

        locationmodal() {
            this.$modal.show('location-modal');
        },

        async loadloc(url = 'location') {
            this.loading = !this.loading
            const loading = this.$vs.loading();
            await axios.get(url)
                .then(({
                    data
                }) => {
                    this.locations = data
                    this.loading != this.loading
                    loading.close();
                })
                .catch((error) => console.log("Error"))

        }

    },

    mounted() {
        this.loadloc();
        this.getResults();
        this.loadreg();
    },

}
</script>

<style>
table,
input,
a,
label {
    font-family: 'Roboto' !important;
}
</style>
