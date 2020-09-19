<template>
<div>
    <div class="card">
        <!-- <div class="card-body">
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="name">By Name</label>
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <div class="form-group col-md-3">
                    <label for="name">By Manufacturers</label>
                    <div class="center con-selects">
                        <vs-select filter placeholder="Filter" v-model="value">
                            <vs-option label="manufacturers" v-for="(item) in manufacturers" :key="item.id" value="item.id">
                                {{item.name}}
                            </vs-option>

                        </vs-select>
                    </div>
                </div>

            </div>
        </div> -->
        <div class="card-header">Price Comparison</div>
        <div class="card-body">
            <vs-table>
                <template #header>
                    <form class="app-search d-none d-lg-block">
                        <div class="position-relative">
                            <vs-input v-model="search" border placeholder="Click here to search for a product" />

                        </div>
                    </form>

                </template>
                <template #thead>
                    <vs-tr>
                        <vs-th>Name</vs-th>
                        <vs-th>Description</vs-th>
                        <vs-th>Manufacturer</vs-th>
                        <vs-th>Packet Size</vs-th>
                        <vs-th>Wholesaler</vs-th>
                        <vs-th>Price</vs-th>
                        <vs-th>Action</vs-th>
                    </vs-tr>
                </template>
                <template #tbody>
                    <vs-tr :key="i" v-for="(tr, i) in $vs.getPage($vs.getSearch(products, search), page, max)" :data="tr">
                        <vs-td>{{ tr.product.name }}</vs-td>
                        <vs-td>{{ productDescription(tr) }}</vs-td>
                        <vs-td>{{ tr.product.manufacturer.name }}</vs-td>
                        <vs-td>{{ tr.product.packet_size }}</vs-td>
                        <vs-td>{{ tr.wholesaler_name }}</vs-td>
                        <vs-td>{{ tr.price }}</vs-td>
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
                    console.log(data)
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
        productDescription(product) {
            var description = product.product.active_ingredients + ' ' + product.product.strength + ' ' + (((product || {}).product || {}).dosage_form || '') ?? '';
            return description;
        },
        addToPurchaseOrderList(item) {
            // console.log(item)
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
