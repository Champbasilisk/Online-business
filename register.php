<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>occasion watch</title>
    <link rel="stylesheet" href="fonts/font-awesome-4.4.0/css/font-awesome.min.css" type="text/css" />
    <link href="datepicker/css/datepicker.css" rel="stylesheet" media="screen">
</head>
<body>
<form class="form-horizontal my-form" id="form-register">
	<div class="form-group">
		<label class="col-sm-2 control-label">Account</label>
		<div class="col-sm-9">
			<div class="form-group">
                <div class="col-sm-12">
                    <div class="form-group"> <!-- nested form-group acting like row -->
                        <div class="col-sm-5">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user-plus fa-fw"></i></span>
                                <input class="form-control" type="text" placeholder="Username" id="user" name="username">
                            </div>
                        </div><!-- /col-sm-5 -->
                        <div class="col-sm-7">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-unlock-alt fa-fw"></i></span>
                                <input class="form-control" type="password" placeholder="Password" id="pass" name="password">
                                </span>
                            </div>
                        </div><!-- /col-sm-5 -->
                    </div> <!-- /nested form-group acting like row -->
                </div><!-- col-sm-9 -->
 			</div><!-- /form-group -->
		</div><!-- /col-sm-9 -->
	</div><!-- /form-group -->
    
    <div class="form-group">
		<label class="col-sm-2 control-label">Name</label>
		<div class="col-sm-9">
			<div class="form-group">
                <div class="col-sm-12">
                    <div class="form-group"> <!-- nested form-group acting like row -->
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                                <input class="form-control" type="text" placeholder="First name" id="firstname" name="firstname">
                            </div>
                        </div><!-- /col-sm-6 -->
                        <div class="col-sm-6">
                              	<input class="form-control" type="text" placeholder="Last name" id="lastname" name="lastname">
                        </div><!-- /col-sm-6 -->
                    </div> <!-- /nested form-group acting like row -->
                </div><!-- col-sm-9 -->
 			</div><!-- /form-group -->
		</div><!-- /col-sm-9 -->
	</div><!-- /form-group --> 
    
    <div class="form-group">
		<label class="col-sm-2 control-label">Gender</label>
		<div class="col-sm-9">
			<div class="form-group">
                <div class="col-sm-12">
                    <div class="form-group"> <!-- nested form-group acting like row -->
                        <div class="col-sm-5">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-venus-mars fa-fw"></i></span>
                                <div class="radio-switch">
                                    <input type="radio" name="sex" value="Male" id="sex_m" class="gender-switch-input" checked>
                                    <label for="sex_m" class="gender-switch-label">Male</label>
                                    <input type="radio" name="sex" value="Female" id="sex_f" class="gender-switch-input">
                                    <label for="sex_f" class="gender-switch-label">Female</label>
                            	</div>
                            </div>
                        </div><!-- /-->
                    	<label class="col-sm-2 control-label" style="padding-right:15px;">Birthday</label>
                        <div class="col-sm-5">
                        	<div class="input-group">
                               <span class="input-group-addon"><i class="fa fa-gift fa-fw"></i></span>
                        	   <input class="form-control" type="text" data-provide="datepicker" data-date-language="th-th" placeholder="DD/MM/YYYY" name="birthday" id="birthday">
                            </div>	
                        </div><!-- /col-sm-6 -->
                    </div> <!-- /nested form-group acting like row -->
                </div><!-- col-sm-9 -->
 			</div><!-- /form-group -->
		</div><!-- /col-sm-9 -->
	</div><!-- /form-group --> 
    
     <!------------------------------------- date picker-------------------------------------->
    <script src="datepicker/js/bootstrap-datepicker.js"></script>
    <script src="datepicker/js/bootstrap-datepicker-thai.js"></script>
    <script src="datepicker/js/locales/bootstrap-datepicker.th.js"></script>

    <script id="example_script"  type="text/javascript">
      function birthday() {
        $('.datepicker').datepicker();
      }
    </script>

    <script type="text/javascript">
      $(function(){
        $('pre[data-source]').each(function(){
          var $this = $(this),
            $source = $($this.data('source'));

          var text = [];
          $source.each(function(){
            var $s = $(this);
            if ($s.attr('type') == 'text/javascript'){
              text.push($s.html().replace(/(\n)*/, ''));
            } else {
              text.push($s.clone().wrap('<div>').parent().html()
                .replace(/(\"(?=[[{]))/g,'\'')
                .replace(/\]\"/g,']\'').replace(/\}\"/g,'\'') // javascript not support lookbehind
                .replace(/\&quot\;/g,'"'));
            }
          });
          $this.text(text.join('\n\n').replace(/\t/g, '    '));
        });
        birthday();
      });
    </script>
     <!------------------------------------- date picker-------------------------------------->
     
     <div class="form-group">
		<label class="col-sm-2 control-label">Contact</label>
		<div class="col-sm-9">
			<div class="form-group">
                <div class="col-sm-12">
                    <div class="form-group"> <!-- nested form-group acting like row -->
                        <div class="col-sm-4">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
                                <input class="form-control" type="text" placeholder="Phone" id="phone" name="phone" maxlength="10">
                            </div>
                        </div><!-- /col-sm-6 -->
                    
                        <div class="col-sm-8">
                        	<div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
                                <input class="form-control" type="email" placeholder="Email" id="email" name="email">
                            </div>
                        </div><!-- /col-sm-6 -->
                    </div> <!-- /nested form-group acting like row -->
                </div><!-- col-sm-9 -->
 			</div><!-- /form-group -->
		</div><!-- /col-sm-9 -->
	</div><!-- /form-group --> 
   
    
	<div class="form-group">
		<label class="col-sm-2 control-label">Address</label>
		<div class="col-sm-9">
			<div class="input-group">
            	<span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
            	<input class="form-control" type="text" placeholder="Address" id="address" name="address">
            </div>
		</div><!-- /col-sm-9 -->
	</div><!-- /form-group -->
    
 	<div class="form-group">
  		<div class="col-sm-offset-2 col-sm-9">
			<div class="form-group"> <!-- nested form-group acting like row -->
    			<div class="col-sm-4">
     				<input type="text" class="form-control" placeholder="Province" id="province" name="province">
    			</div><!-- /col-sm-4 -->
    			<div class="col-sm-2">
     				<input type="text" type="number" min="0" class="form-control" placeholder="Postcode" id="postcode" name="postcode">
    			</div><!-- /col-sm-2 -->
                <div class="col-sm-6"></div><!-- /col-sm-6 -->
   			</div> <!-- /nested form-group acting like row -->
  		</div><!-- /col-sm-offset-3 col-sm-9 -->
 	</div><!-- /form-group -->
    
    <div class="form-group">
		<label class="col-sm-2 control-label">ID Card</label>
		<div class="col-sm-9">
			<div class="input-group">
              <span class="input-group-addon"><i class="fa fa-credit-card fa-fw"></i></span>
              <input class="form-control" type="text" placeholder="ID Card" id="idcard" name="idcard" min="0" maxlength="13">
            </div>
		</div><!-- /col-sm-9 -->
	</div><!-- /form-group -->
      
    <hr class="light">
    <input type="button" class="btn btn-default btn-xl" value="Register" onclick="registerInsert();"/> 
    <!--<a href="#" class="btn btn-default btn-xl">Register</a>-->
    <a href="#page-top" class="page-scroll btn btn-default btn-xl" onclick="hideOnClick()">Cancel</a>
</form>
<!-- Modal -->
  <div class="modal fade" id="statusRegister" role="dialog" data-backdrop="static" data-keyboard="false" style="color:#000;">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="text-transform:uppercase; font-weight:bold;">Register</h4>
        </div>
        <div class="modal-body text-alert" id="showhere">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<!-- Modal -->
</body>
</html>