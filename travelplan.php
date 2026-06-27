
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<!-- HERO SECTION -->
<section class="travel-hero">

    <div class="travel-overlay"></div>

    <div class="container site-container">

        <div class="travel-hero-content">

            <span>PREMIUM TRAVEL PLANNING</span>

            <h1>Plan Your Dream Journey</h1>

            <p>
                Accommodation, transportation, expert travel guides and complete
                travel assistance for unforgettable experiences around the world.
            </p>

            <a href="#accommodation" class="hero-btn">
                Start Planning
            </a>

        </div>

    </div>

</section>

<!-- INTRO SECTION -->

<section class="travel-intro">

    <div class="container site-container">

        <div class="section-title">

            <h2>Everything You Need In One Place</h2>

            <p>
                GlobeTrek Adventures provides complete travel planning solutions
                from accommodation and transportation to personalized travel
                guides and customer support.
            </p>

        </div>

    </div>

</section>

<!-- ACCOMMODATION -->

<section id="accommodation" class="travel-section">

    <div class="container site-container">

        <div class="travel-grid">

            <div class="travel-image">

                <img src="images/accommodation.jpg"
                     alt="Luxury Accommodation">

            </div>

            <div class="travel-content">

                <h2>Luxury Accommodation</h2>

                <p>
                    Stay in carefully selected hotels, resorts, villas and luxury
                    suites worldwide for a comfortable travel experience.
                </p>

                <ul>
                    <li>5 Star Hotels</li>
                    <li>Beach Resorts</li>
                    <li>Luxury Villas</li>
                    <li>Family Packages</li>
                    <li>Private Suites</li>
                </ul>

            </div>

        </div>

    </div>

</section>

<!-- TRANSPORTATION -->

<section id="transportation" class="travel-section dark-section">

    <div class="container site-container">

        <div class="travel-grid reverse">

            <div class="travel-content">

                <h2>Transportation Services</h2>

                <p>
                    Enjoy seamless transportation services from airport transfers
                    to luxury vehicles and domestic travel arrangements.
                </p>

                <ul>
                    <li>Airport Pickup</li>
                    <li>Private Chauffeur</li>
                    <li>Luxury Cars</li>
                    <li>Tour Coaches</li>
                    <li>Domestic Flights</li>
                </ul>

            </div>

            <div class="travel-image">

                <img src="images/transport.jpg"
                     alt="Transportation">

            </div>

        </div>

    </div>

</section>

<!-- TRAVEL GUIDES -->

<section id="guides" class="travel-section">

    <div class="container site-container">

        <div class="section-title">

            <h2>Professional Travel Guides</h2>

            <p>
                Discover destinations with knowledgeable local experts.
            </p>

        </div>

        <div class="guide-cards">

            <div class="guide-card">

                <i class="bi bi-geo-alt-fill"></i>

                <h3>Local Experts</h3>

                <p>
                    Experience destinations through local knowledge and culture.
                </p>

            </div>

            <div class="guide-card">

                <i class="bi bi-map-fill"></i>

                <h3>Custom Itineraries</h3>

                <p>
                    Personalized travel plans designed specifically for you.
                </p>

            </div>

            <div class="guide-card">

                <i class="bi bi-headset"></i>

                <h3>24/7 Support</h3>

                <p>
                    Assistance whenever you need it throughout your journey.
                </p>

            </div>

        </div>

    </div>

</section>


<!-- CONTACT AGENCY -->

<section id="contact" class="travel-contact">

    <div class="container site-container">

        <?php if(isset($_SESSION['contact_success'])): ?>
            <div class="contact-alert success">
                <?= $_SESSION['contact_success']; unset($_SESSION['contact_success']); ?>
            </div>
        <?php endif; ?>

        <?php if(isset($_SESSION['contact_error'])): ?>
            <div class="contact-alert error">
                <?= $_SESSION['contact_error']; unset($_SESSION['contact_error']); ?>
            </div>
        <?php endif; ?>

        <div class="contact-split">

            <!-- Left: Get In Touch -->
            <div class="contact-info-card">

                <h2>Get In Touch</h2>

                <div class="contact-info-item">
                    <i class="bi bi-geo-alt-fill"></i>
                    <span><a href="https://www.google.com/maps/dir/?api=1&destination=Negambo,Colombo,Sri+Lanka"></a> Negombo, Sri Lanka</span>
                </div>

                <div class="contact-info-item">
                    <i class="bi bi-telephone-fill"></i>
                    <span><a href="tel:+94 77 684 4243"></a>+94 77 684 4243</span>
                </div>

                <div class="contact-info-item">
                    <i class="bi bi-envelope-fill"></i>
                    <span><a href="mailto:muhki9703@gmail.com"></a>muhki9703@gmail.com</span>
                </div>

                <div class="contact-info-item">
                    <i class="bi bi-clock-fill"></i>
                    <span>Monday - Friday | 9:00 AM - 6:00 PM</span>
                </div>

                <div class="contact-socials">
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-twitter-x"></i></a>
                    <a href="#"><i class="bi bi-youtube"></i></a>
                </div>

            </div>

            <!-- Right: Send Message -->
            <div class="contact-form-card">

                <h2>Send Message</h2>

                <form action="actions/contact-action.php" method="POST" class="contact-form">

                    <input type="text" name="full_name" placeholder="Full Name" class="contact-input" required>

                    <input type="email" name="email" placeholder="Email Address" class="contact-input" required>

                    <input type="text" name="subject" placeholder="Subject" class="contact-input" required>

                    <textarea name="message" placeholder="Your Message" class="contact-input contact-textarea" rows="5" required></textarea>

                    <button type="submit" name="send_message" class="contact-send-btn">Send Message</button>

                </form>

            </div>
          
                    <div class="success-message" id="successMessage">
                        Message sent! We'll get back to you soon.
                    </div>
        </div>

    </div>

</section>

<!-- CTA -->

<section class="travel-cta">

    <div class="container site-container">

        <h2>Ready For Your Next Adventure?</h2>

        <p>
            Explore premium travel experiences with GlobeTrek Adventures.
        </p>

        <a href="packages.php" class="hero-btn">
            Explore Packages
        </a>

    </div>

</section>



<?php include 'includes/footer.php'; ?>

