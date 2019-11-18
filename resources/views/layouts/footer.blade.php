{{-- start footer --}}
<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h2 class="footer-heading mb-3">About Us</h2>
                <p class="mb-5">{{config('village.desc', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.')}} </p>
            </div>
            <div class="col-lg-8 ml-auto">
                <div class="row">
                    <div class="col-lg-4 ml-auto">
                        <h2 class="footer-heading mb-4">Navigation</h2>
                        <ul class="list-unstyled">
                            <li><a href="{{route('about')}}">About Us</a></li>
                            <li><a href="{{route('feature')}}">Feature</a></li>
                            <li><a href="#">Terms of Service</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4">
                        <h2 class="footer-heading mb-4">Contact</h2>
                        <ul class="list-unstyled">
                            <li><a href="#">Phone {{config('village.phone')}}</a></li>
                            <li><a href="mailto:{{config('village.email')}}">Email</a></li>
                            <li><a href="{{config('village.email')}}">Facebook</a></li>
                            <li><a href="#">Twitter</a></li>
                            <li><a href="#">Instagram</a></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
            <div class="col-md-12">
                <div class="border-top pt-5">
                    <p>
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());

                        </script> All rights reserved | This template is made with <i class="icon-heart text-danger"
                            aria-hidden="true"></i> by <a href="http://gonesinau.com" target="_blank">Gone Sinau</a>
                    </p>
                </div>
            </div>

        </div>
    </div>
</footer>
