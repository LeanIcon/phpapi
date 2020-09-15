<template>
<div>
    <div class="card">
        <div class="card-header">Price Comparison</div>
        <div class="card-body">
            <vs-table>
                <template #header>
                    <vs-input v-model="search" border placeholder="Search" />
                </template>
                <template #thead>
                    <vs-tr>
                        <vs-th>Name</vs-th>
                        <vs-th>Description</vs-th>
                        <vs-th>Manufacturer</vs-th>
                        <vs-th>Packet Size</vs-th>
                        <vs-th>Action</vs-th>
                    </vs-tr>
                </template>
                <template #tbody>
                    <vs-tr :key="i" v-for="(tr, i) in $vs.getPage($vs.getSearch(products, search), page, max)" :data="tr">
                        <vs-td>{{ tr.name }}</vs-td>
                        <vs-td>{{ tr.strength }}</vs-td>
                        <vs-td>{{ tr.strength }}</vs-td>
                        <vs-td>{{ tr.packet_size }}</vs-td>
                        <div class="center">
                            <vs-button flat @click="addToPurchaseOrderList(tr)">
                                ADD TO P.O
                            </vs-button>
                        </div>

                    </vs-tr>
                </template>
                <template #footer>
                    <vs-pagination v-model="page" :length="$vs.getLength(products, max)" />
                </template>
            </vs-table>
        </div>
    </div>
</div>
</template>

<script>
import RetailSidebarVue from "../components/retailer/RetailSidebar.vue";
import {
    UserTypes
} from "../_helpers/role";
export default {
    components: {
        retailSideBar: RetailSidebarVue,
    },
    data() {
        return {
            manufacturers: {},
            value: 0,
            search: '',
            page: 1,
            max: 10,
            products: [],
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
                .then(({
                    data
                }) => {
                    this.products = data;
                    this.loading != this.loading;
                    loading.close();
                })
                .catch(({
                    response
                }) => {
                    this.loading != this.loading;
                    loading.close();
                });
        },
        addToPurchaseOrderList(item) {
            console.log(item)
            this.$store.dispatch('purchase_orders/saveSelectedProduct', item)
        }
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

<style scoped>
.page-content {
    padding: 0px !important;
}
</style>
