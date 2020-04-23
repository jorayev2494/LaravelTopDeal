<template>
    <div class="container">
        <div class="row">

            <ul class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i></a></li>
                <li><a href="#">Account</a></li>
                <li><a href="#">Login</a></li>
            </ul>

            <div id="content" class="col-md-12">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="well ">
                            <h2>New Customer</h2>
                            
                            <p>
                                <strong>
                                    <router-link :to="{ name: 'register' }">Register Account</router-link>
                                </strong>
                            </p>
                            <p>
                                By creating an account you will be able to shop faster, be up to date on an order's
                                status, and keep track of the orders you have previously made.
                            </p>
                            <router-link :to="{ name: 'register' }" class="btn btn-primary">Continue</router-link>
                        </div>
                    </div>
                    <div class="col-sm-6">

                        <div class="well col-sm-12">

                            <h2>Returning Customer</h2>
                            <p>
                                <strong>I am a returning customer</strong>
                            </p>
                            <form method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="control-label" for="input-email">E-Mail Address</label>
                                    <input type="text" name="email" v-model="form.email" placeholder="E-Mail Address" id="input-email" class="form-control">
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label" for="input-password">Password</label>
                                    <input type="password" name="password" v-model="form.password" placeholder="Password" id="input-password" class="form-control">
                                    <router-link :to="{ name: 'forgot-password' }">Forgotten Password</router-link>
                                </div>

                                <input type="submit" v-on:click.prevent="login()" value="Login" class="btn btn-primary pull-left">
                            </form>
                            <column id="column-login" class="col-sm-8 pull-right">
                                <div class="row">
                                    <div class="social_login pull-right" id="so_sociallogin">
                                        <a href="#" class="btn btn-social-icon btn-sm btn-facebook">
                                            <i class="fa fa-facebook fa-fw" aria-hidden="true"></i>
                                        </a>
                                        <a href="#" class="btn btn-social-icon btn-sm btn-twitter">
                                            <i class="fa fa-twitter fa-fw" aria-hidden="true"></i>
                                        </a>
                                        <a href="#" class="btn btn-social-icon btn-sm btn-google-plus">
                                            <i class="fa fa-google fa-fw" aria-hidden="true"></i>
                                        </a>
                                        <a href="#" class="btn btn-social-icon btn-sm btn-linkdin">
                                            <i class="fa fa-linkedin fa-fw" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </column>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    // name: "LoginComponent",
    export default {
        data() {
            return {
                form: {
                    email:      'user1@mail.com',
                    password:   'laravel',
                }
            }
        },
        methods: {
            async login() {
                this.$store.dispatch('auth/USER_LOGIN', this.form);
            }
        },
    }

</script>

<style scoped>

</style>
