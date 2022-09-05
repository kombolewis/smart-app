import axios from 'axios'
import Cookies from 'js-cookie'
import * as types from '../mutation-types'

// state
export const state = {
    results:[]
}

// getters
export const getters = {
  results: state => state.results,

}

// mutations
export const mutations = {
    setResults: (state, data) => (state.results = data),
}

// actions
export const actions = {


  async fetchSurveyResults ({ commit }) {
    try {
      const { data } = await axios.get('/api/service')

      commit('setResults', data)
    } catch (e) {
      commit('setResults', false)
    }
  },

}
