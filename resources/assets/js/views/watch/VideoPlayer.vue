<template>
	<div class="video-container">
		<div id="youtube-video-player"></div>
	</div>
</template>

<script>
	export default {
		props: {
			videoId: {
				type: String,
				required: true,
			}
		},

		mounted() {
			if (this.youtubeHasLoaded()) {
				this.createYoutube();
			} else {
				this.waitForYoutubeToBeLoaded();
			}
		},

		watch: {
			videoId() {
				if (this.player) {
					this.player.loadVideoById(this.videoId);
				}
			}
		},

		destroyed() {
			if (this.player) {
				this.player.destroy();
			}
		},

		methods: {
			youtubeHasLoaded() {
				return window.YT !== undefined && window.YT.loaded === 1;
			},

			createYoutube() {
				this.player = new YT.Player('youtube-video-player', {
					videoId: this.videoId,
					height: 360,
					playerVars: {
						autoplay: 1,
						controls: 1,
						showinfo: 0,
						modestbranding: 1,
						loop: 1,
						fs: 0,
						cc_load_policy: 0,
						iv_load_policy: 3,
						autohide: 0
					}
				});
			},

			waitForYoutubeToBeLoaded() {
				window.onYouTubeIframeAPIReady = () => this.createYoutube();
			}
		}
	}
</script>

<style>
	.video-container {
		position:relative;
		height:0;
		padding-bottom:56.25%;
		background: black;
	}

	.video-container iframe {
		position:absolute;
		width: 100%;
		height:100%;
		left:0;
	}
</style>