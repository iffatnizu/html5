<?php

class Model_Site extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    /**
     * get all prospective user list as
     * @return type
     */
    public function getProspectiveUsers() {
        $this->db->where(DBConfig::ATT_USERS_TYPE, 'Prospective');
        $this->db->or_where(DBConfig::ATT_USERS_TYPE, 'Both');
        $query = $this->db->get(DBConfig::TABLE_USERS);
        return $query->result_array();
    }

    /**
     * display all current users as list
     * addtional function with conditions using state name
     * @param type $city
     * @return type
     */
    public function getCurrentUsers($city = '') {
        if ($city != '') {
            $this->db->where(DBConfig::ATT_USERS_STATE, $city);
        }
        $this->db->where(DBConfig::ATT_USERS_TYPE, 'Current');
        $this->db->or_where(DBConfig::ATT_USERS_TYPE, 'Both');
        $query = $this->db->get(DBConfig::TABLE_USERS);
        return $query->result_array();
    }

    /**
     * customer add function
     */
    public function add() {
        $data[DBConfig::ATT_USERS_NAME] = $this->input->post(DBConfig::ATT_USERS_NAME);
        $data[DBConfig::ATT_USERS_STATE] = $this->input->post(DBConfig::ATT_USERS_STATE);
        $data[DBConfig::ATT_USERS_USER_TYPE] = $this->input->post(DBConfig::ATT_USERS_USER_TYPE);
        $data[DBConfig::ATT_USERS_TYPE] = $this->input->post(DBConfig::ATT_USERS_TYPE);

        if ($this->db->insert(DBConfig::TABLE_USERS, $data)) {
            if ($this->input->post(DBConfig::ATT_USERS_TYPE) == 'Prospective') {
                redirect(SiteConfig::CONTROLLER_HOME . SiteConfig::METHOD_HOME_PROSPECTIVE_USERS);
            } else {
                redirect(SiteConfig::CONTROLLER_HOME . SiteConfig::METHOD_HOME_CURRENT_USERS);
            }
        }
    }

    /**
     * customer delete function
     * @param type $userId
     * @param type $type
     */
    public function delete($userId = 0, $type = 0) {
        $this->db->where(DBConfig::ATT_USERS_ID, $userId);

        if ($this->db->delete(DBConfig::TABLE_USERS)) {
            if ($type == '1') {
                redirect(SiteConfig::CONTROLLER_HOME . SiteConfig::METHOD_HOME_PROSPECTIVE_USERS);
            } else {
                redirect(SiteConfig::CONTROLLER_HOME . SiteConfig::METHOD_HOME_CURRENT_USERS);
            }
        }
    }

    /**
     * get single user information
     * @param type $user_id
     * @return type
     */
    public function getUserInfo($user_id = 0) {
        $this->db->where(DBConfig::ATT_USERS_ID, $user_id);
        $query = $this->db->get(DBConfig::TABLE_USERS);
        return $query->row_array();
    }

    /**
     * update customer information
     */
    public function update() {
        $this->db->where(DBConfig::ATT_USERS_ID, $this->input->post(DBConfig::ATT_USERS_ID));
        $data[DBConfig::ATT_USERS_NAME] = $this->input->post(DBConfig::ATT_USERS_NAME);
        $data[DBConfig::ATT_USERS_STATE] = $this->input->post(DBConfig::ATT_USERS_STATE);
        $data[DBConfig::ATT_USERS_USER_TYPE] = $this->input->post(DBConfig::ATT_USERS_USER_TYPE);
        $data[DBConfig::ATT_USERS_TYPE] = $this->input->post(DBConfig::ATT_USERS_TYPE);

        if ($this->db->update(DBConfig::TABLE_USERS, $data)) {
            if ($this->input->post(DBConfig::ATT_USERS_TYPE) == 'Prospective') {
                redirect(SiteConfig::CONTROLLER_HOME . SiteConfig::METHOD_HOME_PROSPECTIVE_USERS);
            } else {
                redirect(SiteConfig::CONTROLLER_HOME . SiteConfig::METHOD_HOME_CURRENT_USERS);
            }
        }
    }

    /**
     * get all user list using filter method in controller
     * @param type $type
     * @return type
     */
    public function getUsers($type = '') {
        if ($type == 'list1') {
            $this->db->where(DBConfig::ATT_USERS_TYPE, 'Prospective');
        } else if ($type == 'list2') {
            $this->db->where(DBConfig::ATT_USERS_TYPE, 'Current');
        } else if ($type == 'both') {
            $this->db->where(DBConfig::ATT_USERS_TYPE, 'Both');
        }
        $query = $this->db->get(DBConfig::TABLE_USERS);
        return $query->result_array();
    }

    /**
     * single user tranfer function
     * @param type $user_id
     */
    public function transfer_to_list2($user_id = 0) {
        $this->db->where(DBConfig::ATT_USERS_ID, $user_id);
        $data[DBConfig::ATT_USERS_TYPE] = 'Current';

        if ($this->db->update(DBConfig::TABLE_USERS, $data)) {
            redirect(SiteConfig::CONTROLLER_HOME . SiteConfig::METHOD_HOME_PROSPECTIVE_USERS);
        }
    }

    /**
     * multiple user tranfer function
     */
    public function transfer() {
        $list = $this->input->post('list');
        foreach ($list as $item) {
            $this->db->where(DBConfig::ATT_USERS_ID, $item);
            $data[DBConfig::ATT_USERS_TYPE] = 'Current';
            $data[DBConfig::ATT_USERS_USER_TYPE] = $this->input->post(DBConfig::ATT_USERS_USER_TYPE);
            $this->db->update(DBConfig::TABLE_USERS, $data);
        }
        redirect(SiteConfig::CONTROLLER_HOME . SiteConfig::METHOD_HOME_PROSPECTIVE_USERS);
    }

    /**
     * multiple user deletation function
     */
    public function delete_multi() {
        $list = $this->input->post('list');
        foreach ($list as $item) {
            $this->db->where(DBConfig::ATT_USERS_ID, $item);
            $this->db->delete(DBConfig::TABLE_USERS);
        }
        redirect(SiteConfig::CONTROLLER_HOME . SiteConfig::METHOD_HOME_CURRENT_USERS);
    }

    /**
     * get all city name from user table using distinct function
     * @return type
     */
    public function getAllCity() {
        $this->db->distinct();
        $this->db->select(DBConfig::ATT_USERS_STATE);
        $query = $this->db->get(DBConfig::TABLE_USERS);
        return $query->result_array();
    }

}
