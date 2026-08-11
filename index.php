<?php
require_once 'includes/db_config.php';

$blogs = [];
if ($pdo) {
    try {
        $stmt = $pdo->query("SELECT * FROM blogs ORDER BY id DESC");
        $blogs = $stmt->fetchAll();
    } catch (Throwable $e) {
        $blogs = [];
        error_log("Error fetching blogs from DB: " . $e->getMessage());
    }
}

if (empty($blogs)) {
    $jsonFile = 'data/blogs.json';
    if (file_exists($jsonFile)) {
        $blogs = json_decode(file_get_contents($jsonFile), true) ?? [];
    }
}

$blogCardsHtml = "";
foreach ($blogs as $blog) {
    $blogCardsHtml .= '
        <div class="blog-card" onclick="window.location.href=\'/post/' . htmlspecialchars($blog['slug']) . '\'" style="cursor:pointer;">
            <div class="blog-image-wrapper">
                <span class="category-badge">' . htmlspecialchars($blog['category']) . '</span>
                <img src="' . htmlspecialchars($blog['image']) . '" alt="' . htmlspecialchars($blog['title']) . '" loading="lazy" decoding="async" class="blog-cover">
            </div>
            <div class="blog-content">
                <div class="blog-meta">
                    <span><i class="fa-regular fa-calendar"></i> ' . htmlspecialchars($blog['date']) . '</span>
                    <span><i class="fa-regular fa-clock"></i> ' . htmlspecialchars($blog['readTime']) . '</span>
                </div>
                <h3>' . htmlspecialchars($blog['title']) . '</h3>
                <p>' . htmlspecialchars($blog['summary']) . '</p>
                <div class="blog-footer">
                    <div class="author-info">
                        <img src="' . htmlspecialchars($blog['authorImg']) . '" alt="' . htmlspecialchars($blog['author']) . '" loading="lazy" decoding="async">
                        <span>' . htmlspecialchars($blog['author']) . '</span>
                    </div>
                    <a href="/post/' . htmlspecialchars($blog['slug']) . '" class="btn-arrow"><i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Marketing Services in India | Anurag Marketing</title>
    <meta name="description" content="Get the best digital marketing services in India for startups and businesses. Anurag Marketing offers SEO, ads, & online marketing to grow your brand fast.">
    <meta name="keywords" content="Digital Marketing Services, Best Digital Marketing Service in India, Online Marketing Services India, Digital Marketing Services for Startups">
    <link rel="canonical" href="https://www.anuragmarketing.in/" />

    <link rel="stylesheet" href="index.css">

    <!-- Preconnect to external CDNs for faster handshake -->
    <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
    <link rel="preconnect" href="https://connect.facebook.net" crossorigin>

    <!-- Font Awesome: non-blocking preload so it never delays first paint -->
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"></noscript>

    <script src="tab-effect.js" defer></script>
    <link rel="icon" type="image/x-icon" href="fav.ico">
    <meta name="robots" content="index, follow" />
    
    <script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "WebSite",
  "name": "Anurag Marketing",
  "url": "https://www.anuragmarketing.in/",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "https://www.anuragmarketing.in/services{search_term_string}",
    "query-input": "required name=search_term_string"
  }
}
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "Anurag Marketing",
  "url": "https://www.anuragmarketing.in/",
  "logo": "",
  "sameAs": [
    "https://www.facebook.com/share/1Djz8Gpzga/",
    "https://www.instagram.com/anurag.gupta_09",
    "https://www.linkedin.com/company/anurag-marketing/",
    "https://x.com/AnuragG31384040"
  ]
}
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "Person",
  "name": "Anurag Gupta",
  "url": "https://www.anuragmarketing.in/",
  "image": "",
  "sameAs": [
    "https://www.facebook.com/share/1Djz8Gpzga/",
    "https://x.com/AnuragG31384040",
    "https://www.instagram.com/anurag.gupta_09",
    "https://www.linkedin.com/company/anurag-marketing/"
  ]  
}
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [{
    "@type": "Question",
    "name": "What services do you actually provide?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "We offer a comprehensive suite of digital services including SEO, Social Media Management, Marketing Automation, Brand Strategy, and Custom Web Development tailored to your industry."
    }
  },{
    "@type": "Question",
    "name": "How long does it take to see results?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "While some paid advertising campaigns can generate immediate traffic, organic growth like SEO and content marketing typically takes 3 to 6 months to show significant, sustainable results."
    }
  },{
    "@type": "Question",
    "name": "Do you work with small businesses or startups?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Absolutely! We scale our strategies to fit businesses of all sizes. Whether you are a startup looking for brand awareness or an enterprise needing complex automation, we have a plan for you."
    }
  },{
    "@type": "Question",
    "name": "How do we get started?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Getting started is easy! Just fill out the contact form above or schedule a free consultation through our banner button. Our team will analyze your needs and propose a customized strategy."
    }
  }]
}
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "Anurag Marketing",
  "image": "",
  "@id": "",
  "url": "https://www.anuragmarketing.in/",
  "telephone": "9821038868",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "",
    "addressLocality": "Green Park",
    "postalCode": "110016",
    "addressCountry": "IN"
  },
  "openingHoursSpecification": {
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": [
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday",
      "Saturday"
    ],
    "opens": "10:00",
    "closes": "19:00"
  } 
}
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MS8Z6LT3');</script>
<!-- End Google Tag Manager -->
</script>
<!-- Google tag (gtag.js) -->
<script async src=""https://www.googletagmanager.com/gtag/js?id=G-VHLHDTLRJP""></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  
  gtag('config', 'G-VHLHDTLRJP');
</script>






</head>

<body>

    <div class="site-bg-overlay" id="site-overlay"></div>

    <nav class="nav-container">

        <a href="https://www.anuragmarketing.in" class="logo" style="text-decoration: none; color: inherit; display: block;">Anurag Marketing</a>

        <ul class="nav-menu">

            <li>
                <a href="/">
                    <img src="icon/home.png" class="icon">
                    <span>Home</span>
                </a>
            </li>

            <li>
                <a href="/about">
                    <img src="icon/man.png" class="icon">
                    <span>About</span>
                </a>
            </li>

            <li class="has-dropdown">
                <a href="/services">
                    <img src="icon/working.png" class="icon">
                    <span>Services</span>
                </a>
                <ul class="dropdown">
                    <li><a href="/performance-marketing"> Performance Marketing</a></li>
                    <li><a href="/seo"> SEO Optimization</a></li>
                    <li><a href="/smo"> SMO (Social Media)</a></li>
                </ul>
            </li>

            <li>
                <a href="/blog">
                    <img src="icon/blog.png" class="icon">
                    <span>Blog</span>
                </a>
            </li>

            <li>
                <a href="/contact">
                    <img src="icon/customer-support.png" class="icon">
                    <span>Contact</span>
                </a>
            </li>

        </ul>

        <div class="menu-toggle" id="mobile-menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>

    </nav>

    <div class="banner-container">
        <div class="left-content">
            <div class="text-black">Accelerating</div>
            <div class="text-yellow hover-word" id="digital-hover">Digital</div>
            <div class="inline-line">
                <div class="text-yellow hover-word" id="success-hover">Success</div>
                <div class="text-black" style="font-size: 32px;">Across</div>
            </div>
            <div class="text-black">All Industries</div>
            <a href="https://www.anuragmarketing.in/contact" class="cta-button" style="text-decoration: none; display: inline-block;">SCHEDULE YOUR FREE CONSULTATION TODAY!</a>
        </div>

        <div class="right-content">
            <div class="accent dot-grid"></div>
            <svg class="accent star" viewBox="0 0 24 24" width="28" height="28" fill="#FDE047">
                <path d="M12 0 L14.59 9.41 L24 12 L14.59 14.59 L12 24 L9.41 14.59 L0 12 L9.41 9.41 Z" />
            </svg>
            <div class="circle-bg circle-gray"></div>
            <div class="circle-bg circle-yellow-blur"></div>
            <div class="circle-small-yellow"></div>

            <div class="dynamic-text-container hover-word" id="typewriter-hover">
                <span class="dynamic-text" id="typewriter"></span><span class="cursor">|</span>
            </div>

            <svg class="accent pie-chart" viewBox="0 0 24 24" width="45" height="45" stroke="#111827" stroke-width="1.2"
                fill="none">
                <path d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18z"></path>
                <path d="M12 3v9h9" fill="#111827"></path>
            </svg>
            <svg class="accent line-chart" viewBox="0 0 80 50" width="100" height="60">
                <circle cx="10" cy="15" r="2" fill="#e2e8f0" />
                <circle cx="10" cy="30" r="2" fill="#e2e8f0" />
                <circle cx="10" cy="45" r="2" fill="#e2e8f0" />
                <line x1="15" y1="15" x2="75" y2="15" stroke="#f1f5f9" stroke-width="2" />
                <line x1="15" y1="30" x2="75" y2="30" stroke="#f1f5f9" stroke-width="2" />
                <line x1="15" y1="45" x2="75" y2="45" stroke="#f1f5f9" stroke-width="2" />
                <path d="M 25 45 L 45 45 L 60 30 L 75 15" stroke="#111827" stroke-width="1.5" fill="none" />
                <line x1="60" y1="30" x2="60" y2="45" stroke="#111827" stroke-width="1.5" />
                <line x1="75" y1="15" x2="75" y2="45" stroke="#111827" stroke-width="1.5" />
                <circle cx="25" cy="45" r="3.5" fill="#111827" />
                <circle cx="45" cy="45" r="3.5" fill="#111827" />
                <circle cx="60" cy="30" r="3.5" fill="#111827" />
                <circle cx="75" cy="15" r="3.5" fill="#111827" />
                <circle cx="60" cy="45" r="3.5" fill="#111827" />
                <circle cx="75" cy="30" r="3.5" fill="#111827" />
                <circle cx="75" cy="45" r="3.5" fill="#111827" />
            </svg>
        </div>
    </div>

    <section class="services-section">
        <div class="services-container">

            <div class="services-header">
                <h4 class="sub-heading">What We Do</h4>
                <h2>Our Premium <span class="highlight-text">Services</span></h2>
                <p>Anurag Marketing is one of the leading providers of online marketing services in India, offering a complete suite of solutions under one roof. Whether you're a startup looking for your first customers or an established brand wanting to scale, we have a service designed for you.</p>
            </div>

            <div class="services-grid">

                <div class="service-card">
                    <div class="service-icon-box">
                        <i class="fa-solid fa-chart-line"></i>
                    </div>
                    <h3>Digital Strategy</h3>
                    <p>Data-driven marketing strategies designed to scale your business and outsmart your competitors in
                        the digital space.</p>
                    <a href="contact" class="service-link">Explore Service <i class="fa-solid fa-arrow-right"></i></a>
                </div>

                <div class="service-card">
                    <div class="service-icon-box">
                        <i class="fa-solid fa-magnifying-glass-chart"></i>
                    </div>
                    <h3>SEO Optimization</h3>
                    <p>Search Engine Optimization (SEO) Rank higher on Google and get free, consistent organic traffic. Our SEO services include keyword research, on-page optimization, technical SEO, content strategy, and quality link building for all designed for long-term, sustainable growth.</p>
                    <a href="contact" class="service-link">Explore Service <i class="fa-solid fa-arrow-right"></i></a>
                </div>

                <div class="service-card">
                    <div class="service-icon-box">
                        <i class="fa-solid fa-bullseye"></i>
                    </div>
                    <h3>Paid Advertising</h3>
                    <p>Get instant visibility and qualified leads through highly targeted Google Ads and Meta Ads to managed for maximize your ROI, not just your ad spend.</p>
                    <a href="contact" class="service-link">Explore Service <i class="fa-solid fa-arrow-right"></i></a>
                </div>

                <div class="service-card">
                    <div class="service-icon-box">
                        <i class="fa-solid fa-hashtag"></i>
                    </div>
                    <h3>Social Media Management</h3>
                    <p>Social Media Marketing (SMM) Build a brand your audience actually engages with. We manage content strategy, creative design, community engagement, and paid social campaigns across Instagram, Facebook, LinkedIn, and more.
                    </p>
                    <a href="contact" class="service-link">Explore Service <i class="fa-solid fa-arrow-right"></i></a>
                </div>

                <div class="service-card">
                    <div class="service-icon-box">
                        <i class="fa-solid fa-robot"></i>
                    </div>
                    <h3>Marketing Automation</h3>
                    <p>Save time and nurture leads automatically with smart email sequences, chatbots, and CRM
                        integrations.</p>
                    <a href="contact" class="service-link">Explore Service <i class="fa-solid fa-arrow-right"></i></a>
                </div>

                <div class="service-card">
                    <div class="service-icon-box">
                        <i class="fa-solid fa-laptop-code"></i>
                    </div>
                    <h3>Web Development</h3>
                    <p>Custom, high-converting websites designed with modern UI/UX principles to turn your visitors into
                        paying customers.</p>
                    <a href="contact" class="service-link">Explore Service <i class="fa-solid fa-arrow-right"></i></a>
                </div>

            </div>
        </div>
    </section>


    <section class="premium-blog-section">
        <div class="blog-header">
            <h2>Latest <span class="highlight-text">Insights</span></h2>
            <p>Stay updated with the latest trends, tips, and strategies in digital marketing.</p>
        </div>

        <div class="blog-slider-container">
            <div class="blog-track">
                <?php if (empty($blogs)): ?>
                    <p style="text-align: center; color: #64748b; padding: 40px; width:100%;">No blogs found at the moment.</p>
                <?php else: ?>
                    <div class="blog-slide"><?= $blogCardsHtml ?></div>
                    <div class="blog-slide"><?= $blogCardsHtml ?></div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="faq-section">
        <div class="faq-container">
            <div class="faq-header">
                <h2>Frequently Asked <span class="highlight-text">Questions</span></h2>
                <p>Find answers to common questions about our digital marketing and automation services.</p>
            </div>

            <div class="faq-list">
                <div class="faq-item">
                    <button class="faq-question">
                        What services do you actually provide?
                        <i class="fa-solid fa-chevron-down icon"></i>
                    </button>
                    <div class="faq-answer">
                        <p>We offer a comprehensive suite of digital services including SEO, Social Media Management,
                            Marketing Automation, Brand Strategy, and Custom Web Development tailored to your industry.
                        </p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question">
                        How long does it take to see results?
                        <i class="fa-solid fa-chevron-down icon"></i>
                    </button>
                    <div class="faq-answer">
                        <p>While some paid advertising campaigns can generate immediate traffic, organic growth like SEO
                            and content marketing typically takes 3 to 6 months to show significant, sustainable
                            results.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question">
                        Do you work with small businesses or startups?
                        <i class="fa-solid fa-chevron-down icon"></i>
                    </button>
                    <div class="faq-answer">
                        <p>Absolutely! We scale our strategies to fit businesses of all sizes. Whether you are a startup
                            looking for brand awareness or an enterprise needing complex automation, we have a plan for
                            you.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question">
                        How do we get started?
                        <i class="fa-solid fa-chevron-down icon"></i>
                    </button>
                    <div class="faq-answer">
                        <p>Getting started is easy! Just fill out the contact form above or schedule a free consultation
                            through our banner button. Our team will analyze your needs and propose a customized
                            strategy.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="contact-section">
        <div class="contact-container">

            <div class="contact-info">
                <h2>Let's Talk!</h2>
                <p>Have a project in mind or want to accelerate your digital growth? Drop us a message, and our team
                    will get back to you within 24 hours.</p>

                <div class="info-items">
                    <div class="info-box">
                        <div class="info-icon"><i class="fa-solid fa-envelope"></i></div>
                        <div class="info-text">
                            <h4>Email Us</h4>
                            <a href="mailto:info@anuragmarketing.in" style="color: inherit; text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='var(--accent)'" onmouseout="this.style.color='inherit'">info@anuragmarketing.in</a>
                        </div>
                    </div>

                    <div class="info-box">
                        <div class="info-icon"><i class="fa-solid fa-phone"></i></div>
                        <div class="info-text">
                            <h4>Call Us</h4>
                            <a href="tel:+919821038868" style="color: inherit; text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='var(--accent)'" onmouseout="this.style.color='inherit'">+91 98210 38868</a>
                        </div>
                    </div>


                </div>

                <div class="accent-circle"></div>
            </div>

            <div class="contact-form-wrapper">
                <h3>Send us a Message</h3>

                <!-- Status Message Box -->
                <div id="home-form-status" style="display:none; padding: 14px 20px; border-radius: 12px; margin-bottom: 20px; font-size: 0.95rem; font-weight: 500; text-align: center;"></div>

                <form class="modern-form" id="homeContactForm">
                    <div class="form-row">
                        <div class="input-group">
                            <label>First Name *</label>
                            <input type="text" name="first_name" placeholder="First name" required>
                        </div>
                        <div class="input-group">
                            <label>Last Name</label>
                            <input type="text" name="last_name" placeholder="Last Name">
                        </div>
                    </div>

                    <div class="input-group">
                        <label>Email Address *</label>
                        <input type="email" name="email" placeholder="xyz@example.com" required>
                    </div>

                    <div class="input-group">
                        <label>Phone Number</label>
                        <input type="tel" name="phone" placeholder="+91 98765 43210">
                    </div>

                    <div class="input-group">
                        <label>How can we help you? *</label>
                        <textarea name="message" rows="4" placeholder="Tell us about your project or inquiry..." required></textarea>
                    </div>

                    <button type="submit" class="submit-btn" id="homeSubmitBtn">SEND MESSAGE <i class="fa-solid fa-arrow-right"></i></button>
                </form>

                <script>
                document.getElementById('homeContactForm').addEventListener('submit', function(e) {
                    e.preventDefault();
                    var btn = document.getElementById('homeSubmitBtn');
                    var status = document.getElementById('home-form-status');
                    btn.disabled = true;
                    btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin" style="margin-right:8px;"></i>Sending...';
                    status.style.display = 'none';
                    var formData = new FormData(this);
                    fetch('/contact_mail', { method: 'POST', body: formData })
                    .then(function(res) { return res.json(); })
                    .then(function(data) {
                        if (data.success) {
                            status.style.display = 'block';
                            status.style.background = 'rgba(16, 185, 129, 0.12)';
                            status.style.border = '1px solid rgba(16, 185, 129, 0.4)';
                            status.style.color = '#10b981';
                            status.innerHTML = '<i class="fa-solid fa-circle-check" style="margin-right:8px;"></i>' + data.message;
                            document.getElementById('homeContactForm').reset();
                            btn.disabled = false;
                            btn.innerHTML = 'SEND MESSAGE <i class="fa-solid fa-arrow-right"></i>';
                        } else { throw new Error(data.message); }
                    })
                    .catch(function(err) {
                        status.style.display = 'block';
                        status.style.background = 'rgba(239, 68, 68, 0.12)';
                        status.style.border = '1px solid rgba(239, 68, 68, 0.4)';
                        status.style.color = '#ef4444';
                        status.innerHTML = '<i class="fa-solid fa-circle-exclamation" style="margin-right:8px;"></i>' + (err.message || 'Something went wrong. Please try again.');
                        btn.disabled = false;
                        btn.innerHTML = 'SEND MESSAGE <i class="fa-solid fa-arrow-right"></i>';
                    });
                });
                </script>
            </div>

        </div>

    </section>

    <!-- SEO Intro Content Section -->
    <section class="seo-intro-section">
        <div class="seo-intro-container">
            <h2 class="seo-intro-title">Digital Marketing <span class="highlight-text">Services</span> in India</h2>
            <p>Running a business online sounds simple until you actually try to get people to notice you. A website goes live, a few posts go up, maybe some ads run for a while… and then things slow down. That’s usually where most people get stuck.</p>
            <p>This is where our Digital Marketing Services come in. Not with big claims, but with work that makes sense for your business. Some brands need visibility. Some need leads. Others just want consistent growth without burning money on random campaigns. We look at where you are and build from there.</p>
            <div class="seo-intro-btn-wrapper">
                <a href="javascript:void(0)" class="read-more-seo-btn" id="openSeoModalBtn">Read More <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
    </section>


    <footer class="modern-footer">
        <div class="footer-top">
            <div class="footer-col brand-col">
                <h2 class="footer-logo"><a href="/" style="color: inherit; text-decoration: none;">Anurag Marketing</a></h2>
                <p>Accelerating digital success across all industries with cutting-edge strategies, education, and marketing automation.</p>
                <div class="social-links">
                    <a href="https://x.com/AnuragG31384040" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-twitter"></i></a>
                    <a href="https://www.linkedin.com/company/anurag-marketing/" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-linkedin-in"></i></a>
                    <a href="https://www.instagram.com/anurag.gupta_09" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://www.facebook.com/share/1Djz8Gpzga/" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-facebook-f"></i></a>
                </div>
            </div>

            <div class="footer-col">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/about">About Us</a></li>
                    <li><a href="/services">Our Services</a></li>
                    <li><a href="/blog">Latest Blog</a></li>
                    <li><a href="/contact">Contact Support</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h3>Our Services</h3>
                <ul>
                    <li><a href="/services">Digital Marketing</a></li>
                    <li><a href="/seo">SEO Optimization</a></li>
                    <li><a href="/performance-marketing">Performance Marketing</a></li>
                    <li><a href="/smo">SMO</a></li>
                    <li><a href="/services">Brand Strategy</a></li>
                </ul>
            </div>

            <div class="footer-col newsletter-col">
                <h3>Subscribe</h3>
                <p>Get the latest updates, news, and special offers directly in your inbox.</p>
                <form class="subscribe-form" onsubmit="event.preventDefault(); this.querySelector('button').innerHTML='<i class=\'fa-solid fa-check\'></i>'; this.querySelector('input').value=''; this.querySelector('button').style.background='#10b981';">
                    <input type="email" placeholder="Your email address" required>
                    <button type="submit"><i class="fa-solid fa-paper-plane"></i></button>
                </form>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; 2026 Anurag Marketing. All rights reserved. Designed for digital success.</p>
        </div>
    </footer>
    <script>
        const words = ["AUTOMATION", "MARKETING", "INNOVATION"];
        let i = 0, j = 0;
        let isDeleting = false;

        function type() {
            const currentWord = words[i];
            const typeSpeed = isDeleting ? 80 : 150;

            document.getElementById("typewriter").textContent = currentWord.substring(0, isDeleting ? j - 1 : j + 1);
            isDeleting ? j-- : j++;

            if (!isDeleting && j === currentWord.length) {
                isDeleting = true;
                setTimeout(type, 2000);
            } else if (isDeleting && j === 0) {
                isDeleting = false;
                i = (i + 1) % words.length;
                setTimeout(type, 500);
            } else {
                setTimeout(type, typeSpeed);
            }
        }
        document.addEventListener("DOMContentLoaded", () => setTimeout(type, 1000));

        document.addEventListener("DOMContentLoaded", function () {
            const digitalHover = document.getElementById("digital-hover");
            const successHover = document.getElementById("success-hover");
            const typewriterHover = document.getElementById("typewriter-hover");
            const siteOverlay = document.getElementById("site-overlay");
            const body = document.body;

            function activateBg(bgClass, el) {
                siteOverlay.className = 'site-bg-overlay ' + bgClass;
                siteOverlay.style.opacity = '1';
                body.classList.add('has-bg-active');
                if (el) el.classList.add('active-word');
            }

            function deactivateBg(el) {
                siteOverlay.style.opacity = '0';
                body.classList.remove('has-bg-active');
                if (el) el.classList.remove('active-word');
            }

            digitalHover.addEventListener("mouseenter", () => activateBg('bg-digital', digitalHover));
            digitalHover.addEventListener("mouseleave", () => deactivateBg(digitalHover));

            successHover.addEventListener("mouseenter", () => activateBg('bg-success', successHover));
            successHover.addEventListener("mouseleave", () => deactivateBg(successHover));

            typewriterHover.addEventListener("mouseenter", () => {
                const currentWord = document.getElementById("typewriter").textContent.toUpperCase();
                let bgClass = 'bg-automation';
                if (currentWord.includes("MARK")) bgClass = 'bg-marketing';
                else if (currentWord.includes("EDU")) bgClass = 'bg-education';
                else if (currentWord.includes("INNO")) bgClass = 'bg-innovation';
                activateBg(bgClass, typewriterHover);
            });
            typewriterHover.addEventListener("mouseleave", () => deactivateBg(typewriterHover));

            const faqQuestions = document.querySelectorAll(".faq-question");

            faqQuestions.forEach(question => {
                question.addEventListener("click", () => {
                    const faqItem = question.parentElement;
                    const faqAnswer = question.nextElementSibling;

                    // Agar dusre kisi ko close karna ho jab ek open ho (Accordion effect)
                    document.querySelectorAll(".faq-item").forEach(item => {
                        if (item !== faqItem) {
                            item.classList.remove("active");
                            item.querySelector(".faq-answer").style.maxHeight = null;
                        }
                    });

                    // Toggle current FAQ
                    faqItem.classList.toggle("active");

                    if (faqItem.classList.contains("active")) {
                        faqAnswer.style.maxHeight = faqAnswer.scrollHeight + "px";
                    } else {
                        faqAnswer.style.maxHeight = null;
                    }
                });
            });

            // SEO Content Modal Logic
            const openModalBtn = document.getElementById("openSeoModalBtn");
            const closeModalBtn = document.getElementById("closeSeoModalBtn");
            const modal = document.getElementById("seoContentModal");
            const modalOverlay = document.getElementById("seoModalOverlay");

            if (openModalBtn && modal) {
                openModalBtn.addEventListener("click", function () {
                    modal.classList.add("active");
                    document.body.classList.add("modal-open");
                });

                const closeModal = function () {
                    modal.classList.remove("active");
                    document.body.classList.remove("modal-open");
                };

                closeModalBtn.addEventListener("click", closeModal);
                modalOverlay.addEventListener("click", closeModal);

                document.addEventListener("keydown", function (e) {
                    if (e.key === "Escape" && modal.classList.contains("active")) {
                        closeModal();
                    }
                });
            }
        });
    </script>
    


    <!-- SEO Content Modal -->
    <div id="seoContentModal" class="seo-modal" aria-hidden="true">
        <div class="seo-modal-overlay" id="seoModalOverlay"></div>
        <div class="seo-modal-container">
            <div class="seo-modal-header">
                <h3>Description</h3>
                <button class="seo-modal-close" id="closeSeoModalBtn" aria-label="Close modal">&times;</button>
            </div>
            <div class="seo-modal-body" id="seoModalBody">
                <h1>Digital Marketing Services in India</h1>
                <p>Running a business online sounds simple until you actually try to get people to notice you. A website goes live, a few posts go up, maybe some ads run for a while… and then things slow down. That’s usually where most people get stuck.</p>
                <p>This is where our Digital Marketing Services come in. Not with big claims, but with work that makes sense for your business. Some brands need visibility. Some need leads. Others just want consistent growth without burning money on random campaigns. We look at where you are and build from there.</p>
                <p>If you have been searching for the Best Digital Marketing Service in India, you already know how crowded this space is. Everyone says they are the best. We don’t try to prove that with words. We let the work do that. The process is simple. Understand your business, study what your competitors are doing, and then plan something that actually fits your goals.</p>
                <p>Our Online Marketing Services India are not packed with things you don’t need. We focus on what actually helps. That could be improving your search presence, running ads that are properly tracked, or handling your social media in a way that feels real and not forced. Everything is done with a clear reason behind it.</p>
                <p>For newer businesses, things are a bit different. Budgets are tighter, and every decision matters more. That’s why our Digital Marketing Services for Startups are built to keep things practical. No unnecessary spending, no long-term lock-ins. Just a clear direction so you can start seeing movement without overthinking every step.</p>
                <p>At the end of it, digital marketing is not as complicated as people make it sound. It just needs the right focus, some patience, and work that is done consistently. That is what we try to bring in, every time we take on a project.</p>
                <h2>Digital Marketing Services for Startups</h2>
                <p>We understand that startups don't have the same budget or bandwidth as large enterprises — which is why Anurag Marketing offers specialized digital marketing services for startups in India, focused on fast, cost-effective growth.</p>
                <h2>How we help startups specifically:</h2>

    <ul>
        <li>
            <strong>Budget-friendly packages</strong> — get expert marketing without hiring a full in-house team
        </li>

        <li>
            <strong>Growth-first strategy</strong> — focus on customer acquisition and brand visibility from day one
        </li>

        <li>
            <strong>Scalable plans</strong> — start small and expand your marketing as your revenue grows
        </li>

        <li>
            <strong>MVP &amp; launch marketing</strong> — go-to-market strategy for new products and services
        </li>

        <li>
            <strong>Investor-ready metrics</strong> — clear, professional reporting you can show stakeholders
        </li>
    </ul>
                <p>Our Online Marketing Services India are not packed with things you don’t need. We focus on what actually helps. That could be improving your search presence, running ads that are properly tracked, or handling your social media in a way that feels real and not forced. Everything is done with a clear reason behind it.</p>
                <p>For newer businesses, things are a bit different. Budgets are tighter, and every decision matters more. That’s why our Digital Marketing Services for Startups are built to keep things practical. No unnecessary spending, no long-term lock-ins. Just a clear direction so you can start seeing movement without overthinking every step.</p>
                <p>At the end of it, digital marketing is not as complicated as people make it sound. It just needs the right focus, some patience, and work that is done consistently. That is what we try to bring in, every time we take on a project.</p>
            </div>
        </div>
    </div>

    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MS8Z6LT3"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

</body>

</html>
