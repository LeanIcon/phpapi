<template>
  <div class="table-responsive">
    <table class="table table-nowrap mb-0">
      <tbody>
        <tr>
          <th scope="row" style="width: 400px;">Noifications</th>
          <td>
            <div class="center con-switch col-md-2">
              <vs-switch v-model="notifications">
                <template #off>Off</template>
                <template #on>On</template>
              </vs-switch>
            </div>
          </td>
        </tr>
        <tr>
          <th scope="row">Products Update</th>
          <td>
            <div class="center con-switch col-md-2">
              <vs-switch v-model="product_updates">
                <template #off>Off</template>
                <template #on>On</template>
              </vs-switch>
            </div>
          </td>
        </tr>
        <tr>
          <th scope="row">News and Info</th>
          <td>
            <div class="center con-switch col-md-2">
              <vs-switch v-model="news_infos">
                <template #off>Off</template>
                <template #on>On</template>
              </vs-switch>
            </div>
          </td>
        </tr>
        <tr>
          <th scope="row">Shortage List</th>
          <td>
            <div class="center con-switch col-md-2">
              <vs-switch v-model="shortage_lists">
                <template #off>Off</template>
                <template #on>On</template>
              </vs-switch>
            </div>
          </td>
        </tr>
        <tr>
          <th scope="row">Expiry</th>
          <td>
            <div class="center con-switch col-md-2">
              <vs-switch v-model="product_expiry">
                <template #off>Inactive</template>
                <template #on>Active</template>
              </vs-switch>
            </div>
          </td>
        </tr>
        <tr>
          <th scope="row">POS - Demo</th>
          <td>
            <div class="center con-switch col-md-2">
              <vs-switch v-model="pos_demos">
                <template #off>Inactive</template>
                <template #on>Active</template>
              </vs-switch>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
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
};
</script>

<style>
</style>