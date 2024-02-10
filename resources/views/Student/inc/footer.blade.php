

        <!-- JS here -->
        <script src="{{ asset('student/js/vendor/modernizr-3.5.0.min.js') }}"></script>
        <script src="{{ asset('student/js/vendor/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('student/js/popper.min.js') }}"></script>
        <script src="{{ asset('student/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('student/js/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('student/js/slick.min.js') }}"></script>
        <script src="{{ asset('student/js/jquery.meanmenu.min.js') }}"></script>
        <script src="{{ asset('student/js/ajax-form.js') }}"></script>
        <script src="{{ asset('student/js/wow.min.js') }}"></script>
        <script src="{{ asset('student/js/jquery.scrollUp.min.js') }}"></script>
        <script src="{{ asset('student/js/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('student/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('student/js/waypoints.min.js') }}"></script>
        <script src="{{ asset('student/js/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('student/js/plugins.js') }}"></script>
        <script src="{{ asset('student/js/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('student/js/main.js') }}"></script>

        <script>
            // On page load or when changing themes, best to add inline in `head` to avoid FOUC
            if (localStorage.getItem("theme-color") === "dark" || (!("theme-color" in localStorage) && window.matchMedia(
                    "(prefers-color-scheme: dark)").matches)) {
                document.getElementById("light--to-dark-button")?.classList.add("dark--mode");
            }
            if (localStorage.getItem("theme-color") === "light") {
                document.getElementById("light--to-dark-button")?.classList.remove("dark--mode");
            }
        </script>


    </body>

    </html>
