<template>
  <div>
    <div class="row">
      <div class="col-lg-8">
        <div class="card">
          <div class="row no-gutters align-items-center">
            <div class="col-md-4">
              <img class="card-img img-fluid" :src="'/assets/images/small/img-2.jpg'" alt="Card image">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Identity: {{authUser.name}}</h5>
                <p class="card-text">Location: {{authUser.details.location ==  null ? 'Not Availabe' : authUser.details.location}}</p>
                <p class="card-text">Status: <small class="text-muted">Active</small></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card">
          <div class="row no-gutters align-items-center">
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Contact Details</h5>
                <p class="card-text">Contact Person: {{authUser.details.contact_person ==  null ? 'Not Availabe' : authUser.details.contact_person}}</p>
                <p class="card-text">Status:<small class="text-muted"> Active</small></p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- End of Top Card -->
      <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="mt-4">
              <h5 class="font-size-14 mb-3">Profile / Settings and Configurations </h5>
              <div class="product-desc">
                  <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link" id="desc-tab" data-toggle="tab" href="#desc" role="tab" aria-selected="false">Profile</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link active" id="specifi-tab" data-toggle="tab" href="#specifi" role="tab" aria-selected="true">System / Application Settings</a>
                      </li>
                  </ul>
                  <div class="tab-content border border-top-0 p-4">
                      <div class="tab-pane fade" id="desc" role="tabpanel">
                          <div>
                              <detail-form :userdetails="authUser.details"></detail-form>
                          </div>
                      </div>
                      <div class="tab-pane fade active show" id="specifi" role="tabpanel">
                          <div class="table-responsive">
                              <table class="table table-nowrap mb-0">
                                  <tbody>
                                      <tr>
                                          <th scope="row" style="width: 400px;">Noifications</th>
                                          <td>
                                            <div class="center con-switch col-md-2">
                                            <vs-switch v-model="notifications">
                                              <template #off>
                                                  Off
                                              </template>
                                              <template #on>
                                                  On
                                              </template>
                                            </vs-switch>
                                            </div>
                                          </td>
                                      </tr>
                                      <tr>
                                          <th scope="row">Products Update</th>
                                          <td>
                                           <div class="center con-switch col-md-2">
                                            <vs-switch v-model="product_updates">
                                              <template #off>
                                                  Off
                                              </template>
                                              <template #on>
                                                  On
                                              </template>
                                            </vs-switch>
                                            </div>
                                            </td>
                                      </tr>
                                      <tr>
                                          <th scope="row">News and Info</th>
                                          <td><div class="center con-switch col-md-2">
                                            <vs-switch v-model="news_infos">
                                              <template #off>
                                                  Off
                                              </template>
                                              <template #on>
                                                  On
                                              </template>
                                            </vs-switch>
                                            </div></td>
                                      </tr>
                                      <tr>
                                          <th scope="row">Shortage List</th>
                                          <td><div class="center con-switch col-md-2">
                                            <vs-switch v-model="shortage_lists">
                                              <template #off>
                                                  Off
                                              </template>
                                              <template #on>
                                                  On
                                              </template>
                                            </vs-switch>
                                            </div></td>
                                      </tr>
                                      <tr>
                                          <th scope="row">Expiry</th>
                                          <td><div class="center con-switch col-md-2">
                                            <vs-switch v-model="product_expiry">
                                              <template #off>
                                                  Inactive
                                              </template>
                                              <template #on>
                                                  Active
                                              </template>
                                            </vs-switch>
                                            </div></td>
                                      </tr>
                                      <tr>
                                          <th scope="row">POS - Demo</th>
                                          <td><div class="center con-switch col-md-2">
                                            <vs-switch v-model="pos_demos">
                                              <template #off>
                                                  Inactive
                                              </template>
                                              <template #on>
                                                  Active
                                              </template>
                                            </vs-switch>
                                            </div></td>
                                      </tr>
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
                  </div>
              </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</template>

<script>
import DetailsFormVue from '../../components/DetailsForm.vue'
export default {
  components: {
    'detailForm': DetailsFormVue
  },
  data () {
    return {
      notifications: false,
      product_updates: false,
      news_infos: false,
      shortage_lists: false,
      pos_demos: false,
      product_expiry: false
    }
  },
  computed: {
    authUser() {
      return this.$store.getters['account/userData'];
    }
  },
  mounted() {
    console.log(this.authUser)
  }

}
</script>

<style>

</style>