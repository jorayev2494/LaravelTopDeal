<template>
    <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i></a></li>
            <li><a href="#">Account</a></li>
            <li><a href="#">My Account</a></li>
        </ul>

        <div class="row">
            <!--Middle Part Start-->
            <div class="col-md-9" id="content">
                <h2 class="title">My Account</h2>
                <p v-if="hasFullNameComp" class="lead">Hello, <strong>{{ userInfo.first_name }} {{ userInfo.last_name }}!</strong> - To update your account information.</p>
                <form>
                    <div class="row">
                        <div class="col-sm-6">
                            <fieldset id="personal-details">
                                <legend>Personal Details</legend>
                                <div class="form-group required">
                                    <label for="input-firstname" class="control-label">First Name</label>
                                    <input type="text" class="form-control" v-model="userInfo.first_name" id="input-firstname" placeholder="First Name" name="firstname">
                                </div>
                                <div class="form-group required">
                                    <label for="input-lastname" class="control-label">Last Name</label>
                                    <input type="text" class="form-control" v-model="userInfo.last_name" id="input-lastname" placeholder="Last Name" name="lastname">
                                </div>
                                <div class="form-group required">
                                    <label for="input-email" class="control-label">E-Mail</label>
                                    <input type="email" class="form-control" v-model="userInfo.email" id="input-email" placeholder="E-Mail" name="email">
                                </div>
                                <div class="form-group required">
                                    <label for="input-telephone" class="control-label">Telephone</label>
                                    <input type="tel" class="form-control" v-model="userInfo.phone" id="input-telephone" placeholder="Telephone" name="telephone">
                                </div>
                                <div class="form-group">
                                    <label for="input-fax" class="control-label">Fax</label>
                                    <input type="text" class="form-control"  v-model="userInfo.fax" id="input-fax" placeholder="Fax" name="fax">
                                </div>
                            </fieldset>
                            <br>
                        </div>
                        <div class="col-sm-6">
                            <fieldset>
                                <legend>Change Password</legend>
                                <div class="form-group required">
                                    <label for="input-password" class="control-label">Old Password</label>
                                    <input type="password" class="form-control" placeholder="Old Password" value=""
                                        name="old-password">
                                </div>
                                <div class="form-group required">
                                    <label for="input-password" class="control-label">New Password</label>
                                    <input type="password" class="form-control" placeholder="New Password" value=""
                                        name="new-password">
                                </div>
                                <div class="form-group required">
                                    <label for="input-confirm" class="control-label">New Password Confirm</label>
                                    <input type="password" class="form-control" id="input-confirm"
                                        placeholder="New Password Confirm" value="" name="new-confirm">
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Newsletter</legend>
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-3 col-xs-3 control-label">Subscribe</label>
                                    <div class="col-md-10 col-sm-9 col-xs-9">
                                        <label class="radio-inline">
                                            <input type="radio" value="1" name="newsletter"> Yes
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" checked="checked" value="0" name="newsletter"> No
                                        </label>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <fieldset id="address">
                                <legend>Payment Address</legend>
                                <div class="form-group">
                                    <label for="input-company" class="control-label">Company</label>

                                    <input type="text" class="form-control" placeholder="Company" value=""
                                        name="company">

                                </div>
                                <div class="form-group required">
                                    <label for="input-address-1" class="control-label">Address 1</label>
                                    <input type="text" class="form-control" placeholder="Address 1" value=""
                                        name="address_1">
                                </div>
                                <div class="form-group required">
                                    <label for="input-city" class="control-label">City</label>
                                    <input type="text" class="form-control" placeholder="City" value="" name="city">
                                </div>
                                <div class="form-group required">
                                    <label for="input-postcode" class="control-label">Post Code</label>
                                    <input type="text" class="form-control" placeholder="Post Code" value=""
                                        name="postcode">
                                </div>
                                <div class="form-group required">
                                    <label for="input-country" class="control-label">Country</label>
                                    <select class="form-control" name="country_id">
                                        <option value=""> --- Please Select --- </option>
                                        <option v-for="(country, index) in countries" :key="index" :value="country.id">{{ country.slug }}</option>
                                    </select>
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
                        <div class="col-sm-6">
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
                                <!-- <div class="form-group required">
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
                                </div> -->
                            </fieldset>
                        </div>
                    </div>

                    <div class="buttons clearfix">
                        <div class="pull-right">
                            <input type="submit" class="btn btn-md btn-primary" value="Save Changes">
                        </div>
                    </div>
                </form>
            </div>
            <!--Middle Part End-->
            <!--Right Part Start -->
            <aside class="col-md-3 col-sm-4 col-xs-12 content-aside right_column sidebar-offcanvas">
                <span id="close-sidebar" class="fa fa-times"></span>
                <div class="module">
                    <h3 class="modtitle">
                        <span>My Account </span>
                    </h3>
                    <div class="module-content custom-border">
                        <ul class="list-box">

                            <li><a href="login.html">Login </a> / <a href="register.html">Register </a></li>
                            <li><a href="#">Forgotten Password </a></li>

                            <li><a href="#">My Account </a></li>

                            <li><a href="#">Address Book </a></li>
                            <li><a href="wishlist.html">Wish List </a></li>
                            <li><a href="#">Order History </a></li>
                            <li><a href="#">Downloads </a></li>
                            <li><a href="#">Recurring payments </a></li>
                            <li><a href="#">Reward Points </a></li>
                            <li><a href="#">Returns </a></li>
                            <li><a href="#">Transactions </a></li>
                            <li><a href="#">Newsletter </a></li>

                        </ul>
                    </div>
                </div>
            </aside>
            <!--Right Part End -->
        </div>
    </div>
</template>

<script>

    import { mapState, mapGetters } from 'vuex'

    export default {
        data: function() {
            return {
                userInfo:   null,
                countries:  {},
            }
        },
        computed: {
            hasFullNameComp() {
                return this.userInfo.first_name || this.userInfo.last_name;
            },
        },
        async created() {
            this.userInfo = JSON.parse(window.localStorage.getItem('userInfo'));
            this.countries = await this.$store.dispatch('country/ACTION_LOAD_COUNTRIES');
        },
        mounted() {
            // this.countries = this.$store.getters['country/GET_COUNTRIES']; 
        }
    }
</script>

<style lang="scss" scoped>

</style>