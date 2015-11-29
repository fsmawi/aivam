<?php

class Controller_Admin_profile extends Controller_Admin
{
  public function action_change()
  {
    $user = Model_User::find($this->current_user->id);
    $val = Model_User::validate('edit');
    $val->add('password', 'Password')->add_rule('required');

    if ($val->run())
    {

        $user->username = $val->validated('username');
        $user->email = $val->validated('email');

        if (!Auth::validate_user($user->username, Input::post('password')))
        {
          Session::set_flash('error', e('Wrong password !!!.'));
        }else{
          if(Input::post('new_password')) {

              if(Aivam_Util::validatePassword(Input::post('new_password')) && Input::post('new_password') == Input::post('password2')) {
                  try {
                      Auth::update_user(
                                array(
                                    'email'        => Input::post('email'),
                                    'password'     => Input::post('new_password'),
                                    'old_password' => Input::post('password'),
                                )
                            );


                      Session::set_flash('success', "Profile updated !");
                      if($user->group == 50) {
                          Response::redirect('admin/export');
                      }else{
                          Response::redirect('admin');
                      }
                  } catch (SimpleUserUpdateException $exc) {
                       Session::set_flash('success', $exc->getMessage());
                  }
              }else{
                  if(!Aivam_Util::validatePassword(Input::post('new_password'))) {
                      Session::set_flash('error', e('Invalid Password.'));
                  }else {
                      Session::set_flash('error', e('Passwords must match.'));
                  }
              }

          }else{

            try {
                Auth::update_user(
                          array(
                              'email' => Input::post('email')
                          )
                      );

                Session::set_flash('success', "Profile updated !");
                if($user->group == 50) {
                    Response::redirect('admin/export');
                }else{
                    Response::redirect('admin');
                }
            } catch (SimpleUserUpdateException $exc) {
                 Session::set_flash('success', $exc->getMessage());
            }
          }
        }

    }
    else
    {
      if (Input::method() == 'POST')
      {
        $user->username = $val->validated('username');
        $user->email = $val->validated('email');

        Session::set_flash('error', $val->error());
      }
    }

    $this->template->set_global('user', $user, false);

    $this->template->title = "Edit My profile";
    $this->template->content = View::forge('admin/users/edit_profile');
  }

}
