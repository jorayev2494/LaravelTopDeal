import state from './moduleCountryState.js'
import getters from './moduleCountryGetters.js'
import mutations from './moduleCountryMutations.js'
import actions from './moduleCountryActions.js'

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
}