<template>
	<div>
		<div class="columns is-multiline">
			<div class="column is-3" v-for="video in videos">
				<router-link :to="'videos/'+video.id" class="panel">
					<p class="is-marginless">
						<img :src="video.thumbnail">
					</p>
					<div class="panel-block">
						<div class="columns">
							<div class="column">
								<div class="panel-block-item">
									{{ video.views_count }} үзсэн
								</div>
							</div>
						</div>
					</div>
				</router-link>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		props: {
			videos: {
				type: Array,
				required: true,
			}
		},
	}
</script>