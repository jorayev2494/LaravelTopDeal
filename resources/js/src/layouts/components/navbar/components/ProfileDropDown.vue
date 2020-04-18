<template>
    <div class="the-navbar__user-meta flex items-center" v-if="activeUserInfo.first_name">

        <div class="text-right leading-tight hidden sm:block">
            <p class="font-semibold">{{ activeUserInfo.first_name }}</p>
            <small>Available</small>
        </div>

        <vs-dropdown vs-custom-content vs-trigger-click class="cursor-pointer">

            <div class="con-img ml-3">
                <img v-if="activeUserInfo.avatar" key="onlineImg" :src="activeUserInfo.avatar" alt="user-img"
                    width="40" height="40" class="rounded-full shadow-md cursor-pointer block" />
            </div>

            <vs-dropdown-menu class="vx-navbar-dropdown">
                <ul style="min-width: 9rem">

                    <li class="flex py-2 px-4 cursor-pointer hover:bg-primary hover:text-white"
                        @click="$router.push({ name: 'admin-page-profile' }).catch(() => {})">
                        <feather-icon icon="UserIcon" svgClasses="w-4 h-4" />
                        <span class="ml-2">Profile</span>
                    </li>

                    <li class="flex py-2 px-4 cursor-pointer hover:bg-primary hover:text-white"
                        @click="$router.push({ name: 'admin-email' }).catch(() => {})">
                        <feather-icon icon="MailIcon" svgClasses="w-4 h-4" />
                        <span class="ml-2">Inbox</span>
                    </li>

                    <li class="flex py-2 px-4 cursor-pointer hover:bg-primary hover:text-white"
                        @click="$router.push({ name: 'admin-todo' }).catch(() => {})">
                        <feather-icon icon="CheckSquareIcon" svgClasses="w-4 h-4" />
                        <span class="ml-2">Tasks</span>
                    </li>

                    <li class="flex py-2 px-4 cursor-pointer hover:bg-primary hover:text-white"
                        @click="$router.push({ name: 'admin-chat' }).catch(() => {})">
                        <feather-icon icon="MessageSquareIcon" svgClasses="w-4 h-4" />
                        <span class="ml-2">Chat</span>
                    </li>

                    <li class="flex py-2 px-4 cursor-pointer hover:bg-primary hover:text-white"
                        @click="$router.push({ name: 'admin-ecommerce-wish-list' }).catch(() => {})">
                        <feather-icon icon="HeartIcon" svgClasses="w-4 h-4" />
                        <span class="ml-2">Wish List</span>
                    </li>

                    <vs-divider class="m-1" />

                    <li class="flex py-2 px-4 cursor-pointer hover:bg-primary hover:text-white" @click="logout()">
                        <feather-icon icon="LogOutIcon" svgClasses="w-4 h-4" />
                        <span class="ml-2">Logout</span>
                    </li>
                </ul>
            </vs-dropdown-menu>
        </vs-dropdown>
    </div>
</template>

<script>
    // import firebase from 'firebase/app'
    // import 'firebase/auth'
    import airlock from '../../../../http/requests/auth/airlock/index.js'
    import jwt from '../../../../http/requests/auth/jwt/index.js'

    export default {
        data() {
            return {

            }
        },
        computed: {
            activeUserInfo() {
                return this.$store.state.AppActiveUser
            }
        },
        methods: {
            logout() {
                this.$store.dispatch('auth/logoutJWT').then((response) => {
                    if (response.data.message == "successfully_logged") {
                        if (window.localStorage.getItem("accessToken")) {

                            this.$vs.loading.close()
                            this.$vs.notify({
                                title: 'Success',
                                text: response.data.message,
                                iconPack: 'feather',
                                icon: 'icon-alert-circle',
                                color: 'success'
                            });

                            // Set bearer token in axios
                            this.$store.commit('auth/SET_BEARER', "");

                            // Update user details
                            this.$store.commit('UPDATE_USER_INFO', {}, {
                                root: true
                            })

                            // Remove AccessToken from LocaleStorage
                            window.localStorage.removeItem('accessToken');

                            // Remove UserInfo from LocaleStorage
                            window.localStorage.removeItem('userInfo');

                            // this.emit(loginEvent, { loggedIn: false });
                            // this.$acl.change('admin')

                            this.$router.push({ name: 'admin-page-login' }).catch(() => {})
                        }
                    } else {
                        this.$vs.loading.close();
                        this.$vs.notify({
                            title: 'Error',
                            text: 'Error',
                            iconPack: 'feather',
                            icon: 'icon-alert-circle',
                            color: 'danger'
                        })
                    }
                }).catch(error => {
                    this.$vs.loading.close();
                    this.$vs.notify({
                        title: 'Error',
                        text: error.errors,
                        iconPack: 'feather',
                        icon: 'icon-alert-circle',
                        color: 'danger'
                    })
                });

                // If JWT login
                // if (localStorage.getItem("accessToken")) {
                //     localStorage.removeItem("accessToken")
                //     this.$router.push('/admin/pages/login').catch(() => {})
                // }

                // // Change role on logout. Same value as initialRole of acj.js
                // this.$acl.change('admin')
                // localStorage.removeItem('userInfo')

                // This is just for demo Purpose. If user clicks on logout -> redirect
                // this.$router.push('/admin/pages/login');    // .catch(() => {})
                // this.$router.push({ name: 'admin-page-login' });    // .catch(() => {})
            },

            // logout() {

            //     // if user is logged in via auth0
            //     if (this.$auth.profile) this.$auth.logOut();


            //     // if user is logged in via firebase
            //     const firebaseCurrentUser = firebase.auth().currentUser

            //     if (firebaseCurrentUser) {
            //         firebase.auth().signOut().then(() => {
            //             this.$router.push('/pages/login').catch(() => {})
            //         })
            //     }
            //     // If JWT login
            //     if (localStorage.getItem("accessToken")) {
            //         localStorage.removeItem("accessToken")
            //         this.$router.push('/pages/login').catch(() => {})
            //     }

            //     // Change role on logout. Same value as initialRole of acj.js
            //     this.$acl.change('admin')
            //     localStorage.removeItem('userInfo')

            //     // This is just for demo Purpose. If user clicks on logout -> redirect
            //     this.$router.push('/pages/login').catch(() => {})
            // },
        }
    }

</script>
