<template>
	<div class="container">
		<div v-if="user">
			<h3 class="title is-1 has-text-centered">
				@{{ user.name }}
			</h3>

			<hr>

			<infinite-video-listing :url="userVideosUrl"></infinite-video-listing>
		</div>
	</div>
</template>

<script>
	import InfiniteVideoListing from './../components/InfiniteVideoListing';

	export default {
		components: { InfiniteVideoListing },

		data() {
			return {
				user: null,
				userVideosUrl: null
			};
		},

		mounted() {
			this.getUser();
		},

		watch: {
			$route() {
				this.getUser();
			}
		},

		methods: {
			getUser() {
				this.axios.get('/api/users/'+this.$route.params.username)
					.then(response => {
						this.user = response.data;
						this.userVideosUrl = '/api/users/'+this.user.name+'/videos';
					});
			}
		}
	}
</script>