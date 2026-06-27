<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Packages | GlobeTrek Adventures</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Packages Hero -->
<section class="packages-hero">

    <div class="hero-overlay"></div>

    <div class="container packages-hero-content">
        <h1>Explore Travel Packages</h1>
        <p>Explore premium destinations and unforgettable adventures worldwide.</p>
    </div>

    <!-- SEARCH BOX INSIDE HERO -->
    <div class="package-search-wrapper">
        <div class="container site-container">
            <div class="package-search-box">
                <div class="row g-3 align-items-center">

                    <div class="col-md-6">
                        <input type="text"
                               id="pkg-search-input"
                               class="form-control"
                               placeholder="Search Destination"
                               autocomplete="off">
                    </div>

                    <div class="col-md-4">
                        <select id="pkg-category" class="form-select">
                            <option value="">Category</option>
                            <option value="luxury">Luxury</option>
                            <option value="mountain">Mountain</option>
                            <option value="popular">Popular</option>
                            <option value="trending">Trending</option>
                            <option value="premium">Premium</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <button class="search-btn" id="pkg-search-btn">
                            Search
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>

</section>

<!-- POSTER CARDS -->
<section class="poster-packages">

    <a href="package-details.php?destination=paris" class="poster-card paris-card">
        <div class="card-overlay"></div>
        <div class="poster-header">
            <h2>PARIS</h2>
            <p>City of Lights</p>
        </div>
        <img src="images/packages-paris.jpg" alt="Paris">
    </a>

    <a href="package-details.php?destination=sydney" class="poster-card sydney-card">
        <div class="card-overlay"></div>
        <div class="poster-header">
            <h2>SYDNEY</h2>
            <p>Adventure & Beaches</p>
        </div>
        <img src="images/packages-sydney.jpg" alt="Sydney">
    </a>

    <a href="package-details.php?destination=tokyo" class="poster-card tokyo-card">
        <div class="card-overlay"></div>
        <div class="poster-header">
            <h2>Italy</h2>
            <p>Coastal Village Harbor</p>
        </div>
        <img src="images/japan.jpg" alt="Tokyo">
    </a>

</section>

<!-- PACKAGES GRID -->
<section class="packages-section">
    <div class="container site-container">

        <!-- No Results Message -->
        <div id="pkg-no-results" style="display:none; text-align:center; padding:60px 20px;">
            <p style="color:#0e2d2f; font-size:20px; font-weight:700; margin-bottom:10px;">No packages found.</p>
            <p style="color:#666; margin-bottom:25px;">Try a different destination or category.</p>
            <button onclick="pkgReset()" style="background:#0e2d2f; color:#d8ff5f; border:none; padding:13px 30px; border-radius:12px; font-size:15px; font-weight:700; cursor:pointer;">
                Show All Packages
            </button>
        </div>

        <div class="packages-grid" id="packages-grid">

            <!-- Card 1 -->
            <div class="package-card" data-name="maldives escape maldives beach island" data-tag="luxury">
                <img src="images/maldives.jpg" alt="Maldives">
                <div class="package-content">
                    <span class="package-tag">Luxury</span>
                    <h3>Maldives Escape</h3>
                    <p>Enjoy crystal clear beaches, luxury villas, and unforgettable island experiences.</p>
                    <div class="package-bottom">
                        <h4>$1500</h4>
                        <a href="booking.php?package=Maldives+Escape" class="book-btn">Book Now</a>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="package-card" data-name="swiss alps highland switzerland snow mountain" data-tag="mountain">
                <img src="images/swissalps.jpg" alt="Swiss Alps">
                <div class="package-content">
                    <span class="package-tag">Mountain</span>
                    <h3>Swiss Alps Highland</h3>
                    <p>Experience breathtaking snowy mountains, luxury chalets, and peaceful landscapes.</p>
                    <div class="package-bottom">
                        <h4>$1200</h4>
                        <a href="booking.php?package=Swiss+Alps+Highland" class="book-btn">Book Now</a>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="package-card" data-name="tokyo adventure japan culture food nightlife" data-tag="popular">
                <img src="images/japan.jpg" alt="Tokyo Japan">
                <div class="package-content">
                    <span class="package-tag">Popular</span>
                    <h3>Tokyo Adventure</h3>
                    <p>Discover Japan's culture, iconic landmarks, vibrant nightlife, and amazing food.</p>
                    <div class="package-bottom">
                        <h4>$1100</h4>
                        <a href="booking.php?package=Tokyo+Adventure" class="book-btn">Book Now</a>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="package-card" data-name="bali retreat indonesia tropical beach temple" data-tag="trending">
                <img src="images/bali.jpg" alt="Bali">
                <div class="package-content">
                    <span class="package-tag">Trending</span>
                    <h3>Bali Retreat</h3>
                    <p>Relax among tropical landscapes, beaches, temples, and luxury resorts.</p>
                    <div class="package-bottom">
                        <h4>$950</h4>
                        <a href="booking.php?package=Bali+Retreat" class="book-btn">Book Now</a>
                    </div>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="package-card" data-name="greece premium stay sea island view" data-tag="premium">
                <img src="images/greece.jpg" alt="Greece">
                <div class="package-content">
                    <span class="package-tag">Premium</span>
                    <h3>Greece Premium Stay</h3>
                    <p>Enjoy stunning sea views, luxury accommodation, and island adventures.</p>
                    <div class="package-bottom">
                        <h4>$1800</h4>
                        <a href="booking.php?package=Greece+Premium+Stay" class="book-btn">Book Now</a>
                    </div>
                </div>
            </div>

            <!-- Card 6 -->
            <div class="package-card" data-name="paris getaway france city dining attractions" data-tag="luxury">
                <img src="images/paris.jpg" alt="Paris">
                <div class="package-content">
                    <span class="package-tag">Luxury</span>
                    <h3>Paris Getaway</h3>
                    <p>Explore world-famous attractions, fine dining, and luxury city experiences.</p>
                    <div class="package-bottom">
                        <h4>$1300</h4>
                        <a href="booking.php?package=Paris+Getaway" class="book-btn">Book Now</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Footer -->
<?php include 'includes/footer.php'; ?>

<script>
(function () {

    var searchInput    = document.getElementById('pkg-search-input');
    var categorySelect = document.getElementById('pkg-category');
    var searchBtn      = document.getElementById('pkg-search-btn');
    var noResults      = document.getElementById('pkg-no-results');
    var grid           = document.getElementById('packages-grid');
    var cards          = document.querySelectorAll('.package-card');

    function filter() {
        var q   = searchInput.value.trim().toLowerCase();
        var cat = categorySelect.value.toLowerCase();

        /* if both empty — show everything, do nothing */
        if (!q && !cat) {
            cards.forEach(function (c) { c.style.display = ''; });
            noResults.style.display = 'none';
            grid.style.display = '';
            return;
        }

        var found = 0;

        cards.forEach(function (card) {
            var name = card.getAttribute('data-name').toLowerCase();
            var tag  = card.getAttribute('data-tag').toLowerCase();

            var matchQ   = !q   || name.indexOf(q) !== -1;
            var matchCat = !cat || tag === cat;

            if (matchQ && matchCat) {
                card.style.display = '';
                found++;
            } else {
                card.style.display = 'none';
            }
        });

        if (found === 0) {
            grid.style.display = 'none';
            noResults.style.display = 'block';
        } else {
            grid.style.display = '';
            noResults.style.display = 'none';
        }

        /* scroll smoothly to results */
        document.querySelector('.packages-section').scrollIntoView({
            behavior: 'smooth', block: 'start'
        });
    }

    /* only filter on button click or Enter — NOT on every keystroke */
    searchBtn.addEventListener('click', filter);

    searchInput.addEventListener('keydown', function (e) {
        if (e.key === 'Enter') filter();
    });

    categorySelect.addEventListener('change', filter);

    window.pkgReset = function () {
        searchInput.value    = '';
        categorySelect.value = '';
        cards.forEach(function (c) { c.style.display = ''; });
        grid.style.display    = '';
        noResults.style.display = 'none';
    };

})();
</script>

</body>
</html>