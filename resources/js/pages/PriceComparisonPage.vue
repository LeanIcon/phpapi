<template>
  <div>
    <div class="card">
        <div class="card-header">Price Comparison</div>
          <div class="card-body">
            <vs-table>
              <template #thead>
                <vs-tr>
                  <vs-th>Name</vs-th>
                  <vs-th>Email</vs-th>
                  <vs-th>Id</vs-th>
                </vs-tr>
              </template>
              <template #tbody>
                <vs-tr :key="i" v-for="(tr, i) in users" :data="tr">
                    <vs-td>{{ tr.name }}</vs-td>
                    <vs-td>{{ tr.email }}</vs-td>
                    <vs-td>{{ tr.id }}</vs-td>
                </vs-tr>
              </template>
            </vs-table>
          </div>
    </div>
  </div>
</template>

<script>
import RetailSidebarVue from "../components/retailer/RetailSidebar.vue";
import { UserTypes } from "../_helpers/role";
export default {
  components: {
    retailSideBar: RetailSidebarVue,
  },
  data() {
    return {
      users: [
        {
          id: 1,
          name: "Leanne Graham",
          username: "Bret",
          email: "Sincere@april.biz",
          website: "hildegard.org",
        },
        {
          id: 2,
          name: "Ervin Howell",
          username: "Antonette",
          email: "Shanna@melissa.tv",
          website: "anastasia.net",
        },
        {
          id: 3,
          name: "Clementine Bauch",
          username: "Samantha",
          email: "Nathan@yesenia.net",
          website: "ramiro.info",
        },
        {
          id: 4,
          name: "Patricia Lebsack",
          username: "Karianne",
          email: "Julianne.OConner@kory.org",
          website: "kale.biz",
        },
        {
          id: 5,
          name: "Chelsey Dietrich",
          username: "Kamren",
          email: "Lucio_Hettinger@annie.ca",
          website: "demarco.info",
        },
        {
          id: 6,
          name: "Mrs. Dennis Schulist",
          username: "Leopoldo_Corkery",
          email: "Karley_Dach@jasper.info",
          website: "ola.org",
        },
        {
          id: 7,
          name: "Kurtis Weissnat",
          username: "Elwyn.Skiles",
          email: "Telly.Hoeger@billy.biz",
          website: "elvis.io",
        },
        {
          id: 8,
          name: "Nicholas Runolfsdottir V",
          username: "Maxime_Nienow",
          email: "Sherwood@rosamond.me",
          website: "jacynthe.com",
        },
        {
          id: 9,
          name: "Glenna Reichert",
          username: "Delphine",
          email: "Chaim_McDermott@dana.io",
          website: "conrad.com",
        },
        {
          id: 10,
          name: "Clementina DuBuque",
          username: "Moriah.Stanton",
          email: "Rey.Padberg@karina.biz",
          website: "ambrose.net",
        },
      ],
    };
  },
  methods: {
    async loadProduct(url = "retail_wholesalers_products") {
      this.loading = !this.loading;
      const loading = this.$vs.loading();
      await axios
        .get(`${url}`, {
          params: this.axiosParams,
        })
        .then(({ data }) => {
          this.products = data;
          this.loading != this.loading;
          console.log(data);
          loading.close();
        })
        .catch(({ response }) => {
          this.loading != this.loading;
          loading.close();
        });
    },
  },
  computed: {
    isRetailer() {
      return this.$store.getters["account/userType"] == UserTypes.retailer;
    },
  },
  mounted() {
    this.loadProduct();
  },
};
</script>

<style scoped >
.page-content {
  padding: 0px !important;
}
</style>