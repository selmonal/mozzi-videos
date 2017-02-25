<template>
	<div class="box related-list up-next-videos">
		<p class="autoplay">
			<span class="autoplay-title">Үүний дараа</span>
			<span class="autoplay-toggle">
				Автомат
				<i class="fa fa-info-circle"></i>
			</span>
		</p>
		
		<router-link class="media related-card" v-for="video in videos" :to="'/videos/'+video.id">
			<div class="media-left">
				<figure class="image">
					<img :src="video.thumbnail" alt="Image" style="width: 120px;">
				</figure>
			</div>
			<div class="media-content">
				<div class="content">
					<p>
						<span class="video-title">
							{{ video.title }}
						</span>
						<span class="video-account">{{ video.user.name }}</span>
						<span class="video-views">{{ video.views_count }} үзсэн</span>
					</p>
				</div>
			</div>
		</router-link>
	</div>
</template>

<script>
	export default {
		props: {
			currentVideo: {
				type: Object,
				required: true,
			}
		},

		data() {
			return {
				videos: []
			};
		},

		mounted() {
			this.getVideos();
		},

		watch: {
			currentVideo() {
				this.getVideos();
			}
		},

		methods: {
			getVideos() {
				this.axios.get('/api/videos/'+this.currentVideo.id+'/up-nexts')
					.then(response => {
						this.videos = response.data;
					});
			}
		}
	}
</script>

<style>
	.up-next-videos .media:first-child {
		border-bottom: 1px solid #eaeaea !import;
		display: block;
	}
</style>