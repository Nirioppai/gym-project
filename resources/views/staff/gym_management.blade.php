@extends('layouts.staff')

@section('title')
    VSGym - Gym Management
@endsection

@section('breadcrumb') @if ($staffGym)
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm">
            <a class="opacity-5 text-white" href="javascript:;">Pages</a>
        </li>
        <li
            class="breadcrumb-item text-sm text-white active"
            aria-current="page"
        >
            Gym Management
        </li>
    </ol>
</nav>
@endif 
@endsection 
@section('sidenav') @if ($staffGym)
<aside
    class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4"
    id="sidenav-main"
>
    <div class="sidenav-header">
        <i
            class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true"
            id="iconSidenav"
        ></i>
        <a
            class="navbar-brand m-0"
            href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html "
            target="_blank"
        >
            <img
                src="{{ asset('img/logo-ct-dark.png') }}"
                class="navbar-brand-img h-100"
                alt="main_logo"
            />

            <span class="ms-1 font-weight-bold">Argon Dashboard 2</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0" />

    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item mt-3">
                <h6
                    class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6"
                >
                    Monitoring
                </h6>
            </li>
            <li class="nav-item">
                <a
                    class="nav-link {{ Request::is('staff/dashboard') ? 'active' : '' }}"
                    href="/staff/dashboard"
                >
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center"
                    >
                        <i
                            class="ni ni-tv-2 text-primary text-sm opacity-10"
                        ></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard </span>
                </a>
            </li>
            <li class="nav-item">
                <a
                    class="nav-link {{ Request::is('staff/members') ? 'active' : '' }}"
                    href="/staff/members"
                >
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center"
                    >
                        <i
                            class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"
                        ></i>
                    </div>
                    <span class="nav-link-text ms-1">Members </span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6
                    class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6"
                >
                    Management
                </h6>
            </li>

            <li class="nav-item">
                <a
                    class="nav-link {{ Request::is('staff/gym-management') ? 'active' : '' }}"
                    href="/staff/gym-management"
                >
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center"
                    >
                        <i
                            class="ni ni-credit-card text-success text-sm opacity-10"
                        ></i>
                    </div>
                    <span class="nav-link-text ms-1">Gym Management</span>
                </a>
            </li>
            <li class="nav-item">
                <a
                    class="nav-link {{ Request::is('staff/plan-management') ? 'active' : '' }}"
                    href="/staff/plan-management"
                >
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center"
                    >
                        <i class="ni ni-app text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Plan Management</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
@endif
 
@endsection 


@section('content')
    <div class="row">
        <div class="col-lg">
            <div class="card ">
                <div class="card-header pb-0 p-3">
                    <div class="d-flex justify-content-between">
                        <h6 class="mb-2">Gym Listings</h6>
                    </div>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <div class="input-group ">
                                        <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                        <input class="form-control" placeholder="Search" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md d-flex justify-content-end">
                                <button type="button" class="btn btn-primary btn-sm">Add</button>
                            </div>
                        </div>
                    </form>

                    <div class="table-responsive">

                        <table class="table align-items-center ">
                            <tbody>
                                <tr>
                                    <td class="w-30">
                                        <div class="d-flex px-2 py-1 align-items-center">
                                            <div>
                                                <img src="{{ asset('img/icons/flags/US.png') }}" alt="Country flag">
                                            </div>
                                            <div class="ms-4">
                                                <p class="text-xs font-weight-bold mb-0">Country:</p>
                                                <h6 class="text-sm mb-0">United States</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Sales:</p>
                                            <h6 class="text-sm mb-0">2500</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Value:</p>
                                            <h6 class="text-sm mb-0">$230,900</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm">
                                        <div class="col text-center">
                                            <p class="text-xs font-weight-bold mb-0">Bounce:</p>
                                            <h6 class="text-sm mb-0">29.9%</h6>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-30">
                                        <div class="d-flex px-2 py-1 align-items-center">
                                            <div>
                                                <img src="{{ asset('img/icons/flags/DE.png') }}" alt="Country flag">
                                            </div>
                                            <div class="ms-4">
                                                <p class="text-xs font-weight-bold mb-0">Country:</p>
                                                <h6 class="text-sm mb-0">Germany</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Sales:</p>
                                            <h6 class="text-sm mb-0">3.900</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Value:</p>
                                            <h6 class="text-sm mb-0">$440,000</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm">
                                        <div class="col text-center">
                                            <p class="text-xs font-weight-bold mb-0">Bounce:</p>
                                            <h6 class="text-sm mb-0">40.22%</h6>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-30">
                                        <div class="d-flex px-2 py-1 align-items-center">
                                            <div>
                                                <img src="{{ asset('img/icons/flags/GB.png') }}" alt="Country flag">
                                            </div>
                                            <div class="ms-4">
                                                <p class="text-xs font-weight-bold mb-0">Country:</p>
                                                <h6 class="text-sm mb-0">Great Britain</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Sales:</p>
                                            <h6 class="text-sm mb-0">1.400</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Value:</p>
                                            <h6 class="text-sm mb-0">$190,700</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm">
                                        <div class="col text-center">
                                            <p class="text-xs font-weight-bold mb-0">Bounce:</p>
                                            <h6 class="text-sm mb-0">23.44%</h6>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-30">
                                        <div class="d-flex px-2 py-1 align-items-center">
                                            <div>
                                                <img src="{{ asset('img/icons/flags/BR.png') }}" alt="Country flag">
                                            </div>
                                            <div class="ms-4">
                                                <p class="text-xs font-weight-bold mb-0">Country:</p>
                                                <h6 class="text-sm mb-0">Brasil</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Sales:</p>
                                            <h6 class="text-sm mb-0">562</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Value:</p>
                                            <h6 class="text-sm mb-0">$143,960</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm">
                                        <div class="col text-center">
                                            <p class="text-xs font-weight-bold mb-0">Bounce:</p>
                                            <h6 class="text-sm mb-0">32.14%</h6>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>



            </div>
        </div>

    </div>
@endsection
