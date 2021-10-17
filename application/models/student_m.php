<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student_m extends CI_Model
{
	// 학생정보 CRUD start 
	function st_add($option)
	{
		$this->db->set('created', 'NOW()', false);
		if ($option['name']) {
			$this->db->set('name', $option['name']);
		}
		if ($option['class_name']) {
			$this->db->set('class_name', $option['class_name']);
		}

		$this->db->insert('student');
		$st_id = $this->db->insert_id();
		return $st_id;
	}

	function student_list()
	{
    $grade1=$this->input->post('grade1');
		$this->db->select('*');
		$this->db->order_by('flag', 'ASC');
		$this->db->order_by('class_name', 'ASC');
		$this->db->order_by('grade1', 'DESC');
		$this->db->order_by('grade2', 'ASC');
		if ($grade1) {
			$this->db->where('grade1', $grade1);
			$this->db->where('flag', 1);
		}
		$result = $this->db->get('student')->result();;
		//$result =  $this->db->query("SELECT * FROM student")->result();
		return $result;
	}

	function st_gets($option = null)
	{
		$this->db->select('*');
		$this->db->order_by('flag', 'ASC');
		$this->db->order_by('class_name', 'ASC');
		$this->db->order_by('grade1', 'DESC');
		$this->db->order_by('grade2', 'ASC');
		if ($option) {
			$this->db->where('grade1', $option);
			$this->db->where('flag', 1);
		}
		$result = $this->db->get('student')->result();;
		//$result =  $this->db->query("SELECT * FROM student")->result();
		return $result;
	}

	function st_gets_today($option = null)
	{
		$this->db->select('*');
		$this->db->order_by('flag', 'ASC');
		$this->db->order_by('class_name', 'ASC');
		$this->db->order_by('grade1', 'DESC');
		$this->db->order_by('grade2', 'ASC');
		if ($option) {
			$this->db->where('class_day1', $option);
			$this->db->or_where('class_day2', $option);
			$this->db->or_where('class_day3', $option);
			$this->db->where('flag', 1);
		}
		$result = $this->db->get('student')->result();;
		//$result =  $this->db->query("SELECT * FROM student")->result();
		return $result;
	}

	function st_get($student_id)
	{
		$this->db->select('*');

		$this->db->select('UNIX_TIMESTAMP(created) AS created');
		$result = $this->db->get_where('student', array(
			'id' => $student_id
		))->row();
		return $result;
	}

	function st_get_count($option)
	{
		$this->db->select('count(*) as cnt');
		$result = $this->db->get_where('student', 
						array(
									'grade1' => $option,
									'flag' => '1'
									))->row();
		return $result;
	}

	function st_get_count_option($option)
	{
		$this->db->select('count(*) as cnt');
		$result = $this->db->get_where(
			'student',
			array(
				'grade1' => $option['grade1'],
				'grade2' => $option['grade2'],
				'flag' => '1'
			)
		)->row();
		return $result;
	}

	function st_get_fees_sum($option)
	{
		$this->db->select_sum('fees');
		$this->db->where(array(
			'grade1' => $option,
			'flag' => '1'
		));
		//$result = $this->db->get_where('student', array('grade1'=>$option))->row();
		$result = $this->db->get('student')->row();
		return $result;
	}

	// 수정 
	function st_modify($option)
	{
		$this->db->set('created', 'NOW()', false);
		$this->db->set('name', $option['name']);
		$this->db->set('s_phone', $option['s_phone']);
		$this->db->set('house', $option['house']);
		$this->db->set('sibling_memo', $option['sibling_memo']);

		$this->db->set('grade1', $option['grade1']);
		$this->db->set('school_name', $option['school_name']);
		$this->db->set('grade2', $option['grade2']);

		$this->db->set('class_name', $option['class_name']);

		$this->db->set('level1', $option['level1']);
		$this->db->set('level2', $option['level2']);
		$this->db->set('level3', $option['level3']);

		$this->db->set('class_day1', $option['class_day1']);
		$this->db->set('class_time1', $option['class_time1']);
		$this->db->set('class_day2', $option['class_day2']);
		$this->db->set('class_time2', $option['class_time2']);
		$this->db->set('class_day3', $option['class_day3']);
		$this->db->set('class_time3', $option['class_time3']);

		$this->db->set('memo', ltrim($option['memo']));
		$this->db->set('fees', $option['fees']);
		$this->db->set('flag', $option['flag']);
		$this->db->set('start_date', $option['start_date']);
		$this->db->set('end_date', $option['end_date']);
		$this->db->set('report_last_date', $option['report_last_date']);

		$this->db->where('id', $option['id']);

		$result = $this->db->update('student');

		return $result;
	}

	// 삭제
	function st_delete($student_id)
	{
		$result = $this->db->delete('student', array(
			'id' => $student_id
		));
		return $result;
	}
	// 학생 정보 CRUD end

}
