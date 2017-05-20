<?php /**
 *
 */
class login_model extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  function cek_login($emailAdmin, $passwordAdmin)
  {
    return $this->db->get_where('admin', array('emailAdmin'=>$emailAdmin,'passwordAdmin'=>$passwordAdmin));
  }
}
 ?>
