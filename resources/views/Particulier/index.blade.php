@extends('layouts.particulier')
@section('content')
@if(session('error'))
	<div id="error-popup" class="fixed top-5 right-5 z-50 bg-red-500 text-white px-6 py-3 rounded shadow-lg transition-opacity duration-500 opacity-100">
		{{ session('error') }}
	</div>
	<script>
		setTimeout(function() {
			var popup = document.getElementById('error-popup');
			if (popup) {
				popup.style.opacity = '0';
				setTimeout(function() { popup.remove(); }, 500);
			}
		}, 20000);
	</script>
@endif
   <!-- Start Area 2 -->
	<section class="hero-area2">
		<div class="home-slider">
			<!-- Start Single Slider -->
			<div class="single-slider overlay" style="background-image:url('assets1/images/categories/animaux.jpeg');">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="content">
								<h4 class="title">Animals</h4>
								<p class="des">Giordanr Shirt is the best design of Artist Alex Goot. You should got it for your style</p>
								<div class="button">
									<a href="/clothes" class="btn">Discover Now</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Single Slider -->
			<!-- Start Single Slider -->
			<div class="single-slider overlay" style="background-image:url('assets1/images/categories/clothes.jpg');">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="content">
								<h4 class="title">Clothes</h4>
								<p class="des">Giordanr Shirt is the best design of Artist Alex Goot. You should got it for your style</p>
								<div class="button">
									<a href="#" class="btn">Discover Now</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Single Slider -->
			<!-- Start Single Slider -->
			<div class="single-slider overlay" style="background-image:url('assets1/images/categories/immobilier.jpg');">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="content">
								<h4 class="title">Real estate</h4>
								<p class="des">Giordanr Shirt is the best design of Artist Alex Goot. You should got it for your style</p>
								<div class="button">
									<a href="#" class="btn">Discover Now</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Single Slider -->
			<!-- Start Single Slider -->
			<div class="single-slider overlay" style="background-image:url('assets1/images/categories/maison.jpeg');">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="content">
								<h4 class="title">Maison & jardin</h4>
								<p class="des">Giordanr Shirt is the best design of Artist Alex Goot. You should got it for your style</p>
								<div class="button">
									<a href="#" class="btn">Discover Now</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Single Slider -->
			<!-- Start Single Slider -->
			<div class="single-slider overlay" style="background-image:url('assets1/images/categories/sport.jpeg');">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="content">
								<h4 class="title">Sports & loisirs</h4>
								<p class="des">Giordanr Shirt is the best design of Artist Alex Goot. You should got it for your style</p>
								<div class="button">
									<a href="#" class="btn">Discover Now</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Single Slider -->
		</div>
	</section>
	<!--/ End Hero Area 2 -->
	
	<!-- Start Product Area -->
    <div class="product-area section">
            <div class="container">
				<div class="row">
					<div class="col-12">
						<div class="section-title">
							<h2>Trending Item</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="product-info">
							<div class="nav-main">
								<!-- Tab Nav -->
								<ul class="nav nav-tabs" id="myTab" role="tablist">
									<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#jobs" role="tab">Jobs</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#cars" role="tab">Cars</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#clothes" role="tab">Clothes</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#services" role="tab">services</a></li>
								</ul>
								<!--/ End Tab Nav -->
							</div>
							<div class="tab-content mt-6" id="myTabContent">
								<!-- Start Single Tab -->
								<div class="tab-pane fade show active" id="jobs" role="tabpanel">
									<div class="tab-single">
										<div class="row">

											<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
												@foreach ($annonces->where('category_id','=', 5)->take(4) as $annonce)
													<div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden flex flex-col h-[460px] group relative border border-gray-100">
														<!-- Wishlist button -->
														<button class="absolute top-4 right-4 z-10 bg-white rounded-full p-2 shadow-md hover:bg-gray-100 transition-colors duration-200">
															<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 hover:text-orange-500 transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
																<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
															</svg>
														</button>
														
														<!-- Image container with overlay effect -->
														<div class="relative w-full h-[240px] overflow-hidden">
															<a href="annonceDetails/{{$annonce->id}}" class="block w-full h-full">
																<div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-10 transition-opacity duration-300 z-10"></div>
																<img src="{{ $annonce->image }}" alt="{{ $annonce->title }}"
																	 class="w-full h-full object-cover object-center transform group-hover:scale-110 transition-transform duration-700 ease-in-out">
															</a>
															
															<!-- Status badge -->
															<div class="absolute top-4 left-4 bg-orange-500 text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-lg flex items-center">
																<span class="w-2 h-2 bg-white rounded-full mr-1.5 animate-pulse"></span>
																NEW
															</div>
															
															<!-- Quick actions bar -->
															<div class="absolute left-0 right-0 bottom-0 bg-gradient-to-t from-black/70 to-transparent p-4 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300 flex justify-between items-center">
																<a href="{{ route('user.profile.view', $annonce->user->id) }}" class="text-white text-xs font-medium flex items-center hover:text-orange-300 transition-colors duration-200">
																	<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
																		<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
																	</svg>
																	View Seller
																</a>
															</div>
														</div>
														
														<!-- Content with enhanced styling -->
														<div class="flex flex-col justify-between flex-1 p-5">
															<div>
																<!-- Category tag -->
																<div class="mb-2 text-xs font-medium">
																	<span class="text-blue-600">{{$annonce->category->name}}</span>
																</div>
																
																<!-- Title -->
																<h3 class="text-lg font-semibold text-gray-800 leading-tight mb-2 hover:text-orange-500 transition-colors duration-200 line-clamp-2">
																	<a href="annonceDetails/{{$annonce->id}}">{{ $annonce->title }}</a>
																</h3>
																
																<!-- Rating -->
																<div class="flex items-center mb-3">
																	<div class="flex text-orange-400">
																		<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
																			<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
																		</svg>
																		<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
																			<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
																		</svg>
																		<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
																			<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
																		</svg>
																		<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
																			<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
																		</svg>
																		<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
																			<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
																		</svg>
																	</div>
																	<span class="text-xs text-gray-500 ml-1">(24 reviews)</span>
																</div>
																
																<!-- Price with previous price -->
																<div class="flex items-center space-x-2">
																	<span class="text-2xl font-bold text-orange-500">${{ number_format($annonce->price, 0, '.', ',') }}</span>
																	<span class="text-sm text-gray-400 line-through">${{ number_format($annonce->price * 1.2, 0, '.', ',') }}</span>
																	<span class="text-xs font-medium text-green-600 bg-green-100 rounded-full px-2 py-0.5">-20%</span>
																</div>
															</div>
															
															<!-- Call to action button -->
															<a href="annonceDetails/{{$annonce->id}}" class="mt-4 bg-orange-500 hover:bg-orange-600 text-white w-full py-3 rounded-xl font-medium text-sm flex items-center justify-center space-x-2 transition-all duration-300 transform hover:-translate-y-0.5 group focus:outline-none focus:ring-2 focus:ring-orange-300 focus:ring-offset-2">
																<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:animate-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor">
																	<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
																</svg>
																<span>Show Annonce</span>
															</a>
														</div>
													</div>
												@endforeach
											</div>

											
										</div>
									</div>
								</div>
								<!--/ End Single Tab -->
								<!-- Start Single Tab -->
								<div class="tab-pane fade" id="cars" role="tabpanel">
									<div class="tab-single">

										<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
											@foreach ($annonces->where('category_id','=', 2)->take(4) as $annonce)
												<div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden flex flex-col h-[460px] group relative border border-gray-100">
													<!-- Wishlist button -->
													<button class="absolute top-4 right-4 z-10 bg-white rounded-full p-2 shadow-md hover:bg-gray-100 transition-colors duration-200">
														<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 hover:text-orange-500 transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
															<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
														</svg>
													</button>
													
													<!-- Image container with overlay effect -->
													<div class="relative w-full h-[240px] overflow-hidden">
														<a href="annonceDetails/{{$annonce->id}}" class="block w-full h-full">
															<div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-10 transition-opacity duration-300 z-10"></div>
															<img src="{{ $annonce->image }}" alt="{{ $annonce->title }}"
																 class="w-full h-full object-cover object-center transform group-hover:scale-110 transition-transform duration-700 ease-in-out">
														</a>
														
														<!-- Status badge -->
														<div class="absolute top-4 left-4 bg-orange-500 text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-lg flex items-center">
															<span class="w-2 h-2 bg-white rounded-full mr-1.5 animate-pulse"></span>
															NEW
														</div>
														
														<!-- Quick actions bar -->
														<div class="absolute left-0 right-0 bottom-0 bg-gradient-to-t from-black/70 to-transparent p-4 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300 flex justify-between items-center">
															<a href="{{ route('user.profile.view', $annonce->user->id) }}" class="text-white text-xs font-medium flex items-center hover:text-orange-300 transition-colors duration-200">
																<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
																	<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
																</svg>
																View Seller
															</a>
															<div class="flex space-x-2">
																<button class="bg-white/20 backdrop-blur-sm hover:bg-white/30 p-1.5 rounded-full transition-colors duration-200">
																	<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
																		<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
																		<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
																	</svg>
																</button>
																<button class="bg-white/20 backdrop-blur-sm hover:bg-white/30 p-1.5 rounded-full transition-colors duration-200">
																	<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
																		<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
																	</svg>
																</button>
															</div>
														</div>
													</div>
													
													<!-- Content with enhanced styling -->
													<div class="flex flex-col justify-between flex-1 p-5">
														<div>
															<!-- Category tag -->
															<div class="mb-2 text-xs font-medium">
																<span class="text-blue-600">{{$annonce->category->name}}</span>
															</div>
															
															<!-- Title -->
															<h3 class="text-lg font-semibold text-gray-800 leading-tight mb-2 hover:text-orange-500 transition-colors duration-200 line-clamp-2">
																<a href="annonceDetails/{{$annonce->id}}">{{ $annonce->title }}</a>
															</h3>
															
															<!-- Rating -->
															<div class="flex items-center mb-3">
																<div class="flex text-orange-400">
																	<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
																		<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
																	</svg>
																	<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
																		<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
																	</svg>
																	<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
																		<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
																	</svg>
																	<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
																		<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
																	</svg>
																	<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
																		<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
																	</svg>
																</div>
																<span class="text-xs text-gray-500 ml-1">(24 reviews)</span>
															</div>
															
															<!-- Price with previous price -->
															<div class="flex items-center space-x-2">
																<span class="text-2xl font-bold text-orange-500">${{ number_format($annonce->price, 0, '.', ',') }}</span>
																<span class="text-sm text-gray-400 line-through">${{ number_format($annonce->price * 1.2, 0, '.', ',') }}</span>
																<span class="text-xs font-medium text-green-600 bg-green-100 rounded-full px-2 py-0.5">-20%</span>
															</div>
														</div>
														
														<!-- Call to action button -->
														<a href="annonceDetails/{{$annonce->id}}" class="mt-4 bg-orange-500 hover:bg-orange-600 text-white w-full py-3 rounded-xl font-medium text-sm flex items-center justify-center space-x-2 transition-all duration-300 transform hover:-translate-y-0.5 group focus:outline-none focus:ring-2 focus:ring-orange-300 focus:ring-offset-2">
															<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:animate-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor">
																<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
															</svg>
															<span>Show Annonce</span>
														</a>
													</div>
												</div>
											@endforeach
										</div>
										

									</div>
								</div>
								<!--/ End Single Tab -->
								<!-- Start Single Tab -->
								<div class="tab-pane fade" id="clothes" role="tabpanel">
									<div class="tab-single">
										<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
											@foreach ($annonces->where('category_id','=', 7)->take(4) as $annonce)
												<div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden flex flex-col h-[460px] group relative border border-gray-100">
													<!-- Wishlist button -->
													<button class="absolute top-4 right-4 z-10 bg-white rounded-full p-2 shadow-md hover:bg-gray-100 transition-colors duration-200">
														<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 hover:text-orange-500 transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
															<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
														</svg>
													</button>
													
													<!-- Image container with overlay effect -->
													<div class="relative w-full h-[240px] overflow-hidden">
														<a href="annonceDetails/{{$annonce->id}}" class="block w-full h-full">
															<div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-10 transition-opacity duration-300 z-10"></div>
															<img src="{{ $annonce->image }}" alt="{{ $annonce->title }}"
																 class="w-full h-full object-cover object-center transform group-hover:scale-110 transition-transform duration-700 ease-in-out">
														</a>
														
														<!-- Status badge -->
														<div class="absolute top-4 left-4 bg-orange-500 text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-lg flex items-center">
															<span class="w-2 h-2 bg-white rounded-full mr-1.5 animate-pulse"></span>
															NEW
														</div>
														
														<!-- Quick actions bar -->
														<div class="absolute left-0 right-0 bottom-0 bg-gradient-to-t from-black/70 to-transparent p-4 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300 flex justify-between items-center">
															<a href="{{ route('user.profile.view', $annonce->user->id) }}" class="text-white text-xs font-medium flex items-center hover:text-orange-300 transition-colors duration-200">
																<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
																	<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
																</svg>
																View Seller
															</a>
															<div class="flex space-x-2">
																<button class="bg-white/20 backdrop-blur-sm hover:bg-white/30 p-1.5 rounded-full transition-colors duration-200">
																	<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
																		<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
																		<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
																	</svg>
																</button>
																<button class="bg-white/20 backdrop-blur-sm hover:bg-white/30 p-1.5 rounded-full transition-colors duration-200">
																	<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
																		<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
																	</svg>
																</button>
															</div>
														</div>
													</div>
													
													<!-- Content with enhanced styling -->
													<div class="flex flex-col justify-between flex-1 p-5">
														<div>
															<!-- Category tag -->
															<div class="mb-2 text-xs font-medium">
																<span class="text-blue-600">{{$annonce->category->name}}</span>
															</div>
															
															<!-- Title -->
															<h3 class="text-lg font-semibold text-gray-800 leading-tight mb-2 hover:text-orange-500 transition-colors duration-200 line-clamp-2">
																<a href="annonceDetails/{{$annonce->id}}">{{ $annonce->title }}</a>
															</h3>
															
															<!-- Rating -->
															<div class="flex items-center mb-3">
																<div class="flex text-orange-400">
																	<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
																		<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
																	</svg>
																	<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
																		<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
																	</svg>
																	<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
																		<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
																	</svg>
																	<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
																		<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
																	</svg>
																	<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
																		<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
																	</svg>
																</div>
																<span class="text-xs text-gray-500 ml-1">(24 reviews)</span>
															</div>
															
															<!-- Price with previous price -->
															<div class="flex items-center space-x-2">
																<span class="text-2xl font-bold text-orange-500">${{ number_format($annonce->price, 0, '.', ',') }}</span>
																<span class="text-sm text-gray-400 line-through">${{ number_format($annonce->price * 1.2, 0, '.', ',') }}</span>
																<span class="text-xs font-medium text-green-600 bg-green-100 rounded-full px-2 py-0.5">-20%</span>
															</div>
														</div>
														
														<!-- Call to action button -->
														<a href="annonceDetails/{{$annonce->id}}" class="mt-4 bg-orange-500 hover:bg-orange-600 text-white w-full py-3 rounded-xl font-medium text-sm flex items-center justify-center space-x-2 transition-all duration-300 transform hover:-translate-y-0.5 group focus:outline-none focus:ring-2 focus:ring-orange-300 focus:ring-offset-2">
															<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:animate-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor">
																<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
															</svg>
															<span>Show Annonce</span>
														</a>
													</div>
												</div>
											@endforeach
										</div>
									</div>
								</div>
								<!--/ End Single Tab -->
								<!-- Start Single Tab -->
								<div class="tab-pane fade" id="services" role="tabpanel">
									<div class="tab-single">
										<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
											@foreach ($annonces->where('category_id','=', 6)->take(4) as $annonce)
												<div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden flex flex-col h-[460px] group relative border border-gray-100">
													<!-- Wishlist button -->
													<button class="absolute top-4 right-4 z-10 bg-white rounded-full p-2 shadow-md hover:bg-gray-100 transition-colors duration-200">
														<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 hover:text-orange-500 transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
															<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
														</svg>
													</button>
													
													<!-- Image container with overlay effect -->
													<div class="relative w-full h-[240px] overflow-hidden">
														<a href="annonceDetails/{{$annonce->id}}" class="block w-full h-full">
															<div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-10 transition-opacity duration-300 z-10"></div>
															<img src="{{ $annonce->image }}" alt="{{ $annonce->title }}"
																 class="w-full h-full object-cover object-center transform group-hover:scale-110 transition-transform duration-700 ease-in-out">
														</a>
														
														<!-- Status badge -->
														<div class="absolute top-4 left-4 bg-orange-500 text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-lg flex items-center">
															<span class="w-2 h-2 bg-white rounded-full mr-1.5 animate-pulse"></span>
															NEW
														</div>
														
														<!-- Quick actions bar -->
														<div class="absolute left-0 right-0 bottom-0 bg-gradient-to-t from-black/70 to-transparent p-4 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300 flex justify-between items-center">
															<a href="{{ route('user.profile.view', $annonce->user->id) }}" class="text-white text-xs font-medium flex items-center hover:text-orange-300 transition-colors duration-200">
																<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
																	<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
																</svg>
																View Seller
															</a>
															<div class="flex space-x-2">
																<button class="bg-white/20 backdrop-blur-sm hover:bg-white/30 p-1.5 rounded-full transition-colors duration-200">
																	<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
																		<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
																		<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
																	</svg>
																</button>
																<button class="bg-white/20 backdrop-blur-sm hover:bg-white/30 p-1.5 rounded-full transition-colors duration-200">
																	<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
																		<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
																	</svg>
																</button>
															</div>
														</div>
													</div>
													
													<!-- Content with enhanced styling -->
													<div class="flex flex-col justify-between flex-1 p-5">
														<div>
															<!-- Category tag -->
															<div class="mb-2 text-xs font-medium">
																<span class="text-blue-600">{{$annonce->category->name}}</span>
															</div>
															
															<!-- Title -->
															<h3 class="text-lg font-semibold text-gray-800 leading-tight mb-2 hover:text-orange-500 transition-colors duration-200 line-clamp-2">
																<a href="annonceDetails/{{$annonce->id}}">{{ $annonce->title }}</a>
															</h3>
															
															<!-- Rating -->
															<div class="flex items-center mb-3">
																<div class="flex text-orange-400">
																	<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
																		<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
																	</svg>
																	<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
																		<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
																	</svg>
																	<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
																		<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
																	</svg>
																	<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
																		<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
																	</svg>
																	<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
																		<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
																	</svg>
																</div>
																<span class="text-xs text-gray-500 ml-1">(24 reviews)</span>
															</div>
															
															<!-- Price with previous price -->
															<div class="flex items-center space-x-2">
																<span class="text-2xl font-bold text-orange-500">${{ number_format($annonce->price, 0, '.', ',') }}</span>
																<span class="text-sm text-gray-400 line-through">${{ number_format($annonce->price * 1.2, 0, '.', ',') }}</span>
																<span class="text-xs font-medium text-green-600 bg-green-100 rounded-full px-2 py-0.5">-20%</span>
															</div>
														</div>
														
														<!-- Call to action button -->
														<a href="annonceDetails/{{$annonce->id}}" class="mt-4 bg-orange-500 hover:bg-orange-600 text-white w-full py-3 rounded-xl font-medium text-sm flex items-center justify-center space-x-2 transition-all duration-300 transform hover:-translate-y-0.5 group focus:outline-none focus:ring-2 focus:ring-orange-300 focus:ring-offset-2">
															<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:animate-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor">
																<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
															</svg>
															<span>Show Annonce</span>
														</a>
													</div>
												</div>
											@endforeach
										</div>
									</div>
								</div>
								<!--/ End Single Tab -->
							</div>
						</div>
					</div>
				</div>
            </div>
    </div>
	<!-- End Product Area -->
	
	<!-- Start Midium Banner  -->
	<section class="midium-banner">
		<div class="container">
			<div class="row">
				<!-- Single Banner  -->
				<div class="col-lg-6 col-md-6 col-12">
					<div class="single-banner">
						<img src="https://cdn.thewirecutter.com/wp-content/media/2024/11/BEST-LAPTOPS-PHOTO-VIDEO-EDITING-2048px-6.jpg" alt="#">
						<div class="content">
							<p>Man's Collectons</p>
							<h3>Man's items <br>Up to<span> 50%</span></h3>
							<a href="#">Shop Now</a>
						</div>
					</div>
				</div>
				<!-- /End Single Banner  -->
				<!-- Single Banner  -->
				<div class="col-lg-6 col-md-6 col-12">
					<div class="single-banner">
						<img src="https://via.placeholder.com/600x370" alt="#">
						<div class="content">
							<p>shoes women</p>
							<h3>mid season <br> up to <span>70%</span></h3>
							<a href="#" class="btn">Shop Now</a>
						</div>
					</div>
				</div>
				<!-- /End Single Banner  -->
			</div>
		</div>
	</section>
	<!-- End Midium Banner -->

	<!-- Start Most Popular -->
	<div class="product-area most-popular section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section-title">
						<h2>Hot Item</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<!-- Owl Carousel Container -->
					<div class="owl-carousel popular-slider">
						@foreach ($randomAnnonces as $annonce)
						<div class="bg-white rounded-lg shadow-md overflow-hidden mx-2 flex flex-col justify-between h-[400px] min-w-[250px] max-w-[270px]">
							
							<!-- Image -->
							<div class="h-[180px] relative overflow-hidden">
								<a href="product-details.html" class="block w-full h-full">
									<img class="object-cover w-full h-full transition-transform duration-300 hover:scale-105" src="{{ asset($annonce->image) }}" alt="Annonce Image">
									<span class="absolute top-2 left-2 bg-red-500 text-white text-xs px-2 py-1 rounded">Hot</span>
								</a>
							</div>
					
							<!-- Content -->
							<div class="flex flex-col justify-between flex-grow p-4">
								<div>
									<h3 class="text-sm font-semibold text-gray-800 truncate mb-1">
										<a href="product-details.html">{{ $annonce->title }}</a>
									</h3>
									<div class="text-lg font-bold text-green-600">{{ $annonce->price }} $</div>
								</div>
					
								<!-- Actions -->
								<div class="mt-4">
									<div class="flex items-center justify-between text-gray-500 text-xs mb-3">
										<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#" class="hover:text-blue-500 flex items-center gap-1">
											<i class="ti-eye"></i><span>View</span>
										</a>
										<a title="Wishlist" href="#" class="hover:text-pink-500 flex items-center gap-1">
											<i class="ti-heart"></i><span>Wish</span>
										</a>
										<a title="Compare" href="#" class="hover:text-purple-500 flex items-center gap-1">
											<i class="ti-bar-chart-alt"></i><span>Compare</span>
										</a>
									</div>
									<a href="/annonceDetails/{{$annonce->id}}" class="block text-center bg-orange-500 text-white text-sm py-2 rounded hover:bg-orange-600 transition">
										Show Annonce
									</a>
								</div>
							</div>
					
						</div>
						@endforeach
					</div>
									
				</div>
			</div>
		</div>
	</div>
	
	<!-- End Most Popular Area -->
	
	<!-- Start Cowndown Area -->
	<section class="cown-down">
		<div class="section-inner ">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-6 col-12 padding-right">
						<div class="image">
							<img src="https://cdn.thewirecutter.com/wp-content/media/2024/11/BEST-LAPTOPS-PHOTO-VIDEO-EDITING-2048px-6.jpg" alt="#">
						</div>	
					</div>	
					<div class="col-lg-6 col-12 padding-left">
						<div class="content">
							<div class="heading-block">
								<p class="small-title">Deal of day</p>
								<h3 class="title">Beatutyful dress for women</h3>
								<p class="text">Suspendisse massa leo, vestibulum cursus nulla sit amet, frungilla placerat lorem. Cars fermentum, sapien. </p>
								<h1 class="price">$1200 <s>$1890</s></h1>
								<div class="coming-time">
									<div class="clearfix" data-countdown="2021/02/30"></div>
								</div>
							</div>
						</div>	
					</div>	
				</div>
			</div>
		</div>
	</section>
	<!-- /End Cowndown Area -->
	
	<!-- Start Shop Services Area -->
	<section class="shop-services section home">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-rocket"></i>
						<h4>Free shiping</h4>
						<p>Orders over $100</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-reload"></i>
						<h4>Free Return</h4>
						<p>Within 30 days returns</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-lock"></i>
						<h4>Sucure Payment</h4>
						<p>100% secure payment</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-tag"></i>
						<h4>Best Peice</h4>
						<p>Guaranteed price</p>
					</div>
					<!-- End Single Service -->
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Services Area -->
	
	<!-- Start Shop Newsletter  -->
	<section class="shop-newsletter section">
		<div class="container">
			<div class="inner-top">
				<div class="row">
					<div class="col-lg-8 offset-lg-2 col-12">
						<!-- Start Newsletter Inner -->
						<div class="inner">
							<h4>Newsletter</h4>
							<p> Subscribe to our newsletter and get <span>10%</span> off your first purchase</p>
							<form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
								<input name="EMAIL" placeholder="Your email address" required="" type="email">
								<button class="btn">Subscribe</button>
							</form>
						</div>
						<!-- End Newsletter Inner -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Newsletter -->
	
	<!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row no-gutters">
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <!-- Product Slider -->
									<div class="product-gallery">
										<div class="quickview-slider-active">
											<div class="single-slider">
												<img src="https://via.placeholder.com/569x528" alt="#">
											</div>
											<div class="single-slider">
												<img src="https://via.placeholder.com/569x528" alt="#">
											</div>
											<div class="single-slider">
												<img src="https://via.placeholder.com/569x528" alt="#">
											</div>
											<div class="single-slider">
												<img src="https://via.placeholder.com/569x528" alt="#">
											</div>
										</div>
									</div>
								<!-- End Product slider -->
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="quickview-content">
                                    <h2>Flared Shift Dress</h2>
                                    <div class="quickview-ratting-review">
                                        <div class="quickview-ratting-wrap">
                                            <div class="quickview-ratting">
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <a href="#"> (1 customer review)</a>
                                        </div>
                                        <div class="quickview-stock">
                                            <span><i class="fa fa-check-circle-o"></i> in stock</span>
                                        </div>
                                    </div>
                                    <h3>$29.00</h3>
                                    <div class="quickview-peragraph">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam.</p>
                                    </div>
									<div class="size">
										<div class="row">
											<div class="col-lg-6 col-12">
												<h5 class="title">Size</h5>
												<select>
													<option selected="selected">s</option>
													<option>m</option>
													<option>l</option>
													<option>xl</option>
												</select>
											</div>
											<div class="col-lg-6 col-12">
												<h5 class="title">Color</h5>
												<select>
													<option selected="selected">orange</option>
													<option>purple</option>
													<option>black</option>
													<option>pink</option>
												</select>
											</div>
										</div>
									</div>
                                    <div class="quantity">
										<!-- Input Order -->
										<div class="input-group">
											<div class="button minus">
												<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
													<i class="ti-minus"></i>
												</button>
											</div>
											<input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1">
											<div class="button plus">
												<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
													<i class="ti-plus"></i>
												</button>
											</div>
										</div>
										<!--/ End Input Order -->
									</div>
									<div class="add-to-cart">
										<a href="#" class="btn">Add to cart</a>
										<a href="#" class="btn min"><i class="ti-heart"></i></a>
										<a href="#" class="btn min"><i class="fa fa-compress"></i></a>
									</div>
                                    <div class="default-social">
										<h4 class="share-now">Share:</h4>
                                        <ul>
                                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                            <li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- Modal end -->

@endsection