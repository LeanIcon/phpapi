<template>
<div>
    <div class="table-responsive mt-3">
        <div class="card">
            <div class="card-body">
                <div>
                    <h4 class="leading">INVOICES</h4>
                </div>
                <table class="table table-centered dt-responsive nowrap no-footer" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead class="thead-light">
                        <tr>
                            <th>Invoice ID</th>
                            <th>Wholesaler Name</th>
                            <th>Status</th>
                            <th style="width: 120px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(order) in processed_orders" :key="order.id">
                            <td>INV-{{order.id}}</td>
                            <td>{{order.retailer_name}}</td>
                            <td>
                                <span class="badge" :class="{'badge-info' : order.status == 'pending', 'badge-success' : order.status == 'processed', 'badge-danger' : order.status == 'cancelled'}">{{order.status}}</span>
                            </td>
                            <td>
                                <vs-button size="small" border @click="loadInvoiceItems(order)">View Items</vs-button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <sweet-modal ref="preview_invoice" width="70%">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body printableArea">
                    <!-- <h3><b>INVOICE</b> <span class="pull-right">#5669626{{formatRef(purchase_order.reference)}}</span></h3> -->
                    <h3>
                        <b>INVOICE REF:</b>
                        <span class="pull-right"># {{selected_invoice.invoice}} </span>
                    </h3>
                    <hr />
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-left">
                                <address>
                                    <h3>
                                        <b class="text-danger">NNURO</b>
                                    </h3>
                                    <p class="text-muted m-l-5">
                                        P.O.Box
                                        <br />KN 91,
                                        <br />Kaneshie
                                        <br />Accra
                                    </p>
                                </address>
                            </div>
                            <div class="pull-right text-right">
                                <address>
                                    <h3>To,</h3>
                                    <h4 class="font-bold">Meds &amp; Meds,</h4>
                                    <p class="text-muted m-l-30">
                                        P.O.Box 95,
                                        <br />Drug Lane, Okaishie
                                        <br />Accra
                                    </p>
                                    <p class="m-t-30">
                                        <b>Invoice Date :</b>
                                        <i class="ri-calendar-event-line"></i> 23rd Jan 2017
                                    </p>
                                    <p>
                                        <b>Due Date :</b>
                                        <i class="ri-calendar-check-fill"></i> 25th Jan 2017
                                    </p>
                                </address>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive m-t-40" style="clear: both;">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Description</th>
                                            <th>Manufacturer</th>
                                            <th class="text-right">Quantity</th>
                                            <th class="text-right">Unit Cost</th>
                                            <th class="text-right">Sub Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <app-invoice-item v-for="(item) in invoice_items" :key="item.id" :invoiceItem="item"></app-invoice-item>
                                        <!-- <app-po-item
                                        v-for="item in mitems"
                                        :key="item.id"
                                        :poItem="item"
                                        @updateQty="updatePOItem"
                                      ></app-po-item> -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="pull-right m-t-30 text-right">
                                <!-- <p>Sub - Total amount: $13,848</p> -->
                                <!-- <p>vat (10%) : $138 </p> -->
                                <hr />
                                <h3>
                                    <b>Total :</b>
                                    GH&cent; {{selected_invoice.approved_total}}
                                </h3>
                            </div>
                            <div class="clearfix"></div>
                            <hr />
                            <!-- <div class="text-right">
                                        <button class="btn btn-danger" type="submit"> Proceed to payment </button>
                                        <button id="print" class="btn btn-default btn-outline" type="button"> <span><i class="ri-printer-fill"></i> Print</span> </button>
                                </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <sweet-button slot="button">SAVE</sweet-button> -->
    </sweet-modal>
</div>
</template>

<script>
import InvoiceItemVue from '../../components/product/InvoiceItem.vue';
export default {
    // props: ['purchase_order'],
    components: {
        'appInvoiceItem': InvoiceItemVue
    },
    data() {
        return {
            purchase_orders: [],
            purchase_order_items: [],
            processed_orders: [],
            pod_id: 0,
            poTotal: "",
            reference: null,
            selected_invoice: {},
            poTotalValue: 0,
            invoice_items: []
        };
    },
    methods: {
        async loadPurchaseOrders(url = "wholesaler_purchase_order") {
            this.loading = !this.loading;
            const loading = this.$vs.loading();
            await axios
                .get(`${url}`)
                .then(({
                    data
                }) => {
                    this.purchase_orders = data.purchase_orders;
                    this.processed_orders = this.purchase_orders.filter(function (
                        purchase_order
                    ) {
                        return purchase_order.status == "processed";
                    });
                    // console.log(this.processed_orders);
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
        async loadInvoiceItems(order) {
            let id = order.id;
            this.loading = !this.loading;
            const loading = this.$vs.loading();
            await axios
                .get("load_invoice_items/" + id)
                .then(({
                    data
                }) => {
                    this.invoice_items = data.invoice_items;
                    this.loading != this.loading;
                    loading.close();
                    this.previewInvoice(order);
                })
                .catch(({
                    response
                }) => {
                    this.loading != this.loading;
                    loading.close();
                });
        },
        async loadPurchaseOrdersItems(id) {
            this.loading = !this.loading;
            const loading = this.$vs.loading(id);
            await axios
                .get("view_purchase_order_items/" + this.pod_id)
                .then(({
                    data
                }) => {
                    this.purchase_order_items = data;
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
        previewInvoice(order) {
            this.selected_invoice = order;
            this.$refs.preview_invoice.open();
        },
        viewDetails(po_orderId, ref) {
            this.$router.push({
                name: "purchase_order.view",
                params: {
                    purchase_order_id: po_orderId
                },
            });
        },
    },
    mounted() {
        this.loadPurchaseOrders();
    },
};
</script>

<style>
</style>
