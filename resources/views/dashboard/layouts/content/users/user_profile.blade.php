@extends('dashboard.main')

@section('title')
    <title>Dashboard | Users profile</title>
@endsection

@section('contents')
    <div class="ec-content-wrapper users-menu user-profile ">
        <div class="content">
            <div class="breadcrumb-wrapper breadcrumb-contacts">
                <div>
                    <h1>User Profile</h1>
                    <p class="breadcrumbs"><span><a href="{{route('dashboard-index')}}">Home</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Profile
                    </p>
                </div>
                <div>
                    <a href="user-list.html" class="btn btn-primary">Delete</a>
                </div>
            </div>
            <div class="card bg-white profile-content">
                <div class="row">
                    <div class="col-lg-4 col-xl-3">
                        <div class="profile-content-left profile-left-spacing">
                            <div class="text-center widget-profile px-0 border-0">
                                <div class="card-img mx-auto rounded-circle">
                                    <img src="{{ asset('/storage/' . $user->profile) }}" alt="user image">
                                </div>
                                <div class="card-body">
                                    <h4 class="py-2 text-dark">{{$user->name}}</h4>
                                    <p>{{$user->username}}</p>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between ">
                                <div class="text-center pb-4">
                                    <h6 class="text-dark pb-2">{{$user->total_buy}}</h6>
                                    <p>Bought</p>
                                </div>

                                <div class="text-center pb-4">
                                    <h6 class="text-dark pb-2">32</h6>
                                    <p>Wish List</p>
                                </div>

                                <div class="text-center pb-4">
                                    <h6 class="text-dark pb-2">02</h6>
                                    <p>Voucher</p>
                                </div>
                            </div>

                            <hr class="w-100">

                            <div class="contact-info pt-4">
                                <h5 class="text-dark">Contact Information</h5>
                                <p class="text-dark font-weight-medium pt-24px mb-2">Email address</p>
                                <p>{{$user->email}}</p>
                                <p class="text-dark font-weight-medium pt-24px mb-2">Phone Number</p>
                                <p>{{$user->phoneNumber}}</p>
                                <p class="text-dark font-weight-medium pt-24px mb-2">Status</p>
                                <p>{{$user->status}}</p>
                                <p class="text-dark font-weight-medium pt-24px mb-2">Role</p>
                                <p>{{$user->role}}</p>
                                <p class="text-dark font-weight-medium pt-24px mb-2">Birthday</p>
                                <p>Dec 10, 1991</p>
                                <p class="text-dark font-weight-medium pt-24px mb-2">Social Profile</p>
                                <p class="social-button">
                                    <a href="#" class="mb-1 btn btn-outline btn-twitter rounded-circle">
                                        <i class="mdi mdi-twitter"></i>
                                    </a>

                                    <a href="#" class="mb-1 btn btn-outline btn-linkedin rounded-circle">
                                        <i class="mdi mdi-linkedin"></i>
                                    </a>

                                    <a href="#" class="mb-1 btn btn-outline btn-facebook rounded-circle">
                                        <i class="mdi mdi-facebook"></i>
                                    </a>

                                    <a href="#" class="mb-1 btn btn-outline btn-skype rounded-circle">
                                        <i class="mdi mdi-skype"></i>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-xl-9">
                        <div class="profile-content-right profile-right-spacing py-5">
                            <ul class="nav nav-tabs px-3 px-xl-5 nav-style-border" id="myProfileTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="settings-tab" data-bs-toggle="tab"
                                            data-bs-target="#settings" type="button" role="tab"
                                            aria-controls="settings" aria-selected="true">Settings
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                            data-bs-target="#profile" type="button" role="tab"
                                            aria-controls="profile" aria-selected="false">Profile
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                            data-bs-target="#permissions" type="button" role="tab"
                                            aria-controls="permissions" aria-selected="false">Permissions
                                    </button>
                                </li>
                            </ul>

                            <div class="tab-content px-3 px-xl-5" id="myTabContent">

                                <div class="tab-pane fade show active" id="settings" role="tabpanel"
                                     aria-labelledby="settings-tab">
                                    <div class="tab-pane-content mt-5">
                                        <form class="form-update-class" method="post"
                                              action="{{url('admin_dashboard/users_profile/userUpdate/'. $user->id)}}"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row mb-6">
                                                <label for="coverImage"
                                                       class="col-sm-4 col-lg-2 col-form-label">User Image</label>
                                                <div class="col-sm-8 col-lg-10">
                                                    <div class="custom-file mb-1">
                                                        <input type="file" class="custom-file-input" id="coverImage"
                                                               name="profile" value="{{$user->profile}}">
                                                        <label class="custom-file-label" for="coverImage">Choose
                                                            file...</label>
                                                        <div class="invalid-feedback">Example invalid custom file
                                                            feedback
                                                        </div>
                                                    </div>
                                                    @error('profile')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="Username">Username</label>
                                                        <input type="text" class="form-control" name="username"
                                                               id="Username" value="{{$user->username}}" disabled>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="name">Name</label>
                                                        <input type="text" class="form-control" name="name" id="name"
                                                               value="{{$user->name}}">
                                                    </div>
                                                    @error('name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="email">Name</label>
                                                        <input type="email" class="form-control" name="email" id="email"
                                                               value="{{$user->email}}">
                                                    </div>
                                                    @error('email')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="phoneNumber">Phone number</label>
                                                        <input type="text" class="form-control" name="phoneNumber"
                                                               id="phoneNumber" value="{{$user->phoneNumber}}">
                                                    </div>
                                                    @error('phoneNumber')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="status">Status</label>
                                                        <select class="form-control user-status" id="status"
                                                                name="status">
                                                            <option
                                                                value="active" {{ $user->status == 'active' ? 'selected' : '' }}>
                                                                Active
                                                            </option>
                                                            <option
                                                                value="inactive" {{ $user->status == 'inactive' ? 'selected' : '' }}>
                                                                Inactive
                                                            </option>
                                                            <option
                                                                value="pending" {{ $user->status == 'pending' ? 'selected' : '' }}>
                                                                Pending
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="role">Role</label>
                                                        <select class="form-control user-role" id="role" name="role">
                                                            <option
                                                                value="customer" {{ $user->role == 'customer' ? 'selected' : '' }}>
                                                                Customer
                                                            </option>
                                                            <option
                                                                value="seller" {{ $user->role == 'seller' ? 'selected' : '' }}>
                                                                Seller
                                                            </option>
                                                            <option
                                                                value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>
                                                                Admin
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group mb-4">
                                                <label for="oldPassword">Old password</label>
                                                <input type="password" class="form-control" name="old_password"
                                                       id="oldPassword">
                                                @error('old_password')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-4">
                                                <label for="newPassword">New password</label>
                                                <input type="password" class="form-control" name="password"
                                                       id="newPassword">
                                                @error('password')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-4">
                                                <label for="conPassword">Confirm password</label>
                                                <input type="password" class="form-control" name="password_confirmation"
                                                       id="conPassword">
                                                @error('password_confirmation')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="d-flex justify-content-end mt-5">
                                                <button type="submit"
                                                        class="btn btn-primary mb-2 btn-pill">Update
                                                    Profile
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="profile" role="tabpanel"
                                     aria-labelledby="profile-tab">
                                    <div class="tab-widget mt-5">
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <div class="media widget-media p-3 bg-white border">
                                                    <div class="icon rounded-circle mr-3 bg-primary">
                                                        <i class="mdi mdi-account-outline text-white "></i>
                                                    </div>

                                                    <div class="media-body align-self-center">
                                                        <h4 class="text-primary mb-2">{{$user->total_buy}}</h4>
                                                        <p>Bought</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-4">
                                                <div class="media widget-media p-3 bg-white border">
                                                    <div class="icon rounded-circle bg-warning mr-3">
                                                        <i class="mdi mdi-cart-outline text-white "></i>
                                                    </div>

                                                    <div class="media-body align-self-center">
                                                        <h4 class="text-primary mb-2">1953</h4>
                                                        <p>Wish List</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-4">
                                                <div class="media widget-media p-3 bg-white border">
                                                    <div class="icon rounded-circle mr-3 bg-success">
                                                        <i class="mdi mdi-ticket-percent text-white "></i>
                                                    </div>

                                                    <div class="media-body align-self-center">
                                                        <h4 class="text-primary mb-2">02</h4>
                                                        <p>Voucher</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-12">

                                                <!-- Notification Table -->
                                                <div class="card card-default">
                                                    <div class="card-header justify-content-between mb-1">
                                                        <h2>Latest Notifications</h2>
                                                        <div>
                                                            <button class="text-black-50 mr-2 font-size-20"><i
                                                                    class="mdi mdi-cached"></i></button>
                                                            <div
                                                                class="dropdown show d-inline-block widget-dropdown">
                                                                <a class="dropdown-toggle icon-burger-mini"
                                                                   href="#" role="button"
                                                                   id="dropdown-notification"
                                                                   data-bs-toggle="dropdown"
                                                                   aria-haspopup="true" aria-expanded="false"
                                                                   data-display="static"></a>
                                                                <ul class="dropdown-menu dropdown-menu-right"
                                                                    aria-labelledby="dropdown-notification">
                                                                    <li class="dropdown-item"><a
                                                                            href="#">Action</a></li>
                                                                    <li class="dropdown-item"><a
                                                                            href="#">Another action</a></li>
                                                                    <li class="dropdown-item"><a
                                                                            href="#">Something else here</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="card-body compact-notifications" data-simplebar
                                                         style="height: 434px;">
                                                        <div
                                                            class="media pb-3 align-items-center justify-content-between">
                                                            <div
                                                                class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-primary text-white">
                                                                <i
                                                                    class="mdi mdi-cart-outline font-size-20"></i>
                                                            </div>
                                                            <div class="media-body pr-3 ">
                                                                <a class="mt-0 mb-1 font-size-15 text-dark"
                                                                   href="#">New Order</a>
                                                                <p>Selena has placed an new order</p>
                                                            </div>
                                                            <span class=" font-size-12 d-inline-block"><i
                                                                    class="mdi mdi-clock-outline"></i> 10
																		AM</span>
                                                        </div>

                                                        <div
                                                            class="media py-3 align-items-center justify-content-between">
                                                            <div
                                                                class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-success text-white">
                                                                <i
                                                                    class="mdi mdi-email-outline font-size-20"></i>
                                                            </div>
                                                            <div class="media-body pr-3">
                                                                <a class="mt-0 mb-1 font-size-15 text-dark"
                                                                   href="#">New Enquiry</a>
                                                                <p>Phileine has placed an new order</p>
                                                            </div>
                                                            <span class=" font-size-12 d-inline-block"><i
                                                                    class="mdi mdi-clock-outline"></i> 9
																		AM</span>
                                                        </div>


                                                        <div
                                                            class="media py-3 align-items-center justify-content-between">
                                                            <div
                                                                class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-warning text-white">
                                                                <i
                                                                    class="mdi mdi-stack-exchange font-size-20"></i>
                                                            </div>
                                                            <div class="media-body pr-3">
                                                                <a class="mt-0 mb-1 font-size-15 text-dark"
                                                                   href="#">Support Ticket</a>
                                                                <p>Emma has placed an new order</p>
                                                            </div>
                                                            <span class=" font-size-12 d-inline-block"><i
                                                                    class="mdi mdi-clock-outline"></i> 10
																		AM</span>
                                                        </div>

                                                        <div
                                                            class="media py-3 align-items-center justify-content-between">
                                                            <div
                                                                class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-primary text-white">
                                                                <i
                                                                    class="mdi mdi-cart-outline font-size-20"></i>
                                                            </div>
                                                            <div class="media-body pr-3">
                                                                <a class="mt-0 mb-1 font-size-15 text-dark"
                                                                   href="#">New order</a>
                                                                <p>Ryan has placed an new order</p>
                                                            </div>
                                                            <span class=" font-size-12 d-inline-block"><i
                                                                    class="mdi mdi-clock-outline"></i> 10
																		AM</span>
                                                        </div>

                                                        <div
                                                            class="media py-3 align-items-center justify-content-between">
                                                            <div
                                                                class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-info text-white">
                                                                <i
                                                                    class="mdi mdi-calendar-blank font-size-20"></i>
                                                            </div>
                                                            <div class="media-body pr-3">
                                                                <a class="mt-0 mb-1 font-size-15 text-dark"
                                                                   href="">Comapny Meetup</a>
                                                                <p>Phileine has placed an new order</p>
                                                            </div>
                                                            <span class=" font-size-12 d-inline-block"><i
                                                                    class="mdi mdi-clock-outline"></i> 10
																		AM</span>
                                                        </div>

                                                        <div
                                                            class="media py-3 align-items-center justify-content-between">
                                                            <div
                                                                class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-warning text-white">
                                                                <i
                                                                    class="mdi mdi-stack-exchange font-size-20"></i>
                                                            </div>
                                                            <div class="media-body pr-3">
                                                                <a class="mt-0 mb-1 font-size-15 text-dark"
                                                                   href="#">Support Ticket</a>
                                                                <p>Emma has placed an new order</p>
                                                            </div>
                                                            <span class=" font-size-12 d-inline-block"><i
                                                                    class="mdi mdi-clock-outline"></i> 10
																		AM</span>
                                                        </div>

                                                        <div
                                                            class="media py-3 align-items-center justify-content-between">
                                                            <div
                                                                class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-success text-white">
                                                                <i
                                                                    class="mdi mdi-email-outline font-size-20"></i>
                                                            </div>
                                                            <div class="media-body pr-3">
                                                                <a class="mt-0 mb-1 font-size-15 text-dark"
                                                                   href="#">New Enquiry</a>
                                                                <p>Phileine has placed an new order</p>
                                                            </div>
                                                            <span class=" font-size-12 d-inline-block"><i
                                                                    class="mdi mdi-clock-outline"></i> 9
																		AM</span>
                                                        </div>

                                                    </div>
                                                    <div class="mt-3"></div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="permissions" role="tabpanel" aria-labelledby="permissions-tab">
                                    <div class="tab-widget mt-5">
                                        <div class="row">
                                            <div class="row mb-2">
                                                <!-- User Management Permissions -->
                                                <div class="col-lg-6 permission-section" id="UserManagement_permissions">
                                                    <label class="permission_name">User Management</label>
                                                    <div class="checkbox_group mb-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input select-all" type="checkbox" id="select_all_UserManagement">
                                                            <label class="form-check-label" for="select_all_UserManagement">Select All</label>
                                                        </div>
                                                        @foreach(['view_users' => 'View user list', 'create_user' => 'Create a new user', 'edit_user' => 'Edit user profiles', 'delete_user' => 'Delete or deactivate users', 'reset_password' => 'Recover user passwords', 'manage_roles' => 'Set user roles and permissions'] as $permission => $label)
                                                            <div class="form-check">
                                                                <input
                                                                    id="{{ $permission }}"
                                                                    class="form-check-input"
                                                                    type="checkbox"
                                                                    name="permissions[UserManagement][{{ $permission }}]"
                                                                    value="{{ $permission }}"
                                                                    {{ in_array($permission, $permissions) ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="{{ $permission }}">{{ $label }}</label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>

                                                <!-- Product Management Permissions -->
                                                <div class="col-lg-6 permission-section" id="ProductManagement_permissions">
                                                    <label class="permission_name">Product Management</label>
                                                    <div class="checkbox_group mb-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input select-all" type="checkbox" id="select_all_ProductManagement">
                                                            <label class="form-check-label" for="select_all_ProductManagement">Select All</label>
                                                        </div>
                                                        @foreach(['view_product' => 'View product list', 'create_product' => 'Add new product', 'edit_product' => 'Edit product details', 'delete_product' => 'Delete product', 'product_category' => 'Manage product categories', 'product_inventory' => 'Manage product inventory', 'product_pricing' => 'Manage product pricing', 'product_reviews' => 'Manage product reviews', 'public_product' => 'Publish/unpublish product', 'product_tags' => 'Manage product tags', 'product_SEO' => 'Manage product SEO', 'product_analytics' => 'View product analytics'] as $permission => $label)
                                                            <div class="form-check">
                                                                <input
                                                                    id="{{ $permission }}"
                                                                    class="form-check-input"
                                                                    type="checkbox"
                                                                    name="permissions[ProductManagement][{{ $permission }}]"
                                                                    value="{{ $permission }}"
                                                                    {{ in_array($permission, $permissions) ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="{{ $permission }}">{{ $label }}</label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="d-flex justify-content-end mt-5">
                                                <button type="submit"
                                                        class="btn btn-primary mb-2 btn-pill">Update
                                                    Permissions
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div> <!-- End Content -->
    </div>
@endsection
