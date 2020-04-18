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
        <vs-input v-validate="'required|alpha_dash|min:3'" data-vv-validate-on="blur" label-placeholder="Name"
            name="displayName" placeholder="Name" v-model="displayName" class="w-full" />
        <span class="text-danger text-sm">{{ errors.first('displayName') }}</span>

        <!-- Last Name -->
        <vs-input v-validate="'required|alpha_dash|min:3'" data-vv-validate-on="blur" label-placeholder="Last name"
            name="displayLastName" placeholder="Last name" v-model="displayLastName" class="w-full" />
        <span class="text-danger text-sm">{{ errors.first('displayLastName') }}</span>

        <!-- Email -->
        <vs-input v-validate="'required|email'" data-vv-validate-on="blur" name="email" type="email"
            label-placeholder="Email" placeholder="Email" v-model="email" class="w-full mt-6" />
        <span class="text-danger text-sm">{{ errors.first('email') }}</span>

        <!-- Phone -->
        <vs-input v-validate="'required|numeric|length:6'" data-vv-validate-on="blur" name="phone" type="phone"
            label-placeholder="Phone" placeholder="Phone" v-model="phone" class="w-full mt-6" />
        <span class="text-danger text-sm">{{ errors.first('phone') }}</span>

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

        <!-- Fax 
        <vs-input v-validate="'required|alpha_dash|min:3'" data-vv-validate-on="blur" label-placeholder="Fax"
            name="fax" placeholder="Fax" v-model="fax" class="w-full" />
        <span class="text-danger text-sm">{{ errors.first('fax') }}</span> -->

        <!-- Country -->
        <div class="row mt-6">
            <v-select v-validate="'required|numeric'" data-vv-validate-on="blur" label="slug"
                name="country_id" placeholder="Country" v-model="country_id" :options="countriesComp"
                label-placeholder="Country" :dir="$vs.rtl ? 'rtl' : 'ltr'" class="w-full" />
            <span class="text-danger text-sm">{{ errors.first('country_id') }}</span>
        </div>

        <!-- Gender -->
        <div class="row mt-6">
            <vs-radio v-model="gender" vs-value="male">Male</vs-radio>
            <vs-radio v-model="gender" vs-value="female">Female</vs-radio>
            <vs-radio disabled="true" v-model="gender" vs-value="other">Other</vs-radio>
        </div>

        <!-- Accept terms -->
        <vs-checkbox v-model="isTermsConditionAccepted" class="mt-6">I accept the terms & conditions.</vs-checkbox>

        <vs-button type="border" :to="{ name: 'admin-page-login' }" class="mt-6">Login</vs-button>
        <vs-button class="float-right mt-6" @click="registerUserAirlock()" :disabled="!validateForm">Register</vs-button>
    </div>
</template>

<script>

    import vSelect from 'vue-select'

    export default {
        data() {
            return {
                countries               : null,
                displayName             : '',
                displayLastName         : '',
                email                   : '',
                phone                   : '',
                password                : '',
                confirm_password        : '',
                // fax                     : '',
                country_id              : '',
                gender                  : 'other',
                isTermsConditionAccepted: true
            }
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
            registerUserAirlock() {
                // If form is not validated or user is already login return
                if (!this.validateForm || !this.checkLogin()) return

                const payload = {
                    userDetails: {
                        name                    : this.displayName,
                        last_name               : this.displayLastName,
                        email                   : this.email,
                        phone                   : this.phone,
                        password                : this.password,
                        password_confirmation   : this.confirm_password,
                        country_id              : this.country_id.id,
                        gender                  : this.gender,
                        fax                     : this.fax,
                    },
                    notify: this.$vs.notify
                }

                console.log("User: ", payload);
                this.$store.dispatch('auth/registerUserAirlock', payload)
            },
        },
        computed: {
            validateForm() {
                return !this.errors.any()   && this.displayName != '' && this.email != '' 
                                            && this.password != ''  && this.confirm_password != '' 
                                            && this.isTermsConditionAccepted === true && this.country_id != '';
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
