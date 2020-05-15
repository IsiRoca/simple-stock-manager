<template>
  <div>
    <div class="form-group">
      <div class="d-flex align-items-center justify-content-between flex-row">
        <label for="user_name"> {{userNameLabel}} </label>

        <input
          type="text"
          maxlength="128"
          v-model="user_name"
          class="form-control"
          :class="{ 'is-invalid' : errors['user_name'] }"
          :placeholder="userNamePlaceholder"
        />

        <span
          v-if="errors['user_name']"
          class="invalid-feedback"
        >{{ errors['user_name'][0] }}</span>

      </div>
      <div class="d-flex align-items-center justify-content-between flex-row">
        <label for="user_email"> {{userEmailLabel}} </label>

        <input
          type="text"
          maxlength="255"
          v-model="user_email"
          class="form-control"
          :class="{ 'is-invalid' : errors['user_email'] }"
          :placeholder="userEmailPlaceholder"
        />

        <span
          v-if="errors['user_email']"
          class="invalid-feedback"
        >{{ errors['user_email'][0] }}</span>

      </div>
      <div class="d-flex align-items-center justify-content-between flex-row">
        <label for="company_name"> {{companyNameLabel}} </label>

        <input
          type="text"
          maxlength="128"
          v-model="company_name"
          class="form-control"
          :class="{ 'is-invalid' : errors['company_name'] }"
          :placeholder="companyNamePlaceholder"
        />

        <span
          v-if="errors['company_name']"
          class="invalid-feedback"
        >{{ errors['company_name'][0] }}</span>

      </div>
    </div>

    <div class="form-group text-right">
      <button
        class="btn btn-primary"
        :disabled="isDisabled"
        @click="submit"
      >
        <i
          v-if="isLoading"
          class="fa fa-spinner fa-spin fa-fw"
        />
        {{ button }}
      </button>
    </div>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  props: {

    userNamePlaceholder: {
      type: String,
      default: null
    },
    userEmailPlaceholder: {
      type: String,
      default: null
    },
    companyNamePlaceholder: {
      type: String,
      default: null
    },
    userNameLabel: {
      type: String,
      default: null
    },
    userEmailLabel: {
      type: String,
      default: null
    },
    companyNameLabel: {
      type: String,
      default: null
    },

    button: {
      type: String,
      required: true
    }
  },

  data () {
    return {
      user_name: '',
      user_email: '',
      company_name: '',
      isLoading: false,
      errors: []
    }
  },

  computed: {
    isDisabled () {
      return this.isLoading || this.user_name.length === 0 || this.user_email.length === 0 || this.company_name.length === 0
    }
  },

  methods: {
    submit () {
      this.isLoading = true

      axios
        .post(`/api/v1/products/${this.postId}/comments`, {
          user_name: this.user_name,
          user_email: this.user_email,
          company_name: this.company_name,
        })
        .then(({ data }) => {
          Event.$emit('added', data.data)

          this.content = ''
          this.isLoading = false
          this.errors = []
        })
        .catch(error => {
          this.isLoading = false
          this.errors = error.response.data.errors
        })
    }
  }
}
</script>

