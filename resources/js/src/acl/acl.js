import Vue from "vue"
import { AclInstaller, AclCreate, AclRule } from "vue-acl"
import router from "@/router"

Vue.use(AclInstaller)

// let initialRole = "admin develop"
let initialRole = "admin"

// let userInfo = JSON.parse(localStorage.getItem("userInfo"))
// if(userInfo && userInfo.userRole) initialRole = userInfo.userRole
// if(userInfo && userInfo.role.slug) 
    // initialRole = userInfo.role.slug

console.log('initialRole', initialRole)


export default new AclCreate({
    initial: initialRole,
    notfound: "/admin/pages/not-authorized",
    router,
    acceptLocalRules: true,
    globalRules: {
        admin:      new AclRule("admin").generate(),
        moderator:  new AclRule("moderator").or("admin").generate(),
        user:       new AclRule("moderator").or("moderator").or("admin").generate(),
        guest:      new AclRule("guest").generate(),
        any:        new AclRule("guest").or("user").or("moderator").or("admin").generate(),
        // editor: new AclRule("editor").or("admin").generate(),
        // public: new AclRule("public").or("admin").or("editor").generate(),
    }
})
