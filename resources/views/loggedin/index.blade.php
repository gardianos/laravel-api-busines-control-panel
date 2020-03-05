@extends('layouts.default')

@section('maincontent')
<div class="row">

    <div class="col-sm-2 box-shadow-grey no-margin-padding">

        <div class="row">
            <div class="col-sm-12 extra-padding-25">
                
                <h5>Business Control Panel</h5>
                <hr/>

                <nav>
                    <div class="nav flex-column nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-one-tab" data-toggle="tab" href="#nav-one" role="tab" aria-controls="nav-one" aria-selected="true">Dashboard</a>
                    <a class="nav-item nav-link" id="nav-two-tab" data-toggle="tab" href="#nav-two" role="tab" aria-controls="nav-two" aria-selected="false">Customer Support</a>
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </nav>
            </div><!-- end of sub col -->
        </div><!-- sub row -->
        <br/>
        <br/>
        
        <div class="row">
            <div class="col-sm-12 extra-padding-25">
                <h5>Modules</h5>
                <hr/>
                <nav>
                    <div class="nav flex-column nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link" id="nav-five-tab" data-toggle="tab" href="#nav-five" role="tab" aria-controls="nav-five" aria-selected="true">K-Inventory</a>
                    <a class="nav-item nav-link" id="nav-six-tab" data-toggle="tab" href="#nav-six" role="tab" aria-controls="nav-six" aria-selected="false">K-Clients</a>
                    <a class="nav-item nav-link" id="nav-seven-tab" data-toggle="tab" href="#nav-seven" role="tab" aria-controls="nav-seven" aria-selected="false">K-Suppliers</a>
                    <a class="nav-item nav-link" id="nav-eight-tab" data-toggle="tab" href="#nav-eight" role="tab" aria-controls="nav-eight" aria-selected="false">K-Assistant</a>
                    <a class="nav-item nav-link" id="nav-nine-tab" data-toggle="tab" href="#nav-nine" role="tab" aria-controls="nav-nine" aria-selected="false">K-POS</a>
                    </div>
                </nav>
            </div><!-- end of sub col-->
        </div><!-- sub row -->
        <br/>
        <br/>
        
        <div class="row">
            <div class="col-sm-12 extra-padding-25">
                <h5>Contact us</h5>
                <hr/>

                <div class="extra-padding-10">
                    <p>Gardian Memeti</p>
                    <p>gardianmemeti@gmail.com</p>
                </div>
            </div><!-- end of sub col-->
        </div><!-- sub row -->

    </div><!-- sidebar col/ left col -->

    <div class="col-sm-8 extra-padding-25">

        <div class="tab-content" id="nav-tabContent">

            <div class="tab-pane fade show active" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab">
                <div class="row">
                    <div class="col-sm-12">
                        <h5 class="text-center font-italic">Dashboard</h5>

                        @if(Auth::user()->init != 0)
                        <div class="row extra-padding-25">
                            <div class="col-sm-12  box-border-top">
                                <h5>K-Inventory</h5>
                                <hr/>
                                <p>Inventory Module</p>
                                <input class="form-control" placeholder="add an item" id="add-item-inventory"/>
                                <br/>
                                <button type="button" class="btn btn-primary">Add Inventory</button>
                            </div><!-- sub col end -->

                            <div class="col-sm-12  box-border-top">
                                <h5>K-Clients</h5>
                                <hr/>
                                <p>Client Module.</p>
                                <input class="form-control" placeholder="add an item" id="add-item-inventory"/>
                                <br/>
                                <button type="button" class="btn btn-primary">Add Client</button>
                            </div><!-- sub col end -->
                        </div><!-- end of subrow -->

                        <div class="row extra-padding-25">
                            <div class="col-sm-12 box-border-top">
                                <h5>K-Suppliers</h5>
                                <hr/>
                                <p>.</p>
                            </div>
                        </div><!-- end of subrow -->

                        <div class="row extra-padding-25">
                                <div class="col-sm-12 box-border-top">
                                    <h5>K-Assistant</h5>
                                    <hr/>
                                    <p></p>
                                </div>
                        </div><!-- end of subrow -->
                        @else

                        <div class="row my-5">
                            <div class="col-sm-4 extra-padding-25 box-border-top-warning text-center mx-auto my-5">
                                <a href="{{route('init', ['id' => Auth::user()->id ])}}" class="btn btn-primary extra-padding-15">Click to initialize your BCP.</a>
                            </div>
                        </div>

                        @endif

                    </div><!-- main col - tab one -->
                </div><!-- main row - tab one -->
            </div><!-- tab one end -->

            <div class="tab-pane fade" id="nav-two" role="tabpanel" aria-labelledby="nav-two-tab">test1</div><!--tab two end -->

            <div class="tab-pane fade" id="nav-five" role="tabpanel" aria-labelledby="nav-five-tab">
                <div class="row">
                    <div class="col-sm-12 extra-padding-25">

                        <!-- Create category modal -->
                        <div class="modal fade" id="createCategoryModal" tabindex="-1" role="dialog" aria-labelledby="createCategoryModalTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="createCategoryModalCenterTitle">Add a new category</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-12 extra-padding-25" id="new-category-message">

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 extra-padding-25">
                                                <div class="d-none" id="user-id">{{Auth::user()->id}}</div>
                                                <input type="text" class="form-control" id="new-category-name" name="new-category-name" placeholder="new category name" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-primary" id="btn-new-category">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Add article modal -->
                        <div class="modal fade" id="addArticleModal" tabindex="-1" role="dialog" aria-labelledby="addArticleModalTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addArticleModalCenterTitle">Add a new article</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-12 extra-padding-25" id="new-article-message">

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="d-none" id="user-id">{{Auth::user()->id}}</div>
                                            <div class="col-sm-12 extra-padding-25">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <p>Article name:</p>
                                                        <input type="text" class="form-control" id="new-article-name" name="new-article-name" placeholder="new article name" />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p>Article price:</p>
                                                        <input type="number" class="form-control" id="new-article-price" name="new-article-price" placeholder="price" step="0.1"/>
                                                    </div>
                                                </div><!-- sub row -->
                                                <br/>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <p>Article barcode:</p>
                                                        <input type="text" class="form-control" id="new-article-barcode" name="new-article-barcode" placeholder="new article barcode" />
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <p>Article quantity</p>
                                                        <input type="number" class="form-control" id="new-article-quantity" name="new-article-quantity" placeholder="new article quantity" />
                                                    </div>
                                                </div><!--- sub row -->
                                                <br/>
                                                <div class="row">
                                                    <div class="col-sm-12" id="article-category-div">
                                                        <select class="form-control" id="article-category-select">

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-primary" id="btn-new-article">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- edit article modal -->
                        <div class="modal fade" id="editArticleModal" tabindex="-1" role="dialog" aria-labelledby="editArticleModalTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editArticleModalCenterTitle">Select article</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                        <input type="hidden" id="edit-article-id" />
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-12" id="article-edit-item-div">
                                                <select class="form-control" id="article-edit-item-select">

                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12 extra-padding-25" id="edit-article-message">

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="d-none" id="user-id">{{Auth::user()->id}}</div>
                                            <div class="col-sm-12 extra-padding-25">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <p>Article name:</p>
                                                        <input type="text" class="form-control" id="edit-article-name" name="edit-article-name" placeholder="new article name" />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p>Article price:</p>
                                                        <input type="number" class="form-control" id="edit-article-price" name="edit-article-price" placeholder="price" step="0.1"/>
                                                    </div>
                                                </div><!-- sub row -->
                                                <br/>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <p>Article barcode:</p>
                                                        <input type="text" class="form-control" id="edit-article-barcode" name="edit-article-barcode" placeholder="new article barcode" />
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <p>Article quantity</p>
                                                        <input type="number" class="form-control" id="edit-article-quantity" name="edit-article-quantity" placeholder="new article quantity" />
                                                    </div>
                                                </div><!--- sub row -->
                                                <br/>
                                                <div class="row">
                                                    <div class="col-sm-12" id="article-category-div">
                                                        <select class="form-control" id="article-edit-category-select">

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-primary" id="btn-edit-article-new">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 box-border-top extra-padding-25">
                                <h3>Inventory list</h3>
                                <hr/>
                                <ul class="list-inline" id="inventory-category-list">

                                </ul>
                                <br/>
                                <div class="row">
                                    <div class="col-sm-12 overflow-y-scroll-500">
                                        <input type="text" class="form-control" id="search-inventory-article" placeholder="search an article.." />
                                        <hr/>
                                        <ul class="list-group" id="inventory-article-list">
                                                                                 
                                        </ul>
                                    </div><!-- ul col 1 -->
                                </div><!-- end of sub row ul -->
                            
                            </div><!-- end of sub col-->
                        </div><!-- end of sub row-->

                        <div class="row">
                            <div class="col-sm-4 extra-padding-25 box-border-bottom text-center">
                                <button type="button" class="btn btn-primary extra-padding-25" data-toggle="modal" data-target="#createCategoryModal">Create category</button>
                            </div><!-- end of sub col 1 -->

                            <div class="col-sm-4 extra-padding-25 box-border-bottom text-center">
                                <button type="button" class="btn btn-primary extra-padding-25" data-toggle="modal" data-target="#addArticleModal" id="btn-add-article">Add article</button>
                            </div><!-- end of sub col 2 -->

                            <div class="col-sm-4 extra-padding-25 box-border-bottom text-center">
                                <button type="button" class="btn btn-primary extra-padding-25" data-toggle="modal" data-target="#editArticleModal" id="btn-edit-article">Edit article</button>
                            </div><!-- end of sub col 1 -->
                        </div><!-- end of sub row -->

                    </div><!-- end of sub col -->
                </div><!-- end of sub row -->
            </div><!--tab five end -->
            
            <div class="tab-pane fade" id="nav-six" role="tabpanel" aria-labelledby="nav-six-tab">
            <!-- register client modal -->
            <div class="modal fade" id="registerClientModal" tabindex="-1" role="dialog" aria-labelledby="registerClientModalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="registerClientModalCenterTitle">Register a new client</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-12 extra-padding-25" id="new-client-message">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 extra-padding-25">
                                        <div class="d-none" id="user-id">{{Auth::user()->id}}</div>
                                        <p>Name:</p>
                                        <input type="text" class="form-control" id="new-client-name" name="new-client-name" placeholder="client name" required/>
                                        <br/>
                                        <p>Surname:</p>
                                        <input type="text" class="form-control" id="new-client-surname" name="new-client-surname" placeholder="client surname" required/>
                                        <br/>
                                        <p>Company:</p>
                                        <input type="text" class="form-control" id="new-client-company" name="new-client-company" placeholder="client company" required/>
                                        <br/>
                                        <p>Address:</p>
                                        <input type="text" class="form-control" id="new-client-address" name="new-client-address" placeholder="client address" required/>
                                        <br/>
                                        <p>Phone:</p>
                                        <input type="text" class="form-control" id="new-client-phone" name="new-client-phone" placeholder="client phone" required/>
                                        <br/>
                                        <p>E-mail:</p>
                                        <input type="email" class="form-control" id="new-client-email" name="new-client-email" placeholder="client email" required/>

                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary" id="btn-new-client">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- edit client modal -->
            <div class="modal fade" id="editClientModal" tabindex="-1" role="dialog" aria-labelledby="editClientModalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editClientModalCenterTitle">Editing client</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-12 extra-padding-25" id="edit-client-message">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 extra-padding-25">
                                        <div class="d-none" id="user-id">{{Auth::user()->id}}</div>
                                        <div class="d-none" id="client-id"></div>
                                        <p>Name:</p>
                                        <input type="text" class="form-control" id="edit-client-name" name="edit-client-name" placeholder="client name" required/>
                                        <br/>
                                        <p>Surname:</p>
                                        <input type="text" class="form-control" id="edit-client-surname" name="edit-client-surname" placeholder="client surname" required/>
                                        <br/>
                                        <p>Company:</p>
                                        <input type="text" class="form-control" id="edit-client-company" name="edit-client-company" placeholder="client company" required/>
                                        <br/>
                                        <p>Address:</p>
                                        <input type="text" class="form-control" id="edit-client-address" name="edit-client-address" placeholder="client address" required/>
                                        <br/>
                                        <p>Phone:</p>
                                        <input type="text" class="form-control" id="edit-client-phone" name="edit-client-phone" placeholder="client phone" required/>
                                        <br/>
                                        <p>E-mail:</p>
                                        <input type="email" class="form-control" id="edit-client-email" name="edit-client-email" placeholder="client email" required/>

                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary" id="btn-edit-client">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-5 mx-auto">
                    <div class="col-sm-4 extra-padding-25 box-border-left overflow-y-scroll-760">
                        <h3>Clients list</h3>
                        <hr/>
                        <ul class="list-group text-center" id="clients-list">
                            <li class="list-group-item"><button type="button" class="btn btn-primary">Antoine Montoine</button></li>
                        </ul>
                    </div><!-- end of col 1/ left-->

                    <div class="col-sm-8 box-border-top extra-padding-25">
                        <h3>Client profile</h3>
                        <div class="d-flex justify-content-end">
                            <button type="button" id="btn-test-client" class="btn btn-primary" data-toggle="modal" data-target="#editClientModal">Edit client</button>
                            <button type="button" id="btn-remove-client" class="btn btn-danger">Remove client</button>
                        </div>
                        
                        <hr/>
                        <div class="row">
                            
                            <div class="col-sm-3">
                                <p class="font-italic">Name:</p>
                                <input type="text" class="form-control" id="client-profile-name" placeholder="Client name.." readonly/>
                            </div>
                            <div class="col-sm-3">
                                <p class="font-italic">Surname:</p>
                                <input type="text" class="form-control" id="client-profile-surname" placeholder="Client surname.." readonly/>
                            </div>
                            <div class="col-sm-3">
                                <p class="font-italic">Company:</p>
                                <input type="text" class="form-control" id="client-profile-company" placeholder="Client company.." readonly/>
                            </div>
                            <div class="col-sm-3">
                                <p class="font-italic">Phone:</p>
                                <input type="text" class="form-control" id="client-profile-phone" placeholder="Client phone.." readonly/>
                            </div>
                            <div class="col-sm-3">
                                <p class="font-italic">Address:</p>
                                <input type="text" class="form-control" id="client-profile-address" placeholder="Client address.." readonly/>
                            </div>
                            <div class="col-sm-3">
                                <p class="font-italic">E-mail:</p>
                                <input type="email" class="form-control" id="client-profile-email" placeholder="Client email.." readonly/>
                            </div>
                            <div class="col-sm-3">
                                <p class="font-italic">Total purchases:</p>
                                <input type="number" class="form-control" id="client-profile-purchases" placeholder="Client purchases.." readonly/>
                            </div>

                            <div class="col-sm-12 my-5 box-border-left overflow-y-scroll-250">
                                <h5 class="font-italic font-weight-light">Recent history</h5>
                                <hr/>
                                <ul class="list-group">
                                    <li class="list-group-item">test</li>
                                    <li class="list-group-item">test</li>
                                    <li class="list-group-item">test</li>
                                    <li class="list-group-item">test</li>
                                    <li class="list-group-item">test</li>
                                    <li class="list-group-item">test</li>
                                </ul>
                            </div>


                        </div><!-- profile sub row -->


                    </div><!-- end of col 2/ right-->

                    
                    <div class="col-sm-12 extra-padding-25 box-border-bottom text-center">
                            <button type="button" class="btn btn-primary extra-padding-25" data-toggle="modal" data-target="#registerClientModal">Register a new client</button>
                        </div>

                </div><!-- end of row-->

            </div><!--tab six end -->
            <div class="tab-pane fade" id="nav-seven" role="tabpanel" aria-labelledby="nav-seven-tab">
                <div class="row">
                    <div class="col-sm-12 extra-padding-25">
                        <!-- Register supplier modal -->
                        <div class="modal fade" id="registerSupplierModal" tabindex="-1" role="dialog" aria-labelledby="registerSupplierModalTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="registerSupplierModalCenterTitle">Register a new supplier</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-12 extra-padding-25" id="new-supplier-message">

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 extra-padding-25">
                                                <div class="d-none" id="user-id">{{Auth::user()->id}}</div>
                                                <p>Name:</p>
                                                <input type="text" class="form-control" id="new-supplier-name" name="new-supplier-name" placeholder="new supplier name" />
                                                <br/>
                                                <p>Manager:</p>
                                                <input type="text" class="form-control" id="new-supplier-manager" name="new-supplier-manager" placeholder="new supplier manager" />
                                                <br/>
                                                <p>Phone:</p>
                                                <input type="text" class="form-control" id="new-supplier-phone" name="new-supplier-phone" placeholder="new supplier phone" />
                                                <br/>
                                                <p>Email:</p>
                                                <input type="email" class="form-control" id="new-supplier-email" name="new-supplier-email" placeholder="new supplier email" />
                                                <br/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-primary" id="btn-new-supplier">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-sm-3 extra-padding-25 box-border-top overflow-y-scroll-760">
                                <h5>Suppliers</h5>
                                <hr/>
                                <ul class="list-group" id="suppliers-list">

                                </ul>
                            </div><!-- end of col 1/ left -->

                            <div class="col-sm-7 extra-padding-25 box-border-top overflow-y-scroll-760">
                                <h5>Request supplies</h5>
                                <hr/>
                                <div class="d-flex flex-row justify-content-end">
                                        <button type="button" class="btn btn-primary" id="add-row-supplies">Add row</button>
                                        <button type="button" class="btn btn-danger" id="remove-row-supplies">Remove row</button>
                                </div>
                                <br/>
                                <ul class="list-group" id="supplies-list-items">
                                    <li class="list-group-item">
                                        <div class="d-flex flex-row">
                                            <input type="text" class="form-control " id="request-supplies-name" name="request-supplies-name[]" placeholder="name of item" />
                                            <input type="number" class="form-control" id="request-supplies-quantity" name="request-supplies-quantity[]" placeholder="quantity" />
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="d-flex flex-row">
                                            <input type="text" class="form-control " id="request-supplies-name" name="request-supplies-name[]" placeholder="name of item" />
                                            <input type="number" class="form-control" id="request-supplies-quantity" name="request-supplies-quantity[]" placeholder="quantity" />
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="d-flex flex-row">
                                            <input type="text" class="form-control " id="request-supplies-name" name="request-supplies-name[]" placeholder="name of item" />
                                            <input type="number" class="form-control" id="request-supplies-quantity" name="request-supplies-quantity[]" placeholder="quantity" />
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="d-flex flex-row">
                                            <input type="text" class="form-control " id="request-supplies-name" name="request-supplies-name[]" placeholder="name of item" />
                                            <input type="number" class="form-control" id="request-supplies-quantity" name="request-supplies-quantity[]" placeholder="quantity" />
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="d-flex flex-row">
                                            <input type="text" class="form-control " id="request-supplies-name" name="request-supplies-name[]" placeholder="name of item" />
                                            <input type="number" class="form-control" id="request-supplies-quantity" name="request-supplies-quantity[]" placeholder="quantity" />
                                        </div>
                                    </li>
                                    <li class="list-group-item last-li" id="#last-li">
                                        <div class="d-flex flex-row">
                                            <input type="text" class="form-control " id="request-supplies-name" name="request-supplies-name[]" placeholder="name of item" />
                                            <input type="number" class="form-control" id="request-supplies-quantity" name="request-supplies-quantity[]" placeholder="quantity" />
                                        </div>
                                    </li>
                                    <li class="list-group-item text-center">
                                         <input type="number" class="form-control" id="request-supplies-total" name="request-supplies-total" placeholder="total cost.." readonly/>
                                    </li>
                                    <li class="list-group-item text-center">
                                         <button type="submit" class="btn btn-primary">Request supplies!</button>
                                    </li>
                                </ul>
                            </div><!-- end of col 2/ middle -->

                            <div class="col-sm-2 extra-padding-25 box-border-right">
                                <h5 class="d-flex justify-content-end">Profile</h5>
                                <hr/>

                                <p class="font-italic">Name:</p>
                                <p id="profile-supplier-name">Coca &amp; Cola</p>

                                <p class="font-italic">Target manager:</p>
                                <p id="profile-supplier-manager">Gazmend Rexhepi</p>

                                <p class="font-italic">Phone:</p>
                                <p id="profile-supplier-phone">+1 234 567 890</p>

                                <p class="font-italic">Email:</p>
                                <p id="profile-supplier-email">email@email.com</p>


                                

                            </div><!-- end of col 3/ right -->

                        </div><!-- end of sub row -->

                        <div class="row">
                            <div class="col-sm-12 extra-padding-25 box-border-bottom text-center">
                                <button type="button" class="btn btn-primary extra-padding-25" data-toggle="modal" data-target="#registerSupplierModal">Register a supplier</button>
                            </div>
                        </div>

                    </div><!-- end of col -->
                </div><!-- end of row -->

            </div><!--tab seven end -->
            <div class="tab-pane fade" id="nav-eight" role="tabpanel" aria-labelledby="nav-eight-tab">
                <div class="row">

                    @if(Auth::user()->init != 0)
                    <div class="col-sm-12 extra-padding-25">
                        @foreach($debts as $debt)
                        <!-- modals -->
                        <div class="modal fade" id="{{$debt->name}}-DebtModal" tabindex="-1" role="dialog" aria-labelledby="{{$debt->name}}DebtModalTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="{{$debt->name}}DebtModalCenterTitle">Debt report for {{$debt->name}} {{$debt->surname}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                           <div class="row">
                                               <div class="col-sm-12 extra-padding-10">
                                                    <h5 class="text-center">Total amount in debt</h5>
                                                    <hr/>
                                                    <h5 class="text-center">{{$debt->debt}}$</h5>
                                               </div>
                                               <div class="col-sm-12 extra-padding-10">
                                                    <h5 class="text-center">Due date</h5>
                                                    <hr/>
                                                    <h5 class="text-center">{{$debt->duedate}}</h5>
                                               </div>
                                           </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <button type="button" class="btn btn-primary" disabled>Mark as paid</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    <div class="row">

                        <div class="col-sm-12 box-border-top">
                            <h5>Client Debts</h5>
                            <hr/>
                            <ul class="list-inline">
                                @foreach($debts as $debt)
                            <li class="list-inline-item"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{$debt->name}}-DebtModal">{{$name = $debt->name[0]}}</button></li>
                                @endforeach
                                
                            </ul>

                            <div class="row">
                                <form action="{{route('add-debt')}}" method="post" class="form-inline extra-padding-10">
                                    @csrf

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="debt_name" placeholder="clients name"/>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="debt_surname" placeholder="clients surname"/>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="debt_phone" placeholder="clients phone"/>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="debt_amount" placeholder="clients debt" />
                                    </div>
                                    <div class="form-group">
                                        <input type="date" class="form-control" name="debt_duedate"/>
                                    </div>
                                    <br/>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div><!-- sub row -->

                        </div><!-- sub col -->
                    </div><!-- sub row -->

                </div><!-- main col end-->
                    @endif
                </div><!-- main row end -->

                <div class="row">
                    <div class="col-sm-6 extra-padding-25 box-border-left overflow-y-scroll-760">
                        <div class="d-flex flex-row justify-content-start">
                            <h5>Send goods</h5>
                            
                        </div>
                        <hr/>
                        <div class="d-flex flex-row justify-content-end">
                                <button type="button" class="btn btn-primary" id="send-goods-add-row">Add row</button>
                                <button type="button" class="btn btn-danger" id="send-goods-remove-row">Remove row</button>
                        </div>
                        <br/>

                        <form action="{{route('send-goods')}}" method="post">

                            @csrf

                            <div class="form-row ">
                                <table class="table-responsive" id="send-goods-table">
                                    <div class="table table-primary ">
                                        <tbody id="send-goods-table-body">
                                            <tr>
                                                Name:
                                                <td colspan="2"><input type="text" class="form-control" name="send_goods_client_name" id="send-goods-name" placeholder="enter the name where to"/></td>
                                            </tr>
                                            @for($i = 0; $i < 6; $i++)
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" name="send_goods_name[]" placeholder="name of the item" />
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="send_goods_quantity[]" placeholder="quantity" />
                                                </td>
                                            </tr>
                                            @endfor
                                        </tbody>
                                        
                                        <tr>
                                            <td>
                                                <button type="submit" class="btn btn-primary">Send goods</button>
                                            </td>
                                        </tr>
                                    </div>
                                </table>
                            </div>
                        </form>
                    </div><!-- sub col end -->

                    <div class="col-sm-6 extra-padding-25 box-border-right overflow-y-scroll-760">
                        <h3>Billing</h3>
                        <hr/>
                        <p class="font-italic">Recent activity</p>
                        <ul class="list-group">
                            
                            @if(Auth::user()->init != 0)
                            @foreach($receipts as $receipt)
                            <li class="list-group-item">{{$receipt->client_id}} with ID: {{$receipt->receipt_id}}</li>
                            @endforeach
                            @endif
                        </ul>
                    </div><!-- sub col end-->
                </div><!-- sub row end-->
                
            </div><!--tab eight end -->
            <div class="tab-pane fade" id="nav-nine" role="tabpanel" aria-labelledby="nav-nine-tab">
                <div class="row my-5">
                    <div class="col-sm-12 extra-padding-25 box-border-right">
                    <h5 class="d-flex justify-content-end">POS</h5>
                    <hr/>

                    <div class="row">
                        <div class="col-sm-8 overflow-y-scroll-500">
                            <input type="text" class="form-control" id="search-inventory-article" placeholder="search an article.." id="pos-search-field"/>
                            <hr/>
                            <ul class="list-group" id="pos-inventory-list">
                                @if(Auth::user()->init != 0)
                                @foreach($articles as $article)
                                <li class="list-group-item" onclick="sendToCart({{$article->id}})">{{$article->name}}<div class="d-flex justify-content-end"><p class="text-success p-2">{{$article->quantity}}</p></div></li>
                                @endforeach
                                @endif
                            </ul>
                        </div><!-- inventory list  -->

                        <div class="col-sm-4 overflow-y-scroll-500">
                            <form action="{{route('shopping-cart')}}" method="post">
                                @csrf

                                <div class="form-row">
                                    <div class="table-responsive">
                                        <table class="table table-primary" id="post-cart-table">
                                            <tbody id="pos-cart-table-body">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <hr/>
                                    <input type="number" class="form-control" id="pos-total-amount" name="pos-total-amount" placeholder="total amount" readonly/>
                                </div>

                                <div class="form-row">
                                    <div class="col-sm-12 box-border-bottom extra-padding-25 text-center">
                                        <button type="submit" class="btn btn-primary extra-padding-25">Print</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div><!-- end of sub row ul -->
                    </div>
                    </div><!-- main col end -->


                </div><!-- main row end-->

            </div><!--tab nine end -->
        </div>

    </div><!-- main content col/ right col -->

</div><!-- end of main row -->
@endsection

@section('customscripts')
<script src="{{asset('js/dbcomm/baseCommunication.js')}}"></script>
<script src="{{asset('js/dbcomm/clientsCommunication.js')}}"></script>
<script src="{{asset('js/dbcomm/suppliersCommunication.js')}}"></script>
<script src="{{asset('js/dbcomm/assistantCommunication.js')}}"></script>
@endsection