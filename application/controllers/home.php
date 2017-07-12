<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once 'siteConfig.php';
require_once 'dbConfig.php';

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_site');
    }

    /**
     * default index page of site
     */
    public function index() {
        $this->load->view(SiteConfig::COMP_HOME_INDEX);
    }

    /**
     * dashboard of site
     */
    public function master() {
        $data['nav'] = 1;
        $page['content'] = $this->load->view(SiteConfig::COMP_HOME_MASTER, $data, TRUE);
        $this->load->view(SiteConfig::SITE_MASTER, $page);
    }

    /**
     * display all propective users using table
     */
    public function prospective_users() {
        $data['nav'] = 2;
        $data['users'] = getProspectiveUsers();
        $page['content'] = $this->load->view(SiteConfig::COMP_HOME_PROPECTIVE_USERS, $data, TRUE);
        $this->load->view(SiteConfig::SITE_MASTER, $page);
    }

    /**
     * display all current user as list 2 
     * @param type $city
     */
    public function current_users($city = '') {
        $data['nav'] = 3;
        $data['users'] = getCurrentUsers($city);
        $data['cities'] = getAllCity();
        $page['content'] = $this->load->view(SiteConfig::COMP_HOME_CURRENT_USERS, $data, TRUE);
        $this->load->view(SiteConfig::SITE_MASTER, $page);
    }

    /**
     * add new customer
     */
    public function add() {
        $this->model_site->add();
    }

    /**
     * delete customer
     * @param type $userId
     * @param type $type
     */
    public function delete($userId = 0, $type = 1) {
        $this->model_site->delete($userId, $type);
    }

    /**
     * edit customer
     * @param type $user_id
     */
    public function edit($user_id = 0) {
        $data['nav'] = 0;
        $data['user'] = getUserInfo($user_id);
        $page['content'] = $this->load->view(SiteConfig::COMP_HOME_EDIT, $data, TRUE);
        $this->load->view(SiteConfig::SITE_MASTER, $page);
    }

    /**
     * update customer data
     */
    public function update() {
        $this->model_site->update();
    }

    /**
     * filter of user list
     * @param type $type
     */
    public function filter($type = '') {
        $data['nav'] = 4;
        $data['users'] = getUsers($type);
        $page['content'] = $this->load->view(SiteConfig::COMP_HOME_FILTER, $data, TRUE);
        $this->load->view(SiteConfig::SITE_MASTER, $page);
    }

    /**
     * single user tranfer function
     * @param type $user_id
     */
    public function transfer_to_list2($user_id = 0) {
        $this->model_site->transfer_to_list2($user_id);
    }

    /**
     * multiple user transter
     */
    public function transfer() {
        $this->model_site->transfer();
    }

    /**
     * multiple user deletion
     */
    public function delete_multi() {
        $this->model_site->delete_multi();
    }

}
