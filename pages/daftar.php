                            <!-- START WIZARD WITH VALIDATION -->
                            <div class="block">
                                <h4>Wizard with form validation</h4>                                
                                <form action="javascript:alert('Validated!');" role="form" class="form-horizontal" id="wizard-validation">
                                <div class="wizard show-submit wizard-validation">
                                    <ul>
                                        <li>
                                            <a href="#step-7">
                                                <span class="stepNumber">1</span>
                                                <span class="stepDesc">Login<br /><small>Information</small></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#step-8">
                                                <span class="stepNumber">2</span>
                                                <span class="stepDesc">User<br /><small>Personal data</small></span>
                                            </a>
                                        </li>                                    
                                    </ul>

                                    <div id="step-7">   

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Login</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="login" placeholder="Login"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Password</label>
                                            <div class="col-md-10">
                                                <input type="password" class="form-control" name="password" placeholder="Password" id="password"/>
                                            </div>
                                        </div>             
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Re-Password</label>
                                            <div class="col-md-10">
                                                <input type="password" class="form-control" name="repassword" placeholder="Re-Password"/>
                                            </div>
                                        </div>

                                    </div>

                                    <div id="step-8">

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Name</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="name" placeholder="Name"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">E-mail</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="email" placeholder="Your email"/>
                                            </div>
                                        </div>                                    
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Adress</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="adress" placeholder="Your adress"/>
                                            </div>                                        
                                        </div>                                                     

                                    </div>                                                                                                            
                                </div>
                                </form>
                            </div>                        
                            <!-- END WIZARD WITH VALIDATION -->

