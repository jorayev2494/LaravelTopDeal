<template>
    <div>
        <vs-input v-validate="'required|email|min:3'" data-vv-validate-on="blur" name="email" icon-no-border
            icon="icon icon-user" icon-pack="feather" label-placeholder="Email" v-model="email" class="w-full" />
        <span class="text-danger text-sm">{{ errors.first('email') }}</span>

        <vs-input data-vv-validate-on="blur" v-validate="'required|min:6|max:10'" type="password" name="password"
            icon-no-border icon="icon icon-lock" icon-pack="feather" label-placeholder="Password" v-model="password"
            class="w-full mt-6" />
        <span class="text-danger text-sm">{{ errors.first('password') }}</span>

        <div class="flex flex-wrap justify-between my-5">
            <vs-checkbox v-model="checkbox_remember_me" class="mb-3">Remember Me</vs-checkbox>
            <router-link :to="{ name: 'admin-page-forgot-password' }">Forgot Password?</router-link>
        </div>
        <div class="flex flex-wrap justify-between mb-3">
            <vs-button type="border" @click="registerUser">Register</vs-button>
            <vs-button :disabled="!validateForm" @click="login()">Login</vs-button>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                email: 'admin@mail.com',
                password: 'laravel',
                checkbox_remember_me: false
            }
        },
        computed: {
            validateForm() {
                return !this.errors.any() && this.email != '' && this.password != '';
            },
        },
        methods: {
            checkLogin() {
                // If user is already logged in notify
                if (this.$store.state.auth.isUserLoggedIn()) {

                    // Close animation if passed as payload
                    // this.$vs.loading.close()

                    this.$vs.notify({
                        title: 'Login Attempt',
                        text: 'You are already logged in!',
                        iconPack: 'feather',
                        icon: 'icon-alert-circle',
                        color: 'warning'
                    })

                    return false
                }
                return true
            },
            login() {

                if (!this.checkLogin()) return

                // Loading
                this.$vs.loading()

                const payload = {
                    checkbox_remember_me: this.checkbox_remember_me,
                    userDetails: {
                        email: this.email,
                        password: this.password
                    }
                }

                this.$store.dispatch('auth/loginJWT', payload).then((response) => {
                    if (response.data.status == 200) {
                        this.$router.push(this.$router.currentRoute.query.to || { name: 'admin-dashboard-analytics' });
                    
                        // Navigate User to homepage
                        // this.$router.push(router.currentRoute.query.to || { name: 'admin' });

                        // Set bearer token in axios
                        // this.$store.commit("auth/SET_BEARER", response.data.data.accessToken);
                        this.$store.commit('auth/SET_BEARER', response.data.data.accessToken);

                        // Set accessToken
                        localStorage.setItem("accessToken", response.data.data.accessToken);

                        // Update user details
                        this.$store.commit('UPDATE_USER_INFO', response.data.data.authData, {
                            root: true
                        });

                        this.$vs.loading.close();

                        this.$vs.notify({
                            title: 'Success',
                            text: response.data.data.message,
                            iconPack: 'feather',
                            icon: 'icon-alert-circle',
                            color: 'success'
                        });

                        // Navigate User to homepage
                        // this.$router.push(router.currentRoute.query.to || '/' );
                        // this.$router.push(this.$router.currentRoute.query.to || { name: 'admin-dashboard-analytics' })
                        // this.$router.push({ name: 'admin' });
                    } else {
                        this.$vs.loading.close()
                        this.$vs.notify({
                            title: 'Error',
                            text: response.data.errors,
                            iconPack: 'feather',
                            icon: 'icon-alert-circle',
                            color: 'danger'
                        })
                    }
                })
                .catch(error => {
                    this.$vs.loading.close()
                    this.$vs.notify({
                        title: 'Error',
                        text: error.message,
                        iconPack: 'feather',
                        icon: 'icon-alert-circle',
                        color: 'danger'
                    })
                })
            },
            registerUser() {
                if (!this.checkLogin()) return;
                this.$router.push({ name: 'admin-page-register' }).catch(() => {});
            }
        }
    }

</script>
