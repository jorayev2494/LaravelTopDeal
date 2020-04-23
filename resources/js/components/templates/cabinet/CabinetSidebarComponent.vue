<template>
    <aside class="col-md-2 col-sm-3 col-xs-10 content-aside right_column sidebar-offcanvas">
        <span id="close-sidebar" class="fa fa-times"></span>
        <div class="module">
            <h3 class="modtitle">
                <span>My Account </span>
            </h3>
            <div class="module-content custom-border" style="padding: 10px;">
                <ul class="list-box">

                    <li>
                        <a href="#" @click.prevent="changed('CabinetPersonalDetailsComponent')">My Account </a>
                    </li>
                    <li>
                        <a href="#" @click.prevent="changed('CabinetChangePasswordComponent')">Change Password </a>
                    </li>
                    <!-- <li>
                        <a href="#">Address Book </a>
                    </li> -->
                    <li>
                        <a href="wishlist.html">Wish List </a>
                    </li>
                    <li>
                        <a href="#">Order History </a>
                    </li>
                    <li>
                        <a href="#">Downloads </a>
                    </li>
                    <li>
                        <a href="#">Recurring payments </a>
                    </li>
                    <li>
                        <a href="#">Reward Points </a>
                    </li>
                    <li>
                        <a href="#">Returns </a>
                    </li>
                    <li>
                        <a href="#">Transactions </a>
                    </li>
                    <li>
                        <a href="#">Newsletter </a>
                    </li>

                </ul>
            </div>
        </div>
    </aside>
</template>

<script>
    export default {
        methods: {
            changed(changedName) {
                this.$emit('changedSidebar', changedName);
            }
        }
    }
</script>

<style scoped>
    /*INFOMATION*/
    .sidebar-offcanvas > .module-content {
        background: #fff;
        padding: 0 20px;
    }

    .sidebar-offcanvas > .module-content > .list-box li {
        position: relative;
        padding-left: 15px;
    }

    .sidebar-offcanvas > .module-content > .list-box li:before {
        position: absolute;
        display: block;
        top: 18px;
        background: #999;
        content: "";
        width: 6px;
        height: 6px;
        border-radius: 100%;
        left: 0;
    }
   .sidebar-offcanvas > .module-content > .list-box li {
        position: relative;
        padding-left: 15px;
    }
    .list-box > li {
        border-bottom: 1px solid #ececec;
        font-size: 14px;
    }
</style>