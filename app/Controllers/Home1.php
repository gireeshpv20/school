<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // Default route (can redirect to login or dashboard)
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/dashboard');
        }
        return redirect()->to('/login');
    }

    // Login Form
    public function login()
    {
        return view('login');
    }
    
    public function auth()
	{
		$client = \Config\Services::curlrequest();

		try {
			$payload = [
				'school'   => $this->request->getVar('school'),
				'username' => $this->request->getVar('username'),
				'password' => $this->request->getVar('password'),
			];

			$response = $client->post('https://api.schoolgate.co.in/api/userlogin', [
				'headers' => [
					'Content-Type' => 'application/json',
				],
				'body'    => json_encode($payload),
				'http_errors' => false,
				'verify'      => false,
			]);

			$statusCode = $response->getStatusCode();
			$body       = $response->getBody();
			$result     = json_decode($body, true);

			// Debug raw response if JSON fails
			if ($result === null) {
				session()->setFlashdata('msg', "Invalid API Response (Status $statusCode): " . $body);
				return redirect()->to('/login');
			}

			// Invalid login
			if (isset($result['error'])) {
				session()->setFlashdata('msg', $result['error']);
				return redirect()->to('/login');
			}

			// Success
			session()->set([
				'token'      => $result['token'],
				'user_id'    => $result['userid'],
				'student_id' => $result['studentid'],
				'teacher_id' => $result['teacherid'],
				'school_id'  => $result['schoolid'],
				'username'   => $result['username'],
				'school'     => $result['school'],
				'fullname'   => $result['fullname'],
				'role'       => $result['role'],
				'standard'   => $result['standard'],
				'division'   => $result['division'],
				'class_id'   => $result['classid'],
				'mobile'     => $result['mobile'],
				'acyear'     => $result['acyear'],
				'isLoggedIn' => true
			]);

			return redirect()->to('/dashboard');

		} catch (\Exception $e) {
			log_message('error', 'Login API error: ' . $e->getMessage());
			session()->setFlashdata('msg', 'Login failed. Please try again.');
			return redirect()->to('/login');
		}
	}

	// Logout
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

	public function dashboard()
    {
		$session = session();
		$data = [
            'session'    => $session->get(),
            'activePage' => 'dashboard'
        ];
        // Pass session data to view
        return view('dashboard', $data);
	}
	
	
	
	
	public function classgroups()
	{
		$schoolid  = null;
		if (isset($_POST['schoolform'])) {
			$client = \Config\Services::curlrequest();
			$token    = session()->get('token');       // Get token from session
			$schoolid = $this->request->getVar('schoolid');   // Get school id from session

			// If token or school_id missing, redirect to login or return error
			if (!$token || !$schoolid) {
				return redirect()->to('/login');
			}

			try {
				$response = $client->get("https://api.schoolgate.co.in/api/GetClassGroupListByAdmin", [
					'headers' => [
						'Authorization' => 'Bearer ' . $token,
						'Accept'        => 'application/json',
					],
					'query' => [
						'schoolid' => $schoolid
					],
					'http_errors' => false,
					'verify'      => false
				]);

				$result = json_decode($response->getBody(), true);

				// Debug: if API fails
				if ($result === null) {
					return $this->response->setJSON([
						'error' => 'Invalid response from API',
						'raw'   => $response->getBody()
					]);
				}

				// Check if API returned an error message
				if (isset($result['message'])) {
					return $this->response->setJSON([
						'error'   => $result['message'],
						'details' => $result
					]);
				}

				// Pass data to view
				//return view('class/classgroups_list', ['groups' => $result]);

			} catch (\Exception $e) {
				return $this->response->setJSON([
					'error' => 'Exception occurred',
					'message' => $e->getMessage()
				]);
			}
		}else{
			$client = \Config\Services::curlrequest();
			$token    = session()->get('token');       // Get token from session
			$schoolid = session()->get('school_id');   // Get school id from session

			// If token or school_id missing, redirect to login or return error
			if (!$token || !$schoolid) {
				return redirect()->to('/login');
			}

			try {
				$response = $client->get("https://api.schoolgate.co.in/api/GetClassGroupListByAdmin", [
					'headers' => [
						'Authorization' => 'Bearer ' . $token,
						'Accept'        => 'application/json',
					],
					'query' => [
						'schoolid' => $schoolid
					],
					'http_errors' => false,
					'verify'      => false
				]);

				$result = json_decode($response->getBody(), true);

				// Debug: if API fails
				if ($result === null) {
					return $this->response->setJSON([
						'error' => 'Invalid response from API',
						'raw'   => $response->getBody()
					]);
				}

				// Check if API returned an error message
				if (isset($result['message'])) {
					return $this->response->setJSON([
						'error'   => $result['message'],
						'details' => $result
					]);
				}

				// Pass data to view
				//return view('class/classgroups_list', ['groups' => $result]);

			} catch (\Exception $e) {
				return $this->response->setJSON([
					'error' => 'Exception occurred',
					'message' => $e->getMessage()
				]);
			}
		}
		
		return view('class/classgroups_list', ['groups' => $result, 'schoolid' => $schoolid, 'activePage' => 'classgroups']);
	}


	public function classlists()
	{
		$schoolid  = null;
		if (isset($_POST['schoolform'])) {	
			$client = \Config\Services::curlrequest();

			$token    = session()->get('token');       // Get token from session
			$schoolid = $this->request->getVar('schoolid');

			// If token or school_id missing, redirect to login or return error
			if (!$token || !$schoolid) {
				return redirect()->to('/login');
			}

			try {
				$response = $client->get("https://api.schoolgate.co.in/api/GetClassListByAdmin", [
					'headers' => [
						'Authorization' => 'Bearer ' . $token,
						'Accept'        => 'application/json',
					],
					'query' => [
						'schoolid' => $schoolid
					],
					'http_errors' => false,
					'verify'      => false
				]);

				$result = json_decode($response->getBody(), true);

				// Debug: if API fails
				if ($result === null) {
					return $this->response->setJSON([
						'error' => 'Invalid response from API',
						'raw'   => $response->getBody()
					]);
				}

				// Check if API returned an error message
				if (isset($result['message'])) {
					return $this->response->setJSON([
						'error'   => $result['message'],
						'details' => $result
					]);
				}

				// Pass data to view
				//return view('class/classlists', ['groups' => $result]);

			} catch (\Exception $e) {
				return $this->response->setJSON([
					'error' => 'Exception occurred',
					'message' => $e->getMessage()
				]);
			}
		}else{
			$client = \Config\Services::curlrequest();

			$token    = session()->get('token');       // Get token from session
			$schoolid = session()->get('school_id');

			// If token or school_id missing, redirect to login or return error
			if (!$token || !$schoolid) {
				return redirect()->to('/login');
			}

			try {
				$response = $client->get("https://api.schoolgate.co.in/api/GetClassListByAdmin", [
					'headers' => [
						'Authorization' => 'Bearer ' . $token,
						'Accept'        => 'application/json',
					],
					'query' => [
						'schoolid' => $schoolid
					],
					'http_errors' => false,
					'verify'      => false
				]);

				$result = json_decode($response->getBody(), true);

				// Debug: if API fails
				if ($result === null) {
					return $this->response->setJSON([
						'error' => 'Invalid response from API',
						'raw'   => $response->getBody()
					]);
				}

				// Check if API returned an error message
				if (isset($result['message'])) {
					return $this->response->setJSON([
						'error'   => $result['message'],
						'details' => $result
					]);
				}

				// Pass data to view
				//return view('class/classlists', ['groups' => $result]);

			} catch (\Exception $e) {
				return $this->response->setJSON([
					'error' => 'Exception occurred',
					'message' => $e->getMessage()
				]);
			}
		}
		return view('class/classlists', ['groups' => $result, 'schoolid' => $schoolid, 'activePage' => 'classlists']);
	}


	public function studentlists()
	{
		$schoolid  = null;
		if (isset($_POST['schoolform'])) {
			$client = \Config\Services::curlrequest();

			$token    = session()->get('token');       // Get token from session
			$schoolid = $this->request->getVar('schoolid');
			$standard = $this->request->getVar('standard');
			$division = $this->request->getVar('division');

			// If token or school_id missing, redirect to login or return error
			if (!$token || !$schoolid) {
				return redirect()->to('/login');
			}

			try {
				$response = $client->get("https://api.schoolgate.co.in/api/GetStudentList", [
					'headers' => [
						'Authorization' => 'Bearer ' . $token,
						'Accept'        => 'application/json',
					],
					'query' => [
						'school' => $schoolid,
						'standard' => $standard,
						'division' => $division
					],
					'http_errors' => false,
					'verify'      => false
				]);

				$result = json_decode($response->getBody(), true);

				// Debug: if API fails
				if ($result === null) {
					return $this->response->setJSON([
						'error' => 'Invalid response from API',
						'raw'   => $response->getBody()
					]);
				}

				// Check if API returned an error message
				if (isset($result['message'])) {
					return $this->response->setJSON([
						'error'   => $result['message'],
						'details' => $result
					]); 
				}

				// Pass data to view
				//return view('student/studentlists', ['groups' => $result]);

			} catch (\Exception $e) {
				return $this->response->setJSON([
					'error' => 'Exception occurred',
					'message' => $e->getMessage()
				]);
			}
		}else{
			
			
			
			
			$client = \Config\Services::curlrequest();

			$token    = session()->get('token');       // Get token from session
			$schoolid = session()->get('school');
			$standard = 'III';
			$division = 'A';
			

			// If token or school_id missing, redirect to login or return error
			if (!$token || !$schoolid) {
				return redirect()->to('/login');
			}

			try {
				$response = $client->get("https://api.schoolgate.co.in/api/GetStudentList", [
					'headers' => [
						'Authorization' => 'Bearer ' . $token,
						'Accept'        => 'application/json',
					],
					'query' => [
						'school' => $schoolid,
						'standard' => $standard,
						'division' => $division
					],
					'http_errors' => false,
					'verify'      => false
				]);

				$result = json_decode($response->getBody(), true);

				// Debug: if API fails
				if ($result === null) {
					return $this->response->setJSON([
						'error' => 'Invalid response from API',
						'raw'   => $response->getBody()
					]);
				}

				// Check if API returned an error message
				if (isset($result['message'])) {
					return $this->response->setJSON([
						'error'   => $result['message'],
						'details' => $result
					]); 
				}

				// Pass data to view
				//return view('student/studentlists', ['groups' => $result]);

			} catch (\Exception $e) {
				return $this->response->setJSON([
					'error' => 'Exception occurred',
					'message' => $e->getMessage()
				]);
			}
		}
		return view('student/studentlists', ['groups' => $result, 'schoolid' => $schoolid, 'activePage' => 'studentlists']);
	}
	
	
	// Admissions Details
    public function studentDetails($id)
    {
        
    
        return $this->response->setJSON($admission);
    }


	public function teacherlists()
	{
		$schoolid = null;
		if (isset($_POST['schoolform'])) {
			$client = \Config\Services::curlrequest();

			$token    = session()->get('token');       // Get token from session
			$schoolid = $this->request->getVar('schoolid');

			// If token or school_id missing, redirect to login or return error
			if (!$token || !$schoolid) {
				return redirect()->to('/login');
			}

			try {
				$response = $client->get("https://api.schoolgate.co.in/api/GetTeacherList", [
					'headers' => [
						'Authorization' => 'Bearer ' . $token,
						'Accept'        => 'application/json',
					],
					'query' => [
						'school' => $schoolid
					],
					'http_errors' => false,
					'verify'      => false
				]);

				$result = json_decode($response->getBody(), true);

				// Debug: if API fails
				if ($result === null) {
					return $this->response->setJSON([
						'error' => 'Invalid response from API',
						'raw'   => $response->getBody()
					]);
				}

				// Check if API returned an error message
				if (isset($result['message'])) {
					return $this->response->setJSON([
						'error'   => $result['message'],
						'details' => $result
					]);
				}

				// Pass data to view
				//return view('teacher/teacherlists', ['groups' => $result]);

			} catch (\Exception $e) {
				return $this->response->setJSON([
					'error' => 'Exception occurred',
					'message' => $e->getMessage()
				]);
			}
		}else{
			$client = \Config\Services::curlrequest();

			$token    = session()->get('token');       // Get token from session
			$schoolid = session()->get('school');

			// If token or school_id missing, redirect to login or return error
			if (!$token || !$schoolid) {
				return redirect()->to('/login');
			}

			try {
				$response = $client->get("https://api.schoolgate.co.in/api/GetTeacherList", [
					'headers' => [
						'Authorization' => 'Bearer ' . $token,
						'Accept'        => 'application/json',
					],
					'query' => [
						'school' => $schoolid
					],
					'http_errors' => false,
					'verify'      => false
				]);

				$result = json_decode($response->getBody(), true);

				// Debug: if API fails
				if ($result === null) {
					return $this->response->setJSON([
						'error' => 'Invalid response from API',
						'raw'   => $response->getBody()
					]);
				}

				// Check if API returned an error message
				if (isset($result['message'])) {
					return $this->response->setJSON([
						'error'   => $result['message'],
						'details' => $result
					]);
				}

				// Pass data to view
				//return view('teacher/teacherlists', ['groups' => $result]);

			} catch (\Exception $e) {
				return $this->response->setJSON([
					'error' => 'Exception occurred',
					'message' => $e->getMessage()
				]);
			}
		}
		return view('teacher/teacherlists', ['groups' => $result, 'schoolid' => $schoolid, 'activePage' => 'teacherlists']);
	}
	
	// Admissions Details
    public function updateTeacher($id)
{
    $client = \Config\Services::curlrequest();
    $token  = session()->get('token');
    $schoolid = session()->get('school');

    if (!$token || !$schoolid) {
        return redirect()->to('/login');
    }

    $data = [
        'teacherid'    => $this->request->getPost('teacherid'),
        'schoolid'     => $this->request->getPost('schoolid'),
        'school'       => $this->request->getPost('school'),
        'empno'        => $this->request->getPost('empno'),
        'teachername'  => $this->request->getPost('teachername'),
        'qualification'=> $this->request->getPost('qualification'),
        'mobile'       => $this->request->getPost('mobile'),
        'address'      => $this->request->getPost('address'),
        'email'        => $this->request->getPost('email'),
        'dob'          => $this->request->getPost('dob'),
        'gender'       => $this->request->getPost('gender'),
        'status'       => $this->request->getPost('status'),
    ];

    try {
        $response = $client->post("https://api.schoolgate.co.in/api/UpdateTeacherDetails", [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Accept'        => 'application/json',
                'Content-Type'  => 'application/json',
            ],
            'body' => json_encode($data),
            'http_errors' => false,
            'verify' => false
        ]);

        $statusCode = $response->getStatusCode();
        $body       = $response->getBody();
        $result     = json_decode($body, true);

        log_message('error', 'UpdateTeacher Status: ' . $statusCode);
        log_message('error', 'UpdateTeacher Response: ' . $body);

        if ($statusCode === 200 && isset($result['message'])) {
            return redirect()->to('/teacherlist')->with('success', $result['message']);
        } else {
            return redirect()->back()->with('error', $result['message'] ?? "Update failed (HTTP $statusCode)");
        }

    } catch (\Exception $e) {
        return redirect()->back()->with('error', $e->getMessage());
    }
}

public function getClassList()
{
    $client   = \Config\Services::curlrequest();
    $token    = session()->get('token');
    $schoolid = session()->get('school_id');

    if (!$token || !$schoolid) {
        return $this->response->setJSON(['error' => 'Unauthorized']);
    }

    try {
        $response = $client->get("https://api.schoolgate.co.in/api/GetClassListByAdmin", [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Accept'        => 'application/json',
            ],
            'query' => [
                'schoolid' => $schoolid
            ],
            'http_errors' => false,
            'verify'      => false
        ]);

        $result = json_decode($response->getBody(), true);

        if ($result === null || isset($result['message'])) {
            return $this->response->setJSON(['error' => 'Invalid API response']);
        }

        return $this->response->setJSON($result);

    } catch (\Exception $e) {
        return $this->response->setJSON(['error' => $e->getMessage()]);
    }
}

public function addTeacher()
    {
        
		helper(['form', 'url']);
		$schoolid = session()->get('school_id');
        if (isset($_POST['schoolform'])) {
			
            $data = [
                'schoolid'      => $schoolid,
				'school'      => $this->request->getPost('school'),
                'empno'         => $this->request->getPost('empno'),
                'teachername'   => $this->request->getPost('teachername'),
                'qualification' => $this->request->getPost('qualification'),
                'mobile'        => $this->request->getPost('mobile'),
                'address'       => $this->request->getPost('address'),
                'email'         => $this->request->getPost('email'),
                'dob'           => $this->request->getPost('dob'),
                'gender'        => $this->request->getPost('gender'),
            ];

            // Call API
            $client = \Config\Services::curlrequest();
            $token  = session()->get('token');

            $response = $client->post("https://api.schoolgate.co.in/api/AddTeacherDetails", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                    'Accept'        => 'application/json',
                ],
                'json' => $data,
                'http_errors' => false,
                'verify' => false,
            ]);

            $result = json_decode($response->getBody(), true);

            if ($response->getStatusCode() == 200) {
                return redirect()->to('/teacherlist')->with('success', 'Teacher added successfully!');
            } else {
                return redirect()->back()->with('error', $result['message'] ?? 'Something went wrong');
            }
        }

        $data = [
            'activePage' => 'teacherlists'
        ];
        
        // Show add teacher form
        return view('teacher/add', $data);
    }
    
    
    public function getSubjects()
    {
        $client   = \Config\Services::curlrequest();
        $token    = session()->get('token');       // Get token from session
        $schoolid = $this->request->getVar('schoolid');
        $classgroup = $this->request->getVar('classgroup');
    
        // If token or school_id missing, redirect to login or return error
        if (!$token || !$schoolid) {
            return $this->response->setJSON([
                'error' => 'Token or School ID missing, please login again.'
            ]);
        }
    
        try {
            $response = $client->get("https://api.schoolgate.co.in/api/GetClassSubjectList", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                    'Accept'        => 'application/json',
                ],
                'query' => [
                    'schoolid'   => $schoolid,
                    'classgroup' => $classgroup
                ],
                'http_errors' => false,
                'verify'      => false
            ]);
    
            $result = json_decode($response->getBody(), true);
    
            // Debug: if API fails
            if ($result === null) {
                return $this->response->setJSON([
                    'error' => 'Invalid response from API',
                    'raw'   => $response->getBody()
                ]);
            }
    
            // Check if API returned an error message
            if (isset($result['message'])) {
                return $this->response->setJSON([
                    'error'   => $result['message'],
                    'details' => $result
                ]);
            }
    
            // Return JSON to AJAX
            return $this->response->setJSON($result);
    
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'error' => 'Exception occurred',
                'message' => $e->getMessage()
            ]);
        }
    }
    
    
    public function getClasses()
{
    $client      = \Config\Services::curlrequest();
    $token       = session()->get('token');       // Get token from session
    $schoolid    = $this->request->getVar('schoolid');
    $classgroup  = $this->request->getVar('classgroup'); // could be classid or classgroup

    if (!$token || !$schoolid) {
        return $this->response->setJSON([
            'error' => 'Token or School ID missing, please login again.'
        ]);
    }

    try {
        $response = $client->get("https://api.schoolgate.co.in/api/GetClassListByAdmin", [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Accept'        => 'application/json',
            ],
            'query'       => [
                'schoolid' => $schoolid
            ],
            'http_errors' => false,
            'verify'      => false
        ]);

        $result = json_decode($response->getBody(), true);

        if ($result === null) {
            return $this->response->setJSON([
                'error' => 'Invalid response from API',
                'raw'   => $response->getBody()
            ]);
        }

        if (isset($result['message'])) {
            return $this->response->setJSON([
                'error'   => $result['message'],
                'details' => $result
            ]);
        }

        // --- FILTER BY CLASSGROUP ---
        if ($classgroup) {
            $result = array_filter($result, function($cls) use ($classgroup) {
                // If you want to filter by classid:
                // return $cls['classid'] == $classgroup;

                // If you want to filter by classgroup name:
                return $cls['classgroup'] == $classgroup;
            });

            // Reindex array after filtering
            $result = array_values($result);
        }

        return $this->response->setJSON($result);

    } catch (\Exception $e) {
        return $this->response->setJSON([
            'error'   => 'Exception occurred',
            'message' => $e->getMessage()
        ]);
    }
}


    public function updateStudent($id)
    {
        $client = \Config\Services::curlrequest();
        $token  = session()->get('token');
        $schoolid = session()->get('school');
    
        if (!$token || !$schoolid) {
            return redirect()->to('/login');
        }
    
        $data = [
            'studentid'    => $this->request->getPost('studentid'),
            'schoolid'     => $this->request->getPost('schoolid'),
            'school'       => $this->request->getPost('school'),
            'studentname'  => $this->request->getPost('studentname'),
            'fathername'   => $this->request->getPost('fathername'),
            'mothername'   => $this->request->getPost('mothername'),
            'dob'          => $this->request->getPost('dob'),
            'mobile'       => $this->request->getPost('mobile'),
            'standard'     => $this->request->getPost('standard'),
            'division'     => $this->request->getPost('division'),
            'address'      => $this->request->getPost('address'),
            'height'       => $this->request->getPost('height'),
            'weight'       => $this->request->getPost('weight'),
            'rollno'       => $this->request->getPost('rollno'),
            'email'        => $this->request->getPost('email')
        ];
 //print_r($data);exit;   
        try {
            $response = $client->post("https://api.schoolgate.co.in/api/UpdateStudentDetails", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json',
                ],
                'body' => json_encode($data),
                'http_errors' => false,
                'verify' => false
            ]);
    
            $statusCode = $response->getStatusCode();
            $body       = $response->getBody();
            $result     = json_decode($body, true);
    
            log_message('error', 'UpdateTeacher Status: ' . $statusCode);
            log_message('error', 'UpdateTeacher Response: ' . $body);
    
            if ($statusCode === 200 && isset($result['message'])) {
                return redirect()->to('/studentlist')->with('success', $result['message']);
            } else {
                return redirect()->back()->with('error', $result['message'] ?? "Update failed (HTTP $statusCode)");
            }
    
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    
    
    public function addStudent()
    {
        
		helper(['form', 'url']);
		$schoolid = session()->get('school_id');
        if (isset($_POST['schoolform'])) {
			
            $data = [
                'schoolid'     => $schoolid,
                'school'       => $this->request->getPost('school'),
                'studentname'  => $this->request->getPost('studentname'),
                'fathername'   => $this->request->getPost('fathername'),
                'mothername'   => $this->request->getPost('mothername'),
                'dob'          => $this->request->getPost('dob'),
                'mobile'       => $this->request->getPost('mobile'),
                'standard'     => $this->request->getPost('standard'),
                'division'     => $this->request->getPost('division'),
                'address'      => $this->request->getPost('address'),
                'height'       => $this->request->getPost('height'),
                'weight'       => $this->request->getPost('weight'),
                'rollno'       => $this->request->getPost('rollno'),
                'email'        => $this->request->getPost('email'),
                //'gender'        => $this->request->getPost('gender')
            ];

            // Call API
            $client = \Config\Services::curlrequest();
            $token  = session()->get('token');

            $response = $client->post("https://api.schoolgate.co.in/api/AddStudentDetails", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                    'Accept'        => 'application/json',
                ],
                'json' => $data,
                'http_errors' => false,
                'verify' => false,
            ]);

            $result = json_decode($response->getBody(), true);

            if ($response->getStatusCode() == 200) {
                return redirect()->to('/studentlist')->with('success', 'Teacher added successfully!');
            } else {
                return redirect()->back()->with('error', $result['message'] ?? 'Something went wrong');
            }
        }

        $data = [
            'activePage' => 'studentlists'
        ];
        
        // Show add teacher form
        return view('student/add', $data);
    }



}
