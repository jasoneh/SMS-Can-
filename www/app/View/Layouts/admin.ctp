<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-us" xml:lang="en-us" >

<head>
    <title><? echo $title_for_layout ?></title>

        <meta name="robots" content="NONE,NOARCHIVE" />

    <!-- STYLESHEETS -->
        <link href="/smscanada/grappelli/css/base.css" rel="stylesheet" type="text/css" />
        <link href="/smscanada/grappelli/jquery/ui/css/custom-theme/jquery-ui-1.8.custom.css" rel="stylesheet" type="text/css" media="screen" title="no title" charset="utf-8" />
        <link href="/smscanada/grappelli/css/jquery-ui-grappelli-extensions.css" rel="stylesheet" type="text/css" />
    <!-- EXTRASTYLES -->

    <!-- JAVASCRIPTS -->

        <script type="text/javascript">
            // GLOBALS
            var grappelli = {},
                // TODO: klemens: drop ADMIN_URL
                ADMIN_URL = "/admin/",
                MODEL_URL_ARRAY = {1: {pk: 1, app: 'auth', model: 'permission'},2: {pk: 2, app: 'auth', model: 'group'},3: {pk: 3, app: 'auth', model: 'user'},4: {pk: 4, app: 'auth', model: 'message'},5: {pk: 5, app: 'contenttypes', model: 'contenttype'},6: {pk: 6, app: 'sessions', model: 'session'},7: {pk: 7, app: 'sites', model: 'site'}},
                DATE_FORMAT = "%Y-%m-%d",
                TIME_FORMAT = "%H:%M:%S",
                DATETIME_FORMAT = "%Y-%m-%d %H:%M:%S";
        </script>
        <!-- jQuery, jQuery-UI -->
        <script src="/smscanada/grappelli/jquery/jquery-1.6.2.min.js" type="text/javascript"></script>
        <script src="/smscanada/grappelli/jquery/ui/js/jquery-ui-1.8.15.custom.min.js" type="text/javascript"></script>
        <!-- Grappelli Main JS -->

        <script src="/smscanada/grappelli/js/grappelli/grappelli.js" type="text/javascript"></script>
        <!-- Grappelli jQuery Plugins, Widgets -->
        <script src="/smscanada/grappelli/js/grappelli/jquery.grp_collapsible.js" type="text/javascript"></script>
        <script src="/smscanada/grappelli/js/grappelli/jquery.grp_collapsible_group.js" type="text/javascript"></script>
        <script src="/smscanada/grappelli/js/grappelli/jquery.grp_timepicker.js" type="text/javascript"></script>
        <script src="/smscanada/grappelli/js/grappelli/jquery.grp_related_fk.js" type="text/javascript"></script>

        <script src="/smscanada/grappelli/js/grappelli/jquery.grp_related_m2m.js" type="text/javascript"></script>
        <script src="/smscanada/grappelli/js/grappelli/jquery.grp_related_generic.js" type="text/javascript"></script>
        <script src="/smscanada/grappelli/js/grappelli/jquery.grp_autocomplete_fk.js" type="text/javascript"></script>
        <script src="/smscanada/grappelli/js/grappelli/jquery.grp_autocomplete_m2m.js" type="text/javascript"></script>
        <script src="/smscanada/grappelli/js/grappelli/jquery.grp_autocomplete_generic.js" type="text/javascript"></script>


    <script type="text/javascript" src="/admin/jsi18n/"></script>

    <script src="/smscanada/grappelli/js/grappelli/jquery.grp_inline.js" type="text/javascript"></script>
    <script type="text/javascript" charset="utf-8">
        (function($) {
            $(document).ready(function() {
                grappelli.initDateAndTimePicker();
                $("div.container-flexible div.group").grp_collapsible_group();
                $("div#content .collapse").grp_collapsible({
                    on_init: function(elem, options) {
                        // open collapse (and all collapse parents) in case of errors
                        if (elem.find("ul.errorlist").length > 0) {
                            elem.removeClass("closed")
                                .addClass("open");
                            elem.parents(".collapse")
                                .removeClass("closed")
                                .addClass("open");
                        }
                    }
                });
                var related_lookup_fields_fk = [];
                var related_lookup_fields_m2m = [];
                var related_lookup_fields_generic = [];
                var autocomplete_fields_fk = [];
                var autocomplete_fields_m2m = [];
                var autocomplete_fields_generic = [];
                $.each(related_lookup_fields_fk, function() {
                    $("#id_" + this).grp_related_fk({lookup_url:"/grappelli/lookup/related/"});
                });
                $.each(related_lookup_fields_m2m, function() {
                    $("#id_" + this).grp_related_m2m({lookup_url:"/grappelli/lookup/m2m/"});
                });
                $.each(related_lookup_fields_generic, function() {
                    var content_type = "#id_" + this[0],
                        object_id = "#id_" + this[1];
                    $(object_id).grp_related_generic({content_type:content_type, object_id:object_id, lookup_url:"/grappelli/lookup/related/"});
                });
                $.each(autocomplete_fields_fk, function() {
                    $("#id_" + this).grp_autocomplete_fk({
                        lookup_url:"/grappelli/lookup/related/",
                        autocomplete_lookup_url:"/grappelli/lookup/autocomplete/"
                    });
                });
                $.each(autocomplete_fields_m2m, function() {
                    $("#id_" + this).grp_autocomplete_m2m({
                        lookup_url:"/grappelli/lookup/m2m/",
                        autocomplete_lookup_url:"/grappelli/lookup/autocomplete/"
                    });
                });
                $.each(autocomplete_fields_generic, function() {
                    var content_type = "#id_" + this[0],
                        object_id = "#id_" + this[1];
                    $(object_id).grp_autocomplete_generic({
                        content_type:content_type,
                        object_id:object_id,
                        lookup_url:"/grappelli/lookup/related/",
                        autocomplete_lookup_url:"/grappelli/lookup/autocomplete/"
                    });
                });
            });
        })(django.jQuery);
    </script>
    <script type="text/javascript" src="/smscanada/grappelli/js/core.js"></script>
<script type="text/javascript" src="/smscanada/grappelli/js/admin/RelatedObjectLookups.js"></script>
<script type="text/javascript" src="/smscanada/grappelli/js/jquery.min.js"></script>
<script type="text/javascript" src="/smscanada/grappelli/js/jquery.init.js"></script>
<script type="text/javascript" src="/smscanada/grappelli/js/actions.min.js"></script>

    <!-- EXTRAHEAD -->

<script type="text/javascript">
    (function($){
        $(function(){
            try {
                // focus on first form-field
                $("#id_domain, #id_domain_0")
                .eq(0).focus();
            } catch(e) {}
        });
    }(django.jQuery));
</script>

</head>
<body class="sites-site change-form">
    <div id="container">
        <!-- HEADER -->

<div id="header">
    <div class="branding">&nbsp;</div>

    <!-- Title -->
    <div class="admin-title">Grappelli</div>

        <ul id="user-tools">
            <!-- Username -->
            <li class="user-options-container collapse closed">
                <a href="javascript://" class="user-options-handler collapse-handler">mathias</a>
                <ul class="user-options">
                    <!-- Change Password -->

                        <li><a href="/admin/password_change/">

                    Change password</a></li>
                    <!-- Logout -->

                        <li><a href="/admin/logout/">

                    Log out</a></li>
                </ul>
            </li>
            <!-- Userlinks -->


                <!-- JS tests -->


                <!-- Documentation -->



        </ul>



</div>

<script type="text/javascript" charset="utf-8">
    (function($) {
        $(document).ready(function() {
            $("div#header .collapse").grp_collapsible();
        });
    })(django.jQuery);
</script>

            <!-- BREADCRUMBS -->


        <div id="breadcrumbs">
            <?php #TODO: Set correct breadcrumbs ?>
            <!--
             <a href="../../../">Home</a> &rsaquo;

             <a href="../../">Sites</a> &rsaquo;
             <a href="../">Sites</a> &rsaquo;
             Add site
             -->

        </div>



        <!-- MESSAGES -->

        <!-- CONTENT -->
        <div id="content" class="content-flexible">

            <!-- <h1>Add site</h1> -->





    <div class="container-flexible">
        <div class="form-container">
            <?

?>
            <form enctype="multipart/form-data" action="" method="post" id="site_form"><div style='display:none'><input type='hidden' name='csrfmiddlewaretoken' value='24b1b2ae2633c06d20fbe64ca8f2b075' /></div>
                <div>
                    <!-- Popup Hidden Field -->


                    <!-- Submit-Row -->


                    <!-- Errors -->


                    <!-- Fieldsets -->
<?
                    echo $content_for_layout;
/*
                        <fieldset class="module "><div class="row cells-1 domain "><div><div class="column span-4"><label for="id_domain" class="required">Domain name:</label></div><div class="column span-flexible"><input id="id_domain" type="text" class="vTextField" name="domain" maxlength="100" /></div></div></div><div class="row cells-1 name "><div><div class="column span-4"><label for="id_name" class="required">Display name:</label></div><div class="column span-flexible"><input id="id_name" type="text" class="vTextField" name="name" maxlength="50" /></div></div></div></fieldset>

*/
?>




                    <!-- Inlines -->




                    <!-- Submit-Row -->

<div class="module footer">
    <ul class="submit-row">

        <li class="submit-button-container"><input type="submit" value="Save" class="default" name="_save" /></li>

        <li class="submit-button-container"><input type="submit" value="Save and add another" name="_addanother"  /></li>
        <li class="submit-button-container"><input type="submit" value="Save and continue editing" name="_continue" /></li>
    </ul><br clear="all" />
</div>




<script type="text/javascript">
    (function($){
        $(function(){
            try {
                // focus on first form-field
                $("#id_domain, #id_domain_0")
                .eq(0).focus();
            } catch(e) {}
        });
    }(django.jQuery));
</script>

<!-- JS for prepopulated fields -->
<script type="text/javascript">
    (function( $ ) {

    })(django.jQuery);
</script>


                </div>
            </form>
        </div>
    </div>

            <br class="clear" />
        </div>
        <!-- FOOTER -->
        <div id="footer"></div>
    </div>
</body>
</html>