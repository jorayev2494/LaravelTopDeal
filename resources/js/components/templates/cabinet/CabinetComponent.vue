<template>
    <div class="main-container container">
        <ul class="breadcrumb">
            <li>
                <a href="#">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li>
                <a href="#">Account</a>
            </li>
            <li>
                <a href="#">My Account</a>
            </li>
        </ul>

        <div class="row">
            <div class="col-md-9" id="content">
                <h2 class="title">My Account</h2>
                <p v-if="hasFullNameComp" class="lead">Hello, <strong>{{ userInfo.first_name }} {{ userInfo.last_name }}!</strong> - To update your account information.</p>
                <!--Middle Part Start-->
                <component v-bind:is="componentName" :user-info="userInfo"></component>
                <!--Middle Part End-->
            </div>
            
            <!--Right Part Start -->
                <cabinet-sidebar-component @changedSidebar="sideChanged($event)"></cabinet-sidebar-component>
            <!--Right Part End -->
        </div>
    </div>
</template>

<script>

    import { mapState, mapGetters } from 'vuex'

    export default {
        data: function() {
            return {
                userInfo        : null,
                countries       : null,
                componentName   : 'CabinetPersonalDetailsComponent',
            }
        },
        methods: {
            sideChanged(change) {
                this.componentName = change;
            }
        },
        components: {
            CabinetSidebarComponent             : require('./CabinetSidebarComponent.vue').default,

            // Changes Components
            CabinetPersonalDetailsComponent     : require('./CabinetPersonalDetailsComponent.vue').default,
            CabinetChangePasswordComponent      : require('./CabinetChangePasswordComponent.vue').default
        },
        computed: {
            hasFullNameComp() {
                return this.userInfo.first_name || this.userInfo.last_name;
            },
        },
        async created() {
            this.userInfo  = JSON.parse(window.localStorage.getItem('userInfo'));
            this.countries = this.$store.getters['country/GET_COUNTRIES']; 
            // this.countries = await this.$store.dispatch('country/ACTION_LOAD_COUNTRIES');
        },
    }
</script>

<style lang="scss" scoped>

</style>