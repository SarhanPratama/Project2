@extends('welcome3')

@section('content')
          <!-- PAGE INNER
            ================================================== -->
            <div class="page-inner">

                <!-- PAGE MAIN WRAPPER
                ================================================== -->
                <div id="main-wrapper">

                    <!-- row -->
                    <div class="row align-items-center g-3 grid-margin">
                        <div class="col-12">
                            <div class="card card-white">
                                <div class="card-body row align-items-center">
                                    <div class="col-12 col-md-4">
                                        <h4 class="mb-4 mb-md-0">Staff Members</h4>
                                    </div>

                                    <div class="col-12 col-md-8">
                                        <div class="row">
                                            <div class="col-md-3 mb-3 mb-md-0">
                                                <select class="form-control form-select">
                                                    <option>Role</option>
                                                    <option>Admin</option>
                                                    <option>Manager</option>
                                                    <option>Member</option>
                                                    <option>Delivery boy</option>
                                                </select>
                                            </div>

                                            <div class="col-md-6 mb-3 mb-md-0">
                                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="exampleInputEmail1" placeholder="search by name" />
                                            </div>

                                            <div class="col-md-3">
                                                <a href="#" class="btn btn-primary">Add Members</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <!-- row -->
                    <div class="row">
                        <div class="col-12 grid-margin">
                            <div class="card card-white">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Contact</th>
                                                    <th scope="col">Joining Date</th>
                                                    <th scope="col">Role</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>Judith Thornhill</td>
                                                    <td>judith@domain.com</td>
                                                    <td>715-371-3507</td>
                                                    <td>01 Jan 2022</td>
                                                    <td>Admin</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">2</th>
                                                    <td>Anthony Brink</td>
                                                    <td>anthony@domain.com</td>
                                                    <td>222-134-749</td>
                                                    <td>20 May 2019</td>
                                                    <td>Manager</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">3</th>
                                                    <td>Amanda Carlson</td>
                                                    <td>amanda@domain.com</td>
                                                    <td>123-456-789</td>
                                                    <td>15 Jun 2018</td>
                                                    <td>Member</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">4</th>
                                                    <td>Betty Holtzman</td>
                                                    <td>betty@domain.com</td>
                                                    <td>168-786-742</td>
                                                    <td>01 Mar 2022</td>
                                                    <td>Belivery Boy</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">5</th>
                                                    <td>Edward Garvan</td>
                                                    <td>edward@domain.com</td>
                                                    <td>324-576-758</td>
                                                    <td>02 Feb 2015</td>
                                                    <td>Admin</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">6</th>
                                                    <td>Claudia Carson</td>
                                                    <td>claudia@domain.com</td>
                                                    <td>329-578-607</td>
                                                    <td>10 Apr 2021</td>
                                                    <td>Delivery Boy</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">7</th>
                                                    <td>Lola Sandes</td>
                                                    <td>lola@domain.com</td>
                                                    <td>402-953-895</td>
                                                    <td>20 Nov 2013</td>
                                                    <td>Manager</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">8</th>
                                                    <td>Amber Brownlee</td>
                                                    <td>amber@domain.com</td>
                                                    <td>684-862-199</td>
                                                    <td>12 Jun 2017</td>
                                                    <td>Admin</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">9</th>
                                                    <td>Mitchell Corser</td>
                                                    <td>mitchell@domain.com</td>
                                                    <td>111-222-333</td>
                                                    <td>01 Sep 2019</td>
                                                    <td>Member</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">10</th>
                                                    <td>Nate Dendy</td>
                                                    <td>nate@domain.com</td>
                                                    <td>465-444-231</td>
                                                    <td>25 Oct 2022</td>
                                                    <td>Member</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>

                <div class="page-footer">
                    <p>Copyright &copy; <span class="current-year"></span> Smartshop All rights reserved.</p>
                </div>
            </div>
@endsection
