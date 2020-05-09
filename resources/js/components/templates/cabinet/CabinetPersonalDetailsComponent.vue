<template>
    <form v-on:submit.prevent="personalUpdate()">
        <div class="row">
            <div class="col-sm-6">
                <fieldset id="personal-details">
                    <legend>Personal Details</legend>
                    <div class="form-group required">
                        <label for="input-firstname" class="control-label">First Name</label>
                        <input type="text" class="form-control" v-model="userInfo.first_name" id="input-firstname" placeholder="First Name" name="firstname" required>
                    </div>
                    <div class="form-group required">
                        <label for="input-lastname" class="control-label">Last Name</label>
                        <input type="text" class="form-control" v-model="userInfo.last_name" id="input-lastname" placeholder="Last Name" name="lastname" required>
                    </div>
                    <div class="form-group required">
                        <label for="input-email" class="control-label">E-Mail</label>
                        <input type="email" class="form-control" v-model="userInfo.email" readonly id="input-email" placeholder="E-Mail" name="email" required>
                    </div>
                    <div class="form-group required">
                        <label for="input-telephone" class="control-label">Telephone</label>
                        <input type="tel" class="form-control" v-model="userInfo.phone" id="input-telephone" placeholder="Telephone" name="telephone" required>
                    </div>
                    <div class="form-group">
                        <label for="input-company" class="control-label">Company</label>
                        <input type="text" class="form-control" placeholder="Company" v-model="userInfo.company" name="company">
                    </div>
                    <div class="form-group">
                        <label for="input-fax" class="control-label">Fax</label>
                        <input type="text" class="form-control"  v-model="userInfo.fax" id="input-fax" placeholder="Fax" name="fax">
                    </div>
                </fieldset>
                <br>
            </div>
            <div class="col-sm-6">
                <fieldset id="address">
                    <legend>Payment Address</legend>
                    <div class="form-group required">
                        <label for="input-country" class="control-label">Country: {{ countryComp.slug}}</label>
                        <select class="form-control" v-model="countryComp">
                            <option value=""> --- Please Select --- </option>
                            <option v-for="(country, index) in countries" :key="index" :value="country">{{ country.slug }}</option>
                        </select>
                    </div>
                    <div class="form-group required">
                        <label for="input-city" class="control-label">City</label>
                        <input type="text" class="form-control" placeholder="City" v-model="userInfo.location.city" name="city" required>
                    </div>
                    <div class="form-group required">
                        <label for="input-city" class="control-label">State</label>
                        <input type="text" class="form-control" placeholder="City" v-model="userInfo.location.state" name="state" required>
                    </div>
                    <div class="form-group required">
                        <label for="input-postcode" class="control-label">Post Code</label>
                        <input type="text" class="form-control" placeholder="Post Code" v-model="userInfo.location.post_code" name="post_code" required>
                    </div>
                    <div class="form-group required">
                        <label for="input-address-1" class="control-label">Address 1</label>
                        <input type="text" class="form-control" placeholder="Address 1" v-model="userInfo.location.add_line_1" name="add_line_1" required>
                    </div>
                    <div class="form-group required">
                        <label for="input-address-1" class="control-label">Address 2</label>
                        <input type="text" class="form-control" placeholder="Address 2" v-model="userInfo.location.add_line_2" name="add_line_2" required>
                    </div>
                    

                    <!-- <div class="form-group required">
                        <label for="input-zone" class="control-label">Region / State</label>
                        <select class="form-control" name="zone_id">
                            <option value=""> --- Please Select --- </option>
                            <option value="3513">Aberdeen</option>
                            <option value="3514">Aberdeenshire</option>
                            <option value="3515">Anglesey</option>
                            <option value="3516">Angus</option>
                            <option value="3517">Argyll and Bute</option>
                            <option value="3518">Bedfordshire</option>
                            <option value="3519">Berkshire</option>

                        </select>
                    </div> -->
                    
                </fieldset>
            </div>
        </div>

        <!-- <div class="row"> -->
            <!-- <div class="col-sm-6">
                <fieldset id="address">
                    <legend>Payment Address</legend>
                    <div class="form-group">
                        <label for="input-company" class="control-label">Company</label>
                        <input type="text" class="form-control" placeholder="Company" v-model="userInfo.location.company" name="company">
                    </div>
                    <div class="form-group required">
                        <label for="input-country" class="control-label">Country</label>
                        <select class="form-control" name="country_id">
                            <option value=""> --- Please Select --- </option>
                            <option v-for="(country, index) in countries" :key="index" :value="country.id" :selected="country.slug == userInfo.country.slug">{{ country.slug }}</option>
                        </select>
                    </div>
                    <div class="form-group required">
                        <label for="input-city" class="control-label">City</label>
                        <input type="text" class="form-control" placeholder="City" v-model="userInfo.location.city" name="city">
                    </div>
                    <div class="form-group required">
                        <label for="input-city" class="control-label">State</label>
                        <input type="text" class="form-control" placeholder="City" v-model="userInfo.location.state" name="state">
                    </div>
                    <div class="form-group required">
                        <label for="input-postcode" class="control-label">Post Code</label>
                        <input type="text" class="form-control" placeholder="Post Code" v-model="userInfo.location.post_code" name="post_code">
                    </div>
                    <div class="form-group required">
                        <label for="input-address-1" class="control-label">Address 1</label>
                        <input type="text" class="form-control" placeholder="Address 1" v-model="userInfo.location.add_line_1" name="add_line_1">
                    </div>
                    <div class="form-group required">
                        <label for="input-address-1" class="control-label">Address 2</label>
                        <input type="text" class="form-control" placeholder="Address 2" v-model="userInfo.location.add_line_2" name="add_line_2">
                    </div>
                    

                    <div class="form-group required">
                        <label for="input-zone" class="control-label">Region / State</label>
                        <select class="form-control" name="zone_id">
                            <option value=""> --- Please Select --- </option>
                            <option value="3513">Aberdeen</option>
                            <option value="3514">Aberdeenshire</option>
                            <option value="3515">Anglesey</option>
                            <option value="3516">Angus</option>
                            <option value="3517">Argyll and Bute</option>
                            <option value="3518">Bedfordshire</option>
                            <option value="3519">Berkshire</option>

                        </select>
                    </div>
                    
                </fieldset>
            </div> -->
            
            <!-- <div class="col-sm-6">
                <fieldset id="shipping-address">
                    <legend>Shipping Address</legend>
                    <div class="form-group">
                        <label for="input-company" class="control-label">Company</label>
                        <input type="text" class="form-control" id="input-company" placeholder="Company"
                            value="" name="company">
                    </div>
                    <div class="form-group required">
                        <label for="input-address-1" class="control-label">Address 1</label>
                        <input type="text" class="form-control" id="input-address-1"
                            placeholder="Address 1" value="" name="address_1">
                    </div>
                    <div class="form-group required">
                        <label for="input-city" class="control-label">City</label>
                        <input type="text" class="form-control" id="input-city" placeholder="City"
                            value="" name="city">
                    </div>
                    <div class="form-group required">
                        <label for="input-postcode" class="control-label">Post Code</label>
                        <input type="text" class="form-control" id="input-postcode"
                            placeholder="Post Code" value="" name="postcode">
                    </div>
                    <div class="form-group required">
                        <label for="input-country" class="control-label">Country</label>
                        <select class="form-control" id="input-country" name="country_id">
                            <option value=""> --- Please Select --- </option>
                            <option v-for="(country, index) in countries" :key="index" :value="country.id">{{ country.slug }}</option>
                        </select>
                    </div>
                    <div class="form-group required">
                        <label for="input-zone" class="control-label">Region / State</label>
                        <select class="form-control" id="input-zone" name="zone_id">
                            <option value=""> --- Please Select --- </option>
                            <option value="3513">Aberdeen</option>
                            <option value="3514">Aberdeenshire</option>
                            <option value="3515">Anglesey</option>
                            <option value="3516">Angus</option>
                            <option value="3517">Argyll and Bute</option>
                            <option value="3518">Bedfordshire</option>
                            <option value="3519">Berkshire</option>

                        </select>
                    </div>
                </fieldset>
            </div>
        </div> -->
        <!-- </div> -->

        <div class="buttons clearfix">
            <div class="pull-right">
                <input type="submit" class="btn btn-md btn-primary" value="Save Changes">
            </div>
        </div>
    </form>
</template>

<script>

    import axios from '../../../http/http.js'

    export default {
        props: {
            userInfo: {
                type: Object,
                required: true,
            }
        },
        data: function() {
            return {
                countries       : null,
                componentName   : 'CabinetPersonalDetailsComponent',
            }
        },
        methods: {
            personalUpdate() {
                axios.put('/api/cabinet/personal', this.userInfo).then((response) => {
                    this.$store.commit('auth/SET_USER_INFO', response.data.data);

                    // Notification
                    window.app.$notify({
                        group: 'cabinet',
                        type: 'success',
                        title: 'Cabinet',
                        text: 'Personal details successfull updated!',
                    });
                }).catch((err) => { });
            }
        },
        computed: {
            countryComp: {
                get() {
                    return this.userInfo.country;
                },
                set(value) {
                    this.userInfo.country = value;
                }
            }
        },
        async created() {
            // this.userInfo = JSON.parse(window.localStorage.getItem('userInfo'));
            await this.$store.dispatch('country/ACTION_LOAD_COUNTRIES');
            this.countries = this.countries == null ? this.$store.getters['country/GET_COUNTRIES'] : this.countries;
            window.console.log("Countries:", this.countries);
        }
    }
</script>

<style lang="scss" scoped>

</style>