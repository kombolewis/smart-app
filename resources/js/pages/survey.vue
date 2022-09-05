<template>
  <div class="top-right">
    <form @submit.prevent="handleSubmit">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">How do you find our service</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="rating" id="rating-good" value="good" v-model="form.rating">
          <label class="form-check-label" for="rating-good">
            Good
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="rating" id="rating-fair" value="fair" v-model="form.rating">
          <label class="form-check-label" for="rating-fair">
            Fair
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="rating" id="rating-bad" value="bad" v-model="form.rating">
          <label class="form-check-label" for="rating-bad">
            Bad
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="rating" id="rating-neutral" value="neutral" v-model="form.rating">
          <label class="form-check-label" for="rating-neutral">
            Neutral
          </label>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-outline-primary">Submit</button>
        </div>
    </form>
  </div>
</template>

<script>
import Form from 'vform'

import { mapGetters, mapActions } from 'vuex'

export default {
  layout: 'basic',

  metaInfo () {
    return { title: this.$t('home') }
  },

  data: () => ({
    form: new Form({
      rating: ''
    })
  }),

  methods: {
    async handleSubmit() {
        const response = await this.form.post('/api/service')
        if (response.statusText == 'OK') {
          this.$router.push('results')
        }
    },
  },

  computed: mapGetters({
    authenticated: 'auth/check'
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
