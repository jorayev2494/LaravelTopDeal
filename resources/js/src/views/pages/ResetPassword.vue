<!-- =========================================================================================
    File Name: ResetPassword.vue
    Description: Reset Password Page
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
      Author: Pixinvent
    Author URL: http://www.themeforest.net/user/pixinvent
========================================================================================== -->


<template>
    <div class="h-screen flex w-full bg-img">
        <div class="vx-col sm:w-3/5 md:w-3/5 lg:w-3/4 xl:w-3/5 mx-auto self-center">
            <vx-card>
                <div slot="no-body" class="full-page-bg-color">
                    <div class="vx-row">
                        <div class="vx-col hidden sm:hidden md:hidden lg:block lg:w-1/2 mx-auto self-center">
                            <img src="@assets/images/pages/reset-password.png" alt="login" class="mx-auto">
                        </div>
                        <div class="vx-col sm:w-full md:w-full lg:w-1/2 mx-auto self-center  d-theme-dark-bg">
                            <div class="p-8">
                                <div class="vx-card__title mb-8">
                                    <h4 class="mb-4">Reset Password</h4>
                                    <p>Please enter your new password.</p>
                                </div>
                                <vs-input type="email" label-placeholder="Email" v-model="email" class="w-full mb-6" />
                                <vs-input type="password" label-placeholder="Password" v-model="password" class="w-full mb-6" />
                                <vs-input type="password" label-placeholder="Confirm Password" v-model="password_confirmation" class="w-full mb-8" />

                                <div class="flex flex-wrap justify-between flex-col-reverse sm:flex-row">
                                    <vs-button type="border" :to="{ name: 'admin-page-login' }" class="w-full sm:w-auto mb-8 sm:mb-auto mt-3 sm:mt-auto">Go Back To Login</vs-button>
                                    <vs-button class="w-full sm:w-auto" v-on:click="reset()">Reset</vs-button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </vx-card>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            tkn                     : '',
            email                   : '',
            password                : '',
            password_confirmation   : '',
        }
    },
    methods: {
        reset() {
            this.$store.dispatch('auth/changePasswordJWT', { 
                tkn                     : this.tkn,
                email                   : this.email,
                password                : this.password,
                password_confirmation   : this.password_confirmation
            })
        }
    },
    mounted() {
        var queryString = window.location.search;
        this.tkn = (new URLSearchParams(queryString)).get("tkn");
    }
}
</script>
