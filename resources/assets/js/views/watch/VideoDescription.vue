<template>
	<div class="box video-description">
	
		<p><strong>{{ addedDate }}</strong></p>
		<p v-if="! showMore" v-html="shortDescription"></p>
		<p v-if="showMore" v-html="fullDescription"></p>

		<hr>

		<p class="has-text-centered has-text-muted video-description-more is-clickable" @click="showMore = ! showMore">
			<span v-if="! showMore">Дэлгэрэнгүй үзэх</span>
			<span v-if="showMore">Хураангуй үзэх</span>
		</p>
	</div>
</template>

<script>
	function nl2br (str, is_xhtml) {
	    var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
	    return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
	}

	export default {
		props: {
			video: {
				type: Object,
				required: true,
			}
		},

		data() {
			return {
				showMore: false,
			};
		},

		computed: {
			shortDescription() {
				var parts = this.video.description.split(/\r|\n/);

				if (parts.length > 0) {
					return parts[0];
				}
			},

			fullDescription() {
				return nl2br(this.video.description);
			},

			addedDate() {
				return moment(this.video.created_at).format('YYYY оны MM сарын DD-нд нэмэгдсэн');
			}
		}
	}
</script>