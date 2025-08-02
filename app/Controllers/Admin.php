<?php

namespace App\Controllers;

class Admin extends BaseController
{

// START OF PUBLIC PAGES OF ADMIN

// LOGIN PAGE
    public function index(): string
    {
        $this->isLoggedRedirectIfAuthenticated();
        return view('admin/login');
    }

// UPDATE PASSWORD PAGE
    public function getUpdatePassword(): string
    {
        $this->isLogged();
        $data = [];
        $data['header'] = view('/admin/header');
        $data['footer'] = view('/admin/footer');
        return view('admin/update_password', $data);
    }

// NEWS PAGE
    public function getNews(): string
    {
        $this->isLogged();
        $builder = $this->db->table('news');
        $data['slug'] = 'news';
        $data['header'] = view('/admin/header', $data);
        $data['footer'] = view('/admin/footer', $data);
        $data['news'] = $builder->orderBy('id', 'DESC')->get()->getResultArray();

        return view('admin/news', $data);
    }

//  NEWS ADD PAGE
    public function news_add(): string
    {

        $this->isLogged();
        $data = [];
        $builderCategory = $this->db->table('news-category');
        $data['slug'] = 'news';
        $data['news_category'] = $builderCategory->get()->getResultArray();
        $data['header'] = view('/admin/header', $data);
        $data['footer'] = view('/admin/footer', $data);

        return view('admin/newsAdd', $data);
    }

// NEWS EDIT PAGE
    public function news_edit(): string
    {
        $this->isLogged();
        $id = $this->request->getGet('id');
        $builder = $this->db->table('news');
        $query = $builder->where('id', $id)->get();
        $builderCategory = $this->db->table('news-category');
        $data = [];
        $data['slug'] = 'news';
        $data['news_category'] = $builderCategory->get()->getResultArray();
        $data['news'] = $query->getRowArray();
        $data['header'] = view('/admin/header', $data);
        $data['footer'] = view('/admin/footer', $data);

        return view('admin/newsEdit', $data);
    }

// CATALOGS PAGE
    public function getCatalogs(): string
    {
        $this->isLogged();
        $builder = $this->db->table('catalogs');
        $data = [];
        $data['slug'] = 'catalogs';
        $data['header'] = view('/admin/header', $data);
        $data['footer'] = view('/admin/footer', $data);
        $data['catalogs'] = $builder->orderBy('id', 'DESC')->get()->getResultArray();;

        return view('admin/catalogs', $data);
    }

//  CATALOGS ADD PAGE
    public function catalogs_add(): string
    {
        $this->isLogged();
        $builderGenre = $this->db->table('catalog-genre');
        $builderLanguage = $this->db->table('catalog-languages');
        $builderType = $this->db->table('catalog-type');
        $data = [];
        $data['slug'] = 'catalogs';
        $data['languages'] = $builderLanguage->where('id !=', 1)->get()->getResultArray();
        $data['types'] = $builderType->where('id !=', 1)->get()->getResultArray();
        $data['genres'] = $builderGenre->get()->getResultArray();
        $data['header'] = view('/admin/header', $data);
        $data['footer'] = view('/admin/footer', $data);

        return view('admin/catalogsAdd', $data);
    }

// CATALOGS EDIT PAGE
    public function catalogs_edit(): string
    {
        $this->isLogged();
        $data['slug'] = 'catalogs';
        $id = $this->request->getGet('id');
        $builder = $this->db->table('catalogs');
        $query = $builder->where('id', $id)->get();
        $builderGenre = $this->db->table('catalog-genre');
        $builderLanguage = $this->db->table('catalog-languages');
        $builderType = $this->db->table('catalog-type');
        $data['languages'] = $builderLanguage->where('id !=', 1)->get()->getResultArray();
        $data['types'] = $builderType->where('id !=', 1)->get()->getResultArray();
        $data['genres'] = $builderGenre->get()->getResultArray();
        $data['catalog'] = $query->getRowArray();
        $data['header'] = view('/admin/header', $data);
        $data['footer'] = view('/admin/footer', $data);

        return view('admin/catalogsEdit', $data);
    }

    public function getAgenda(): string
    {
        $this->isLogged();
        $builder = $this->db->table('agenda');
        $data = [];
        $data['slug'] = 'agenda';
        $data['header'] = view('/admin/header', $data);
        $data['footer'] = view('/admin/footer', $data);
        $data['agendas'] = $builder->orderBy('id', 'DESC')->get()->getResultArray();;

        return view('admin/agenda', $data);
    }

//  CATALOGS ADD PAGE
    public function agenda_add(): string
    {
        $this->isLogged();
        $data = [];
        $data['slug'] = 'agenda';
        $builderCategory = $this->db->table('agenda-category');
        $builderMonths = $this->db->table('months');
        $data['agenda_category'] = $builderCategory->get()->getResultArray();
        $data['months'] = $builderMonths->get()->getResultArray();
        $data['header'] = view('/admin/header', $data);
        $data['footer'] = view('/admin/footer', $data);

        return view('admin/agendaAdd', $data);
    }

// CATALOGS EDIT PAGE
    public function agenda_edit(): string
    {
        $this->isLogged();
        $id = $this->request->getGet('id');
        $builder = $this->db->table('agenda');
        $builderCategory = $this->db->table('agenda-category');
        $builderMonths = $this->db->table('months');
        $query = $builder->where('id', $id)->get();
        $data = [];
        $data['slug'] = 'agenda';
        $data['agenda_category'] = $builderCategory->get()->getResultArray();
        $data['agenda'] = $query->getRowArray();
        $data['months'] = $builderMonths->get()->getResultArray();
        $data['header'] = view('/admin/header', $data);
        $data['footer'] = view('/admin/footer', $data);

        return view('admin/agendaEdit', $data);
    }

// TEXT CONTROL
    public function getAdminTextControl()
    {
        $this->isLogged();
        $builder = $this->db->table('admin_text_control');
        $data = [];
        $data['slug'] = 'admin_text_control';
        $data['header'] = view('/admin/header', $data);
        $data['footer'] = view('/admin/footer', $data);
        $data['texts'] = $builder->get()->getResultArray();
        return view('admin/adminTextControl', $data);
    }

    public function edit_admin_text()
    {
        $this->isLogged();
        $id = $this->request->getGet('id');
        $builder = $this->db->table('admin_text_control');
        $data = [];
        $data['header'] = view('/admin/header');
        $data['footer'] = view('/admin/footer');
        $data['text'] = $builder->where('id', $id)->get()->getRowArray();

        return view('admin/editAdminText', $data);

    }

// END OF PUBLIC ADMIN PAGES

/////////////////////////////////////////////////////////////////////////////////////

// FUNCTIONS

// LOGIN
    function loginFunction()
    {
        // Start session and ensure it's secure
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Limit the login attempts
        $maxAttempts = 10;
        $lockoutTime = 300; // 5 minutes

        // Check for login attempts in session
        if (!isset($_SESSION['login_attempts'])) {
            $_SESSION['login_attempts'] = 0;
            $_SESSION['first_attempt_time'] = time();
        }

        // Check if the user is locked out
        if ($_SESSION['login_attempts'] >= $maxAttempts) {
            if (time() - $_SESSION['first_attempt_time'] < $lockoutTime) {
                $this->session->setFlashdata('error', 'Too many login attempts. Please try again later.');
                header('Location: /admin/index');
                exit;
            } else {
                // Reset attempts after lockout time has passed
                $_SESSION['login_attempts'] = 0;
            }
        }

        // Fetch admin information securely
        $builder = $this->db->table('admin');
        $info = $builder->where('id', 1)->get()->getRowArray();

        if (!$info) {
            $this->session->setFlashdata('error', 'User not found');
            header('Location: /admin/index');
            exit;
        }

        $db_username = $info['username'];
        $db_password = $info['password'];

        // Get user input and sanitize
        $username = trim($this->request->getPost('username'));
        $password = $this->request->getPost('password');

        // Validate username and password
        if ($username === $db_username && password_verify($password, $db_password)) {
            // Regenerate session to prevent fixation
            session_regenerate_id(true);
            $this->session->set('logged_in', true);
            $this->session->set('username', $username); // Store the username in session for further use

            // Clear login attempts on successful login
            unset($_SESSION['login_attempts']);
            unset($_SESSION['first_attempt_time']);

            header('Location: /admin/admin-news');
            exit;
        } else {
            // Increment login attempts
            $_SESSION['login_attempts']++;
            $this->session->setFlashdata('error', 'Invalid username or password');
            header('Location: /admin/index');
            exit;
        }
    }

// CHECK IF USER IS LOGGED IN
    function isLogged()
    {
        if (empty($this->session->get('logged_in')) || $this->session->get('logged_in') == false) {

            header('Location: /admin/index');
            exit;
        }
    }

    function isLoggedRedirectIfAuthenticated()
    {
        if (!empty($this->session->get('logged_in')) && $this->session->get('logged_in') === true) {
            header('Location: /admin/admin-news'); // Change this to your desired path
            exit;
        }
    }


// CHECK IF USER IS LOGGED IN

// UPDATE PASSWORD
    function updatePassword()
    {
        $verify_new_password = $this->request->getPost('verify_new_password');
        $verify_new_password = trim($verify_new_password);

        // Check if password is empty
        if ($verify_new_password === '') {
            $this->session->setFlashdata('error', 'Password cannot be empty.');
            header('Location: /admin/update_password');
            exit;
        }

        // Check if password length is sufficient
        if (strlen($verify_new_password) < 6) {
            $this->session->setFlashdata('error', 'Short password, it must contain at least 6 characters.');
            header('Location: /admin/update_password');
            exit;
        }

        // Hash and update password if checks are passed
        $data = [
            'password' => password_hash($verify_new_password, PASSWORD_DEFAULT)
        ];

        $this->db->table('admin')->where('id', 1)->update($data);
        $this->session->set('logged_in', true);
        header('Location: /admin/admin-news');
        exit;
    }
// UPDATE PASSWORD

// LOGOUT
    function logoutFunction()
    {
        $this->session->destroy();

        header('Location: /admin/index');
        exit;
    }
// LOGOUT

// NEWS FUNCTIONS
    function newsAdd()
    {
        $postData = $this->request->getPost();
        $response = [
            'status' => 'error',
            'message' => 'An error occurred',
        ];

        //start::image upload part
        $imagePathForDB = '';
        $image = $this->request->getFile('image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            if (in_array($image->getClientMimeType(), ['image/jpeg', 'image/png', 'image/jpg'])) {
                $uploadPath = FCPATH . 'gallery/';
                $imageName = pathinfo($image->getName(), PATHINFO_FILENAME) . '_' . uniqid() . '.' . $image->getClientExtension();
                $imagePathForDB = '/gallery/' . $imageName;
                if (!$image->move($uploadPath, $imageName)) {
                    $response['message'] = 'Failed to move file';
                    return $this->response->setJSON($response);
                }
            } else {
                $response['message'] = 'Invalid image type';
                return $this->response->setJSON($response);
            }
        }
        //end::image upload part

        //start:: db data info for editing
        $data = [
            'title-en' => !empty($postData['title-en']) ? $postData['title-en'] : '',
            'title-nl' => !empty($postData['title-nl']) ? $postData['title-nl'] : '',
            'title-am' => !empty($postData['title-am']) ? $postData['title-am'] : '',
            'author-en' => !empty($postData['author-en']) ? $postData['author-en'] : '',
            'author-nl' => !empty($postData['author-nl']) ? $postData['author-nl'] : '',
            'author-am' => !empty($postData['author-am']) ? $postData['author-am'] : '',
            'date' => !empty($postData['date']) ? $postData['date'] : date('Ymd'),
            'desc-en' => !empty($postData['desc-en']) ? $postData['desc-en'] : '',
            'desc-nl' => !empty($postData['desc-nl']) ? $postData['desc-nl'] : '',
            'desc-am' => !empty($postData['desc-am']) ? $postData['desc-am'] : '',
            'status' => isset($postData['status']) && $postData['status'] === 'on' ? 1 : 0,
            'category' => !empty($postData['category']) ? $postData['category'] : '',
            'image' => trim($imagePathForDB),
        ];
        // end:: db data info for editing

        // start:: validation for empty fields
        $requiredFields = ['title-en', 'title-nl', 'title-am', 'desc-en', 'desc-nl', 'desc-am', 'author-en', 'author-nl', 'author-am'];
        $atLeastOneFilled = false;

        foreach ($requiredFields as $field) {
            if (!empty($data[$field])) {
                $atLeastOneFilled = true;
                break;
            }
        }

        if (empty($postData['title-nl'])) {
            $response['message'] = 'Titel NL is belangrijk..';
            return $this->response->setJSON($response);
        }

        if (empty($postData['author-nl'])) {
            $response['message'] = 'Auteur NL is belangrijk.';
            return $this->response->setJSON($response);
        }

        if (empty($postData['desc-nl'])) {
            $response['message'] = 'Beschrijving NL is belangrijk.';
            return $this->response->setJSON($response);
        }

        if (empty($postData['title-am'])) {
            $response['message'] = 'Titel AM is belangrijk.';
            return $this->response->setJSON($response);
        }

        if (empty($postData['author-am'])) {
            $response['message'] = 'Auteur AM is belangrijk.';
            return $this->response->setJSON($response);
        }

        if (empty($postData['desc-am'])) {
            $response['message'] = 'Beschrijving AM is belangrijk.';
            return $this->response->setJSON($response);
        }

        if (empty($postData['title-en'])) {
            $response['message'] = 'Titel EN is belangrijk.';
            return $this->response->setJSON($response);
        }

        if (empty($postData['author-en'])) {
            $response['message'] = 'Auteur EN is belangrijk.';
            return $this->response->setJSON($response);
        }

        if (empty($postData['desc-en'])) {
            $response['message'] = 'Beschrijving EN is belangrijk.';
            return $this->response->setJSON($response);
        }

        // end:: validation for empty fields

        // start:: adding data to the database
        $builder = $this->db->table('news');
        if ($builder->insert($data)) {
            $response['status'] = 'success';
            $response['message'] = 'Row added successfully';
        } else {
            $response['message'] = 'Failed to add row to the database';
        }

        return $this->response->setJSON($response);
        // end:: adding data to the database

    }

    function newsEdit()
    {
        $postData = $this->request->getPost();
        $newsId = $postData['newsId'];
        $response = [
            'status' => 'error',
            'message' => 'An error occurred',
        ];

        //start::image upload part
        $imagePathForDB = '';
        $imagePathForDBOld = $postData['image_old'];
        $image = $this->request->getFile('image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            if (in_array($image->getClientMimeType(), ['image/jpeg', 'image/png', 'image/jpg'])) {
                $uploadPath = FCPATH . 'gallery/';
                $imageName = pathinfo($image->getName(), PATHINFO_FILENAME) . '_' . uniqid() . '.' . $image->getClientExtension();
                $imagePathForDB = '/gallery/' . $imageName;
                if (!$image->move($uploadPath, $imageName)) {
                    $response['message'] = 'Failed to move file';
                    return $this->response->setJSON($response);
                }
            } else {
                $response['message'] = 'Invalid image type';
                return $this->response->setJSON($response);
            }
        } else {
            $imagePathForDB = $imagePathForDBOld;
        }

        //end::image upload part

        //start:: db data info for editing
        $data = [
            'title-en' => !empty($postData['title-en']) ? $postData['title-en'] : '',
            'title-nl' => !empty($postData['title-nl']) ? $postData['title-nl'] : '',
            'title-am' => !empty($postData['title-am']) ? $postData['title-am'] : '',
            'author-en' => !empty($postData['author-en']) ? $postData['author-en'] : '',
            'author-nl' => !empty($postData['author-nl']) ? $postData['author-nl'] : '',
            'author-am' => !empty($postData['author-am']) ? $postData['author-am'] : '',
            'date' => !empty($postData['date']) ? $postData['date'] : date('Ymd'),
            'desc-en' => !empty($postData['desc-en']) ? $postData['desc-en'] : '',
            'desc-nl' => !empty($postData['desc-nl']) ? $postData['desc-nl'] : '',
            'desc-am' => !empty($postData['desc-am']) ? $postData['desc-am'] : '',
            'status' => isset($postData['status']) && $postData['status'] === 'on' ? 1 : 0,
            'category' => !empty($postData['category']) ? $postData['category'] : '',
            'image' => trim($imagePathForDB),
        ];
        // end:: db data info for editing

        // start:: validation for empty fields
        $requiredFields = ['title-en', 'title-nl', 'title-am', 'desc-en', 'desc-nl', 'desc-am', 'author-en', 'author-nl', 'author-am'];
        $atLeastOneFilled = false;


        foreach ($requiredFields as $field) {
            if (!empty($data[$field])) {
                $atLeastOneFilled = true;
                break;
            }
        }

        if (empty($postData['title-nl'])) {
            $response['message'] = 'Titel NL is belangrijk..';
            return $this->response->setJSON($response);
        }

        if (empty($postData['author-nl'])) {
            $response['message'] = 'Auteur NL is belangrijk.';
            return $this->response->setJSON($response);
        }

        if (empty($postData['desc-nl'])) {
            $response['message'] = 'Beschrijving NL is belangrijk.';
            return $this->response->setJSON($response);
        }

        if (empty($postData['title-am'])) {
            $response['message'] = 'Titel AM is belangrijk.';
            return $this->response->setJSON($response);
        }

        if (empty($postData['author-am'])) {
            $response['message'] = 'Auteur AM is belangrijk.';
            return $this->response->setJSON($response);
        }

        if (empty($postData['desc-am'])) {
            $response['message'] = 'Beschrijving AM is belangrijk.';
            return $this->response->setJSON($response);
        }

        if (empty($postData['title-en'])) {
            $response['message'] = 'Titel EN is belangrijk.';
            return $this->response->setJSON($response);
        }

        if (empty($postData['author-en'])) {
            $response['message'] = 'Auteur EN is belangrijk.';
            return $this->response->setJSON($response);
        }

        if (empty($postData['desc-en'])) {
            $response['message'] = 'Beschrijving EN is belangrijk.';
            return $this->response->setJSON($response);
        }


        if (!$atLeastOneFilled) {
            $response['message'] = 'At least one field (title, information) must be filled.';
            return $this->response->setJSON($response);
        }
        // end:: validation for empty fields

        // start:: adding data to the database
        $builder = $this->db->table('news');
        $builder->where('id', $newsId);

        if ($builder->update($data)) {
            $response['status'] = 'success';
            $response['message'] = 'Row added successfully';
        } else {
            $response['message'] = 'Failed to add row to the database';
        }

        return $this->response->setJSON($response);
        // end:: adding data to the database
    }

    function newsDelete()
    {
        $newsId = $this->request->getGet('id');

        $builder = $this->db->table('news');

        $builder->where('id', $newsId);

        if ($builder->delete()) {
            return redirect()->to(base_url('admin/admin-news'))->send();
        }
    }
// NEWS FUNCTIONS

// CATALOGS FUNCTIONS
    function catalogsAdd()
    {
        $postData = $this->request->getPost();
        $response = [
            'status' => 'error',
            'message' => 'An error occurred',
        ];

        //start::image upload part
        $imagePathForDB = '';
        $image = $this->request->getFile('image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            if (in_array($image->getClientMimeType(), ['image/jpeg', 'image/png', 'image/jpg'])) {
                $uploadPath = FCPATH . 'gallery/';
                $imageName = pathinfo($image->getName(), PATHINFO_FILENAME) . '_' . uniqid() . '.' . $image->getClientExtension();
                $imagePathForDB = '/gallery/' . $imageName;
                if (!$image->move($uploadPath, $imageName)) {
                    $response['message'] = 'Failed to move file';
                    return $this->response->setJSON($response);
                }
            } else {
                $response['message'] = 'Invalid image type';
                return $this->response->setJSON($response);
            }
        }
        //end::image upload part


        // start::pdf upload part
        $pdfPathForDB = ''; // From DB
        $pdf = $this->request->getFile('pdf');

        if ($pdf && $pdf->isValid() && !$pdf->hasMoved()) {
            if ($pdf->getClientMimeType() === 'application/pdf') {
                // Delete old PDF if it exists
                if (!empty($pdfPathForDB) && file_exists(FCPATH . ltrim($pdfPathForDB, '/'))) {
                    unlink(FCPATH . ltrim($pdfPathForDB, '/'));
                }

                $uploadPath = FCPATH . 'pdfs/';
                $pdfName = pathinfo($pdf->getName(), PATHINFO_FILENAME) . '_' . uniqid() . '.' . $pdf->getClientExtension();
                $pdfPathForDB = '/pdfs/' . $pdfName;

                if (!$pdf->move($uploadPath, $pdfName)) {
                    $response['message'] = 'Failed to move PDF file';
                    return $this->response->setJSON($response);
                }
            } else {
                $response['message'] = 'Invalid PDF file';
                return $this->response->setJSON($response);
            }
        }
// end::pdf upload part
        $defaultDesc = !empty($postData['desc-en']) ? $postData['desc-en']
            : (!empty($postData['desc-nl']) ? $postData['desc-nl']
                : (!empty($postData['desc-am']) ? $postData['desc-am'] : ''));

        //start:: db data info for editing
        $data = [
            'title-en' => !empty($postData['title-en']) ? $postData['title-en'] : '',
            'title-nl' => !empty($postData['title-nl']) ? $postData['title-nl'] : '',
            'title-am' => !empty($postData['title-am']) ? $postData['title-am'] : '',
            'link' => $postData['link'] ?? '',
            'author-en' => !empty($postData['author-en']) ? $postData['author-en'] : '',
            'author-nl' => !empty($postData['author-nl']) ? $postData['author-nl'] : '',
            'author-am' => !empty($postData['author-am']) ? $postData['author-am'] : '',
            'desc-en' => !empty($postData['desc-en']) ? $postData['desc-en'] : $defaultDesc,
            'desc-nl' => !empty($postData['desc-nl']) ? $postData['desc-nl'] : $defaultDesc,
            'desc-am' => !empty($postData['desc-am']) ? $postData['desc-am'] : $defaultDesc,
            'language' => !empty($postData['language']) ? $postData['language'] : '',
            'year' => !empty($postData['year']) ? $postData['year'] : '',
            'genre' => !empty($postData['genre']) ? $postData['genre'] : '',
            'type' => !empty($postData['type']) ? $postData['type'] : '',
            'image' => trim($imagePathForDB),
            'pdf' => trim($pdfPathForDB == 1 ? '' : $pdfPathForDB),
            'date' => !empty($postData['date']) ? $postData['date'] : date('Ymd'),
        ];
        // end:: db data info for editing

        // start:: validation for empty fields
        $requiredFields = ['title-en', 'title-nl', 'title-am', 'author-nl', 'author-am', 'year', 'genre', 'type', 'date'];

        $atLeastOneFilled = false;

        foreach ($requiredFields as $field) {
            if (!empty($data[$field])) {
                $atLeastOneFilled = true;
                break;
            }
        }

        if ($postData['type'] != 3 && empty($pdfPathForDB)) {
            if (empty($postData['link'])) {
                $response['message'] = 'Link is belangrijk.';
                return $this->response->setJSON($response);
            }
        }


        if ($postData['type'] != 3 && empty($postData['link'])) {
            if (empty($pdfPathForDB)) {
                $response['message'] = 'Pdf is belangrijk.';
                return $this->response->setJSON($response);
            }
        }

        if (empty($postData['title-nl'])) {
            $response['message'] = 'Titel NL is belangrijk..';
            return $this->response->setJSON($response);
        }

        if (empty($postData['author-nl'])) {
            $response['message'] = 'Auteur NL is belangrijk.';
            return $this->response->setJSON($response);
        }

        if (empty($postData['title-am'])) {
            $response['message'] = 'Titel AM is belangrijk.';
            return $this->response->setJSON($response);
        }

        if (empty($postData['author-am'])) {
            $response['message'] = 'Auteur AM is belangrijk.';
            return $this->response->setJSON($response);
        }


        if (empty($postData['title-en'])) {
            $response['message'] = 'Titel EN is belangrijk.';
            return $this->response->setJSON($response);
        }

        if (empty($postData['author-en'])) {
            $response['message'] = 'Auteur EN is belangrijk.';
            return $this->response->setJSON($response);
        }

        if (!$atLeastOneFilled) {
            $response['message'] = 'At least one field (title, information) must be filled.';
            return $this->response->setJSON($response);
        }
        // end:: validation for empty fields

        // start:: adding data to the database
        $builder = $this->db->table('catalogs');
        if ($builder->insert($data)) {
            $response['status'] = 'success';
            $response['message'] = 'Row added successfully';
        } else {
            $response['message'] = 'Failed to add row to the database';
        }

        return $this->response->setJSON($response);
        // end:: adding data to the database

    }

    function catalogsEdit()
    {

        $postData = $this->request->getPost();
        $catalogId = $postData['catalogId'];
        $response = [
            'status' => 'error',
            'message' => 'An error occurred',
        ];

        //start::image upload part
        $imagePathForDB = '';
        $imagePathForDBOld = $postData['image_old'];
        $image = $this->request->getFile('image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            if (in_array($image->getClientMimeType(), ['image/jpeg', 'image/png', 'image/jpg'])) {
                $uploadPath = FCPATH . 'gallery/';
                $imageName = pathinfo($image->getName(), PATHINFO_FILENAME) . '_' . uniqid() . '.' . $image->getClientExtension();
                $imagePathForDB = '/gallery/' . $imageName;
                if (!$image->move($uploadPath, $imageName)) {
                    $response['message'] = 'Failed to move file';
                    return $this->response->setJSON($response);
                }
            } else {
                $response['message'] = 'Invalid image type';
                return $this->response->setJSON($response);
            }
        } else {
            $imagePathForDB = $imagePathForDBOld;
        }

        //end::image upload part

        // start::pdf upload part
        $pdfPathForDB = $postData['pdf_old']; // Start with the old path as default
        $pdf = $this->request->getFile('pdf');

        if ($pdf && $pdf->isValid() && !$pdf->hasMoved()) {
            if ($pdf->getClientMimeType() === 'application/pdf') {
                // Remove old file if it exists
                if (!empty($postData['pdf_old']) && file_exists(FCPATH . ltrim($postData['pdf_old'], '/'))) {
                    unlink(FCPATH . ltrim($postData['pdf_old'], '/'));
                }

                $uploadPath = FCPATH . 'pdfs/';
                $pdfName = pathinfo($pdf->getName(), PATHINFO_FILENAME) . '_' . uniqid() . '.' . $pdf->getClientExtension();
                $pdfPathForDB = '/pdfs/' . $pdfName;

                if (!$pdf->move($uploadPath, $pdfName)) {
                    $response['message'] = 'Failed to move PDF file';
                    return $this->response->setJSON($response);
                }
            } else {
                $response['message'] = 'Invalid PDF file';
                return $this->response->setJSON($response);
            }
        }
// end::pdf upload part

        $defaultDesc = !empty($postData['desc-en']) ? $postData['desc-en']
            : (!empty($postData['desc-nl']) ? $postData['desc-nl']
                : (!empty($postData['desc-am']) ? $postData['desc-am'] : ''));
        //start:: db data info for editing
        $data = [
            'title-en' => !empty($postData['title-en']) ? $postData['title-en'] : '',
            'title-nl' => !empty($postData['title-nl']) ? $postData['title-nl'] : '',
            'title-am' => !empty($postData['title-am']) ? $postData['title-am'] : '',
            'link' => !empty($postData['link']) ? $postData['link'] : '',
            'author-en' => !empty($postData['author-en']) ? $postData['author-en'] : '',
            'author-nl' => !empty($postData['author-nl']) ? $postData['author-nl'] : '',
            'author-am' => !empty($postData['author-am']) ? $postData['author-am'] : '',
            'desc-en' => !empty($postData['desc-en']) ? $postData['desc-en'] : $defaultDesc,
            'desc-nl' => !empty($postData['desc-nl']) ? $postData['desc-nl'] : $defaultDesc,
            'desc-am' => !empty($postData['desc-am']) ? $postData['desc-am'] : $defaultDesc,
            'language' => !empty($postData['language']) ? $postData['language'] : '',
            'year' => !empty($postData['year']) ? $postData['year'] : '',
            'genre' => !empty($postData['genre']) ? $postData['genre'] : '',
            'type' => !empty($postData['type']) ? $postData['type'] : '',
            'image' => trim($imagePathForDB),
            'pdf' => trim($pdfPathForDB == 1 ? '' : $pdfPathForDB),
            'date' => !empty($postData['date']) ? $postData['date'] : date('Ymd'),
        ];
        // end:: db data info for editing

        // start:: validation for empty fields
        $requiredFields = ['title-en', 'title-nl', 'title-am', 'author-nl', 'author-am', 'author-en', 'year', 'genre', 'type', 'date', 'language'];
        $atLeastOneFilled = false;

        foreach ($requiredFields as $field) {
            if (!empty($data[$field])) {
                $atLeastOneFilled = true;
                break;
            }
        }

        if ($postData['type'] != 3 && empty($pdfPathForDB)) {
            if (empty($postData['link'])) {
                $response['message'] = 'Link is belangrijk.';
                return $this->response->setJSON($response);
            }
        }


        if ($postData['type'] != 3 && empty($postData['link'])) {
            if (empty($pdfPathForDB)) {
                $response['message'] = 'Pdf is belangrijk.';
                return $this->response->setJSON($response);
            }
        }

        if (empty($postData['title-nl'])) {
            $response['message'] = 'Titel NL is belangrijk..';
            return $this->response->setJSON($response);
        }

        if (empty($postData['author-nl'])) {
            $response['message'] = 'Auteur NL is belangrijk.';
            return $this->response->setJSON($response);
        }

        if (empty($postData['title-am'])) {
            $response['message'] = 'Titel AM is belangrijk.';
            return $this->response->setJSON($response);
        }

        if (empty($postData['author-am'])) {
            $response['message'] = 'Auteur AM is belangrijk.';
            return $this->response->setJSON($response);
        }


        if (empty($postData['title-en'])) {
            $response['message'] = 'Titel EN is belangrijk.';
            return $this->response->setJSON($response);
        }

        if (empty($postData['author-en'])) {
            $response['message'] = 'Auteur EN is belangrijk.';
            return $this->response->setJSON($response);
        }


        if (!$atLeastOneFilled) {
            $response['message'] = 'At least one field (title, information) must be filled.';
            return $this->response->setJSON($response);
        }
        // end:: validation for empty fields

        // start:: adding data to the database
        $builder = $this->db->table('catalogs');
        $builder->where('id', $catalogId);

        if ($builder->update($data)) {
            $response['status'] = 'success';
            $response['message'] = 'Row updated successfully';
        } else {
            $response['message'] = 'Failed to add row to the database';
        }

        return $this->response->setJSON($response);
        // end:: adding data to the database
    }

    function catalogsDelete()
    {
        $id = $this->request->getGet('id');

        $builder = $this->db->table('catalogs');

        $builder->where('id', $id);

        if ($builder->delete()) {
            return redirect()->to(base_url('admin/admin-catalogs'))->send();
        }
    }
// CATALOGS FUNCTIONS

// AGENDA FUNCTIONS
    function agendaAdd()
    {
        $postData = $this->request->getPost();
        $response = [
            'status' => 'error',
            'message' => 'An error occurred',
        ];

        //start::image upload part
        $imagePathForDB = '';
        $image = $this->request->getFile('image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            if (in_array($image->getClientMimeType(), ['image/jpeg', 'image/png', 'image/jpg'])) {
                $uploadPath = FCPATH . 'gallery/';
                $imageName = pathinfo($image->getName(), PATHINFO_FILENAME) . '_' . uniqid() . '.' . $image->getClientExtension();
                $imagePathForDB = '/gallery/' . $imageName;
                if (!$image->move($uploadPath, $imageName)) {
                    $response['message'] = 'Failed to move file';
                    return $this->response->setJSON($response);
                }
            } else {
                $response['message'] = 'Invalid image type';
                return $this->response->setJSON($response);
            }
        }
        //end::image upload part

        //start:: db data info for editing
        $data = [
            'title-en' => !empty($postData['title-en']) ? $postData['title-en'] : '',
            'title-nl' => !empty($postData['title-nl']) ? $postData['title-nl'] : '',
            'title-am' => !empty($postData['title-am']) ? $postData['title-am'] : '',
            'date' => !empty($postData['date']) ? $postData['date'] : date('Ymd'),
            'time' => !empty($postData['time']) ? $postData['time'] : date('H:i'),
            'desc-en' => !empty($postData['desc-en']) ? $postData['desc-en'] : '',
            'desc-nl' => !empty($postData['desc-nl']) ? $postData['desc-nl'] : '',
            'desc-am' => !empty($postData['desc-am']) ? $postData['desc-am'] : '',
            'status' => isset($postData['status']) && $postData['status'] === 'on' ? 1 : 0,
            'category' => !empty($postData['category']) ? $postData['category'] : '',
            'month' => !empty($postData['month']) ? $postData['month'] : '',
            'image' => trim($imagePathForDB),
        ];
        // end:: db data info for editing

        // start:: validation for empty fields
        $requiredFields = ['title-en', 'title-nl', 'title-am', 'desc-en', 'desc-nl', 'desc-am', 'author-en', 'author-nl', 'author-am'];
        $atLeastOneFilled = false;

        foreach ($requiredFields as $field) {
            if (!empty($data[$field])) {
                $atLeastOneFilled = true;
                break;
            }
        }

        if (empty($postData['title-nl'])) {
            $response['message'] = 'Titel NL is belangrijk..';
            return $this->response->setJSON($response);
        }

        if (empty($postData['desc-nl'])) {
            $response['message'] = 'Beschrijving NL is belangrijk.';
            return $this->response->setJSON($response);
        }

        if (empty($postData['title-am'])) {
            $response['message'] = 'Titel AM is belangrijk.';
            return $this->response->setJSON($response);
        }

        if (empty($postData['desc-am'])) {
            $response['message'] = 'Beschrijving AM is belangrijk.';
            return $this->response->setJSON($response);
        }

        if (empty($postData['title-en'])) {
            $response['message'] = 'Titel EN is belangrijk.';
            return $this->response->setJSON($response);
        }

        if (empty($postData['desc-en'])) {
            $response['message'] = 'Beschrijving EN is belangrijk.';
            return $this->response->setJSON($response);
        }

        if (!$atLeastOneFilled) {
            $response['message'] = 'At least one field (title, information) must be filled.';
            return $this->response->setJSON($response);
        }
        // end:: validation for empty fields

        // start:: adding data to the database
        $builder = $this->db->table('agenda');
        if ($builder->insert($data)) {
            $response['status'] = 'success';
            $response['message'] = 'Row added successfully';
        } else {
            $response['message'] = 'Failed to add row to the database';
        }

        return $this->response->setJSON($response);
        // end:: adding data to the database
    }

    function agendaEdit()
    {
        $postData = $this->request->getPost();
        $agendaId = $postData['agendaId'];
        $response = [
            'status' => 'error',
            'message' => 'An error occurred',
        ];

        //start::image upload part
        $imagePathForDB = '';
        $imagePathForDBOld = $postData['image_old'];
        $image = $this->request->getFile('image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            if (in_array($image->getClientMimeType(), ['image/jpeg', 'image/png', 'image/jpg'])) {
                $uploadPath = FCPATH . 'gallery/';
                $imageName = pathinfo($image->getName(), PATHINFO_FILENAME) . '_' . uniqid() . '.' . $image->getClientExtension();
                $imagePathForDB = '/gallery/' . $imageName;
                if (!$image->move($uploadPath, $imageName)) {
                    $response['message'] = 'Failed to move file';
                    return $this->response->setJSON($response);
                }
            } else {
                $response['message'] = 'Invalid image type';
                return $this->response->setJSON($response);
            }
        } else {
            $imagePathForDB = $imagePathForDBOld;
        }

        //end::image upload part

        //start:: db data info for editing
        $data = [
            'title-en' => !empty($postData['title-en']) ? $postData['title-en'] : '',
            'title-nl' => !empty($postData['title-nl']) ? $postData['title-nl'] : '',
            'title-am' => !empty($postData['title-am']) ? $postData['title-am'] : '',
            'date' => !empty($postData['date']) ? $postData['date'] : date('Ymd'),
            'time' => !empty($postData['time']) ? $postData['time'] : date('H:i'),
            'desc-en' => !empty($postData['desc-en']) ? $postData['desc-en'] : '',
            'desc-nl' => !empty($postData['desc-nl']) ? $postData['desc-nl'] : '',
            'desc-am' => !empty($postData['desc-am']) ? $postData['desc-am'] : '',
            'status' => isset($postData['status']) && $postData['status'] === 'on' ? 1 : 0,
            'category' => !empty($postData['category']) ? $postData['category'] : '',
            'month' => !empty($postData['month']) ? $postData['month'] : '',
            'image' => trim($imagePathForDB),
        ];
        // end:: db data info for editing

        // start:: validation for empty fields
        $requiredFields = ['title-en', 'title-nl', 'title-am', 'desc-en', 'desc-nl', 'desc-am', 'author-en', 'author-nl', 'author-am'];
        $atLeastOneFilled = false;

        foreach ($requiredFields as $field) {
            if (!empty($data[$field])) {
                $atLeastOneFilled = true;
                break;
            }
        }


        if (empty($postData['title-nl'])) {
            $response['message'] = 'Titel NL is belangrijk..';
            return $this->response->setJSON($response);
        }

        if (empty($postData['desc-nl'])) {
            $response['message'] = 'Beschrijving NL is belangrijk.';
            return $this->response->setJSON($response);
        }

        if (empty($postData['title-am'])) {
            $response['message'] = 'Titel AM is belangrijk.';
            return $this->response->setJSON($response);
        }

        if (empty($postData['desc-am'])) {
            $response['message'] = 'Beschrijving AM is belangrijk.';
            return $this->response->setJSON($response);
        }

        if (empty($postData['title-en'])) {
            $response['message'] = 'Titel EN is belangrijk.';
            return $this->response->setJSON($response);
        }

        if (empty($postData['desc-en'])) {
            $response['message'] = 'Beschrijving EN is belangrijk.';
            return $this->response->setJSON($response);
        }

        if (!$atLeastOneFilled) {
            $response['message'] = 'At least one field (title, information) must be filled.';
            return $this->response->setJSON($response);
        }
        // end:: validation for empty fields

        // start:: adding data to the database
        $builder = $this->db->table('agenda');
        $builder->where('id', $agendaId);

        if ($builder->update($data)) {
            $response['status'] = 'success';
            $response['message'] = 'Row added successfully';
        } else {
            $response['message'] = 'Failed to add row to the database';
        }

        return $this->response->setJSON($response);
        // end:: adding data to the database

    }

    function agendaDelete()
    {
        $id = $this->request->getGet('id');

        $builder = $this->db->table('agenda');

        $builder->where('id', $id);

        if ($builder->delete()) {
            return redirect()->to(base_url('admin/admin-agenda'))->send();
        }
    }
// AGENDA FUNCTIONS

// Home Page Text Change
    function AdminTextChange()
    {
        $postData = $this->request->getPost();
        $textId = $postData['textId'];
        $response = [
            'status' => 'error',
            'message' => 'An error occurred',
        ];


        //start:: db data info for editing
        $data = [
            'text-en' => !empty($postData['text-en']) ? $postData['text-en'] : '',
            'text-nl' => !empty($postData['text-nl']) ? $postData['text-nl'] : '',
            'text-am' => !empty($postData['text-am']) ? $postData['text-am'] : '',
            'link' => !empty($postData['link']) ? $postData['link'] : '',
            'status' => isset($postData['status']) && $postData['status'] === 'on' ? 1 : 0,
        ];
        // end:: db data info for editing

        // start:: validation for empty fields
        $requiredFields = ['text-en', 'text-nl', 'text-am', 'link'];
        $atLeastOneFilled = false;


        foreach ($requiredFields as $field) {
            if (!empty($data[$field])) {
                $atLeastOneFilled = true;
                break;
            }
        }

        if (empty($postData['link'])) {
            $response['message'] = 'Link NL is belangrijk..';
            return $this->response->setJSON($response);
        }


        if (empty($postData['text-nl'])) {
            $response['message'] = 'Text NL is belangrijk..';
            return $this->response->setJSON($response);
        }

        if (empty($postData['text-am'])) {
            $response['message'] = 'Text AM is belangrijk.';
            return $this->response->setJSON($response);
        }


        if (empty($postData['text-en'])) {
            $response['message'] = 'Text EN is belangrijk.';
            return $this->response->setJSON($response);
        }

        if (!$atLeastOneFilled) {
            $response['message'] = 'At least one field must be filled.';
            return $this->response->setJSON($response);
        }

        // end:: validation for empty fields

        // start:: adding data to the database
        $builder = $this->db->table('admin_text_control');
        $builder->where('id', $textId);
        if ($builder->update($data)) {
            $response['status'] = 'success';
            $response['message'] = 'Row updated successfully';
        } else {
            $response['message'] = 'Failed to update row to the database';
        }

        return $this->response->setJSON($response);
        // end:: adding data to the database
    }
// Home Page Text Change


}



