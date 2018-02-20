<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Url_model extends CI_Model
{
    public function validateUrl($original_url)
    {
        $response_code = @get_headers($original_url);
        $check_code = preg_match('/([4-5]{1}[0-9]{2})/', $response_code[0]);
        if (!$response_code || $check_code) {
            $exists = false;
        } else {
            $exists = true;
        }
        return $exists;
    }

    public function storeUrl($original_url, $desired_url = false)
    {
        $short_url = $desired_url;

        do {
            if (!$desired_url) {
                $short_url = $this->generateUrl();
            }
            $this->db->where('short_url', $short_url);
            $db_url = $this->db->get('url');
            $db_url = $db_url->result_array();

            if (!$db_url) {
                $data = array('original_url' => $original_url, 'short_url' => $short_url, 'uses' => 0);
                $this->db->insert('url', $data);
                return $short_url;
            }
            if ($desired_url) {
                return false;
            }
        } while ($db_url);
    }

    public function generateUrl()
    {
        return substr(md5(uniqid()), 0, 6);
    }

    public function getOriginalUrl($short_url)
    {
        $this->db->where('short_url', $short_url);
        $db_url = $this->db->get('url');
        $db_url = $db_url->result_array();

        if (!$db_url) {
            return false;
        } else {
            $data = array('uses' => $db_url[0]['uses'] + 1);
            $this->db->where('short_url', $short_url);
            $this->db->update('url', $data);
            return $db_url;
        }
    }

}