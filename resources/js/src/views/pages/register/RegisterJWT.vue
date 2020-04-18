<!-- =========================================================================================
File Name: RegisterJWT.vue
Description: Register Page for JWT
----------------------------------------------------------------------------------------
Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
Author URL: http://www.themeforest.net/user/pixinvent
========================================================================================== -->


<template>
    <div class="clearfix">
    <!-- Name -->
        <vs-input v-validate="'required|alpha_dash|min:3'" data-vv-validate-on="blur" label-placeholder="First name"
            name="first_name" placeholder="Name" v-model="first_name" class="w-full" />
        <span class="text-danger text-sm">{{ errors.first('first_name') }}</span>

        <!-- Last Name -->
        <vs-input v-validate="'required|alpha_dash|min:3'" data-vv-validate-on="blur" label-placeholder="Last name"
            name="last_name" placeholder="Name" v-model="last_name" class="w-full" />
        <span class="text-danger text-sm">{{ errors.first('last_name') }}</span>

        <!-- Email -->
        <vs-input v-validate="'required|email'" data-vv-validate-on="blur" name="email" type="email"
            label-placeholder="Email" placeholder="Email" v-model="email" class="w-full mt-6" />
        <span class="text-danger text-sm">{{ errors.first('email') }}</span>

        <!-- Password -->
        <vs-input ref="password" type="password" data-vv-validate-on="blur" v-validate="'required|min:6|max:10'"
            name="password" label-placeholder="Password" placeholder="Password" v-model="password"
            class="w-full mt-6" />
        <span class="text-danger text-sm">{{ errors.first('password') }}</span>

        <!-- Confirm Password -->
        <vs-input type="password" v-validate="'min:6|max:10|confirmed:password'" data-vv-validate-on="blur"
            data-vv-as="password" name="confirm_password" label-placeholder="Confirm Password"
            placeholder="Confirm Password" v-model="confirm_password" class="w-full mt-6" />
        <span class="text-danger text-sm">{{ errors.first('confirm_password') }}</span>

        <!-- Fax -->
        <!-- <vs-input v-validate="'required|alpha_dash|min:3'" data-vv-validate-on="blur" label-placeholder="Fax"
            name="fax" placeholder="Fax" v-model="fax" class="w-full" />
        <span class="text-danger text-sm">{{ errors.first('fax') }}</span> -->

        <!-- Country -->
        <div class="row mt-6">
            <v-select v-validate="'required|numeric'" data-vv-validate-on="blur" label="slug"
                name="country" placeholder="Country" v-model="country" :options="countriesComp"
                label-placeholder="Country" :dir="$vs.rtl ? 'rtl' : 'ltr'" class="w-full" />
            <span class="text-danger text-sm">{{ errors.first('country') }}</span>
        </div>

        <!-- Gender -->
        <div class="row mt-6">
            <vs-radio v-model="gender" vs-value="male">Male</vs-radio>
            <vs-radio v-model="gender" vs-value="female">Female</vs-radio>
            <vs-radio disabled="true" v-model="gender" vs-value="other">Other</vs-radio>
        </div>

        <vs-checkbox v-model="isTermsConditionAccepted" class="mt-6">I accept the terms & conditions.</vs-checkbox>
        <vs-button type="border" :to="{ name: 'admin-page-login' }" class="mt-6">Login</vs-button>
        <vs-button class="float-right mt-6" @click="registerUserJWt" :disabled="!validateForm">Register</vs-button>
    </div>
</template>

<script>

    import vSelect from 'vue-select'

    export default {
        data() {
            return {
                // countries                   : null,
                first_name                  :   'Admin',
                last_name                   :   'Adminov',
                email                       :   'amdin1@mail.com',
                password                    :   'laravel',
                confirm_password            :   'laravel',
                // fax                         :   '',
                country                     :   '',
                gender                      :   'male',
                isTermsConditionAccepted    :   true
            }
        },
        methods: {
            checkLogin() {
                // If user is already logged in notify
                if (this.$store.state.auth.isUserLoggedIn()) {

                    // Close animation if passed as payload
                    this.$vs.loading.close()

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
            registerUserJWt() {
                // If form is not validated or user is already login return
                if (!this.validateForm || !this.checkLogin()) return

                const payload = {
                    userDetails: {
                        first_name      : this.first_name,
                        last_name       : this.last_name,
                        email           : this.email,
                        password        : this.password,
                        confirmPassword : this.confirm_password,
                        country_id      : this.country.id,
                        gender          : this.gender
                    },
                    notify: this.$vs.notify
                }

                // Check confirm password
                if (payload.userDetails.password !== payload.userDetails.confirmPassword) {
                    this.$vs.notify({
                        title: 'Error',
                        text: "Password doesn't match. Please try again.",
                        iconPack: 'feather',
                        icon: 'icon-alert-circle',
                        color: 'danger'
                    })
                }

                this.$store.dispatch('auth/registerUserJWT', payload).then(response => {
                    if (response.data.status == 201) {
                        
                        this.$vs.notify({
                            title: 'Success',
                            text: response.data.message,
                            iconPack: 'feather',
                            icon: 'icon-alert-circle',
                            color: 'success'
                        });

                        // Update data in localStorage
                        // localStorage.setItem("accessToken", response.data.accessToken)
                        // commit('UPDATE_USER_INFO', response.data.userData, { root: true })

                        // Redirect User
                        this.$router.push({ name: 'admin-page-login' });
                    } else {
                        this.$vs.notify({
                            title: 'Eorror',
                            text: 'Error datas!',
                            iconPack: 'feather',
                            icon: 'icon-alert-circle',
                            color: 'success'
                        });
                    }
                }).catch(error => { });
            }
        },
        computed: {
            validateForm() {
                return !this.errors.any() && (this.first_name != '' && this.first_name != '') 
                                            && this.email != '' && this.password != '' 
                                            && this.confirm_password != '' && this.isTermsConditionAccepted === true 
                                            && this.country != '';
            },
            countriesComp() {
                return this.$store.getters["country/GET_COUNTRIES"];
            },
        },
        components: {
            'v-select': vSelect,
        },
        created() {
            this.$store.dispatch('country/fetchCountries');
        },
    }

</script>
