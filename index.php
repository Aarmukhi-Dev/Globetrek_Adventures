<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GlobeTrek Adventures</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;800&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- HERO SECTION-->

<section class="hero-section">
    

    <!-- Carousel -->
    <div id="heroCarousel"
         class="carousel slide carousel-fade"
         data-bs-ride="carousel"
         data-bs-interval="4000">

        <div class="carousel-inner">

            <!-- Slide 1 -->
            <div class="carousel-item active">

                <img src="images/hero01.jpg"
                     class="d-block w-100 hero-img"
                     alt="Hero Image">

                <div class="overlay"></div>

                <div class="carousel-caption custom-caption">

                    <h1 class="hero-title">
                        Explore The World <br>
                        With GlobeTrek
                    </h1>

                    <p class="hero-text">
                        Discover unforgettable travel experiences
                        and beautiful destinations.
                    </p>

                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">

                <img src="images/hero02.jpg"
                     class="d-block w-100 hero-img"
                     alt="Hero Image">

                <div class="overlay"></div>

                <div class="carousel-caption custom-caption">

                    <h1 class="hero-title">
                        Luxury Travel <br>
                        Experiences
                    </h1>

                    <p class="hero-text">
                        Enjoy premium vacations and world-class destinations.
                    </p>

                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item">

                <img src="images/hero03.jpg"
                     class="d-block w-100 hero-img"
                     alt="Hero Image">

                <div class="overlay"></div>

                <div class="carousel-caption custom-caption">

                    <h1 class="hero-title">
                        Adventure Starts <br>
                        Here
                    </h1>

                    <p class="hero-text">
                        Discover hidden gems around the globe.
                    </p>

                </div>
            </div>

            <!-- Slide 4 -->
            <div class="carousel-item">

                <img src="images/hero04.jpg"
                     class="d-block w-100 hero-img"
                     alt="Hero Image">

                <div class="overlay"></div>

                <div class="carousel-caption custom-caption">

                    <h1 class="hero-title">
                        Travel Beyond <br>
                        Limits
                    </h1>

                    <p class="hero-text">
                        Make unforgettable memories with GlobeTrek Adventures.
                    </p>

                </div>
            </div>

        </div>

        <!-- Previous Button -->
        <button class="carousel-control-prev"
                type="button"
                data-bs-target="#heroCarousel"
                data-bs-slide="prev">

            <span class="carousel-control-prev-icon"></span>

        </button>

        <!-- Next Button -->
        <button class="carousel-control-next"
                type="button"
                data-bs-target="#heroCarousel"
                data-bs-slide="next">

            <span class="carousel-control-next-icon"></span>

        </button>

    </div>

</section>

<!--BOOKING BOX-->
<section class="booking-section">
    <div class="container site-container">
        <div class="booking-box">

            <div class="row g-3">

                <div class="col-md-3" style="position:relative;">
                    <input type="text"
                           id="gt-dest"
                           class="form-control"
                           placeholder="Destination"
                           autocomplete="off">
                    <ul id="gt-dest-list" style="
                        display:none;
                        position:absolute;
                        top:calc(100% + 6px);
                        left:0; right:0;
                        background:#0e2d2f;
                        border:1px solid rgba(216,255,95,0.25);
                        border-radius:14px;
                        list-style:none;
                        margin:0; padding:6px 0;
                        z-index:9999;
                        box-shadow:0 12px 30px rgba(0,0,0,0.3);
                    "></ul>
                </div>

                <div class="col-md-3">
                    <input type="date"
                           id="gt-date"
                           class="form-control">
                </div>

                <div class="col-md-3">
                    <select id="gt-guests" class="form-select">
                        <option value="">Guests</option>
                        <option value="1">1 Guest</option>
                        <option value="2">2 Guests</option>
                        <option value="3">3 Guests</option>
                        <option value="4">4 Guests</option>
                        <option value="5">5+ Guests</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <button class="search-btn" id="gt-search-btn">
                        🔍 Search
                    </button>
                </div>

            </div>

        </div>
    </div>

    <!-- Results Panel -->
    <div class="container site-container" id="gt-results-wrap" style="display:none; margin-top:16px;">
        <div style="
            background:rgba(14,45,47,0.97);
            border:1px solid rgba(216,255,95,0.2);
            border-radius:22px;
            padding:28px 32px;
        ">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:22px;">
                <span id="gt-results-title" style="color:#d8ff5f; font-size:18px; font-weight:700;"></span>
                <button onclick="document.getElementById('gt-results-wrap').style.display='none'" style="
                    background:rgba(255,255,255,0.08);
                    border:1px solid rgba(255,255,255,0.15);
                    color:#fff; padding:8px 18px;
                    border-radius:50px; font-size:13px;
                    cursor:pointer;
                ">✕ Close</button>
            </div>
            <div id="gt-results-grid" style="
                display:grid;
                grid-template-columns:repeat(auto-fill, minmax(230px,1fr));
                gap:18px;
            "></div>
        </div>
    </div>

</section>

<script>
(function(){

    var PACKAGES = [
        { name:"Maldives",   country:"Maldives",     tag:"Luxury",    price:1500, img:"images/maldives.jpg",  url:"booking.php?package=Maldives+Escape" },
        { name:"Swiss Alps", country:"Switzerland",  tag:"Mountain",  price:1200, img:"images/swissalps.jpg", url:"booking.php?package=Swiss+Alps+Highland" },
        { name:"Tokyo",      country:"Japan",        tag:"Popular",   price:1100, img:"images/japan.jpg",     url:"booking.php?package=Tokyo+Adventure" },
        { name:"Bali",       country:"Indonesia",    tag:"Trending",  price:950,  img:"images/bali.jpg",      url:"booking.php?package=Bali+Retreat" },
        { name:"Greece",     country:"Greece",       tag:"Premium",   price:1800, img:"images/Greece.jpg",    url:"booking.php?package=Greece+Premium+Stay" },
        { name:"Paris",      country:"France",       tag:"Luxury",    price:1300, img:"images/paris.jpg",     url:"booking.php?package=Paris+Getaway" },
        { name:"Sydney",     country:"Australia",    tag:"Adventure", price:1400, img:"images/packages-sydney.jpg", url:"booking.php?package=Sydney+Explorer" },
        { name:"Italy",      country:"Italy",        tag:"Cultural",  price:1250, img:"images/packages-italy.png",  url:"booking.php?package=Italy+Coastal" }
    ];

    /* --- set min date --- */
    var tomorrow = new Date();
    tomorrow.setDate(tomorrow.getDate()+1);
    document.getElementById('gt-date').min = tomorrow.toISOString().split('T')[0];

    /* --- autocomplete --- */
    var destInput = document.getElementById('gt-dest');
    var destList  = document.getElementById('gt-dest-list');

    destInput.addEventListener('input', function(){
        var q = this.value.trim().toLowerCase();
        destList.innerHTML = '';
        if(!q){ destList.style.display='none'; return; }

        var matches = PACKAGES.filter(function(p){
            return (p.name+' '+p.country).toLowerCase().indexOf(q) !== -1;
        });

        if(!matches.length){ destList.style.display='none'; return; }

        matches.forEach(function(p){
            var li = document.createElement('li');
            li.textContent = p.name + ' — ' + p.country;
            li.style.cssText = 'padding:11px 18px; color:#fff; font-size:14px; cursor:pointer; transition:.2s;';
            li.addEventListener('mouseenter', function(){ this.style.color='#d8ff5f'; this.style.background='rgba(216,255,95,0.1)'; });
            li.addEventListener('mouseleave', function(){ this.style.color='#fff'; this.style.background='none'; });
            li.addEventListener('mousedown',  function(e){
                e.preventDefault();
                destInput.value = p.name;
                destList.style.display='none';
            });
            destList.appendChild(li);
        });
        destList.style.display='block';
    });

    document.addEventListener('click', function(e){
        if(e.target !== destInput) destList.style.display='none';
    });

    /* --- search --- */
    document.getElementById('gt-search-btn').addEventListener('click', function(){
        var q      = destInput.value.trim().toLowerCase();
        var date   = document.getElementById('gt-date').value;
        var guests = document.getElementById('gt-guests').value;

        if(!q){
            destInput.style.borderColor='#ff3b30';
            destInput.focus();
            setTimeout(function(){ destInput.style.borderColor=''; }, 1500);
            return;
        }

        var matches = PACKAGES.filter(function(p){
            return (p.name+' '+p.country+' '+p.tag).toLowerCase().indexOf(q) !== -1;
        });

        var wrap  = document.getElementById('gt-results-wrap');
        var grid  = document.getElementById('gt-results-grid');
        var title = document.getElementById('gt-results-title');

        var label = 'Results for "' + destInput.value + '"';
        if(date)   label += ' · ' + date;
        if(guests) label += ' · ' + guests;
        title.textContent = label;

        grid.innerHTML = '<div style="color:#d8ff5f;text-align:center;padding:30px;grid-column:1/-1;">Searching...</div>';
        wrap.style.display = 'block';
        wrap.scrollIntoView({behavior:'smooth', block:'nearest'});

        setTimeout(function(){
            if(!matches.length){
                grid.innerHTML = '<div style="color:rgba(255,255,255,0.5);text-align:center;padding:30px;grid-column:1/-1;">No packages found for "<strong style=\'color:#d8ff5f\'>' + destInput.value + '</strong>". Try Maldives, Bali, Tokyo or Paris.</div>';
                return;
            }

            grid.innerHTML = matches.map(function(p){
                return '<div onclick="window.location=\''+p.url+'\'" style="background:rgba(255,255,255,0.06);border:1px solid rgba(255,255,255,0.1);border-radius:18px;overflow:hidden;cursor:pointer;transition:.25s;" onmouseover="this.style.borderColor=\'rgba(216,255,95,0.45)\';this.style.transform=\'translateY(-4px)\'" onmouseout="this.style.borderColor=\'rgba(255,255,255,0.1)\';this.style.transform=\'none\'">'
                    + '<img src="'+p.img+'" style="width:100%;height:140px;object-fit:cover;display:block;" onerror="this.style.display=\'none\'">'
                    + '<div style="padding:14px 16px;">'
                    + '<span style="background:rgba(216,255,95,0.15);color:#d8ff5f;font-size:11px;font-weight:700;padding:3px 10px;border-radius:20px;text-transform:uppercase;letter-spacing:.5px;">'+p.tag+'</span>'
                    + '<p style="color:#fff;font-size:16px;font-weight:700;margin:8px 0 4px;">'+p.name+'</p>'
                    + '<p style="color:rgba(255,255,255,0.5);font-size:13px;margin:0 0 12px;">📍 '+p.country+'</p>'
                    + '<div style="display:flex;justify-content:space-between;align-items:center;">'
                    + '<span style="color:#d8ff5f;font-size:18px;font-weight:700;">$'+p.price+' <span style="color:rgba(255,255,255,0.4);font-size:12px;font-weight:400;">/person</span></span>'
                    + '<a href="'+p.url+'" style="background:#d8ff5f;color:#0e2d2f;border:none;padding:8px 16px;border-radius:10px;font-size:13px;font-weight:700;text-decoration:none;">Book Now</a>'
                    + '</div></div></div>';
            }).join('');
        }, 500);
    });

    /* --- enter key --- */
    destInput.addEventListener('keydown', function(e){
        if(e.key === 'Enter') document.getElementById('gt-search-btn').click();
    });

})();
</script>

<!-- WHY CHOOSE US -->
<section class="why-choose-us">
     <div class="container site-container">

        <div class="row align-items-center">

            <!-- Left Side -->
            <div class="col-lg-6">
                <div class="why-content">

                    <h2>Why Travelers Choose <br>
                        GlobeTrek Adventures</h2>

                    <p>
                        From tropical beaches to mountain escapes, we make travel <br>
                        easier, safer, and more exciting with carefully crafted <br>
                        itineraries and dedicated customer support.
                    </p>
                    <br>

                    <div class="why-social-icons">
                        <a href="https://www.instagram.com/icbtsrilanka/?hl=en"><i class="bi bi-instagram"></i></a>
                        <a href="https://twitter.com/icbtsrilanka"><i class="bi bi-twitter-x"></i></a>
                        <a href="https://www.facebook.com/icbtsrilanka"><i class="bi bi-facebook"></i></a>
                    </div>

                    <div class="stats-row">

                        <div class="stat-box">
                            <i class="bi bi-people-fill"></i>
                            <h3>12K+</h3>
                            <p>Happy Travelers</p>
                        </div>

                        <div class="stat-box">
                            <i class="bi bi-award-fill"></i>
                            <h3>10+</h3>
                            <p>Years Experience</p>
                        </div>

                        <div class="stat-box">
                            <i class="bi bi-geo-alt-fill"></i>
                            <h3>50+</h3>
                            <p>Destinations</p>
                        </div>

                    </div>

                </div>
            </div>

            <!-- Right Side -->
            <div class="col-lg-6">

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-map"></i>
                    </div>

                    <div>
                        <h5>Local Expertise</h5>
                        <p>
                            Our travel experts craft unique experiences with
                            insider knowledge of every destination.
                        </p>
                    </div>
                </div>

                <div class="feature-card2">
                    <div class="feature-icon">
                        <i class="bi bi-calendar-check"></i>
                    </div>

                    <div>
                        <h5>All-in-One Booking</h5>
                        <p>
                            Book flights, hotels, and tours in one place
                            with a simple booking process.
                        </p>
                    </div>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-headset"></i>
                    </div>

                    <div>
                        <h5>24/7 Support</h5>
                        <p>
                            Our team is available anytime to help before,
                            during, and after your trip.
                        </p>
                    </div>
                </div>

            </div>

        </div>

    </div>
</section>

<!--DESTINATION SECTION -->

<section class="destination-section" >


     <div class="container site-container">
        <div class="section-title">
            <h2>Our Expertise</h2>
        </div>


        <div class="destination-wrapper">

            <!-- CARD 1 -->
            <div class="modern-card card-small">

                <img src="images/swissalps.jpg" alt="Swiss Alps">

                <div class="modern-overlay">

                    <span class="card-tag">
                        Newly Listed
                    </span>

                    <div class="modern-content">

                        <h3>
                            Swiss Alps<br>
                            Highland
                        </h3>

                        <p>
                            Winter Chalets
                        </p>

                        <div class="card-bottom">

                            <h4>$1200</h4>

                            <a href="booking.php" class="reserve-btn">
                                Reserve
                            </a>

                        </div>

                    </div>

                </div>

            </div>

            <!-- CARD 2 -->
            <div class="modern-card card-large">

                <img src="images/maldives.jpg" alt="Maldives">

                <div class="modern-overlay">

                    <span class="card-tag">
                        Prime Pick
                    </span>

                    <div class="modern-content">

                        <h3>
                            Maldives<br>
                            Escape
                        </h3>

                        <p>
                            Luxury Villa
                        </p>

                        <div class="card-bottom">

                            <h4>$1500</h4>

                            <a href="booking.php" class="reserve-btn">
                                Reserve
                            </a>

                        </div>

                    </div>

                </div>

            </div>

            <!-- CARD 3 -->
            <div class="modern-card card-small">

                <img src="images/paris.jpg" alt="Paris">

                <div class="modern-overlay">

                    <span class="card-tag">
                        Luxury
                    </span>

                    <div class="modern-content">

                        <h3>
                            The Hill<br>
                            Guest House
                        </h3>

                        <p>
                            Paris, France
                        </p>

                        <div class="card-bottom">

                            <h4>$620</h4>

                            <a href="booking.php"
                               class="reserve-btn white-btn">

                                Book Now

                            </a>

                        </div>

                    </div>

                </div>

            </div>

            <!-- CARD 4 -->
            <div class="modern-card card-small">

                <img src="images/bali.jpg" alt="Bali">

                <div class="modern-overlay">

                    <span class="card-tag">
                        Trending
                    </span>

                    <div class="modern-content">

                        <h3>
                            Bali<br>
                            Paradise
                        </h3>

                        <p>
                            Lake Bratan
                        </p>

                        <div class="card-bottom">

                            <h4>$950</h4>

                            <a href="booking.php" class="reserve-btn">
                                Reserve
                            </a>

                        </div>

                    </div>

                </div>

            </div>

            <!-- CARD 5 -->
            <div class="modern-card card-large">

                <img src="images/Greece.jpg" alt="Greece">

                <div class="modern-overlay">

                    <span class="card-tag">
                        Popular
                    </span>

                    <div class="modern-content">

                        <h3>
                            Greece<br>
                            Premium Stay
                        </h3>

                        <p>
                            Sea View Resort
                        </p>

                        <div class="card-bottom">

                            <h4>$1800</h4>

                            <a href="booking.php" class="reserve-btn">
                                Reserve
                            </a>

                        </div>

                    </div>

                </div>

            </div>

            <!-- CARD 6 -->
            <div class="modern-card card-small">

                <img src="images/japan.jpg" alt="Japan">

                <div class="modern-overlay">

                    <span class="card-tag">
                        Top Rated
                    </span>

                    <div class="modern-content">

                        <h3>
                            Tokyo<br>
                            Experience
                        </h3>

                        <p>
                            Tokyo, Japan
                        </p>

                        <div class="card-bottom">

                            <h4>$1100</h4>

                            <a href="booking.php"
                               class="reserve-btn white-btn">

                                Book Now

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- EXPERTISE -->

<section class="expertise-section">

    <div class="container">

        <div class="section-title">
            <h2>Our Expertise</h2>
        </div>

        <div class="expertise-grid">

            <div class="expertise-card">

                <i class="fas fa-plane"></i>

                <h3>Luxury Tours</h3>

                <p>
                    Premium travel experiences tailored to your preferences.
                </p>

            </div>

            <div class="expertise-card">

                <i class="fas fa-hotel"></i>

                <h3>Accommodation</h3>

                <p>
                    Carefully selected luxury hotels and resorts worldwide.
                </p>

            </div>

            <div class="expertise-card">

                <i class="fas fa-map-marked-alt"></i>

                <h3>Custom Itineraries</h3>

                <p>
                    Personalized travel plans designed by professionals.
                </p>

            </div>

            <div class="expertise-card">

                <i class="fas fa-headset"></i>

                <h3>24/7 Support</h3>

                <p>
                    Dedicated assistance throughout your journey.
                </p>

            </div>

        </div>

    </div>

</section>


<!-- PARTNERS -->

<section class="partners-section">
    <div class="container">

        <div class="section-title">
            <h2>Trusted Partners</h2>
            <p>Working with world-class travel and hospitality brands.</p>
        </div>

        <div class="partners-slider">

            <div class="partners-track">

                <!-- First Set -->
                <img src="images/partners/hilton.png" alt="Hilton">
                <img src="images/partners/marriott.png" alt="Marriott">
                <img src="images/partners/emirates.png" alt="Emirates">
                <img src="images/partners/qatar.png" alt="Qatar Airways">
                <img src="images/partners/booking.png" alt="Booking">
                <img src="images/partners/tripadvisor.png" alt="TripAdvisor">
                <img src="images/partners/Singapore Airlines.png" alt="Singapore Airlines">

                <!-- Duplicate Set -->
                <img src="images/partners/hilton.png" alt="Hilton">
                <img src="images/partners/marriott.png" alt="Marriott">
                <img src="images/partners/emirates.png" alt="Emirates">
                <img src="images/partners/qatar.png" alt="Qatar Airways">
                <img src="images/partners/booking.png" alt="Booking">
                <img src="images/partners/tripadvisor.png" alt="TripAdvisor">
                <img src="images/partners/Singapore Airlines.png" alt="Singapore Airlines">

            </div>

        </div>

    </div>
</section>


<!-- CTA -->

<section class="cta-section">

    <div class="container">

        <h2>Start Your Next Adventure Today</h2>

        <p>
            Explore premium destinations with GlobeTrek Adventures.
        </p>

        <a href="packages.php" class="cta-btn">
            Explore Packages
        </a>

    </div>

</section>

<?php include 'includes/footer.php'; ?>

<!-- WHATSAPP BUTTON -->

<a href="https://wa.me/94776844243"
   class="whatsapp-float"
   target="_blank">

    <i class="bi bi-whatsapp"></i>
        <span class="whatsapp-text">
          How can I help you?
        </span>
</a>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

