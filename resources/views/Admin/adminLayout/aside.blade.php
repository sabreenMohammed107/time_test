<aside id="ms-side-nav" class="side-nav fixed ms-aside-scrollable ms-aside-left">

        <!-- Logo -->
        <div class="logo-sn ms-d-block-lg">
          <a class="pl-0 ml-0 text-center" href="index.html"> <img src="{{ asset('adminasset/img/85055897_2290538387910995_9008169895875051520_n.png')}}" alt="logo"> </a>
        </div>
      
        <!-- Navigation -->
        <ul class="accordion ms-main-aside fs-14" id="side-nav-accordion">
            <!-- Home -->
            <li class="menu-item ">
                <a class=" active" href="index.html">
                    <span><i class="material-icons fs-16"></i>Home </span>
                </a>
               
            </li>
            
            <!-- /Home -->
             <!-- Shop  -->
             <li class="menu-item">
              <a href="#" class="has-chevron" data-toggle="collapse" data-target="#create" aria-expanded="false" aria-controls="tables">
                <span><i class="material-icons fs-16">build</i>Shop</span>
              </a>
              <ul id="create" class="collapse" aria-labelledby="tables" data-parent="#side-nav-accordion">

              <li> <a href="{{ route('shop.index') }}">shopdata</a> </li>

                <li> <a href="{{ route('products.index') }}">Shop Products</a> </li>
                <li> <a href="{{ route('orders.index') }}">Shop Orders</a> </li>

              </ul>
          </li>
          <!--  Setup  -->
            
          <!-- Sending  -->
          <!-- <li class="menu-item">
              <a href="#" class="has-chevron" data-toggle="collapse" data-target="#basic-elements" aria-expanded="false" aria-controls="basic-elements">
              <span><i class="material-icons fs-16">backup</i>Sending</span>
            </a>
              <ul id="basic-elements" class="collapse" aria-labelledby="basic-elements" data-parent="#side-nav-accordion">
                <li> <a href="send_mail.html">Sending mail</a> </li>
                <li> <a href="send_sms.html">sending sms</a> </li>
              </ul>
            </li> -->
          <!--  Sending  -->
          <!-- Clients  -->
          <!-- <li class="menu-item">
              <a href="#" class="has-chevron" data-toggle="collapse" data-target="#contactsdropdown" aria-expanded="false" aria-controls="contactsdropdown">
              <span><i class="material-icons fs-16">assignment</i>Clients</span>
            </a>
              <ul id="contactsdropdown" class="collapse" aria-labelledby="basic-elements" data-parent="#side-nav-accordion">
                <li> <a href="contacts.html">Clients</a> </li>
               
              </ul>
            </li> -->
          <!--  Clients  -->
          <!-- Leads  -->
          <!-- <li class="menu-item">
              <a href="#" class="has-chevron" data-toggle="collapse" data-target="#callsdropdown" aria-expanded="false" aria-controls="callsdropdown">
              <span><i class="material-icons fs-16">call</i>Leads</span>
            </a>
              <ul id="callsdropdown" class="collapse" aria-labelledby="basic-elements" data-parent="#side-nav-accordion">
                <li> <a href="calls.html">Leads</a> </li>
               
              </ul>
            </li> -->
          <!--  Leads  -->
          <!-- Users  -->
          <!-- <li class="menu-item">
              <a href="#" class="has-chevron" data-toggle="collapse" data-target="#Usersdropdown" aria-expanded="false" aria-controls="Usersdropdown">
              <span><i class="material-icons fs-16">assignment_ind</i>Users</span>
            </a>
              <ul id="Usersdropdown" class="collapse" aria-labelledby="basic-elements" data-parent="#side-nav-accordion">
                <li> <a href="users.html">Users</a> </li>
               
              </ul>
            </li> -->
          <!--  Users  -->
          <!-- <li class="menu-item ">
            <a class="" href="companies.html">
                <span><i class="material-icons fs-16">assignment</i>Companies </span>
            </a>
           
        </li>
            -->
          
          
        </ul>
      
      
      </aside>