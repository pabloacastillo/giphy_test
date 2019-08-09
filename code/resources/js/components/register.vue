<template>
	
	<div class="form">
		
		<form id="register_form" method="POST" action="/auth/register" @submit.prevent="register_form">
			<input type="hidden" name="_token" :value="csrf">

			<div class="form__group">
				<label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
				<input id="name" type="text" class="form-control" name="name" value="Vivian" required autocomplete="name" autofocus>
				
			</div>

			<div class="form__group">
				<label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

				<input id="email" type="email" class="form-control" name="email" value="vivi@cerocin.co" required autocomplete="email">

			
			</div>

			<div class="form__group">
				<label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

				<input id="password" type="password" class="form-control" name="password" value="123" required autocomplete="new-password">
				
			</div>

			<div class="form__group">
				<label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

				<input id="password-confirm" type="password" class="form-control" value="123" name="password_confirmation" required autocomplete="new-password">
				
			</div>

			<div class="form__group ">
				<button type="submit" class="form__btn ">
					Register
				</button>
			</div>
		</form>

	</div>

</template>
<script>
	export default {

		mounted: function() {

		},

		data() {
			return {
				gifs: {},
				loaded: 'false',
				csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
			};
		},

		methods: {
			register_form: function(params) {
				const vm = this;
				var reg_form=document.getElementById('register_form').elements;
				var frm_values={};

				for (var i = 0; i < reg_form.length; i++) {
					frm_values[reg_form[i].name]=reg_form[i].value;
				}

				vm.$http.post( '/auth/register', frm_values)
				.then( ( res ) => {
					console.log(res.data);
					if(res.data==true){
						vm.$router.push('/');
						console.log('Navegar a portada');
					}
					
				} )
				.catch( ( res ) => {
					console.log( `Something went wrong on register_form : ${res}` );
				} );

				return false;
			}
		}
	};
</script>