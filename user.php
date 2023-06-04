<?php

function navbartop($username, $email)
{
  echo "
    <div class=\"row\">
      <div class=\"col\">
        <nav class=\"navbar navbar-expand-lg navbar-dark bg-dark\">
          <div class=\"container-fluid\">
            <a href=\"main.php\" class=\"navbar-brand mb-0 h1\">Zero Motorsport</a>
            <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
              <span class=\"navbar-toggler-icon\"></span>
            </button>
            <div class=\"collapse navbar-collapse\" id=\"navbarNav\">
              <ul class=\"navbar-nav\">
                <li class=\"nav-item\">
                  <a class=\"nav-link\" href=\"logout.php\">Log Out</a>
                </li>
              </ul>
            </div>
              <ul class=\"nav-item text-end m-0\">
                <div class=\"col\">
                  <h5 class=\"m-0 p-0\" style=\"color: white;\" aria-current=\"page\" href=\"#\">$username</h5>
                  <p class=\"m-0 p-0 fw-light\" style=\"color: grey;\" aria-current=\"page\" href=\"#\">$email</p>
                </div>
              </ul>
          </div>
        </nav>
      </div>
    </div>
    ";
}

class datax
{
  protected $email;
  protected $password;
  protected $userData;

  public function __construct($email, $password)
  {
    $this->userData = [
      (object)[
        'username' => 'Farrelino',
        'email' => "farrelinonismo@gmail.com",
        'password' => "123",
      ],
    ];

    $this->email = $email;
    $this->password = $password;
  }

  protected function auth()
  {
    foreach ($this->userData as $key => $value) {
      if ($value->email == $this->email && $value->password == $this->password) {
        return $value;
      }
    }
    return false;
  }

  public function login()
  {
    $isUser = $this->auth();
    if ($isUser) {
      return $isUser;
    } else {
      return false;
    }
  }
}
