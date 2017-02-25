<template>
	<article class="media">
		<figure class="media-left">
			<p class="image is-64x64">
				<img src="http://placehold.it/128x128">
			</p>
		</figure>
		<div class="media-content">
			<p class="control">
				<textarea class="textarea" placeholder="Сэтгэгдэл үлдээх..."></textarea>
			</p>
			<nav class="level">
				<div class="level-left">
					<div class="level-item">
						<a class="button is-info" @click="save">Илгээх</a>
					</div>
				</div>
			</nav>
		</div>
	</article>
</template>

<script>
	export default {
		props: {
			id: {
				type: String,
				required: true,
			},

			user: {
				type: Object,
				required: true,
			}
		},

		methods: {
			save() {
				alert('Storing the comment123.');
			}
		}
	}
</script>