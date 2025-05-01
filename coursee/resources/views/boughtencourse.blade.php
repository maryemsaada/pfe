@extends('layouts.app')

@section('content')
<div class="container py-4">
    <!-- Enhanced Header Section -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-end mb-4">
                <div class="mb-3 mb-md-0">
                    <h2 class="fw-bold display-5 mb-2" style="position: relative; display: inline-block;">
                        <span style="position: relative; z-index: 2;">My Learning Library</span>
                        <span style="position: absolute; bottom: 5px; left: 0; width: 100%; height: 12px; background: rgba(99, 102, 241, 0.2); z-index: 1;"></span>
                    </h2>
                    <p class="lead text-muted mb-0">Your personalized collection of knowledge</p>
                </div>
                <div class="d-flex align-items-center">
                    <div class="input-group input-group-sm" style="width: 200px;">
                        <span class="input-group-text bg-white border-end-0"><i class="bi bi-search"></i></span>
                        <input type="text" class="form-control border-start-0" placeholder="Search courses...">
                    </div>
                    <div class="dropdown ms-3">
                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="sortDropdown" data-bs-toggle="dropdown">
                            <i class="bi bi-filter me-1"></i> Sort
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Recently Added</a></li>
                            <li><a class="dropdown-item" href="#">Alphabetical</a></li>
                            <li><a class="dropdown-item" href="#">Progress</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Completed First</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Course Grid -->
    <div class="row g-4">
        <!-- Course 1 -->
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 h-100 overflow-hidden" style="box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
                <div class="position-relative">
                    <img src="https://www.hubspot.com/hubfs/how-to-start-coding-1.jpg" class="card-img-top" alt="Web Development" style="height: 180px; object-fit: cover;">
                    <div class="position-absolute top-0 end-0 m-3">
                        <span class="badge rounded-pill bg-success bg-opacity-90 px-3 py-2">
                            <i class="bi bi-lightning-charge-fill me-1"></i> Active
                        </span>
                    </div>
                    <div class="progress rounded-0" style="height: 4px;">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 65%"></div>
                    </div>
                </div>
                <div class="card-body pb-0">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <small class="text-muted"><i class="bi bi-calendar me-1"></i> Enrolled: Jan 15, 2023</small>
                        <small class="text-muted"><i class="bi bi-clock me-1"></i> 12h left</small>
                    </div>
                    <h5 class="card-title mb-3">Web Development Bootcamp</h5>
                    <p class="card-text text-muted mb-4">Master HTML, CSS, JavaScript and modern frameworks in this comprehensive course.</p>
                </div>
                <div class="card-footer bg-transparent border-0 pt-0 pb-3">
                    <div class="d-grid">
                        <a href="#" class="btn btn-primary btn-sm rounded-pill">
                            <i class="bi bi-play-circle me-1"></i> Continue Learning
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Course 2 -->
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 h-100 overflow-hidden" style="box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
                <div class="position-relative">
                    <img src="https://miro.medium.com/v2/resize:fit:1400/1*y6C4nSvy2Woe0m7bWEn4BA.png" class="card-img-top" alt="Data Science" style="height: 180px; object-fit: cover;">
                    <div class="position-absolute top-0 end-0 m-3">
                        <span class="badge rounded-pill bg-success bg-opacity-90 px-3 py-2">
                            <i class="bi bi-lightning-charge-fill me-1"></i> Active
                        </span>
                    </div>
                    <div class="progress rounded-0" style="height: 4px;">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 35%"></div>
                    </div>
                </div>
                <div class="card-body pb-0">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <small class="text-muted"><i class="bi bi-calendar me-1"></i> Enrolled: Feb 22, 2023</small>
                        <small class="text-muted"><i class="bi bi-clock me-1"></i> 8h left</small>
                    </div>
                    <h5 class="card-title mb-3">Data Science Fundamentals</h5>
                    <p class="card-text text-muted mb-4">Learn Python, Pandas, and data visualization techniques for effective analysis.</p>
                </div>
                <div class="card-footer bg-transparent border-0 pt-0 pb-3">
                    <div class="d-grid">
                        <a href="#" class="btn btn-primary btn-sm rounded-pill">
                            <i class="bi bi-play-circle me-1"></i> Continue Learning
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Course 3 -->
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 h-100 overflow-hidden" style="box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
                <div class="position-relative">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRXPxAiL4goMbGrZvPAnEhKsyIWNspmjLheo0ZuDX0M-1YPz2lXBiIham6GzK81FP7OIDU&usqp=CAU" class="card-img-top" alt="Digital Marketing" style="height: 180px; object-fit: cover;">
                    <div class="position-absolute top-0 end-0 m-3">
                        <span class="badge rounded-pill bg-secondary bg-opacity-90 px-3 py-2">
                            <i class="bi bi-check-circle-fill me-1"></i> Completed
                        </span>
                    </div>
                    <div class="progress rounded-0" style="height: 4px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%"></div>
                    </div>
                </div>
                <div class="card-body pb-0">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <small class="text-muted"><i class="bi bi-calendar me-1"></i> Enrolled: Dec 5, 2022</small>
                        <small class="text-success"><i class="bi bi-check-circle me-1"></i> Completed</small>
                    </div>
                    <h5 class="card-title mb-3">Digital Marketing Mastery</h5>
                    <p class="card-text text-muted mb-4">Comprehensive guide to SEO, social media, and content marketing strategies.</p>
                </div>
                <div class="card-footer bg-transparent border-0 pt-0 pb-3">
                    <div class="d-grid">
                        <a href="#" class="btn btn-outline-success btn-sm rounded-pill">
                            <i class="bi bi-award me-1"></i> View Certificate
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Empty State -->
    <div class="text-center py-5 my-5" style="display: none;">
        <div class="mb-4">
            <i class="bi bi-book text-muted" style="font-size: 4rem; opacity: 0.5;"></i>
        </div>
        <h4 class="fw-light mb-3">Your learning library is empty</h4>
        <p class="text-muted mb-4">Discover our courses and start your learning journey today</p>
        <a href="/courses" class="btn btn-primary px-4 rounded-pill">
            <i class="bi bi-compass me-1"></i> Browse Courses
        </a>
    </div>
</div>

<style>
    .card {
        transition: all 0.3s ease;
        border-radius: 12px;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important;
    }
    .card-img-top {
        transition: transform 0.5s ease;
    }
    .card:hover .card-img-top {
        transform: scale(1.05);
    }
    .progress {
        background-color: rgba(0,0,0,0.05);
    }
    .badge {
        backdrop-filter: blur(4px);
        -webkit-backdrop-filter: blur(4px);
    }
    h2.display-5 {
        font-weight: 700;
        letter-spacing: -0.5px;
    }
</style>
@endsection