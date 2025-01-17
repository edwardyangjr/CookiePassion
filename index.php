<!-- 
    CS 6314 - Web Programming Languages 
    Final Project
    Due: December 6, 2020 11:59 PM
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cookie Passion</title>

    <!-- external CSS -->
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
    <!-- external js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

    <script src="js/scripts.js"></script>
</head>

<body id="page-top">
    <!-- navigation-->
    <?php
    include("headerNavbar.php");
    ?>
    <!-- Why Different Section-->
    <section class="page-section panel" id="panel">
        <div class="container">
            <!-- Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Why Different</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Grid Items-->
            <div class="row justify-content-center">
                <!-- Item 1-->
                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="panel-item mx-auto" data-toggle="modal" data-target="#Modal1">
                        <div class="panel-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="panel-item-caption-content text-center text-white"><i
                                    class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="images/homepage/organic_ingredients.png" alt="" />
                    </div>
                </div>
                <!-- Item 2-->
                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="panel-item mx-auto" data-toggle="modal" data-target="#panelModal2">
                        <div class="panel-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="panel-item-caption-content text-center text-white"><i
                                    class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="images/homepage/homemade.png" alt="" />
                    </div>
                </div>
                <!-- Item 3-->
                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="panel-item mx-auto" data-toggle="modal" data-target="#panelModal3">
                        <div class="panel-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="panel-item-caption-content text-center text-white"><i
                                    class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="images/homepage/nostalgic.png" alt="" />
                    </div>
                </div>
                <!-- Item 4-->
                <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
                    <div class="panel-item mx-auto" data-toggle="modal" data-target="#panelModal4">
                        <div class="panel-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="panel-item-caption-content text-center text-white"><i
                                    class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="images/homepage/seasonal.png" alt="" />
                    </div>
                </div>
                <!-- Item 5-->
                <div class="col-md-6 col-lg-4 mb-5 mb-md-0">
                    <div class="panel-item mx-auto" data-toggle="modal" data-target="#panelModal5">
                        <div class="panel-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="panel-item-caption-content text-center text-white"><i
                                    class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="images/homepage/scoop_box.png" alt="" />
                    </div>
                </div>
                <!-- Item 6-->
                <div class="col-md-6 col-lg-4">
                    <div class="panel-item mx-auto" data-toggle="modal" data-target="#panelModal6">
                        <div class="panel-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="panel-item-caption-content text-center text-white"><i
                                    class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="images/homepage/in-house_drinks.png" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section-->
    <section class="page-section bg-primary text-white mb-0" id="about">
        <div class="container">
            <!-- Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-white">About</h2>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Section Content-->
            <div class="row">
                <div class="col-lg-4 ml-auto">
                    <p class="lead text-white">Established in 1925, Cookie Passion's vision is to always provide the most delicious
                        and natural cookies. We continually challenge ourselves to develop and improve our classic
                        recipes as our brand name.</p>
                </div>
                <div class="col-lg-4 mr-auto">
                    <p class="lead text-white">Our first store opened in Dallas, TX and cemented our place within the food
                        industry, with the recent expansion to a second location in Frisco, TX.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer-->
    <footer class="footer text-center">
        <div class="container">
            <div class="row">
                <!-- Footer Location-->
                <div class="col-lg mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4 text-white">Locations</h4>
                    <p class="lead mb-0 text-white">
                        99 John Doe Drive
                        <br />
                        Dallas, TX 12345
                        <br /><br />
                        111 Jane Doe Drive
                        <br />
                        Frisco, TX 54321
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Popup content for Why Different Section -->
    <div class="panel-modal modal fade" id="Modal1" tabindex="-1" role="dialog" aria-labelledby="Modal1Label"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
                <div class="modal-body text-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <!-- Title -->
                                <h2 class="panel-modal-title text-secondary text-uppercase mb-0" id="Modal1Label">
                                    All-Natural</h2>
                                <!-- Icon Divider -->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <!-- Image 1 -->
                                <img class="img-fluid rounded mb-5" src="images/homepage/organic_ingredients.png" alt="" />
                                <!-- Text -->
                                <p class="mb-5">Made with organic, ethically-sourced ingredients, and free of artificial
                                    flavors, preservatives, hydrogenated oils or bleached flour.</p>
                                <button class="btn btn-primary" data-dismiss="modal">
                                    <i class="fas fa-times fa-fw"></i>
                                    Close Window
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel-modal modal fade" id="panelModal2" tabindex="-1" role="dialog" aria-labelledby="panelModal2Label"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
                <div class="modal-body text-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <!-- Title -->
                                <h2 class="panel-modal-title text-secondary text-uppercase mb-0" id="panelModal2Label">
                                    Handmade</h2>
                                <!-- Icon Divider-->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <!-- Image 2 -->
                                <img class="img-fluid rounded mb-5" src="images/homepage/homemade.png" alt="" />
                                <!-- Text -->
                                <p class="mb-5">No automated mixes have a place in our kitchens. Our recipes strive to
                                    provide a touch of warmth from our renowned bakers, from their hands to yours.</p>
                                <button class="btn btn-primary" data-dismiss="modal">
                                    <i class="fas fa-times fa-fw"></i>
                                    Close Window
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel-modal modal fade" id="panelModal3" tabindex="-1" role="dialog" aria-labelledby="panelModal3Label"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
                <div class="modal-body text-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <!-- Title -->
                                <h2 class="panel-modal-title text-secondary text-uppercase mb-0" id="panelModal3Label">
                                    Taste of Home</h2>
                                <!-- Icon Divider -->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <!-- Image 3 -->
                                <img class="img-fluid rounded mb-5" src="images/homepage/nostalgic.png" alt="" />
                                <!-- Text -->
                                <p class="mb-5">For nearly a century, our unique recipes have remained and passed on. Of
                                    course, it'll never beat granny's!</p>
                                <button class="btn btn-primary" data-dismiss="modal">
                                    <i class="fas fa-times fa-fw"></i>
                                    Close Window
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel-modal modal fade" id="panelModal4" tabindex="-1" role="dialog" aria-labelledby="panelModal4Label"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
                <div class="modal-body text-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <!-- Title -->
                                <h2 class="panel-modal-title text-secondary text-uppercase mb-0" id="panelModal4Label">
                                    Seasonal</h2>
                                <!-- Icon Divider -->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <!-- Image 4 -->
                                <img class="img-fluid rounded mb-5" src="images/homepage/seasonal.png" alt="" />
                                <!-- Text -->
                                <p class="mb-5">Seasonal and themed cookies are available all year round. Make sure to
                                    visit often to check out what's new on our menu.</p>
                                <button class="btn btn-primary" data-dismiss="modal">
                                    <i class="fas fa-times fa-fw"></i>
                                    Close Window
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel-modal modal fade" id="panelModal5" tabindex="-1" role="dialog" aria-labelledby="panelModal5Label"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
                <div class="modal-body text-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <!-- Title -->
                                <h2 class="panel-modal-title text-secondary text-uppercase mb-0" id="panelModal5Label">
                                    Buffet Lines</h2>
                                <!-- Icon Divider -->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <!-- Image 5 -->
                                <img class="img-fluid rounded mb-5" src="images/homepage/scoop_box.png" alt="" />
                                <!-- Text -->
                                <p class="mb-5">Buffet scoops are now available in-store for every kid in adult that
                                    loved visiting a candy store.</p>
                                <button class="btn btn-primary" data-dismiss="modal">
                                    <i class="fas fa-times fa-fw"></i>
                                    Close Window
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel-modal modal fade" id="panelModal6" tabindex="-1" role="dialog" aria-labelledby="panelModal6Label"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
                <div class="modal-body text-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <!-- Title -->
                                <h2 class="panel-modal-title text-secondary text-uppercase mb-0" id="panelModal6Label">
                                    Creative</h2>
                                <!-- Icon Divider -->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <!-- Image 6 -->
                                <img class="img-fluid rounded mb-5" src="images/homepage/in-house_drinks.png" alt="" />
                                <!-- Text -->
                                <p class="mb-5">Check in-store for some ingenious menu items. We'll never forego our
                                    signature cookies, but there's no issue with accessorizing them.</p>
                                <button class="btn btn-primary" data-dismiss="modal">
                                    <i class="fas fa-times fa-fw"></i>
                                    Close Window
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>