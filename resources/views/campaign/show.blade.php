<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>

</head>

<body>
    <div>
        <div class="navbar">
            <div class="logo">
                <img src="https://cutshort.io/_next/image?url=https%3A%2F%2Fcdnv2.cutshort.io%2Fcompany-static%2F597f1a51c734023678f3df67%2Fuser_uploaded_data%2Fcover_pictures%2Fcompany_cover_pic_N82Xg4ue.png&w=3840&q=80"
                    alt="">
            </div>
            <div class="search">
                <input type="text" placeholder="Search 🔍">
            </div>
            <div class="nav-links">
                <a href="/campaign/create">Start a Fundraiser</a>
                <a href="#">How it Works</a>
                <a href="#">Browse Fundraisers</a>

                <button>Help Hitesh</button>

                <a href="#">🙍‍♂️</a>
                <a href="#">₹ INR</a>
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit">
                        Logout
                    </button>
                </form>
            </div>
        </div>

        <div class="text-center">
            <img src="https://d2aq6dqxahe4ka.cloudfront.net/themes/front/images/matching-tag.png" alt="">
            <span>Get Additional Matching Benefits of up to 10%* on your donations, while funds last. T&C Apply.</span>
            <a href="">Know more ></a>
        </div>
        <div class="campaignTitle">
            <h1> {{$campaign->title}} </h1>
        </div>
        <div class="label">


            <span><i class="fa-solid fa-suitcase-medical"></i> MEDICAL</span>


        </div>
        <div class="campaign-container">
            <div class="left-box">
                <div class="one">
                    @if($campaign->images->isNotEmpty())

                    <img
                        src="data:image/jpeg;base64,{{ $campaign->images->first()->image_data }}"
                        alt="Campaign Image">

                    @endif

                </div>
                <div class="two">
                    <h1> Gallery ({{$campaign->images->count()}})</h1>
                    <div>
                        @foreach($campaign->images as $image)
                        <img src="data:image/jpeg;base64,{{ $image->image_data }}"
                            alt="Campaign Image">
                        @endforeach
                    </div>
                    <span>90 shares</span>

                </div>

                <div class="details-container">
                    <div class="campaigner-box">
                        <span> Campaigner Details</span>
                        <hr>
                        <h5> <i class="fa-regular fa-circle-user"></i> {{ $campaign->campaigner_name }}</h5>
                        <h6> <i class="fa-solid fa-map-location-dot"></i> {{$campaign->campaigner_city}} </h6>
                    </div>

                    <div class="beneficiary-box">
                        <span> Beneficiary Details</span>
                        <hr>
                        <h5><i class="fa-regular fa-circle-user"></i> {{ $campaign->beneficiary_name }}</h5>
                        <h6> <i class="fa-regular fa-heart"></i> {{ $campaign->beneficiary_relation }}</h6>
                        <h6> <i class="fa-solid fa-hospital"></i> {{ $campaign->hospital_name }}</h6>
                    </div>

                </div>

                <div class="story">
                    <span>Latest Update</span>
                    <hr>
                    <h4>Dear Donors,</h4>
                    <h5> {{$campaign->story }} </h5>
                </div>


            </div>
            <div class="right-box">
                <div class="box1">
                    <center>
                        <h1>{{ round(($campaign->raised_amount / $campaign->target_amount) * 100) }}%</h1>
                        <h3>funded<br>in 26 days</h3>
                        <h4><span>₹ {{$campaign->raised_amount }} Raised</span> <br>of ₹{{ $campaign->target_amount }} </h4>
                        <h5> {{$campaign->donor_count}} Donors </h5>

                    </center>
                </div>
                <div class="text1">
                    <span> Funds will be transferred for patient's treatment <i
                            class="fa-solid fa-circle-info"></i></span>
                </div>
                <button class="donate">
                    <h2>DONATE NOW</h2>
                    <span>(Indian tax benefits available)</span>
                </button>
                <div class="text2">
                    <span>Every social media share can bring ₹5,000</span>
                </div>
                <button class="share">
                    <h2>SHARE ON FACEBOOK</h2>
                </button>
                <div class="box2">
                    <center>
                        <h2>Donate via Paytm/Google Pay/PhonePe</h2>
                        <hr>
                        <div>
                            <i class="fa-brands fa-whatsapp"></i>
                            <i class="fa-brands fa-google-pay"></i>
                            <i class="fa-brands fa-amazon-pay"></i>
                            <i class="fa-brands fa-paypal"></i>
                        </div>
                        <img src="https://www.impactguru.com/fundraiser/getUPIQR/6daad7f0-d233-49d6-b147-d8e21f4dd08a/120"
                            alt="">
                        <p>Donations made through this fundraiser and UPI ID will be securely deposited into Impact
                            Guru’s bank account for the patient’s treatment. This UPI ID is not associated with any
                            individual’s or family’s personal bank account.</p>
                    </center>
                </div>

                <div class="box3">
                    <center>

                        <h3>Top Influencers</h3>
                        <hr>
                        <h4> <span class="circle"> DM</span>1st Donor </h4>
                        <h5>Dr M <br>₹9,999 </h5>
                        <a href="/campaign/{{ $campaign->id}}/donate">
                            <button class="donate">
                                <h2>DONATE NOW</h2>
                                <span>(Indian tax benefits available)</span>
                            </button>

                        </a>
                    </center>

                </div>
            </div>


        </div>
    </div>


</body>

</html>