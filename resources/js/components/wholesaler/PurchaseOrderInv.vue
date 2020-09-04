<template>
  <div class="px-lg-2">
            <div class="chat-conversation p-3">
                <ul class="list-unstyled mb-0 pr-3" data-simplebar="init" style="max-height: 450px;"><div class="simplebar-wrapper" style="margin: 0px -16px 0px 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: -16.8px; bottom: 0px;"><div class="simplebar-content-wrapper" style="height: auto; overflow: hidden scroll;"><div class="simplebar-content" style="padding: 0px 16px 0px 0px;">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-body printableArea">
                            <!-- <h3><b>INVOICE</b> <span class="pull-right">#5669626{{formatRef(purchase_order.reference)}}</span></h3> -->
                            <h3><b>P.O REF:</b> <span class="pull-right">#{{purchase_order.id}}{{formatRef(purchase_order.reference)}}</span></h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-left">
                                        <address>
                                            <h3><b class="text-danger">NNURO</b></h3>
                                            <p class="text-muted m-l-5">P.O.Box
                                                <br> KN 91,
                                                <br> Kaneshie
                                                <br> Accra</p>
                                        </address>
                                    </div>
                                    <div class="pull-right text-right">
                                        <address>
                                            <h3>To,</h3>
                                            <h4 class="font-bold">Meds &amp; Meds,</h4>
                                            <p class="text-muted m-l-30">P.O.Box 95,
                                                <br>Drug Lane, Okaishie
                                                <br> Accra
                                            <p class="m-t-30"><b>Invoice Date :</b> <i class="ri-calendar-event-line"></i> 23rd Jan 2017</p>
                                            <p><b>Due Date :</b> <i class="ri-calendar-check-fill"></i> 25th Jan 2017</p>
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
                                                    <th class="text-right">Unit Cost(GH₵)</th>
                                                    <th class="text-right">Total(GH₵)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(item, index) in purchase_order_items" :key="index" >
                                                    <td class="text-center">{{item.id}}</td>
                                                    <td>{{item.product_name}}</td>
                                                    <td class="text-right">{{item.manufacturer}} </td>
                                                    <td class="text-right"> {{item.quantity}} </td>
                                                    <td class="text-right"> {{item.price}}(GH₵)</td>
                                                    <td class="text-right"> {{item.price}}(GH₵)</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="pull-right m-t-30 text-right">
                                        <!-- <p>Sub - Total amount: $13,848</p> -->
                                        <!-- <p>vat (10%) : $138 </p> -->
                                        <hr>
                                        <h3><b>Total :</b> GH&cent; {{purchase_order.total}}</h3>
                                    </div>
                                    <div class="clearfix"></div>
                                    <hr>
                                    <div class="text-right">
                                        <button class="btn btn-danger" type="submit"> Proceed to payment </button>
                                        <button id="print" class="btn btn-default btn-outline" type="button"> <span><i class="ri-printer-fill"></i> Print</span> </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                </div></div></div></div><div class="simplebar-placeholder" style="width: auto; height: 883px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 223px; transform: translate3d(0px, 0px, 0px); display: block;"></div></div></ul>
            </div>
        </div>
</template>

<script>
export default {
    props: ['data'],
    
    methods: {
         async loadPurchaseOrdersItems(id){
            this.loading = !this.loading
            const loading = this.$vs.loading(id);
            await axios.get('wholesaler_purchase_order_view/' + this.purchase_order_id)
            .then(({data}) => {
                this.purchase_order = data.purchase_order
                this.purchase_order_items = data.purchase_order.order_items
                this.loading != this.loading
                loading.close();
                })
            .catch(({response}) => {
                this.loading != this.loading
                loading.close();
                }
            )
        },
        formatRef(reference){
            return reference ? reference.substring(0, 15) : '';
        },
        formatDate(){

        },
        formatPrice(price){
            return Number.parseFloat(price);
        },
    },

}
</script>

<style>

</style>