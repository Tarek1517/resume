<section id="contact">
    @foreach ($settings as $item)
    <div class="container">
        <div class="section-header">
            <h3 class="section-title">{{$item->contact_title}}</h3>
            <p class="section-description">{{$item->contact_SubTitle}}</p>
        </div>
    </div>
    @endforeach

    <!-- Uncomment below if you wan to use dynamic maps -->
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22864.11283411948!2d-73.96468908098944!3d40.630720240038435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbg!4v1540447494452"
        width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>

    <div class="container mt-5">
        <div class="row justify-content-center">

            @foreach ($ContactData as $Contact)

            <div class="col-lg-3 col-md-4">
                    
                <div class="info mt-3">
                    <div>
                        <i class="bi bi-geo-alt"></i>
                        <p>{{ $Contact->address }}</p>
                    </div>

                    <div>
                        <i class="bi bi-envelope"></i>
                        <p>{{ $Contact->email }}</p>
                    </div>

                    <div>
                        <i class="bi bi-phone"></i>
                        <p>{{ $Contact->phone }}</p>
                    </div>
                </div>

                <div class="social-links">
                    @if ($Contact->twitter_link)
                    <a href="{{ $Contact->twitter_link }}" class="twitter"><i class="bi bi-twitter"></i></a>
                    @endif
                    
                    @if ($Contact->facebook_link)
                    <a href="{{ $Contact->facebook_link }}" class="facebook"><i class="bi bi-facebook"></i></a> 
                    @endif
                    
                    @if ($Contact->insta_link)
                    <a href="{{ $Contact->insta_link }}" class="instagram"><i class="bi bi-instagram"></i></a>
                    @endif

                    @if ($Contact->linkedin_link)
                    <a href="{{ $Contact->linkedin_link }}" class="linkedin"><i class="bi bi-linkedin"></i></a>  
                    @endif
                    
                </div>

            </div>

            @endforeach

            <div class="col-lg-5 col-md-8">
                <div class="form">
                    <form action="{{route('contact.store')}}" method="post" role="form" class="php-email-form">
                        @csrf
                        
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" id="name"
                                placeholder="Your Name" required>
                        </div>
                        <div class="form-group mt-3">
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="Your Email" required>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="subject" id="subject"
                                placeholder="Subject" required>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                        </div>

                        @include('alart.massages')

                        {{-- <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">@include('alart.massages')</div>
                        </div> --}}

                        <div class="text-center mt-3"><button type="submit">Send Message</button></div>
                    </form>
                </div>
            </div>

        </div>

    </div>
</section>