<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service_m extends My_Model{

  protected $_table_name = 'service';
  protected $_primary_key = 's_id';

  public function getServices($c_id)
  {
      // Select all the values
      $this->db->select('s_id');
      $this->db->select('name');
      $this->db->select('r_time');
      $this->db->select('(SELECT COUNT(u_id) FROM user WHERE state=0 AND s_id=service.s_id) as queue_count');
      $this->db->select('(SELECT COUNT(DISTINCT a_id) FROM user WHERE state=1 AND s_id=service.s_id) as handler');

      // From tabel
      $this->db->from('service');

      // Where this
      $this->db->where('c_id',$c_id);
      $this->db->where('state',0);

      // return the result
      return $this->db->get()->result();

  }

  public function getService($s_id)
  {
    // Select all the values
    $this->db->select('service.*');
    $this->db->select('(SELECT COUNT(DISTINCT a_id) FROM user WHERE state=1 AND s_id=service.s_id) as handler');
    $this->db->select('(SELECT COUNT(u_id) FROM user WHERE s_id=service.s_id AND state=0) as queue_count');
    $this->db->select('(SELECT q_no FROM user WHERE s_id=service.s_id AND state=1 ORDER BY u_id LIMIT 1) as current');

    $this->db->from('service');

    $this->db->where('s_id',intval($s_id));

    // return the result
    return $this->db->get()->row();
  }
}
