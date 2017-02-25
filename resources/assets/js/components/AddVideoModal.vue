<template>
	<div class="modal" v-if="show" :class="{'is-active': show}">
		<div class="modal-background"></div>
		<div class="modal-card">
			<header class="modal-card-head">
				<p class="modal-card-title">
					Видео нэмэх
				</p>
				<button class="delete" @click="hideModal"></button>
			</header>
			<section class="modal-card-body">
				<p class="control has-icon">
					<input class="input is-large" type="text" v-model="url" placeholder="Youtube холбоос">
					<span class="icon is-large">
						<i class="fa fa-youtube"></i>
					</span>
				</p>
			</section>
			<footer class="modal-card-foot">
				<a class="button is-success" @click="store" :class="{'is-loading':storing}">Нэмэх</a>
				<a class="button" @click="hideModal">Цуцлах</a>
			</footer>
		</div>
	</div>
</template>

<script>
	import event from './../event';

	export default {
		data() {
			return {
				show: false,
				url: '',
				storing: false,
			};
		},

		mounted() {
			event.$on('add-video-modal-show', this.showModal);
		},

		destroyed() {
			event.$off('add-video-modal-show', this.showModal);
		},

		methods: {
			store() {
				this.storing = true;

				this.axios.post('/api/videos', { url: this.url})
					.then(response => {
						this.$router.push('/videos/'+response.data.id);
						this.reset();
						this.hideModal();
						this.storing = false;
						event.$emit('set-message', {
							text: 'Таний видео нэмэгдсэн.'
						})
					});
			},

			reset() {
				this.url = '';
			},

			showModal() {
				this.show = true;
			},

			hideModal() {
				this.show = false;
			}
		}
	}
</script>