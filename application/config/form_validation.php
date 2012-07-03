<?php

$config = array(
    'register' => array(
        /*array(
            'field' => 'firstname',
            'label' => 'Firstname',
            'rules' => 'trim|required|min_length[4]|max_length[30]|xss_clean|is_unique[temp_member.firstname]'
        ),
        array(
            'field' => 'lastname',
            'label' => 'Last Name',
            'rules' => 'trim|required'
        ),*/
        array(
            'field' => 'email',
            'label' => 'Email Address',
            'rules' => 'trim|required|valid_email'
        ),
        array(
            'field' => 'username',
            'label' => 'User Name',
            'rules' => 'trim|required|min_length[4]|is_unique[member.username]'
        ),
       /* array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|required|min_length[4]|max_length[32]|mysql_real_escape_string'
        ),
        array(
            'field' => 'password2',
            'label' => 'Confirm Password',
            'ruels' => 'trim|required|matches[password]'),*/
    ),
    /*'login' => array(
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|required|[min_length[7]|max_length[25]|mysql_real_escape_string'
        ),
        array(
            'field' => 'username',
            'label' => 'Name',
            'rules' => 'trim|required|min_length[4]|max_length[30]|mysql_real_escape_string'
        )
    ),*/
    'recover' => array(
        array(
            'field' => 'username',
            'label' => 'Name',
            'rules' => 'trim|required|min_length[5]|max_length[30]|xss_clean'
        ),
        array(
            'field' => 'mail',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email'
        )
    )
);

/*
  array(
  'field'   => 'username',
  'label'   => 'Name',
  'rules'   => 'trim|required|min_length[5]|max_length[25]|xss_clean'
  ),
  array(
  'field'   => 'pw',
  'label'   => 'Password',
  'rules'   => 'trim|required|min_length[7]|max_length[25]|md5'
  ) */
?>


