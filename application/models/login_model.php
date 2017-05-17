<?php /**
 *
 */
class login_model extends CI_Model
{
  function login($emailAdmin,$passwordAdmin)
  {
    $this -> db -> select('idAdmin, emailAdmin, passwordAdmin');
    $this -> db -> from('admin');
    $this -> db -> where('emailAdmin', $emailAdmin);
    $this -> db -> where('passwordAdmin', MD5($passwordAdmin));
    $this -> db -> limit(1);
    $query = $this -> db -> get();

    if($query -> num_rows() == 1)
    {
      return $query->result();
    }
    else
    {
      return false;
    }
  }
}
 ?>
