<template>
    <!--Middle Part Start-->
    <form v-on:submit.prevent="changePassword($event)">
        <div class="row">
            <div id="center" class="col-sm-6">
                <fieldset>
                    <legend>Change Password</legend>
                    <div class="form-group required">
                        <label for="input-password" class="control-label">Old Password</label>
                        <input type="password" class="form-control" placeholder="Old Password" v-model="form.old_password"
                            name="old-password">
                    </div>
                    <div class="form-group required">
                        <label for="input-password" class="control-label">New Password</label>
                        <input type="password" class="form-control" placeholder="New Password" v-model="form.password"
                            name="new-password">
                    </div>
                    <div class="form-group required">
                        <label for="input-confirm" class="control-label">New Password Confirm</label>
                        <input type="password" class="form-control" id="input-confirm"
                            placeholder="New Password Confirm" v-model="form.confirm_password" name="new-confirm">
                    </div>
                </fieldset>
                <!-- <fieldset>
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
                </fieldset> -->
            </div>
        </div>

        <div class="buttons clearfix">
            <div class="pull-right">
                <input type="submit" class="btn btn-md btn-primary" value="Save Changes">
            </div>
        </div>
    </form>
    <!--Middle Part End-->
</template>

<script>
    export default {
        data: function() {
            return {
                userInfo:   null,
                form:  {
                    old_password        : null,
                    password            : null,
                    confirm_password    : null,
                },
            }
        },
        methods: {
            async changePassword(event) {
                await this.$store.dispatch('cabinet/ACTION_CHANGE_PASSWORD', this.form);

                // Clear forms
                setTimeout(() => {
                    this.form.old_password      = null;
                    this.form.password          = null;
                    this.form.confirm_password  = null;
                }, 1000);
            }
        },
    }
</script>

<style lang="css" scoped>
    #center {
        margin: 0 auto;
    }
</style>