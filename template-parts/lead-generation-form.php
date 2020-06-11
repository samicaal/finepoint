<?php


  $start = isset($atts['start']) ? intval($atts['start']) : 0;

?>
<style>
  .container {
    max-width: 100%;
  }
  .icaal__lead-generation-form { box-shadow: 0 2px 2px 0 rgba(0,0,0,0.16), 0 0 0 1px rgba(0,0,0,0.08); }
  .panel-header { padding: 0.5rem; text-align: center; background-color: #333333; border-bottom: 1px solid #5a5a5a; }
  .panel-header h4 {
    color: white;
  }
  .panel-body { padding: 3rem; }
  .icaal__lead-generation-form .pane:not(.active) { display: none; }
  .icaal__lead-generation-form-check-list { padding-left: 0.5rem; list-style: none }
  .icaal__lead-generation-form-check-list li::before { content: '✓'; margin-right: 0.5rem; color:#5cb85c; }
  .pane-submit {
    cursor: pointer;
    transition: all ease 200ms;
    position: relative;
    background-size: cover !important;
    background-position: center center !important;
    background-repeat: no-repeat !important;
    border-radius: 2px;
    overflow: hidden;
  }
  .pane-submit:hover {
    background-color: #fafafa;
    box-shadow: 0 2px 2px 0 rgba(0,0,0,0.16), 0 0 0 1px rgba(0,0,0,0.08);
  }
  .pane-submit:after {
    content: "";
    padding-bottom: 75%;
    display: block;
  }
  .btn-primary-o { background-color: transparent; }
  .btn-sm {
    font-size: 0.875rem;
    padding: 0.5rem 1rem;
  }
  .btn-block { display: block; width: 100%; }
  .text-xs-center { text-align: center; }
  h5.m-b-1 { margin-top: 0; }
  @media (max-width: 992px) {
    h5.m-b-1 { margin-bottom: 0 !important; }
  }
  .m-b-1 { margin-bottom: 1rem; }
  .m-x-auto { margin-left: auto; margin-right: auto; }
  .p-a-1 { padding: 1rem; }
  .p-y-1 { padding-top: 1rem; padding-bottom: 1rem; }
  .p-y-2 { padding-top: 2rem; padding-bottom: 2rem; }
  .pos-bottom {
    position: absolute;
    left: 0;
    bottom: 0;
    width: 100%;
    text-align: center;
    background: rgba(0,0,0,0.4);
  }
  .pos-bottom h5 {
    color: #fff;
  }

.icaal__lead-generation-form .btn.btn-secondary,
#validate-postcode.btn.btn-secondary {
    border: 2px solid #0eb1ab;
    color: black;
    background-color: #0eb1ab;
    margin-bottom: 0;
    border-radius: 0;
    transition: all .5s;
    -webkit-transition: all .5s;
}

.icaal__lead-generation-form .btn.btn-secondary:hover,
#validate-postcode.btn.btn-secondary:hover {
    background: white;
    outline: none;
}

</style>
<div class="container" style="padding: 2rem 0 4rem 0;">
  <div class="row">
    <div class="col-xs-12">
      <form class="icaal__lead-generation-form mb-3" method="post">
        <div class="pane panel text-xs-center z-depth-1<?php echo $start == 0 ? ' active' : null ?>">
          <div class="card-header panel-header">
            <h4 class="m-b-0">Choose Your Product</h4>
          </div>
          <div class="panel-body p-a-1">
            <div class="row">

               <div class="col-xs-6 col-md-4">
                <div class="pane-submit m-b-1" data-name="category" data-value="Doors" data-image="<?php echo get_stylesheet_directory_uri() ?>/img/doors.jpg" data-pane="1" onclick="ga('send', 'event', 'Quoting Engine', 'Start Quote', 'Lead Generation Form');" style="background: url('<?php echo get_stylesheet_directory_uri() ?>/img/doors.jpg');">
                  <div class="p-y-1 pos-bottom">
                    <h5 class="p-b-1">Doors</h5>
                    <button type="button" class="btn btn-secondary hidden-md-down">Select</button>
                  </div>
                </div>
              </div>

              <div class="col-xs-6 col-md-4">
                <div class="pane-submit m-b-1" data-pane="3" data-name="product" data-value="Windows" data-image="<?php echo get_stylesheet_directory_uri() ?>/img/windows" onclick="ga('send', 'event', 'Quoting Engine', 'Start Quote', 'Lead Generation Form');" style="background: url('<?php echo get_stylesheet_directory_uri() ?>/img/windows.jpg');">
                  <div class="p-y-1 pos-bottom">
                    <h5 class="p-b-1">Windows</h5>
                    <button type="button" class="btn btn-secondary hidden-md-down">Select</button>
                  </div>
                </div>
              </div>

              <div class="col-xs-6 col-md-4">
                <div class="pane-submit m-b-1" data-name="product" data-value="Structural Glazing" data-image="<?php echo get_stylesheet_directory_uri() ?>/img/5.jpg" data-pane="3" onclick="ga('send', 'event', 'Quoting Engine', 'Start Quote', 'Lead Generation Form');" style="background: url('<?php echo get_stylesheet_directory_uri() ?>/img/5.jpg');">
                  <div class="p-y-1 pos-bottom">
                    <h5 class="p-b-1">Structural Glazing</h5>
                    <button type="button" class="btn btn-secondary hidden-md-down">Select</button>
                  </div>
                </div>
              </div>

              <div class="col-xs-6 col-md-4">
                <div class="pane-submit m-b-1" data-name="product" data-value="Rooflights" data-image="<?php echo get_stylesheet_directory_uri() ?>/img/rooflights.jpg" data-pane="3" onclick="ga('send', 'event', 'Quoting Engine', 'Start Quote', 'Lead Generation Form');" style="background: url('<?php echo get_stylesheet_directory_uri() ?>/img/rooflights.jpg');">
                  <div class="p-y-1 pos-bottom">
                    <h5 class="p-b-1">Rooflights</h5>
                    <button type="button" class="btn btn-secondary hidden-md-down">Select</button>
                  </div>
                </div>
              </div>

              <div class="col-xs-6 col-md-4">
                <div class="pane-submit m-b-1" data-name="category" data-value="Glass Products" data-image="<?php echo get_stylesheet_directory_uri() ?>/img/glass.jpg" data-pane="2" onclick="ga('send', 'event', 'Quoting Engine', 'Start Quote', 'Lead Generation Form');" style="background: url('<?php echo get_stylesheet_directory_uri() ?>/img/glass.jpg');">
                  <div class="p-y-1 pos-bottom">
                    <h5 class="p-b-1">Glass Products</h5>
                    <button type="button" class="btn btn-secondary hidden-md-down">Select</button>
                  </div>
                </div>
              </div>

              <div class="col-xs-6 col-md-4">
                <div class="pane-submit m-b-1" data-name="product" data-value="Smart Glass" data-image="<?php echo get_stylesheet_directory_uri() ?>/img/smart-glass.jpg" data-pane="3" onclick="ga('send', 'event', 'Quoting Engine', 'Start Quote', 'Lead Generation Form');" style="background: url('<?php echo get_stylesheet_directory_uri() ?>/img/smart-glass.jpg');">
                  <div class="p-y-1 pos-bottom">
                    <h5 class="p-b-1">Smart Glass</h5>
                    <button type="button" class="btn btn-secondary hidden-md-down">Select</button>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>



        <div class="pane panel text-xs-center z-depth-1<?php echo $start === 1 ? ' active' : null ?>">
          <div class="card-header panel-header">
            <button class="previous-button btn btn-secondary" style="float: left;"><i class="fa fa-angle-left"></i><span style="margin-left: 5px;">Go Back</span></button>
            <h4 class="m-b-0">Choose Door Style</h4>
          </div>
          <div class="panel-body p-a-1">
            <div class="row">
              <div class="col-xs-6 col-md-4">
                <div class="pane-submit m-b-1" data-name="product" style="background: url('<?php echo get_stylesheet_directory_uri() ?>/img/slidingdoors.jpg');" data-value="Sliding Doors" data-pane="3">
                  <div class="p-y-1 pos-bottom">
                    <h5 class="p-b-1">Sliding Doors</h5>
                    <button type="button" class="btn btn-secondary hidden-md-down">Select</button>
                  </div>
                </div>
              </div>
              <div class="col-xs-6 col-md-4">
                <div class="pane-submit m-b-1" data-name="product" style="background: url('<?php echo get_stylesheet_directory_uri() ?>/img/foldingdoors.jpg');" data-value="Folding Doors" data-pane="3">
                  <div class="p-y-1 pos-bottom">
                    <h5 class="p-b-1">Folding Doors</h5>
                    <button type="button" class="btn btn-secondary hidden-md-down">Select</button>
                  </div>
                </div>
              </div>
              <div class="col-xs-6 col-md-4">
                <div class="pane-submit m-b-1" data-name="product" style="background: url('<?php echo get_stylesheet_directory_uri() ?>/img/otherdoors.jpg');" data-value="Other Door Styles" data-pane="3">
                  <div class="p-y-1 pos-bottom">
                    <h5 class="p-b-1">Other Door Styles</h5>
                    <button type="button" class="btn btn-secondary hidden-md-down">Select</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="pane panel text-xs-center z-depth-1">
          <div class="card-header panel-header">
            <button class="previous-button btn btn-secondary" style="float: left;"><i class="fa fa-angle-left"></i><span style="margin-left: 5px;">Go Back</span></button>
            <h4 class="m-b-0">Choose Glass Product</h4>
          </div>
          <div class="panel-body p-a-1">
            <div class="row">
              <div class="col-xs-6 col-md-4">
                <div class="pane-submit m-b-1" data-name="product" style="background: url('<?php echo get_stylesheet_directory_uri() ?>/img/7.jpg');" data-value="Walk on Glass" data-pane="3">
                  <div class="p-y-1 pos-bottom">
                    <h5 class="p-b-1">Walk on Glass</h5>
                    <button type="button" class="btn btn-secondary hidden-md-down">Select</button>
                  </div>
                </div>
              </div>
              <div class="col-xs-6 col-md-4">
                <div class="pane-submit m-b-1" data-name="product" style="background: url('<?php echo get_stylesheet_directory_uri() ?>/img/glass-rooflights.jpg');" data-value="Glass Rooflights" data-pane="3">
                  <div class="p-y-1 pos-bottom">
                    <h5 class="p-b-1">Glass Rooflights</h5>
                    <button type="button" class="btn btn-secondary hidden-md-down">Select</button>
                  </div>
                </div>
              </div>
              <div class="col-xs-6 col-md-4">
                <div class="pane-submit m-b-1" data-name="product" style="background: url('<?php echo get_stylesheet_directory_uri() ?>/img/8.jpg');" data-value="Glass Staircases" data-pane="3">
                  <div class="p-y-1 pos-bottom">
                    <h5 class="p-b-1">Glass Staircases</h5>
                    <button type="button" class="btn btn-secondary hidden-md-down">Select</button>
                  </div>
                </div>
              </div>
              <div class="col-xs-6 col-md-4">
                <div class="pane-submit m-b-1" data-name="product" style="background: url('<?php echo get_stylesheet_directory_uri() ?>/img/glassbalustrades.jpg');" data-value="Glass Balustrades" data-pane="3">
                  <div class="p-y-1 pos-bottom">
                    <h5 class="p-b-1">Glass Balustrades</h5>
                    <button type="button" class="btn btn-secondary hidden-md-down">Select</button>
                  </div>
                </div>
              </div>
              <div class="col-xs-6 col-md-4">
                <div class="pane-submit m-b-1" data-name="product" style="background: url('<?php echo get_stylesheet_directory_uri() ?>/img/3.jpg');" data-value="Glass Wine Cellars" data-pane="3">
                  <div class="p-y-1 pos-bottom">
                    <h5 class="p-b-1">Glass Wine Cellars</h5>
                    <button type="button" class="btn btn-secondary hidden-md-down">Select</button>
                  </div>
                </div>
              </div>
              <div class="col-xs-6 col-md-4">
                <div class="pane-submit m-b-1" data-name="product" style="background: url('<?php echo get_stylesheet_directory_uri() ?>/img/glass-wall.jpg');" data-value="Glass Walls" data-pane="3">
                  <div class="p-y-1 pos-bottom">
                    <h5 class="m-b-1">Glass Walls</h5>
                    <button type="button" class="btn btn-secondary hidden-md-down">Select</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        

        <div class="pane panel text-xs-center z-depth-1" style="height: 100vh; max-height: 600px; min-height: 350px; position: relative;">
          <div class="card-header panel-header">
            <h4 class="m-b-0">Enter Your Postcode</h4>
          </div>
          <div class="panel-body p-x-1 p-y-6" style="position: absolute; transform: translate(-50%, -50%); top: 50%; left: 50%;width:100%;max-width:450px">
            <p class="text-white">Enter your postcode below so we can check that we cover your area</p>
            
            <div class="m-x-auto" style="max-width:250px">
              <input id="postcode" type="text" class="form-control" name="postcode" placeholder="Postcode" style="color:#000 !important;">
              <span style="display: block;">
                <button style="display: block;" id="validate-postcode" type="button" class="btn btn-secondary">Check Postcode</button>
              </span>
            </div>
            <div class="response"></div>
          </div>
        </div>

        <div class="pane panel text-xs-center z-depth-1" style="height: 100vh; max-height: 600px; min-height: 350px; position: relative;">
          <div class="card-header panel-header">
            <h4 class="m-b-0">Checking Your Postcode</h4>
          </div>
          <div class="card-body p-a-1" style="position: absolute; transform: translate(-50%, -50%); top: 50%; left: 50%;">
            <p class="card-text text-white">Please wait whilst we check your postcode...</p>
            <img width="50" height="50" src="<?php echo get_stylesheet_directory_uri() ?>/img/loader.gif">
          </div>
        </div>

        <div class="pane panel text-xs-center z-depth-1" style="min-height: 350px;">
          <div class="card-header panel-header">
            <h4 class="m-b-0">Success! We Cover Your Area</h4>
          </div>
          <div class="panel-body p-x-1 p-y-3">
            <div class="form-group">
              <input type="text" class="form-control" name="first_name" placeholder="First Name" style="max-width: 480px; margin: 0 auto;">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="last_name" placeholder="Last Name" style="max-width: 480px; margin: 0 auto;">
            </div>
            <div class="form-group">
              <input type="email" class="form-control" name="email" placeholder="Email" style="max-width: 480px; margin: 0 auto;">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="phone" placeholder="Phone" style="max-width: 480px; margin: 0 auto;">
            </div>
            <div class="form-group" style="max-width: 480px; margin: 0 auto">
              <label style="font-size:14px">
                <!-- <input type="checkbox" class="form-checkbox" name="terms_and_conditions" style="position: static; opacity: 1; visibility: visible; appearance: checkbox; -webkit-appearance: checkbox; -moz-appearance: checkbox"> -->
              </label>
            </div>
            <div id="response" class="response" style="text-align:left;  font-size: 14px;  max-width: 480px;margin: 0 auto;margin-top: 1rem;"></div>
            <input type="submit" class="btn btn-secondary" value="Submit" style="max-width: 480px; margin: 0 auto;display:block"><br />
            <a href="/privacy-policy/" target="_blank">Privacy Policy</a><br />
            <small class="text-muted"><span class="fa fa-lock"></span> Your information is data protected.</small>
          </div>
        </div>

        <div class="pane panel text-xs-center z-depth-1" style="min-height: 350px;">
          <div class="card-header panel-header">
            <h4 class="m-b-0 text-white" style="font-size: 2.5rem;">Thank you for enquiring with Finepoint Glass</h4>
          </div>
          <div class="panel-body text-xs-left">
            <p>
              The team at Finepoint Glass really appreciate you taking the time to contact us. One of our friendly and knowledgable advisors will be in touch with you as soon as possible to provide our very best quote.
            </p>
            <p>
              We look forward to speaking to you soon,
            </p>
            <p>
              The Finepoint Glass team.
            </p>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>

