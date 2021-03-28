
<!-- footer section start -->
        <footer class="footer" id="footer-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="widget">
                            <img src="<?= IMG; ?>logo.png" alt="logo" />
                            <p>Ho Chi Minh City, Viet Nam</p>
                            <h6><span>Call us: </span>(+012) 3456 789</h6>
                        </div>
                    </div>
                    <!-- <div class="col-lg-3 col-sm-6">
                        <div class="widget">
                            <h4>Legal</h4>
                            <ul>
                                <li><a href="#">Terms of Use</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Security</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="widget">
                            <h4>Account</h4>
                            <ul>
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">Watchlist</a></li>
                                <li><a href="#">Collections</a></li>
                                <li><a href="#">User Guide</a></li>
                            </ul>
                        </div>
                    </div> -->
                    <div class="col-md-6">
                        <div class="widget">
                            <h4>Newsletter</h4>
                            <p>Subscribe to our newsletter system now to get latest news from us.</p>
                            <form method="POST" action="<?= URL . 'user/subscribe'; ?>">
                                <?= Security::csrf_token(); ?>
                                <input type="text" value="<?= isset($_SESSION['subscribe_email']) ? $_SESSION['subscribe_email'] : ''; ?>" placeholder="Enter your email.." name="email" required />
                                <button type="submit">SUBSCRIBE NOW</button>
                            </form>

                            <?php if (isset($_SESSION["success_subscribe"])): ?>
                                <div class="alert alert-success" style="margin-top: 20px;">
                                    <?= $_SESSION["success_subscribe"]; ?>
                                </div>
                            <?php unset($_SESSION["subscribe_email"]); endif; ?>
                        </div>
                    </div>
                </div>
                <hr />
            </div>
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 text-center text-lg-left">
                            <div class="copyright-content">
                                Huy Copyright 2021. All rights reserved.
                            </div>
                        </div>
                        <div class="col-lg-6 text-center text-lg-right">
                            <div class="copyright-content">
                                <a href="#" class="scrollToTop">
                                    Back to top<i class="icofont icofont-arrow-up"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer><!-- footer section end -->
        <!-- jquery main JS -->
        <script src="<?= JS; ?>jquery.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="<?= JS; ?>bootstrap.min.js"></script>
        <!-- Slick nav JS -->
        <script src="<?= JS; ?>jquery.slicknav.min.js"></script>
        <!-- owl carousel JS -->
        <script src="<?= JS; ?>owl.carousel.min.js"></script>
        <!-- Popup JS -->
        <script src="<?= JS; ?>jquery.magnific-popup.min.js"></script>
        <!-- Isotope JS -->
        <script src="<?= JS; ?>isotope.pkgd.min.js"></script>
        <!-- main JS -->
        <script src="<?= JS; ?>main.js?v=<?= time(); ?>"></script>

        <script src="<?= JS; ?>script.js?v=<?= time(); ?>"></script>
        <script src="<?= JS; ?>sweetalert.min.js"></script>

        <script src="<?= JS; ?>starrr.js"></script>

        <?php if (isset($_SESSION["success_subscribe"])): ?>
            <script>
                document.getElementById("footer-section").scrollIntoView();
            </script>
        <?php unset($_SESSION["success_subscribe"]); endif; ?>

    </body>

</html>
