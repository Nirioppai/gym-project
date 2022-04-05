@extends('layouts.staff')

@section('title')
    VSGym - Members
@endsection

@section('breadcrumb')
    Members
@endsection


@section('content')
    <div class="row">
        <div class="col-lg">
            <div class="card ">
                <div class="card-header pb-0 p-3">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="member-list-tab" data-bs-toggle="tab"
                                data-bs-target="#member-list" type="button" role="tab" aria-controls="member-list"
                                aria-selected="true">Member List</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="approval-tab" data-bs-toggle="tab" data-bs-target="#approval"
                                type="button" role="tab" aria-controls="approval" aria-selected="false">Member
                                Approvals</button>
                        </li>

                    </ul>

                </div>
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="member-list" role="tabpanel"
                            aria-labelledby="member-list-tab">
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
                                                        <img src="{{ asset('img/icons/flags/US.png') }}"
                                                            alt="Country flag">
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
                                                        <img src="{{ asset('img/icons/flags/DE.png') }}"
                                                            alt="Country flag">
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
                                                        <img src="{{ asset('img/icons/flags/GB.png') }}"
                                                            alt="Country flag">
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
                                                        <img src="{{ asset('img/icons/flags/BR.png') }}"
                                                            alt="Country flag">
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
                        <div class="tab-pane fade" id="approval" role="tabpanel" aria-labelledby="approval-tab">
                            <div class="table-responsive">
                                <table class="table align-items-center ">
                                    <tbody>
                                        <tr>
                                            <td class="w-30">
                                                <div class="d-flex px-2 py-1 align-items-center">
                                                    <div>
                                                        <img src="{{ asset('img/icons/flags/US.png') }}"
                                                            alt="Country flag">
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
                                                        <img src="{{ asset('img/icons/flags/DE.png') }}"
                                                            alt="Country flag">
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
                                                        <img src="{{ asset('img/icons/flags/GB.png') }}"
                                                            alt="Country flag">
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
                                                        <img src="{{ asset('img/icons/flags/BR.png') }}"
                                                            alt="Country flag">
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
        </div>

    </div>
@endsection
