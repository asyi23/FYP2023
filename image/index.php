<!DOCTYPE html>
<html  dir="ltr" lang="en" xml:lang="en">
<head>
    <title>Learning Management System: Log in to the site</title>
    <link rel="icon" href="//smartv3.ums.edu.my/pluginfile.php/1/theme_adaptable/favicon/1666672555/icon_ums.png" />

    <link rel="stylesheet" href="https://smartv3.ums.edu.my/theme/adaptable/style/font-awesome.min.css">

    <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,400i'
    rel='stylesheet'
    type='text/css'>

    <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,400i'
    rel='stylesheet'
    type='text/css'>

    <link href='https://fonts.googleapis.com/css?family=Ubuntu:900,900i'
    rel='stylesheet'
    type='text/css'>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="moodle, Learning Management System: Log in to the site" />
<link rel="stylesheet" type="text/css" href="https://smartv3.ums.edu.my/theme/yui_combo.php?rollup/3.17.2/yui-moodlesimple-min.css" /><script id="firstthemesheet" type="text/css">/** Required in order to fix style inclusion problems in IE with YUI **/</script><link rel="stylesheet" type="text/css" href="https://smartv3.ums.edu.my/theme/styles.php/adaptable/1666672555/all" />
<script type="text/javascript">
//<![CDATA[
var M = {}; M.yui = {};
M.pageloadstarttime = new Date();
M.cfg = {"wwwroot":"https:\/\/smartv3.ums.edu.my","sesskey":"0cOYdKb1hk","themerev":"1666672555","slasharguments":1,"theme":"adaptable","iconsystemmodule":"core\/icon_system_standard","jsrev":"1666672555","admin":"admin","svgicons":true,"usertimezone":"Asia\/Singapore","contextid":1};var yui1ConfigFn = function(me) {if(/-skin|reset|fonts|grids|base/.test(me.name)){me.type='css';me.path=me.path.replace(/\.js/,'.css');me.path=me.path.replace(/\/yui2-skin/,'/assets/skins/sam/yui2-skin')}};
var yui2ConfigFn = function(me) {var parts=me.name.replace(/^moodle-/,'').split('-'),component=parts.shift(),module=parts[0],min='-min';if(/-(skin|core)$/.test(me.name)){parts.pop();me.type='css';min=''}
if(module){var filename=parts.join('-');me.path=component+'/'+module+'/'+filename+min+'.'+me.type}else{me.path=component+'/'+component+'.'+me.type}};
YUI_config = {"debug":false,"base":"https:\/\/smartv3.ums.edu.my\/lib\/yuilib\/3.17.2\/","comboBase":"https:\/\/smartv3.ums.edu.my\/theme\/yui_combo.php?","combine":true,"filter":null,"insertBefore":"firstthemesheet","groups":{"yui2":{"base":"https:\/\/smartv3.ums.edu.my\/lib\/yuilib\/2in3\/2.9.0\/build\/","comboBase":"https:\/\/smartv3.ums.edu.my\/theme\/yui_combo.php?","combine":true,"ext":false,"root":"2in3\/2.9.0\/build\/","patterns":{"yui2-":{"group":"yui2","configFn":yui1ConfigFn}}},"moodle":{"name":"moodle","base":"https:\/\/smartv3.ums.edu.my\/theme\/yui_combo.php?m\/1666672555\/","combine":true,"comboBase":"https:\/\/smartv3.ums.edu.my\/theme\/yui_combo.php?","ext":false,"root":"m\/1666672555\/","patterns":{"moodle-":{"group":"moodle","configFn":yui2ConfigFn}},"filter":null,"modules":{"moodle-core-popuphelp":{"requires":["moodle-core-tooltip"]},"moodle-core-lockscroll":{"requires":["plugin","base-build"]},"moodle-core-formchangechecker":{"requires":["base","event-focus","moodle-core-event"]},"moodle-core-handlebars":{"condition":{"trigger":"handlebars","when":"after"}},"moodle-core-actionmenu":{"requires":["base","event","node-event-simulate"]},"moodle-core-blocks":{"requires":["base","node","io","dom","dd","dd-scroll","moodle-core-dragdrop","moodle-core-notification"]},"moodle-core-notification":{"requires":["moodle-core-notification-dialogue","moodle-core-notification-alert","moodle-core-notification-confirm","moodle-core-notification-exception","moodle-core-notification-ajaxexception"]},"moodle-core-notification-dialogue":{"requires":["base","node","panel","escape","event-key","dd-plugin","moodle-core-widget-focusafterclose","moodle-core-lockscroll"]},"moodle-core-notification-alert":{"requires":["moodle-core-notification-dialogue"]},"moodle-core-notification-confirm":{"requires":["moodle-core-notification-dialogue"]},"moodle-core-notification-exception":{"requires":["moodle-core-notification-dialogue"]},"moodle-core-notification-ajaxexception":{"requires":["moodle-core-notification-dialogue"]},"moodle-core-checknet":{"requires":["base-base","moodle-core-notification-alert","io-base"]},"moodle-core-maintenancemodetimer":{"requires":["base","node"]},"moodle-core-dragdrop":{"requires":["base","node","io","dom","dd","event-key","event-focus","moodle-core-notification"]},"moodle-core-dock":{"requires":["base","node","event-custom","event-mouseenter","event-resize","escape","moodle-core-dock-loader","moodle-core-event"]},"moodle-core-dock-loader":{"requires":["escape"]},"moodle-core-languninstallconfirm":{"requires":["base","node","moodle-core-notification-confirm","moodle-core-notification-alert"]},"moodle-core-tooltip":{"requires":["base","node","io-base","moodle-core-notification-dialogue","json-parse","widget-position","widget-position-align","event-outside","cache-base"]},"moodle-core-event":{"requires":["event-custom"]},"moodle-core-chooserdialogue":{"requires":["base","panel","moodle-core-notification"]},"moodle-core_availability-form":{"requires":["base","node","event","event-delegate","panel","moodle-core-notification-dialogue","json"]},"moodle-backup-confirmcancel":{"requires":["node","node-event-simulate","moodle-core-notification-confirm"]},"moodle-backup-backupselectall":{"requires":["node","event","node-event-simulate","anim"]},"moodle-course-categoryexpander":{"requires":["node","event-key"]},"moodle-course-util":{"requires":["node"],"use":["moodle-course-util-base"],"submodules":{"moodle-course-util-base":{},"moodle-course-util-section":{"requires":["node","moodle-course-util-base"]},"moodle-course-util-cm":{"requires":["node","moodle-course-util-base"]}}},"moodle-course-modchooser":{"requires":["moodle-core-chooserdialogue","moodle-course-coursebase"]},"moodle-course-dragdrop":{"requires":["base","node","io","dom","dd","dd-scroll","moodle-core-dragdrop","moodle-core-notification","moodle-course-coursebase","moodle-course-util"]},"moodle-course-management":{"requires":["base","node","io-base","moodle-core-notification-exception","json-parse","dd-constrain","dd-proxy","dd-drop","dd-delegate","node-event-delegate"]},"moodle-course-formatchooser":{"requires":["base","node","node-event-simulate"]},"moodle-form-shortforms":{"requires":["node","base","selector-css3","moodle-core-event"]},"moodle-form-showadvanced":{"requires":["node","base","selector-css3"]},"moodle-form-passwordunmask":{"requires":[]},"moodle-form-dateselector":{"requires":["base","node","overlay","calendar"]},"moodle-question-searchform":{"requires":["base","node"]},"moodle-question-preview":{"requires":["base","dom","event-delegate","event-key","core_question_engine"]},"moodle-question-qbankmanager":{"requires":["node","selector-css3"]},"moodle-question-chooser":{"requires":["moodle-core-chooserdialogue"]},"moodle-availability_completion-form":{"requires":["base","node","event","moodle-core_availability-form"]},"moodle-availability_date-form":{"requires":["base","node","event","io","moodle-core_availability-form"]},"moodle-availability_grade-form":{"requires":["base","node","event","moodle-core_availability-form"]},"moodle-availability_group-form":{"requires":["base","node","event","moodle-core_availability-form"]},"moodle-availability_grouping-form":{"requires":["base","node","event","moodle-core_availability-form"]},"moodle-availability_profile-form":{"requires":["base","node","event","moodle-core_availability-form"]},"moodle-qtype_ddimageortext-dd":{"requires":["node","dd","dd-drop","dd-constrain"]},"moodle-qtype_ddimageortext-form":{"requires":["moodle-qtype_ddimageortext-dd","form_filepicker"]},"moodle-qtype_ddmarker-dd":{"requires":["node","event-resize","dd","dd-drop","dd-constrain","graphics"]},"moodle-qtype_ddmarker-form":{"requires":["moodle-qtype_ddmarker-dd","form_filepicker","graphics","escape"]},"moodle-qtype_ddwtos-dd":{"requires":["node","dd","dd-drop","dd-constrain"]},"moodle-mod_assign-history":{"requires":["node","transition"]},"moodle-mod_bigbluebuttonbn-imports":{"requires":["base","node"]},"moodle-mod_bigbluebuttonbn-modform":{"requires":["base","node"]},"moodle-mod_bigbluebuttonbn-recordings":{"requires":["base","node","datasource-get","datasource-jsonschema","datasource-polling","moodle-core-notification"]},"moodle-mod_bigbluebuttonbn-broker":{"requires":["base","node","datasource-get","datasource-jsonschema","datasource-polling","moodle-core-notification"]},"moodle-mod_bigbluebuttonbn-rooms":{"requires":["base","node","datasource-get","datasource-jsonschema","datasource-polling","moodle-core-notification"]},"moodle-mod_forum-subscriptiontoggle":{"requires":["base-base","io-base"]},"moodle-mod_quiz-questionchooser":{"requires":["moodle-core-chooserdialogue","moodle-mod_quiz-util","querystring-parse"]},"moodle-mod_quiz-util":{"requires":["node","moodle-core-actionmenu"],"use":["moodle-mod_quiz-util-base"],"submodules":{"moodle-mod_quiz-util-base":{},"moodle-mod_quiz-util-slot":{"requires":["node","moodle-mod_quiz-util-base"]},"moodle-mod_quiz-util-page":{"requires":["node","moodle-mod_quiz-util-base"]}}},"moodle-mod_quiz-randomquestion":{"requires":["base","event","node","io","moodle-core-notification-dialogue"]},"moodle-mod_quiz-modform":{"requires":["base","node","event"]},"moodle-mod_quiz-dragdrop":{"requires":["base","node","io","dom","dd","dd-scroll","moodle-core-dragdrop","moodle-core-notification","moodle-mod_quiz-quizbase","moodle-mod_quiz-util-base","moodle-mod_quiz-util-page","moodle-mod_quiz-util-slot","moodle-course-util"]},"moodle-mod_quiz-autosave":{"requires":["base","node","event","event-valuechange","node-event-delegate","io-form"]},"moodle-mod_quiz-quizquestionbank":{"requires":["base","event","node","io","io-form","yui-later","moodle-question-qbankmanager","moodle-core-notification-dialogue"]},"moodle-mod_quiz-toolboxes":{"requires":["base","node","event","event-key","io","moodle-mod_quiz-quizbase","moodle-mod_quiz-util-slot","moodle-core-notification-ajaxexception"]},"moodle-mod_quiz-quizbase":{"requires":["base","node"]},"moodle-mod_quiz-repaginate":{"requires":["base","event","node","io","moodle-core-notification-dialogue"]},"moodle-message_airnotifier-toolboxes":{"requires":["base","node","io"]},"moodle-filter_glossary-autolinker":{"requires":["base","node","io-base","json-parse","event-delegate","overlay","moodle-core-event","moodle-core-notification-alert","moodle-core-notification-exception","moodle-core-notification-ajaxexception"]},"moodle-filter_mathjaxloader-loader":{"requires":["moodle-core-event"]},"moodle-editor_atto-editor":{"requires":["node","transition","io","overlay","escape","event","event-simulate","event-custom","node-event-html5","node-event-simulate","yui-throttle","moodle-core-notification-dialogue","moodle-core-notification-confirm","moodle-editor_atto-rangy","handlebars","timers","querystring-stringify"]},"moodle-editor_atto-plugin":{"requires":["node","base","escape","event","event-outside","handlebars","event-custom","timers","moodle-editor_atto-menu"]},"moodle-editor_atto-menu":{"requires":["moodle-core-notification-dialogue","node","event","event-custom"]},"moodle-editor_atto-rangy":{"requires":[]},"moodle-report_eventlist-eventfilter":{"requires":["base","event","node","node-event-delegate","datatable","autocomplete","autocomplete-filters"]},"moodle-report_loglive-fetchlogs":{"requires":["base","event","node","io","node-event-delegate"]},"moodle-gradereport_grader-gradereporttable":{"requires":["base","node","event","handlebars","overlay","event-hover"]},"moodle-gradereport_history-userselector":{"requires":["escape","event-delegate","event-key","handlebars","io-base","json-parse","moodle-core-notification-dialogue"]},"moodle-tool_capability-search":{"requires":["base","node"]},"moodle-tool_lp-dragdrop-reorder":{"requires":["moodle-core-dragdrop"]},"moodle-tool_monitor-dropdown":{"requires":["base","event","node"]},"moodle-assignfeedback_editpdf-editor":{"requires":["base","event","node","io","graphics","json","event-move","event-resize","transition","querystring-stringify-simple","moodle-core-notification-dialog","moodle-core-notification-alert","moodle-core-notification-exception","moodle-core-notification-ajaxexception"]},"moodle-atto_accessibilitychecker-button":{"requires":["color-base","moodle-editor_atto-plugin"]},"moodle-atto_accessibilityhelper-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_align-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_bold-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_charmap-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_clear-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_collapse-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_emoticon-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_equation-button":{"requires":["moodle-editor_atto-plugin","moodle-core-event","io","event-valuechange","tabview","array-extras"]},"moodle-atto_html-button":{"requires":["moodle-editor_atto-plugin","event-valuechange"]},"moodle-atto_image-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_indent-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_italic-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_link-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_managefiles-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_managefiles-usedfiles":{"requires":["node","escape"]},"moodle-atto_media-button":{"requires":["moodle-editor_atto-plugin","moodle-form-shortforms"]},"moodle-atto_noautolink-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_orderedlist-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_rtl-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_strike-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_subscript-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_superscript-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_table-button":{"requires":["moodle-editor_atto-plugin","moodle-editor_atto-menu","event","event-valuechange"]},"moodle-atto_title-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_underline-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_undo-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_unorderedlist-button":{"requires":["moodle-editor_atto-plugin"]}}},"gallery":{"name":"gallery","base":"https:\/\/smartv3.ums.edu.my\/lib\/yuilib\/gallery\/","combine":true,"comboBase":"https:\/\/smartv3.ums.edu.my\/theme\/yui_combo.php?","ext":false,"root":"gallery\/1666672555\/","patterns":{"gallery-":{"group":"gallery"}}}},"modules":{"core_filepicker":{"name":"core_filepicker","fullpath":"https:\/\/smartv3.ums.edu.my\/lib\/javascript.php\/1666672555\/repository\/filepicker.js","requires":["base","node","node-event-simulate","json","async-queue","io-base","io-upload-iframe","io-form","yui2-treeview","panel","cookie","datatable","datatable-sort","resize-plugin","dd-plugin","escape","moodle-core_filepicker","moodle-core-notification-dialogue"]},"core_comment":{"name":"core_comment","fullpath":"https:\/\/smartv3.ums.edu.my\/lib\/javascript.php\/1666672555\/comment\/comment.js","requires":["base","io-base","node","json","yui2-animation","overlay","escape"]},"mathjax":{"name":"mathjax","fullpath":"https:\/\/cdnjs.cloudflare.com\/ajax\/libs\/mathjax\/2.7.1\/MathJax.js?delayStartupUntil=configured"}}};
M.yui.loader = {modules: {}};

//]]>
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-158199467-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-158199467-1');
</script><meta name="robots" content="noindex" />    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Twitter Card data -->
    <meta name="twitter:card" value="summary">
    <meta name="twitter:site" value="Learning Management System" />
    <meta name="twitter:title" value="Learning Management System: Log in to the site" />

    <!-- Open Graph data -->
    <meta property="og:title" content="Learning Management System: Log in to the site" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://smartv3.ums.edu.my" />
    <meta property="og:site_name" content="Learning Management System" />

    <!-- Chrome, Firefox OS and Opera on Android -->
    <meta name="theme-color" content="#020A82" />

    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#020A82" />

    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#020A82" />
</head>

<body  id="page-login-index" class="format-site  path-login safari dir-ltr lang-en yui-skin-sam yui3-skin-sam smartv3-ums-edu-my pagelayout-login course-1 context-1 notloggedin two-column  content-only layout-option-langmenu layout-option-nonavbar">

<div class="skiplinks">
    <a href="#maincontent" class="skip">Skip to main content</a>
</div><script type="text/javascript" src="https://smartv3.ums.edu.my/theme/yui_combo.php?rollup/3.17.2/yui-moodlesimple-min.js"></script><script type="text/javascript" src="https://smartv3.ums.edu.my/theme/jquery.php/core/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="https://smartv3.ums.edu.my/theme/jquery.php/theme_adaptable/pace-min.js"></script>
<script type="text/javascript" src="https://smartv3.ums.edu.my/theme/jquery.php/theme_adaptable/jquery-flexslider-min.js"></script>
<script type="text/javascript" src="https://smartv3.ums.edu.my/theme/jquery.php/theme_adaptable/tickerme.js"></script>
<script type="text/javascript" src="https://smartv3.ums.edu.my/theme/jquery.php/theme_adaptable/jquery-easing-min.js"></script>
<script type="text/javascript" src="https://smartv3.ums.edu.my/theme/jquery.php/theme_adaptable/adaptable.js"></script>
<script type="text/javascript" src="https://smartv3.ums.edu.my/lib/javascript.php/1666672555/lib/javascript-static.js"></script>
<script type="text/javascript">
//<![CDATA[
document.body.className += ' jsenabled';
//]]>
</script>


<div id="page" class="container-fluid fullin showblockicons">

    <header id="page-header-wrapper"  style="background-image: url(//smartv3.ums.edu.my/pluginfile.php/1/theme_adaptable/headerbgimage/1666672555/smartums-new.png);
                         background-position: 0 0; background-repeat: no-repeat; background-size: cover;" >
    <div id="above-header">
        <div class="clearfix container userhead">
            <div class="pull-left">
                <ul class="usermenu2 nav navbar-nav navbar-right"></ul>            </div>

            <div class="headermenu row">
        <form action="https://smartv3.ums.edu.my/login/index.php" method="post">
            <button class="btn-login" type="submit">
                Log In            </button>
        </form>
</div>

<div style="float: right; position: relative; display: inline; margin-left: 15px; height:20px;">
</div>

    </div>
</div>



<div id="page-header" class="clearfix container">

<div id="logocontainer"><a href='https://smartv3.ums.edu.my'><img src=//smartv3.ums.edu.my/pluginfile.php/1/theme_adaptable/logo/1666672555/logo-umsblack-text-png.png alt="logo" id="logo" /></a></div>
    <div class="socialbox pull-right">
<div class="socialbox"></div>    </div>


        <div id="course-header">
                    </div>
    </div>



</header>


<div class="container outercont">
    <div id="page-content" class="row-fluid">
            <div id="page-navbar" class="span12"><nav class="breadcrumb-button"></nav><ul class="breadcrumb"><i title="Home" class="fa fa-folder-open-o fa-lg"></i><span class="separator"><i class="fa-angle-right fa"></i>
                             </span><li><span tabindex="0">Log in to the site</span></li></ul></div>        <section id="region-main" class="span12">
            <span class="notifications" id="user-notifications"></span><div role="main"><span id="maincontent"></span><div class="loginbox clearfix twocolumns">

    <div class="loginpanel">

        <h2>Log in</h2>

        <div class="subcontent loginsub">
                <div class="loginerrors" role="alert">
                    <a href="#" id="loginerrormessage" class="accesshide">Your session has timed out. Please log in again.</a>
                    <span class="error"><img class="icon icon icon-pre" alt="Error" src="https://smartv3.ums.edu.my/theme/image.php/adaptable/core/1666672555/i/warning" />Your session has timed out. Please log in again.</span>
                </div>
            <form action="https://smartv3.ums.edu.my/login/index.php" method="post" id="login">
                <div class="loginform">
                    <div class="form-label">
                        <label for="username">
                                Username
                        </label>
                    </div>
                    <div class="form-input">
                        <input type="text" name="username" id="username" size="15" value="">
                    </div>
                    <div class="clearer"><!-- --></div>
                    <div class="form-label">
                        <label for="password">Password</label>
                    </div>
                    <div class="form-input">
                        <input type="password" name="password" id="password" size="15" value="">
                    </div>
                </div>

                <div class="clearer"><!-- --></div>
                    <div class="rememberpass">
                        <input type="checkbox" name="rememberusername" id="rememberusername" value="1"  />
                        <label for="rememberusername">Remember username</label>
                    </div>
                <div class="clearer"><!-- --></div>
                <input id="anchor" type="hidden" name="anchor" value="" />
                <script>document.getElementById('anchor').value = location.hash;</script>
                <input type="hidden" name="logintoken" value="iBC8HCOKBV3NWkA6Sv8HoUV93YvYOE73">
                <input type="submit" id="loginbtn" value="Log in" />
                <div class="forgetpass">
                    <a href="https://smartv3.ums.edu.my/login/forgot_password.php">Forgotten your username or password?</a>
                </div>
            </form>

            <div class="desc">
                Cookies must be enabled in your browser
                <span class="helptooltip">
    <a href="https://smartv3.ums.edu.my/help.php?component=moodle&amp;identifier=cookiesenabled&amp;lang=en" title="Help with Cookies must be enabled in your browser" aria-haspopup="true" target="_blank"><img class="icon iconhelp" alt="Help with Cookies must be enabled in your browser" title="Help with Cookies must be enabled in your browser" src="https://smartv3.ums.edu.my/theme/image.php/adaptable/core/1666672555/help" />
</a>
</span>
            </div>

        </div>

            <div class="subcontent guestsub">
                <div class="desc">Some courses may allow guest access</div>
                <form action="https://smartv3.ums.edu.my/login/index.php" method="post" id="guestlogin">
                    <div class="guestform">
                        <input type="hidden" name="logintoken" value="iBC8HCOKBV3NWkA6Sv8HoUV93YvYOE73">
                        <input type="hidden" name="username" value="guest" />
                        <input type="hidden" name="password" value="guest" />
                        <input type="submit" value="Log in as a guest" />
                    </div>
                </form>
            </div>

    </div>

    <div class="signuppanel">
        <h2>Is this your first time here?</h2>
        <div class="subcontent">
            <p style="text-align:left;"><b>Important Info</b></p><h3></h3><h4><br /></h4><h4><span><br /></span></h4><ol><li style="text-align:left;"><span>Please make sure your id does not contain any <span>SPACES/WHITE SPACES</span></span></li><li style="text-align:left;">Please login using your Active Directory Account. Refer to this link <a href="https://admgr.ums.edu.my/pwm-student/private/login" target="_blank" rel="noreferrer">Active Directory</a></li><li style="text-align:left;">Please contact JTMK Helpdesk if you have a problem to login <a href="https://jtmk4u.ums.edu.my/index.php/hubungi-jtmk" target="_blank" rel="noreferrer">https://jtmk4u.ums.edu.my/index.php/hubungi-jtmk</a></li></ol><br /><p></p><p></p>
        </div>

    </div>
</div></div>        </section>
    </div>
</div>


<footer id="page-footer">

<div id="course-footer"></div>
                <div class="container blockplace1"><div class="row-fluid"><div class="left-col span12"><p style="text-align:center;"></p><p><span><b>OUR POLICY</b> :</span></p><p><span>| <a href="https://www.ums.edu.my/v5/en/home/copyright-policy">Privacy Policy</a> | </span></p><p>| <a href="https://www.ums.edu.my/v5/en/home/copyright-policy">Security Policy</a> | </p><p>| <a href="https://www.ums.edu.my/v5/en/home/copyright-policy">Disclaimer</a> | </p><p>| <a title="Clients' Charter" href="http://www.ums.edu.my/v5/index.php/en/component/content/1-corp-info/50-charter.html">Clients' Charter</a> |</p><p></p></div></div><div class="row-fluid"><div class="left-col span12"><p></p><p style="text-align:center;"><img src="http://smartv3.ums.edu.my/pluginfile.php/1/theme_adaptable/adaptablemarketingimages/0/ccby.png" alt="CC-BY-NC" width="88" height="31" /><br /></p><p style="text-align:center;"></p><p><span>OER UMS</span> by <a href="http://www.ums.edu.my/" target="_blank" rel="noreferrer">Universiti Malaysia Sabah</a> is licensed under a <a href="http://creativecommons.org/licenses/by-nc/4.0/">Creative Commons Attribution-NonCommercial 4.0 International License</a>.</p><br /><p></p><p></p></div></div><div class="row-fluid"><div class="left-col span12"><p style="text-align:center;"></p><p style="text-align:center;"></p><p>Follow UMS on: </p><p><a target="_blank" title="UMS Official Facebook Page" href="http://www.facebook.com/UMS.official" rel="noreferrer"><img src="http://smartv3.ums.edu.my/pluginfile.php/1/theme_adaptable/adaptablemarketingimages/0/facebook361.jpg" alt="ico-fb" width="25" height="25" class="img-responsive atto_image_button_text-bottom" /></a><a target="_blank" title="UMS Official Twitter Account" href="http://www.twitter.com/UMS_EcoCampus" rel="noreferrer"><img src="http://smartv3.ums.edu.my/pluginfile.php/1/theme_adaptable/adaptablemarketingimages/0/twitter361.jpg" alt="ico-twitter" width="26" height="26" class="img-responsive atto_image_button_text-bottom" /></a><a target="_blank" title="UMS Official Youtube Channel" href="http://www.youtube.com/channel/UCkriQ1ronfQofaoVH1qYk8A" rel="noreferrer"><img src="http://smartv3.ums.edu.my/pluginfile.php/1/theme_adaptable/adaptablemarketingimages/0/utube361.jpg" alt="ico-youtube" width="25" height="25" class="img-responsive atto_image_button_text-bottom" /></a><a href="https://www.flickr.com/people/124730570@N03/" target="_blank" rel="noreferrer"><img src="http://www.ums.edu.my/v5/images/icon/flickr361-h.jpg" alt="ico-flickr" width="25" height="25" class="img-responsive atto_image_button_text-bottom" /></a><a href="https://my.linkedin.com/pub/ums-official/97/a56/437" target="_blank" rel="noreferrer"><img src="http://smartv3.ums.edu.my/pluginfile.php/1/theme_adaptable/adaptablemarketingimages/0/linkedin.jpg" alt="ico-in" width="25" height="25" class="img-responsive atto_image_button_text-bottom" /></a></p><p></p><p></p></div></div></div>        <div class="container">
            <div class="row-fluid">
                <div class="span12 pagination-centered">
<div class="socialbox"></div>                </div>
            </div>
        </div>

    <div class="info container2 clearfix">
        <div class="container">
            <div class="row-fluid">
                <div class="span4">
                </div>

                <div class="span4 helplink">
                </div>
                <div class="span4">
                                    </div>
            </div>
        </div>
    </div>
</footer>


<a class="back-to-top" href="#top" ><i class="fa fa-angle-up "></i></a>


<script type="text/javascript">
//<![CDATA[
var require = {
    baseUrl : 'https://smartv3.ums.edu.my/lib/requirejs.php/1666672555/',
    // We only support AMD modules with an explicit define() statement.
    enforceDefine: true,
    skipDataMain: true,
    waitSeconds : 0,

    paths: {
        jquery: 'https://smartv3.ums.edu.my/lib/javascript.php/1666672555/lib/jquery/jquery-3.1.0.min',
        jqueryui: 'https://smartv3.ums.edu.my/lib/javascript.php/1666672555/lib/jquery/ui-1.12.1/jquery-ui.min',
        jqueryprivate: 'https://smartv3.ums.edu.my/lib/javascript.php/1666672555/lib/requirejs/jquery-private'
    },

    // Custom jquery config map.
    map: {
      // '*' means all modules will get 'jqueryprivate'
      // for their 'jquery' dependency.
      '*': { jquery: 'jqueryprivate' },

      // 'jquery-private' wants the real jQuery module
      // though. If this line was not here, there would
      // be an unresolvable cyclic dependency.
      jqueryprivate: { jquery: 'jquery' }
    }
};

//]]>
</script>
<script type="text/javascript" src="https://smartv3.ums.edu.my/lib/javascript.php/1666672555/lib/requirejs/require.min.js"></script>
<script type="text/javascript">
//<![CDATA[
require(['core/first'], function() {
;
require(["media_videojs/loader"], function(loader) {
    loader.setUp(function(videojs) {
        videojs.options.flash.swf = "https://smartv3.ums.edu.my/media/player/videojs/videojs/video-js.swf";
videojs.addLanguage("en",{
 "Play": "Play",
 "Pause": "Pause",
 "Current Time": "Current Time",
 "Duration Time": "Duration Time",
 "Remaining Time": "Remaining Time",
 "Stream Type": "Stream Type",
 "LIVE": "LIVE",
 "Loaded": "Loaded",
 "Progress": "Progress",
 "Fullscreen": "Fullscreen",
 "Non-Fullscreen": "Non-Fullscreen",
 "Mute": "Mute",
 "Unmute": "Unmute",
 "Playback Rate": "Playback Rate",
 "Subtitles": "Subtitles",
 "subtitles off": "subtitles off",
 "Captions": "Captions",
 "captions off": "captions off",
 "Chapters": "Chapters",
 "Close Modal Dialog": "Close Modal Dialog",
 "Descriptions": "Descriptions",
 "descriptions off": "descriptions off",
 "Audio Track": "Audio Track",
 "You aborted the media playback": "You aborted the media playback",
 "A network error caused the media download to fail part-way.": "A network error caused the media download to fail part-way.",
 "The media could not be loaded, either because the server or network failed or because the format is not supported.": "The media could not be loaded, either because the server or network failed or because the format is not supported.",
 "The media playback was aborted due to a corruption problem or because the media used features your browser did not support.": "The media playback was aborted due to a corruption problem or because the media used features your browser did not support.",
 "No compatible source was found for this media.": "No compatible source was found for this media.",
 "The media is encrypted and we do not have the keys to decrypt it.": "The media is encrypted and we do not have the keys to decrypt it.",
 "Play Video": "Play Video",
 "Close": "Close",
 "Modal Window": "Modal Window",
 "This is a modal window": "This is a modal window",
 "This modal can be closed by pressing the Escape key or activating the close button.": "This modal can be closed by pressing the Escape key or activating the close button.",
 ", opens captions settings dialog": ", opens captions settings dialog",
 ", opens subtitles settings dialog": ", opens subtitles settings dialog",
 ", opens descriptions settings dialog": ", opens descriptions settings dialog",
 ", selected": ", selected"
});

    });
});;
require(["theme_adaptable/bsoptions"], function(amd) { amd.init(false); });;

require(['core/yui'], function(Y) {
    M.util.init_skiplink(Y);
});
;

        require(['jquery'], function($) {
            $('#loginerrormessage').focus();
        });
;
require(["core/log"], function(amd) { amd.setConfig({"level":"warn"}); });
});
//]]>
</script>
<script type="text/javascript" src="https://smartv3.ums.edu.my/theme/javascript.php/adaptable/1666672555/footer"></script>
<script type="text/javascript">
//<![CDATA[
M.str = {"moodle":{"lastmodified":"Last modified","name":"Name","error":"Error","info":"Information","yes":"Yes","no":"No","cancel":"Cancel","confirm":"Confirm","areyousure":"Are you sure?","closebuttontitle":"Close","unknownerror":"Unknown error"},"repository":{"type":"Type","size":"Size","invalidjson":"Invalid JSON string","nofilesattached":"No files attached","filepicker":"File picker","logout":"Logout","nofilesavailable":"No files available","norepositoriesavailable":"Sorry, none of your current repositories can return files in the required format.","fileexistsdialogheader":"File exists","fileexistsdialog_editor":"A file with that name has already been attached to the text you are editing.","fileexistsdialog_filemanager":"A file with that name has already been attached","renameto":"Rename to \"{$a}\"","referencesexist":"There are {$a} alias\/shortcut files that use this file as their source","select":"Select"},"admin":{"confirmdeletecomments":"You are about to delete comments, are you sure?","confirmation":"Confirmation"},"block":{"addtodock":"Move this to the dock","undockitem":"Undock this item","dockblock":"Dock {$a} block","undockblock":"Undock {$a} block","undockall":"Undock all","hidedockpanel":"Hide the dock panel","hidepanel":"Hide panel"},"langconfig":{"thisdirectionvertical":"btt"}};
//]]>
</script>
<script type="text/javascript">
//<![CDATA[
(function() {Y.use("moodle-core-dock-loader",function() {M.core.dock.loader.initLoader();
});
Y.use("moodle-filter_mathjaxloader-loader",function() {M.filter_mathjaxloader.configure({"mathjaxconfig":"\nMathJax.Hub.Config({\n    config: [\"Accessible.js\", \"Safe.js\"],\n    errorSettings: { message: [\"!\"] },\n    skipStartupTypeset: true,\n    messageStyle: \"none\"\n});\n","lang":"en"});
});
M.util.help_popups.setup(Y);
 M.util.js_pending('random63821c9ab6d2a2'); Y.on('domready', function() { M.util.js_complete("init");  M.util.js_complete('random63821c9ab6d2a2'); });
})();
//]]>
</script>

</div>
</body>
</html>
