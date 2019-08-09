<template>
	
	<div class="form">
		
		<form id="login_form" method="POST" action="/auth/register" @submit.prevent="login_form">
			<input type="hidden" name="_token" :value="csrf">

			<div class="form-group ">
				<label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
				<input id="email" type="email" class="form-control is-invalid " name="email" value="" required autocomplete="email" autofocus>
			</div>

			<div class="form-group">
				<label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
				<input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
			</div>

			<div class="form-group">
					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="remember" id="remember">

						<label class="form-check-label" for="remember">
							Remember Me
						</label>
					</div>
			</div>

			<div class="form-group">
					<button type="submit" class="form__btn">
						Login
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
			login_form: function(params) {
				const vm = this;
				var reg_form=document.getElementById('login_form').elements;
				var frm_values={};

				for (var i = 0; i < reg_form.length; i++) {
					frm_values[reg_form[i].name]=reg_form[i].value;
				}

				vm.$http.post( '/auth/login', frm_values)
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