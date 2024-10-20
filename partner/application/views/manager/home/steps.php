<div class="row">
            <div class="col-xl-12">
               <div class="breadcrumb__wrapper mb-35">
                  <div class="breadcrumb__inner">
                     <div class="breadcrumb__icon">
                        <i class="flaticon-home"></i>
                     </div>
                     <div class="breadcrumb__menu">
                        <nav>
                           <ul>
                              <!-- <li><span><a href="<?=site_url("home")?>">Home</a></span></li> -->
                              <li class="active"><span>Dashboard</span></li>
                           </ul>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row g-20">
            <?php
			/*
            <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6">
               <div class="expovent__count-item mb-20">
                  <div class="expovent__count-thumb include__bg transition-3"
                     data-background="assets/img/bg/count-bg.png"></div>
                  <div class="expovent__count-content">
                     <h3 class="expovent__count-number"><?=$customers?>+</h3>
                     <span class="expovent__count-text">Total Registration</span>
                  </div>
                  <div class="expovent__count-icon">
                     <i class="flaticon-group"></i>
                  </div>
               </div>
            </div>
			*/
			?>
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
               <div class="expovent__count-item mb-20">
                  <div class="expovent__count-thumb include__bg transition-3"
                     data-background="assets/img/bg/count-bg.png"></div>
                  <div class="expovent__count-content">
                     <h3 class="expovent__count-number"><?=$event_speaker?>+</h3>
                     <span class="expovent__count-text">Total Speakers</span>
                  </div>
                  <div class="expovent__count-icon">
                     <i class="flaticon-speaker"></i>
                  </div>
               </div>
            </div>
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-4">
               <div class="expovent__count-item mb-20">
                  <div class="expovent__count-thumb include__bg transition-3"
                     data-background="assets/img/bg/count-bg.png"></div>
                  <div class="expovent__count-content">
                     <h3 class="expovent__count-number"><?=$events?></h3>
                     <span class="expovent__count-text">New Events</span>
                  </div>
                  <div class="expovent__count-icon">
                     <i class="flaticon-reminder"></i>
                  </div>
               </div>
            </div>
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
               <div class="expovent__count-item mb-20">
                  <div class="expovent__count-thumb include__bg transition-3"
                     data-background="assets/img/bg/count-bg.png"></div>
                  <div class="expovent__count-content">
                     <h3 class="expovent__count-number"><?=$seats['total']?>+</h3>
                     <span class="expovent__count-text">Total Sit Sold</span>
                  </div>
                  <div class="expovent__count-icon">
                     <i class="flaticon-ticket-1"></i>
                  </div>
               </div>
            </div>
         </div>
         <?php
		 /*
         <div class="row g-20">
            
            <div class="col-xxl-12 col-xl-12">
               <div class="card__wrapper">
                  <div class="card__header">
                     <div class="card__header-top">
                        <div class="card__title-inner">
                           <div class="card__header-icon">
                              <i class="flaticon-reminder"></i>
                           </div>
                           <div class="card__header-title">
                              <h4>Schedule Events</h4>
                           </div>
                        </div>
                        <div class="card__header-dropdown">
                           <div class="dropdown">
                              <button>
                                 <svg class="dropdown__svg" width="14" height="4" viewBox="0 0 14 4" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                       d="M2 0.75C2.69036 0.75 3.25 1.30964 3.25 2C3.25 2.69036 2.69036 3.25 2 3.25C1.30964 3.25 0.75 2.69036 0.75 2C0.75 1.30964 1.30964 0.75 2 0.75Z"
                                       fill="white"></path>
                                    <path
                                       d="M7 0.75C7.69036 0.75 8.25 1.30964 8.25 2C8.25 2.69036 7.69036 3.25 7 3.25C6.30964 3.25 5.75 2.69036 5.75 2C5.75 1.30964 6.30964 0.75 7 0.75Z"
                                       fill="white"></path>
                                    <path
                                       d="M13.25 2C13.25 1.30964 12.6904 0.75 12 0.75C11.3096 0.75 10.75 1.30964 10.75 2C10.75 2.69036 11.3096 3.25 12 3.25C12.6904 3.25 13.25 2.69036 13.25 2Z"
                                       fill="white"></path>
                                 </svg>
                              </button>
                              <div class="dropdown-list">
                                 <a class="dropdown__item" href="javascript:void(0)">Edit</a>
                                 <a class="dropdown__item" href="javascript:void(0)">Delete</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="scroll-w-1 card__scroll">
                     <div class="card__inner">
                        <div class="card-body">
                           <div class="news__item">
                              <div class="news__item-inner">
                                 <div class="news__thumb">
                                    <a href="schedule-list.html"><img src="assets/img/blog/meta/01.png" alt="image not found"></a>
                                 </div>
                                 <div class="news__content">
                                    <h4 class="news__title"><a href="schedule-list.html">Digital Business Summit - 2023</a></h4>
                                    <div class="news__meta">
                                       <div class="news__meta-status">
                                          <span><i class="flaticon-user"></i></span>
                                          <span>Andru Hebo</span>
                                       </div>
                                       <div class="news__meta-status">
                                          <span><i class="flaticon-clock"></i></span>
                                          <span>9:00am- 5:00 pm</span>
                                       </div>
                                       <div class="news__meta-status">
                                          <span><i class="flaticon-placeholder-1"></i></span>
                                          <span>California(CA), 92677</span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="news__item">
                              <div class="news__item-inner">
                                 <div class="news__thumb">
                                    <a href="schedule-list.html"><img src="assets/img/blog/meta/02.png" alt="image not found"></a>
                                 </div>
                                 <div class="news__content">
                                    <h4 class="news__title"> <a href="schedule-list.html">NASA Space Apps Challenge Summit - 2023</a></h4>
                                    <div class="news__meta">
                                       <div class="news__meta-status">
                                          <span><i class="flaticon-user"></i></span>
                                          <span>Andru Hebo</span>
                                       </div>
                                       <div class="news__meta-status">
                                          <span><i class="flaticon-clock"></i></span>
                                          <span>9:00am- 5:00 pm</span>
                                       </div>
                                       <div class="news__meta-status">
                                          <span><i class="flaticon-placeholder-1"></i></span>
                                          <span>California(CA), 92677</span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="news__item">
                              <div class="news__item-inner">
                                 <div class="news__thumb">
                                    <a href="schedule-list.html"> <img src="assets/img/blog/meta/03.png" alt="image not found"></a>
                                 </div>
                                 <div class="news__content">
                                    <h4 class="news__title"> <a href="schedule-list.html">Digital Product Design & Interaction Seminar - 2023</a></h4>
                                    <div class="news__meta">
                                       <div class="news__meta-status">
                                          <span><i class="flaticon-user"></i></span>
                                          <span>Andru Hebo</span>
                                       </div>
                                       <div class="news__meta-status">
                                          <span><i class="flaticon-clock"></i></span>
                                          <span>9:00am- 5:00 pm</span>
                                       </div>
                                       <div class="news__meta-status">
                                          <span><i class="flaticon-placeholder-1"></i></span>
                                          <span>California(CA), 92677</span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="news__item">
                              <div class="news__item-inner">
                                 <div class="news__thumb">
                                    <a href="schedule-list.html"> <img src="assets/img/blog/meta/01.png" alt="image not found"></a>
                                 </div>
                                 <div class="news__content">
                                    <h4 class="news__title"> <a href="schedule-list.html">NASA Space Apps Challenge Summit - 2023</a></h4>
                                    <div class="news__meta">
                                       <div class="news__meta-status">
                                          <span><i class="flaticon-user"></i></span>
                                          <span>Andru Hebo</span>
                                       </div>
                                       <div class="news__meta-status">
                                          <span><i class="flaticon-clock"></i></span>
                                          <span>9:00am- 5:00 pm</span>
                                       </div>
                                       <div class="news__meta-status">
                                          <span><i class="flaticon-placeholder-1"></i></span>
                                          <span>California(CA), 92677</span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="news__item">
                              <div class="news__item-inner">
                                 <div class="news__thumb">
                                 <a href="schedule-list.html"><img src="assets/img/blog/meta/02.png" alt="image not found"></a>
                                 </div>
                                 <div class="news__content">
                                    <h4 class="news__title"> <a href="schedule-list.html">Digital Business Summit - 2023</a></h4>
                                    <div class="news__meta">
                                       <div class="news__meta-status">
                                          <span><i class="flaticon-user"></i></span>
                                          <span>Andru Hebo</span>
                                       </div>
                                       <div class="news__meta-status">
                                          <span><i class="flaticon-clock"></i></span>
                                          <span>9:00am- 5:00 pm</span>
                                       </div>
                                       <div class="news__meta-status">
                                          <span><i class="flaticon-placeholder-1"></i></span>
                                          <span>California(CA), 92677</span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="news__item">
                              <div class="news__item-inner">
                                 <div class="news__thumb">
                                    <a href="schedule-list.html"><img src="assets/img/blog/meta/03.png" alt="image not found"></a>
                                 </div>
                                 <div class="news__content">
                                    <h4 class="news__title"> <a href="schedule-list.html">NASA Space Apps Challenge Summit - 2023</a></h4>
                                    <div class="news__meta">
                                       <div class="news__meta-status">
                                          <span><i class="flaticon-user"></i></span>
                                          <span>Andru Hebo</span>
                                       </div>
                                       <div class="news__meta-status">
                                          <span><i class="flaticon-clock"></i></span>
                                          <span>9:00am- 5:00 pm</span>
                                       </div>
                                       <div class="news__meta-status">
                                          <span><i class="flaticon-placeholder-1"></i></span>
                                          <span>California(CA), 92677</span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="news__item">
                              <div class="news__item-inner">
                                 <div class="news__thumb">
                                    <a href="schedule-list.html"> <img src="assets/img/blog/meta/02.png" alt="image not found"></a>
                                 </div>
                                 <div class="news__content">
                                    <h4 class="news__title"><a href="schedule-list.html">Digital Business Summit - 2023</a></h4>
                                    <div class="news__meta">
                                       <div class="news__meta-status">
                                          <span><i class="flaticon-user"></i></span>
                                          <span>Andru Hebo</span>
                                       </div>
                                       <div class="news__meta-status">
                                          <span><i class="flaticon-clock"></i></span>
                                          <span>9:00am- 5:00 pm</span>
                                       </div>
                                       <div class="news__meta-status">
                                          <span><i class="flaticon-placeholder-1"></i></span>
                                          <span>California(CA), 92677</span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="news__item">
                              <div class="news__item-inner">
                                 <div class="news__thumb">
                                    <a href="schedule-list.html"><img src="assets/img/blog/meta/03.png" alt="image not found"></a>
                                 </div>
                                 <div class="news__content">
                                    <h4 class="news__title"><a href="schedule-list.html">Digital Product Design & Interaction Seminar - 2023</a></h4>
                                    <div class="news__meta">
                                       <div class="news__meta-status">
                                          <span><i class="flaticon-user"></i></span>
                                          <span>Andru Hebo</span>
                                       </div>
                                       <div class="news__meta-status">
                                          <span><i class="flaticon-clock"></i></span>
                                          <span>9:00am- 5:00 pm</span>
                                       </div>
                                       <div class="news__meta-status">
                                          <span><i class="flaticon-placeholder-1"></i></span>
                                          <span>California(CA), 92677</span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="news__item">
                              <div class="news__item-inner">
                                 <div class="news__thumb">
                                    <a href="schedule-list.html"><img src="assets/img/blog/meta/01.png" alt="image not found"></a>
                                 </div>
                                 <div class="news__content">
                                    <h4 class="news__title"> <a href="schedule-list.html">NASA Space Apps Challenge Summit - 2023</a></h4>
                                    <div class="news__meta">
                                       <div class="news__meta-status">
                                          <span><i class="flaticon-user"></i></span>
                                          <span>Andru Hebo</span>
                                       </div>
                                       <div class="news__meta-status">
                                          <span><i class="flaticon-clock"></i></span>
                                          <span>9:00am- 5:00 pm</span>
                                       </div>
                                       <div class="news__meta-status">
                                          <span><i class="flaticon-placeholder-1"></i></span>
                                          <span>California(CA), 92677</span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="news__item">
                              <div class="news__item-inner">
                                 <div class="news__thumb">
                                    <a href="schedule-list.html"><img src="assets/img/blog/meta/02.png" alt="image not found"></a>
                                 </div>
                                 <div class="news__content">
                                    <h4 class="news__title"><a href="schedule-list.html">Digital Business Summit - 2023</a></h4>
                                    <div class="news__meta">
                                       <div class="news__meta-status">
                                          <span><i class="flaticon-user"></i></span>
                                          <span>Andru Hebo</span>
                                       </div>
                                       <div class="news__meta-status">
                                          <span><i class="flaticon-clock"></i></span>
                                          <span>9:00am- 5:00 pm</span>
                                       </div>
                                       <div class="news__meta-status">
                                          <span><i class="flaticon-placeholder-1"></i></span>
                                          <span>California(CA), 92677</span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="news__item">
                              <div class="news__item-inner">
                                 <div class="news__thumb">
                                    <a href="schedule-list.html"><img src="assets/img/blog/meta/03.png" alt="image not found"></a>
                                 </div>
                                 <div class="news__content">
                                    <h4 class="news__title"> <a href="schedule-list.html">Digital Product Design & Interaction Seminar - 2023</a></h4>
                                    <div class="news__meta">
                                       <div class="news__meta-status">
                                          <span><i class="flaticon-user"></i></span>
                                          <span>Andru Hebo</span>
                                       </div>
                                       <div class="news__meta-status">
                                          <span><i class="flaticon-clock"></i></span>
                                          <span>9:00am- 5:00 pm</span>
                                       </div>
                                       <div class="news__meta-status">
                                          <span><i class="flaticon-placeholder-1"></i></span>
                                          <span>California(CA), 92677</span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row g-20">
            <div class="col-xxl-6">
               <div class="card__wrapper">
                  <div class="card__header">
                     <div class="card__header-top">
                        <div class="card__title-inner">
                           <div class="card__header-icon">
                              <svg width="18" height="14" viewBox="0 0 18 14" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                 <path
                                    d="M17.3563 4.5C17.4625 4.48414 17.5599 4.4318 17.6317 4.35197C17.7036 4.27214 17.7454 4.1698 17.75 4.0625V1.65C17.75 1.53181 17.7267 1.41478 17.6815 1.30559C17.6363 1.19639 17.57 1.09718 17.4864 1.0136C17.4029 0.930031 17.3036 0.863738 17.1944 0.818508C17.0853 0.773279 16.9682 0.75 16.85 0.75H1.15003C1.03184 0.75 0.914806 0.773279 0.805613 0.818508C0.69642 0.863738 0.597205 0.930031 0.513632 1.0136C0.43006 1.09718 0.363766 1.19639 0.318537 1.30559C0.273308 1.41478 0.250029 1.53181 0.250029 1.65V4.0625C0.248789 4.17413 0.287969 4.28244 0.360338 4.36745C0.432707 4.45245 0.53338 4.50841 0.643779 4.525C1.24436 4.60497 1.79546 4.90033 2.19461 5.35616C2.59375 5.81198 2.81378 6.39724 2.81378 7.00312C2.81378 7.60901 2.59375 8.19427 2.19461 8.65009C1.79546 9.10592 1.24436 9.40127 0.643779 9.48125C0.534448 9.49768 0.434622 9.55274 0.362389 9.63644C0.290155 9.72014 0.250294 9.82694 0.250029 9.9375V12.35C0.250029 12.5887 0.34485 12.8176 0.513632 12.9864C0.682415 13.1552 0.911334 13.25 1.15003 13.25H16.85C17.0887 13.25 17.3176 13.1552 17.4864 12.9864C17.6552 12.8176 17.75 12.5887 17.75 12.35V9.9375C17.7513 9.82587 17.7121 9.71756 17.6397 9.63255C17.5674 9.54755 17.4667 9.49159 17.3563 9.475C16.7557 9.39502 16.2046 9.09967 15.8055 8.64384C15.4063 8.18802 15.1863 7.60276 15.1863 6.99687C15.1863 6.39099 15.4063 5.80573 15.8055 5.34991C16.2046 4.89408 16.7557 4.59872 17.3563 4.51875V4.5ZM9.00003 10.0875C8.87642 10.0875 8.75558 10.0508 8.6528 9.98217C8.55002 9.91349 8.46991 9.81588 8.4226 9.70168C8.3753 9.58747 8.36292 9.46181 8.38704 9.34057C8.41115 9.21933 8.47068 9.10797 8.55809 9.02056C8.64549 8.93315 8.75686 8.87362 8.8781 8.84951C8.99934 8.82539 9.125 8.83777 9.23921 8.88508C9.35341 8.93238 9.45102 9.01249 9.5197 9.11527C9.58837 9.21805 9.62503 9.33889 9.62503 9.4625C9.62503 9.62826 9.55918 9.78723 9.44197 9.90444C9.32476 10.0217 9.16579 10.0875 9.00003 10.0875ZM9.00003 7.66875C8.87642 7.66875 8.75558 7.63209 8.6528 7.56342C8.55002 7.49474 8.46991 7.39713 8.4226 7.28293C8.3753 7.16872 8.36292 7.04306 8.38704 6.92182C8.41115 6.80058 8.47068 6.68922 8.55809 6.60181C8.64549 6.5144 8.75686 6.45487 8.8781 6.43076C8.99934 6.40664 9.125 6.41902 9.23921 6.46632C9.35341 6.51363 9.45102 6.59374 9.5197 6.69652C9.58837 6.7993 9.62503 6.92014 9.62503 7.04375C9.62338 7.20842 9.55681 7.3658 9.43978 7.48166C9.32274 7.59752 9.16471 7.66251 9.00003 7.6625V7.66875ZM9.00003 5.16875C8.87642 5.16875 8.75558 5.13209 8.6528 5.06342C8.55002 4.99474 8.46991 4.89713 8.4226 4.78293C8.3753 4.66872 8.36292 4.54306 8.38704 4.42182C8.41115 4.30058 8.47068 4.18922 8.55809 4.10181C8.64549 4.0144 8.75686 3.95487 8.8781 3.93076C8.99934 3.90664 9.125 3.91902 9.23921 3.96633C9.35341 4.01363 9.45102 4.09374 9.5197 4.19652C9.58837 4.2993 9.62503 4.42014 9.62503 4.54375C9.62338 4.70842 9.55681 4.8658 9.43978 4.98166C9.32274 5.09752 9.16471 5.16251 9.00003 5.1625V5.16875Z"
                                    fill="#ADADAD" />
                              </svg>
                           </div>
                           <div class="card__header-title">
                              <h4>Sit Sold</h4>
                           </div>
                        </div>
                        <div class="card__header-right">
                           <div class="card__button">
                              <div class="traffic__tab">
                                 <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                       <button class="nav-link active" id="tricke-1-tab" data-bs-toggle="tab"
                                          data-bs-target="#tricke-1" type="button" role="tab"
                                          aria-controls="tricke-1" aria-selected="true">This Week</button>
                                       <button class="nav-link" id="nav-tricke-2-tab" data-bs-toggle="tab"
                                          data-bs-target="#nav-tricke-2" type="button" role="tab"
                                          aria-controls="nav-tricke-2" aria-selected="false">Previous Week</button>
                                    </div>
                                 </nav>
                              </div>
                           </div>
                           <div class="card__header-dropdown">
                              <div class="dropdown">
                                 <button>
                                    <svg class="dropdown__svg" width="14" height="4" viewBox="0 0 14 4" fill="none"
                                       xmlns="http://www.w3.org/2000/svg">
                                       <path
                                          d="M2 0.75C2.69036 0.75 3.25 1.30964 3.25 2C3.25 2.69036 2.69036 3.25 2 3.25C1.30964 3.25 0.75 2.69036 0.75 2C0.75 1.30964 1.30964 0.75 2 0.75Z"
                                          fill="white"></path>
                                       <path
                                          d="M7 0.75C7.69036 0.75 8.25 1.30964 8.25 2C8.25 2.69036 7.69036 3.25 7 3.25C6.30964 3.25 5.75 2.69036 5.75 2C5.75 1.30964 6.30964 0.75 7 0.75Z"
                                          fill="white"></path>
                                       <path
                                          d="M13.25 2C13.25 1.30964 12.6904 0.75 12 0.75C11.3096 0.75 10.75 1.30964 10.75 2C10.75 2.69036 11.3096 3.25 12 3.25C12.6904 3.25 13.25 2.69036 13.25 2Z"
                                          fill="white"></path>
                                    </svg>
                                 </button>
                                 <div class="dropdown-list">
                                    <a class="dropdown__item" href="javascript:void(0)">Edit</a>
                                    <a class="dropdown__item" href="javascript:void(0)">Delete</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="scroll-w-2 card__scroll">
                     <div class="card__inner">
                        <div class="tab-content" id="nav-tabContent">
                           <div class="tab-pane fade show active" id="tricke-1" role="tabpanel"
                              aria-labelledby="tricke-1-tab" tabindex="0">
                              <div class="tricket__sold-item">
                                 <div class="news__item-inner bb-0">
                                    <div class="news__thumb">
                                       <a href="event-list.html">
                                          <img src="assets/img/blog/meta/01.png" alt="image not found">
                                       </a>
                                    </div>
                                    <div class="news__content">
                                       <h4 class="news__title"> <a href="event-list.html">Digital Business Summit - 2023</a></h4>
                                       <div class="news__meta">
                                          <div class="news__meta-status">
                                             <span><i class="flaticon-user"></i></span>
                                             <span>Andru Hebo</span>
                                          </div>
                                          <div class="news__meta-status">
                                             <span><i class="flaticon-clock"></i></span>
                                             <span>9:00am- 5:00 pm</span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="sold__progress-item">
                                    <div class="sold__bar-top">
                                       <span>350</span>
                                       <span class="devider">/</span>
                                       <span class="active">175</span>
                                    </div>
                                    <div class="sold__progress">
                                       <div class="progress">
                                          <div class="progress-bar wow slideInLeft" data-wow-delay="0s"
                                             data-wow-duration=".4s" role="progressbar"
                                             aria-label="Example with label" style="width: 65%;" aria-valuenow="65"
                                             aria-valuemin="0" aria-valuemax="100"></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tricket__sold-item">
                                 <div class="news__item-inner bb-0">
                                    <div class="news__thumb">
                                       <a href="event-list.html"><img src="assets/img/blog/meta/02.png" alt="image not found"></a>
                                    </div>
                                    <div class="news__content">
                                       <h4 class="news__title"> <a href="event-list.html">NASA Space Apps Challenge Summit - 2023</a></h4>
                                       <div class="news__meta">
                                          <div class="news__meta-status">
                                             <span><i class="flaticon-user"></i></span>
                                             <span>Andru Hebo</span>
                                          </div>
                                          <div class="news__meta-status">
                                             <span><i class="flaticon-clock"></i></span>
                                             <span>9:00am- 5:00 pm</span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="sold__progress-item">
                                    <div class="sold__bar-top">
                                       <span>250</span>
                                       <span class="devider">/</span>
                                       <span class="active">225</span>
                                    </div>
                                    <div class="sold__progress">
                                       <div class="progress">
                                          <div class="progress-bar wow slideInLeft" data-wow-delay="0s"
                                             data-wow-duration=".6s" role="progressbar"
                                             aria-label="Example with label" style="width: 83%;" aria-valuenow="83"
                                             aria-valuemin="0" aria-valuemax="100"></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tricket__sold-item">
                                 <div class="news__item-inner bb-0">
                                    <div class="news__thumb">
                                       <a href="event-list.html">
                                          <img src="assets/img/blog/meta/03.png" alt="image not found">
                                       </a>
                                    </div>
                                    <div class="news__content">
                                       <h4 class="news__title"> <a href="event-list.html">Digital Product Design & Interaction Seminar - 2023</a></h4>
                                       <div class="news__meta">
                                          <div class="news__meta-status">
                                             <span><i class="flaticon-user"></i></span>
                                             <span>Andru Hebo</span>
                                          </div>
                                          <div class="news__meta-status">
                                             <span><i class="flaticon-clock"></i></span>
                                             <span>9:00am- 5:00 pm</span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="sold__progress-item">
                                    <div class="sold__bar-top">
                                       <span>163</span>
                                       <span class="devider">/</span>
                                       <span class="active">110</span>
                                    </div>
                                    <div class="sold__progress">
                                       <div class="progress">
                                          <div class="progress-bar wow slideInLeft" data-wow-delay="0s"
                                             data-wow-duration=".8s" role="progressbar"
                                             aria-label="Example with label" style="width: 45%;" aria-valuenow="45"
                                             aria-valuemin="0" aria-valuemax="100"></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tricket__sold-item">
                                 <div class="news__item-inner bb-0">
                                    <div class="news__thumb">
                                       <a href="event-list.html">
                                          <img src="assets/img/blog/meta/01.png" alt="image not found">
                                       </a>
                                    </div>
                                    <div class="news__content">
                                       <h4 class="news__title"> <a href="event-list.html">NASA Space Apps Challenge Summit - 2023</a></h4>
                                       <div class="news__meta">
                                          <div class="news__meta-status">
                                             <span><i class="flaticon-user"></i></span>
                                             <span>Andru Hebo</span>
                                          </div>
                                          <div class="news__meta-status">
                                             <span><i class="flaticon-clock"></i></span>
                                             <span>9:00am- 5:00 pm</span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="sold__progress-item">
                                    <div class="sold__bar-top">
                                       <span>350</span>
                                       <span class="devider">/</span>
                                       <span class="active">175</span>
                                    </div>
                                    <div class="sold__progress">
                                       <div class="progress">
                                          <div class="progress-bar wow slideInLeft" data-wow-delay="0s"
                                             data-wow-duration=".10s" role="progressbar"
                                             aria-label="Example with label" style="width: 65%;" aria-valuenow="65"
                                             aria-valuemin="0" aria-valuemax="100"></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tricket__sold-item">
                                 <div class="news__item-inner bb-0">
                                    <div class="news__thumb">
                                       <a href="event-list.html">
                                          <img src="assets/img/blog/meta/02.png" alt="image not found">
                                       </a>
                                    </div>
                                    <div class="news__content">
                                       <h4 class="news__title"> <a href="event-list.html">Digital Product Design & Interaction Seminar - 2023</a></h4>
                                       <div class="news__meta">
                                          <div class="news__meta-status">
                                             <span><i class="flaticon-user"></i></span>
                                             <span>Andru Hebo</span>
                                          </div>
                                          <div class="news__meta-status">
                                             <span><i class="flaticon-clock"></i></span>
                                             <span>9:00am- 5:00 pm</span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="sold__progress-item">
                                    <div class="sold__bar-top">
                                       <span>250</span>
                                       <span class="devider">/</span>
                                       <span class="active">225</span>
                                    </div>
                                    <div class="sold__progress">
                                       <div class="progress">
                                          <div class="progress-bar wow slideInLeft" data-wow-delay="0s"
                                             data-wow-duration=".12s" role="progressbar"
                                             aria-label="Example with label" style="width: 83%;" aria-valuenow="83"
                                             aria-valuemin="0" aria-valuemax="100"></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tricket__sold-item">
                                 <div class="news__item-inner bb-0">
                                    <div class="news__thumb">
                                       <a href="event-list.html"><img src="assets/img/blog/meta/03.png" alt="image not found"></a>
                                    </div>
                                    <div class="news__content">
                                       <h4 class="news__title"> <a href="event-list.html">Digital Business Summit - 2023</a></h4>
                                       <div class="news__meta">
                                          <div class="news__meta-status">
                                             <span><i class="flaticon-user"></i></span>
                                             <span>Andru Hebo</span>
                                          </div>
                                          <div class="news__meta-status">
                                             <span><i class="flaticon-clock"></i></span>
                                             <span>9:00am- 5:00 pm</span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="sold__progress-item">
                                    <div class="sold__bar-top">
                                       <span>163</span>
                                       <span class="devider">/</span>
                                       <span class="active">110</span>
                                    </div>
                                    <div class="sold__progress">
                                       <div class="progress">
                                          <div class="progress-bar wow slideInLeft" data-wow-delay="0s"
                                             data-wow-duration=".14s" role="progressbar"
                                             aria-label="Example with label" style="width: 45%;" aria-valuenow="45"
                                             aria-valuemin="0" aria-valuemax="100"></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="tab-pane fade" id="nav-tricke-2" role="tabpanel"
                              aria-labelledby="nav-tricke-2-tab" tabindex="0">
                              <div class="tricket__sold-item">
                                 <div class="news__item-inner bb-0">
                                    <div class="news__thumb">
                                       <a href="event-list.html">
                                          <img src="assets/img/blog/meta/01.png" alt="image not found">
                                       </a>
                                    </div>
                                    <div class="news__content">
                                       <h4 class="news__title"> <a href="event-list.html">Digital Business Summit - 2023</a></h4>
                                       <div class="news__meta">
                                          <div class="news__meta-status">
                                             <span><i class="flaticon-user"></i></span>
                                             <span>Andru Hebo</span>
                                          </div>
                                          <div class="news__meta-status">
                                             <span><i class="flaticon-clock"></i></span>
                                             <span>9:00am- 5:00 pm</span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="sold__progress-item">
                                    <div class="sold__bar-top">
                                       <span>350</span>
                                       <span class="devider">/</span>
                                       <span class="active">175</span>
                                    </div>
                                    <div class="sold__progress">
                                       <div class="progress">
                                          <div class="progress-bar wow slideInLeft" data-wow-delay="0s"
                                             data-wow-duration=".4s" role="progressbar"
                                             aria-label="Example with label" style="width: 65%;" aria-valuenow="65"
                                             aria-valuemin="0" aria-valuemax="100"></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tricket__sold-item">
                                 <div class="news__item-inner bb-0">
                                    <div class="news__thumb">
                                       <a href="event-list.html"><img src="assets/img/blog/meta/02.png" alt="image not found"></a>
                                    </div>
                                    <div class="news__content">
                                       <h4 class="news__title"> <a href="event-list.html">NASA Space Apps Challenge Summit - 2023</a></h4>
                                       <div class="news__meta">
                                          <div class="news__meta-status">
                                             <span><i class="flaticon-user"></i></span>
                                             <span>Andru Hebo</span>
                                          </div>
                                          <div class="news__meta-status">
                                             <span><i class="flaticon-clock"></i></span>
                                             <span>9:00am- 5:00 pm</span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="sold__progress-item">
                                    <div class="sold__bar-top">
                                       <span>250</span>
                                       <span class="devider">/</span>
                                       <span class="active">225</span>
                                    </div>
                                    <div class="sold__progress">
                                       <div class="progress">
                                          <div class="progress-bar wow slideInLeft" data-wow-delay="0s"
                                             data-wow-duration=".6s" role="progressbar"
                                             aria-label="Example with label" style="width: 83%;" aria-valuenow="83"
                                             aria-valuemin="0" aria-valuemax="100"></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tricket__sold-item">
                                 <div class="news__item-inner bb-0">
                                    <div class="news__thumb">
                                       <a href="event-list.html">
                                          <img src="assets/img/blog/meta/03.png" alt="image not found">
                                       </a>
                                    </div>
                                    <div class="news__content">
                                       <h4 class="news__title"> <a href="event-list.html">Digital Product Design & Interaction Seminar - 2023</a></h4>
                                       <div class="news__meta">
                                          <div class="news__meta-status">
                                             <span><i class="flaticon-user"></i></span>
                                             <span>Andru Hebo</span>
                                          </div>
                                          <div class="news__meta-status">
                                             <span><i class="flaticon-clock"></i></span>
                                             <span>9:00am- 5:00 pm</span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="sold__progress-item">
                                    <div class="sold__bar-top">
                                       <span>163</span>
                                       <span class="devider">/</span>
                                       <span class="active">110</span>
                                    </div>
                                    <div class="sold__progress">
                                       <div class="progress">
                                          <div class="progress-bar wow slideInLeft" data-wow-delay="0s"
                                             data-wow-duration=".8s" role="progressbar"
                                             aria-label="Example with label" style="width: 45%;" aria-valuenow="45"
                                             aria-valuemin="0" aria-valuemax="100"></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tricket__sold-item">
                                 <div class="news__item-inner bb-0">
                                    <div class="news__thumb">
                                       <a href="event-list.html">
                                          <img src="assets/img/blog/meta/01.png" alt="image not found">
                                       </a>
                                    </div>
                                    <div class="news__content">
                                       <h4 class="news__title"> <a href="event-list.html">NASA Space Apps Challenge Summit - 2023</a></h4>
                                       <div class="news__meta">
                                          <div class="news__meta-status">
                                             <span><i class="flaticon-user"></i></span>
                                             <span>Andru Hebo</span>
                                          </div>
                                          <div class="news__meta-status">
                                             <span><i class="flaticon-clock"></i></span>
                                             <span>9:00am- 5:00 pm</span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="sold__progress-item">
                                    <div class="sold__bar-top">
                                       <span>350</span>
                                       <span class="devider">/</span>
                                       <span class="active">175</span>
                                    </div>
                                    <div class="sold__progress">
                                       <div class="progress">
                                          <div class="progress-bar wow slideInLeft" data-wow-delay="0s"
                                             data-wow-duration=".10s" role="progressbar"
                                             aria-label="Example with label" style="width: 65%;" aria-valuenow="65"
                                             aria-valuemin="0" aria-valuemax="100"></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tricket__sold-item">
                                 <div class="news__item-inner bb-0">
                                    <div class="news__thumb">
                                       <a href="event-list.html">
                                          <img src="assets/img/blog/meta/02.png" alt="image not found">
                                       </a>
                                    </div>
                                    <div class="news__content">
                                       <h4 class="news__title"> <a href="event-list.html">Digital Product Design & Interaction Seminar - 2023</a></h4>
                                       <div class="news__meta">
                                          <div class="news__meta-status">
                                             <span><i class="flaticon-user"></i></span>
                                             <span>Andru Hebo</span>
                                          </div>
                                          <div class="news__meta-status">
                                             <span><i class="flaticon-clock"></i></span>
                                             <span>9:00am- 5:00 pm</span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="sold__progress-item">
                                    <div class="sold__bar-top">
                                       <span>250</span>
                                       <span class="devider">/</span>
                                       <span class="active">225</span>
                                    </div>
                                    <div class="sold__progress">
                                       <div class="progress">
                                          <div class="progress-bar wow slideInLeft" data-wow-delay="0s"
                                             data-wow-duration=".12s" role="progressbar"
                                             aria-label="Example with label" style="width: 83%;" aria-valuenow="83"
                                             aria-valuemin="0" aria-valuemax="100"></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tricket__sold-item">
                                 <div class="news__item-inner bb-0">
                                    <div class="news__thumb">
                                       <a href="event-list.html"><img src="assets/img/blog/meta/03.png" alt="image not found"></a>
                                    </div>
                                    <div class="news__content">
                                       <h4 class="news__title"> <a href="event-list.html">Digital Business Summit - 2023</a></h4>
                                       <div class="news__meta">
                                          <div class="news__meta-status">
                                             <span><i class="flaticon-user"></i></span>
                                             <span>Andru Hebo</span>
                                          </div>
                                          <div class="news__meta-status">
                                             <span><i class="flaticon-clock"></i></span>
                                             <span>9:00am- 5:00 pm</span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="sold__progress-item">
                                    <div class="sold__bar-top">
                                       <span>163</span>
                                       <span class="devider">/</span>
                                       <span class="active">110</span>
                                    </div>
                                    <div class="sold__progress">
                                       <div class="progress">
                                          <div class="progress-bar wow slideInLeft" data-wow-delay="0s"
                                             data-wow-duration=".14s" role="progressbar"
                                             aria-label="Example with label" style="width: 45%;" aria-valuenow="45"
                                             aria-valuemin="0" aria-valuemax="100"></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6">
               <div class="card__wrapper total__seat-wapper">
                  <div class="card__header mb-35">
                     <div class="card__header-top">
                        <div class="card__title-inner">
                           <div class="card__header-icon">
                              <i class="flaticon-chair-2"></i>
                           </div>
                           <div class="card__header-title">
                              <h4>Total Seats</h4>
                           </div>
                        </div>
                        <div class="card__header-right">
                           <div class="card__header-dropdown">
                              <div class="dropdown">
                                 <button>
                                    <svg class="dropdown__svg" width="14" height="4" viewBox="0 0 14 4" fill="none"
                                       xmlns="http://www.w3.org/2000/svg">
                                       <path
                                          d="M2 0.75C2.69036 0.75 3.25 1.30964 3.25 2C3.25 2.69036 2.69036 3.25 2 3.25C1.30964 3.25 0.75 2.69036 0.75 2C0.75 1.30964 1.30964 0.75 2 0.75Z"
                                          fill="white"></path>
                                       <path
                                          d="M7 0.75C7.69036 0.75 8.25 1.30964 8.25 2C8.25 2.69036 7.69036 3.25 7 3.25C6.30964 3.25 5.75 2.69036 5.75 2C5.75 1.30964 6.30964 0.75 7 0.75Z"
                                          fill="white"></path>
                                       <path
                                          d="M13.25 2C13.25 1.30964 12.6904 0.75 12 0.75C11.3096 0.75 10.75 1.30964 10.75 2C10.75 2.69036 11.3096 3.25 12 3.25C12.6904 3.25 13.25 2.69036 13.25 2Z"
                                          fill="white"></path>
                                    </svg>
                                 </button>
                                 <div class="dropdown-list">
                                    <a class="dropdown__item" href="javascript:void(0)">Edit</a>
                                    <a class="dropdown__item" href="javascript:void(0)">Delete</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="total__seat-progress">
                     <div id="radialChart"></div>
                     <div class="redialchart__content ">
                        <div class="redialchart__info">
                           <span>Total Seats</span>
                           <h4>$5500.00</h4>
                        </div>
                        <div class="redialchart__info">
                           <span>Sold Seats</span>
                           <h4>$4500.00</h4>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6">
               <div class="card__wrapper total__seat-wapper">
                  <div class="card__header mb-35">
                     <div class="card__header-top">
                        <div class="card__title-inner">
                           <div class="card__header-icon">
                              <svg class="card__header-svg" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                 <g clip-path="url(#clip0_231_4532)">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                       d="M13.903 8C13.963 8.629 14 9.292 14 10C14 10.2652 13.8946 10.5196 13.7071 10.7071C13.5196 10.8946 13.2652 11 13 11C12.7348 11 12.4804 10.8946 12.2929 10.7071C12.1054 10.5196 12 10.2652 12 10C12 9.287 11.961 8.622 11.895 8H8.092C7.95302 9.32964 7.95168 10.6701 8.088 12H10C10.2652 12 10.5196 12.1054 10.7071 12.2929C10.8946 12.4804 11 12.7348 11 13C11 13.2652 10.8946 13.5196 10.7071 13.7071C10.5196 13.8946 10.2652 14 10 14H8.416C8.885 16.08 9.618 17.41 10.001 18C10.001 18 10.79 18.013 10.927 18.002C11.1911 17.9849 11.4513 18.0723 11.6515 18.2453C11.8517 18.4184 11.9758 18.6632 11.997 18.927C12.0163 19.1914 11.9298 19.4526 11.7565 19.6533C11.5832 19.8539 11.3374 19.9776 11.073 19.997C10.979 20.004 10 20 10 20C4.486 20 0 15.514 0 10C0 4.485 4.486 0 10 0C15.514 0 20 4.485 20 10C20 10.379 19.964 10.749 19.921 11.116C19.8813 11.372 19.7439 11.6026 19.5377 11.7594C19.3315 11.9161 19.0725 11.9869 18.8153 11.9567C18.558 11.9265 18.3224 11.7978 18.1581 11.5976C17.9937 11.3974 17.9134 11.1412 17.934 10.883C17.969 10.592 18 10.3 18 10C18 9.308 17.902 8.64 17.737 8H13.903ZM9.988 2.036C9.602 2.642 8.888 3.967 8.424 6H11.561C11.095 3.967 10.376 2.642 9.988 2.036ZM2.263 12H6.082C6.024 11.371 5.987 10.71 5.987 10.004C5.98764 9.33487 6.01967 8.66613 6.083 8H2.263C2.097 8.64 2 9.308 2 10C2.00249 10.6751 2.09086 11.3472 2.263 12ZM3.082 14C4.0695 15.7037 5.64853 16.9852 7.519 17.601C6.99794 16.4493 6.61268 15.2408 6.371 14H3.082ZM6.373 6C6.674 4.499 7.108 3.297 7.523 2.397C5.65068 3.01232 4.07002 4.29471 3.082 6H6.373ZM13.612 6H16.917C15.9249 4.28668 14.3348 3.00032 12.452 2.388C12.9794 3.54217 13.3688 4.75456 13.612 6Z"
                                       fill="#ADADAD" />
                                    <path
                                       d="M15.2236 18.9454L12.6735 13.3351C12.4823 12.9145 12.915 12.4819 13.3356 12.673L18.9458 15.2232C19.3287 15.3972 19.3387 15.9375 18.9625 16.1256L17.2206 16.9965C17.1238 17.0449 17.0454 17.1234 16.997 17.2201L16.126 18.9621C15.9379 19.3383 15.3977 19.3283 15.2236 18.9454Z"
                                       fill="#ADADAD" />
                                 </g>
                                 <defs>
                                    <clipPath id="clip0_231_4532">
                                       <rect width="20" height="20" fill="white" />
                                    </clipPath>
                                 </defs>
                              </svg>
                           </div>
                           <div class="card__header-title">
                              <h4>Visits by Source</h4>
                           </div>
                        </div>
                        <div class="card__header-right">
                           <div class="card__header-dropdown">
                              <div class="dropdown">
                                 <button>
                                    <svg class="dropdown__svg" width="14" height="4" viewBox="0 0 14 4" fill="none"
                                       xmlns="http://www.w3.org/2000/svg">
                                       <path
                                          d="M2 0.75C2.69036 0.75 3.25 1.30964 3.25 2C3.25 2.69036 2.69036 3.25 2 3.25C1.30964 3.25 0.75 2.69036 0.75 2C0.75 1.30964 1.30964 0.75 2 0.75Z"
                                          fill="white"></path>
                                       <path
                                          d="M7 0.75C7.69036 0.75 8.25 1.30964 8.25 2C8.25 2.69036 7.69036 3.25 7 3.25C6.30964 3.25 5.75 2.69036 5.75 2C5.75 1.30964 6.30964 0.75 7 0.75Z"
                                          fill="white"></path>
                                       <path
                                          d="M13.25 2C13.25 1.30964 12.6904 0.75 12 0.75C11.3096 0.75 10.75 1.30964 10.75 2C10.75 2.69036 11.3096 3.25 12 3.25C12.6904 3.25 13.25 2.69036 13.25 2Z"
                                          fill="white"></path>
                                    </svg>
                                 </button>
                                 <div class="dropdown-list">
                                    <a class="dropdown__item" href="javascript:void(0)">Edit</a>
                                    <a class="dropdown__item" href="javascript:void(0)">Delete</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="total__seat-progress">
                     <div id="pieChart"></div>
                  </div>
               </div>
			   */
			   ?>
            </div>
         </div>
          
      </div>
      <!-- App side area end -->