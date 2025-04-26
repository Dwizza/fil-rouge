@extends('layouts.company')
@section('dashboard.company')
<!-- cards -->
<div class="w-full px-6 py-6 mx-auto dark">
  <!-- row 1 -->
  <div class="flex flex-wrap -mx-3">
  <!-- card1 -->
  <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
    <div class="relative flex flex-col min-w-0 break-words bg-slate-900 shadow-xl rounded-2xl bg-clip-border border border-slate-800 hover:shadow-slate-700/50 transition-all duration-300">
    <div class="flex-auto p-5">
      <div class="flex flex-row -mx-3">
      <div class="flex-none w-2/3 max-w-full px-3">
        <div>
        <p class="mb-1 font-sans text-sm font-semibold leading-normal uppercase text-white opacity-70">Total Annonces</p>
        <h5 class="mb-2 font-bold text-white text-xl">{{$stats['total_annonces']}}</h5>
        <span class="text-xs text-white/60 flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          <span class="font-bold text-blue-400 mr-1">Complet</span>
        </span>
        </div>
      </div>
      <div class="px-3 text-right basis-1/3">
        <div class="inline-block w-14 h-14 text-center rounded-full bg-gradient-to-br from-blue-600 to-indigo-600 shadow-lg shadow-blue-500/30 flex items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
          </svg>
        </div>
      </div>
      </div>
    </div>
    </div>
  </div>

  <!-- card2 -->
  <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
    <div class="relative flex flex-col min-w-0 break-words bg-slate-900 shadow-xl rounded-2xl bg-clip-border border border-slate-800 hover:shadow-slate-700/50 transition-all duration-300">
    <div class="flex-auto p-5">
      <div class="flex flex-row -mx-3">
      <div class="flex-none w-2/3 max-w-full px-2">
        <div>
        <p class="mb-1 font-sans text-sm font-semibold leading-normal uppercase text-white opacity-70">Published Annonces</p>
        <h5 class="mb-2 font-bold text-white text-xl">{{$stats['published_annonces']}}</h5>
        <span class="text-xs text-white/60 flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
          </svg>
          <span class="font-bold text-green-400 mr-1">Visible</span>public
        </span>
        </div>
      </div>
      <div class="px-3 text-right basis-1/3">
        <div class="inline-block w-14 h-14 text-center rounded-full bg-gradient-to-br from-red-500 to-rose-500 shadow-lg shadow-red-500/30 flex items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
          </svg>
        </div>
      </div>
      </div>
    </div>
    </div>
  </div>

  <!-- card3 -->
  <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
    <div class="relative flex flex-col min-w-0 break-words bg-slate-900 shadow-xl rounded-2xl bg-clip-border border border-slate-800 hover:shadow-slate-700/50 transition-all duration-300">
    <div class="flex-auto p-5">
      <div class="flex flex-row -mx-3">
      <div class="flex-none w-2/3 max-w-full px-2">
        <div>
        <p class="mb-1 font-sans text-sm font-semibold leading-normal uppercase text-white opacity-70">Archived Annonces</p>
        <h5 class="mb-2 font-bold text-white text-xl">{{$stats['archived_annonces']}}</h5>
        <span class="text-xs text-white/60 flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
          </svg>
          <span class="font-bold text-amber-400 mr-1">Stockées</span>
        </span>
        </div>
      </div>
      <div class="px-3 text-right basis-1/3">
        <div class="inline-block w-14 h-14 text-center rounded-full bg-gradient-to-br from-emerald-500 to-teal-500 shadow-lg shadow-emerald-500/30 flex items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
          </svg>
        </div>
      </div>
      </div>
    </div>
    </div>
  </div>

  <!-- card4 -->
  <div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/4">
    <div class="relative flex flex-col min-w-0 break-words bg-slate-900 shadow-xl rounded-2xl bg-clip-border border border-slate-800 hover:shadow-slate-700/50 transition-all duration-300">
    <div class="flex-auto p-5">
      <div class="flex flex-row -mx-3">
      <div class="flex-none w-2/3 max-w-full px-3">
        <div>
        <p class="mb-1 font-sans text-sm font-semibold leading-normal uppercase text-white opacity-70">Total balance</p>
        <h5 class="mb-2 font-bold text-white text-xl">{{ number_format($stats['total_revenue'],2)}} USD</h5>
        <span class="text-xs text-white/60 flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
          </svg>
          <span class="font-bold text-emerald-400 mr-1">+8%</span> total revenue
        </span>
        </div>
      </div>
      <div class="px-3 text-right basis-1/3">
        <div class="inline-block w-14 h-14 text-center rounded-full bg-gradient-to-br from-orange-500 to-yellow-500 shadow-lg shadow-orange-500/30 flex items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </div>
      </div>
      </div>
    </div>
    </div>
  </div>
  </div>

  <!-- cards row 2 -->
  <div class="flex flex-wrap mt-6 -mx-3">
  <div class="w-full max-w-full px-3 mt-0 lg:w-7/12 lg:flex-none">
    <div class="bg-slate-900 shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border border-slate-800 bg-clip-border hover:shadow-slate-700/30 transition-all duration-300">
    <div class="mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
      <h6 class="capitalize text-white font-semibold">Aperçu des ventes</h6>
      <p class="mb-0 text-sm leading-normal text-white/60 flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
        </svg>
        <span class="font-semibold text-emerald-400">+4%</span> comparé à 2024
      </p>
    </div>
    <div class="flex-auto p-4">
      <div class="chart-container" style="position: relative; height:300px; width:100%">
        <canvas id="chart-line" height="300"></canvas>
      </div>
    </div>
    </div>
  </div>

  <div class="w-full max-w-full px-3 lg:w-5/12 lg:flex-none">
    <div slider class="relative w-full h-full overflow-hidden rounded-2xl bg-slate-900 border border-slate-800 shadow-xl hover:shadow-slate-700/30 transition-all duration-300">
    <!-- slide 1 -->
    <div slide class="absolute w-full h-full transition-all duration-500">
      <img class="object-cover h-full w-full opacity-70" src="https://img.freepik.com/vecteurs-libre/dropshipper-recoit-commande-illustration-vectorielle-concept-abstrait-gestion-chaine-approvisionnement-drop-shipping-marketing-details-expedition-recevoir-transferer-commande-ligne-achat-metaphore-abstraite_335657-6130.jpg?uid=R22602410&ga=GA1.1.734679090.1745678935&semt=ais_hybrid&w=740" alt="carousel image" />
      <div class="block text-start ml-12 left-0 bottom-0 absolute right-[15%] pt-5 pb-5 text-white">
      <div class="inline-block w-12 h-12 mb-4 text-center text-white bg-gradient-to-br from-blue-600 to-indigo-600 shadow-lg shadow-blue-500/30 bg-center rounded-xl flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
      </div>
      <h5 class="mb-2 text-xl font-bold text-white">Commencez avec JOTEA</h5>
      <p class="opacity-80 text-white/70">Publiez votre première annonce et atteignez plus de clients potentiels.</p>
      </div>
    </div>

    <!-- slide 2 -->
    <div slide class="absolute w-full h-full transition-all duration-500">
      <img class="object-cover h-full w-full opacity-70" src="https://cdn.prod.website-files.com/67409840f844f3931fdc9dd6/6781a2b4d743e9460fc7e524_65b8e1a39d4e2b681a834c1c_OG%2520Image%2520(21).webp" alt="carousel image" />
      <div class="block text-start ml-12 left-0 bottom-0 absolute right-[15%] pt-5 pb-5 text-white">
      <div class="inline-block w-12 h-12 mb-4 text-center text-white bg-gradient-to-br from-red-500 to-rose-500 shadow-lg shadow-red-500/30 bg-center rounded-xl flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
        </svg>
      </div>
      <h5 class="mb-2 text-xl font-bold text-white">Un moyen plus rapide de créer des annonces</h5>
      <p class="opacity-80 text-white/70">Utilisez nos modèles pour créer des annonces attrayantes en quelques minutes.</p>
      </div>
    </div>

    <!-- slide 3 -->
    <div slide class="absolute w-full h-full transition-all duration-500">
      <img class="object-cover h-full w-full opacity-70" src="https://media.licdn.com/dms/image/v2/D4D12AQEgovRQHS4sDw/article-cover_image-shrink_720_1280/article-cover_image-shrink_720_1280/0/1677394614625?e=2147483647&v=beta&t=w6_PtG6QyLKtheQNsORS5fdrlngzTLeE6aKRqspt6Ys" alt="carousel image" />
      <div class="block text-start ml-12 left-0 bottom-0 absolute right-[15%] pt-5 pb-5 text-white">
      <div class="inline-block w-12 h-12 mb-4 text-center text-white bg-gradient-to-br from-emerald-500 to-teal-500 shadow-lg shadow-emerald-500/30 bg-center rounded-xl flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
        </svg>
      </div>
      <h5 class="mb-2 text-xl font-bold text-white">Partagez votre expérience avec nous!</h5>
      <p class="opacity-80 text-white/70">Vos retours nous aident à améliorer constamment notre plateforme.</p>
      </div>
    </div>

    <!-- Control buttons -->
    <button btn-next class="absolute z-10 w-10 h-10 p-2 text-lg text-white bg-slate-900/60 rounded-full border-none opacity-70 cursor-pointer hover:opacity-100 transition-opacity right-4 top-1/2 transform -translate-y-1/2">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
      </svg>
    </button>
    <button btn-prev class="absolute z-10 w-10 h-10 p-2 text-lg text-white bg-slate-900/60 rounded-full border-none opacity-70 cursor-pointer hover:opacity-100 transition-opacity left-4 top-1/2 transform -translate-y-1/2">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
      </svg>
    </button>
    </div>
  </div>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  // Configuration du graphique
  document.addEventListener('DOMContentLoaded', function () {
    // Préparation des données pour le graphique à partir des revenus quotidiens
    const dailyRevenueData = @json($stats['daily_revenue']);
    
    // Extraire les dates et les montants
    const dates = dailyRevenueData.map(item => item.date);
    const amounts = dailyRevenueData.map(item => item.total);
    
    // Graphique des ventes
    var ctx = document.getElementById('chart-line').getContext('2d');
    var chart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: dates,
        datasets: [{
          label: 'Revenus quotidiens',
          tension: 0.4,
          borderWidth: 3,
          borderColor: 'rgba(59, 130, 246, 0.8)',
          backgroundColor: 'rgba(59, 130, 246, 0.3)',
          fill: true,
          pointRadius: 3,
          pointBackgroundColor: 'rgba(59, 130, 246, 1)',
          pointBorderColor: 'transparent',
          pointHoverRadius: 5,
          data: amounts
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          },
          tooltip: {
            callbacks: {
              title: function(context) {
                return context[0].label;
              },
              label: function(context) {
                return context.raw + ' USD';
              }
            },
            backgroundColor: '#000',
            titleColor: '#fff',
            bodyColor: 'rgba(255,255,255,0.8)',
            borderColor: 'rgba(59, 130, 246, 0.3)',
            borderWidth: 1,
            usePointStyle: true
          }
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              color: 'rgba(255, 255, 255, 0.1)'
            },
            ticks: {
              color: 'rgba(255, 255, 255, 0.7)',
              padding: 10,
              callback: function(value) {
                return value + ' USD';
              },
              font: {
                size: 12,
                family: 'Open Sans',
                weight: 400
              }
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false
            },
            ticks: {
              color: 'rgba(255, 255, 255, 0.7)',
              padding: 10,
              font: {
                size: 12,
                family: 'Open Sans',
                weight: 400
              }
            }
          }
        }
      }
    });

    // Configuration du slider
    const slider = document.querySelector('[slider]');
    const slides = slider.querySelectorAll('[slide]');
    const btnNext = slider.querySelector('[btn-next]');
    const btnPrev = slider.querySelector('[btn-prev]');
    let currentSlide = 0;
    const totalSlides = slides.length;

    // Initialisation des slides
    function initSlides() {
      slides.forEach((slide, index) => {
        if (index === 0) {
          slide.style.opacity = '1';
          slide.style.transform = 'translateX(0)';
        } else {
          slide.style.opacity = '0';
          slide.style.transform = 'translateX(100%)';
        }
      });
    }

    // Fonction pour naviguer vers le slide suivant
    function goToNextSlide() {
      slides[currentSlide].style.transform = 'translateX(-100%)';
      slides[currentSlide].style.opacity = '0';
      
      currentSlide = (currentSlide + 1) % totalSlides;
      
      slides[currentSlide].style.transform = 'translateX(0)';
      slides[currentSlide].style.opacity = '1';
    }

    // Fonction pour naviguer vers le slide précédent
    function goToPrevSlide() {
      slides[currentSlide].style.transform = 'translateX(100%)';
      slides[currentSlide].style.opacity = '0';
      
      currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
      
      slides[currentSlide].style.transform = 'translateX(0)';
      slides[currentSlide].style.opacity = '1';
    }

    // Initialisation du slider
    initSlides();

    // Écoute des événements pour les boutons
    btnNext.addEventListener('click', goToNextSlide);
    btnPrev.addEventListener('click', goToPrevSlide);

    // Changement de slide automatique toutes les 5 secondes
    setInterval(goToNextSlide, 5000);
  });
</script>

@endsection
