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

if (!defined("WHMCS")) {
    die("This file cannot be accessed directly");
}

function anveto_cookies_getmodulename() {
    return "Cookie Law Compliance";
}

function anveto_cookies_compareurlstring($url,$string) {
    if ($url == anveto_cookies_stringtourl($string)) {
        return true;
    }
    return false;
}

function anveto_cookies_config() {
    $configarray = array(
        "name" => anveto_cookies_getmodulename(),
        "description" => "This addon will show an EU cookie law notification.",
        "version" => "1.0",
        "author" => "Anveto",
        "language" => "english",
        "fields" => array(
            "text" => array ("FriendlyName" => "Display text", "Type" => "textarea", "Rows" => "3", "Cols" => "50", "Description" => "Text that will be shown to users", "Default" => 'We use cookies to ensure that we give you the best experience on our website. If you continue without changing your settings, we\'ll assume that you are happy to receive all cookies from this website. If you would like to change your preferences you may do so by following the instructions <a href="http://www.aboutcookies.org/Default.aspx?page=1">here</a><br/><br/><a href="#" id="accept-cookies">Ok, got it!</a>' ),
            "color1" => array ("FriendlyName" => "Background color", "Type" => "text", "Size" => "25", "Description" => "The hex color code for the background", "Default" => "#000000", ),
            "color2" => array ("FriendlyName" => "Text color", "Type" => "text", "Size" => "25", "Description" => "The hex color code for the text", "Default" => "#ffffff", ),
            "color3" => array ("FriendlyName" => "Link color", "Type" => "text", "Size" => "25", "Description" => "The hex color code for any links", "Default" => "#bbc6ef", ),
        ));
    return $configarray;
}

function anveto_cookies_activate() {

    try {
        return array('status' => 'success', 'description' => 'EU cookie law notification will now be shown');
    } catch (ErrorException $e) {
        return array('status'=>'error','description'=>'Something went wrong '.$e->getMessage());
    }


}

function anveto_cookies_deactivate() {
    return array('status'=>'success','description'=>'Thanks for using '.anveto_cookies_getmodulename());
}

function anveto_cookies_upgrade($vars) {

    $version = $vars['version'];

}