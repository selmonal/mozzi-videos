<template>
	<div class="container" v-if="video != null">
		<div class="columns">
			<div class="column is-8">
				<video-player :video-id="video.src_video_id"></video-player>
				<br>
				<video-info :video="video"></video-info>
				<video-description :video="video"></video-description>
				<!-- <comments></comments> -->
			</div>
			<div class="column is-4">
				<up-next-videos :current-video="video"></up-next-videos>
			</div>
		</div>
	</div>
</template>

<script>
	import UpNextVideos from './UpNextVideos';
	import VideoDescription from './VideoDescription';
	import VideoInfo from './VideoInfo';
	import VideoPlayer from './VideoPlayer';
	import Comments from './comments/Comments';

	export default {
		components: { 
			UpNextVideos,
			VideoDescription,
			VideoInfo,
			VideoPlayer,
			Comments,
		},

		data() {
			return {
				video: null,
			};
		},

		watch: {
			$route() {
				this.getVideo(this.$route.params.id);
			}
		},

		mounted() {
			this.getVideo(this.$route.params.id);
		},

		methods: {
			getVideo(videoId) {
				this.axios.post('/api/videos/'+videoId+'/watch')
					.then(response => {
						this.video = response.data;
					});
			}
		}
	}
</script>