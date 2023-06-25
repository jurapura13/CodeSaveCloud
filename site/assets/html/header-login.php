<!--
This header shows up if SESSION:LOGIN is found.
-->
<nav class="navbar navbar-expand-lg bg-body fixed-top" style="border-bottom: var(--bs-border-width) solid var(--bs-border-color);background-color: rgba(var(--bs-tertiary-bg-rgb)) !important;">
    <div class="container">

        <a class="navbar-brand d-flex" href="<?php echo URL; ?>">
            <img src="<?php echo URL; ?>assets/media/logo-title.png" alt="" width="150">
        </a>
        <div class="d-flex align-items-center">
            <li class="nav-item d-block d-lg-none mr-3">
                <a class="nav-link" href="#" style="padding-inline-end: 1.3em;">
                    <i class="bi bi-gear fs-5"></i>
                </a>

            </li>
            
            <button class="navbar-toggler btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">


            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                <li class="nav-item d-none d-lg-flex">
                    <a class="nav-link" href="<?php echo URL; ?>">Codes</a>
                </li>
                <li class="nav-item d-none d-lg-flex">
                    <a class="nav-link" href="<?php echo URL; ?>collections">Collections</a>
                </li>
                <li class="nav-item d-none d-lg-flex">
                    <a class="nav-link" href="<?php echo URL; ?>explore">Explore</a>
                </li>
            </ul>





            <!-- ovo se vidi na laptopu-->
            <ul class="navbar-nav mb-2 mb-lg-0 d-none d-lg-flex align-items-center">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL; ?>username">
                        <span>@username</span>
                    </a>

                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-gear fs-5"></i>
                    </a>

                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL; ?>?action=out">
                        <i class="bi bi-box-arrow-right fs-5"></i>
                    </a>

                </li>
            </ul>
            <!--kraj  ovo se vidi na laptopu-->

            <!-- ovo se vidi na mobu-->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-block d-lg-none">
                <hr class="nav-divider">
                <li class="nav-item"><a class="nav-link text-muted" href="<?php echo URL; ?>username">@username</a></li>
                <hr class="nav-divider">
                <li class="nav-item"><a class="nav-link" href="<?php echo URL; ?>">Codes</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo URL; ?>collections">Collections</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo URL; ?>explore">Explore</a></li>

                <hr class="nav-divider">
                <li class="nav-item"><a class="nav-link d-flex align-items-center" href="<?php echo URL; ?>action=out"><i class="bi bi-box-arrow-right fs-5" style="padding-right:.6em;"></i> Sign out</a></li>
            </ul>
            <!--kraj ovo se vidi na mobu-->


        </div>
    </div>
</nav>
