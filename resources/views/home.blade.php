<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funds | Help Patients Get Treatment</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>

<body>
    <div class="page-shell">
        <section class="top-strip">
            <div class="top-strip__content">
                <div class="top-strip__left">
                    <img src="https://cdn.impactguru.com/themes/front/images/homepage-icons/bg-box-cp.png" alt="Child illustration" class="top-strip__image">
                    <p>Be a saviour for many. Donate monthly to help save invaluable lives in India.</p>
                </div>
                <a href="#monthly" class="top-strip__cta">Donate Monthly</a>
            </div>
        </section>

        <header class="navbar">
            <div class="navbar__inner">
                <a href="#" class="brand">
                    <span class="brand__mark">+</span>
                    <span class="brand__name">ImpactGuru</span>
                </a>

                <nav class="nav-links" aria-label="Primary">
                    <a href="/campaign/create">Start a free fundraiser</a>
                    <a href="#how-it-works">How it Works</a>
                    <a href="#browse">Browse Fundraisers</a>
                    <a href="#top">Top Fundraisers</a>
                </nav>

                <div class="navbar__actions">
                    <a href="/campaign/{{ $campaigns->first()->id }}"
                        class="pill-button pill-button--light">
                        Help {{ $campaigns->first()->campaigner_name }}
                    </a>
                    <a href="{{ url('/login') }}" class="nav-link">Login</a>
                    <button class="currency" type="button">₹ INR <span aria-hidden="true">⌄</span></button>
                </div>
            </div>
        </header>

        <main>
            <section class="hero" id="top">
                <div class="hero__content">
                    <p class="eyebrow">Help a child get the treatment they need</p>
                    <h1>Need Funds For Your Medical Treatment?</h1>
                    <p class="hero__subtitle">Don&apos;t worry you&apos;ve come to the right platform.</p>
                    <div class="hero__divider"></div>

                    <div class="hero__support">
                        <p>With <strong>0%*</strong> platform fee, you can raise funds too!</p>
                    </div>

                    <div class="hero__actions">
                        <a href="/campaign/create" class="primary-button">Start A Free Fundraiser</a>
                    </div>
                </div>

                <div class="hero__visual">
                    <img
                        src="https://www.impactguru.com/themes/front/page/images/home-page/BannerImageMobile-webp.webp"
                        alt="Sleeping baby receiving medical support">
                </div>
            </section>

            <section class="monthly-card" id="monthly">
                <div class="monthly-card__copy">
                    <p class="monthly-card__label">Give Every Month <span>♥</span></p>
                    <h2>To Save Countless Lives</h2>
                    <p>GEM or &apos;Give Every Month&apos; is a monthly donation subscription that helps patients in India afford life-saving treatment on time.</p>
                    <a href="#contact" class="secondary-button">Give Every Month</a>
                </div>

                <div class="monthly-card__features">
                    <article>
                        <div class="feature-icon">100%</div>
                        <h3>100% Transparency</h3>
                    </article>
                    <article>
                        <div class="feature-icon">80G</div>
                        <h3>80G Tax Benefits</h3>
                    </article>
                    <article>
                        <div class="feature-icon">Impact</div>
                        <h3>Track Your Impact</h3>
                    </article>
                    <article>
                        <div class="feature-icon">Love</div>
                        <h3>Honour your donations for your loved ones</h3>
                    </article>
                </div>
            </section>

            <section class="fundraisers" id="browse">
                <div class="section-heading">
                    <h2>Our Top Fundraisers</h2>
                    <span></span>
                </div>

                <div class="fundraisers__rail">

                    @foreach($campaigns as $campaign)

                    <article class="fundraiser-card">

                        <div class="fundraiser-card__media">

                            @if($campaign->images->isNotEmpty())

                            <img
                                src="data:image/jpeg;base64,{{ $campaign->images->first()->image_data }}"
                                alt="Campaign Image"
                                style="width:100%; height:200px; object-fit:cover;">

                            @endif

                        </div>

                        <div class="fundraiser-card__body">

                            <h3>{{ $campaign->title }}</h3>

                            <p>by {{ $campaign->campaigner_name }}</p>

                            <p>
                                ₹{{ number_format($campaign->raised_amount) }}
                                raised of
                                ₹{{ number_format($campaign->target_amount) }}
                            </p>

                            <div class="fundraiser-card__actions">

                                <a href="/campaign/{{ $campaign->id }}">
                                    <button type="button">
                                        View Campaign
                                    </button>
                                </a>

                            </div>

                        </div>

                    </article>

                    @endforeach

                </div>
            </section>
        </main>
        @if(session('success'))
        <div id="toast" class="toast success">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div id="toast" class="toast error">
            {{ session('error') }}
        </div>
        @endif
        <a href="#contact" class="floating-contact">Contact Us</a>
    </div>
    <script>
        setTimeout(() => {
            const toast = document.getElementById('toast');

            if (toast) {
                toast.style.display = 'none';
            }
        }, 7000);
    </script>
</body>

</html>