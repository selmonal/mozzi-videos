<template>
	<div>
		<div v-infinite-scroll="loadMore">
			<video-listing :videos="videos"></video-listing>
		</div>
		
		<div class="loading-placeholder" v-show="loading"></div>
	</div>
</template>

<script>
	import VideoListing from './VideoListing';
	import InfiniteScroll from 'vue-infinite-scroll';

	export default {
		components: { VideoListing },
		directives: { InfiniteScroll },

		props: {
			url: {
				type: String,
			}
		},

		data() {
			return {
				loading: false,
				videos: [],
				next_page: 1,
			};
		},

		watch: {
			url() {
				this.loadMore();
			}
		},

		methods: {
			loadMore() {
				if (this.next_page === null || this.url === null) {
					return;
				}

				this.loading = true;

				this.axios.get(this.url + '?page='+this.next_page).then(response => {
					this.loading = false;

					response.data.data.forEach((video) => {
						this.videos.push(video);
					})

					this.next_page = response.data.current_page < response.data.last_page ?
						response.data.current_page + 1 : null;
				})
			}
		}
	}
</script>