<template>
	<div class="modal" v-if="show" :class="{'is-active': show}">
		<div class="modal-background"></div>
		<div class="modal-card">
			<header class="modal-card-head">
				<p class="modal-card-title">
					Хэрэглэгч нэвтрэх
				</p>
				<button class="delete" @click="hideModal"></button>
			</header>
			<section class="modal-card-body">
				<p class="control has-icon">
					<input class="input" type="email" placeholder="Email" v-modal="form.email">
					<span class="icon is-small">
						<i class="fa fa-envelope"></i>
					</span>
				</p>
				<p class="control has-icon">
					<input class="input" type="password" placeholder="Password" v-modal="form.password">
					<span class="icon is-small">
						<i class="fa fa-lock"></i>
					</span>
				</p>
			</section>
			<footer class="modal-card-foot">
				<a class="button is-primary" @click="login" :class="{'is-loading':loading}">Нэвтрэх</a>
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
				loading: false,
				form: {
					email: '',
					password: '',
				}
			};
		},

		mounted() {
			event.$on('login-modal-show', this.showModal);
		},

		destroyed() {
			event.$off('login-modal-show', this.showModal);
		},

		methods: {
			login() {
				this.loading = true;

				this.axios.post('/login', this.form)
					.then(response => {
						console.log(response);
					});
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