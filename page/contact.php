

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white text-uppercase mb-3 animated slideInDown">Contact</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="./">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Contact</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

<!-- Contact Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-0">

            <!-- Contact Form -->
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="bg-secondary p-5">
                    <p class="d-inline-block bg-dark text-primary py-1 px-4">Contact Us</p>
                    <h1 class="text-uppercase mb-4">Have a Question? Let's Connect!</h1>
                    <p class="mb-4">
                        Looking for custom mural art, wall paintings, or room designs? Fill out the form below and our creative team will get back to you quickly.
                    </p>
                    <form action="contact.php" method="POST">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="name" class="form-control bg-transparent" id="name" placeholder="Your Name" required>
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" name="email" class="form-control bg-transparent" id="email" placeholder="Your Email" required>
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" name="subject" class="form-control bg-transparent" id="subject" placeholder="Subject" required>
                                    <label for="subject">Subject</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea name="message" class="form-control bg-transparent" placeholder="Leave a message here" id="message" style="height: 120px" required></textarea>
                                    <label for="message">Message</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>

                    <!-- Optional Contact Info -->
                    <div class="mt-4">
                        <p class="mb-1"><i class="fa fa-phone-alt text-primary me-2"></i> +91 749-300-5903</p>
                        <p class="mb-0"><i class="fa fa-envelope text-primary me-2"></i> deewariyaart@gmail.com</p>
                    </div>
                </div>
            </div>

            <!-- Google Map -->
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="h-100" style="min-height: 400px;">
                    <iframe class="google-map w-100 h-100"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d34989.4288297426!2d77.0897!3d28.6139!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cfd5b6f0c1a1d%3A0x5c6cfc1d5b1de189!2sDelhi%2C%20India!5e0!3m2!1sen!2sin!4v1603794290143!5m2!1sen!2sin"
                        frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"
                        style="filter: grayscale(100%) invert(92%) contrast(83%); border:0;"></iframe>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Contact End -->
