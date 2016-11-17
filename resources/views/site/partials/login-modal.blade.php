<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><img src="{{  URL::to('assets/images/close.png')  }}" alt="close"></span></button>
        <ul class="login-form">
        	<li class="active"><a href="#">Login</a></li>
            <li><a href="#">Sign up</a></li>
        </ul>
        <!--login-form-->        
      </div>
      <!--modal-header-->
      
      <div class="modal-body">
      	<form id="login-form" class="form-horizontal block-form">
          <div class="form-group">
            
            <input type="text" class="form-control"  placeholder="Phone or Email">
            <div class="help-block"></div>
          </div>
          <!--form-group-->
          
          <div class="form-group">
           
            <input type="password" class="form-control"  placeholder="Password">
            <div class="help-block"></div>
          </div>
          <!--form-group-->
          
          <div class="form-group remember-me">
           
               <div class="checkbox">
                <label>
                  <input type="checkbox"> <span>Remember me</span>
                </label>
                
                <a href="#" class="forgot">Forgot password?</a>
              </div>
              <!--checkbox-->
          </div>
          <!--form-group-->
                             
          
          
          <button type="submit" class="btn btn-yellow">Login</button>
         
        </form>    		       
      </div>
      <!--modal-body-->
      
      <div class="modal-footer">
      	<p>Not a member yet? <a href="#" class="sign-up">Sign up</a></p>     
      </div>
      <!--modal-footer-->
      
    </div>
    <!--modal-content-->
  </div>
  <!--modal-dialog-->
</div>
<!--modal-->