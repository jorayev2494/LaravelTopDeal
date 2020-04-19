export function SET_COUNTRIES(state, payload) {
    console.log('SET_COUNTRIES', payload);

    state.countries = payload;
}