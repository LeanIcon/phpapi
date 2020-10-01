import WholesalerDetails from '../pages/retailer/WholesalerDetails.vue';
import ShortageListPage from '../pages/retailer/ShortageListPage.vue';
import PurchaseOrderList from '../pages/retailer/PurchaseOrderList.vue';
import RetailerProfilePage from '../pages/retailer/RetailerProfilePage.vue';
import RetailDashboardPage from '../pages/retailer/RetailerDashboardPage.vue';

import ShortageListCreatePage from '../pages/retailer/ShortageListCreatePage.vue';
import PriceComparisonPage from '../pages/PriceComparisonPage.vue';
import RetailerWholesaler from '../pages/retailer/RetailerWholesaler.vue';
import WholesalerProductsPage from '../pages/retailer/WholesalerProducts.vue';

import RetailerInvoiceList from '../pages/retailer/RetailerInvoiceList.vue';
import UserDetailsPage from '../pages/UserDetailsPage.vue';
import RetailerDetailsPage from '../pages/RetailerDetailsPage.vue';
import Page404 from '../pages/404.vue';

export default [
    { path: '/', component: RetailDashboardPage,  name: 'retailer' },
            { path: '/dashboard', component: RetailDashboardPage,  name: 'retailer.dashboard' },
            { path: 'wholesaler', component: RetailerWholesaler, name: 'wholesalers' },
            { path: 'wholesaler/detail', component: WholesalerDetails, name: 'wholesaler.detail' },
            { path: 'wholesaler/:id/products', component: WholesalerProductsPage, name: 'wholesaler.products' },
            { path: 'user/details/:userId', component: UserDetailsPage, name: 'retail_details', props: true },
            { path: 'user/page/:userId', component: RetailerDetailsPage, name: 'retail_page' },
            { path: 'shortagelist', component: ShortageListPage},
            { path: 'shortage/create', component: ShortageListCreatePage},
            { path: 'purchase_orders', component: PurchaseOrderList},
            { path: 'products/edit', component: AdProductsPage},
            { path: 'products/view', component: AdProductsPage},
            { path: 'price_comparison', component: PriceComparisonPage, name: 'retailer.price.comparison'},
            { path: 'order/invoice_list', component: RetailerInvoiceList, name: 'retailer.invoice'},
            { path: 'profile', component: RetailerProfilePage, name: 'retailer.profle'},
            { path: '*', component: Page404 },
]
