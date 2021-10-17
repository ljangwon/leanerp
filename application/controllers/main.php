<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Package_model', 'package_model');
    $this->load->model('student_m');
    $this->load->model('schedule_m');
  }

  // READ
  function index()
  {
    $products = $this->package_model->get_products();
    $packages = $this->package_model->get_packages();

    $students = $this->student_m->st_gets();

    $this->load->view(
      'main_v',
      array(
        'students' => $students,
        'product' => $products,
        'package' => $packages
      )
    );
  }

  function student_data()
  {
    $data = $this->student_m->student_list();
    echo json_encode($data);
  }

  //CREATE
  function create()
  {
    $package = $this->input->post('package', TRUE);
    $product = $this->input->post('product', TRUE);
    $this->package_model->create_package($package, $product);
    redirect('package');
  }

  // GET DATA PRODUCT BY PACKAGE ID
  function get_product_by_package()
  {
    $package_id = $this->input->post('package_id');
    $data = $this->package_model->get_product_by_package($package_id)->result();
    foreach ($data as $result) {
      $value[] = (float) $result->product_id;
    }
    echo json_encode($value);
  }

  //UPDATE
  function update()
  {
    $id = $this->input->post('edit_id', TRUE);
    $package = $this->input->post('package_edit', TRUE);
    $product = $this->input->post('product_edit', TRUE);
    $this->package_model->update_package($id, $package, $product);
    redirect('package');
  }

  // DELETE
  function delete()
  {
    $id = $this->input->post('delete_id', TRUE);
    $this->package_model->delete_package($id);
    redirect('package');
  }
}
