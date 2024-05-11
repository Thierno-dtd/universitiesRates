<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Index - Mentor Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">



    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

    <style>
        .star-rating {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
        }

        .star-rating li {
            color: gold;
            font-size: 1.5rem;
        }

        .star-rating li:nth-child(2n+1) {
            margin-right: 0.25rem;
        }
    </style>
</head>

<body class="index-page">

<main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

        <video autoplay loop muted data-aos="fade-in" class="opacity-80 border">
            <source src="/assets/img/hero2.mp4" type="video/mp4">
        </video>
        <div class="container">
            <h2 data-aos="fade-up" data-aos-delay="100" class="">Cherchez-vous la meilleure université?<br>Une université Repondant aux critères de compétence, d'enseignement,...</h2>
            <p data-aos="fade-up" data-aos-delay="200">Vous etes les bienenus</p>
            <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
                <a href="courses.html" class="btn-get-started">Get Started</a>
            </div>
        </div>

    </section><!-- /Hero Section -->

    <div class="container section-title pt-5" data-aos="fade-up">
        <h2>...</h2>
        <p class="">Les meilleur classement</p>
    </div>
    <div class="container section-title pt-5" data-aos="fade-up">
        <h2>...</h2>
        <p class="">1ere université</p>
    </div>
@if (isset($topUniversities[0]))
        <!-- About Section -->
        <section id="about" class="about section">

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
                        <img src="/assets/img/about.jpg" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-6 order-2 order-lg-1 content" data-aos="fade-up" data-aos-delay="200">
                        <h3>{{ $topUniversities[0]->name }}</h3>
                        <p class="fst-italic">
                            {{ $topUniversities[0]->description }}
                        </p>
                        <ul>
                            <li><i class="bi bi-check-circle"></i> <span>{{$topUniversities[0]->location}}</span></li>
                            <li><i class="bi bi-check-circle"></i> <span>{{$topUniversities[0]->website}}</span></li>
                            <li>
                                <ul class="star-rating"><i class="bi bi-check-circle"></i>
                                    @for ($i = 0; $i < floor($topUniversities[0]->avarageRating); $i++)
                                        <li>★</li> <!-- Afficher une étoile pleine -->
                                    @endfor

                                    @if ($topUniversities[0]->avarageRating - floor($topUniversities[0]->avarageRating) >= 0.5) <!-- Pour les demi-étoiles -->
                                    <li>☆</li> <!-- Afficher une étoile vide pour une demi-étoile -->
                                    @endif
                                </ul></li>
                        </ul>
                        <a href="#" class="read-more"><span>Voir plus</span><i class="bi bi-arrow-right"></i></a>
                    </div>

                </div>

            </div>

        </section><!-- /About Section -->
    @endif
    <div class="container section-title pt-5" data-aos="fade-up">
    <h2>...</h2>
    <p class="">2e université</p>
    </div>
    @if (isset($topUniversities[1]))
        <section id="about" class="about section">

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-6 order-1 order-lg-2 content" data-aos="fade-up" data-aos-delay="200">
                        <h3>{{ $topUniversities[1]->name }}</h3>
                        <p class="fst-italic">
                            {{ $topUniversities[1]->description }}
                        </p>
                        <ul>
                            <li><i class="bi bi-check-circle"></i> <span>{{$topUniversities[1]->location}}</span></li>
                            <li><i class="bi bi-check-circle"></i> <span>{{$topUniversities[1]->website}}</span></li>
                            <li><ul class="star-rating">
                                    <i class="bi bi-check-circle"></i>
                                    @for ($i = 0; $i < floor($topUniversities[1]->avarageRating); $i++)
                                        <li>★</li> <!-- Afficher une étoile pleine -->
                                    @endfor

                                    @if ($topUniversities[1]->avarageRating - floor($topUniversities[1]->avarageRating) >= 0.5) <!-- Pour les demi-étoiles -->
                                    <li>☆</li> <!-- Afficher une étoile vide pour une demi-étoile -->
                                    @endif
                                </ul></li></ul>
                        <a href="#" class="read-more"><span>Voir plus</span><i class="bi bi-arrow-right"></i></a>
                    </div>

                    <div class="col-lg-6 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="100">
                        <img src="/assets/img/about.jpg" class="img-fluid" alt="">
                    </div>



                </div>

            </div>

        </section>
    @endif

    @if (isset($topUniversities[2]))
        <div class="container section-title pt-5" data-aos="fade-up">
        <h2>...</h2>
        <p class="">3e université</p>
        </div>
        <!-- About Section -->
        <section id="about" class="about section">

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
                        <img src="/assets/img/about.jpg" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-6 order-2 order-lg-1 content" data-aos="fade-up" data-aos-delay="200">
                        <h3>{{ $topUniversities[2]->name }}</h3>
                        <p class="fst-italic">
                            {{ $topUniversities[2]->description }}
                        </p>
                        <ul>
                            <li><i class="bi bi-check-circle"></i> <span>{{$topUniversities[2]->location}}</span></li>
                            <li><i class="bi bi-check-circle"></i> <span>{{$topUniversities[2]->website}}</span></li>
                            <li><ul class="star-rating">
                                    <i class="bi bi-check-circle"></i>
                                    @for ($i = 0; $i < floor($topUniversities[2]->avarageRating); $i++)
                                        <li>★</li> <!-- Afficher une étoile pleine -->
                                    @endfor

                                    @if ($topUniversities[2]->avarageRating - floor($topUniversities[2]->avarageRating) >= 0.5) <!-- Pour les demi-étoiles -->
                                    <li>☆</li> <!-- Afficher une étoile vide pour une demi-étoile -->
                                    @endif
                                </ul></li>
                        </ul>
                        <a href="#" class="read-more"><span>Voir plus</span><i class="bi bi-arrow-right"></i></a>
                    </div>

                </div>

            </div>

        </section><!-- /About Section -->
    @endif

    <!-- Counts Section -->
    <section id="counts" class="section counts">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-4 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="1232" data-purecounter-duration="1" class="purecounter"></span>
                        <p class="">Nos universités</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-4 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="64" data-purecounter-duration="1" class="purecounter"></span>
                        <p class="">Nos Criteres</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-4 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="42" data-purecounter-duration="1" class="purecounter"></span>
                        <p class="">Commentaire</p>
                    </div>
                </div><!-- End Stats Item -->



            </div>

        </div>

    </section><!-- /Counts Section -->

    <!-- Why Us Section -->

    <div class="container section-title" data-aos="fade-up">
        <h2>--------</h2>
        <p class="">Liste des critere d'evaluation</p>
    </div>
    <section id="features" class="features section">

        <div class="container">

            <div class="row gy-4">
                @foreach ($data['criteres'] as $critere)
                <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="features-item">
                        <i class="bi bi-eye" style="color: #ffbb2c;"></i>
                        <h3>{{$critere->name }}</h3><br />

                    </div>
                </div><!-- End Feature Item -->
                @endforeach

            </div>

        </div>

    </section><!-- /Features Section -->

    <!-- Courses Section -->
    <section id="courses" class="courses section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Liste des Universités</h2>
            <p class="">Pdu TOGO</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row">
                @foreach ($data['universities'] as $uni)
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100"
                     onclick="redirectToUniversity()"
                >
                    <div class="course-item">
                        <img src="/assets/img/course-1.jpg" class="img-fluid" alt="...">
                        <div class="course-content">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                    <p class="category"><a>{{$uni->name}}</a></p>
                                <p class="price">{{$uni->location}}</p>
                            </div>

                            <h3><a href="course-details.html">{{$uni->website}}</a></h3>
                            <p class="description">{{$uni->description}}</p>
                            <div class="trainer d-flex justify-content-between align-items-center">

                                <div class="trainer-rank d-flex align-items-center">
                                    <i class="bi bi-person user-icon"></i>&nbsp;50
                                    &nbsp;&nbsp;
                                    <i class="bi bi-heart heart-icon"></i>&nbsp;65
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Course Item-->
              @endforeach

            </div>

        </div>

    </section><!-- /Courses Section -->

    <!-- Trainers Index Section -->


</main>

<footer id="footer" class="footer position-relative">

    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 footer-about">
                <a href="index.html" class="logo d-flex align-items-center">
                    <span class="sitename">UniRates</span>
                </a>
                <div class="footer-contact pt-3">
                    <p>A108 Adam Street</p>
                    <p>New York, NY 535022</p>
                    <p class="mt-3"><strong>Phone:</strong> <span>+228 93489257</span></p>
                    <p><strong>Email:</strong> <span>davidouthe2@gmail.com</span></p>
                </div>
                <div class="social-links d-flex mt-4">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Useful Links</h4>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Terms of service</a></li>
                    <li><a href="#">Privacy policy</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Our Services</h4>
                <ul>
                    <li><a href="#">Web Design</a></li>
                    <li><a href="#">Web Development</a></li>
                    <li><a href="#">Product Management</a></li>
                    <li><a href="#">Marketing</a></li>
                    <li><a href="#">Graphic Design</a></li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-12 footer-newsletter">
                <h4>Our Newsletter</h4>
                <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
                <form action="forms/newsletter.php" method="post" class="php-email-form">
                    <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your subscription request has been sent. Thank you!</div>
                </form>
            </div>

        </div>
    </div>

    <div class="container copyright text-center mt-4">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">Mentor</strong> <span>All Rights Reserved</span></p>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you've purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>

</footer>


<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
<script src=" {{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
<script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

<!-- Main JS File -->
<script src="{{ asset('assets/js/main.js') }}"></script>
<script>
    function redirectToUniversity(id) {
        // Faire une requête fetch pour rediriger vers la route univ/id
        fetch(`/univ/${id}`, {
            method: 'GET'
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erreur lors de la requête');
                }
                return response.json();
            })
            .then(data => {
                window.location.href = data.url;
            })
            .catch(error => {
                console.error('Erreur lors de la requête fetch:', error);
            });
    }
</script>


</body>

</html>
