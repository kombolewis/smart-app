<template>
  <div class="top-right">
    <table  class="table">
        <tr>
            <th>#</th>
            <th>Choice</th>
            <th>Percentage</th>
            <th>Count</th>
        </tr>
        <tr v-for="({choice, percentage,count},index) in surveyResults" :key="index">
            <td></td>
            <td>{{choice}}</td>
            <td>{{percentage}}%</td>
            <td>{{count}}</td>
        </tr>
    </table>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
  layout: 'basic',

  metaInfo () {
    return { title: this.$t('results') }
  },

  data: () => ({
    title: window.config.appName,
    resultsData:[]
  }),

  mounted() {
    this.$store.dispatch('survey/fetchSurveyResults')
  },

  computed: mapGetters({
    surveyResults: 'survey/results'
  })
}
</script>

<style scoped>
.top-right {
  display: flex;
  /* right: 10px; */
  top: 8px;
}

.title {
  font-size: 85px;
}
</style>
