/*=========================================================================================
  File Name: router.js
  Description: Routes for vue-router. Lazy loading is enabled.
  Object Strucutre:
                    path => router path
                    name => router name
                    component(lazy loading) => component to load
                    meta : {
                      rule => which user can have access (ACL)
                      breadcrumb => Add breadcrumb to specific page
                      pageTitle => Display title besides breadcrumb
                    }
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/


import Vue from 'vue'
import Router from 'vue-router'
import auth from "@/auth/authService";

import firebase from 'firebase/app'
import 'firebase/auth'

Vue.use(Router)

const router = new Router({
    mode: 'history',
    base: process.env.BASE_URL,
    scrollBehavior () {
        return { x: 0, y: 0 }
    },
    routes: [
        {
    // =============================================================================
    // MAIN LAYOUT ROUTES
    // =============================================================================
            path: '/admin',
            name: 'admin',
            component: () => import('./layouts/main/Main.vue'),
            children: [
        // =============================================================================
        // Theme Routes
        // =============================================================================
                {
                    path: '/',
                    redirect: '/admin/dashboard/analytics',
                },
                {
                    path: '/admin/dashboard/analytics',
                    name: 'admin-dashboard-analytics',
                    component: () => import('./views/DashboardAnalytics.vue'),
                    meta: {
                        requireAuth: true,
                        rule: 'admin',
                    }
                },
                {
                    path: '/admin/dashboard/ecommerce',
                    name: 'dashboard-ecommerce',
                    component: () => import('./views/DashboardECommerce.vue'),
                    meta: {
                        requireAuth: true,
                        rule: 'admin'
                    }
                },


        // =============================================================================
        // Application Routes
        // =============================================================================
                {
                    path: '/admin/apps/todo',
                    redirect: '/admin/apps/todo/all',
                    name: 'admin-todo',
                },
                {
                    path: '/admin/apps/todo/:filter',
                    component: () => import('./views/apps/todo/Todo.vue'),
                    meta: {
                        requireAuth: true,
                        rule: 'admin',
                        parent: "todo",
                        no_scroll: true,
                    }
                },
                {
                    path: '/admin/apps/chat',
                    name: 'admin-chat',
                    component: () => import('./views/apps/chat/Chat.vue'),
                    meta: {
                        requireAuth: true,
                        rule: 'admin',
                        no_scroll: true,
                    }
                },
                {
                    path: '/admin/apps/email',
                    redirect: '/admin/apps/email/inbox',
                    name: 'admin-email',
                },
                {
                    path: '/admin/apps/email/:filter',
                    component: () => import('./views/apps/email/Email.vue'),
                    meta: {
                        requireAuth: true,
                        rule: 'admin',
                        parent: 'email',
                        no_scroll: true,
                    }
                },
                {
                    path: '/admin/apps/calendar/vue-simple-calendar',
                    name: 'calendar-simple-calendar',
                    component: () => import('./views/apps/calendar/SimpleCalendar.vue'),
                    meta: {
                        requireAuth: true,
                        rule: 'admin',
                        no_scroll: true,
                    }
                },
                {
                    path: '/admin/apps/eCommerce/shop',
                    name: 'ecommerce-shop',
                    component: () => import('./views/apps/eCommerce/ECommerceShop.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'eCommerce'},
                            { title: 'Shop', active: true },
                        ],
                        pageTitle: 'Shop',
                        rule: 'admin'
                    }
                },
                {
                    path: '/admin/apps/eCommerce/wish-list',
                    name: 'admin-ecommerce-wish-list',
                    component: () => import('./views/apps/eCommerce/ECommerceWishList.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'eCommerce', url:'/admin/apps/eCommerce/shop'},
                            { title: 'Wish List', active: true },
                        ],
                        pageTitle: 'Wish List',
                        rule: 'admin'
                    }
                },
                {
                    path: '/admin/apps/eCommerce/checkout',
                    name: 'admin-ecommerce-checkout',
                    component: () => import('./views/apps/eCommerce/ECommerceCheckout.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'eCommerce', url:'/admin/apps/eCommerce/shop'},
                            { title: 'Checkout', active: true },
                        ],
                        pageTitle: 'Checkout',
                        rule: 'admin'
                    }
                },
                /*
                  Below route is for demo purpose
                  You can use this route in your app
                    {
                        path: '/admin/apps/eCommerce/item/',
                        name: 'ecommerce-item-detail-view',
                        redirect: '/admin/apps/eCommerce/shop',
                    }
                */
                {
                    path: '/admin/apps/eCommerce/item/',
                    redirect: '/apps/eCommerce/item/5546604',
                },
                {
                    path: '/admin/apps/eCommerce/item/:item_id',
                    name: 'admin-ecommerce-item-detail-view',
                    component: () => import('./views/apps/eCommerce/ECommerceItemDetailView.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'eCommerce'},
                            { title: 'Shop', url: {name: 'ecommerce-shop'} },
                            { title: 'Item Details', active: true },
                        ],
                        parent: "ecommerce-item-detail-view",
                        pageTitle: 'Item Details',
                        rule: 'admin'
                    }
                },
                {
                    path: '/admin/apps/user/user-list',
                    name: 'admin-app-user-list',
                    component: () => import('@/views/apps/user/user-list/UserList.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'User' },
                            { title: 'List', active: true },
                        ],
                        pageTitle: 'User List',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/apps/user/user-view/:userId',
                    name: 'admin-app-user-view',
                    component: () => import('@/views/apps/user/UserView.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'User', url: { name: 'admin-app-user-list' } },
                            { title: 'View', active: true },
                        ],
                        pageTitle: 'User View',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/apps/user/user-edit/:userId',
                    name: 'admin-app-user-edit',
                    component: () => import('@/views/apps/user/user-edit/UserEdit.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'User', url: { name: 'admin-app-user-list' } },
                            { title: 'Edit', active: true },
                        ],
                        pageTitle: 'User Edit',
                        rule: 'admin'
                    },
                },
        // =============================================================================
        // UI ELEMENTS
        // =============================================================================
                {
                    path: '/admin/ui-elements/data-list/list-view',
                    name: 'admin-data-list-list-view',
                    component: () => import('@/views/ui-elements/data-list/list-view/DataListListView.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Data List'},
                            { title: 'List View', active: true },
                        ],
                        pageTitle: 'List View',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/ui-elements/data-list/thumb-view',
                    name: 'admin-data-list-thumb-view',
                    component: () => import('@/views/ui-elements/data-list/thumb-view/DataListThumbView.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Data List'},
                            { title: 'Thumb View', active: true },
                        ],
                        pageTitle: 'Thumb View',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/ui-elements/grid/vuesax',
                    name: 'admin-grid-vuesax',
                    component: () => import('@/views/ui-elements/grid/vuesax/GridVuesax.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Grid'},
                            { title: 'Vuesax', active: true },
                        ],
                        pageTitle: 'Grid',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/ui-elements/grid/tailwind',
                    name: 'admin-grid-tailwind',
                    component: () => import('@/views/ui-elements/grid/tailwind/GridTailwind.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Grid'},
                            { title: 'Tailwind', active: true },
                        ],
                        pageTitle: 'Tailwind Grid',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/ui-elements/colors',
                    name: 'admin-colors',
                    component: () => import('./views/ui-elements/colors/Colors.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Colors', active: true },
                        ],
                        pageTitle: 'Colors',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/ui-elements/card/basic',
                    name: 'admin-basic-cards',
                    component: () => import('./views/ui-elements/card/CardBasic.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Card' },
                            { title: 'Basic Cards', active: true },
                        ],
                        pageTitle: 'Basic Cards',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/ui-elements/card/statistics',
                    name: 'admin-statistics-cards',
                    component: () => import('./views/ui-elements/card/CardStatistics.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Card' },
                            { title: 'Statistics Cards', active: true },
                        ],
                        pageTitle: 'Statistics Card',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/ui-elements/card/analytics',
                    name: 'admin-analytics-cards',
                    component: () => import('./views/ui-elements/card/CardAnalytics.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Card' },
                            { title: 'Analytics Card', active: true },
                        ],
                        pageTitle: 'Analytics Card',
                        rule: 'admin'
                    },
                },
                {
                    path: '/ui-elements/card/card-actions',
                    name: 'card-actions',
                    component: () => import('./views/ui-elements/card/CardActions.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Card' },
                            { title: 'Card Actions', active: true },
                        ],
                        pageTitle: 'Card Actions',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/ui-elements/card/card-colors',
                    name: 'card-colors',
                    component: () => import('./views/ui-elements/card/CardColors.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Card' },
                            { title: 'Card Colors', active: true },
                        ],
                        pageTitle: 'Card Colors',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/ui-elements/table',
                    name: 'table',
                    component: () => import('./views/ui-elements/table/Table.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Table', active: true },
                        ],
                        pageTitle: 'Table',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/ui-elements/ag-grid-table',
                    name: 'ag-grid-table',
                    component: () => import('./views/ui-elements/ag-grid-table/AgGridTable.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'agGrid Table', active: true },
                        ],
                        pageTitle: 'agGrid Table',
                        rule: 'admin'
                    },
                },

        // =============================================================================
        // COMPONENT ROUTES
        // =============================================================================
                {
                    path: '/admin/components/alert',
                    name: 'component-alert',
                    component: () => import('@/views/components/vuesax/alert/Alert.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Components' },
                            { title: 'Alert', active: true },
                        ],
                        pageTitle: 'Alert',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/components/avatar',
                    name: 'component-avatar',
                    component: () => import('@/views/components/vuesax/avatar/Avatar.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Components' },
                            { title: 'Avatar', active: true },
                        ],
                        pageTitle: 'Avatar',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/components/breadcrumb',
                    name: 'component-breadcrumb',
                    component: () => import('@/views/components/vuesax/breadcrumb/Breadcrumb.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Components' },
                            { title: 'Breadcrumb', active: true },
                        ],
                        pageTitle: 'Breadcrumb',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/components/button',
                    name: 'component-button',
                    component: () => import('@/views/components/vuesax/button/Button.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Components' },
                            { title: 'Button', active: true },
                        ],
                        pageTitle: 'Button',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/components/button-group',
                    name: 'component-button-group',
                    component: () => import('@/views/components/vuesax/button-group/ButtonGroup.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Components' },
                            { title: 'Button Group', active: true },
                        ],
                        pageTitle: 'Button Group',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/components/chip',
                    name: 'component-chip',
                    component: () => import('@/views/components/vuesax/chip/Chip.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Components' },
                            { title: 'Chip', active: true },
                        ],
                        pageTitle: 'Chip',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/components/collapse',
                    name: 'component-collapse',
                    component: () => import('@/views/components/vuesax/collapse/Collapse.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Components' },
                            { title: 'Collapse', active: true },
                        ],
                        pageTitle: 'Collapse',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/components/dialogs',
                    name: 'component-dialog',
                    component: () => import('@/views/components/vuesax/dialogs/Dialogs.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Components' },
                            { title: 'Dialogs', active: true },
                        ],
                        pageTitle: 'Dialogs',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/components/divider',
                    name: 'component-divider',
                    component: () => import('@/views/components/vuesax/divider/Divider.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Components' },
                            { title: 'Divider', active: true },
                        ],
                        pageTitle: 'Divider',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/components/dropdown',
                    name: 'component-drop-down',
                    component: () => import('@/views/components/vuesax/dropdown/Dropdown.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Components' },
                            { title: 'Dropdown', active: true },
                        ],
                        pageTitle: 'Dropdown',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/components/list',
                    name: 'component-list',
                    component: () => import('@/views/components/vuesax/list/List.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Components' },
                            { title: 'List', active: true },
                        ],
                        pageTitle: 'List',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/components/loading',
                    name: 'component-loading',
                    component: () => import('@/views/components/vuesax/loading/Loading.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Components' },
                            { title: 'Loading', active: true },
                        ],
                        pageTitle: 'Loading',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/components/navbar',
                    name: 'component-navbar',
                    component: () => import('@/views/components/vuesax/navbar/Navbar.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Components' },
                            { title: 'Navbar', active: true },
                        ],
                        pageTitle: 'Navbar',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/components/notifications',
                    name: 'component-notifications',
                    component: () => import('@/views/components/vuesax/notifications/Notifications.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Components' },
                            { title: 'Notifications', active: true },
                        ],
                        pageTitle: 'Notifications',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/components/pagination',
                    name: 'component-pagination',
                    component: () => import('@/views/components/vuesax/pagination/Pagination.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Components' },
                            { title: 'Pagination', active: true },
                        ],
                        pageTitle: 'Pagination',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/components/popup',
                    name: 'component-popup',
                    component: () => import('@/views/components/vuesax/popup/Popup.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Components' },
                            { title: 'Popup', active: true },
                        ],
                        pageTitle: 'Popup',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/components/progress',
                    name: 'component-progress',
                    component: () => import('@/views/components/vuesax/progress/Progress.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Components' },
                            { title: 'Progress', active: true },
                        ],
                        pageTitle: 'Progress',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/components/sidebar',
                    name: 'component-sidebar',
                    component: () => import('@/views/components/vuesax/sidebar/Sidebar.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Components' },
                            { title: 'Sidebar', active: true },
                        ],
                        pageTitle: 'Sidebar',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/components/slider',
                    name: 'component-slider',
                    component: () => import('@/views/components/vuesax/slider/Slider.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Components' },
                            { title: 'Slider', active: true },
                        ],
                        pageTitle: 'Slider',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/components/tabs',
                    name: 'component-tabs',
                    component: () => import('@/views/components/vuesax/tabs/Tabs.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Components' },
                            { title: 'Tabs', active: true },
                        ],
                        pageTitle: 'Tabs',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/components/tooltip',
                    name: 'component-tooltip',
                    component: () => import('@/views/components/vuesax/tooltip/Tooltip.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Components' },
                            { title: 'Tooltip', active: true },
                        ],
                        pageTitle: 'Tooltip',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/components/upload',
                    name: 'component-upload',
                    component: () => import('@/views/components/vuesax/upload/Upload.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Components' },
                            { title: 'Upload', active: true },
                        ],
                        pageTitle: 'Upload',
                        rule: 'admin'
                    },
                },


        // =============================================================================
        // FORMS
        // =============================================================================
            // =============================================================================
            // FORM ELEMENTS
            // =============================================================================
                {
                    path: '/admin/forms/form-elements/select',
                    name: 'form-element-select',
                    component: () => import('./views/forms/form-elements/select/Select.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Form Elements' },
                            { title: 'Select', active: true },
                        ],
                        pageTitle: 'Select',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/forms/form-elements/switch',
                    name: 'form-element-switch',
                    component: () => import('./views/forms/form-elements/switch/Switch.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Form Elements' },
                            { title: 'Switch', active: true },
                        ],
                        pageTitle: 'Switch',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/forms/form-elements/checkbox',
                    name: 'form-element-checkbox',
                    component: () => import('./views/forms/form-elements/checkbox/Checkbox.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Form Elements' },
                            { title: 'Checkbox', active: true },
                        ],
                        pageTitle: 'Checkbox',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/forms/form-elements/radio',
                    name: 'form-element-radio',
                    component: () => import('./views/forms/form-elements/radio/Radio.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Form Elements' },
                            { title: 'Radio', active: true },
                        ],
                        pageTitle: 'Radio',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/forms/form-elements/input',
                    name: 'form-element-input',
                    component: () => import('./views/forms/form-elements/input/Input.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Form Elements' },
                            { title: 'Input', active: true },
                        ],
                        pageTitle: 'Input',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/forms/form-elements/number-input',
                    name: 'form-element-number-input',
                    component: () => import('./views/forms/form-elements/number-input/NumberInput.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Form Elements' },
                            { title: 'Number Input', active: true },
                        ],
                        pageTitle: 'Number Input',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/forms/form-elements/textarea',
                    name: 'form-element-textarea',
                    component: () => import('./views/forms/form-elements/textarea/Textarea.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Form Elements' },
                            { title: 'Textarea', active: true },
                        ],
                        pageTitle: 'Textarea',
                        rule: 'admin'
                    },
                },
        // -------------------------------------------------------------------------------------------------------------------------------------------
                {
                    path: '/admin/forms/form-layouts',
                    name: 'forms-form-layouts',
                    component: () => import('@/views/forms/FormLayouts.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Forms' },
                            { title: 'Form Layouts', active: true },
                        ],
                        pageTitle: 'Form Layouts',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/forms/form-wizard',
                    name: 'extra-component-form-wizard',
                    component: () => import('@/views/forms/form-wizard/FormWizard.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Extra Components' },
                            { title: 'Form Wizard', active: true },
                        ],
                        pageTitle: 'Form Wizard',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/forms/form-validation',
                    name: 'extra-component-form-validation',
                    component: () => import('@/views/forms/form-validation/FormValidation.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Extra Components' },
                            { title: 'Form Validation', active: true },
                        ],
                        pageTitle: 'Form Validation',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/forms/form-input-group',
                    name: 'extra-component-form-input-group',
                    component: () => import('@/views/forms/form-input-group/FormInputGroup.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Extra Components' },
                            { title: 'Form Input Group', active: true },
                        ],
                        pageTitle: 'Form Input Group',
                        rule: 'admin'
                    },
                },

        // =============================================================================
        // Pages Routes
        // =============================================================================
                {
                    path: '/admin/pages/profile',
                    name: 'admin-page-profile',
                    component: () => import('@/views/pages/Profile.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Pages' },
                            { title: 'Profile', active: true },
                        ],
                        pageTitle: 'Profile',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/pages/user-settings',
                    name: 'page-user-settings',
                    component: () => import('@/views/pages/user-settings/UserSettings.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Pages' },
                            { title: 'User Settings', active: true },
                        ],
                        pageTitle: 'Settings',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/pages/faq',
                    name: 'page-faq',
                    component: () => import('@/views/pages/Faq.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Pages' },
                            { title: 'FAQ', active: true },
                        ],
                        pageTitle: 'FAQ',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/pages/knowledge-base',
                    name: 'page-knowledge-base',
                    component: () => import('@/views/pages/KnowledgeBase.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Pages' },
                            { title: 'KnowledgeBase', active: true },
                        ],
                        pageTitle: 'KnowledgeBase',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/pages/knowledge-base/category',
                    name: 'page-knowledge-base-category',
                    component: () => import('@/views/pages/KnowledgeBaseCategory.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Pages' },
                            { title: 'KnowledgeBase', url: '/admin/pages/knowledge-base' },
                            { title: 'Category', active: true },
                        ],
                        parent: 'page-knowledge-base',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/pages/knowledge-base/category/question',
                    name: 'page-knowledge-base-category-question',
                    component: () => import('@/views/pages/KnowledgeBaseCategoryQuestion.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Pages' },
                            { title: 'KnowledgeBase', url: '/admin/pages/knowledge-base' },
                            { title: 'Category', url: '/admin/pages/knowledge-base/category' },
                            { title: 'Question', active: true },
                        ],
                        parent: 'page-knowledge-base',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/pages/search',
                    name: 'page-search',
                    component: () => import('@/views/pages/Search.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Pages' },
                            { title: 'Search', active: true },
                        ],
                        pageTitle: 'Search',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/pages/invoice',
                    name: 'page-invoice',
                    component: () => import('@/views/pages/Invoice.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Pages' },
                            { title: 'Invoice', active: true },
                        ],
                        pageTitle: 'Invoice',
                        rule: 'admin'
                    },
                },

        // =============================================================================
        // CHARTS & MAPS
        // =============================================================================
                {
                    path: '/admin/charts-and-maps/charts/apex-charts',
                    name: 'extra-component-charts-apex-charts',
                    component: () => import('@/views/charts-and-maps/charts/apex-charts/ApexCharts.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Charts & Maps' },
                            { title: 'Apex Charts', active: true },
                        ],
                        pageTitle: 'Apex Charts',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/charts-and-maps/charts/echarts',
                    name: 'extra-component-charts-echarts',
                    component: () => import('@/views/charts-and-maps/charts/echarts/Echarts.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Charts & Maps' },
                            { title: 'echarts', active: true },
                        ],
                        pageTitle: 'echarts',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/charts-and-maps/maps/google-map',
                    name: 'extra-component-maps-google-map',
                    component: () => import('@/views/charts-and-maps/maps/google-map/GoogleMap.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Charts & Maps' },
                            { title: 'Google Map', active: true },
                        ],
                        pageTitle: 'Google Map',
                        rule: 'admin'
                    },
                },



        // =============================================================================
        // EXTENSIONS
        // =============================================================================
                {
                    path: '/admin/extensions/select',
                    name: 'extra-component-select',
                    component: () => import('@/views/components/extra-components/select/Select.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Extra Components' },
                            { title: 'Select', active: true },
                        ],
                        pageTitle: 'Select',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/extensions/quill-editor',
                    name: 'extra-component-quill-editor',
                    component: () => import('@/views/components/extra-components/quill-editor/QuillEditor.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Extra Components' },
                            { title: 'Quill Editor', active: true },
                        ],
                        pageTitle: 'Quill Editor',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/extensions/drag-and-drop',
                    name: 'extra-component-drag-and-drop',
                    component: () => import('@/views/components/extra-components/drag-and-drop/DragAndDrop.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Extra Components' },
                            { title: 'Drag & Drop', active: true },
                        ],
                        pageTitle: 'Drag & Drop',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/extensions/datepicker',
                    name: 'extra-component-datepicker',
                    component: () => import('@/views/components/extra-components/datepicker/Datepicker.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Extra Components' },
                            { title: 'Datepicker', active: true },
                        ],
                        pageTitle: 'Datepicker',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/extensions/datetime-picker',
                    name: 'extra-component-datetime-picker',
                    component: () => import('@/views/components/extra-components/datetime-picker/DatetimePicker.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Extra Components' },
                            { title: 'Datetime Picker', active: true },
                        ],
                        pageTitle: 'Datetime Picker',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/extensions/access-control',
                    name: 'extra-component-access-control',
                    component: () => import('@/views/components/extra-components/access-control/AccessControl.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Extensions' },
                            { title: 'Access Control', active: true },
                        ],
                        pageTitle: 'Access Control',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/extensions/i18n',
                    name: 'extra-component-i18n',
                    component: () => import('@/views/components/extra-components/I18n.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Extensions' },
                            { title: 'I18n', active: true },
                        ],
                        pageTitle: 'I18n',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/extensions/carousel',
                    name: 'extra-component-carousel',
                    component: () => import('@/views/components/extra-components/carousel/Carousel.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Extensions' },
                            { title: 'Carousel', active: true },
                        ],
                        pageTitle: 'Carousel',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/extensions/clipboard',
                    name: 'extra-component-clipboard',
                    component: () => import('@/views/components/extra-components/clipboard/Clipboard.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Extensions' },
                            { title: 'Clipboard', active: true },
                        ],
                        pageTitle: 'Clipboard',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/extensions/context-menu',
                    name: 'extra-component-context-menu',
                    component: () => import('@/views/components/extra-components/context-menu/ContextMenu.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Extensions' },
                            { title: 'Context Menu', active: true },
                        ],
                        pageTitle: 'Context Menu',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/extensions/star-ratings',
                    name: 'extra-component-star-ratings',
                    component: () => import('@/views/components/extra-components/star-ratings/StarRatings.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Extensions' },
                            { title: 'Star Ratings', active: true },
                        ],
                        pageTitle: 'Star Ratings',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/extensions/autocomplete',
                    name: 'extra-component-autocomplete',
                    component: () => import('@/views/components/extra-components/autocomplete/Autocomplete.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Extensions' },
                            { title: 'Autocomplete', active: true },
                        ],
                        pageTitle: 'Autocomplete',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/extensions/tree',
                    name: 'extra-component-tree',
                    component: () => import('@/views/components/extra-components/tree/Tree.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Extensions' },
                            { title: 'Tree', active: true },
                        ],
                        pageTitle: 'Tree',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/import-export/import',
                    name: 'import-excel',
                    component: () => import('@/views/components/extra-components/import-export/Import.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Extensions' },
                            { title: 'Import/Export' },
                            { title: 'Import', active: true },
                        ],
                        pageTitle: 'Import Excel',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/import-export/export',
                    name: 'export-excel',
                    component: () => import('@/views/components/extra-components/import-export/Export.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Extensions' },
                            { title: 'Import/Export' },
                            { title: 'Export', active: true },
                        ],
                        pageTitle: 'Export Excel',
                        rule: 'admin'
                    },
                },
                {
                    path: '/admin/import-export/export-selected',
                    name: 'export-excel-selected',
                    component: () => import('@/views/components/extra-components/import-export/ExportSelected.vue'),
                    meta: {
                        requireAuth: true,
                        breadcrumb: [
                            { title: 'Home', url: '/admin' },
                            { title: 'Extensions' },
                            { title: 'Import/Export' },
                            { title: 'Export Selected', active: true },
                        ],
                        pageTitle: 'Export Excel',
                        rule: 'admin'
                    },
                },
            ],
        },
    // =============================================================================
    // FULL PAGE LAYOUTS
    // =============================================================================
        {
            path: '/admin',
            component: () => import('@/layouts/full-page/FullPage.vue'),
            children: [
        // =============================================================================
        // PAGES
        // =============================================================================
                {
                    path: '/admin/callback',
                    name: 'admin-auth-callback',
                    component: () => import('@/views/Callback.vue'),
                    meta: {
                        rule: 'any'
                    }
                },
                {
                    path: '/admin/pages/login',
                    name: 'admin-page-login',
                    component: () => import('@/views/pages/login/Login.vue'),
                    meta: {
                        rule: 'any'
                    }
                },
                {
                    path: '/admin/pages/register',
                    name: 'admin-page-register',
                    component: () => import('@/views/pages/register/Register.vue'),
                    meta: {
                        rule: 'any'
                    }
                },
                {
                    path: '/admin/pages/forgot-password',
                    name: 'admin-page-forgot-password',
                    component: () => import('@/views/pages/ForgotPassword.vue'),
                    meta: {
                        rule: 'any'
                    }
                },
                {
                    path: '/admin/pages/reset-password',
                    name: 'admin-page-reset-password',
                    component: () => import('@/views/pages/ResetPassword.vue'),
                    meta: {
                        rule: 'any'
                    }
                },
                {
                    path: '/admin/pages/lock-screen',
                    name: 'admin-page-lock-screen',
                    component: () => import('@/views/pages/LockScreen.vue'),
                    meta: {
                        rule: 'any'
                    }
                },
                {
                    path: '/admin/pages/comingsoon',
                    name: 'admin-page-coming-soon',
                    component: () => import('@/views/pages/ComingSoon.vue'),
                    meta: {
                        rule: 'any'
                    }
                },
                {
                    path: '/admin/pages/error-404',
                    name: 'admin-page-error-404',
                    component: () => import('@/views/pages/Error404.vue'),
                    meta: {
                        rule: 'any'
                    }
                },
                {
                    path: '/admin/pages/error-500',
                    name: 'admin-page-error-500',
                    component: () => import('@/views/pages/Error500.vue'),
                    meta: {
                        rule: 'any'
                    }
                },
                {
                    path: '/admin/pages/not-authorized',
                    name: 'admin-page-not-authorized',
                    component: () => import('@/views/pages/NotAuthorized.vue'),
                    meta: {
                        rule: 'any'
                    }
                },
                {
                    path: '/admin/pages/maintenance',
                    name: 'admin-page-maintenance',
                    component: () => import('@/views/pages/Maintenance.vue'),
                    meta: {
                        rule: 'any'
                    }
                },
            ]
        },
        // Redirect to 404 page, if no match found
        {
            path: '/admin/*',
            redirect: '/admin/pages/error-404'
        }
    ],
})

// #region  Global BeforeEach()
router.beforeEach((to, from, next) => {

    const currentUser = window.localStorage.getItem("userInfo");
    const accessToken = window.localStorage.getItem("accessToken");

    // if (to.name == "admin-page-not-authorized")
        // router.push({ name: 'admin-page-login' })

    // Authenticated User
    if (currentUser != null && accessToken != null) {
        if (
            to.name == "admin-page-login"               ||
            to.name == "admin-page-register"            ||
            to.name == "admin-page-forgot-password"     ||
            to.name == "admin-page-reset-password"      ||
            to.name == "admin-page-not-authorized"   
        ) {
            router.push({ path: '/admin', query: { to: to.path } })
        }        
    }

    // Guest-s
    if (currentUser == null && accessToken == null) {
        
        if (
            to.name === "admin-page-login"              ||
            to.name === "admin-page-forgot-password"    ||
            to.name === "admin-page-error-404"          ||
            to.name === "admin-page-error-500"          ||
            to.name === "admin-page-register"           ||
            to.name === "admin-callback"                ||
            to.name === "admin-page-comingsoon"       
            // || (accessToken || currentUser)
        ) {
            return next();
        }
    }

    // #region Middleware - Auth Required: If auth required, check login. If login fails redirect to login page
    if(to.meta.requireAuth) {
        if (!(currentUser && accessToken)) {
            // router.push({ name: 'admin-page-login', query: { to: to.path } })
            router.push({ name: 'admin-page-login' })
        }
    }
    // #endregion

    return next();

});
// #endregion


// #region  Global AfterEach()
router.afterEach(() => {
    // Remove initial loading
    const appLoading = document.getElementById('loading-bg')
      if (appLoading) {
          appLoading.style.display = "none";
      }
  })
  // #endregion
  

export default router
