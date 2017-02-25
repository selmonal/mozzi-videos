<template>
	<div class="container">
		<div class="columns">
			<div class="column is-8 is-offset-2">
				<div class="video-tile-listing">
					<article class="media" v-for="video in videos">
						<div class="media-left">
							<router-link :to="'/videos/'+video.id">
								<figure class="image">
									<img :src="video.thumbnail" alt="Image" class="inline-video-image">
								</figure>
							</router-link>
						</div>
						<div class="media-content">
							<div class="content">
								<p>
									<div class="video-title">
										<router-link :to="'/videos/'+video.id">{{ video.title }}</router-link>
									</div>
									<div class="video-account">
										<router-link :to="'/@'+video.user.name">
											@{{ video.user.name }}
										</router-link>
									</div>
									<div class="video-views">{{ video.views_count }} үзсэн</div>
									<div class="video-views">{{ video.description | short }}</div>
								</p>
							</div>
						</div>
					</article>

					<p v-if="videos && videos.length === 0" class="has-text-centered">
						Хайлт илэрцгүй.
					</p>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				videos: null
			};
		},

		mounted() {
			this.getVideos();
		},

		watch: {
			$route() {
				this.getVideos();
			}
		},

		filters: {
			short(description) {
				var parts = description.split(/\r|\n/);

				if (parts.length > 0) {
					return parts[0];
				}
			}
		},

		methods: {
			getVideos() {
				this.axios.get('/api/search?q='+this.$route.query.q)
					.then(response => {
						this.videos = response.data.data;
					});
			}
		}
	}
</script>

<style>
	.video-tile-listing {
		background-color: white;
		padding: 10px;
	}

	.inline-video-image {
		max-width: 240px;
	}
</style>