import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

// #region Modules
    import authModule from './auth/index.js';
    import countryModule from './countries/index.js'
    import cabinetModule from './cabinet/index.js'
    import categoryModule from './countries/index.js'

// #endregion

export default new Vuex.Store({
    modules: {
        auth: authModule,
        country: countryModule,
        cabinet: cabinetModule,
        category: categoryModule,
    }
});