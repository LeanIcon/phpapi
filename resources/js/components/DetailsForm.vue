<template>
<div>
    <form @submit.prevent="updateUser">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="manufacturername">Contact Person</label>
                            <input v-model="details.contact_person" id="contact_person" name="contact_person" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="manufacturerbrand">Contact Person Phone</label>
                            <input v-model="details.contact_person_phone" id="contact_person_phone" name="contact_person_phone" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="strenght">Business Address</label>
                            <input v-model="details.business_address" id="business_address" name="business_address" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="packet_size">Digital Addres</label>
                            <input v-model="details.digital_address" id="digital_address" name="packet_size" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="strenght">Reg No.</label>
                            <input v-model="details.reg_no" id="reg_no" name="reg_no" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="packet_size">Practise group</label>
                            <input v-model="details.practise_group" id="practise_group" name="practise_group" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="packet_size">Location</label>
                            <input v-model="details.location" id="packet_size" name="packet_size" type="text" class="form-control">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        {{regions}}
                        <div class="form-group">
                            <label for="practise_group">Region</label>
                            <select class="form-control " aria-hidden="true">
                                <option value="" disabled hidden>Select</option>
                                <option :value="region.id" v-for="(region) in regions.data" :key="region.id">{{region.name}}</option>
                            </select>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="image">Profile Image</label>
                    <picture-input />
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-5">
                <button type="submit" class="btn btn-primary col-md-5">UPDATE</button>
            </div>
        </div>
    </form>
</div>
</template>

<script>
import PictureInput from 'vue-picture-input'
export default {
    components: {
        PictureInput
    },
    props: ['userdetails'],
    data() {
        return {
            user: {},
            details: {
                contact_person: '',
                contact_person_phone: '',
                business_address: '',
                digital_address: '',
                reg_no: '',
                practise_group: '',
                location: '',
                region_id: '',
                town_id: ''
            },
            regions: []
        }
    },
    methods: {
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
        updateUser() {
            console.log(this.details)
        },
        async loadRegions(url = 'get_locations') {
            this.loading = !this.loading
            const loading = this.$vs.loading();
            await axios.get(`${url}`)
                .then(({
                    data
                }) => {
                    this.regions = data
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
    },
    mounted() {
        this.loadRegions();
        this.details = this.userdetails;
        console.log(this.userdetails)
    },

}
</script>

<style>

</style>
