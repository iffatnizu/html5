<?php

function debug_print($array = array()) {
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

function getProspectiveUsers() {
    $CI = & get_instance();
    $CI->load->model('model_site');
    return $CI->model_site->getProspectiveUsers();
}

function getUserInfo($user_id = 0) {
    $CI = & get_instance();
    $CI->load->model('model_site');
    return $CI->model_site->getUserInfo($user_id);
}

function getCurrentUsers($city = '') {
    $CI = & get_instance();
    $CI->load->model('model_site');
    return $CI->model_site->getCurrentUsers($city);
}

function getUsers($type = '') {
    $CI = & get_instance();
    $CI->load->model('model_site');
    return $CI->model_site->getUsers($type);
}

function getAllCity() {
    $CI = & get_instance();
    $CI->load->model('model_site');
    return $CI->model_site->getAllCity();
}
