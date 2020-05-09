<!-- =========================================================================================
  File Name: UserEditTabInformation.vue
  Description: User Edit Information Tab content
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
========================================================================================== -->

<template>
    <div id="user-edit-tab-info">

        <!-- Avatar Row -->
        <div class="vx-row">
            <div class="vx-col w-full">
                <div class="flex items-start flex-col sm:flex-row">
                    <!-- <img :src="data_local.avatar" class="mr-8 rounded h-24 w-24" /> -->
                    <vs-avatar :src="data_local.avatar" size="80px" class="mr-4" />
                    <div>
                        <p class="text-lg font-medium mb-2 mt-4 sm:mt-0">{{ data_local.first_name  }}</p>
                        <input type="file" class="hidden" ref="update_avatar_input" @change="avatarChanged($event)" accept="image/*">

                        <!-- Toggle comment of below buttons as one for actual flow & currently shown is only for demo -->
                        <vs-button class="mr-4 mb-4" @click="update_avatar()">Change Avatar</vs-button>
                        <!-- <vs-button type="border" class="mr-4" @click="$refs.update_avatar_input.click()">Change Avatar</vs-button> -->

                        <vs-button type="border" v-if="isUploadedAvatar" v-on:click="remove_avatar()" color="danger">Remove Avatar</vs-button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->
        <div class="vx-row">
            <div class="vx-col md:w-1/2 w-full">
                <vs-input class="w-full mt-4" label="Login" v-model="data_local.login"
                    v-validate="'required|alpha_num'" name="login" />
                <span class="text-danger text-sm" v-show="errors.has('login')">{{ errors.first('login') }}</span>

                <!-- First Name -->
                <vs-input class="w-full mt-4" label="First Name" v-model="data_local.first_name"
                    v-validate="'required|alpha_spaces'" name="first_name" />
                <span class="text-danger text-sm" v-show="errors.has('first_name')">{{ errors.first('first_name') }}</span>

                <!-- Last Name -->
                <vs-input class="w-full mt-4" label="Last Name" v-model="data_local.last_name"
                    v-validate="'required|alpha_spaces'" name="last_name" />
                <span class="text-danger text-sm" v-show="errors.has('first_name')">{{ errors.first('last_name') }}</span>

                <!-- Email -->
                <vs-input class="w-full mt-4" label="Email" v-model="data_local.email" type="email"
                    v-validate="'required|email'" name="email" />
                <span class="text-danger text-sm" v-show="errors.has('email')">{{ errors.first('email') }}</span>
            </div>

            <div class="vx-col md:w-1/2 w-full">
                <!-- Status -->
                <div class="mt-4">
                    <label class="vs-input--label">Status</label>
                    <v-select v-model="status_local" :clearable="false" :options="statusOptions" v-validate="'required'"
                        name="status" :dir="$vs.rtl ? 'rtl' : 'ltr'" />
                    <span class="text-danger text-sm" v-show="errors.has('status')">{{ errors.first('status') }}</span>
                </div>

                <!--- <div class="mt-4">
                    <label class="vs-input--label">Role</label>
                    <v-select v-model="role_local" :clearable="false" :options="roleOptions" v-validate="'required'"
                        name="role" :dir="$vs.rtl ? 'rtl' : 'ltr'" />
                    <span class="text-danger text-sm" v-show="errors.has('role')">{{ errors.first('role') }}</span>
                </div> -->

                <vs-input class="w-full mt-4" label="Company" v-model="data_local.company" v-validate="'alpha_spaces'"
                    name="company" />
                <span class="text-danger text-sm" v-show="errors.has('company')">{{ errors.first('company') }}</span>

            </div>
        </div>

        <!-- Permissions -->
        <vx-card v-if="data_local.permissions" class="mt-base" no-shadow card-border>

            <div class="vx-row">
                <div class="vx-col w-full">
                    <div class="flex items-end px-3">
                        <feather-icon svgClasses="w-6 h-6" icon="LockIcon" class="mr-2" />
                        <span class="font-medium text-lg leading-none">Permissions</span>
                    </div>
                    <vs-divider />
                </div>
            </div>

            <div class="block overflow-x-auto">
                <table class="w-full">
                    <tr>
                        <!-- You can also use `Object.keys(Object.values(data_local.permissions)[0])` this logic if you consider,
                        our data structure. You just have to loop over above variable to get table headers.
                        Below we made it simple. So, everyone can understand. -->
                        <th class="font-semibold text-base text-left px-3 py-2"
                            v-for="heading in ['Module', 'Read', 'Write', 'Create', 'Delete']" :key="heading">
                            {{ heading }}</th>
                    </tr>

                    <tr v-for="(val, name) in data_local.permissions" :key="name">
                        <td class="px-3 py-2">{{ name }}</td>
                        <td v-for="(permission, name) in val" class="px-3 py-2" :key="name + permission">
                            <vs-checkbox v-model="val[name]" />
                        </td>
                    </tr>
                </table>
            </div>

        </vx-card>

        <!-- Save & Reset Button -->
        <div class="vx-row">
            <div class="vx-col w-full">
                <div class="mt-8 flex flex-wrap items-center justify-end">
                    <vs-button class="ml-auto mt-2" @click="save_changes" :disabled="!validateForm">
                        Save Changes
                    </vs-button>
                    <vs-button class="ml-4 mt-2" type="border" color="warning" @click="reset_data">Reset</vs-button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import vSelect from 'vue-select'

    export default {
        props: {
            data: {
                type: Object,
                required: true,
            },
        },
        data() {
            return {

                data_local: JSON.parse(JSON.stringify(this.data)),

                statusOptions: [
                    {
                        label: "Active",
                        value: "active"
                    },
                    {
                        label: "Blocked",
                        value: "blocked"
                    },
                    // {
                    //     label: "Deactivated",
                    //     value: "deactivated"
                    // },
                ],
                roleOptions: [
                    {
                        label: "Admin",
                        value: "admin"
                    },
                    {
                        label: "Moderator",
                        value: "moderator"
                    },
                    {
                        label: "User",
                        value: "user"
                    }                    
                ],
                formData: new FormData(),
                isUploadedAvatar: false,
            }
        },
        methods: {
            capitalize(str) {
                return str.slice(0, 1).toUpperCase() + str.slice(1, str.length)
            },
            save_changes() {
                // if (!this.validateForm) return

                // this.$store.dispatch("userManagement/removeRecord", this.params.data.id)
                //     .then(()   => { this.showDeleteSuccess() })
                //     .catch(err => { console.error(err)       })

                if (this.isUploadedAvatar) 
                {
                    this.formData.set("first_name", this.data_local.first_name);
                    this.formData.set("login", this.data_local.login);
                    this.formData.set("email", this.data_local.email);
                    this.formData.set("status", this.data_local.status);

                    var params = {
                        user: this.data,
                        formData: this.formData,
                    };

                    this.$store.dispatch("userManagement/accountUpdateFormData", params).then((response) => { 
                        window.console.log(response);
                        this.showUpdateSuccess();
                    }).catch(err => { console.error(err) })
                } 
                else
                {
                    window.console.log("dd", this.data_local);
                    this.$store.dispatch("userManagement/accountUpdate", this.data_local).then(() => { 
                        this.showUpdateSuccess() })
                        .catch(err => { console.error(err)       
                    })
                }

                // Here will go your API call for updating data
                // You can get data in "this.data_local"

            },
            showUpdateSuccess() {
                this.$vs.notify({
                    color:  'success',
                    title:  'User Updated',
                    text:   'The selected user was successfully deleted'
                })
            },
            update_avatar() { 
                this.$refs["update_avatar_input"].click();
            },
            avatarChanged(event) {
                if (event.target.files.length) {
                    var file = event.target.files[0];
                    this.data_local.avatar = URL.createObjectURL(file);

                    this.formData.append("avatar", file);
                    this.isUploadedAvatar = true;
                }
            },
            remove_avatar() {
                this.data_local.avatar = this.data.avatar; 
                this.isUploadedAvatar = false;
            },
            reset_data() {
                this.data_local = JSON.parse(JSON.stringify(this.data))
                this.isUploadedAvatar = false;
            }
        },
        computed: {
            status_local: {
                get() {
                    return {
                        label: this.capitalize(this.data_local.status),
                        value: this.data_local.status
                    }
                },
                set(obj) {
                    this.data_local.status = obj.value
                }
            },
            // role_local: {
            //     get() {
            //         return {
            //             label: this.capitalize(this.data_local.role.slug),
            //             value: this.data_local.role.slug
            //         }
            //     },
            //     set(obj) {
            //         this.data_local.role.slug = obj.value
            //     }
            // },
            validateForm() {
                return !this.errors.any()
            }
        },
        components: {
            vSelect
        },
    }

</script>
