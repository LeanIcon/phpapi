import RetailerPage from '../pages/Retailer.vue';
import WholesaleDashboardPage from '../pages/wholesaler/WholesalerDashboardPage.vue';
import WholesalerProducts from '../pages/wholesaler/WholesalerProducts.vue';
import WholesalerProductAdd from '../pages/wholesaler/WholesalerProductAdd.vue';
import WholesalerPurchaseOrderList from '../pages/wholesaler/PurchaseOrderList.vue';
import PurchaseOrderView from '../pages/wholesaler/PurchaseOrderView.vue';
import WholesalerProfilePage from '../pages/wholesaler/WholeSalerProfilePage.vue';
import UserDetailsPage from '../pages/UserDetailsPage.vue';
import WholesalerInvoiceList from '../pages/wholesaler/WholesalerInvoiceList.vue';
import RetailerDetailsPage from '../pages/RetailerDetailsPage.vue';
import Page404 from '../pages/404.vue';

export default [
    { path: '/', component: WholesaleDashboardPage, name: 'wholesaler' },
    { path: '/dashboard', component: WholesaleDashboardPage, name: 'wholesaler.dashboard' },
    { path: 'retailers', component: RetailerPage },
    { path: 'user/details/:userId', component: UserDetailsPage, name: 'wholesale_details', props: true },
    { path: 'user/page/:userId', component: RetailerDetailsPage, name: 'wholesale_page', props: true },
    { path: 'products', component: WholesalerProducts},
    { path: 'purchase_orders', component: WholesalerPurchaseOrderList},
    { path: 'purchase_orders/:purchase_order_id/view', component: PurchaseOrderView, name: 'purchase_order.view', props: true},
    { path: 'products/add', component: WholesalerProductAdd},
    { path: 'products/edit', component: WholesalerProductAdd},
    { path: 'products/view', component: WholesalerProductAdd},
    { path: 'settings/profile', component: WholesalerProfilePage, name: 'wholesaler.profle'},
    { path: 'orders/invoice_list', component: WholesalerInvoiceList, name: 'wholesaler.invoices'},
    { path: '*', component: Page404 },
]
