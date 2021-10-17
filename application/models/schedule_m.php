<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Schedule_m extends CI_Model
{
	// 자기주도 스케줄 CRUD start
	function schedule_add($option)
	{
		$this->db->set('s_date', 'NOW()', false);
		$this->db->set('st_id', $option['st_id']);

		$this->db->insert('st_schedule');
		$result = $this->db->insert_id();
		return $result;
	}

	function schedule_gets($option = null)
	{
		$this->db->select('*');
		$this->db->order_by('s_date', 'DESC');
		if ($option) {
			$this->db->where('st_id', $option);
		}
		$result = $this->db->get('st_schedule')->result();
		return $result;
	}

	function schedule_get($id)
	{
		$this->db->select('*');
		$result = $this->db->get_where(
			'st_schedule',
			array('id' => $id)
		)->row();
		return $result;
	}

	function schedule_modify($option)
	{
		$this->db->set('st_id', $option['st_id']);
		$this->db->set('mon_s', $option['mon_s']);
		$this->db->set('tue_s', $option['tue_s']);
		$this->db->set('wed_s', $option['wed_s']);
		$this->db->set('thr_s', $option['thr_s']);
		$this->db->set('fri_s', $option['fri_s']);
		$this->db->set('sat_s', $option['sat_s']);
		$this->db->set('sun_s', $option['sun_s']);
		$this->db->set('time_per_week', $option['time_per_week']);
		$this->db->set('s_date', $option['s_date']);
		$this->db->set('e_date', $option['e_date']);

		$this->db->where('id', $option['id']);

		$this->db->update('st_schedule');

		$id = $option['id'];

		return $id;
	}

	function schedule_delete($id)
	{
		$result = $this->db->delete('st_schedule', array(
			'id' => $id
		));
		return $result;
	}
}
