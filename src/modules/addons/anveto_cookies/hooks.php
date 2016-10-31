<?php
/**
 * Created by Anveto
 * Date: 24/06/16
 * Time: 21:47
 */


/**
 * Copyright Anveto AB
 * Author: Markus Tenghamn
 * Date: 24/03/15
 * Time: 16:38
 * This is not to be removed.
 *
 * Anveto Cookies
 *
 * Addon was originally created by Anveto
 *
 * @author     Anveto <support@anveto.com>
 * @copyright  Copyright (c) Anveto 2016
 * @license    GNU GPL V3
 * @version    $Id$
 * @link       http://anveto.com
 */

use Illuminate\Database\Capsule\Manager as Capsule;

function anveto_cookies_clientAreaHeadOutput()
{
    if (!isset($_COOKIE['cookie_law'])) {
        $color1 = Capsule::table('tbladdonmodules')->where('module', 'anveto_cookies')->where('setting', 'color1')->first();
        $color2 = Capsule::table('tbladdonmodules')->where('module', 'anveto_cookies')->where('setting', 'color2')->first();
        $color3 = Capsule::table('tbladdonmodules')->where('module', 'anveto_cookies')->where('setting', 'color3')->first();
        $return_head = '
<style type="text/css">
.cookie_law {
    display: none;
    width: 100%;
    position: fixed;
    bottom: 0;
    left: 0;
    background-color: ';
        if ($color1) {
            $return_head .= $color1->value . ';';
        } else {
            $return_head .= '#000000;';
        }
        $return_head .= 'min-height: 50px;
    padding: 20px 15%;
    color: ';
        if ($color2) {
            $return_head .= $color2->value . ';';
        } else {
            $return_head .= '#ffffff;';
        }
        $return_head .= '
}

.cookie_law_close {
    position: absolute;
    top: 10px;
    right: 20px;
    cursor: pointer;
}

.cookie_law a {
    color: ';

        if ($color3) {
            $return_head .= $color3->value . ';';
        } else {
            $return_head .= '#BBC6EF;';
        }
        $return_head .= '
}

.cookie_law a:hover, a:active, a:visited {
    color: ';
        if ($color3) {
            $return_head .= $color3->value . ';';
        } else {
            $return_head .= '#BBC6EF;';
        }
        $return_head .= '
}
</style>';
        return $return_head;
    }
}

function anveto_cookies_clientAreaFooterOutput()
{
    if (!isset($_COOKIE['cookie_law'])) {
        $text = Capsule::table('tbladdonmodules')->where('module', 'anveto_cookies')->where('setting', 'text')->first();
        $return_footer = '<div class="cookie_law" id="cookie_law">';
        if ($text) {
            $return_footer .= $text->value;
        } else {
            $return_footer .= "We use cookies to ensure that we give you the best experience on our website. If you continue without changing your settings, we'll assume that you are happy to receive all cookies from this website. If you would like to change your preferences you may do so by following the instructions <a href=\"http://www.aboutcookies.org/Default.aspx?page=1\">here</a><br/><br/><a href=\"#\" id=\"accept-cookies\">Ok, got it!</a>";
        }

        $return_footer .= '<div class="cookie_law_close" id="cookie_law_close">
        <i class="fa fa-times" aria-hidden="true"></i>
    </div>
</div>
<script type="text/javascript">
// EU Cookie Law compliance
var cookie = $("#cookie_law");
// Show the dialog
cookie.show();

// When the user clicks close we set a cookie for 3000 days and only display the dialog again if the cookie is removed
$(document).on("click", "#cookie_law_close", function () {
    var exdate=new Date()
    exdate.setDate(exdate.getDate()+3000)
    document.cookie="cookie_law"+ "=1;path=/;expires="+exdate.toUTCString();
    cookie.hide();
});
$(document).on("click", "#accept-cookies", function () {
    var exdate=new Date()
    exdate.setDate(exdate.getDate()+3000)
    document.cookie="cookie_law"+ "=1;path=/;expires="+exdate.toUTCString();
    cookie.hide();
});
</script>';
        return $return_footer;
    }
}

add_hook("ClientAreaHeadOutput", 10, "anveto_cookies_clientAreaHeadOutput");
add_hook("ClientAreaFooterOutput", 10, "anveto_cookies_clientAreaFooterOutput");