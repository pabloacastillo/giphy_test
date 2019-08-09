<template>
	<div v-if="this.loaded=='true'" class="search__wrapper">
		<div class="search__item" v-for="(_search, index) in this.searchs">
			<router-link :to="{ path: '/search/' + _search.search}" :key="_search.id" >
				<h3>
					{{ _search.search }}
				</h3>
			</router-link>	
		</div>
	</div>
</template>

<script>

	export default {

		mounted: function() {
			this.getHistory();
		},

		data() {
			return {
				searchs: {},
				loaded: 'false',
			};
		},

		methods: {

			getHistory: function() {

				const vm = this;
				vm.$http.get( '/auth/history')
				.then( ( res ) => {
					vm.searchs = res.data;
					vm.loaded = 'true';
				} )
				.catch( ( res ) => {
					console.log( `Something went wrong: ${res}` );
				} );

			}

		}
	};
</script>