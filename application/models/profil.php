<?php
class profil extends CI_Model
{
  function tampil_toko()
  {
    return $this->db->get('toko');
  }

  function update_toko()
  {
    return $this->db->get('toko');
  }
}
?>
