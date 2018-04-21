<ul class="sidebar-menu" id="nav-accordion">
    <li>
        <a class="active" href="index.html">
            <i class="fa fa-dashboard"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="sub-menu">
        <a href="javascript:;" >
            <i class=" fa fa-envelope"></i>
            <span>Cancer</span>
        </a>
        <ul class="sub">
            <li><a  href="inbox.html">List Cancer Type</a></li>
            <li><a  href="inbox_details.html">Add Cancer Type</a></li>
            <li><a  href="inbox.html">List Cancer</a></li>
            <li><a  href="{{route('add_cancer_detail')}}">Add Cancer</a></li>
        </ul>
    </li>
    <li class="sub-menu">
        <a href="javascript:;" >
            <i class=" fa fa-bar-chart-o"></i>
            <span>Treatment</span>
        </a>
        <ul class="sub">
          <li><a  href="morris.html">List Treatment Type</a></li>
          <li><a  href="chartjs.html">Add Treatment Type</a></li>
            <li><a  href="morris.html">List Treatment</a></li>
            <li><a  href="chartjs.html">Add Treatment</a></li>
        </ul>
    </li>
    <li class="sub-menu">
        <a href="javascript:;" >
            <i class="fa fa-shopping-cart"></i>
            <span>Shop</span>
        </a>
        <ul class="sub">
            <li><a  href="product_list.html">List View</a></li>
            <li><a  href="product_details.html">Details View</a></li>
        </ul>
    </li>
    <li>
        <a href="google_maps.html" >
            <i class="fa fa-map-marker"></i>
            <span>Google Maps </span>
        </a>
    </li>

    <!--multi level menu start-->
    <li class="sub-menu">
        <a href="javascript:;" >
            <i class="fa fa-sitemap"></i>
            <span>Multi level Menu</span>
        </a>
        <ul class="sub">
            <li><a  href="javascript:;">Menu Item 1</a></li>
            <li class="sub-menu">
                <a  href="boxed_page.html">Menu Item 2</a>
                <ul class="sub">
                    <li><a  href="javascript:;">Menu Item 2.1</a></li>
                    <li class="sub-menu">
                        <a  href="javascript:;">Menu Item 3</a>
                        <ul class="sub">
                            <li><a  href="javascript:;">Menu Item 3.1</a></li>
                            <li><a  href="javascript:;">Menu Item 3.2</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
    <!--multi level menu end-->

</ul>
