<template>
  <div class="input-group my-3">
    <input v-model="query" type="text" class="form-control" name="query" placeholder="Search Book"
      aria-label="Search Book" aria-describedby="basic-addon2">
    <button class="input-group-text btn btn-primary" id="basic-addon2">
      <span class="material-symbols-outlined">search</span>

    </button>
  </div>
  <ul v-if="results.length > 0 && query">
    <li v-for="result in results.slice(0,10)" :key="result.id">
      <a :href="result.url">
        <div v-text="result.title"></div>
      </a>
    </li>
  </ul>
</template>

<script>
export default {
  data() {
    return {
      query: null,
      results: []
    };
  },
  watch: {
    query(after, before) {
      this.searchMembers();
    }
  },
  methods: {
    searchMembers() {
      axios.get('book/search', { params: { query: this.query } })
        .then((response) => {
          this.results = response.data
          console.log(response.data)
        })
        .catch(error => { });
    }
  }
}
</script>