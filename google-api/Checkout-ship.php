<?php 
include_once 'get-locations.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!-- saved from url=(0049)http://demo.icebergcommerce.com/checkout/onepage/ -->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><script type="text/javascript" async="" src="./Checkout-ship_files/ga.js"></script><script id="tinyhippos-injected">if (window.top.ripple) { window.top.ripple("bootstrap").inject(window, document); }</script><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>Checkout</title>
<meta name="description" content="Default Description">
<meta name="keywords" content="Magento, Varien, E-commerce">
<meta name="robots" content="NOINDEX,NOFOLLOW">

<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">
<script src="jquery.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDef4rRaE0L456ZEJGpTYHKAFKDSqjMEa8&signed_in=true&libraries=places"></script>
<style type="text/css" media="screen">
    .pac-container {
  z-index: 1051 !important;
}
</style>
<style type="text/css" media="screen">
    * {
    /* -webkit-box-sizing: border-box; */
    -moz-box-sizing: content-box;
    box-sizing: content-box;
}
fieldset{magin:0;padding:0;}
address,label{margin-bottom:0px;}
.radio,.checkbox{display:inline;}
.input-group .form-control{width:95%;padding:0px 5px;}h4{text-align: left;}
</style>

<link rel="icon" href="http://demo.icebergcommerce.com/skin/frontend/default/default/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="http://demo.icebergcommerce.com/skin/frontend/default/default/favicon.ico" type="image/x-icon">
<!--[if lt IE 7]>
<script type="text/javascript">
//<![CDATA[
    var BLANK_URL = 'http://demo.icebergcommerce.com/js/blank.html';
    var BLANK_IMG = 'http://demo.icebergcommerce.com/js/spacer.gif';
//]]>
</script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="./Checkout-ship_files/styles.css" media="all">
<link rel="stylesheet" type="text/css" href="./Checkout-ship_files/widgets.css" media="all">
<link rel="stylesheet" type="text/css" href="./Checkout-ship_files/videogallery.css" media="all">
<link rel="stylesheet" type="text/css" href="./Checkout-ship_files/print.css" media="print">
<script type="text/javascript" src="./Checkout-ship_files/prototype.js"></script>
<script type="text/javascript" src="./Checkout-ship_files/ccard.js"></script>
<script type="text/javascript" src="./Checkout-ship_files/validation.js"></script>
<script type="text/javascript" src="./Checkout-ship_files/builder.js"></script>
<script type="text/javascript" src="./Checkout-ship_files/effects.js"></script>
<script type="text/javascript" src="./Checkout-ship_files/dragdrop.js"></script>
<script type="text/javascript" src="./Checkout-ship_files/controls.js"></script>
<script type="text/javascript" src="./Checkout-ship_files/slider.js"></script>
<script type="text/javascript" src="./Checkout-ship_files/js.js"></script>
<script type="text/javascript" src="./Checkout-ship_files/form.js"></script>
<script type="text/javascript" src="./Checkout-ship_files/menu.js"></script>
<script type="text/javascript" src="./Checkout-ship_files/translate.js"></script>
<script type="text/javascript" src="./Checkout-ship_files/cookies.js"></script>
<script type="text/javascript" src="./Checkout-ship_files/directpost.js"></script>
<script type="text/javascript" src="./Checkout-ship_files/captcha.js"></script>
<script type="text/javascript" src="./Checkout-ship_files/centinel.js"></script>
<script type="text/javascript" src="./Checkout-ship_files/weee.js"></script>

<!--[if lt IE 8]>
<link rel="stylesheet" type="text/css" href="http://demo.icebergcommerce.com/skin/frontend/default/default/css/styles-ie.css" media="all" />
<![endif]-->
<!--[if lt IE 7]>
<script type="text/javascript" src="http://demo.icebergcommerce.com/js/lib/ds-sleight.js"></script>
<script type="text/javascript" src="http://demo.icebergcommerce.com/skin/frontend/base/default/js/ie6.js"></script>
<![endif]-->

<script type="text/javascript">
//<![CDATA[
Mage.Cookies.path     = '/';
Mage.Cookies.domain   = '.demo.icebergcommerce.com';
//]]>
</script>

<script type="text/javascript">
//<![CDATA[
optionalZipCountries = ["HK","IE","MO","PA"];
//]]>
</script>
<script type="text/javascript">//<![CDATA[
        var Translator = new Translate([]);
        //]]></script><style>
.single-product {width:300px;text-align:center}
.single-product .product-name {font-weight:normal;font-size:14px}
.single-product-addtocart {padding-top:10px}
</style><meta name="chromesniffer" id="chromesniffer_meta" content="{&quot;Google Analytics&quot;:-1,&quot;Prototype&quot;:&quot;1.7&quot;,&quot;Magento&quot;:-1}"><script type="text/javascript" src="chrome-extension://homgcnaoacgigpkkljjjekpignblkeae/detector.js"></script></head>
</head>
<body>
<body class=" checkout-onepage-index">
<!-- BEGIN GOOGLE ANALYTICS CODEs -->
<script type="text/javascript">
//<![CDATA[
    var _gaq = _gaq || [];
    
_gaq.push(['_setAccount', 'UA-5560878-14']);
_gaq.push(['_trackPageview']);
    
    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

//]]>
</script>
<!-- END GOOGLE ANALYTICS CODE -->
<div class="wrapper">
        <noscript>
        &lt;div class="global-site-notice noscript"&gt;
            &lt;div class="notice-inner"&gt;
                &lt;p&gt;
                    &lt;strong&gt;JavaScript seems to be disabled in your browser.&lt;/strong&gt;&lt;br /&gt;
                    You must have JavaScript enabled in your browser to utilize the functionality of this website.                &lt;/p&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    </noscript>
    <div class="global-site-notice demo-notice">
        <div class="notice-inner"><p>This is a demo store. All changes are reset once per day. Any orders placed through this store will not be honored or fulfilled.</p></div>
    </div>
    <div class="page">
        <div class="header-container">
    <div class="header">
                <a href="http://demo.icebergcommerce.com/" title="Magento Commerce" class="logo"><strong>Magento Commerce</strong><img src="./Checkout-ship_files/logo.gif" alt="Magento Commerce"></a>
                <div class="quick-access">
            <form id="search_mini_form" action="http://demo.icebergcommerce.com/catalogsearch/result/" method="get">
    <div class="form-search">
        <label for="search">Search:</label>
        <input id="search" type="text" name="q" value="" class="input-text" maxlength="128" autocomplete="off">
        <button type="submit" title="Search" class="button"><span><span>Search</span></span></button>
        <div id="search_autocomplete" class="search-autocomplete" style="display: none;"></div>
        <script type="text/javascript">
        //<![CDATA[
            var searchForm = new Varien.searchForm('search_mini_form', 'search', 'Search entire store here...');
            searchForm.initAutocomplete('http://demo.icebergcommerce.com/catalogsearch/ajax/suggest/', 'search_autocomplete');
        //]]>
        </script>
    </div>
</form>
            <p class="welcome-msg">Default welcome msg! </p>
            <ul class="links">
                        <li class="first"><a href="http://demo.icebergcommerce.com/customer/account/" title="My Account">My Account</a></li>
                                <li><a href="http://demo.icebergcommerce.com/wishlist/" title="My Wishlist">My Wishlist</a></li>
                                <li><a href="http://demo.icebergcommerce.com/checkout/cart/" title="My Cart (1 item)" class="top-link-cart">My Cart (1 item)</a></li>
                                <li><a href="http://demo.icebergcommerce.com/checkout/" title="Checkout" class="top-link-checkout">Checkout</a></li>
                                <li class=" last"><a href="http://demo.icebergcommerce.com/customer/account/login/" title="Log In">Log In</a></li>
            </ul>
            <div class="form-language">
    <label for="select-language">Your Language:</label>
    <select id="select-language" title="Your Language" onchange="window.location.href=this.value">
                    <option value="http://demo.icebergcommerce.com/checkout/onepage/?___store=default&amp;___from_store=default" selected="selected">English</option>
                    <option value="http://demo.icebergcommerce.com/checkout/onepage/?___store=french&amp;___from_store=default">French</option>
                    <option value="http://demo.icebergcommerce.com/checkout/onepage/?___store=german&amp;___from_store=default">German</option>
        </select>
</div>
        </div>
            </div>
</div>
<div class="nav-container">
    <ul id="nav">
        <li class="level0 nav-1 first level-top parent"><a href="http://demo.icebergcommerce.com/furniture.html" class="level-top"><span>Furniture</span></a><ul class="level0"><li class="level1 nav-1-1 first"><a href="http://demo.icebergcommerce.com/furniture/living-room.html"><span>Living Room</span></a></li><li class="level1 nav-1-2 last"><a href="http://demo.icebergcommerce.com/furniture/bedroom.html"><span>Bedroom</span></a></li></ul></li><li class="level0 nav-2 level-top parent"><a href="http://demo.icebergcommerce.com/electronics.html" class="level-top"><span>Electronics</span></a><ul class="level0"><li class="level1 nav-2-1 first"><a href="http://demo.icebergcommerce.com/electronics/cell-phones.html"><span>Cell Phones</span></a></li><li class="level1 nav-2-2 parent"><a href="http://demo.icebergcommerce.com/electronics/cameras.html"><span>Cameras</span></a><ul class="level1"><li class="level2 nav-2-2-1 first"><a href="http://demo.icebergcommerce.com/electronics/cameras/accessories.html"><span>Accessories</span></a></li><li class="level2 nav-2-2-2 last"><a href="http://demo.icebergcommerce.com/electronics/cameras/digital-cameras.html"><span>Digital Cameras</span></a></li></ul></li><li class="level1 nav-2-3 last parent"><a href="http://demo.icebergcommerce.com/electronics/computers.html"><span>Computers</span></a><ul class="level1"><li class="level2 nav-2-3-1 first"><a href="http://demo.icebergcommerce.com/electronics/computers/build-your-own.html"><span>Build Your Own</span></a></li><li class="level2 nav-2-3-2"><a href="http://demo.icebergcommerce.com/electronics/computers/laptops.html"><span>Laptops</span></a></li><li class="level2 nav-2-3-3"><a href="http://demo.icebergcommerce.com/electronics/computers/hard-drives.html"><span>Hard Drives</span></a></li><li class="level2 nav-2-3-4"><a href="http://demo.icebergcommerce.com/electronics/computers/monitors.html"><span>Monitors</span></a></li><li class="level2 nav-2-3-5"><a href="http://demo.icebergcommerce.com/electronics/computers/ram-memory.html"><span>RAM / Memory</span></a></li><li class="level2 nav-2-3-6"><a href="http://demo.icebergcommerce.com/electronics/computers/cases.html"><span>Cases</span></a></li><li class="level2 nav-2-3-7"><a href="http://demo.icebergcommerce.com/electronics/computers/processors.html"><span>Processors</span></a></li><li class="level2 nav-2-3-8 last"><a href="http://demo.icebergcommerce.com/electronics/computers/peripherals.html"><span>Peripherals</span></a></li></ul></li></ul></li><li class="level0 nav-3 last level-top parent"><a href="http://demo.icebergcommerce.com/apparel.html" class="level-top"><span>Apparel</span></a><ul class="level0"><li class="level1 nav-3-1 first"><a href="http://demo.icebergcommerce.com/apparel/shirts.html"><span>Shirts</span></a></li><li class="level1 nav-3-2 parent"><a href="http://demo.icebergcommerce.com/apparel/shoes.html"><span>Shoes</span></a><ul class="level1"><li class="level2 nav-3-2-1 first"><a href="http://demo.icebergcommerce.com/apparel/shoes/mens.html"><span>Mens</span></a></li><li class="level2 nav-3-2-2 last"><a href="http://demo.icebergcommerce.com/apparel/shoes/womens.html"><span>Womens</span></a></li></ul></li><li class="level1 nav-3-3 last"><a href="http://demo.icebergcommerce.com/apparel/hoodies.html"><span>Hoodies</span></a></li></ul></li>    </ul>
</div>
        <div class="main-container col2-right-layout">
            <div class="main">
                                <div class="col-main">
                                        <div class="page-title">
    <h1>Checkout</h1>
</div>
<script type="text/javascript" src="./Checkout-ship_files/accordion.js"></script>
<script type="text/javascript" src="./Checkout-ship_files/opcheckout.js"></script>
<ol class="opc" id="checkoutSteps">
    <li id="opc-login" class="section allow">
        <div class="step-title">
            <span class="number">1</span>
            <h2>Checkout Method</h2>
            <a href="http://demo.icebergcommerce.com/checkout/onepage/#">Edit</a>
        </div>
        <div id="checkout-step-login" class="step a-item" style="display: none;">
            <div class="col2-set">
        <div class="col-1">
        <h3>Checkout as a Guest or Register</h3>
                    <p>Register with us for future convenience:</p>
                            <ul class="form-list">
                                <li class="control">
                    <input type="radio" name="checkout_method" id="login:guest" value="guest" class="radio"><label for="login:guest">Checkout as Guest</label>
                </li>
                                <li class="control">
                    <input type="radio" name="checkout_method" id="login:register" value="register" class="radio"><label for="login:register">Register</label>
                </li>
            </ul>
            <h4>Register and save time!</h4>
            <p>Register with us for future convenience:</p>
            <ul class="ul">
                <li>Fast and easy check out</li>
                <li>Easy access to your order history and status</li>
            </ul>
            </div>
    <div class="col-2">
        <h3>Login</h3>
                <form id="login-form" action="http://demo.icebergcommerce.com/customer/account/loginPost/" method="post">
        <fieldset>
            <h4>Already registered?</h4>
            <p>Please log in below:</p>
            <ul class="form-list">
                <li>
                    <label for="login-email" class="required"><em>*</em>Email Address</label>
                    <div class="input-box">
                        <input type="text" class="input-text required-entry validate-email" id="login-email" name="login[username]" value="" autocomplete="off" style="background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3QsPDhss3LcOZQAAAU5JREFUOMvdkzFLA0EQhd/bO7iIYmklaCUopLAQA6KNaawt9BeIgnUwLHPJRchfEBR7CyGWgiDY2SlIQBT/gDaCoGDudiy8SLwkBiwz1c7y+GZ25i0wnFEqlSZFZKGdi8iiiOR7aU32QkR2c7ncPcljAARAkgckb8IwrGf1fg/oJ8lRAHkR2VDVmOQ8AKjqY1bMHgCGYXhFchnAg6omJGcBXEZRtNoXYK2dMsaMt1qtD9/3p40x5yS9tHICYF1Vn0mOxXH8Uq/Xb389wff9PQDbQRB0t/QNOiPZ1h4B2MoO0fxnYz8dOOcOVbWhqq8kJzzPa3RAXZIkawCenHMjJN/+GiIqlcoFgKKq3pEMAMwAuCa5VK1W3SAfbAIopum+cy5KzwXn3M5AI6XVYlVt1mq1U8/zTlS1CeC9j2+6o1wuz1lrVzpWXLDWTg3pz/0CQnd2Jos49xUAAAAASUVORK5CYII=); background-attachment: scroll; background-position: 100% 50%; background-repeat: no-repeat;">
                    </div>
                </li>
                <li>
                    <label for="login-password" class="required"><em>*</em>Password</label>
                    <div class="input-box">
                        <input type="password" class="input-text required-entry" id="login-password" name="login[password]" autocomplete="off" style="background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3QsPDhss3LcOZQAAAU5JREFUOMvdkzFLA0EQhd/bO7iIYmklaCUopLAQA6KNaawt9BeIgnUwLHPJRchfEBR7CyGWgiDY2SlIQBT/gDaCoGDudiy8SLwkBiwz1c7y+GZ25i0wnFEqlSZFZKGdi8iiiOR7aU32QkR2c7ncPcljAARAkgckb8IwrGf1fg/oJ8lRAHkR2VDVmOQ8AKjqY1bMHgCGYXhFchnAg6omJGcBXEZRtNoXYK2dMsaMt1qtD9/3p40x5yS9tHICYF1Vn0mOxXH8Uq/Xb389wff9PQDbQRB0t/QNOiPZ1h4B2MoO0fxnYz8dOOcOVbWhqq8kJzzPa3RAXZIkawCenHMjJN/+GiIqlcoFgKKq3pEMAMwAuCa5VK1W3SAfbAIopum+cy5KzwXn3M5AI6XVYlVt1mq1U8/zTlS1CeC9j2+6o1wuz1lrVzpWXLDWTg3pz/0CQnd2Jos49xUAAAAASUVORK5CYII=); background-attachment: scroll; background-position: 100% 50%; background-repeat: no-repeat;">
                    </div>
                </li>
                                            </ul>
            <input name="context" type="hidden" value="checkout">
        </fieldset>
        </form>
    </div>
</div>
<div class="col2-set">
    <div class="col-1">
        <div class="buttons-set">
            <p class="required">&nbsp;</p>
                            <button id="onepage-guest-register-button" type="button" class="button" onclick="checkout.setMethod();"><span><span>Continue</span></span></button>
                    </div>
    </div>
    <div class="col-2">
        <div class="buttons-set">
            <p class="required">* Required Fields</p>
            <a href="http://demo.icebergcommerce.com/customer/account/forgotpassword/" class="f-left">Forgot your password?</a>
            <button type="submit" class="button" onclick="onepageLogin(this)"><span><span>Login</span></span></button>
        </div>
    </div>
</div>
<script type="text/javascript">
//<![CDATA[
    var loginForm = new VarienForm('login-form', true);
    $('login-email').observe('keypress', bindLoginPost);
    $('login-password').observe('keypress', bindLoginPost);
    function bindLoginPost(evt){
        if (evt.keyCode == Event.KEY_RETURN) {
            loginForm.submit();
        }
    }
    function onepageLogin(button)
    {
        if(loginForm.validator && loginForm.validator.validate()){
            button.disabled = true;
            loginForm.submit();
        }
    }
//]]>
</script>
        </div>
    </li>
    <li id="opc-billing" class="section allow">
        <div class="step-title">
            <span class="number">2</span>
            <h2>Billing Information</h2>
            <a href="http://demo.icebergcommerce.com/checkout/onepage/#">Edit</a>
        </div>
        <div id="checkout-step-billing" class="step a-item" style="display: none;">
            <form id="co-billing-form" action="" _lpchecked="1">
<fieldset class="">
    <ul class="form-list">
        <li id="billing-new-address-form">
        <fieldset class="">
            <input type="hidden" name="billing[address_id]" value="" id="billing:address_id">
            <ul>
                <li class="fields"><div class="customer-name">
    <div class="field name-firstname">
        <label for="billing:firstname" class="required"><em>*</em>First Name</label>
        <div class="input-box">
            <input type="text" id="billing:firstname" name="billing[firstname]" value="" title="First Name" maxlength="255" class="input-text required-entry validation-passed" style="cursor: auto; background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==); background-attachment: scroll; background-position: 100% 50%; background-repeat: no-repeat;">
        </div>
    </div>
    <div class="field name-lastname">
        <label for="billing:lastname" class="required"><em>*</em>Last Name</label>
        <div class="input-box">
            <input type="text" id="billing:lastname" name="billing[lastname]" value="" title="Last Name" maxlength="255" class="input-text required-entry validation-passed">
        </div>
    </div>
</div>
</li>
                <li class="fields">
                    <div class="field">
                        <label for="billing:company">Company</label>
                        <div class="input-box">
                            <input type="text" id="billing:company" name="billing[company]" value="" title="Company" class="input-text validation-passed">
                        </div>
                    </div>
                            <div class="field">
                        <label for="billing:email" class="required"><em>*</em>Email Address</label>
                        <div class="input-box">
                            <input type="text" name="billing[email]" id="billing:email" value="" title="Email Address" class="input-text validate-email required-entry validation-passed">
                        </div>
                    </div>
                        </li>
                        <li class="wide">
                    <label for="billing:street1" class="required"><em>*</em>Address</label>
                    <div class="input-box">
                        <input type="text" title="Street Address" name="billing[street][]" id="billing:street1" value="" class="input-text  required-entry validation-passed">
                    </div>
                </li>
                                <li class="wide">
                    <div class="input-box">
                        <input type="text" title="Street Address 2" name="billing[street][]" id="billing:street2" value="" class="input-text validation-passed">
                    </div>
                </li>
                                        <li class="fields">
                    <div class="field">
                        <label for="billing:city" class="required"><em>*</em>City</label>
                        <div class="input-box">
                            <input type="text" title="City" name="billing[city]" value="" class="input-text  required-entry validation-passed" id="billing:city">
                        </div>
                    </div>
                    <div class="field">
                        <label for="billing:region_id" class="required"><em>*</em>State/Province</label>
                        <div class="input-box">
                            <select id="billing:region_id" name="billing[region_id]" title="State/Province" class="validate-select required-entry validation-passed" defaultvalue="">
                                <option value="">Please select region, state or province</option>
                            <option value="1" title="Alabama">Alabama</option><option value="2" title="Alaska">Alaska</option><option value="3" title="American Samoa">American Samoa</option><option value="4" title="Arizona">Arizona</option><option value="5" title="Arkansas">Arkansas</option><option value="6" title="Armed Forces Africa">Armed Forces Africa</option><option value="7" title="Armed Forces Americas">Armed Forces Americas</option><option value="8" title="Armed Forces Canada">Armed Forces Canada</option><option value="9" title="Armed Forces Europe">Armed Forces Europe</option><option value="10" title="Armed Forces Middle East">Armed Forces Middle East</option><option value="11" title="Armed Forces Pacific">Armed Forces Pacific</option><option value="12" title="California">California</option><option value="13" title="Colorado">Colorado</option><option value="14" title="Connecticut">Connecticut</option><option value="15" title="Delaware">Delaware</option><option value="16" title="District of Columbia">District of Columbia</option><option value="17" title="Federated States Of Micronesia">Federated States Of Micronesia</option><option value="18" title="Florida">Florida</option><option value="19" title="Georgia">Georgia</option><option value="20" title="Guam">Guam</option><option value="21" title="Hawaii">Hawaii</option><option value="22" title="Idaho">Idaho</option><option value="23" title="Illinois">Illinois</option><option value="24" title="Indiana">Indiana</option><option value="25" title="Iowa">Iowa</option><option value="26" title="Kansas">Kansas</option><option value="27" title="Kentucky">Kentucky</option><option value="28" title="Louisiana">Louisiana</option><option value="29" title="Maine">Maine</option><option value="30" title="Marshall Islands">Marshall Islands</option><option value="31" title="Maryland">Maryland</option><option value="32" title="Massachusetts">Massachusetts</option><option value="33" title="Michigan">Michigan</option><option value="34" title="Minnesota">Minnesota</option><option value="35" title="Mississippi">Mississippi</option><option value="36" title="Missouri">Missouri</option><option value="37" title="Montana">Montana</option><option value="38" title="Nebraska">Nebraska</option><option value="39" title="Nevada">Nevada</option><option value="40" title="New Hampshire">New Hampshire</option><option value="41" title="New Jersey">New Jersey</option><option value="42" title="New Mexico">New Mexico</option><option value="43" title="New York">New York</option><option value="44" title="North Carolina">North Carolina</option><option value="45" title="North Dakota">North Dakota</option><option value="46" title="Northern Mariana Islands">Northern Mariana Islands</option><option value="47" title="Ohio">Ohio</option><option value="48" title="Oklahoma">Oklahoma</option><option value="49" title="Oregon">Oregon</option><option value="50" title="Palau">Palau</option><option value="51" title="Pennsylvania">Pennsylvania</option><option value="52" title="Puerto Rico">Puerto Rico</option><option value="53" title="Rhode Island">Rhode Island</option><option value="54" title="South Carolina">South Carolina</option><option value="55" title="South Dakota">South Dakota</option><option value="56" title="Tennessee">Tennessee</option><option value="57" title="Texas">Texas</option><option value="58" title="Utah">Utah</option><option value="59" title="Vermont">Vermont</option><option value="60" title="Virgin Islands">Virgin Islands</option><option value="61" title="Virginia">Virginia</option><option value="62" title="Washington">Washington</option><option value="63" title="West Virginia">West Virginia</option><option value="64" title="Wisconsin">Wisconsin</option><option value="65" title="Wyoming">Wyoming</option></select>
                            <script type="text/javascript">
                            //<![CDATA[
                                $('billing:region_id').setAttribute('defaultValue',  "");
                            //]]>
                            </script>
                            <input type="text" id="billing:region" name="billing[region]" value="" title="State/Province" class="input-text regions required-entry validation-passed" style="display:none;">
                        </div>
                    </div>
                </li>
                <li class="fields">
                    <div class="field">
                        <label for="billing:postcode" class="required"><em>*</em>Zip/Postal Code</label>
                        <div class="input-box">
                            <input type="text" title="Zip/Postal Code" name="billing[postcode]" id="billing:postcode" value="" class="input-text validate-zip-international  required-entry validation-passed">
                        </div>
                    </div>
                    <div class="field">
                        <label for="billing:country_id" class="required"><em>*</em>Country</label>
                        <div class="input-box">
                            <select name="billing[country_id]" id="billing:country_id" class="validate-select validation-passed" title="Country"><option value=""> </option><option value="AF">Afghanistan</option><option value="AX">Åland Islands</option><option value="AL">Albania</option><option value="DZ">Algeria</option><option value="AS">American Samoa</option><option value="AD">Andorra</option><option value="AO">Angola</option><option value="AI">Anguilla</option><option value="AQ">Antarctica</option><option value="AG">Antigua and Barbuda</option><option value="AR">Argentina</option><option value="AM">Armenia</option><option value="AW">Aruba</option><option value="AU">Australia</option><option value="AT">Austria</option><option value="AZ">Azerbaijan</option><option value="BS">Bahamas</option><option value="BH">Bahrain</option><option value="BD">Bangladesh</option><option value="BB">Barbados</option><option value="BY">Belarus</option><option value="BE">Belgium</option><option value="BZ">Belize</option><option value="BJ">Benin</option><option value="BM">Bermuda</option><option value="BT">Bhutan</option><option value="BO">Bolivia</option><option value="BA">Bosnia and Herzegovina</option><option value="BW">Botswana</option><option value="BV">Bouvet Island</option><option value="BR">Brazil</option><option value="IO">British Indian Ocean Territory</option><option value="VG">British Virgin Islands</option><option value="BN">Brunei</option><option value="BG">Bulgaria</option><option value="BF">Burkina Faso</option><option value="BI">Burundi</option><option value="KH">Cambodia</option><option value="CM">Cameroon</option><option value="CA">Canada</option><option value="CV">Cape Verde</option><option value="KY">Cayman Islands</option><option value="CF">Central African Republic</option><option value="TD">Chad</option><option value="CL">Chile</option><option value="CN">China</option><option value="CX">Christmas Island</option><option value="CC">Cocos [Keeling] Islands</option><option value="CO">Colombia</option><option value="KM">Comoros</option><option value="CG">Congo - Brazzaville</option><option value="CD">Congo - Kinshasa</option><option value="CK">Cook Islands</option><option value="CR">Costa Rica</option><option value="CI">Côte d’Ivoire</option><option value="HR">Croatia</option><option value="CU">Cuba</option><option value="CY">Cyprus</option><option value="CZ">Czech Republic</option><option value="DK">Denmark</option><option value="DJ">Djibouti</option><option value="DM">Dominica</option><option value="DO">Dominican Republic</option><option value="EC">Ecuador</option><option value="EG">Egypt</option><option value="SV">El Salvador</option><option value="GQ">Equatorial Guinea</option><option value="ER">Eritrea</option><option value="EE">Estonia</option><option value="ET">Ethiopia</option><option value="FK">Falkland Islands</option><option value="FO">Faroe Islands</option><option value="FJ">Fiji</option><option value="FI">Finland</option><option value="FR">France</option><option value="GF">French Guiana</option><option value="PF">French Polynesia</option><option value="TF">French Southern Territories</option><option value="GA">Gabon</option><option value="GM">Gambia</option><option value="GE">Georgia</option><option value="DE">Germany</option><option value="GH">Ghana</option><option value="GI">Gibraltar</option><option value="GR">Greece</option><option value="GL">Greenland</option><option value="GD">Grenada</option><option value="GP">Guadeloupe</option><option value="GU">Guam</option><option value="GT">Guatemala</option><option value="GG">Guernsey</option><option value="GN">Guinea</option><option value="GW">Guinea-Bissau</option><option value="GY">Guyana</option><option value="HT">Haiti</option><option value="HM">Heard Island and McDonald Islands</option><option value="HN">Honduras</option><option value="HK">Hong Kong SAR China</option><option value="HU">Hungary</option><option value="IS">Iceland</option><option value="IN">India</option><option value="ID">Indonesia</option><option value="IR">Iran</option><option value="IQ">Iraq</option><option value="IE">Ireland</option><option value="IM">Isle of Man</option><option value="IL">Israel</option><option value="IT">Italy</option><option value="JM">Jamaica</option><option value="JP">Japan</option><option value="JE">Jersey</option><option value="JO">Jordan</option><option value="KZ">Kazakhstan</option><option value="KE">Kenya</option><option value="KI">Kiribati</option><option value="KW">Kuwait</option><option value="KG">Kyrgyzstan</option><option value="LA">Laos</option><option value="LV">Latvia</option><option value="LB">Lebanon</option><option value="LS">Lesotho</option><option value="LR">Liberia</option><option value="LY">Libya</option><option value="LI">Liechtenstein</option><option value="LT">Lithuania</option><option value="LU">Luxembourg</option><option value="MO">Macau SAR China</option><option value="MK">Macedonia</option><option value="MG">Madagascar</option><option value="MW">Malawi</option><option value="MY">Malaysia</option><option value="MV">Maldives</option><option value="ML">Mali</option><option value="MT">Malta</option><option value="MH">Marshall Islands</option><option value="MQ">Martinique</option><option value="MR">Mauritania</option><option value="MU">Mauritius</option><option value="YT">Mayotte</option><option value="MX">Mexico</option><option value="FM">Micronesia</option><option value="MD">Moldova</option><option value="MC">Monaco</option><option value="MN">Mongolia</option><option value="ME">Montenegro</option><option value="MS">Montserrat</option><option value="MA">Morocco</option><option value="MZ">Mozambique</option><option value="MM">Myanmar [Burma]</option><option value="NA">Namibia</option><option value="NR">Nauru</option><option value="NP">Nepal</option><option value="NL">Netherlands</option><option value="AN">Netherlands Antilles</option><option value="NC">New Caledonia</option><option value="NZ">New Zealand</option><option value="NI">Nicaragua</option><option value="NE">Niger</option><option value="NG">Nigeria</option><option value="NU">Niue</option><option value="NF">Norfolk Island</option><option value="MP">Northern Mariana Islands</option><option value="KP">North Korea</option><option value="NO">Norway</option><option value="OM">Oman</option><option value="PK">Pakistan</option><option value="PW">Palau</option><option value="PS">Palestinian Territories</option><option value="PA">Panama</option><option value="PG">Papua New Guinea</option><option value="PY">Paraguay</option><option value="PE">Peru</option><option value="PH">Philippines</option><option value="PN">Pitcairn Islands</option><option value="PL">Poland</option><option value="PT">Portugal</option><option value="PR">Puerto Rico</option><option value="QA">Qatar</option><option value="RE">Réunion</option><option value="RO">Romania</option><option value="RU">Russia</option><option value="RW">Rwanda</option><option value="BL">Saint Barthélemy</option><option value="SH">Saint Helena</option><option value="KN">Saint Kitts and Nevis</option><option value="LC">Saint Lucia</option><option value="MF">Saint Martin</option><option value="PM">Saint Pierre and Miquelon</option><option value="VC">Saint Vincent and the Grenadines</option><option value="WS">Samoa</option><option value="SM">San Marino</option><option value="ST">São Tomé and Príncipe</option><option value="SA">Saudi Arabia</option><option value="SN">Senegal</option><option value="RS">Serbia</option><option value="SC">Seychelles</option><option value="SL">Sierra Leone</option><option value="SG">Singapore</option><option value="SK">Slovakia</option><option value="SI">Slovenia</option><option value="SB">Solomon Islands</option><option value="SO">Somalia</option><option value="ZA">South Africa</option><option value="GS">South Georgia and the South Sandwich Islands</option><option value="KR">South Korea</option><option value="ES">Spain</option><option value="LK">Sri Lanka</option><option value="SD">Sudan</option><option value="SR">Suriname</option><option value="SJ">Svalbard and Jan Mayen</option><option value="SZ">Swaziland</option><option value="SE">Sweden</option><option value="CH">Switzerland</option><option value="SY">Syria</option><option value="TW">Taiwan</option><option value="TJ">Tajikistan</option><option value="TZ">Tanzania</option><option value="TH">Thailand</option><option value="TL">Timor-Leste</option><option value="TG">Togo</option><option value="TK">Tokelau</option><option value="TO">Tonga</option><option value="TT">Trinidad and Tobago</option><option value="TN">Tunisia</option><option value="TR">Turkey</option><option value="TM">Turkmenistan</option><option value="TC">Turks and Caicos Islands</option><option value="TV">Tuvalu</option><option value="UG">Uganda</option><option value="UA">Ukraine</option><option value="AE">United Arab Emirates</option><option value="GB">United Kingdom</option><option value="US" selected="selected">United States</option><option value="UY">Uruguay</option><option value="UM">U.S. Minor Outlying Islands</option><option value="VI">U.S. Virgin Islands</option><option value="UZ">Uzbekistan</option><option value="VU">Vanuatu</option><option value="VA">Vatican City</option><option value="VE">Venezuela</option><option value="VN">Vietnam</option><option value="WF">Wallis and Futuna</option><option value="EH">Western Sahara</option><option value="YE">Yemen</option><option value="ZM">Zambia</option><option value="ZW">Zimbabwe</option></select>                        </div>
                    </div>
                </li>
                <li class="fields">
                    <div class="field">
                        <label for="billing:telephone" class="required"><em>*</em>Telephone</label>
                        <div class="input-box">
                            <input type="text" name="billing[telephone]" value="" title="Telephone" class="input-text  required-entry validation-passed" id="billing:telephone"><div class="validation-advice" id="advice-required-entry-billing:telephone" style="opacity: 0; display: none;">This is a required field.</div>
                        </div>
                    </div>
                    <div class="field">
                        <label for="billing:fax">Fax</label>
                        <div class="input-box">
                            <input type="text" name="billing[fax]" value="" title="Fax" class="input-text validation-passed" id="billing:fax">
                        </div>
                    </div>
                </li>
                
                            
            
                <li class="fields" id="register-customer-password" style="display: none;">
                    <div class="field">
                        <label for="billing:customer_password" class="required"><em>*</em>Password</label>
                        <div class="input-box">
                            <input type="password" name="billing[customer_password]" id="billing:customer_password" title="Password" class="input-text required-entry validate-password validation-passed" style="background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAACIUlEQVQ4EX2TOYhTURSG87IMihDsjGghBhFBmHFDHLWwSqcikk4RRKJgk0KL7C8bMpWpZtIqNkEUl1ZCgs0wOo0SxiLMDApWlgOPrH7/5b2QkYwX7jvn/uc//zl3edZ4PPbNGvF4fC4ajR5VrNvt/mo0Gr1ZPOtfgWw2e9Lv9+chX7cs64CS4Oxg3o9GI7tUKv0Q5o1dAiTfCgQCLwnOkfQOu+oSLyJ2A783HA7vIPLGxX0TgVwud4HKn0nc7Pf7N6vV6oZHkkX8FPG3uMfgXC0Wi2vCg/poUKGGcagQI3k7k8mcp5slcGswGDwpl8tfwGJg3xB6Dvey8vz6oH4C3iXcFYjbwiDeo1KafafkC3NjK7iL5ESFGQEUF7Sg+ifZdDp9GnMF/KGmfBdT2HCwZ7TwtrBPC7rQaav6Iv48rqZwg+F+p8hOMBj0IbxfMdMBrW5pAVGV/ztINByENkU0t5BIJEKRSOQ3Aj+Z57iFs1R5NK3EQS6HQqF1zmQdzpFWq3W42WwOTAf1er1PF2USFlC+qxMvFAr3HcexWX+QX6lUvsKpkTyPSEXJkw6MQ4S38Ljdbi8rmM/nY+CvgNcQqdH6U/xrYK9t244jZv6ByUOSiDdIfgBZ12U6dHEHu9TpdIr8F0OP692CtzaW/a6y3y0Wx5kbFHvGuXzkgf0xhKnPzA4UTyaTB8Ph8AvcHi3fnsrZ7Wore02YViqVOrRXXPhfqP8j6MYlawoAAAAASUVORK5CYII=); background-attachment: scroll; background-position: 100% 50%; background-repeat: no-repeat;">
                        </div>
                    </div>
                    <div class="field">
                        <label for="billing:confirm_password" class="required"><em>*</em>Confirm Password</label>
                        <div class="input-box">
                            <input type="password" name="billing[confirm_password]" title="Confirm Password" id="billing:confirm_password" class="input-text required-entry validate-cpassword validation-passed" style="background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAACIUlEQVQ4EX2TOYhTURSG87IMihDsjGghBhFBmHFDHLWwSqcikk4RRKJgk0KL7C8bMpWpZtIqNkEUl1ZCgs0wOo0SxiLMDApWlgOPrH7/5b2QkYwX7jvn/uc//zl3edZ4PPbNGvF4fC4ajR5VrNvt/mo0Gr1ZPOtfgWw2e9Lv9+chX7cs64CS4Oxg3o9GI7tUKv0Q5o1dAiTfCgQCLwnOkfQOu+oSLyJ2A783HA7vIPLGxX0TgVwud4HKn0nc7Pf7N6vV6oZHkkX8FPG3uMfgXC0Wi2vCg/poUKGGcagQI3k7k8mcp5slcGswGDwpl8tfwGJg3xB6Dvey8vz6oH4C3iXcFYjbwiDeo1KafafkC3NjK7iL5ESFGQEUF7Sg+ifZdDp9GnMF/KGmfBdT2HCwZ7TwtrBPC7rQaav6Iv48rqZwg+F+p8hOMBj0IbxfMdMBrW5pAVGV/ztINByENkU0t5BIJEKRSOQ3Aj+Z57iFs1R5NK3EQS6HQqF1zmQdzpFWq3W42WwOTAf1er1PF2USFlC+qxMvFAr3HcexWX+QX6lUvsKpkTyPSEXJkw6MQ4S38Ljdbi8rmM/nY+CvgNcQqdH6U/xrYK9t244jZv6ByUOSiDdIfgBZ12U6dHEHu9TpdIr8F0OP692CtzaW/a6y3y0Wx5kbFHvGuXzkgf0xhKnPzA4UTyaTB8Ph8AvcHi3fnsrZ7Wore02YViqVOrRXXPhfqP8j6MYlawoAAAAASUVORK5CYII=); background-attachment: scroll; background-position: 100% 50%; background-repeat: no-repeat;">
                        </div>
                    </div>
                </li>
                                                                    <li class="no-display"><input type="hidden" name="billing[save_in_address_book]" value="1"></li>
                                            </ul>
            

<script type="text/javascript">
//<![CDATA[
    function toggleRememberMepopup(event){
        if($('remember-me-popup')){
            var viewportHeight = document.viewport.getHeight(),
                docHeight      = $$('body')[0].getHeight(),
                height         = docHeight > viewportHeight ? docHeight : viewportHeight;
            $('remember-me-popup').toggle();
            $('window-overlay').setStyle({ height: height + 'px' }).toggle();
        }
        Event.stop(event);
    }

    document.observe("dom:loaded", function() {
        new Insertion.Bottom($$('body')[0], $('window-overlay'));
        new Insertion.Bottom($$('body')[0], $('remember-me-popup'));

        $$('.remember-me-popup-close').each(function(element){
            Event.observe(element, 'click', toggleRememberMepopup);
        })
        $$('#remember-me-box a').each(function(element) {
            Event.observe(element, 'click', toggleRememberMepopup);
        });
    });
//]]>
</script>
        </fieldset>
     </li>
            <li class="control">
            <input type="radio" name="billing[use_for_shipping]" id="billing:use_for_shipping_yes" value="1" checked="checked" title="Ship to this address" onclick="$(&#39;shipping:same_as_billing&#39;).checked = true;" class="radio validation-passed"><label for="billing:use_for_shipping_yes">Ship to this address</label></li>
        <li class="control">
            <input type="radio" name="billing[use_for_shipping]" id="billing:use_for_shipping_no" value="0" title="Ship to different address" onclick="$(&#39;shipping:same_as_billing&#39;).checked = false;" class="radio validation-passed"><label for="billing:use_for_shipping_no">Ship to different address</label>
        </li>
        </ul>
        <div class="buttons-set" id="billing-buttons-container">
        <p class="required">* Required Fields</p>
        <button type="button" title="Continue" class="button validation-passed" onclick="billing.save()"><span><span>Continue</span></span></button>
        <span class="please-wait" id="billing-please-wait" style="display: none;">
            <img src="./Checkout-ship_files/opc-ajax-loader.gif" alt="Loading next step..." title="Loading next step..." class="v-middle"> Loading next step...        </span>
    </div>
</fieldset>
</form>
<script type="text/javascript">
//<![CDATA[
    var billing = new Billing('co-billing-form', 'http://demo.icebergcommerce.com/checkout/onepage/getAddress/address/', 'http://demo.icebergcommerce.com/checkout/onepage/saveBilling/');
    var billingForm = new VarienForm('co-billing-form');

    //billingForm.setElementsRelation('billing:country_id', 'billing:region', 'http://demo.icebergcommerce.com/directory/json/childRegion/', 'Select State/Province...');
    $('billing-address-select') && billing.newAddress(!$('billing-address-select').value);

    var billingRegionUpdater = new RegionUpdater('billing:country_id', 'billing:region', 'billing:region_id', {"config":{"show_all_regions":true,"regions_required":["AT","CA","CH","DE","EE","ES","FI","FR","LT","LV","RO","US"]},"LV":{"471":{"code":"\u0100da\u017eu novads","name":"\u0100da\u017eu novads"},"366":{"code":"Aglonas novads","name":"Aglonas novads"},"367":{"code":"LV-AI","name":"Aizkraukles novads"},"368":{"code":"Aizputes novads","name":"Aizputes novads"},"369":{"code":"Akn\u012bstes novads","name":"Akn\u012bstes novads"},"370":{"code":"Alojas novads","name":"Alojas novads"},"371":{"code":"Alsungas novads","name":"Alsungas novads"},"372":{"code":"LV-AL","name":"Al\u016bksnes novads"},"373":{"code":"Amatas novads","name":"Amatas novads"},"374":{"code":"Apes novads","name":"Apes novads"},"375":{"code":"Auces novads","name":"Auces novads"},"376":{"code":"Bab\u012btes novads","name":"Bab\u012btes novads"},"377":{"code":"Baldones novads","name":"Baldones novads"},"378":{"code":"Baltinavas novads","name":"Baltinavas novads"},"379":{"code":"LV-BL","name":"Balvu novads"},"380":{"code":"LV-BU","name":"Bauskas novads"},"381":{"code":"Bever\u012bnas novads","name":"Bever\u012bnas novads"},"382":{"code":"Broc\u0113nu novads","name":"Broc\u0113nu novads"},"383":{"code":"Burtnieku novads","name":"Burtnieku novads"},"384":{"code":"Carnikavas novads","name":"Carnikavas novads"},"387":{"code":"LV-CE","name":"C\u0113su novads"},"385":{"code":"Cesvaines novads","name":"Cesvaines novads"},"386":{"code":"Ciblas novads","name":"Ciblas novads"},"388":{"code":"Dagdas novads","name":"Dagdas novads"},"355":{"code":"LV-DGV","name":"Daugavpils"},"389":{"code":"LV-DA","name":"Daugavpils novads"},"390":{"code":"LV-DO","name":"Dobeles novads"},"391":{"code":"Dundagas novads","name":"Dundagas novads"},"392":{"code":"Durbes novads","name":"Durbes novads"},"393":{"code":"Engures novads","name":"Engures novads"},"472":{"code":"\u0112rg\u013cu novads","name":"\u0112rg\u013cu novads"},"394":{"code":"Garkalnes novads","name":"Garkalnes novads"},"395":{"code":"Grobi\u0146as novads","name":"Grobi\u0146as novads"},"396":{"code":"LV-GU","name":"Gulbenes novads"},"397":{"code":"Iecavas novads","name":"Iecavas novads"},"398":{"code":"Ik\u0161\u0137iles novads","name":"Ik\u0161\u0137iles novads"},"399":{"code":"Il\u016bkstes novads","name":"Il\u016bkstes novads"},"400":{"code":"In\u010dukalna novads","name":"In\u010dukalna novads"},"401":{"code":"Jaunjelgavas novads","name":"Jaunjelgavas novads"},"402":{"code":"Jaunpiebalgas novads","name":"Jaunpiebalgas novads"},"403":{"code":"Jaunpils novads","name":"Jaunpils novads"},"357":{"code":"J\u0113kabpils","name":"J\u0113kabpils"},"405":{"code":"LV-JK","name":"J\u0113kabpils novads"},"356":{"code":"LV-JEL","name":"Jelgava"},"404":{"code":"LV-JL","name":"Jelgavas novads"},"358":{"code":"LV-JUR","name":"J\u016brmala"},"406":{"code":"Kandavas novads","name":"Kandavas novads"},"412":{"code":"K\u0101rsavas novads","name":"K\u0101rsavas novads"},"473":{"code":"\u0136eguma novads","name":"\u0136eguma novads"},"474":{"code":"\u0136ekavas novads","name":"\u0136ekavas novads"},"407":{"code":"Kokneses novads","name":"Kokneses novads"},"410":{"code":"LV-KR","name":"Kr\u0101slavas novads"},"408":{"code":"Krimuldas novads","name":"Krimuldas novads"},"409":{"code":"Krustpils novads","name":"Krustpils novads"},"411":{"code":"LV-KU","name":"Kuld\u012bgas novads"},"413":{"code":"Lielv\u0101rdes novads","name":"Lielv\u0101rdes novads"},"359":{"code":"LV-LPX","name":"Liep\u0101ja"},"360":{"code":"LV-LE","name":"Liep\u0101jas novads"},"417":{"code":"L\u012bgatnes novads","name":"L\u012bgatnes novads"},"414":{"code":"LV-LM","name":"Limba\u017eu novads"},"418":{"code":"L\u012bv\u0101nu novads","name":"L\u012bv\u0101nu novads"},"415":{"code":"Lub\u0101nas novads","name":"Lub\u0101nas novads"},"416":{"code":"LV-LU","name":"Ludzas novads"},"419":{"code":"LV-MA","name":"Madonas novads"},"421":{"code":"M\u0101lpils novads","name":"M\u0101lpils novads"},"422":{"code":"M\u0101rupes novads","name":"M\u0101rupes novads"},"420":{"code":"Mazsalacas novads","name":"Mazsalacas novads"},"423":{"code":"Nauk\u0161\u0113nu novads","name":"Nauk\u0161\u0113nu novads"},"424":{"code":"Neretas novads","name":"Neretas novads"},"425":{"code":"N\u012bcas novads","name":"N\u012bcas novads"},"426":{"code":"LV-OG","name":"Ogres novads"},"427":{"code":"Olaines novads","name":"Olaines novads"},"428":{"code":"Ozolnieku novads","name":"Ozolnieku novads"},"432":{"code":"P\u0101rgaujas novads","name":"P\u0101rgaujas novads"},"433":{"code":"P\u0101vilostas novads","name":"P\u0101vilostas novads"},"434":{"code":"P\u013cavi\u0146u novads","name":"P\u013cavi\u0146u novads"},"429":{"code":"LV-PR","name":"Prei\u013cu novads"},"430":{"code":"Priekules novads","name":"Priekules novads"},"431":{"code":"Prieku\u013cu novads","name":"Prieku\u013cu novads"},"435":{"code":"Raunas novads","name":"Raunas novads"},"361":{"code":"LV-REZ","name":"R\u0113zekne"},"442":{"code":"LV-RE","name":"R\u0113zeknes novads"},"436":{"code":"Riebi\u0146u novads","name":"Riebi\u0146u novads"},"362":{"code":"LV-RIX","name":"R\u012bga"},"363":{"code":"LV-RI","name":"R\u012bgas novads"},"437":{"code":"Rojas novads","name":"Rojas novads"},"438":{"code":"Ropa\u017eu novads","name":"Ropa\u017eu novads"},"439":{"code":"Rucavas novads","name":"Rucavas novads"},"440":{"code":"Rug\u0101ju novads","name":"Rug\u0101ju novads"},"443":{"code":"R\u016bjienas novads","name":"R\u016bjienas novads"},"441":{"code":"Rund\u0101les novads","name":"Rund\u0101les novads"},"444":{"code":"Salacgr\u012bvas novads","name":"Salacgr\u012bvas novads"},"445":{"code":"Salas novads","name":"Salas novads"},"446":{"code":"Salaspils novads","name":"Salaspils novads"},"447":{"code":"LV-SA","name":"Saldus novads"},"448":{"code":"Saulkrastu novads","name":"Saulkrastu novads"},"455":{"code":"S\u0113jas novads","name":"S\u0113jas novads"},"449":{"code":"Siguldas novads","name":"Siguldas novads"},"451":{"code":"Skr\u012bveru novads","name":"Skr\u012bveru novads"},"450":{"code":"Skrundas novads","name":"Skrundas novads"},"452":{"code":"Smiltenes novads","name":"Smiltenes novads"},"453":{"code":"Stopi\u0146u novads","name":"Stopi\u0146u novads"},"454":{"code":"Stren\u010du novads","name":"Stren\u010du novads"},"456":{"code":"LV-TA","name":"Talsu novads"},"458":{"code":"T\u0113rvetes novads","name":"T\u0113rvetes novads"},"457":{"code":"LV-TU","name":"Tukuma novads"},"459":{"code":"Vai\u0146odes novads","name":"Vai\u0146odes novads"},"460":{"code":"LV-VK","name":"Valkas novads"},"364":{"code":"Valmiera","name":"Valmiera"},"461":{"code":"LV-VM","name":"Valmieras novads"},"462":{"code":"Varak\u013c\u0101nu novads","name":"Varak\u013c\u0101nu novads"},"469":{"code":"V\u0101rkavas novads","name":"V\u0101rkavas novads"},"463":{"code":"Vecpiebalgas novads","name":"Vecpiebalgas novads"},"464":{"code":"Vecumnieku novads","name":"Vecumnieku novads"},"365":{"code":"LV-VEN","name":"Ventspils"},"465":{"code":"LV-VE","name":"Ventspils novads"},"466":{"code":"Vies\u012btes novads","name":"Vies\u012btes novads"},"467":{"code":"Vi\u013cakas novads","name":"Vi\u013cakas novads"},"468":{"code":"Vi\u013c\u0101nu novads","name":"Vi\u013c\u0101nu novads"},"470":{"code":"Zilupes novads","name":"Zilupes novads"}},"FI":{"339":{"code":"Ahvenanmaa","name":"Ahvenanmaa"},"333":{"code":"Etel\u00e4-Karjala","name":"Etel\u00e4-Karjala"},"326":{"code":"Etel\u00e4-Pohjanmaa","name":"Etel\u00e4-Pohjanmaa"},"325":{"code":"Etel\u00e4-Savo","name":"Etel\u00e4-Savo"},"337":{"code":"It\u00e4-Uusimaa","name":"It\u00e4-Uusimaa"},"322":{"code":"Kainuu","name":"Kainuu"},"335":{"code":"Kanta-H\u00e4me","name":"Kanta-H\u00e4me"},"330":{"code":"Keski-Pohjanmaa","name":"Keski-Pohjanmaa"},"331":{"code":"Keski-Suomi","name":"Keski-Suomi"},"338":{"code":"Kymenlaakso","name":"Kymenlaakso"},"320":{"code":"Lappi","name":"Lappi"},"334":{"code":"P\u00e4ij\u00e4t-H\u00e4me","name":"P\u00e4ij\u00e4t-H\u00e4me"},"328":{"code":"Pirkanmaa","name":"Pirkanmaa"},"327":{"code":"Pohjanmaa","name":"Pohjanmaa"},"323":{"code":"Pohjois-Karjala","name":"Pohjois-Karjala"},"321":{"code":"Pohjois-Pohjanmaa","name":"Pohjois-Pohjanmaa"},"324":{"code":"Pohjois-Savo","name":"Pohjois-Savo"},"329":{"code":"Satakunta","name":"Satakunta"},"336":{"code":"Uusimaa","name":"Uusimaa"},"332":{"code":"Varsinais-Suomi","name":"Varsinais-Suomi"}},"LT":{"475":{"code":"LT-AL","name":"Alytaus Apskritis"},"476":{"code":"LT-KU","name":"Kauno Apskritis"},"477":{"code":"LT-KL","name":"Klaip\u0117dos Apskritis"},"478":{"code":"LT-MR","name":"Marijampol\u0117s Apskritis"},"479":{"code":"LT-PN","name":"Panev\u0117\u017eio Apskritis"},"480":{"code":"LT-SA","name":"\u0160iauli\u0173 Apskritis"},"481":{"code":"LT-TA","name":"Taurag\u0117s Apskritis"},"482":{"code":"LT-TE","name":"Tel\u0161i\u0173 Apskritis"},"483":{"code":"LT-UT","name":"Utenos Apskritis"},"484":{"code":"LT-VL","name":"Vilniaus Apskritis"}},"EE":{"340":{"code":"EE-37","name":"Harjumaa"},"341":{"code":"EE-39","name":"Hiiumaa"},"342":{"code":"EE-44","name":"Ida-Virumaa"},"344":{"code":"EE-51","name":"J\u00e4rvamaa"},"343":{"code":"EE-49","name":"J\u00f5gevamaa"},"346":{"code":"EE-59","name":"L\u00e4\u00e4ne-Virumaa"},"345":{"code":"EE-57","name":"L\u00e4\u00e4nemaa"},"348":{"code":"EE-67","name":"P\u00e4rnumaa"},"347":{"code":"EE-65","name":"P\u00f5lvamaa"},"349":{"code":"EE-70","name":"Raplamaa"},"350":{"code":"EE-74","name":"Saaremaa"},"351":{"code":"EE-78","name":"Tartumaa"},"352":{"code":"EE-82","name":"Valgamaa"},"353":{"code":"EE-84","name":"Viljandimaa"},"354":{"code":"EE-86","name":"V\u00f5rumaa"}},"ES":{"130":{"code":"A Coru\u0441a","name":"A Coru\u00f1a"},"131":{"code":"Alava","name":"Alava"},"132":{"code":"Albacete","name":"Albacete"},"133":{"code":"Alicante","name":"Alicante"},"134":{"code":"Almeria","name":"Almeria"},"135":{"code":"Asturias","name":"Asturias"},"136":{"code":"Avila","name":"Avila"},"137":{"code":"Badajoz","name":"Badajoz"},"138":{"code":"Baleares","name":"Baleares"},"139":{"code":"Barcelona","name":"Barcelona"},"140":{"code":"Burgos","name":"Burgos"},"141":{"code":"Caceres","name":"Caceres"},"142":{"code":"Cadiz","name":"Cadiz"},"143":{"code":"Cantabria","name":"Cantabria"},"144":{"code":"Castellon","name":"Castellon"},"145":{"code":"Ceuta","name":"Ceuta"},"146":{"code":"Ciudad Real","name":"Ciudad Real"},"147":{"code":"Cordoba","name":"Cordoba"},"148":{"code":"Cuenca","name":"Cuenca"},"149":{"code":"Girona","name":"Girona"},"150":{"code":"Granada","name":"Granada"},"151":{"code":"Guadalajara","name":"Guadalajara"},"152":{"code":"Guipuzcoa","name":"Guipuzcoa"},"153":{"code":"Huelva","name":"Huelva"},"154":{"code":"Huesca","name":"Huesca"},"155":{"code":"Jaen","name":"Jaen"},"156":{"code":"La Rioja","name":"La Rioja"},"157":{"code":"Las Palmas","name":"Las Palmas"},"158":{"code":"Leon","name":"Leon"},"159":{"code":"Lleida","name":"Lleida"},"160":{"code":"Lugo","name":"Lugo"},"161":{"code":"Madrid","name":"Madrid"},"162":{"code":"Malaga","name":"Malaga"},"163":{"code":"Melilla","name":"Melilla"},"164":{"code":"Murcia","name":"Murcia"},"165":{"code":"Navarra","name":"Navarra"},"166":{"code":"Ourense","name":"Ourense"},"167":{"code":"Palencia","name":"Palencia"},"168":{"code":"Pontevedra","name":"Pontevedra"},"169":{"code":"Salamanca","name":"Salamanca"},"170":{"code":"Santa Cruz de Tenerife","name":"Santa Cruz de Tenerife"},"171":{"code":"Segovia","name":"Segovia"},"172":{"code":"Sevilla","name":"Sevilla"},"173":{"code":"Soria","name":"Soria"},"174":{"code":"Tarragona","name":"Tarragona"},"175":{"code":"Teruel","name":"Teruel"},"176":{"code":"Toledo","name":"Toledo"},"177":{"code":"Valencia","name":"Valencia"},"178":{"code":"Valladolid","name":"Valladolid"},"179":{"code":"Vizcaya","name":"Vizcaya"},"180":{"code":"Zamora","name":"Zamora"},"181":{"code":"Zaragoza","name":"Zaragoza"}},"CH":{"104":{"code":"AG","name":"Aargau"},"106":{"code":"AR","name":"Appenzell Ausserrhoden"},"105":{"code":"AI","name":"Appenzell Innerrhoden"},"108":{"code":"BL","name":"Basel-Landschaft"},"109":{"code":"BS","name":"Basel-Stadt"},"107":{"code":"BE","name":"Bern"},"110":{"code":"FR","name":"Freiburg"},"111":{"code":"GE","name":"Genf"},"112":{"code":"GL","name":"Glarus"},"113":{"code":"GR","name":"Graub\u00fcnden"},"114":{"code":"JU","name":"Jura"},"115":{"code":"LU","name":"Luzern"},"116":{"code":"NE","name":"Neuenburg"},"117":{"code":"NW","name":"Nidwalden"},"118":{"code":"OW","name":"Obwalden"},"120":{"code":"SH","name":"Schaffhausen"},"122":{"code":"SZ","name":"Schwyz"},"121":{"code":"SO","name":"Solothurn"},"119":{"code":"SG","name":"St. Gallen"},"124":{"code":"TI","name":"Tessin"},"123":{"code":"TG","name":"Thurgau"},"125":{"code":"UR","name":"Uri"},"126":{"code":"VD","name":"Waadt"},"127":{"code":"VS","name":"Wallis"},"128":{"code":"ZG","name":"Zug"},"129":{"code":"ZH","name":"Z\u00fcrich"}},"FR":{"182":{"code":"01","name":"Ain"},"183":{"code":"02","name":"Aisne"},"184":{"code":"03","name":"Allier"},"185":{"code":"04","name":"Alpes-de-Haute-Provence"},"187":{"code":"06","name":"Alpes-Maritimes"},"188":{"code":"07","name":"Ard\u00e8che"},"189":{"code":"08","name":"Ardennes"},"190":{"code":"09","name":"Ari\u00e8ge"},"191":{"code":"10","name":"Aube"},"192":{"code":"11","name":"Aude"},"193":{"code":"12","name":"Aveyron"},"249":{"code":"67","name":"Bas-Rhin"},"194":{"code":"13","name":"Bouches-du-Rh\u00f4ne"},"195":{"code":"14","name":"Calvados"},"196":{"code":"15","name":"Cantal"},"197":{"code":"16","name":"Charente"},"198":{"code":"17","name":"Charente-Maritime"},"199":{"code":"18","name":"Cher"},"200":{"code":"19","name":"Corr\u00e8ze"},"201":{"code":"2A","name":"Corse-du-Sud"},"203":{"code":"21","name":"C\u00f4te-d'Or"},"204":{"code":"22","name":"C\u00f4tes-d'Armor"},"205":{"code":"23","name":"Creuse"},"261":{"code":"79","name":"Deux-S\u00e8vres"},"206":{"code":"24","name":"Dordogne"},"207":{"code":"25","name":"Doubs"},"208":{"code":"26","name":"Dr\u00f4me"},"273":{"code":"91","name":"Essonne"},"209":{"code":"27","name":"Eure"},"210":{"code":"28","name":"Eure-et-Loir"},"211":{"code":"29","name":"Finist\u00e8re"},"212":{"code":"30","name":"Gard"},"214":{"code":"32","name":"Gers"},"215":{"code":"33","name":"Gironde"},"250":{"code":"68","name":"Haut-Rhin"},"202":{"code":"2B","name":"Haute-Corse"},"213":{"code":"31","name":"Haute-Garonne"},"225":{"code":"43","name":"Haute-Loire"},"234":{"code":"52","name":"Haute-Marne"},"252":{"code":"70","name":"Haute-Sa\u00f4ne"},"256":{"code":"74","name":"Haute-Savoie"},"269":{"code":"87","name":"Haute-Vienne"},"186":{"code":"05","name":"Hautes-Alpes"},"247":{"code":"65","name":"Hautes-Pyr\u00e9n\u00e9es"},"274":{"code":"92","name":"Hauts-de-Seine"},"216":{"code":"34","name":"H\u00e9rault"},"217":{"code":"35","name":"Ille-et-Vilaine"},"218":{"code":"36","name":"Indre"},"219":{"code":"37","name":"Indre-et-Loire"},"220":{"code":"38","name":"Is\u00e8re"},"221":{"code":"39","name":"Jura"},"222":{"code":"40","name":"Landes"},"223":{"code":"41","name":"Loir-et-Cher"},"224":{"code":"42","name":"Loire"},"226":{"code":"44","name":"Loire-Atlantique"},"227":{"code":"45","name":"Loiret"},"228":{"code":"46","name":"Lot"},"229":{"code":"47","name":"Lot-et-Garonne"},"230":{"code":"48","name":"Loz\u00e8re"},"231":{"code":"49","name":"Maine-et-Loire"},"232":{"code":"50","name":"Manche"},"233":{"code":"51","name":"Marne"},"235":{"code":"53","name":"Mayenne"},"236":{"code":"54","name":"Meurthe-et-Moselle"},"237":{"code":"55","name":"Meuse"},"238":{"code":"56","name":"Morbihan"},"239":{"code":"57","name":"Moselle"},"240":{"code":"58","name":"Ni\u00e8vre"},"241":{"code":"59","name":"Nord"},"242":{"code":"60","name":"Oise"},"243":{"code":"61","name":"Orne"},"257":{"code":"75","name":"Paris"},"244":{"code":"62","name":"Pas-de-Calais"},"245":{"code":"63","name":"Puy-de-D\u00f4me"},"246":{"code":"64","name":"Pyr\u00e9n\u00e9es-Atlantiques"},"248":{"code":"66","name":"Pyr\u00e9n\u00e9es-Orientales"},"251":{"code":"69","name":"Rh\u00f4ne"},"253":{"code":"71","name":"Sa\u00f4ne-et-Loire"},"254":{"code":"72","name":"Sarthe"},"255":{"code":"73","name":"Savoie"},"259":{"code":"77","name":"Seine-et-Marne"},"258":{"code":"76","name":"Seine-Maritime"},"275":{"code":"93","name":"Seine-Saint-Denis"},"262":{"code":"80","name":"Somme"},"263":{"code":"81","name":"Tarn"},"264":{"code":"82","name":"Tarn-et-Garonne"},"272":{"code":"90","name":"Territoire-de-Belfort"},"277":{"code":"95","name":"Val-d'Oise"},"276":{"code":"94","name":"Val-de-Marne"},"265":{"code":"83","name":"Var"},"266":{"code":"84","name":"Vaucluse"},"267":{"code":"85","name":"Vend\u00e9e"},"268":{"code":"86","name":"Vienne"},"270":{"code":"88","name":"Vosges"},"271":{"code":"89","name":"Yonne"},"260":{"code":"78","name":"Yvelines"}},"US":{"1":{"code":"AL","name":"Alabama"},"2":{"code":"AK","name":"Alaska"},"3":{"code":"AS","name":"American Samoa"},"4":{"code":"AZ","name":"Arizona"},"5":{"code":"AR","name":"Arkansas"},"6":{"code":"AF","name":"Armed Forces Africa"},"7":{"code":"AA","name":"Armed Forces Americas"},"8":{"code":"AC","name":"Armed Forces Canada"},"9":{"code":"AE","name":"Armed Forces Europe"},"10":{"code":"AM","name":"Armed Forces Middle East"},"11":{"code":"AP","name":"Armed Forces Pacific"},"12":{"code":"CA","name":"California"},"13":{"code":"CO","name":"Colorado"},"14":{"code":"CT","name":"Connecticut"},"15":{"code":"DE","name":"Delaware"},"16":{"code":"DC","name":"District of Columbia"},"17":{"code":"FM","name":"Federated States Of Micronesia"},"18":{"code":"FL","name":"Florida"},"19":{"code":"GA","name":"Georgia"},"20":{"code":"GU","name":"Guam"},"21":{"code":"HI","name":"Hawaii"},"22":{"code":"ID","name":"Idaho"},"23":{"code":"IL","name":"Illinois"},"24":{"code":"IN","name":"Indiana"},"25":{"code":"IA","name":"Iowa"},"26":{"code":"KS","name":"Kansas"},"27":{"code":"KY","name":"Kentucky"},"28":{"code":"LA","name":"Louisiana"},"29":{"code":"ME","name":"Maine"},"30":{"code":"MH","name":"Marshall Islands"},"31":{"code":"MD","name":"Maryland"},"32":{"code":"MA","name":"Massachusetts"},"33":{"code":"MI","name":"Michigan"},"34":{"code":"MN","name":"Minnesota"},"35":{"code":"MS","name":"Mississippi"},"36":{"code":"MO","name":"Missouri"},"37":{"code":"MT","name":"Montana"},"38":{"code":"NE","name":"Nebraska"},"39":{"code":"NV","name":"Nevada"},"40":{"code":"NH","name":"New Hampshire"},"41":{"code":"NJ","name":"New Jersey"},"42":{"code":"NM","name":"New Mexico"},"43":{"code":"NY","name":"New York"},"44":{"code":"NC","name":"North Carolina"},"45":{"code":"ND","name":"North Dakota"},"46":{"code":"MP","name":"Northern Mariana Islands"},"47":{"code":"OH","name":"Ohio"},"48":{"code":"OK","name":"Oklahoma"},"49":{"code":"OR","name":"Oregon"},"50":{"code":"PW","name":"Palau"},"51":{"code":"PA","name":"Pennsylvania"},"52":{"code":"PR","name":"Puerto Rico"},"53":{"code":"RI","name":"Rhode Island"},"54":{"code":"SC","name":"South Carolina"},"55":{"code":"SD","name":"South Dakota"},"56":{"code":"TN","name":"Tennessee"},"57":{"code":"TX","name":"Texas"},"58":{"code":"UT","name":"Utah"},"59":{"code":"VT","name":"Vermont"},"60":{"code":"VI","name":"Virgin Islands"},"61":{"code":"VA","name":"Virginia"},"62":{"code":"WA","name":"Washington"},"63":{"code":"WV","name":"West Virginia"},"64":{"code":"WI","name":"Wisconsin"},"65":{"code":"WY","name":"Wyoming"}},"RO":{"278":{"code":"AB","name":"Alba"},"279":{"code":"AR","name":"Arad"},"280":{"code":"AG","name":"Arge\u015f"},"281":{"code":"BC","name":"Bac\u0103u"},"282":{"code":"BH","name":"Bihor"},"283":{"code":"BN","name":"Bistri\u0163a-N\u0103s\u0103ud"},"284":{"code":"BT","name":"Boto\u015fani"},"286":{"code":"BR","name":"Br\u0103ila"},"285":{"code":"BV","name":"Bra\u015fov"},"287":{"code":"B","name":"Bucure\u015fti"},"288":{"code":"BZ","name":"Buz\u0103u"},"290":{"code":"CL","name":"C\u0103l\u0103ra\u015fi"},"289":{"code":"CS","name":"Cara\u015f-Severin"},"291":{"code":"CJ","name":"Cluj"},"292":{"code":"CT","name":"Constan\u0163a"},"293":{"code":"CV","name":"Covasna"},"294":{"code":"DB","name":"D\u00e2mbovi\u0163a"},"295":{"code":"DJ","name":"Dolj"},"296":{"code":"GL","name":"Gala\u0163i"},"297":{"code":"GR","name":"Giurgiu"},"298":{"code":"GJ","name":"Gorj"},"299":{"code":"HR","name":"Harghita"},"300":{"code":"HD","name":"Hunedoara"},"301":{"code":"IL","name":"Ialomi\u0163a"},"302":{"code":"IS","name":"Ia\u015fi"},"303":{"code":"IF","name":"Ilfov"},"304":{"code":"MM","name":"Maramure\u015f"},"305":{"code":"MH","name":"Mehedin\u0163i"},"306":{"code":"MS","name":"Mure\u015f"},"307":{"code":"NT","name":"Neam\u0163"},"308":{"code":"OT","name":"Olt"},"309":{"code":"PH","name":"Prahova"},"311":{"code":"SJ","name":"S\u0103laj"},"310":{"code":"SM","name":"Satu-Mare"},"312":{"code":"SB","name":"Sibiu"},"313":{"code":"SV","name":"Suceava"},"314":{"code":"TR","name":"Teleorman"},"315":{"code":"TM","name":"Timi\u015f"},"316":{"code":"TL","name":"Tulcea"},"318":{"code":"VL","name":"V\u00e2lcea"},"317":{"code":"VS","name":"Vaslui"},"319":{"code":"VN","name":"Vrancea"}},"CA":{"66":{"code":"AB","name":"Alberta"},"67":{"code":"BC","name":"British Columbia"},"68":{"code":"MB","name":"Manitoba"},"70":{"code":"NB","name":"New Brunswick"},"69":{"code":"NL","name":"Newfoundland and Labrador"},"72":{"code":"NT","name":"Northwest Territories"},"71":{"code":"NS","name":"Nova Scotia"},"73":{"code":"NU","name":"Nunavut"},"74":{"code":"ON","name":"Ontario"},"75":{"code":"PE","name":"Prince Edward Island"},"76":{"code":"QC","name":"Quebec"},"77":{"code":"SK","name":"Saskatchewan"},"78":{"code":"YT","name":"Yukon Territory"}},"DE":{"80":{"code":"BAW","name":"Baden-W\u00fcrttemberg"},"81":{"code":"BAY","name":"Bayern"},"82":{"code":"BER","name":"Berlin"},"83":{"code":"BRG","name":"Brandenburg"},"84":{"code":"BRE","name":"Bremen"},"85":{"code":"HAM","name":"Hamburg"},"86":{"code":"HES","name":"Hessen"},"87":{"code":"MEC","name":"Mecklenburg-Vorpommern"},"79":{"code":"NDS","name":"Niedersachsen"},"88":{"code":"NRW","name":"Nordrhein-Westfalen"},"89":{"code":"RHE","name":"Rheinland-Pfalz"},"90":{"code":"SAR","name":"Saarland"},"91":{"code":"SAS","name":"Sachsen"},"92":{"code":"SAC","name":"Sachsen-Anhalt"},"93":{"code":"SCN","name":"Schleswig-Holstein"},"94":{"code":"THE","name":"Th\u00fcringen"}},"AT":{"102":{"code":"BL","name":"Burgenland"},"99":{"code":"KN","name":"K\u00e4rnten"},"96":{"code":"NO","name":"Nieder\u00f6sterreich"},"97":{"code":"OO","name":"Ober\u00f6sterreich"},"98":{"code":"SB","name":"Salzburg"},"100":{"code":"ST","name":"Steiermark"},"101":{"code":"TI","name":"Tirol"},"103":{"code":"VB","name":"Voralberg"},"95":{"code":"WI","name":"Wien"}}}, undefined, 'billing:postcode');
    if ($('onepage-guest-register-button')) {
        Event.observe($('onepage-guest-register-button'), 'click', function(event) {
            var billingRememberMe = $('co-billing-form').select('#remember-me-box');
            if (billingRememberMe.length > 0) {
                if ($('login:guest') && $('login:guest').checked) {
                    billingRememberMe[0].hide();
                } else if ($('login:register') && ($('login:register').checked || $('login:register').type == 'hidden')) {
                    billingRememberMe[0].show();
                }
            }
        });
    }
//]]>
</script>
        </div>
    </li>
    <li id="opc-shipping" class="section allow active">
        <div class="step-title">
            <span class="number">3</span>
            <h2>Shipping Information</h2>
            <a href="http://demo.icebergcommerce.com/checkout/onepage/#">Edit</a>
        </div>
        <div id="checkout-step-shipping" class="step a-item">
            <form action="" id="co-shipping-form">
    <ul class="form-list">
            <li id="shipping-new-address-form">
            <fieldset>
                <input type="hidden" name="shipping[address_id]" value="" id="shipping:address_id">
                <ul>
                    <li class="fields"><div class="customer-name">
    <div class="field name-firstname">
        <label for="shipping:firstname" class="required"><em>*</em>First Name</label>
        <div class="input-box">
            <input type="text" id="shipping:firstname" name="shipping[firstname]" value="" title="First Name" maxlength="255" class="input-text required-entry" onchange="shipping.setSameAsBilling(false)">
        </div>
    </div>
    <div class="field name-lastname">
        <label for="shipping:lastname" class="required"><em>*</em>Last Name</label>
        <div class="input-box">
            <input type="text" id="shipping:lastname" name="shipping[lastname]" value="" title="Last Name" maxlength="255" class="input-text required-entry" onchange="shipping.setSameAsBilling(false)">
        </div>
    </div>
</div>
</li>
                    <li class="fields">
                        <div class="fields">
                            <label for="shipping:company">Company</label>
                            <div class="input-box">
                                <input type="text" id="shipping:company" name="shipping[company]" value="" title="Company" class="input-text " onchange="shipping.setSameAsBilling(false);">
                            </div>
                        </div>
                    </li>
                                <li class="wide">
                        <label for="shipping:street1" class="required"><em>*</em>Address</label>
                        <div class="input-box">
                            <input type="text" title="Street Address" name="shipping[street][]" id="shipping:street1" value="" class="input-text  required-entry" onchange="shipping.setSameAsBilling(false);">
                        </div>
                    </li>
                                            <li class="wide">
                        <div class="input-box">
                            <input type="text" title="Street Address 2" name="shipping[street][]" id="shipping:street2" value="" class="input-text " onchange="shipping.setSameAsBilling(false);">
                        </div>
                    </li>
                                                    <li class="fields">
                        <div class="field">
                            <label for="shipping:city" class="required"><em>*</em>City</label>
                            <div class="input-box">
                                <input type="text" title="City" name="shipping[city]" value="" class="input-text  required-entry" id="shipping:city" onchange="shipping.setSameAsBilling(false);">
                            </div>
                        </div>
                        <div class="field">
                            <label for="shipping:region" class="required"><em>*</em>State/Province</label>
                            <div class="input-box">
                                <select id="shipping:region_id" name="shipping[region_id]" title="State/Province" class="validate-select required-entry" defaultvalue="">
                                    <option value="">Please select region, state or province</option>
                                <option value="1" title="Alabama">Alabama</option><option value="2" title="Alaska">Alaska</option><option value="3" title="American Samoa">American Samoa</option><option value="4" title="Arizona">Arizona</option><option value="5" title="Arkansas">Arkansas</option><option value="6" title="Armed Forces Africa">Armed Forces Africa</option><option value="7" title="Armed Forces Americas">Armed Forces Americas</option><option value="8" title="Armed Forces Canada">Armed Forces Canada</option><option value="9" title="Armed Forces Europe">Armed Forces Europe</option><option value="10" title="Armed Forces Middle East">Armed Forces Middle East</option><option value="11" title="Armed Forces Pacific">Armed Forces Pacific</option><option value="12" title="California">California</option><option value="13" title="Colorado">Colorado</option><option value="14" title="Connecticut">Connecticut</option><option value="15" title="Delaware">Delaware</option><option value="16" title="District of Columbia">District of Columbia</option><option value="17" title="Federated States Of Micronesia">Federated States Of Micronesia</option><option value="18" title="Florida">Florida</option><option value="19" title="Georgia">Georgia</option><option value="20" title="Guam">Guam</option><option value="21" title="Hawaii">Hawaii</option><option value="22" title="Idaho">Idaho</option><option value="23" title="Illinois">Illinois</option><option value="24" title="Indiana">Indiana</option><option value="25" title="Iowa">Iowa</option><option value="26" title="Kansas">Kansas</option><option value="27" title="Kentucky">Kentucky</option><option value="28" title="Louisiana">Louisiana</option><option value="29" title="Maine">Maine</option><option value="30" title="Marshall Islands">Marshall Islands</option><option value="31" title="Maryland">Maryland</option><option value="32" title="Massachusetts">Massachusetts</option><option value="33" title="Michigan">Michigan</option><option value="34" title="Minnesota">Minnesota</option><option value="35" title="Mississippi">Mississippi</option><option value="36" title="Missouri">Missouri</option><option value="37" title="Montana">Montana</option><option value="38" title="Nebraska">Nebraska</option><option value="39" title="Nevada">Nevada</option><option value="40" title="New Hampshire">New Hampshire</option><option value="41" title="New Jersey">New Jersey</option><option value="42" title="New Mexico">New Mexico</option><option value="43" title="New York">New York</option><option value="44" title="North Carolina">North Carolina</option><option value="45" title="North Dakota">North Dakota</option><option value="46" title="Northern Mariana Islands">Northern Mariana Islands</option><option value="47" title="Ohio">Ohio</option><option value="48" title="Oklahoma">Oklahoma</option><option value="49" title="Oregon">Oregon</option><option value="50" title="Palau">Palau</option><option value="51" title="Pennsylvania">Pennsylvania</option><option value="52" title="Puerto Rico">Puerto Rico</option><option value="53" title="Rhode Island">Rhode Island</option><option value="54" title="South Carolina">South Carolina</option><option value="55" title="South Dakota">South Dakota</option><option value="56" title="Tennessee">Tennessee</option><option value="57" title="Texas">Texas</option><option value="58" title="Utah">Utah</option><option value="59" title="Vermont">Vermont</option><option value="60" title="Virgin Islands">Virgin Islands</option><option value="61" title="Virginia">Virginia</option><option value="62" title="Washington">Washington</option><option value="63" title="West Virginia">West Virginia</option><option value="64" title="Wisconsin">Wisconsin</option><option value="65" title="Wyoming">Wyoming</option></select>
                                <script type="text/javascript">
                                //<![CDATA[
                                    $('shipping:region_id').setAttribute('defaultValue',  "");
                                //]]>
                                </script>
                                <input type="text" id="shipping:region" name="shipping[region]" value="" title="State/Province" class="input-text regions required-entry" style="display:none;">
                            </div>
                        </div>
                    </li>
                    <li class="fields">
                        <div class="field">
                            <label for="shipping:postcode" class="required"><em>*</em>Zip/Postal Code</label>
                            <div class="input-box">
                                <input type="text" title="Zip/Postal Code" name="shipping[postcode]" id="shipping:postcode" value="" class="input-text validate-zip-international  required-entry" onchange="shipping.setSameAsBilling(false);">
                            </div>
                        </div>
                        <div class="field">
                            <label for="shipping:country_id" class="required"><em>*</em>Country</label>
                            <div class="input-box">
                                <select name="shipping[country_id]" id="shipping:country_id" class="validate-select" title="Country" onchange="if(window.shipping)shipping.setSameAsBilling(false);"><option value=""> </option><option value="AF">Afghanistan</option><option value="AX">Åland Islands</option><option value="AL">Albania</option><option value="DZ">Algeria</option><option value="AS">American Samoa</option><option value="AD">Andorra</option><option value="AO">Angola</option><option value="AI">Anguilla</option><option value="AQ">Antarctica</option><option value="AG">Antigua and Barbuda</option><option value="AR">Argentina</option><option value="AM">Armenia</option><option value="AW">Aruba</option><option value="AU">Australia</option><option value="AT">Austria</option><option value="AZ">Azerbaijan</option><option value="BS">Bahamas</option><option value="BH">Bahrain</option><option value="BD">Bangladesh</option><option value="BB">Barbados</option><option value="BY">Belarus</option><option value="BE">Belgium</option><option value="BZ">Belize</option><option value="BJ">Benin</option><option value="BM">Bermuda</option><option value="BT">Bhutan</option><option value="BO">Bolivia</option><option value="BA">Bosnia and Herzegovina</option><option value="BW">Botswana</option><option value="BV">Bouvet Island</option><option value="BR">Brazil</option><option value="IO">British Indian Ocean Territory</option><option value="VG">British Virgin Islands</option><option value="BN">Brunei</option><option value="BG">Bulgaria</option><option value="BF">Burkina Faso</option><option value="BI">Burundi</option><option value="KH">Cambodia</option><option value="CM">Cameroon</option><option value="CA">Canada</option><option value="CV">Cape Verde</option><option value="KY">Cayman Islands</option><option value="CF">Central African Republic</option><option value="TD">Chad</option><option value="CL">Chile</option><option value="CN">China</option><option value="CX">Christmas Island</option><option value="CC">Cocos [Keeling] Islands</option><option value="CO">Colombia</option><option value="KM">Comoros</option><option value="CG">Congo - Brazzaville</option><option value="CD">Congo - Kinshasa</option><option value="CK">Cook Islands</option><option value="CR">Costa Rica</option><option value="CI">Côte d’Ivoire</option><option value="HR">Croatia</option><option value="CU">Cuba</option><option value="CY">Cyprus</option><option value="CZ">Czech Republic</option><option value="DK">Denmark</option><option value="DJ">Djibouti</option><option value="DM">Dominica</option><option value="DO">Dominican Republic</option><option value="EC">Ecuador</option><option value="EG">Egypt</option><option value="SV">El Salvador</option><option value="GQ">Equatorial Guinea</option><option value="ER">Eritrea</option><option value="EE">Estonia</option><option value="ET">Ethiopia</option><option value="FK">Falkland Islands</option><option value="FO">Faroe Islands</option><option value="FJ">Fiji</option><option value="FI">Finland</option><option value="FR">France</option><option value="GF">French Guiana</option><option value="PF">French Polynesia</option><option value="TF">French Southern Territories</option><option value="GA">Gabon</option><option value="GM">Gambia</option><option value="GE">Georgia</option><option value="DE">Germany</option><option value="GH">Ghana</option><option value="GI">Gibraltar</option><option value="GR">Greece</option><option value="GL">Greenland</option><option value="GD">Grenada</option><option value="GP">Guadeloupe</option><option value="GU">Guam</option><option value="GT">Guatemala</option><option value="GG">Guernsey</option><option value="GN">Guinea</option><option value="GW">Guinea-Bissau</option><option value="GY">Guyana</option><option value="HT">Haiti</option><option value="HM">Heard Island and McDonald Islands</option><option value="HN">Honduras</option><option value="HK">Hong Kong SAR China</option><option value="HU">Hungary</option><option value="IS">Iceland</option><option value="IN">India</option><option value="ID">Indonesia</option><option value="IR">Iran</option><option value="IQ">Iraq</option><option value="IE">Ireland</option><option value="IM">Isle of Man</option><option value="IL">Israel</option><option value="IT">Italy</option><option value="JM">Jamaica</option><option value="JP">Japan</option><option value="JE">Jersey</option><option value="JO">Jordan</option><option value="KZ">Kazakhstan</option><option value="KE">Kenya</option><option value="KI">Kiribati</option><option value="KW">Kuwait</option><option value="KG">Kyrgyzstan</option><option value="LA">Laos</option><option value="LV">Latvia</option><option value="LB">Lebanon</option><option value="LS">Lesotho</option><option value="LR">Liberia</option><option value="LY">Libya</option><option value="LI">Liechtenstein</option><option value="LT">Lithuania</option><option value="LU">Luxembourg</option><option value="MO">Macau SAR China</option><option value="MK">Macedonia</option><option value="MG">Madagascar</option><option value="MW">Malawi</option><option value="MY">Malaysia</option><option value="MV">Maldives</option><option value="ML">Mali</option><option value="MT">Malta</option><option value="MH">Marshall Islands</option><option value="MQ">Martinique</option><option value="MR">Mauritania</option><option value="MU">Mauritius</option><option value="YT">Mayotte</option><option value="MX">Mexico</option><option value="FM">Micronesia</option><option value="MD">Moldova</option><option value="MC">Monaco</option><option value="MN">Mongolia</option><option value="ME">Montenegro</option><option value="MS">Montserrat</option><option value="MA">Morocco</option><option value="MZ">Mozambique</option><option value="MM">Myanmar [Burma]</option><option value="NA">Namibia</option><option value="NR">Nauru</option><option value="NP">Nepal</option><option value="NL">Netherlands</option><option value="AN">Netherlands Antilles</option><option value="NC">New Caledonia</option><option value="NZ">New Zealand</option><option value="NI">Nicaragua</option><option value="NE">Niger</option><option value="NG">Nigeria</option><option value="NU">Niue</option><option value="NF">Norfolk Island</option><option value="MP">Northern Mariana Islands</option><option value="KP">North Korea</option><option value="NO">Norway</option><option value="OM">Oman</option><option value="PK">Pakistan</option><option value="PW">Palau</option><option value="PS">Palestinian Territories</option><option value="PA">Panama</option><option value="PG">Papua New Guinea</option><option value="PY">Paraguay</option><option value="PE">Peru</option><option value="PH">Philippines</option><option value="PN">Pitcairn Islands</option><option value="PL">Poland</option><option value="PT">Portugal</option><option value="PR">Puerto Rico</option><option value="QA">Qatar</option><option value="RE">Réunion</option><option value="RO">Romania</option><option value="RU">Russia</option><option value="RW">Rwanda</option><option value="BL">Saint Barthélemy</option><option value="SH">Saint Helena</option><option value="KN">Saint Kitts and Nevis</option><option value="LC">Saint Lucia</option><option value="MF">Saint Martin</option><option value="PM">Saint Pierre and Miquelon</option><option value="VC">Saint Vincent and the Grenadines</option><option value="WS">Samoa</option><option value="SM">San Marino</option><option value="ST">São Tomé and Príncipe</option><option value="SA">Saudi Arabia</option><option value="SN">Senegal</option><option value="RS">Serbia</option><option value="SC">Seychelles</option><option value="SL">Sierra Leone</option><option value="SG">Singapore</option><option value="SK">Slovakia</option><option value="SI">Slovenia</option><option value="SB">Solomon Islands</option><option value="SO">Somalia</option><option value="ZA">South Africa</option><option value="GS">South Georgia and the South Sandwich Islands</option><option value="KR">South Korea</option><option value="ES">Spain</option><option value="LK">Sri Lanka</option><option value="SD">Sudan</option><option value="SR">Suriname</option><option value="SJ">Svalbard and Jan Mayen</option><option value="SZ">Swaziland</option><option value="SE">Sweden</option><option value="CH">Switzerland</option><option value="SY">Syria</option><option value="TW">Taiwan</option><option value="TJ">Tajikistan</option><option value="TZ">Tanzania</option><option value="TH">Thailand</option><option value="TL">Timor-Leste</option><option value="TG">Togo</option><option value="TK">Tokelau</option><option value="TO">Tonga</option><option value="TT">Trinidad and Tobago</option><option value="TN">Tunisia</option><option value="TR">Turkey</option><option value="TM">Turkmenistan</option><option value="TC">Turks and Caicos Islands</option><option value="TV">Tuvalu</option><option value="UG">Uganda</option><option value="UA">Ukraine</option><option value="AE">United Arab Emirates</option><option value="GB">United Kingdom</option><option value="US" selected="selected">United States</option><option value="UY">Uruguay</option><option value="UM">U.S. Minor Outlying Islands</option><option value="VI">U.S. Virgin Islands</option><option value="UZ">Uzbekistan</option><option value="VU">Vanuatu</option><option value="VA">Vatican City</option><option value="VE">Venezuela</option><option value="VN">Vietnam</option><option value="WF">Wallis and Futuna</option><option value="EH">Western Sahara</option><option value="YE">Yemen</option><option value="ZM">Zambia</option><option value="ZW">Zimbabwe</option></select>                            </div>
                        </div>
                    </li>
                    <li class="fields">
                        <div class="field">
                            <label for="shipping:telephone" class="required"><em>*</em>Telephone</label>
                            <div class="input-box">
                                <input type="text" name="shipping[telephone]" value="" title="Telephone" class="input-text  required-entry" id="shipping:telephone" onchange="shipping.setSameAsBilling(false);">
                            </div>
                        </div>
                        <div class="field">
                            <label for="shipping:fax">Fax</label>
                            <div class="input-box">
                                <input type="text" name="shipping[fax]" value="" title="Fax" class="input-text " id="shipping:fax" onchange="shipping.setSameAsBilling(false);">
                            </div>
                        </div>
                    </li>
                                    <li class="no-display"><input type="hidden" name="shipping[save_in_address_book]" value="1"></li>
                                </ul>
            </fieldset>
        </li>
        <li class="control">
            <input type="checkbox" name="shipping[same_as_billing]" id="shipping:same_as_billing" value="1" title="Use Billing Address" onclick="shipping.setSameAsBilling(this.checked)" class="checkbox"><label for="shipping:same_as_billing">Use Billing Address</label>
        </li>
        <li><button type="button" class="btn btn-link" id="store-locator" data-toggle="modal" class="btn btn-info" href="store-locator.php" data-target="#myModal">Locate Store</button></li>
    </ul>
    <div class="buttons-set" id="shipping-buttons-container">
        <p class="required">* Required Fields</p>
        <p class="back-link"><a href="http://demo.icebergcommerce.com/checkout/onepage/#" onclick="checkout.back(); return false;"><small>« </small>Back</a></p>
        <button type="button" class="button" title="Continue" onclick="shipping.save()"><span><span>Continue</span></span></button>
        <span id="shipping-please-wait" class="please-wait" style="display:none;">
            <img src="./Checkout-ship_files/opc-ajax-loader.gif" alt="Loading next step..." title="Loading next step..." class="v-middle"> Loading next step...        </span>
    </div>
</form>
<script type="text/javascript">
//<![CDATA[
    var shipping = new Shipping('co-shipping-form', 'http://demo.icebergcommerce.com/checkout/onepage/getAddress/address/', 'http://demo.icebergcommerce.com/checkout/onepage/saveShipping/',
        'http://demo.icebergcommerce.com/checkout/onepage/shippingMethod/');
    var shippingForm = new VarienForm('co-shipping-form');
    shippingForm.extraChildParams = ' onchange="shipping.setSameAsBilling(false);"';
    //shippingForm.setElementsRelation('shipping:country_id', 'shipping:region', 'http://demo.icebergcommerce.com/directory/json/childRegion/', 'Select State/Province...');
    $('shipping-address-select') && shipping.newAddress(!$('shipping-address-select').value);

    var shippingRegionUpdater = new RegionUpdater('shipping:country_id', 'shipping:region', 'shipping:region_id', {"config":{"show_all_regions":true,"regions_required":["AT","CA","CH","DE","EE","ES","FI","FR","LT","LV","RO","US"]},"LV":{"471":{"code":"\u0100da\u017eu novads","name":"\u0100da\u017eu novads"},"366":{"code":"Aglonas novads","name":"Aglonas novads"},"367":{"code":"LV-AI","name":"Aizkraukles novads"},"368":{"code":"Aizputes novads","name":"Aizputes novads"},"369":{"code":"Akn\u012bstes novads","name":"Akn\u012bstes novads"},"370":{"code":"Alojas novads","name":"Alojas novads"},"371":{"code":"Alsungas novads","name":"Alsungas novads"},"372":{"code":"LV-AL","name":"Al\u016bksnes novads"},"373":{"code":"Amatas novads","name":"Amatas novads"},"374":{"code":"Apes novads","name":"Apes novads"},"375":{"code":"Auces novads","name":"Auces novads"},"376":{"code":"Bab\u012btes novads","name":"Bab\u012btes novads"},"377":{"code":"Baldones novads","name":"Baldones novads"},"378":{"code":"Baltinavas novads","name":"Baltinavas novads"},"379":{"code":"LV-BL","name":"Balvu novads"},"380":{"code":"LV-BU","name":"Bauskas novads"},"381":{"code":"Bever\u012bnas novads","name":"Bever\u012bnas novads"},"382":{"code":"Broc\u0113nu novads","name":"Broc\u0113nu novads"},"383":{"code":"Burtnieku novads","name":"Burtnieku novads"},"384":{"code":"Carnikavas novads","name":"Carnikavas novads"},"387":{"code":"LV-CE","name":"C\u0113su novads"},"385":{"code":"Cesvaines novads","name":"Cesvaines novads"},"386":{"code":"Ciblas novads","name":"Ciblas novads"},"388":{"code":"Dagdas novads","name":"Dagdas novads"},"355":{"code":"LV-DGV","name":"Daugavpils"},"389":{"code":"LV-DA","name":"Daugavpils novads"},"390":{"code":"LV-DO","name":"Dobeles novads"},"391":{"code":"Dundagas novads","name":"Dundagas novads"},"392":{"code":"Durbes novads","name":"Durbes novads"},"393":{"code":"Engures novads","name":"Engures novads"},"472":{"code":"\u0112rg\u013cu novads","name":"\u0112rg\u013cu novads"},"394":{"code":"Garkalnes novads","name":"Garkalnes novads"},"395":{"code":"Grobi\u0146as novads","name":"Grobi\u0146as novads"},"396":{"code":"LV-GU","name":"Gulbenes novads"},"397":{"code":"Iecavas novads","name":"Iecavas novads"},"398":{"code":"Ik\u0161\u0137iles novads","name":"Ik\u0161\u0137iles novads"},"399":{"code":"Il\u016bkstes novads","name":"Il\u016bkstes novads"},"400":{"code":"In\u010dukalna novads","name":"In\u010dukalna novads"},"401":{"code":"Jaunjelgavas novads","name":"Jaunjelgavas novads"},"402":{"code":"Jaunpiebalgas novads","name":"Jaunpiebalgas novads"},"403":{"code":"Jaunpils novads","name":"Jaunpils novads"},"357":{"code":"J\u0113kabpils","name":"J\u0113kabpils"},"405":{"code":"LV-JK","name":"J\u0113kabpils novads"},"356":{"code":"LV-JEL","name":"Jelgava"},"404":{"code":"LV-JL","name":"Jelgavas novads"},"358":{"code":"LV-JUR","name":"J\u016brmala"},"406":{"code":"Kandavas novads","name":"Kandavas novads"},"412":{"code":"K\u0101rsavas novads","name":"K\u0101rsavas novads"},"473":{"code":"\u0136eguma novads","name":"\u0136eguma novads"},"474":{"code":"\u0136ekavas novads","name":"\u0136ekavas novads"},"407":{"code":"Kokneses novads","name":"Kokneses novads"},"410":{"code":"LV-KR","name":"Kr\u0101slavas novads"},"408":{"code":"Krimuldas novads","name":"Krimuldas novads"},"409":{"code":"Krustpils novads","name":"Krustpils novads"},"411":{"code":"LV-KU","name":"Kuld\u012bgas novads"},"413":{"code":"Lielv\u0101rdes novads","name":"Lielv\u0101rdes novads"},"359":{"code":"LV-LPX","name":"Liep\u0101ja"},"360":{"code":"LV-LE","name":"Liep\u0101jas novads"},"417":{"code":"L\u012bgatnes novads","name":"L\u012bgatnes novads"},"414":{"code":"LV-LM","name":"Limba\u017eu novads"},"418":{"code":"L\u012bv\u0101nu novads","name":"L\u012bv\u0101nu novads"},"415":{"code":"Lub\u0101nas novads","name":"Lub\u0101nas novads"},"416":{"code":"LV-LU","name":"Ludzas novads"},"419":{"code":"LV-MA","name":"Madonas novads"},"421":{"code":"M\u0101lpils novads","name":"M\u0101lpils novads"},"422":{"code":"M\u0101rupes novads","name":"M\u0101rupes novads"},"420":{"code":"Mazsalacas novads","name":"Mazsalacas novads"},"423":{"code":"Nauk\u0161\u0113nu novads","name":"Nauk\u0161\u0113nu novads"},"424":{"code":"Neretas novads","name":"Neretas novads"},"425":{"code":"N\u012bcas novads","name":"N\u012bcas novads"},"426":{"code":"LV-OG","name":"Ogres novads"},"427":{"code":"Olaines novads","name":"Olaines novads"},"428":{"code":"Ozolnieku novads","name":"Ozolnieku novads"},"432":{"code":"P\u0101rgaujas novads","name":"P\u0101rgaujas novads"},"433":{"code":"P\u0101vilostas novads","name":"P\u0101vilostas novads"},"434":{"code":"P\u013cavi\u0146u novads","name":"P\u013cavi\u0146u novads"},"429":{"code":"LV-PR","name":"Prei\u013cu novads"},"430":{"code":"Priekules novads","name":"Priekules novads"},"431":{"code":"Prieku\u013cu novads","name":"Prieku\u013cu novads"},"435":{"code":"Raunas novads","name":"Raunas novads"},"361":{"code":"LV-REZ","name":"R\u0113zekne"},"442":{"code":"LV-RE","name":"R\u0113zeknes novads"},"436":{"code":"Riebi\u0146u novads","name":"Riebi\u0146u novads"},"362":{"code":"LV-RIX","name":"R\u012bga"},"363":{"code":"LV-RI","name":"R\u012bgas novads"},"437":{"code":"Rojas novads","name":"Rojas novads"},"438":{"code":"Ropa\u017eu novads","name":"Ropa\u017eu novads"},"439":{"code":"Rucavas novads","name":"Rucavas novads"},"440":{"code":"Rug\u0101ju novads","name":"Rug\u0101ju novads"},"443":{"code":"R\u016bjienas novads","name":"R\u016bjienas novads"},"441":{"code":"Rund\u0101les novads","name":"Rund\u0101les novads"},"444":{"code":"Salacgr\u012bvas novads","name":"Salacgr\u012bvas novads"},"445":{"code":"Salas novads","name":"Salas novads"},"446":{"code":"Salaspils novads","name":"Salaspils novads"},"447":{"code":"LV-SA","name":"Saldus novads"},"448":{"code":"Saulkrastu novads","name":"Saulkrastu novads"},"455":{"code":"S\u0113jas novads","name":"S\u0113jas novads"},"449":{"code":"Siguldas novads","name":"Siguldas novads"},"451":{"code":"Skr\u012bveru novads","name":"Skr\u012bveru novads"},"450":{"code":"Skrundas novads","name":"Skrundas novads"},"452":{"code":"Smiltenes novads","name":"Smiltenes novads"},"453":{"code":"Stopi\u0146u novads","name":"Stopi\u0146u novads"},"454":{"code":"Stren\u010du novads","name":"Stren\u010du novads"},"456":{"code":"LV-TA","name":"Talsu novads"},"458":{"code":"T\u0113rvetes novads","name":"T\u0113rvetes novads"},"457":{"code":"LV-TU","name":"Tukuma novads"},"459":{"code":"Vai\u0146odes novads","name":"Vai\u0146odes novads"},"460":{"code":"LV-VK","name":"Valkas novads"},"364":{"code":"Valmiera","name":"Valmiera"},"461":{"code":"LV-VM","name":"Valmieras novads"},"462":{"code":"Varak\u013c\u0101nu novads","name":"Varak\u013c\u0101nu novads"},"469":{"code":"V\u0101rkavas novads","name":"V\u0101rkavas novads"},"463":{"code":"Vecpiebalgas novads","name":"Vecpiebalgas novads"},"464":{"code":"Vecumnieku novads","name":"Vecumnieku novads"},"365":{"code":"LV-VEN","name":"Ventspils"},"465":{"code":"LV-VE","name":"Ventspils novads"},"466":{"code":"Vies\u012btes novads","name":"Vies\u012btes novads"},"467":{"code":"Vi\u013cakas novads","name":"Vi\u013cakas novads"},"468":{"code":"Vi\u013c\u0101nu novads","name":"Vi\u013c\u0101nu novads"},"470":{"code":"Zilupes novads","name":"Zilupes novads"}},"FI":{"339":{"code":"Ahvenanmaa","name":"Ahvenanmaa"},"333":{"code":"Etel\u00e4-Karjala","name":"Etel\u00e4-Karjala"},"326":{"code":"Etel\u00e4-Pohjanmaa","name":"Etel\u00e4-Pohjanmaa"},"325":{"code":"Etel\u00e4-Savo","name":"Etel\u00e4-Savo"},"337":{"code":"It\u00e4-Uusimaa","name":"It\u00e4-Uusimaa"},"322":{"code":"Kainuu","name":"Kainuu"},"335":{"code":"Kanta-H\u00e4me","name":"Kanta-H\u00e4me"},"330":{"code":"Keski-Pohjanmaa","name":"Keski-Pohjanmaa"},"331":{"code":"Keski-Suomi","name":"Keski-Suomi"},"338":{"code":"Kymenlaakso","name":"Kymenlaakso"},"320":{"code":"Lappi","name":"Lappi"},"334":{"code":"P\u00e4ij\u00e4t-H\u00e4me","name":"P\u00e4ij\u00e4t-H\u00e4me"},"328":{"code":"Pirkanmaa","name":"Pirkanmaa"},"327":{"code":"Pohjanmaa","name":"Pohjanmaa"},"323":{"code":"Pohjois-Karjala","name":"Pohjois-Karjala"},"321":{"code":"Pohjois-Pohjanmaa","name":"Pohjois-Pohjanmaa"},"324":{"code":"Pohjois-Savo","name":"Pohjois-Savo"},"329":{"code":"Satakunta","name":"Satakunta"},"336":{"code":"Uusimaa","name":"Uusimaa"},"332":{"code":"Varsinais-Suomi","name":"Varsinais-Suomi"}},"LT":{"475":{"code":"LT-AL","name":"Alytaus Apskritis"},"476":{"code":"LT-KU","name":"Kauno Apskritis"},"477":{"code":"LT-KL","name":"Klaip\u0117dos Apskritis"},"478":{"code":"LT-MR","name":"Marijampol\u0117s Apskritis"},"479":{"code":"LT-PN","name":"Panev\u0117\u017eio Apskritis"},"480":{"code":"LT-SA","name":"\u0160iauli\u0173 Apskritis"},"481":{"code":"LT-TA","name":"Taurag\u0117s Apskritis"},"482":{"code":"LT-TE","name":"Tel\u0161i\u0173 Apskritis"},"483":{"code":"LT-UT","name":"Utenos Apskritis"},"484":{"code":"LT-VL","name":"Vilniaus Apskritis"}},"EE":{"340":{"code":"EE-37","name":"Harjumaa"},"341":{"code":"EE-39","name":"Hiiumaa"},"342":{"code":"EE-44","name":"Ida-Virumaa"},"344":{"code":"EE-51","name":"J\u00e4rvamaa"},"343":{"code":"EE-49","name":"J\u00f5gevamaa"},"346":{"code":"EE-59","name":"L\u00e4\u00e4ne-Virumaa"},"345":{"code":"EE-57","name":"L\u00e4\u00e4nemaa"},"348":{"code":"EE-67","name":"P\u00e4rnumaa"},"347":{"code":"EE-65","name":"P\u00f5lvamaa"},"349":{"code":"EE-70","name":"Raplamaa"},"350":{"code":"EE-74","name":"Saaremaa"},"351":{"code":"EE-78","name":"Tartumaa"},"352":{"code":"EE-82","name":"Valgamaa"},"353":{"code":"EE-84","name":"Viljandimaa"},"354":{"code":"EE-86","name":"V\u00f5rumaa"}},"ES":{"130":{"code":"A Coru\u0441a","name":"A Coru\u00f1a"},"131":{"code":"Alava","name":"Alava"},"132":{"code":"Albacete","name":"Albacete"},"133":{"code":"Alicante","name":"Alicante"},"134":{"code":"Almeria","name":"Almeria"},"135":{"code":"Asturias","name":"Asturias"},"136":{"code":"Avila","name":"Avila"},"137":{"code":"Badajoz","name":"Badajoz"},"138":{"code":"Baleares","name":"Baleares"},"139":{"code":"Barcelona","name":"Barcelona"},"140":{"code":"Burgos","name":"Burgos"},"141":{"code":"Caceres","name":"Caceres"},"142":{"code":"Cadiz","name":"Cadiz"},"143":{"code":"Cantabria","name":"Cantabria"},"144":{"code":"Castellon","name":"Castellon"},"145":{"code":"Ceuta","name":"Ceuta"},"146":{"code":"Ciudad Real","name":"Ciudad Real"},"147":{"code":"Cordoba","name":"Cordoba"},"148":{"code":"Cuenca","name":"Cuenca"},"149":{"code":"Girona","name":"Girona"},"150":{"code":"Granada","name":"Granada"},"151":{"code":"Guadalajara","name":"Guadalajara"},"152":{"code":"Guipuzcoa","name":"Guipuzcoa"},"153":{"code":"Huelva","name":"Huelva"},"154":{"code":"Huesca","name":"Huesca"},"155":{"code":"Jaen","name":"Jaen"},"156":{"code":"La Rioja","name":"La Rioja"},"157":{"code":"Las Palmas","name":"Las Palmas"},"158":{"code":"Leon","name":"Leon"},"159":{"code":"Lleida","name":"Lleida"},"160":{"code":"Lugo","name":"Lugo"},"161":{"code":"Madrid","name":"Madrid"},"162":{"code":"Malaga","name":"Malaga"},"163":{"code":"Melilla","name":"Melilla"},"164":{"code":"Murcia","name":"Murcia"},"165":{"code":"Navarra","name":"Navarra"},"166":{"code":"Ourense","name":"Ourense"},"167":{"code":"Palencia","name":"Palencia"},"168":{"code":"Pontevedra","name":"Pontevedra"},"169":{"code":"Salamanca","name":"Salamanca"},"170":{"code":"Santa Cruz de Tenerife","name":"Santa Cruz de Tenerife"},"171":{"code":"Segovia","name":"Segovia"},"172":{"code":"Sevilla","name":"Sevilla"},"173":{"code":"Soria","name":"Soria"},"174":{"code":"Tarragona","name":"Tarragona"},"175":{"code":"Teruel","name":"Teruel"},"176":{"code":"Toledo","name":"Toledo"},"177":{"code":"Valencia","name":"Valencia"},"178":{"code":"Valladolid","name":"Valladolid"},"179":{"code":"Vizcaya","name":"Vizcaya"},"180":{"code":"Zamora","name":"Zamora"},"181":{"code":"Zaragoza","name":"Zaragoza"}},"CH":{"104":{"code":"AG","name":"Aargau"},"106":{"code":"AR","name":"Appenzell Ausserrhoden"},"105":{"code":"AI","name":"Appenzell Innerrhoden"},"108":{"code":"BL","name":"Basel-Landschaft"},"109":{"code":"BS","name":"Basel-Stadt"},"107":{"code":"BE","name":"Bern"},"110":{"code":"FR","name":"Freiburg"},"111":{"code":"GE","name":"Genf"},"112":{"code":"GL","name":"Glarus"},"113":{"code":"GR","name":"Graub\u00fcnden"},"114":{"code":"JU","name":"Jura"},"115":{"code":"LU","name":"Luzern"},"116":{"code":"NE","name":"Neuenburg"},"117":{"code":"NW","name":"Nidwalden"},"118":{"code":"OW","name":"Obwalden"},"120":{"code":"SH","name":"Schaffhausen"},"122":{"code":"SZ","name":"Schwyz"},"121":{"code":"SO","name":"Solothurn"},"119":{"code":"SG","name":"St. Gallen"},"124":{"code":"TI","name":"Tessin"},"123":{"code":"TG","name":"Thurgau"},"125":{"code":"UR","name":"Uri"},"126":{"code":"VD","name":"Waadt"},"127":{"code":"VS","name":"Wallis"},"128":{"code":"ZG","name":"Zug"},"129":{"code":"ZH","name":"Z\u00fcrich"}},"FR":{"182":{"code":"01","name":"Ain"},"183":{"code":"02","name":"Aisne"},"184":{"code":"03","name":"Allier"},"185":{"code":"04","name":"Alpes-de-Haute-Provence"},"187":{"code":"06","name":"Alpes-Maritimes"},"188":{"code":"07","name":"Ard\u00e8che"},"189":{"code":"08","name":"Ardennes"},"190":{"code":"09","name":"Ari\u00e8ge"},"191":{"code":"10","name":"Aube"},"192":{"code":"11","name":"Aude"},"193":{"code":"12","name":"Aveyron"},"249":{"code":"67","name":"Bas-Rhin"},"194":{"code":"13","name":"Bouches-du-Rh\u00f4ne"},"195":{"code":"14","name":"Calvados"},"196":{"code":"15","name":"Cantal"},"197":{"code":"16","name":"Charente"},"198":{"code":"17","name":"Charente-Maritime"},"199":{"code":"18","name":"Cher"},"200":{"code":"19","name":"Corr\u00e8ze"},"201":{"code":"2A","name":"Corse-du-Sud"},"203":{"code":"21","name":"C\u00f4te-d'Or"},"204":{"code":"22","name":"C\u00f4tes-d'Armor"},"205":{"code":"23","name":"Creuse"},"261":{"code":"79","name":"Deux-S\u00e8vres"},"206":{"code":"24","name":"Dordogne"},"207":{"code":"25","name":"Doubs"},"208":{"code":"26","name":"Dr\u00f4me"},"273":{"code":"91","name":"Essonne"},"209":{"code":"27","name":"Eure"},"210":{"code":"28","name":"Eure-et-Loir"},"211":{"code":"29","name":"Finist\u00e8re"},"212":{"code":"30","name":"Gard"},"214":{"code":"32","name":"Gers"},"215":{"code":"33","name":"Gironde"},"250":{"code":"68","name":"Haut-Rhin"},"202":{"code":"2B","name":"Haute-Corse"},"213":{"code":"31","name":"Haute-Garonne"},"225":{"code":"43","name":"Haute-Loire"},"234":{"code":"52","name":"Haute-Marne"},"252":{"code":"70","name":"Haute-Sa\u00f4ne"},"256":{"code":"74","name":"Haute-Savoie"},"269":{"code":"87","name":"Haute-Vienne"},"186":{"code":"05","name":"Hautes-Alpes"},"247":{"code":"65","name":"Hautes-Pyr\u00e9n\u00e9es"},"274":{"code":"92","name":"Hauts-de-Seine"},"216":{"code":"34","name":"H\u00e9rault"},"217":{"code":"35","name":"Ille-et-Vilaine"},"218":{"code":"36","name":"Indre"},"219":{"code":"37","name":"Indre-et-Loire"},"220":{"code":"38","name":"Is\u00e8re"},"221":{"code":"39","name":"Jura"},"222":{"code":"40","name":"Landes"},"223":{"code":"41","name":"Loir-et-Cher"},"224":{"code":"42","name":"Loire"},"226":{"code":"44","name":"Loire-Atlantique"},"227":{"code":"45","name":"Loiret"},"228":{"code":"46","name":"Lot"},"229":{"code":"47","name":"Lot-et-Garonne"},"230":{"code":"48","name":"Loz\u00e8re"},"231":{"code":"49","name":"Maine-et-Loire"},"232":{"code":"50","name":"Manche"},"233":{"code":"51","name":"Marne"},"235":{"code":"53","name":"Mayenne"},"236":{"code":"54","name":"Meurthe-et-Moselle"},"237":{"code":"55","name":"Meuse"},"238":{"code":"56","name":"Morbihan"},"239":{"code":"57","name":"Moselle"},"240":{"code":"58","name":"Ni\u00e8vre"},"241":{"code":"59","name":"Nord"},"242":{"code":"60","name":"Oise"},"243":{"code":"61","name":"Orne"},"257":{"code":"75","name":"Paris"},"244":{"code":"62","name":"Pas-de-Calais"},"245":{"code":"63","name":"Puy-de-D\u00f4me"},"246":{"code":"64","name":"Pyr\u00e9n\u00e9es-Atlantiques"},"248":{"code":"66","name":"Pyr\u00e9n\u00e9es-Orientales"},"251":{"code":"69","name":"Rh\u00f4ne"},"253":{"code":"71","name":"Sa\u00f4ne-et-Loire"},"254":{"code":"72","name":"Sarthe"},"255":{"code":"73","name":"Savoie"},"259":{"code":"77","name":"Seine-et-Marne"},"258":{"code":"76","name":"Seine-Maritime"},"275":{"code":"93","name":"Seine-Saint-Denis"},"262":{"code":"80","name":"Somme"},"263":{"code":"81","name":"Tarn"},"264":{"code":"82","name":"Tarn-et-Garonne"},"272":{"code":"90","name":"Territoire-de-Belfort"},"277":{"code":"95","name":"Val-d'Oise"},"276":{"code":"94","name":"Val-de-Marne"},"265":{"code":"83","name":"Var"},"266":{"code":"84","name":"Vaucluse"},"267":{"code":"85","name":"Vend\u00e9e"},"268":{"code":"86","name":"Vienne"},"270":{"code":"88","name":"Vosges"},"271":{"code":"89","name":"Yonne"},"260":{"code":"78","name":"Yvelines"}},"US":{"1":{"code":"AL","name":"Alabama"},"2":{"code":"AK","name":"Alaska"},"3":{"code":"AS","name":"American Samoa"},"4":{"code":"AZ","name":"Arizona"},"5":{"code":"AR","name":"Arkansas"},"6":{"code":"AF","name":"Armed Forces Africa"},"7":{"code":"AA","name":"Armed Forces Americas"},"8":{"code":"AC","name":"Armed Forces Canada"},"9":{"code":"AE","name":"Armed Forces Europe"},"10":{"code":"AM","name":"Armed Forces Middle East"},"11":{"code":"AP","name":"Armed Forces Pacific"},"12":{"code":"CA","name":"California"},"13":{"code":"CO","name":"Colorado"},"14":{"code":"CT","name":"Connecticut"},"15":{"code":"DE","name":"Delaware"},"16":{"code":"DC","name":"District of Columbia"},"17":{"code":"FM","name":"Federated States Of Micronesia"},"18":{"code":"FL","name":"Florida"},"19":{"code":"GA","name":"Georgia"},"20":{"code":"GU","name":"Guam"},"21":{"code":"HI","name":"Hawaii"},"22":{"code":"ID","name":"Idaho"},"23":{"code":"IL","name":"Illinois"},"24":{"code":"IN","name":"Indiana"},"25":{"code":"IA","name":"Iowa"},"26":{"code":"KS","name":"Kansas"},"27":{"code":"KY","name":"Kentucky"},"28":{"code":"LA","name":"Louisiana"},"29":{"code":"ME","name":"Maine"},"30":{"code":"MH","name":"Marshall Islands"},"31":{"code":"MD","name":"Maryland"},"32":{"code":"MA","name":"Massachusetts"},"33":{"code":"MI","name":"Michigan"},"34":{"code":"MN","name":"Minnesota"},"35":{"code":"MS","name":"Mississippi"},"36":{"code":"MO","name":"Missouri"},"37":{"code":"MT","name":"Montana"},"38":{"code":"NE","name":"Nebraska"},"39":{"code":"NV","name":"Nevada"},"40":{"code":"NH","name":"New Hampshire"},"41":{"code":"NJ","name":"New Jersey"},"42":{"code":"NM","name":"New Mexico"},"43":{"code":"NY","name":"New York"},"44":{"code":"NC","name":"North Carolina"},"45":{"code":"ND","name":"North Dakota"},"46":{"code":"MP","name":"Northern Mariana Islands"},"47":{"code":"OH","name":"Ohio"},"48":{"code":"OK","name":"Oklahoma"},"49":{"code":"OR","name":"Oregon"},"50":{"code":"PW","name":"Palau"},"51":{"code":"PA","name":"Pennsylvania"},"52":{"code":"PR","name":"Puerto Rico"},"53":{"code":"RI","name":"Rhode Island"},"54":{"code":"SC","name":"South Carolina"},"55":{"code":"SD","name":"South Dakota"},"56":{"code":"TN","name":"Tennessee"},"57":{"code":"TX","name":"Texas"},"58":{"code":"UT","name":"Utah"},"59":{"code":"VT","name":"Vermont"},"60":{"code":"VI","name":"Virgin Islands"},"61":{"code":"VA","name":"Virginia"},"62":{"code":"WA","name":"Washington"},"63":{"code":"WV","name":"West Virginia"},"64":{"code":"WI","name":"Wisconsin"},"65":{"code":"WY","name":"Wyoming"}},"RO":{"278":{"code":"AB","name":"Alba"},"279":{"code":"AR","name":"Arad"},"280":{"code":"AG","name":"Arge\u015f"},"281":{"code":"BC","name":"Bac\u0103u"},"282":{"code":"BH","name":"Bihor"},"283":{"code":"BN","name":"Bistri\u0163a-N\u0103s\u0103ud"},"284":{"code":"BT","name":"Boto\u015fani"},"286":{"code":"BR","name":"Br\u0103ila"},"285":{"code":"BV","name":"Bra\u015fov"},"287":{"code":"B","name":"Bucure\u015fti"},"288":{"code":"BZ","name":"Buz\u0103u"},"290":{"code":"CL","name":"C\u0103l\u0103ra\u015fi"},"289":{"code":"CS","name":"Cara\u015f-Severin"},"291":{"code":"CJ","name":"Cluj"},"292":{"code":"CT","name":"Constan\u0163a"},"293":{"code":"CV","name":"Covasna"},"294":{"code":"DB","name":"D\u00e2mbovi\u0163a"},"295":{"code":"DJ","name":"Dolj"},"296":{"code":"GL","name":"Gala\u0163i"},"297":{"code":"GR","name":"Giurgiu"},"298":{"code":"GJ","name":"Gorj"},"299":{"code":"HR","name":"Harghita"},"300":{"code":"HD","name":"Hunedoara"},"301":{"code":"IL","name":"Ialomi\u0163a"},"302":{"code":"IS","name":"Ia\u015fi"},"303":{"code":"IF","name":"Ilfov"},"304":{"code":"MM","name":"Maramure\u015f"},"305":{"code":"MH","name":"Mehedin\u0163i"},"306":{"code":"MS","name":"Mure\u015f"},"307":{"code":"NT","name":"Neam\u0163"},"308":{"code":"OT","name":"Olt"},"309":{"code":"PH","name":"Prahova"},"311":{"code":"SJ","name":"S\u0103laj"},"310":{"code":"SM","name":"Satu-Mare"},"312":{"code":"SB","name":"Sibiu"},"313":{"code":"SV","name":"Suceava"},"314":{"code":"TR","name":"Teleorman"},"315":{"code":"TM","name":"Timi\u015f"},"316":{"code":"TL","name":"Tulcea"},"318":{"code":"VL","name":"V\u00e2lcea"},"317":{"code":"VS","name":"Vaslui"},"319":{"code":"VN","name":"Vrancea"}},"CA":{"66":{"code":"AB","name":"Alberta"},"67":{"code":"BC","name":"British Columbia"},"68":{"code":"MB","name":"Manitoba"},"70":{"code":"NB","name":"New Brunswick"},"69":{"code":"NL","name":"Newfoundland and Labrador"},"72":{"code":"NT","name":"Northwest Territories"},"71":{"code":"NS","name":"Nova Scotia"},"73":{"code":"NU","name":"Nunavut"},"74":{"code":"ON","name":"Ontario"},"75":{"code":"PE","name":"Prince Edward Island"},"76":{"code":"QC","name":"Quebec"},"77":{"code":"SK","name":"Saskatchewan"},"78":{"code":"YT","name":"Yukon Territory"}},"DE":{"80":{"code":"BAW","name":"Baden-W\u00fcrttemberg"},"81":{"code":"BAY","name":"Bayern"},"82":{"code":"BER","name":"Berlin"},"83":{"code":"BRG","name":"Brandenburg"},"84":{"code":"BRE","name":"Bremen"},"85":{"code":"HAM","name":"Hamburg"},"86":{"code":"HES","name":"Hessen"},"87":{"code":"MEC","name":"Mecklenburg-Vorpommern"},"79":{"code":"NDS","name":"Niedersachsen"},"88":{"code":"NRW","name":"Nordrhein-Westfalen"},"89":{"code":"RHE","name":"Rheinland-Pfalz"},"90":{"code":"SAR","name":"Saarland"},"91":{"code":"SAS","name":"Sachsen"},"92":{"code":"SAC","name":"Sachsen-Anhalt"},"93":{"code":"SCN","name":"Schleswig-Holstein"},"94":{"code":"THE","name":"Th\u00fcringen"}},"AT":{"102":{"code":"BL","name":"Burgenland"},"99":{"code":"KN","name":"K\u00e4rnten"},"96":{"code":"NO","name":"Nieder\u00f6sterreich"},"97":{"code":"OO","name":"Ober\u00f6sterreich"},"98":{"code":"SB","name":"Salzburg"},"100":{"code":"ST","name":"Steiermark"},"101":{"code":"TI","name":"Tirol"},"103":{"code":"VB","name":"Voralberg"},"95":{"code":"WI","name":"Wien"}}}, undefined, 'shipping:postcode');
//]]>
</script>
        </div>
    </li>
    <li id="opc-shipping_method" class="section">
        <div class="step-title">
            <span class="number">4</span>
            <h2>Shipping Method</h2>
            <a href="http://demo.icebergcommerce.com/checkout/onepage/#">Edit</a>
        </div>
        <div id="checkout-step-shipping_method" class="step a-item" style="display: none;">
            <form id="co-shipping-method-form" action="">
    <div id="checkout-shipping-method-load">    <dl class="sp-methods">
                <dt>Flat Rate</dt>
        <dd>
            <ul>
                                            <li>
                                                                   <span class="no-display"><input name="shipping_method" type="radio" value="flatrate_flatrate" id="s_method_flatrate_flatrate" checked="checked"></span>
                                                <label for="s_method_flatrate_flatrate">Fixed                                                                        <span class="price">$5.00</span>                                                </label>
                                   </li>
                        </ul>
        </dd>
        </dl>

</div>
    <script type="text/javascript">
    //<![CDATA[
        var shippingMethod = new ShippingMethod('co-shipping-method-form', "http://demo.icebergcommerce.com/checkout/onepage/saveShippingMethod/");
    //]]>
    </script>
    <div id="onepage-checkout-shipping-method-additional-load">    </div>
    <div class="buttons-set" id="shipping-method-buttons-container">
        <p class="back-link"><a href="http://demo.icebergcommerce.com/checkout/onepage/#" onclick="checkout.back(); return false;"><small>« </small>Back</a></p>
        <button type="button" class="button" onclick="shippingMethod.save()"><span><span>Continue</span></span></button>
        <span id="shipping-method-please-wait" class="please-wait" style="display:none;">
            <img src="./Checkout-ship_files/opc-ajax-loader.gif" alt="Loading next step..." title="Loading next step..." class="v-middle"> Loading next step...        </span>
    </div>
</form>
        </div>
    </li>
    <li id="opc-payment" class="section">
        <div class="step-title">
            <span class="number">5</span>
            <h2>Payment Information</h2>
            <a href="http://demo.icebergcommerce.com/checkout/onepage/#">Edit</a>
        </div>
        <div id="checkout-step-payment" class="step a-item" style="display:none;">
            <script type="text/javascript">
//<![CDATA[
    var quoteBaseGrandTotal = 161.94;
    var checkQuoteBaseGrandTotal = quoteBaseGrandTotal;
    var payment = new Payment('co-payment-form', 'http://demo.icebergcommerce.com/checkout/onepage/savePayment/');
    var lastPrice;
//]]>
</script>
<form action="" id="co-payment-form">
    <fieldset>
        <dl class="sp-methods" id="checkout-payment-method-load">
    <dt>
            <input id="p_method_checkmo" value="checkmo" type="radio" name="payment[method]" title="Check / Money order" onclick="payment.switchMethod(&#39;checkmo&#39;)" class="radio" autocomplete="off">
            <label for="p_method_checkmo">Check / Money order </label>
    </dt>
        <dt>
            <input id="p_method_ccsave" value="ccsave" type="radio" name="payment[method]" title="Credit Card (saved)" onclick="payment.switchMethod(&#39;ccsave&#39;)" class="radio" autocomplete="off">
            <label for="p_method_ccsave">Credit Card (saved) </label>
    </dt>
        <dd>
        <ul class="form-list" id="payment_form_ccsave" style="display:none;">
    <li>
        <label for="ccsave_cc_owner" class="required"><em>*</em>Name on Card</label>
        <div class="input-box">
            <input type="text" title="Name on Card" class="input-text required-entry" id="ccsave_cc_owner" name="payment[cc_owner]" value="" disabled="" autocomplete="off">
        </div>
    </li>
    <li>
        <label for="ccsave_cc_type" class="required"><em>*</em>Credit Card Type</label>
        <div class="input-box">
            <select id="ccsave_cc_type" name="payment[cc_type]" title="Credit Card Type" class="required-entry validate-cc-type-select" disabled="" autocomplete="off">
                <option value="">--Please Select--</option>
                                        <option value="AE">American Express</option>
                            <option value="VI">Visa</option>
                            <option value="MC">MasterCard</option>
                            <option value="DI">Discover</option>
                        </select>
        </div>
    </li>
    <li>
        <label for="ccsave_cc_number" class="required"><em>*</em>Credit Card Number</label>
        <div class="input-box">
            <input type="text" id="ccsave_cc_number" name="payment[cc_number]" title="Credit Card Number" class="input-text validate-cc-number validate-cc-type" value="" disabled="" autocomplete="off">
        </div>
    </li>
    <li>
        <label for="ccsave_expiration" class="required"><em>*</em>Expiration Date</label>
        <div class="input-box">
            <div class="v-fix">
                <select id="ccsave_expiration" name="payment[cc_exp_month]" class="month validate-cc-exp required-entry" disabled="" autocomplete="off">
                                                    <option value="" selected="selected">Month</option>
                                    <option value="1">01 - January</option>
                                    <option value="2">02 - February</option>
                                    <option value="3">03 - March</option>
                                    <option value="4">04 - April</option>
                                    <option value="5">05 - May</option>
                                    <option value="6">06 - June</option>
                                    <option value="7">07 - July</option>
                                    <option value="8">08 - August</option>
                                    <option value="9">09 - September</option>
                                    <option value="10">10 - October</option>
                                    <option value="11">11 - November</option>
                                    <option value="12">12 - December</option>
                                </select>
            </div>
            <div class="v-fix">
                                <select id="ccsave_expiration_yr" name="payment[cc_exp_year]" class="year required-entry" disabled="" autocomplete="off">
                                    <option value="" selected="selected">Year</option>
                                    <option value="2015">2015</option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                </select>
            </div>
        </div>
    </li>
            <li>
        <label for="ccsave_cc_cid" class="required"><em>*</em>Card Verification Number</label>
        <div class="input-box">
            <div class="v-fix">
                <input type="text" title="Card Verification Number" class="input-text cvv required-entry validate-cc-cvn" id="ccsave_cc_cid" name="payment[cc_cid]" value="" disabled="" autocomplete="off">
            </div>
            <a href="http://demo.icebergcommerce.com/checkout/onepage/#" class="cvv-what-is-this">What is this?</a>
        </div>
    </li>
        </ul>
    </dd>
    </dl>
<script type="text/javascript">
//<![CDATA[
payment.init();
//]]>
</script>
    </fieldset>
</form>
<div class="tool-tip" id="payment-tool-tip" style="display:none;">
    <div class="btn-close"><a href="http://demo.icebergcommerce.com/checkout/onepage/#" id="payment-tool-tip-close" title="Close">Close</a></div>
    <div class="tool-tip-content"><img src="./Checkout-ship_files/cvv.gif" alt="Card Verification Number Visual Reference" title="Card Verification Number Visual Reference"></div>
</div>
<div class="buttons-set" id="payment-buttons-container">
    <p class="required">* Required Fields</p>
    <p class="back-link"><a href="http://demo.icebergcommerce.com/checkout/onepage/#" onclick="checkout.back(); return false;"><small>« </small>Back</a></p>
    <button type="button" class="button" onclick="payment.save()"><span><span>Continue</span></span></button>
    <span class="please-wait" id="payment-please-wait" style="display:none;">
        <img src="./Checkout-ship_files/opc-ajax-loader.gif" alt="Loading next step..." title="Loading next step..." class="v-middle"> Loading next step...    </span>
</div>
<script type="text/javascript">
//<![CDATA[
    function toggleToolTip(event){
        if($('payment-tool-tip')){
            $('payment-tool-tip').setStyle({
                top: (Event.pointerY(event)-560)+'px'//,
                //left: (Event.pointerX(event)+100)+'px'
            })
            $('payment-tool-tip').toggle();
        }
        Event.stop(event);
    }
    if($('payment-tool-tip-close')){
        Event.observe($('payment-tool-tip-close'), 'click', toggleToolTip);
    }
//]]>
</script>
<script type="text/javascript">
//<![CDATA[
    payment.currentMethod = "";
//]]>
</script>
        </div>
    </li>
    <li id="opc-review" class="section">
        <div class="step-title">
            <span class="number">6</span>
            <h2>Order Review</h2>
            <a href="http://demo.icebergcommerce.com/checkout/onepage/#">Edit</a>
        </div>
        <div id="checkout-step-review" class="step a-item" style="display:none;">
            <div class="order-review" id="checkout-review-load">
    </div>
        </div>
    </li>
</ol>
<script type="text/javascript">
//<![CDATA[
    var accordion = new Accordion('checkoutSteps', '.step-title', true);
        accordion.openSection('opc-login');
        var checkout = new Checkout(accordion,{
        progress: 'http://demo.icebergcommerce.com/checkout/onepage/progress/',
        review: 'http://demo.icebergcommerce.com/checkout/onepage/review/',
        saveMethod: 'http://demo.icebergcommerce.com/checkout/onepage/saveMethod/',
        failure: 'http://demo.icebergcommerce.com/checkout/cart/'}
    );
//]]>
</script>
                </div>
                <div class="col-right sidebar"><div id="checkout-progress-wrapper"><div class="block block-progress opc-block-progress">
    <div class="block-title">
        <strong><span>Your Checkout Progress</span></strong>
    </div>
    <div class="block-content">
        <dl>
                            <dt class="complete">
                Billing Address <span class="separator">|</span>
                <a href="http://demo.icebergcommerce.com/checkout/onepage/#billing" onclick="checkout.gotoSection(&#39;billing&#39;); return false;">Change</a>
            </dt>
            <dd class="complete">
                <address>1 2<br>

123 Main St<br>



New York,  New York, 10004<br>
United States<br>
T: 800-555-1212

</address>
            </dd>
                
                            <dt class="complete">
                Shipping Address <span class="separator">|</span>
                <a href="http://demo.icebergcommerce.com/checkout/onepage/#payment" onclick="checkout.gotoSection(&#39;shipping&#39;);return false;">Change</a>
            </dt>
            <dd class="complete">
                <address>1 2<br>

123 Main St<br>



New York,  New York, 10004<br>
United States<br>
T: 800-555-1212

</address>
            </dd>
                
                            <dt>
                Shipping Method            </dt>
                
                            <dt>
                Payment Method            </dt>
                        </dl>
    </div>
</div>
</div></div>
            </div>
        </div>
        <div class="footer-container">
    <div class="footer">
        <ul>
<li><a href="http://demo.icebergcommerce.com/about-magento-demo-store">About Us</a></li>
<li><a href="http://demo.icebergcommerce.com/customer-service">Customer Service</a></li>
<li class="last privacy"><a href="http://demo.icebergcommerce.com/privacy-policy-cookie-restriction-mode">Privacy Policy</a></li>
</ul><ul class="links">
                        <li class="first"><a href="http://demo.icebergcommerce.com/catalog/seo_sitemap/category/" title="Site Map">Site Map</a></li>
                                <li><a href="http://demo.icebergcommerce.com/catalogsearch/term/popular/" title="Search Terms">Search Terms</a></li>
                                <li><a href="http://demo.icebergcommerce.com/catalogsearch/advanced/" title="Advanced Search">Advanced Search</a></li>
                                <li><a href="http://demo.icebergcommerce.com/sales/guest/form/" title="Orders and Returns">Orders and Returns</a></li>
                                <li class=" last"><a href="http://demo.icebergcommerce.com/contacts/" title="Contact Us">Contact Us</a></li>
            </ul>
        <p class="bugs">Help Us to Keep Magento Healthy - <a href="http://www.magentocommerce.com/bug-tracking" onclick="this.target=&#39;_blank&#39;"><strong>Report All Bugs</strong></a> (ver. 1.7.0.2)</p>
        <address>© 2008 Magento Demo Store. All Rights Reserved.</address>
    </div>
</div>
            </div>
</div>


<div id="window-overlay" class="window-overlay" style="display:none;"></div><div id="remember-me-popup" class="remember-me-popup" style="display:none;">
    <div class="remember-me-popup-head">
        <h3>What's this?</h3>
        <a href="http://demo.icebergcommerce.com/checkout/onepage/#" class="remember-me-popup-close" title="Close">Close</a>
    </div>
    <div class="remember-me-popup-body">
        <p>Checking "Remember Me" will let you access your shopping cart on this computer when you are logged out</p>
        <div class="remember-me-popup-close-button a-right">
            <a href="http://demo.icebergcommerce.com/checkout/onepage/#" class="remember-me-popup-close button" title="Close"><span>Close</span></a>
        </div>
    </div>
</div>

      


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content"></div>
    </div>
</div>

<script>
    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
            results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }
    var map = null;
    var geocoder = null;
    var markers = [];
    var markersById = [];
    var infoWindow = null;
    var address;
    //var infowindow = new google.maps.InfoWindow({disableAutoPan: true,maxWidth:200});
    var marker, i;
    var page=0;
    var pageno=1;
    var inter=10;
    var selMarker;
    var pages;
    var input;
    var zoomLeve1=1;
    var autocomplete;
    var localAddr;
    var map_id;
    var curLocation='';
    var selLocation;
    /*var markers = new Array();*/
    var markerContent=[];
    var addresses={};
</script>
<script>
    jQuery('#store-locator').click(function(e){
        e.preventDefault();
    });
    jQuery('#myModal').on('hidden.bs.modal', function () {
        
    })
    jQuery('#myModal').on('shown.bs.modal', function () {
        addresses['street1']= document.getElementById('shipping:street1').value;
        addresses['street2']= document.getElementById('shipping:street2').value;
        addresses['city']=document.getElementById('shipping:city').value;
        addresses['postcode']= document.getElementById('shipping:postcode').value;
        var region = document.getElementById("shipping:region_id");
        if(document.getElementById("shipping:region_id").value!='')
        {
            addresses['region_id'] = region.options[region.selectedIndex].text;
        }
        else
        {
            addresses['region_id'] = '';
        }
        
        //addresses['region_id']= document.getElementById('shipping:region_id').value;
        addresses['country']= document.getElementById('shipping:country_id').value;
        initializeMap(addresses);

    })
</script>
</body>
</html>


<script id="hiddenlpsubmitdiv" style="display: none;"></script><script>try{(function() { for(var lastpass_iter=0; lastpass_iter < document.forms.length; lastpass_iter++){ var lastpass_f = document.forms[lastpass_iter]; if(typeof(lastpass_f.lpsubmitorig2)=="undefined"){ lastpass_f.lpsubmitorig2 = lastpass_f.submit; if (typeof(lastpass_f.lpsubmitorig2)=='object'){ continue;}lastpass_f.submit = function(){ var form=this; var customEvent = document.createEvent("Event"); customEvent.initEvent("lpCustomEvent", true, true); var d = document.getElementById("hiddenlpsubmitdiv"); if (d) {for(var i = 0; i < document.forms.length; i++){ if(document.forms[i]==form){ if (typeof(d.innerText) != 'undefined') { d.innerText=i.toString(); } else { d.textContent=i.toString(); } } } d.dispatchEvent(customEvent); }form.lpsubmitorig2(); } } }})()}catch(e){}</script></body></html>
