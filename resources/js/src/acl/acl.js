import Vue from "vue"
import { AclInstaller, AclCreate, AclRule } from "vue-acl"
import router from "@/router"

Vue.use(AclInstaller)

// let initialRole = "admin develop"
let initialRole = "guest"

let userInfo = JSON.parse(localStorage.getItem("userInfo"))
// if(userInfo && userInfo.userRole) initialRole = userInfo.userRole
if(userInfo && userInfo.role.slug) initialRole = userInfo.role.slug


export default new AclCreate({
    initial: window.localStorage.getItem("userInfo") ? initialRole : "guest",
    notfound: "/admin/pages/not-authorized",
    router,
    acceptLocalRules: true,
    globalRules: {
        admin:      new AclRule("admin").generate(),
        moderator:  new AclRule("moderator").or("admin").generate(),
        user:       new AclRule("moderator").or("moderator").or("admin").generate(),
        guest:      new AclRule("guest").generate(),
        // editor: new AclRule("editor").or("admin").generate(),
        // public: new AclRule("public").or("admin").or("editor").generate(),
    }
})
