@extends('dashboard.main')

@section('title')
    <title>Dashboard | Users list</title>
@endsection

@section('contents')
    <div class="ec-content-wrapper users-menu users-list ">
        <div class="content">
            @if(session('message'))
                <div id="success-message" class="floating-message">
                    {{ session('message') }}
                </div>
            @endif
            @if ($errors->any())
                <div id="Failure-message" class="floating-message">
                    User not created
                </div>
            @endif
            <div class="breadcrumb-wrapper breadcrumb-contacts">
                <div>
                    <h1>Users List</h1>
                    <p class="breadcrumbs"><span><a href="{{route('dashboard-index')}}">Home</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>User
                    </p>
                </div>
                <div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUser">
                        Add User
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="ec-vendor-list card card-default">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="responsive-data-table" class="table">
                                    <thead>
                                    <tr>
                                        <th>Profile</th>
                                        <th>Username</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Total Buy</th>
                                        <th>Status</th>
                                        <th>Role</th>
                                        <th>Join On</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($AllUsers as $user)
                                        <tr>
                                            <td><img class="vendor-thumb"
                                                     src="{{ asset('/storage/' . $user->profile) }}"
                                                     alt="user profile"/></td>
                                            <td>{{$user->username}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->phoneNumber}}</td>
                                            <td>{{$user->total_buy}}</td>
                                            <td>{{$user->status}}</td>
                                            <td>{{$user->role}}</td>
                                            <td>{{$user->created_at}}</td>
                                            <td>
                                                <div class="btn-group mb-1">
                                                    <button type="button"
                                                            class="btn btn-outline-success">Info
                                                    </button>
                                                    <button type="button"
                                                            class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false" data-display="static">
                                                        <span class="sr-only">Info</span>
                                                    </button>

                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">Edit</a>
                                                        <a class="dropdown-item"
                                                           href="{{ route('dashboard-user_list-deleteUser', $user->id) }}">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add User Modal  -->
            <div class="modal fade modal-add-contact" id="addUser" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <form action="{{route('dashboard-user_list-addUser')}}" method="post" id="adduser_form"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header px-4">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Add New User</h5>
                            </div>

                            <div class="modal-body px-4">
                                <div class="form-group row mb-6">
                                    <label for="coverImage" class="col-sm-4 col-lg-2 col-form-label">User
                                        Profile</label>
                                    <div class="col-sm-8 col-lg-10">
                                        <div class="custom-file mb-1">
                                            <input type="file" name="profile" class="custom-file-input" id="coverImage">
                                            <label class="custom-file-label" for="coverImage">Choose image...</label>
                                            <div class="invalid-feedback">Example invalid custom file feedback</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" name="username" class="form-control" id="username" value="{{ old('username') }}" placeholder="john" required>
                                            @error('username')
                                            <div class="message_alert_form">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" placeholder="Deo">
                                            @error('name')
                                            <div class="message_alert_form">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" placeholder="DeoExample@gmail.com">
                                            @error('email')
                                            <div class="message_alert_form">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label for="phoneNumber">Phone number</label>
                                            <input type="text" name="phoneNumber" class="form-control" id="phoneNumber" value="{{ old('phoneNumber') }}" placeholder="09111111111">
                                            @error('phoneNumber')
                                            <div class="message_alert_form">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label for="status">Status</label>
                                            <select class="form-control user-status" id="status" name="status">
                                                <option value="active">Active</option>
                                                <option value="inactive">Inactive</option>
                                                <option value="pending">Pending</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label for="status">Role</label>
                                            <select class="form-control user-role" id="role" name="role">
                                                <option value="customer">Customer</option>
                                                <option value="seller">Seller</option>
                                                <option value="admin">Admin</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" class="form-control" id="password">
                                            @error('password')
                                            <div class="message_alert_form">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <!-- User Management Permissions -->
                                    <div class="col-lg-6 permission-section" id="UserManagement_permissions" style="display: none;">
                                        <label class="permission_name">User Management</label>
                                        <div class="checkbox_group mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input select-all" type="checkbox" id="select_all_UserManagement">
                                                <label class="form-check-label" for="select_all_UserManagement">Select All</label>
                                            </div>
                                            @foreach(['view_users' => 'View user list', 'create_user' => 'Create a new user', 'edit_user' => 'Edit user profiles', 'delete_user' => 'Delete or deactivate users', 'reset_password' => 'Recover user passwords', 'manage_roles' => 'Set user roles and permissions'] as $permission => $label)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="permissions[UserManagement][{{ $permission }}]" value="{{ $permission }}" id="{{ $permission }}">
                                                    <label class="form-check-label" for="{{ $permission }}">{{ $label }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <!-- Product Management Permissions -->
                                    <div class="col-lg-6 permission-section" id="ProductManagement_permissions" style="display: none;">
                                        <label class="permission_name">Product Management</label>
                                        <div class="checkbox_group mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input select-all" type="checkbox" id="select_all_ProductManagement">
                                                <label class="form-check-label" for="select_all_ProductManagement">Select All</label>
                                            </div>
                                            @foreach(['view_product' => 'View product list', 'create_product' => 'Add new product', 'edit_product' => 'Edit product details', 'delete_product' => 'Delete product', 'product_category' => 'Manage product categories', 'product_inventory' => 'Manage product inventory', 'product_pricing' => 'Manage product pricing', 'product_reviews' => 'Manage product reviews', 'public_product' => 'Publish/unpublish product', 'product_tags' => 'Manage product tags', 'product_SEO' => 'Manage product SEO', 'product_analytics' => 'View product analytics'] as $permission => $label)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="permissions[ProductManagement][{{ $permission }}]" value="{{ $permission }}" id="{{ $permission }}">
                                                    <label class="form-check-label" for="{{ $permission }}">{{ $label }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                </div>

                            <div class="modal-footer px-4">
                                <button type="button" class="btn btn-secondary btn-pill" data-bs-dismiss="modal">
                                    Cancel
                                </button>
                                <button type="submit" class="btn btn-primary btn-pill">Save Contact</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- End Add User Modal -->
        </div> <!-- End Content -->
    </div>
@endsection
