<template>
  <div>
      <form @submit.prevent="updateUser" >

    <div class="row">
         <div class="col-lg-8">
              <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="manufacturername">Contact Person</label>
                         <input  v-model="details.contact_person" id="contact_person" name="contact_person" type="text" class="form-control">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="manufacturerbrand">Contact Person Phone</label>
                        <input  v-model="details.contact_person_phone" id="contact_person_phone" name="contact_person_phone" type="text" class="form-control">
                    </div>
                </div>
            </div>
              <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="strenght">Business Address</label>
                        <input  v-model="details.business_address" id="business_address" name="business_address" type="text" class="form-control">
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
                        <input  v-model="details.reg_no" id="reg_no" name="reg_no" type="text" class="form-control">
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
                        <label for="image">Profile Image</label>
                        <input id="image" name="strenght" type="file" class="form-control">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="packet_size">Location</label>
                        <input v-model="details.location" id="packet_size" name="packet_size" type="text" class="form-control">
                    </div>
                </div>
            </div>
              <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="practise_group">Region</label>
                         <select v-model="details.town_id" class="form-control select2 select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                            <option value="" disabled hidden >Select</option>
                            <option :value="region.id"  v-for="(region, index) in regions.data" :key="index" >{{region.name}}</option>
                        </select>
                    </div>
                </div>
            </div>
     </div>
  </div>
     <div class="form-group">
         <div class="col-lg-5">
        <button type="submit" class="btn btn-primary col-md-5" >UPDATE</button>
         </div>
     </div>
    </form>
  </div>
</template>

<script>
export default {
    props:['userdetails'],
    data() {
        return {
            user:{},
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
            regions: {}
        }
    },
    methods: {
        updateUser(){
            console.log(this.details)
        },
        async loadRegions(url = 'region') {
            console.log("Loading regions...");
            this.loading = !this.loading
            const loading = this.$vs.loading();
            await axios.get(`${url}`)
            .then(({data}) => {
                this.regions = data
                this.loading != this.loading
                loading.close();
                })
            .catch((error) => console.log(error))
        },
    },
    mounted() {
        this.loadRegions();
        this.details = this.userdetails;
        console.log("Loggin Details...", this.details);
    },

}
</script>

<style>

</style>