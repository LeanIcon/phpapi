import DashboardPage from '../pages/DashboardPage.vue';
import WholealerPage from '../pages/Wholesaler.vue';
import AdminProductsPage from '../pages/admin/product/Products.vue';
import AdProductsPage from '../pages/admin/product/AddProduct.vue';
import DosageFormPage from '../pages/admin/product/DosageForm.vue';
import AdDosagePage from '../pages/admin/product/AddDosage.vue';
import DrugClassPage from '../pages/admin/product/DrugClass.vue';
import ManufacturerPage from '../pages/admin/product/Manufacturer.vue';
import AdManufacturerPage from '../pages/admin/product/AddManufacturer.vue';
import CategoryPage from '../pages/admin/product/DrugLegalStatus.vue';
import NewsPage from '../pages/admin/NewsPostTable.vue';
import AdNewsPage from '../pages/admin/AddNews.vue';
import LocationPage from '../pages/admin/Location.vue';
import UserDetailsPage from '../pages/UserDetailsPage.vue';
import RegionPage from '../pages/admin/product/Region.vue';
import AdminRetailerPage from '../pages/AdminRetailer.vue';
import ProductCategoryPage from '../pages/admin/product/ProductCategory.vue';
import RetailerDetailsPage from '../pages/RetailerDetailsPage.vue';
import FeedBackPage from '../pages/FeedBackPage.vue';
import Page404 from '../pages/404.vue';


export default [
    { path: '/', component: DashboardPage,  name: 'admin' },
    { path: '/dashboard', component: DashboardPage,  name: 'admin.dashboard' },
    { path: 'retailers', component: AdminRetailerPage },
    { path: 'wholesalers', component: WholealerPage },
    { path: 'user/details/:userId', component: UserDetailsPage, name: 'user_details', props: true },
    { path: 'user/page/:userId', component: RetailerDetailsPage, name: 'user_page', props: true },
    { path: 'products', component: AdminProductsPage},
    { path: 'products/add', component: AdProductsPage},
    { path: 'products/edit', component: AdProductsPage},
    { path: 'products/view', component: AdProductsPage},
    { path: 'settings', component: DashboardPage },
    { path: 'news', component: DashboardPage },
    { path: 'news/category', component: DashboardPage },
    { path: 'manufacturers', component: ManufacturerPage },
    { path: 'manufacturers/add', component: AdManufacturerPage},
    { path: 'product-category', component: CategoryPage },
    { path: 'category-types', component:ProductCategoryPage},
    { path: 'drug-class', component: DrugClassPage },
    { path: 'news-post', component: NewsPage},
    { path: 'add-news', component: AdNewsPage},
    { path: 'drug-dosage-form', component: DosageFormPage },
    { path: 'drug-dosage-form/add', component: AdDosagePage},
    { path: 'location', component: LocationPage },
    { path: 'region', component: RegionPage },
    { path: 'feedback', component: FeedBackPage },
    { path: '*', component: Page404 },
]
