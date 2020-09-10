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
                        <vs-td>{{ tr.packet_size }}</vs-td>
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
            search: '',
            page: 1,
            max: 10,
            products: [{
                    "id": 1,
                    "name": "ALDOMET ",
                    "slug": null,
                    "image_url": null,
                    "created_at": "2020-08-25T16:48:00.000000Z",
                    "updated_at": "2020-08-25T16:48:00.000000Z",
                    "code": null,
                    "nhis_code": null,
                    "product_code": "ALDMET1",
                    "status": null,
                    "active_ingredients": "METHYLDOPA",
                    "dosage_form_id": null,
                    "drug_class_id": null,
                    "associated_name": null,
                    "strength": "250mg",
                    "packet_size": "10X3",
                    "product_category_id": null,
                    "manufacturer_id": null,
                    "dosage_form_slug": null,
                    "drug_class_slug": null,
                    "manufacturer_slug": null,
                    "product_category_slug": null,
                    "brand_name": null,
                    "generic_name": null,
                    "therapeutic_class": null,
                    "drug_legal_status": null,
                    "manufacturer": "na",
                    "pivot": {
                        "wholesaler_id": 2,
                        "product_id": 1,
                        "price": "50.00"
                    }
                },
                {
                    "id": 2,
                    "name": "ALDOMET",
                    "slug": null,
                    "image_url": null,
                    "created_at": "2020-08-25T16:48:00.000000Z",
                    "updated_at": "2020-08-25T16:48:00.000000Z",
                    "code": null,
                    "nhis_code": null,
                    "product_code": "ALDMET2",
                    "status": null,
                    "active_ingredients": "METHYLDOPA",
                    "dosage_form_id": null,
                    "drug_class_id": null,
                    "associated_name": null,
                    "strength": "500 mg",
                    "packet_size": "30",
                    "product_category_id": null,
                    "manufacturer_id": null,
                    "dosage_form_slug": null,
                    "drug_class_slug": null,
                    "manufacturer_slug": null,
                    "product_category_slug": null,
                    "brand_name": null,
                    "generic_name": null,
                    "therapeutic_class": null,
                    "drug_legal_status": null,
                    "manufacturer": "na",
                    "pivot": {
                        "wholesaler_id": 2,
                        "product_id": 2,
                        "price": "10.00"
                    }
                },
                {
                    "id": 3,
                    "name": "APEXTITE FORTE",
                    "slug": null,
                    "image_url": null,
                    "created_at": "2020-08-25T16:48:01.000000Z",
                    "updated_at": "2020-08-25T16:48:01.000000Z",
                    "code": null,
                    "nhis_code": null,
                    "product_code": "APEAPE1",
                    "status": null,
                    "active_ingredients": "APEXTITE FORTE",
                    "dosage_form_id": null,
                    "drug_class_id": null,
                    "associated_name": null,
                    "strength": "200ml",
                    "packet_size": "5",
                    "product_category_id": null,
                    "manufacturer_id": null,
                    "dosage_form_slug": null,
                    "drug_class_slug": null,
                    "manufacturer_slug": null,
                    "product_category_slug": null,
                    "brand_name": null,
                    "generic_name": null,
                    "therapeutic_class": null,
                    "drug_legal_status": null,
                    "manufacturer": "na",
                    "pivot": {
                        "wholesaler_id": 2,
                        "product_id": 3,
                        "price": "7.00"
                    }
                },
                {
                    "id": 4,
                    "name": "MARCAINE",
                    "slug": null,
                    "image_url": null,
                    "created_at": "2020-08-25T16:48:01.000000Z",
                    "updated_at": "2020-08-25T16:48:01.000000Z",
                    "code": null,
                    "nhis_code": null,
                    "product_code": "MARBUP1",
                    "status": null,
                    "active_ingredients": "BUPIVACAINE",
                    "dosage_form_id": null,
                    "drug_class_id": null,
                    "associated_name": null,
                    "strength": "4ml",
                    "packet_size": "30",
                    "product_category_id": null,
                    "manufacturer_id": null,
                    "dosage_form_slug": null,
                    "drug_class_slug": null,
                    "manufacturer_slug": null,
                    "product_category_slug": null,
                    "brand_name": null,
                    "generic_name": null,
                    "therapeutic_class": null,
                    "drug_legal_status": null,
                    "manufacturer": "na",
                    "pivot": {
                        "wholesaler_id": 2,
                        "product_id": 4,
                        "price": "9.00"
                    }
                }
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
