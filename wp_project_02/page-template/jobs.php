<?php
/**
 * Template Name: Jobs Layout Template
 */
get_header(); ?>

<!-- Banner Section Start -->
<section class="banner-section inner-filter-banner ">
    <div class="bg-media" style="background-image: url(/jobs-banner-bg.png)"></div>
    <div class="container">
         <div class="banner-filter position-relative">
            
            <div class="looking-filter">
                <div class="filter-header d-flex justify-content-between align-items-center">
                    <h2 class="h3 mb-0">What are you looking for?</h2>
                    <div class="recruiting-link">
                        <p class="mb-0">Recruiting? <a href="#" class="text-primary text-decoration-none">Click Here</a></p>
                    </div>
                </div>
                <form class="filter-form" action="" method="GET">
                    <div class="row">
                        <div class="col-12 col-lg-10">
                            <div class="row g-3">
                                <div class="col-12 col-md-6 col-lg-3">
                                    <select name="job_title" class="form-select py-3">
                                        <option value="">Job Title</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 col-lg-3">
                                    <select name="speciality" class="form-select py-3">
                                        <option value="">Speciality</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 col-lg-3">
                                    <select name="location" class="form-select py-3">
                                        <option value="">Location</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 col-lg-3">
                                    <select name="employment_type" class="form-select py-3">
                                        <option value="">Employment Type</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-2">
                            <button type="submit" class="btn btn-primary w-100 py-3 d-flex align-items-center justify-content-center gap-2">
                                Search
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Banner Section End -->

<section class="job-filter-section space-y">
    <div class="container">
        <div class="row job-filter-wrap">
            <div class="col-12 col-lg-4 filter-sidebar">
                <div class="job-sidebar-filter">
                    <h4>Filter your search</h4>
                    <div class="filter-item">
                        <strong>Salary Range</strong>
                        <div class="mt-2 mb-2">
                            <label class="form-label mb-1">From</label>
                            <select class="form-select py-3">
                                <option>Lorem Ipsum</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="form-label mb-1">To</label>
                            <select class="form-select py-3">
                                <option>Lorem Ipsum</option>
                            </select>
                        </div>
                    </div>

                    <div class="filter-item">
                        <strong>Date Posted</strong>
                        <div class="mt-2">
                            <select class="form-select py-3">
                                <option>Lorem Ipsum</option>
                            </select>
                        </div>
                    </div>
                  
                    <div class="filter-item">
                        <strong>Town</strong>
                        <div class="mt-2">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="town1">
                                <label class="form-check-label" for="town1">Lorem Ipsum</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="town2">
                                <label class="form-check-label" for="town2">Lorem Ipsum</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="town3">
                                <label class="form-check-label" for="town3">Lorem Ipsum</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="town4">
                                <label class="form-check-label" for="town4">Lorem Ipsum</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="town5">
                                <label class="form-check-label" for="town5">Lorem Ipsum</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="town6">
                                <label class="form-check-label" for="town6">Lorem Ipsum</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="town7">
                                <label class="form-check-label" for="town7">Lorem Ipsum</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-8 filter-result">
                <div class="inner-wrap">
                    <h4>Find your dream Healthcare Jobs Across The U.S.</h4>
                    <div class="total-jobs">Showing 4,744 Jobs</div>

                    <div class="row jobs-card-list">
                        <div class="col-12 col-md-6 job-card-item">
                            <div class="card-jobs">
                                <div class="card-badge">New</div>
                                <h3 class="job-title">Travel Nurse/Registered Nurse (RN) – MedSurg/Telemetry</h3>
                                <ul class="job-info">
                                    <li>
                                        <img src="/job-location-icon.svg" alt="">
                                        <span><strong>Location:</strong> Charlotte, North Carolina, USA</span>
                                    </li>
                                    <li>
                                        <img src="/job-Specialty-icon.svg" alt="">
                                        <span><strong>Specialty:</strong> Health Care</span>
                                    </li>
                                    <li>
                                        <img src="/job-type-icon.svg" alt="">
                                        <span><strong>Type:</strong> Contract</span>
                                    </li>
                                    <li>
                                        <img src="/job-Schedule-icon.svg" alt="">
                                        <span><strong>Schedule:</strong> Lorem ipsum</span>
                                    </li>
                                    <li>
                                        <img src="/job-time-icon.svg" alt="">
                                        <span><strong>Time:</strong> Lorem ipsum</span>
                                    </li>
                                </ul>
                                <div class="card-actions">
                                    <a href="#" class="btn btn-primary"><span>Read More</span> <i class="fa-regular fa-arrow-right"></i></a>
                                    <a href="#" class="btn btn-secondary"><span>Apply Now</span> <i class="fa-regular fa-arrow-right"></i></a>
                                    <button type="button" class="btn-share">
                                        <i class="fa-light fa-share-nodes"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 job-card-item">
                            <div class="card-jobs">
                                <div class="card-badge">New</div>
                                <h3 class="job-title">Travel Nurse/Registered Nurse (RN) – MedSurg/Telemetry</h3>
                                <ul class="job-info">
                                    <li>
                                        <img src="/job-location-icon.svg" alt="">
                                        <span><strong>Location:</strong> Charlotte, North Carolina, USA</span>
                                    </li>
                                    <li>
                                        <img src="/job-Specialty-icon.svg" alt="">
                                        <span><strong>Specialty:</strong> Health Care</span>
                                    </li>
                                    <li>
                                        <img src="/job-type-icon.svg" alt="">
                                        <span><strong>Type:</strong> Contract</span>
                                    </li>
                                    <li>
                                        <img src="/job-Schedule-icon.svg" alt="">
                                        <span><strong>Schedule:</strong> Lorem ipsum</span>
                                    </li>
                                    <li>
                                        <img src="/job-time-icon.svg" alt="">
                                        <span><strong>Time:</strong> Lorem ipsum</span>
                                    </li>
                                </ul>
                                <div class="card-actions">
                                    <a href="#" class="btn btn-primary"><span>Read More</span> <i class="fa-regular fa-arrow-right"></i></a>
                                    <a href="#" class="btn btn-secondary"><span>Apply Now</span> <i class="fa-regular fa-arrow-right"></i></a>
                                    <button type="button" class="btn-share">
                                        <i class="fa-light fa-share-nodes"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 job-card-item">
                            <div class="card-jobs">
                                <div class="card-badge">New</div>
                                <h3 class="job-title">Travel Nurse/Registered Nurse (RN) – MedSurg/Telemetry</h3>
                                <ul class="job-info">
                                    <li>
                                        <img src="/job-location-icon.svg" alt="">
                                        <span><strong>Location:</strong> Charlotte, North Carolina, USA</span>
                                    </li>
                                    <li>
                                        <img src="/job-Specialty-icon.svg" alt="">
                                        <span><strong>Specialty:</strong> Health Care</span>
                                    </li>
                                    <li>
                                        <img src="/job-type-icon.svg" alt="">
                                        <span><strong>Type:</strong> Contract</span>
                                    </li>
                                    <li>
                                        <img src="/job-Schedule-icon.svg" alt="">
                                        <span><strong>Schedule:</strong> Lorem ipsum</span>
                                    </li>
                                    <li>
                                        <img src="/job-time-icon.svg" alt="">
                                        <span><strong>Time:</strong> Lorem ipsum</span>
                                    </li>
                                </ul>
                                <div class="card-actions">
                                    <a href="#" class="btn btn-primary"><span>Read More</span> <i class="fa-regular fa-arrow-right"></i></a>
                                    <a href="#" class="btn btn-secondary"><span>Apply Now</span> <i class="fa-regular fa-arrow-right"></i></a>
                                    <button type="button" class="btn-share">
                                        <i class="fa-light fa-share-nodes"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 job-card-item">
                            <div class="card-jobs">
                                <div class="card-badge">New</div>
                                <h3 class="job-title">Travel Nurse/Registered Nurse (RN) – MedSurg/Telemetry</h3>
                                <ul class="job-info">
                                    <li>
                                        <img src="/job-location-icon.svg" alt="">
                                        <span><strong>Location:</strong> Charlotte, North Carolina, USA</span>
                                    </li>
                                    <li>
                                        <img src="/job-Specialty-icon.svg" alt="">
                                        <span><strong>Specialty:</strong> Health Care</span>
                                    </li>
                                    <li>
                                        <img src="/job-type-icon.svg" alt="">
                                        <span><strong>Type:</strong> Contract</span>
                                    </li>
                                    <li>
                                        <img src="/job-Schedule-icon.svg" alt="">
                                        <span><strong>Schedule:</strong> Lorem ipsum</span>
                                    </li>
                                    <li>
                                        <img src="/job-time-icon.svg" alt="">
                                        <span><strong>Time:</strong> Lorem ipsum</span>
                                    </li>
                                </ul>
                                <div class="card-actions">
                                    <a href="#" class="btn btn-primary"><span>Read More</span> <i class="fa-regular fa-arrow-right"></i></a>
                                    <a href="#" class="btn btn-secondary"><span>Apply Now</span> <i class="fa-regular fa-arrow-right"></i></a>
                                    <button type="button" class="btn-share">
                                        <i class="fa-light fa-share-nodes"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 job-card-item">
                            <div class="card-jobs">
                                <div class="card-badge">New</div>
                                <h3 class="job-title">Travel Nurse/Registered Nurse (RN) – MedSurg/Telemetry</h3>
                                <ul class="job-info">
                                    <li>
                                        <img src="/job-location-icon.svg" alt="">
                                        <span><strong>Location:</strong> Charlotte, North Carolina, USA</span>
                                    </li>
                                    <li>
                                        <img src="/job-Specialty-icon.svg" alt="">
                                        <span><strong>Specialty:</strong> Health Care</span>
                                    </li>
                                    <li>
                                        <img src="/job-type-icon.svg" alt="">
                                        <span><strong>Type:</strong> Contract</span>
                                    </li>
                                    <li>
                                        <img src="/job-Schedule-icon.svg" alt="">
                                        <span><strong>Schedule:</strong> Lorem ipsum</span>
                                    </li>
                                    <li>
                                        <img src="/job-time-icon.svg" alt="">
                                        <span><strong>Time:</strong> Lorem ipsum</span>
                                    </li>
                                </ul>
                                <div class="card-actions">
                                    <a href="#" class="btn btn-primary"><span>Read More</span> <i class="fa-regular fa-arrow-right"></i></a>
                                    <a href="#" class="btn btn-secondary"><span>Apply Now</span> <i class="fa-regular fa-arrow-right"></i></a>
                                    <button type="button" class="btn-share">
                                        <i class="fa-light fa-share-nodes"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 job-card-item">
                            <div class="card-jobs">
                                <div class="card-badge">New</div>
                                <h3 class="job-title">Travel Nurse/Registered Nurse (RN) – MedSurg/Telemetry</h3>
                                <ul class="job-info">
                                    <li>
                                        <img src="/job-location-icon.svg" alt="">
                                        <span><strong>Location:</strong> Charlotte, North Carolina, USA</span>
                                    </li>
                                    <li>
                                        <img src="/job-Specialty-icon.svg" alt="">
                                        <span><strong>Specialty:</strong> Health Care</span>
                                    </li>
                                    <li>
                                        <img src="/job-type-icon.svg" alt="">
                                        <span><strong>Type:</strong> Contract</span>
                                    </li>
                                    <li>
                                        <img src="/job-Schedule-icon.svg" alt="">
                                        <span><strong>Schedule:</strong> Lorem ipsum</span>
                                    </li>
                                    <li>
                                        <img src="/job-time-icon.svg" alt="">
                                        <span><strong>Time:</strong> Lorem ipsum</span>
                                    </li>
                                </ul>
                                <div class="card-actions">
                                    <a href="#" class="btn btn-primary"><span>Read More</span> <i class="fa-regular fa-arrow-right"></i></a>
                                    <a href="#" class="btn btn-secondary"><span>Apply Now</span> <i class="fa-regular fa-arrow-right"></i></a>
                                    <button type="button" class="btn-share">
                                        <i class="fa-light fa-share-nodes"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 job-card-item">
                            <div class="card-jobs">
                                <div class="card-badge">New</div>
                                <h3 class="job-title">Travel Nurse/Registered Nurse (RN) – MedSurg/Telemetry</h3>
                                <ul class="job-info">
                                    <li>
                                        <img src="/job-location-icon.svg" alt="">
                                        <span><strong>Location:</strong> Charlotte, North Carolina, USA</span>
                                    </li>
                                    <li>
                                        <img src="/job-Specialty-icon.svg" alt="">
                                        <span><strong>Specialty:</strong> Health Care</span>
                                    </li>
                                    <li>
                                        <img src="/job-type-icon.svg" alt="">
                                        <span><strong>Type:</strong> Contract</span>
                                    </li>
                                    <li>
                                        <img src="/job-Schedule-icon.svg" alt="">
                                        <span><strong>Schedule:</strong> Lorem ipsum</span>
                                    </li>
                                    <li>
                                        <img src="/job-time-icon.svg" alt="">
                                        <span><strong>Time:</strong> Lorem ipsum</span>
                                    </li>
                                </ul>
                                <div class="card-actions">
                                    <a href="#" class="btn btn-primary"><span>Read More</span> <i class="fa-regular fa-arrow-right"></i></a>
                                    <a href="#" class="btn btn-secondary"><span>Apply Now</span> <i class="fa-regular fa-arrow-right"></i></a>
                                    <button type="button" class="btn-share">
                                        <i class="fa-light fa-share-nodes"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 job-card-item">
                            <div class="card-jobs">
                                <div class="card-badge">New</div>
                                <h3 class="job-title">Travel Nurse/Registered Nurse (RN) – MedSurg/Telemetry</h3>
                                <ul class="job-info">
                                    <li>
                                        <img src="/job-location-icon.svg" alt="">
                                        <span><strong>Location:</strong> Charlotte, North Carolina, USA</span>
                                    </li>
                                    <li>
                                        <img src="/job-Specialty-icon.svg" alt="">
                                        <span><strong>Specialty:</strong> Health Care</span>
                                    </li>
                                    <li>
                                        <img src="/job-type-icon.svg" alt="">
                                        <span><strong>Type:</strong> Contract</span>
                                    </li>
                                    <li>
                                        <img src="/job-Schedule-icon.svg" alt="">
                                        <span><strong>Schedule:</strong> Lorem ipsum</span>
                                    </li>
                                    <li>
                                        <img src="/job-time-icon.svg" alt="">
                                        <span><strong>Time:</strong> Lorem ipsum</span>
                                    </li>
                                </ul>
                                <div class="card-actions">
                                    <a href="#" class="btn btn-primary"><span>Read More</span> <i class="fa-regular fa-arrow-right"></i></a>
                                    <a href="#" class="btn btn-secondary"><span>Apply Now</span> <i class="fa-regular fa-arrow-right"></i></a>
                                    <button type="button" class="btn-share">
                                        <i class="fa-light fa-share-nodes"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 job-card-item">
                            <div class="card-jobs">
                                <div class="card-badge">New</div>
                                <h3 class="job-title">Travel Nurse/Registered Nurse (RN) – MedSurg/Telemetry</h3>
                                <ul class="job-info">
                                    <li>
                                        <img src="/job-location-icon.svg" alt="">
                                        <span><strong>Location:</strong> Charlotte, North Carolina, USA</span>
                                    </li>
                                    <li>
                                        <img src="/job-Specialty-icon.svg" alt="">
                                        <span><strong>Specialty:</strong> Health Care</span>
                                    </li>
                                    <li>
                                        <img src="/job-type-icon.svg" alt="">
                                        <span><strong>Type:</strong> Contract</span>
                                    </li>
                                    <li>
                                        <img src="/job-Schedule-icon.svg" alt="">
                                        <span><strong>Schedule:</strong> Lorem ipsum</span>
                                    </li>
                                    <li>
                                        <img src="/job-time-icon.svg" alt="">
                                        <span><strong>Time:</strong> Lorem ipsum</span>
                                    </li>
                                </ul>
                                <div class="card-actions">
                                    <a href="#" class="btn btn-primary"><span>Read More</span> <i class="fa-regular fa-arrow-right"></i></a>
                                    <a href="#" class="btn btn-secondary"><span>Apply Now</span> <i class="fa-regular fa-arrow-right"></i></a>
                                    <button type="button" class="btn-share">
                                        <i class="fa-light fa-share-nodes"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 job-card-item">
                            <div class="card-jobs">
                                <div class="card-badge">New</div>
                                <h3 class="job-title">Travel Nurse/Registered Nurse (RN) – MedSurg/Telemetry</h3>
                                <ul class="job-info">
                                    <li>
                                        <img src="/job-location-icon.svg" alt="">
                                        <span><strong>Location:</strong> Charlotte, North Carolina, USA</span>
                                    </li>
                                    <li>
                                        <img src="/job-Specialty-icon.svg" alt="">
                                        <span><strong>Specialty:</strong> Health Care</span>
                                    </li>
                                    <li>
                                        <img src="/job-type-icon.svg" alt="">
                                        <span><strong>Type:</strong> Contract</span>
                                    </li>
                                    <li>
                                        <img src="/job-Schedule-icon.svg" alt="">
                                        <span><strong>Schedule:</strong> Lorem ipsum</span>
                                    </li>
                                    <li>
                                        <img src="/job-time-icon.svg" alt="">
                                        <span><strong>Time:</strong> Lorem ipsum</span>
                                    </li>
                                </ul>
                                <div class="card-actions">
                                    <a href="#" class="btn btn-primary"><span>Read More</span> <i class="fa-regular fa-arrow-right"></i></a>
                                    <a href="#" class="btn btn-secondary"><span>Apply Now</span> <i class="fa-regular fa-arrow-right"></i></a>
                                    <button type="button" class="btn-share">
                                        <i class="fa-light fa-share-nodes"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 job-card-item">
                            <div class="card-jobs">
                                <div class="card-badge">New</div>
                                <h3 class="job-title">Travel Nurse/Registered Nurse (RN) – MedSurg/Telemetry</h3>
                                <ul class="job-info">
                                    <li>
                                        <img src="/job-location-icon.svg" alt="">
                                        <span><strong>Location:</strong> Charlotte, North Carolina, USA</span>
                                    </li>
                                    <li>
                                        <img src="/job-Specialty-icon.svg" alt="">
                                        <span><strong>Specialty:</strong> Health Care</span>
                                    </li>
                                    <li>
                                        <img src="/job-type-icon.svg" alt="">
                                        <span><strong>Type:</strong> Contract</span>
                                    </li>
                                    <li>
                                        <img src="/job-Schedule-icon.svg" alt="">
                                        <span><strong>Schedule:</strong> Lorem ipsum</span>
                                    </li>
                                    <li>
                                        <img src="/job-time-icon.svg" alt="">
                                        <span><strong>Time:</strong> Lorem ipsum</span>
                                    </li>
                                </ul>
                                <div class="card-actions">
                                    <a href="#" class="btn btn-primary"><span>Read More</span> <i class="fa-regular fa-arrow-right"></i></a>
                                    <a href="#" class="btn btn-secondary"><span>Apply Now</span> <i class="fa-regular fa-arrow-right"></i></a>
                                    <button type="button" class="btn-share">
                                        <i class="fa-light fa-share-nodes"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 job-card-item">
                            <div class="card-jobs">
                                <div class="card-badge">New</div>
                                <h3 class="job-title">Travel Nurse/Registered Nurse (RN) – MedSurg/Telemetry</h3>
                                <ul class="job-info">
                                    <li>
                                        <img src="/job-location-icon.svg" alt="">
                                        <span><strong>Location:</strong> Charlotte, North Carolina, USA</span>
                                    </li>
                                    <li>
                                        <img src="/job-Specialty-icon.svg" alt="">
                                        <span><strong>Specialty:</strong> Health Care</span>
                                    </li>
                                    <li>
                                        <img src="/job-type-icon.svg" alt="">
                                        <span><strong>Type:</strong> Contract</span>
                                    </li>
                                    <li>
                                        <img src="/job-Schedule-icon.svg" alt="">
                                        <span><strong>Schedule:</strong> Lorem ipsum</span>
                                    </li>
                                    <li>
                                        <img src="/job-time-icon.svg" alt="">
                                        <span><strong>Time:</strong> Lorem ipsum</span>
                                    </li>
                                </ul>
                                <div class="card-actions">
                                    <a href="#" class="btn btn-primary"><span>Read More</span> <i class="fa-regular fa-arrow-right"></i></a>
                                    <a href="#" class="btn btn-secondary"><span>Apply Now</span> <i class="fa-regular fa-arrow-right"></i></a>
                                    <button type="button" class="btn-share">
                                        <i class="fa-light fa-share-nodes"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 job-card-item">
                            <div class="card-jobs">
                                <div class="card-badge">New</div>
                                <h3 class="job-title">Travel Nurse/Registered Nurse (RN) – MedSurg/Telemetry</h3>
                                <ul class="job-info">
                                    <li>
                                        <img src="/job-location-icon.svg" alt="">
                                        <span><strong>Location:</strong> Charlotte, North Carolina, USA</span>
                                    </li>
                                    <li>
                                        <img src="/job-Specialty-icon.svg" alt="">
                                        <span><strong>Specialty:</strong> Health Care</span>
                                    </li>
                                    <li>
                                        <img src="/job-type-icon.svg" alt="">
                                        <span><strong>Type:</strong> Contract</span>
                                    </li>
                                    <li>
                                        <img src="/job-Schedule-icon.svg" alt="">
                                        <span><strong>Schedule:</strong> Lorem ipsum</span>
                                    </li>
                                    <li>
                                        <img src="/job-time-icon.svg" alt="">
                                        <span><strong>Time:</strong> Lorem ipsum</span>
                                    </li>
                                </ul>
                                <div class="card-actions">
                                    <a href="#" class="btn btn-primary"><span>Read More</span> <i class="fa-regular fa-arrow-right"></i></a>
                                    <a href="#" class="btn btn-secondary"><span>Apply Now</span> <i class="fa-regular fa-arrow-right"></i></a>
                                    <button type="button" class="btn-share">
                                        <i class="fa-light fa-share-nodes"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 job-card-item">
                            <div class="card-jobs">
                                <div class="card-badge">New</div>
                                <h3 class="job-title">Travel Nurse/Registered Nurse (RN) – MedSurg/Telemetry</h3>
                                <ul class="job-info">
                                    <li>
                                        <img src="/job-location-icon.svg" alt="">
                                        <span><strong>Location:</strong> Charlotte, North Carolina, USA</span>
                                    </li>
                                    <li>
                                        <img src="/job-Specialty-icon.svg" alt="">
                                        <span><strong>Specialty:</strong> Health Care</span>
                                    </li>
                                    <li>
                                        <img src="/job-type-icon.svg" alt="">
                                        <span><strong>Type:</strong> Contract</span>
                                    </li>
                                    <li>
                                        <img src="/job-Schedule-icon.svg" alt="">
                                        <span><strong>Schedule:</strong> Lorem ipsum</span>
                                    </li>
                                    <li>
                                        <img src="/job-time-icon.svg" alt="">
                                        <span><strong>Time:</strong> Lorem ipsum</span>
                                    </li>
                                </ul>
                                <div class="card-actions">
                                    <a href="#" class="btn btn-primary"><span>Read More</span> <i class="fa-regular fa-arrow-right"></i></a>
                                    <a href="#" class="btn btn-secondary"><span>Apply Now</span> <i class="fa-regular fa-arrow-right"></i></a>
                                    <button type="button" class="btn-share">
                                        <i class="fa-light fa-share-nodes"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 job-card-item">
                            <div class="card-jobs">
                                <div class="card-badge">New</div>
                                <h3 class="job-title">Travel Nurse/Registered Nurse (RN) – MedSurg/Telemetry</h3>
                                <ul class="job-info">
                                    <li>
                                        <img src="/job-location-icon.svg" alt="">
                                        <span><strong>Location:</strong> Charlotte, North Carolina, USA</span>
                                    </li>
                                    <li>
                                        <img src="/job-Specialty-icon.svg" alt="">
                                        <span><strong>Specialty:</strong> Health Care</span>
                                    </li>
                                    <li>
                                        <img src="/job-type-icon.svg" alt="">
                                        <span><strong>Type:</strong> Contract</span>
                                    </li>
                                    <li>
                                        <img src="/job-Schedule-icon.svg" alt="">
                                        <span><strong>Schedule:</strong> Lorem ipsum</span>
                                    </li>
                                    <li>
                                        <img src="/job-time-icon.svg" alt="">
                                        <span><strong>Time:</strong> Lorem ipsum</span>
                                    </li>
                                </ul>
                                <div class="card-actions">
                                    <a href="#" class="btn btn-primary"><span>Read More</span> <i class="fa-regular fa-arrow-right"></i></a>
                                    <a href="#" class="btn btn-secondary"><span>Apply Now</span> <i class="fa-regular fa-arrow-right"></i></a>
                                    <button type="button" class="btn-share">
                                        <i class="fa-light fa-share-nodes"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 job-card-item">
                            <div class="card-jobs">
                                <div class="card-badge">New</div>
                                <h3 class="job-title">Travel Nurse/Registered Nurse (RN) – MedSurg/Telemetry</h3>
                                <ul class="job-info">
                                    <li>
                                        <img src="/job-location-icon.svg" alt="">
                                        <span><strong>Location:</strong> Charlotte, North Carolina, USA</span>
                                    </li>
                                    <li>
                                        <img src="/job-Specialty-icon.svg" alt="">
                                        <span><strong>Specialty:</strong> Health Care</span>
                                    </li>
                                    <li>
                                        <img src="/job-type-icon.svg" alt="">
                                        <span><strong>Type:</strong> Contract</span>
                                    </li>
                                    <li>
                                        <img src="/job-Schedule-icon.svg" alt="">
                                        <span><strong>Schedule:</strong> Lorem ipsum</span>
                                    </li>
                                    <li>
                                        <img src="/job-time-icon.svg" alt="">
                                        <span><strong>Time:</strong> Lorem ipsum</span>
                                    </li>
                                </ul>
                                <div class="card-actions">
                                    <a href="#" class="btn btn-primary"><span>Read More</span> <i class="fa-regular fa-arrow-right"></i></a>
                                    <a href="#" class="btn btn-secondary"><span>Apply Now</span> <i class="fa-regular fa-arrow-right"></i></a>
                                    <button type="button" class="btn-share">
                                        <i class="fa-light fa-share-nodes"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 job-card-item">
                            <div class="card-jobs">
                                <div class="card-badge">New</div>
                                <h3 class="job-title">Travel Nurse/Registered Nurse (RN) – MedSurg/Telemetry</h3>
                                <ul class="job-info">
                                    <li>
                                        <img src="/job-location-icon.svg" alt="">
                                        <span><strong>Location:</strong> Charlotte, North Carolina, USA</span>
                                    </li>
                                    <li>
                                        <img src="/job-Specialty-icon.svg" alt="">
                                        <span><strong>Specialty:</strong> Health Care</span>
                                    </li>
                                    <li>
                                        <img src="/job-type-icon.svg" alt="">
                                        <span><strong>Type:</strong> Contract</span>
                                    </li>
                                    <li>
                                        <img src="/job-Schedule-icon.svg" alt="">
                                        <span><strong>Schedule:</strong> Lorem ipsum</span>
                                    </li>
                                    <li>
                                        <img src="/job-time-icon.svg" alt="">
                                        <span><strong>Time:</strong> Lorem ipsum</span>
                                    </li>
                                </ul>
                                <div class="card-actions">
                                    <a href="#" class="btn btn-primary"><span>Read More</span> <i class="fa-regular fa-arrow-right"></i></a>
                                    <a href="#" class="btn btn-secondary"><span>Apply Now</span> <i class="fa-regular fa-arrow-right"></i></a>
                                    <button type="button" class="btn-share">
                                        <i class="fa-light fa-share-nodes"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 job-card-item">
                            <div class="card-jobs">
                                <div class="card-badge">New</div>
                                <h3 class="job-title">Travel Nurse/Registered Nurse (RN) – MedSurg/Telemetry</h3>
                                <ul class="job-info">
                                    <li>
                                        <img src="/job-location-icon.svg" alt="">
                                        <span><strong>Location:</strong> Charlotte, North Carolina, USA</span>
                                    </li>
                                    <li>
                                        <img src="/job-Specialty-icon.svg" alt="">
                                        <span><strong>Specialty:</strong> Health Care</span>
                                    </li>
                                    <li>
                                        <img src="/job-type-icon.svg" alt="">
                                        <span><strong>Type:</strong> Contract</span>
                                    </li>
                                    <li>
                                        <img src="/job-Schedule-icon.svg" alt="">
                                        <span><strong>Schedule:</strong> Lorem ipsum</span>
                                    </li>
                                    <li>
                                        <img src="/job-time-icon.svg" alt="">
                                        <span><strong>Time:</strong> Lorem ipsum</span>
                                    </li>
                                </ul>
                                <div class="card-actions">
                                    <a href="#" class="btn btn-primary"><span>Read More</span> <i class="fa-regular fa-arrow-right"></i></a>
                                    <a href="#" class="btn btn-secondary"><span>Apply Now</span> <i class="fa-regular fa-arrow-right"></i></a>
                                    <button type="button" class="btn-share">
                                        <i class="fa-light fa-share-nodes"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 job-card-item">
                            <div class="card-jobs">
                                <div class="card-badge">New</div>
                                <h3 class="job-title">Travel Nurse/Registered Nurse (RN) – MedSurg/Telemetry</h3>
                                <ul class="job-info">
                                    <li>
                                        <img src="/job-location-icon.svg" alt="">
                                        <span><strong>Location:</strong> Charlotte, North Carolina, USA</span>
                                    </li>
                                    <li>
                                        <img src="/job-Specialty-icon.svg" alt="">
                                        <span><strong>Specialty:</strong> Health Care</span>
                                    </li>
                                    <li>
                                        <img src="/job-type-icon.svg" alt="">
                                        <span><strong>Type:</strong> Contract</span>
                                    </li>
                                    <li>
                                        <img src="/job-Schedule-icon.svg" alt="">
                                        <span><strong>Schedule:</strong> Lorem ipsum</span>
                                    </li>
                                    <li>
                                        <img src="/job-time-icon.svg" alt="">
                                        <span><strong>Time:</strong> Lorem ipsum</span>
                                    </li>
                                </ul>
                                <div class="card-actions">
                                    <a href="#" class="btn btn-primary"><span>Read More</span> <i class="fa-regular fa-arrow-right"></i></a>
                                    <a href="#" class="btn btn-secondary"><span>Apply Now</span> <i class="fa-regular fa-arrow-right"></i></a>
                                    <button type="button" class="btn-share">
                                        <i class="fa-light fa-share-nodes"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 job-card-item">
                            <div class="card-jobs">
                                <div class="card-badge">New</div>
                                <h3 class="job-title">Travel Nurse/Registered Nurse (RN) – MedSurg/Telemetry</h3>
                                <ul class="job-info">
                                    <li>
                                        <img src="/job-location-icon.svg" alt="">
                                        <span><strong>Location:</strong> Charlotte, North Carolina, USA</span>
                                    </li>
                                    <li>
                                        <img src="/job-Specialty-icon.svg" alt="">
                                        <span><strong>Specialty:</strong> Health Care</span>
                                    </li>
                                    <li>
                                        <img src="/job-type-icon.svg" alt="">
                                        <span><strong>Type:</strong> Contract</span>
                                    </li>
                                    <li>
                                        <img src="/job-Schedule-icon.svg" alt="">
                                        <span><strong>Schedule:</strong> Lorem ipsum</span>
                                    </li>
                                    <li>
                                        <img src="/job-time-icon.svg" alt="">
                                        <span><strong>Time:</strong> Lorem ipsum</span>
                                    </li>
                                </ul>
                                <div class="card-actions">
                                    <a href="#" class="btn btn-primary"><span>Read More</span> <i class="fa-regular fa-arrow-right"></i></a>
                                    <a href="#" class="btn btn-secondary"><span>Apply Now</span> <i class="fa-regular fa-arrow-right"></i></a>
                                    <button type="button" class="btn-share">
                                        <i class="fa-light fa-share-nodes"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row filter-pagination">
                        <div class="col-12 col-md-6 left-content text-md-start">
                            <strong>1 - 25 of 141,494 jobs</strong>
                        </div>
                        <div class="col-12 col-md-6 right-content text-md-end">
                            <div class="pagination-wrap">
                                <ul class='page-numbers'>
                                    <li><a class='prev page-numbers' href='#'><i class="fa-regular fa-arrow-left"></i></a></li>
                                    <li><a class='page-numbers' href='#'>1</a></li>
                                    <li><span aria-current='page' class='page-numbers current'>2</span></li>
                                    <li><a class='page-numbers' href='#'>3</a></li>
                                    <li><a class='next page-numbers' href='#'><i class="fa-regular fa-arrow-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>