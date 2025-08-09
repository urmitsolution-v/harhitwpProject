  <!-- ========== App Menu Start ========== -->
          <div class="main-nav">
               <!-- Sidebar Logo -->
               <div class="logo-box">
                    <a href="/admin/dashboard" class="logo-dark">
                         <img src="{{ url('images') }}/logo.png" class="logo-sm" alt="logo sm">
                         {{-- <img src="{{ url('images') }}/logo.png" class="logo-lg" alt="logo dark"> --}}
                    </a>

                    {{-- <a href="/admin/dashboard" class="logo-light">
                         <img src="{{ url('images') }}/logo.png" class="logo-sm" alt="logo sm">
                         <img src="{{ url('images') }}/logo.png" class="logo-lg" alt="logo light">
                    </a> --}}
               </div>

               <!-- Menu Toggle Button (sm-hover) -->
               <button type="button" class="button-sm-hover" aria-label="Show Full Sidebar">
                    <iconify-icon icon="solar:hamburger-menu-broken" class="button-sm-hover-icon"></iconify-icon>
               </button>

               <div class="scrollbar" data-simplebar>

                    <ul class="navbar-nav" id="navbar-nav">
                         <li class="menu-title">Menu</li>
                         <li class="nav-item">
                              <a class="nav-link" href="/admin/dashboard">
                                   <span class="nav-icon">
                                        <iconify-icon icon="solar:home-2-broken"></iconify-icon>
                                   </span>
                                   <span class="nav-text"> Dashboard </span>
                                 
                              </a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link menu-arrow" href="#sidebarLayouts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                                   <span class="nav-icon">
                                        <iconify-icon icon="solar:siderbar-broken"></iconify-icon>
                                   </span>
                                   <span class="nav-text">Menu Page</span>
                              </a>
                              <div class="collapse" id="sidebarLayouts">
                                   <ul class="nav sub-navbar-nav">
                                        <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/admin/menu-categories" >Main Menu</a>
                                        </li>
                                        <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/admin/menu-subcategories" >Submenu</a>
                                        </li>
                                        
                                   </ul>
                              </div>
                         </li>

                         <li class="menu-title">Pages</li>

                         {{-- <li class="nav-item">
                              <a class="nav-link" href="apps-chat.html">
                                   <span class="nav-icon">
                                        <iconify-icon icon="solar:chat-round-call-broken"></iconify-icon>
                                   </span>
                                   <span class="nav-text"> Chat </span>
                              </a>
                         </li> --}}


                              <li class="nav-item">
                              <a class="nav-link menu-arrow" href="#sidebarhomepage" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarhomepage">
                                   <span class="nav-icon">
                                       <iconify-icon icon="material-symbols:home"></iconify-icon>
                                   </span>
                                   <span class="nav-text">Home Page</span>
                              </a>
                              <div class="collapse" id="sidebarhomepage">
                                   <ul class="nav sub-navbar-nav">
                                        <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/admin/banners">Banners</a>
                                        </li>
                                           {{-- <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/admin/highlight-content">Highlights Content</a>
                                        </li> --}}
                                        
                                          <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/admin/about-us">Hero About</a>
                                        </li>
                                          <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/admin/stores">Stores</a>
                                        </li>
                                          <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/admin/eligibility-banner">Eligibility Banner</a>
                                        </li>
                                         <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/admin/entrepreneurship">Entrepreneurship</a>
                                        </li>
                                         <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/admin/quality-products">Quality Products</a>
                                        </li>
                                           <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/admin/become-a-part">Become A Part</a>
                                        </li>
                                      
                                      
                                        <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/admin/best-sectoion">We’re the Best & Ecosystem</a>
                                        </li>
                                      
                                        <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/admin/haicl-strengthening-partners">Haicl Strengthening Partners</a>
                                        </li>

                                         {{-- <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/admin/event-highlight">Event Highlight</a>
                                        </li>
                                          <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/admin/infrastructure-thinking">Infrastructure Thinking</a>
                                        </li>
                                         <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/admin/government-solutions">Government Solutions</a>
                                        </li>
                                           <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/admin/gds-highlights">GDS Highlights</a>
                                        </li>
                                         <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/admin/partners?type=partner">Partners</a>
                                        </li> --}}
                                   </ul>
                              </div>
                         </li> 

                         
                         <li class="nav-item">
                              <a class="nav-link menu-arrow" href="#sidebaraboutus" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebaraboutus">
                                   <span class="nav-icon">
                                       <iconify-icon icon="mdi:account-group-outline"></iconify-icon>

                                   </span>
                                   <span class="nav-text">More Pages</span>
                              </a>
                              <div class="collapse" id="sidebaraboutus">
                                   <ul class="nav sub-navbar-nav">
                                         <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/admin/investments">Video Training</a>
                                        </li>
                                         <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/admin/publications">{{ env('APP_NAME') }} News</a>
                                        </li>
                                   </ul>
                              </div>
                         </li> 

                             {{-- <li class="nav-item">
                              <a class="nav-link menu-arrow" href="#sidebarFormsresourceddsd" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarFormsresourceddsd">
                                   <span class="nav-icon">
                                       <iconify-icon icon="mdi:lightbulb-on-outline"></iconify-icon>
                                   </span>
                                   <span class="nav-text">Initiatives</span>
                              </a>
                              <div class="collapse" id="sidebarFormsresourceddsd">
                                   <ul class="nav sub-navbar-nav">
                                        <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/admin/global-dpi-summit">Global DPI Summit</a>
                                        </li>
                                        <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/admin/inclusivity-pulse-for-dpi">Inclusivity Pulse for DPI</a>
                                        </li>
                                   </ul>
                              </div>
                         </li> --}}

                         
{{--                          
                         <li class="nav-item">
                              <a class="nav-link menu-arrow" href="#sidebarFormsresource" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarFormsresource">
                                   <span class="nav-icon">
                                       <iconify-icon icon="mdi:bookshelf"></iconify-icon>
                                   </span>
                                   <span class="nav-text">Resources</span>
                              </a>
                              <div class="collapse" id="sidebarFormsresource">
                                   <ul class="nav sub-navbar-nav">
                                        <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/admin/insights">Insights</a>
                                        </li>
                                         <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/admin/publications">Publications</a>
                                        </li>
                                          <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/admin/faqs">FAQ</a>
                                        </li>
                                   </ul>
                              </div>
                         </li>

                         <li class="nav-item">
                              <a class="nav-link menu-arrow" href="#sidebarFormsresourced" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarFormsresourced">
                                   <span class="nav-icon">
                                       <iconify-icon icon="mdi:account-star-outline"></iconify-icon>

                                   </span>
                                   <span class="nav-text">Impact Stories</span>
                              </a>
                              <div class="collapse" id="sidebarFormsresourced">
                                   <ul class="nav sub-navbar-nav">
                                        <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/admin/stories">Impact Stories</a>
                                        </li>
                                   </ul>
                              </div>
                         </li>
                         
                         <li class="nav-item">
                              <a class="nav-link menu-arrow" href="#sidebarForms" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarForms">
                                   <span class="nav-icon">
                                      <iconify-icon icon="mdi:note-text-outline"></iconify-icon>
                                   </span>
                                   <span class="nav-text"> Blogs </span>
                              </a>
                              <div class="collapse" id="sidebarForms">
                                   <ul class="nav sub-navbar-nav">
                                        <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/admin/categories?type=blogs">Categories</a>
                                        </li>
                                        <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/admin/create-blog">New Blog</a>
                                        </li>
                                        <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/admin/blogs">Blog List</a>
                                        </li>
                                       
                                   </ul>
                              </div>
                              
                         </li>
                         
                          <li class="nav-item">
                              <a class="nav-link menu-arrow" href="#sidebarFormsdsfkjsdhf" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarFormsdsfkjsdhf">
                                   <span class="nav-icon">
                                        <iconify-icon icon="mdi:earth"></iconify-icon>
                                   </span>
                                   <span class="nav-text">DPI World</span>
                              </a>
                              <div class="collapse" id="sidebarFormsdsfkjsdhf">
                                   <ul class="nav sub-navbar-nav">
                                        <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/admin/countries">Countries</a>
                                        </li>
                                        <!--<li class="sub-nav-item">-->
                                        <!--     <a class="sub-nav-link" href="/admin/dpi-world">DPI World</a>-->
                                        <!--</li>-->
                                       
                                   </ul>
                              </div>
                          </li> --}}


                             <li class="nav-item">
                              <a class="nav-link menu-arrow" href="#enquiydropdown" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="enquiydropdown">
                                   <span class="nav-icon">
                                      <iconify-icon icon="mdi:email-outline"></iconify-icon>
                                   </span>
                                   <span class="nav-text">All Enquires</span>
                              </a>
                              <div class="collapse" id="enquiydropdown">
                                   <ul class="nav sub-navbar-nav">
                                        <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/admin/contact-enquires">Contact Enquires</a>
                                        </li>
                                        {{-- <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/admin/conversations">Conversations</a>
                                        </li>
                                        <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/admin/subscription">Subscription</a>
                                        </li> --}}
                                       
                                   </ul>
                              </div>
                          </li>

                         
                          
                         <li class="nav-item">
                              <a class="nav-link menu-arrow" href="#settingsform" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="settingsform">
                                   <span class="nav-icon">
                                       <i class="fa-solid fa-gear"></i>

                                   </span>
                                   <span class="nav-text">Settings</span>
                              </a>
                              <div class="collapse" id="settingsform">
                                   <ul class="nav sub-navbar-nav">
                                        <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/admin/genral-setting">General Settings</a>
                                        </li>
                                                                              
                                   </ul>
                              </div>
                         </li> <!-- end Form Menu -->

                           <li class="nav-item">
                              <a class="nav-link" href="/admin/apis-docs">
                                   <span class="nav-icon">
                                        <iconify-icon icon="mdi:code-braces-box"></iconify-icon>
                                   </span>
                                   <span class="nav-text">Apis Documentions</span>
                              </a>
                         </li>


                    </ul>
               </div>
          </div>