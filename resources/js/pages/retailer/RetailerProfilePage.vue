<template>
  <div>
      <top-profile :profile="authUser" />
      <!-- End of Top Card -->
      <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div class="mt-4">
              <h5 class="font-size-14 mb-3">Profile / Settings and Configurations</h5>
              <div class="product-desc">
                <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                  <li class="nav-item">
                    <a
                      class="nav-link"
                      id="desc-tab"
                      data-toggle="tab"
                      href="#profile"
                      role="tab"
                      aria-selected="false"
                    >Profile</a>
                  </li>
                  <li class="nav-item">
                    <a
                      class="nav-link active"
                      id="specifi-tab"
                      data-toggle="tab"
                      href="#specifi"
                      role="tab"
                      aria-selected="true"
                    >System / Application Settings</a>
                  </li>
                  <!-- <li class="nav-item" v-if="isWholesaler" >
                    <a
                      class="nav-link"
                      id="product-tab"
                      data-toggle="tab"
                      href="#product"
                      role="tab"
                      aria-selected="true"
                    >Products</a>
                  </li> -->
                </ul>
                <div class="tab-content border border-top-0 p-4">
                  <div class="tab-pane fade" id="profile" role="tabpanel">
                    <div>
                      <detail-form :userdetails="authUser.details"></detail-form>
                    </div>
                  </div>
                  <div class="tab-pane fade active show" id="specifi" role="tabpanel">
                    <app-settings />
                  </div>
                  <!-- <div class="tab-pane fade" id="product" role="tabpanel">
                    <h4>Loading Products</h4>
                  </div> -->
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
import { UserTypes } from '../../_helpers/role'
import DetailsFormVue from "../../components/DetailsForm.vue";
import ApplicationSettingsVue from "../../components/ApplicationSettings.vue";
import TopProfileCardVue from '../../components/TopProfileCard.vue';
export default {
  components: {
    'detailForm': DetailsFormVue,
    'appSettings': ApplicationSettingsVue,
    'topProfile' : TopProfileCardVue
  },
  data() {
    return {
      notifications: false,
      product_updates: false,
      news_infos: false,
      shortage_lists: false,
      pos_demos: false,
      product_expiry: false,
    };
  },
  computed: {
    authUser() {
      return this.$store.getters["account/userData"];
    },
    isWholesaler() {
      return this.$store.getters["account/userType"] == UserTypes.wholesaler;
    },
    isRetailer() {
      return this.$store.getters["account/userType"] == UserTypes.retailer;
    },
  },
  mounted() {
  },
};
</script>

<style>
</style>