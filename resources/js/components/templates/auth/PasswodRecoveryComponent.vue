<template>
    <div class="container">
        <div class="row">

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
                    <a href="#">Login</a>
                </li>
            </ul>

            <div id="content" class="col-md-12">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="well col-sm-12">

                            <h2>Returning Customer</h2>
                            <p><strong>I am a returning customer</strong></p>
                            <form method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="control-label" for="input-email">E-Mail Address</label>
                                    <input type="text" name="email" v-model="form.email" placeholder="E-Mail Address" id="input-email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="input-password">Password</label>
                                    <input type="password" name="password" v-model="form.password" placeholder="Password" id="input-password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="input-password">Password Confirm</label>
                                    <input type="password" name="password_confirmation" v-model="form.password_confirmation" placeholder="Password Confirm" id="input-password-confirm" class="form-control">
                                </div>
                                <input type="submit" v-on:click.prevent="sendResetLink()" value="Send Link" class="btn btn-primary pull-left">
                            </form>
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
                    tkn:                    null,
                    email:                  'user@mail.com',
                    password: 				'laravel',
					password_confirmation: 	'laravel',
                }
            }
        },
        methods: {
            async sendResetLink() {
                this.$store.dispatch('auth/USER_CHANGE_PASSWORD', this.form);
            }
        },
        mounted() {
            var queryString = window.location.search;
            this.form.tkn = (new URLSearchParams(queryString)).get("tkn");
        }
    }

</script>

<style scoped>

</style>
