<template>
<div class="d-lg-flex mb-4">
    <router-view></router-view>
    <div class="chat-leftsidebar">
        <div class="p-3 border-bottom">
            <div class="media">
                <div class="align-self-center mr-3"></div>
                <div class="media-body">
                    <h5 class="font-size-15 mt-0 mb-1">Purchase Orders</h5>
                </div>

                <!-- <div>
                    <div class="dropdown chat-noti-dropdown">
                        <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ri-settings-4-fill font-size-20"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
          </div>-->
            </div>
        </div>
        <div class="card-body border-bottom py-2">
            <div class="search-box chat-search-box">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Search..." />
                    <i class="ri-search-line search-icon"></i>
                </div>
            </div>
        </div>

        <div class="chat-leftsidebar-nav">
            <ul class="nav nav-pills nav-justified">
                <li class="nav-item">
                    <a href="#orderlist" data-toggle="tab" aria-expanded="true" class="nav-link active">
                        <!-- <i class=" ri-file-list-3-line font-size-20"></i> -->
                        <!-- <span class="mt-2 d-none d-sm-block">Purchase Order List</span> -->
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a href="#group" data-toggle="tab" aria-expanded="false" class="nav-link">
                        <i class="ri-group-line font-size-20"></i>
                        <span class="mt-2 d-none d-sm-block">Group</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#contact" data-toggle="tab" aria-expanded="false" class="nav-link">
                        <i class="ri-contacts-book-2-line font-size-20"></i>
                        <span class="mt-2 d-none d-sm-block">Contacts</span>
                    </a>
          </li>-->
            </ul>
        </div>

        <div class="tab-content py-4">
            <div class="tab-pane show active" id="orderlist">
                <div>
                    <h5 class="font-size-14 px-3 mb-3">Recent</h5>
                    <ul class="list-unstyled chat-list" data-simplebar="init" style="max-height: 80%;">
                        <div class="simplebar-wrapper" style="margin: 0px;">
                            <div class="simplebar-height-auto-observer-wrapper">
                                <div class="simplebar-height-auto-observer"></div>
                            </div>
                            <div class="simplebar-mask">
                                <div class="simplebar-offset" style="right: -16.8px; bottom: 0px;">
                                    <div class="simplebar-content-wrapper" style="height: auto; overflow: hidden scroll;">
                                        <div class="simplebar-content" style="padding: 0px;">
                                            <li v-for="(item, index) in purchase_orders" :key="index">
                                                <!-- <a href="#"></a> -->
                                                <router-link :to="{name: 'purchase_order.view', params:{'purchase_order_id': item.id}}">
                                                    <div class="media">
                                                        <div class="media-body overflow-hidden">
                                                            <h5 class="text-truncate font-size-14 mb-1">{{item.retailer_name}}</h5>
                                                            <p class="text-truncate mb-0">{{formatRef(item.reference)}}</p>
                                                        </div>
                                                        <div class="font-size-11">
                                                            <h5 class="text-truncate font-size-14 mb-1">GH&cent;{{item.total}}</h5>
                                                            <p class="text-truncate mb-0">{{item.created_at | formatDate}}</p>
                                                        </div>
                                                    </div>
                                                </router-link>
                                            </li>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="simplebar-placeholder" style="width: auto; height: 500px;"></div>
                        </div>
                        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                            <div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;"></div>
                        </div>
                        <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                            <div class="simplebar-scrollbar" style="height: 238px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="w-100 user-chat mt-4 mt-sm-0">
        <div class="p-3 px-lg-4 user-chat-border">
            <div class="row">
                <div class="col-md-4 col-6">
                    <h5 class="font-size-15 mb-1 text-truncate">Order Ref: {{purchase_order_id}}</h5>
                    <p class="text-muted text-truncate mb-0">
                        <i class="ri-radio-button-line text-success align-middle mr-1"></i> Status
                    </p>
                </div>
                <div class="col-md-8 col-6">
                    <ul class="list-inline user-chat-nav text-right mb-0">
                        <!-- <li class="list-inline-item d-inline-block d-sm-none">
                            <div class="dropdown">
                                <button class="btn nav-btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="mdi mdi-magnify"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-md">
                                    <form class="p-2">
                                        <div class="search-box">
                                            <div class="position-relative">
                                                <input type="text" class="form-control rounded" placeholder="Search...">
                                                <i class="mdi mdi-magnify search-icon"></i>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </li>
                        <li class="d-none d-sm-inline-block">
                            <div class="search-box mr-2">
                                <div class="position-relative">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <i class="mdi mdi-magnify search-icon"></i>
                                </div>
                            </div>
              </li>-->
                        <!-- <li class="list-inline-item m-0 d-none d-sm-inline-block">
                            <div class="dropdown">
                                <button class="btn nav-btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ri-settings-4-fill"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">View Profile</a>
                                    <a class="dropdown-item" href="#">Clear chat</a>
                                    <a class="dropdown-item" href="#">Muted</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                </div>
                            </div>
              </li>-->

                        <li class="list-inline-item">
                            <div class="dropdown">
                                <button class="btn nav-btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <!-- <i class="ri-more-fill"></i> -->
                                </button>
                                <button class="btn btn-info" @click.prevent="processPurchaseOrder">Proccess</button>
                                <!-- <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#" @click.prevent="processPurchaseOrder" >Proccess</a>
                  </div> -->
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="px-lg-2">
            <div class="chat-conversation p-3">
                <ul class="list-unstyled mb-0 pr-3" data-simplebar="init" style="max-height: 70%;">
                    <div class="simplebar-wrapper" style="margin: 0px -16px 0px 0px;">
                        <div class="simplebar-height-auto-observer-wrapper">
                            <div class="simplebar-height-auto-observer"></div>
                        </div>
                        <div class="simplebar-mask">
                            <div class="simplebar-offset" style="right: -16.8px; bottom: 0px;">
                                <div class="simplebar-content-wrapper" style="height: auto; overflow: hidden scroll;">
                                    <div class="simplebar-content" style="padding: 0px 16px 0px 0px;">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card card-body printableArea">
                                                    <!-- <h3><b>INVOICE</b> <span class="pull-right">#5669626{{formatRef(purchase_order.reference)}}</span></h3> -->
                                                    <h3>
                                                        <b>P.O REF:</b>
                                                        <span class="pull-right">#{{purchase_order.id}}{{formatRef(purchase_order.reference)}}</span>
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
                                                                        <app-po-item v-for="item in mitems" :key="item.id" :poItem="item" @updateQty="updatePOItem"></app-po-item>
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
                                                                    GH&cent; {{poTotalValue}}
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
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="simplebar-placeholder" style="width: auto; height: 883px;"></div>
                    </div>
                    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                        <div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;"></div>
                    </div>
                    <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                        <div class="simplebar-scrollbar" style="height: 223px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
                    </div>
                </ul>
            </div>
        </div>
        <div class="px-lg-3">
            <!-- <div class="p-3 chat-input-section">
                <div class="row">
                    <div class="col">
                        <div class="position-relative">
                            <input type="text" class="form-control chat-input" placeholder="Enter Message...">

                        </div>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary chat-send w-md waves-effect waves-light"><span class="d-none d-sm-inline-block mr-2">Send</span> <i class="mdi mdi-send"></i></button>
                    </div>
                </div>
        </div>-->
        </div>
    </div>
</div>
</template>

<script>
import PurchaseOrderInvVue from "../../components/wholesaler/PurchaseOrderInv.vue";
import PoItemVue from "../../components/product/PoItem.vue";
export default {
    // props: ['reference'],
    components: {
        poInv: PurchaseOrderInvVue,
        appPoItem: PoItemVue,
    },
    data() {
        return {
            purchase_order_id: this.$route.params.purchase_order_id,
            purchase_orders: {},
            purchase_order: {
                id: 0,
                manufacturer: "",
                price: 0,
                product_name: "",
                quantity: 0,
                products_id: 0,
            },
            po_item: {
                id: 0,
                manufacturer: "",
                description: "",
                price: 0,
                product_name: "",
                quantity: 0,
                products_id: 0,
                unit_total: 0,
            },
            po_total: 0,
            purchase_order_items: {},
            modified_orders: [],
            mitems: [],
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
        async loadPurchaseOrdersItems(id) {
            this.loading = !this.loading;
            const loading = this.$vs.loading(id);
            await axios
                .get("wholesaler_purchase_order_view/" + this.purchase_order_id)
                .then(({
                    data
                }) => {
                    this.purchase_order = data.purchase_order;
                    this.po_total = data.purchase_order.total;
                    this.purchase_order_items = data.purchase_order.order_items;
                    this.mitems = data.purchase_order.order_items;
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
        formatRef(reference) {
            return reference ? reference.substring(0, 15) : "";
        },
        formatDate() {},
        updatePOItem({
            item,
            quantity
        }) {
            const record = this.mitems.find((element) => element.id == item.id);
            if (record) {
                record.quantity = quantity;
                record.unit_total = parseInt(quantity) * parseFloat(record.price)
            }
        },
        async processPurchaseOrder() {
            this.loading = !this.loading;
            const data = {
                purchaseOrderId: this.purchase_order_id,
                purchaseOrders: this.mitems,
                total: this.poTotalValue
            };
            const loading = this.$vs.loading({
                text: "Processing Purchase Order",
                type: "rectangle"
            });
            await axios
                .post("process_purchase_order_w", data)
                .then(({
                    data
                }) => {
                    this.loading != this.loading;
                    loading.close();
                    console.log(data);
                    this.$router.replace({
                        name: 'wholesaler.dashboard'
                    });
                })
                .catch(({
                    response
                }) => {
                    this.loading != this.loading;
                    loading.close();
                    this.$router.replace({
                        name: 'wholesaler.dashboard'
                    });
                });
        },
        formatPrice(price) {
            return Number.parseFloat(price);
        },
        viewDetails(po_orderId) {
            this.$router.push({
                name: "purchase_order.view",
                params: {
                    purchase_order_id: po_orderId
                },
            });
        },
    },
    computed: {
        poTotalValue() {
            let res = 0;
            this.mitems.map((item) => {
                res += item.price * item.quantity;
            });
            this.po_total = res;
            return res;
        },
    },
    watch: {
        "$route.params.purchase_order_id": function (id) {
            this.purchase_order_id = id;
            this.loadPurchaseOrdersItems();
        },
    },
    mounted() {
        this.loadPurchaseOrders();
        this.loadPurchaseOrdersItems();
    },
};
</script>

<style>
</style>
