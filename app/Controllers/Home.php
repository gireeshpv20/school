<?php

namespace App\Controllers;



class Home extends BaseController
{
    protected $baseapi_url;

    public function __construct()
    {
        
        $this->baseapi_url = getenv('API_BASE_URL') ;
		
    }
    
    
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
		//$client = \Config\Services::curlrequest();
		
		$client = \Config\Services::curlrequest([
            'timeout' => 10,
            'connect_timeout' => 10,
            'http_errors' => false,
            'verify' => false,
            'headers' => [
                'User-Agent' => 'CI4Client'
            ]
        ]);

		try {
			$payload = [
				'school'   => $this->request->getVar('school'),
				'username' => $this->request->getVar('username'),
				'password' => $this->request->getVar('password'),
			];

			$response = $client->post($this->baseapi_url.'api/userlogin', [
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
				$response = $client->get($this->baseapi_url."api/GetClassGroupListByAdmin", [
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
				$response = $client->get($this->baseapi_url."api/GetClassGroupListByAdmin", [
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
				$response = $client->get($this->baseapi_url."api/GetClassListByAdmin", [
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
				$response = $client->get($this->baseapi_url."api/GetClassListByAdmin", [
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
				$response = $client->get($this->baseapi_url."api/GetStudentList", [
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
			
			
			try {
        $response1 = $client->get($this->baseapi_url."api/GetClassListByAdmin", [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Accept'        => 'application/json',
            ],
            'query' => [
                'schoolid' => session()->get('school_id')
            ],
            'http_errors' => false,
            'verify'      => false
        ]);

        $classes = json_decode($response1->getBody(), true);
		// Debug: if API fails
		if ($classes === null) {
			return $this->response->setJSON([
				'error' => 'Invalid response from API',
				'raw'   => $response1->getBody()
			]);
		}

		// Check if API returned an error message
		if (isset($classes['message'])) {
			return $this->response->setJSON([
				'error'   => $classes['message'],
				'details' => $classes
			]);
		}
		
		
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
				$response = $client->get($this->baseapi_url."api/GetStudentList", [
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
			
			
			
			
			try {
        $response1 = $client->get($this->baseapi_url."api/GetClassListByAdmin", [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Accept'        => 'application/json',
            ],
            'query' => [
                'schoolid' => session()->get('school_id')
            ],
            'http_errors' => false,
            'verify'      => false
        ]);

        $classes = json_decode($response1->getBody(), true);
		// Debug: if API fails
		if ($classes === null) {
			return $this->response->setJSON([
				'error' => 'Invalid response from API',
				'raw'   => $response1->getBody()
			]);
		}

		// Check if API returned an error message
		if (isset($classes['message'])) {
			return $this->response->setJSON([
				'error'   => $classes['message'],
				'details' => $classes
			]);
		}
		
		
    } catch (\Exception $e) {
				return $this->response->setJSON([
					'error' => 'Exception occurred',
					'message' => $e->getMessage()
				]);
			}
			
			
		}
		return view('student/studentlists', ['groups' => $result, 'schoolid' => $schoolid, 'activePage' => 'studentlists', 'classes' => $classes]);
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
				$response = $client->get($this->baseapi_url."api/GetTeacherList", [
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
				$response = $client->get($this->baseapi_url."api/GetTeacherList", [
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
        $response = $client->post($this->baseapi_url."api/UpdateTeacherDetails", [
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
        $response = $client->get($this->baseapi_url."api/GetClassListByAdmin", [
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


public function getClassGroup()
{
    $client   = \Config\Services::curlrequest();
    $token    = session()->get('token');
    $schoolid = session()->get('school_id');

    if (!$token || !$schoolid) {
        return $this->response->setJSON(['error' => 'Unauthorized']);
    }

    try {
        $response = $client->get($this->baseapi_url."api/GetClassGroupListByAdmin", [
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



public function getTeachersBySchool()
{
    $client   = \Config\Services::curlrequest();
    $token    = session()->get('token');
    $schoolid = session()->get('school_id');

    if (!$token || !$schoolid) {
        return $this->response->setJSON(['error' => 'Unauthorized']);
    }

    try {
        $response = $client->get($this->baseapi_url."api/GetTeacherList", [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Accept'        => 'application/json',
            ],
            'query' => [
                'school' => session()->get('school')
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

            $response = $client->post($this->baseapi_url."api/AddTeacherDetails", [
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
            $response = $client->get($this->baseapi_url."api/GetClassSubjectList", [
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
        $response = $client->get($this->baseapi_url."api/GetClassListByAdmin", [
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
        helper(['form', 'url']);
        $client = \Config\Services::curlrequest();
    
        $token    = session()->get('token');
        $schoolid = session()->get('school_id');
    
        if (!$token || !$schoolid) {
            return redirect()->to('/login');
        }
    
        // Collect form data
        $data = [
            'schoolid'    => $schoolid,
            'studentid'   => $id,
            'rollno'      => $this->request->getPost('rollno'),
            'studentname' => $this->request->getPost('studentname'),
            'standard'    => $this->request->getPost('standard'),
            'division'    => $this->request->getPost('division'),
            'mobile'      => $this->request->getPost('mobile'),
            'classno'     => $this->request->getPost('classno'),
        ];
    
        try {
            $hasFile = $this->request->getFile('filename') && $this->request->getFile('filename')->isValid();
    
            if ($hasFile) {
                // Handle file upload (multipart)
                $file = $this->request->getFile('filename');
    
                $multipartData = [
                    [
                        'name'     => 'filename',
                        'contents' => fopen($file->getTempName(), 'r'),
                        'filename' => $file->getClientName(),
                    ],
                ];
    
                // Add all text fields
                foreach ($data as $key => $value) {
                    $multipartData[] = [
                        'name'     => $key,
                        'contents' => $value,
                    ];
                }
    
                $response = $client->post($this->baseapi_url . 'api/UpdateStudentDetailsByAdmin', [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $token,
                        'Accept'        => 'application/json',
                    ],
                    'multipart'   => $multipartData,
                    'http_errors' => false,
                    'verify'      => false,
                ]);
            } else {
                // JSON request if no file is uploaded
                $response = $client->post($this->baseapi_url . 'api/UpdateStudentDetailsByAdmin', [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $token,
                        'Accept'        => 'application/json',
                    ],
                    'json' => $data,
                    'http_errors' => false,
                    'verify' => false,
                ]);
            }
    
            // Handle response
            $statusCode = $response->getStatusCode();
            $body       = $response->getBody();
            $result     = json_decode($body, true);
    
            log_message('error', 'UpdateStudent URL: ' . $this->baseapi_url . 'api/UpdateStudentDetailsByAdmin');
            log_message('error', 'UpdateStudent Status: ' . $statusCode);
            log_message('error', 'UpdateStudent Response: ' . $body);
    
            if ($statusCode === 200 && isset($result['message'])) {
                return redirect()->to('/studentlist')->with('success', $result['message']);
            } else {
                return redirect()->back()->with('error', $result['error'] ?? 'Update failed (HTTP ' . $statusCode . ')');
            }
    
        } catch (\Exception $e) {
            log_message('error', 'UpdateStudent Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Update failed: ' . $e->getMessage());
        }
    }
    
    
    public function addStudent()
    {
        
		helper(['form', 'url']);
		$schoolid = session()->get('school_id');
        if (isset($_POST['schoolform'])) {
			
			$client = \Config\Services::curlrequest();
            
			$fileBase64 = '';
			$fileName   = '';

			// Check if file uploaded
			if (!empty($_FILES['filename']['tmp_name'])) {
				$fileName  = $_FILES['filename']['name'];
				$filePath  = $_FILES['filename']['tmp_name'];
				$fileData  = file_get_contents($filePath);
				$fileBase64 = base64_encode($fileData);
			}
			
			$data = [
                'schoolid'     => $schoolid,
                'school'       => $this->request->getPost('school'),
                'standard'     => $this->request->getPost('standard'),
                'division'     => $this->request->getPost('division'),
                'studentname'  => $this->request->getPost('studentname'),
                'rollno'       => $this->request->getPost('rollno'),
                'gender'       => $this->request->getPost('gender'),
                'mobile'       => $this->request->getPost('mobile'),
				'classno'      => $this->request->getPost('classno'),
				'filename'     => $fileName,
				'filedata'     => $fileBase64
            ];
			//print_r($data);exit;
            // Call API
            
            $token  = session()->get('token');

            $response = $client->post($this->baseapi_url.'api/AddStudentDetailsByAdmin', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                    'Accept'        => 'application/json',
					'Content-Type'  => 'application/json'
                ],
                'json' => $data,
                'http_errors' => false,
                'verify' => false,
            ]);

            $result = json_decode($response->getBody(), true);
			
			echo "<pre>";
			echo "Status Code: " . $response->getStatusCode() . "\n\n";
			echo "Raw Response:\n";
			echo $response->getBody();
			echo "\n\nDecoded Response:\n";
			print_r(json_decode($response->getBody(), true));
			echo "</pre>";
			exit;

            if ($response->getStatusCode() == 200) {
				return redirect()->to('/studentlist')->with('success', $result['message'] ?? json_encode($result));
            } else {
				return redirect()->back()->with('error', $result['message'] ?? json_encode($result));
            }
        }

        $data = [
            'activePage' => 'studentlists'
        ];
        
        // Show add teacher form
        return view('student/add', $data);
    }
    
    
    public function examlists()
	{
		$schoolid  = null;
		if (isset($_POST['schoolform'])) {
			$client = \Config\Services::curlrequest();
			$token    = session()->get('token');       // Get token from session
			$schoolid = $this->request->getVar('schoolid');   // Get school id from session
			$acyear = $this->request->getVar('acyear');

			// If token or school_id missing, redirect to login or return error
			if (!$token || !$schoolid) {
				return redirect()->to('/login');
			}

			try {
				$response = $client->get($this->baseapi_url."api/GetExamListByAdmin", [
					'headers' => [
						'Authorization' => 'Bearer ' . $token,
						'Accept'        => 'application/json',
					],
					'query' => [
						'schoolid' => $schoolid,
						'acyear' => $acyear
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
			$acyear = '2025-2026';

			// If token or school_id missing, redirect to login or return error
			if (!$token || !$schoolid) {
				return redirect()->to('/login');
			}

			try {
				$response = $client->get($this->baseapi_url."api/GetExamListByAdmin", [
					'headers' => [
						'Authorization' => 'Bearer ' . $token,
						'Accept'        => 'application/json',
					],
					'query' => [
						'schoolid' => $schoolid,
						'acyear' => $acyear
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
		
		return view('exam/examlists', ['groups' => $result, 'schoolid' => $schoolid, 'acyear' => $acyear, 'activePage' => 'examlists']);
	}
	
	
	public function timetablelists()
	{
		
		$client = \Config\Services::curlrequest();
		$token    = session()->get('token');
		try {
        $response1 = $client->get($this->baseapi_url."api/GetExamListByAdmin", [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Accept'        => 'application/json',
            ],
            'query' => [
                'schoolid' => session()->get('school_id'),
                'acyear' => '2025-2026'
            ],
            'http_errors' => false,
            'verify'      => false
        ]);

        $exams = json_decode($response1->getBody(), true);
		// Debug: if API fails
		if ($exams === null) {
			return $this->response->setJSON([
				'error' => 'Invalid response from API',
				'raw'   => $response1->getBody()
			]);
		}

		// Check if API returned an error message
		if (isset($exams['message'])) {
			return $this->response->setJSON([
				'error'   => $exams['message'],
				'details' => $exams
			]);
		}
		
		
        } catch (\Exception $e) {
    				return $this->response->setJSON([
    					'error' => 'Exception occurred',
    					'message' => $e->getMessage()
    				]);
    			}
		
		
		try {
        $response2 = $client->get($this->baseapi_url."api/GetClassGroupListByAdmin", [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Accept'        => 'application/json',
            ],
            'query' => [
                'schoolid' => session()->get('school_id')
            ],
            'http_errors' => false,
            'verify'      => false
        ]);

        $class_groups = json_decode($response2->getBody(), true);
		// Debug: if API fails
		if ($class_groups === null) {
			return $this->response->setJSON([
				'error' => 'Invalid response from API',
				'raw'   => $response2->getBody()
			]);
		}

		// Check if API returned an error message
		if (isset($class_groups['message'])) {
			return $this->response->setJSON([
				'error'   => $class_groups['message'],
				'details' => $class_groups
			]);
		}
		
		
        } catch (\Exception $e) {
    				return $this->response->setJSON([
    					'error' => 'Exception occurred',
    					'message' => $e->getMessage()
    				]);
    			}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		if (isset($_POST['schoolform'])) {
			$client = \Config\Services::curlrequest();
			$token    = session()->get('token');       // Get token from session
			$schoolid = $this->request->getVar('schoolid');   // Get school id from session
			$examid = $this->request->getVar('examid');
			$classgroup = $this->request->getVar('classgroup');

			// If token or school_id missing, redirect to login or return error
			if (!$token || !$schoolid) {
				return redirect()->to('/login');
			}

			try {
				$response = $client->get($this->baseapi_url."api/GetExamTimetableListByAdmin", [
					'headers' => [
						'Authorization' => 'Bearer ' . $token,
						'Accept'        => 'application/json',
					],
					'query' => [
						'schoolid' => $schoolid,
						'examid' => $examid,
						'classgroup' => $classgroup,
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
			$examid = '1';
			$classgroup = 'III';

			// If token or school_id missing, redirect to login or return error
			if (!$token || !$schoolid) {
				return redirect()->to('/login');
			}

			try {
				$response = $client->get($this->baseapi_url."api/GetExamTimetableListByAdmin", [
					'headers' => [
						'Authorization' => 'Bearer ' . $token,
						'Accept'        => 'application/json',
					],
					'query' => [
						'schoolid' => $schoolid,
						'examid' => $examid,
						'classgroup' => $classgroup,
					],
					'http_errors' => false,
					'verify'      => false
				]);

				$result = json_decode($response->getBody(), true);
//print_r($result);exit;
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
		
		return view('exam/timetablelists', ['groups' => $result, 'schoolid' => $schoolid, 'examid' => $examid, 'classgroup' => $classgroup, 'activePage' => 'examlists', 'exams' => $exams, 'class_groups' => $class_groups]);
	}

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function addClass()
	{
		
		helper(['form', 'url']);
		$schoolid = session()->get('school_id');
		if (isset($_POST['schoolform'])) {
			
			$data = [
				'standard'     => $this->request->getPost('standard'),
				'division'     => $this->request->getPost('division'),
				'schoolid'       => $this->request->getPost('schoolid'),
				'classgroup'      => $this->request->getPost('classgroup'),
				'teacherid'    => $this->request->getPost('teacherid'),
				'teachername'    => $this->request->getPost('teachername'),
				'attendtime'    => $this->request->getPost('attendtime'),
				'attendstartdt'    => $this->request->getPost('attendstartdt'),
				'username'    => $this->request->getPost('username'),
				'acyear'    => $this->request->getPost('acyear')
			];

			// Call API
			$client = \Config\Services::curlrequest();
			$token  = session()->get('token');

			$response = $client->post($this->baseapi_url."api/AddClass", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                    'Accept'        => 'application/json',
                ],
                'json' => $data,
                'http_errors' => false,
                'verify' => false,
            ]);

			$result = json_decode($response->getBody(), true);
			
			/*echo "<pre>";
    echo "Status Code: " . $response->getStatusCode() . "\n\n";
    echo "Raw Response:\n";
    echo $response->getBody();
    echo "</pre>";
    exit;*/
			
			if ($response->getStatusCode() == 200) {
				return redirect()->to('/classlist')->with('success', $result['message'] ?? json_encode($result));
            } else {
				return redirect()->back()->with('error', $result['message'] ?? json_encode($result));
            }
		}

		$data = [
			'activePage' => 'classlists'
		];
		
		// Show add teacher form
		return view('class/add', $data);
		
		
		
	}
	
	public function updateClass($id)
	{
		helper(['form', 'url']);
		$client = \Config\Services::curlrequest();
		$token  = session()->get('token');
		$schoolid = session()->get('school');

		if (!$token || !$schoolid) {
			return redirect()->to('/login');
		}

		$data = [
			'schoolid'       => $this->request->getPost('schoolid'),
			'teacherid'    => $this->request->getPost('teacherid'),
			'teachername'    => $this->request->getPost('teachername'),
			'attendtime'    => $this->request->getPost('attendtime'),
			'attendstartdt'    => $this->request->getPost('attendstartdt'),
			'username'    => $this->request->getPost('username'),
			'classid'    => $id,
			'standard'     => $this->request->getPost('standard'),
			'division'     => $this->request->getPost('division'),
			'acyear'    => $this->request->getPost('acyear')
		];
		//print_r($data);
		
		$response = $client->post($this->baseapi_url."api/UpdateClass", [
			'headers' => [
				'Authorization' => 'Bearer ' . $token,
				'Accept'        => 'application/json',
			],
			'json' => $data,
			'http_errors' => false,
			'verify' => false,
		]);

		$result = json_decode($response->getBody(), true);
		
		
		/*echo "<pre>";
		echo "Status Code: " . $response->getStatusCode() . "\n\n";
		echo "Raw Response:\n";
		echo $response->getBody();
		echo "</pre>";
		exit;*/
		
		if ($response->getStatusCode() == 200) {
			return redirect()->to('/classlist')->with('success', $result['message'] ?? json_encode($result));
		} else {
			//return redirect()->back()->with('error', $result['message'] ?? json_encode($result));
			return redirect()->back()->with('error', $result['message'] ?? json_encode($result));
		}

	}

}
