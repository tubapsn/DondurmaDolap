<?php

class YetkiliModel {
  
  public $id;
  public $ad;
  public $soyad;
  public $tel;
  public $sifre;
  public $email;

  public static function generator($query) {
    $x = array();
    foreach ($query->result() as $r) {
      $y = new YetkiliModel();
      $y->id = isset($r->yetkili_id) && is_numeric($r->yetkili_id) ? intval($r->yetkili_id) : -1;
      $y->ad = isset($r->yetkili_ad) ? $r->yetkili_ad : null;
      $y->soyad = isset($r->yetkili_soyad) ? $r->yetkili_soyad : null;
      $y->tel = isset($r->yetkili_telefon) ? $r->yetkili_telefon : null;
      $y->sifre = isset($r->yetkili_sifre) ? $r->yetkili_sifre : null;
      $y->email = isset($r->yetkili_email) ? $r->yetkili_email : null;
      $x[] = $y;
    }
    return $x;
  }
}

class Yetkili_model extends CI_Model {
  
  const TABLE_NAME = 'yetkili';
    
  public function __construct() {
    parent::__construct();
  }
  
  public function getYetkiliById($id) {
    $query = $this->db->select('*')->from(self::TABLE_NAME)->where('yetkili_id', $id)->limit(1)->get();
    $r = YetkiliModel::generator($query);
    return array_shift($r);
  }
  
  public function getYetkiliByEmail($email) {
    $query = $this->db->select('*')->from(self::TABLE_NAME)->where('yetkili_email', $email)->limit(1)->get();
    $r = YetkiliModel::generator($query);
    return array_shift($r);
  }
  
  public function login($email, $sifre) {
    $query = $this->db->select('*')->from(self::TABLE_NAME)->where(array('yetkili_email'=>$email, 'yetkili_sifre'=>md5($sifre)))->limit(1)->get();
    $r = YetkiliModel::generator($query);
    return array_shift($r);
  }
}
