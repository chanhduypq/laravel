<nav class="navbar navbar-expand-lg navbar-light bg-light m-4">

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Trang chủ 
                    <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link<?php if (class_basename(Route::current()->controller) == 'ReportController') { echo ' active'; } ?>" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Thống kê
                </a>
            </li>
            
        </ul>
    </div>
</nav>