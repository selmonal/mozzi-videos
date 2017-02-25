<template>
	<p class="control has-addons searchbox">
		<input class="input" :class="{'is-danger': error}" type="text" v-model="query" placeholder="Хайлт хийх..." @keydown.enter="search">
		<a class="button is-dark" @click="search">
			&nbsp; <i class="fa fa-search"></i> &nbsp;
		</a>
	</p>
</template>

<script>
	export default {
		data() {
			return {
				query: '',
				error: false,
			};
		},

		computed: {
			normalizedQuery() {
				return this.query.trim();
			}
		},

		watch: {
			normalizedQuery(query) {
				this.error = this.query.length === 0;
			}
		},

		methods: {
			search() {
				if (this.normalizedQuery.length === 0) {
					this.error = true;
					return;
				}

				this.$router.push({
					path: '/search',
					query: {
						q: this.query
					}
				});
			}
		}
	}
</script>