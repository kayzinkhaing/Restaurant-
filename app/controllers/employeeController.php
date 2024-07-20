<?php 

class employeeController extends Controller
{
    private $db;

    public function __construct(){
        $this->model('EmployeeModel');
        $this->db = new Database();
    }

    public function index(){
        $employees = $this->db->readAll('employee_details');
        $data = [
            'employees' => $employees
        ];
        $this->view('admin/employee/allEmployee', $data);
    }

    public function create(){
        $this->view('admin/employee/addEmployee');
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {    
    // echo ("ok");
    // exit;
            $name = $_POST['name'];
            $position_id = $_POST['position_id'];
    //         echo ("ok");
    // exit;
            // $salary = $_POST['salary'];
            $email = $_POST['email'];
            $phone_no = $_POST['phone_no'];
            $hireDate = $_POST['hire_date'];

            // Validate inputs
            if (empty($name) || empty($position_id) ||  empty($email) || empty($phone_no) || empty($hireDate)) {
                setMessage('error', 'All fields are required!');
                redirect('employeeController/create');
                return;
            }

            // Create new employee
            $employee = new EmployeeModel();
            $employee->setName($name);
            $employee->setPositionId($position_id);
            $employee->setEmail($email);
            $employee->setPhoneNo($phone_no);
            $employee->setHireDate($hireDate);
    
            // Save employee to database
            $employeeCreated = $this->db->create ('employee_details', $employee->toArray());
            if ($employeeCreated) {
                setMessage('success', 'Employee Added Successfully');
                redirect('employeeController/index');
            } else {
                setMessage('error', 'Employee Creation Failed');
                redirect('employeeController/create');
            }
        }
    }

    public function edit($id){
        $employee = $this->db->getById('employee_details', $id);
        $data = [
            'employees' => $employee,
        ];
        $this->view('admin/employee/edit', $data);
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            // Check required fields
            if (isset($_POST['id'], $_POST['name'], $_POST['position_id'],  $_POST['email'], $_POST['phone_no'], $_POST['hire_date'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $positionId = $_POST['position_id'];
                // $salary = $_POST['salary'];
                $email = $_POST['email'];
                $phone_no = $_POST['phone_no'];
                $hire_date = $_POST['hire_date'];

                // Create a new EmployeeModel instance and set its properties
                $employee = new EmployeeModel();
                $employee->setId($id);
                $employee->setName($name);
                $employee->setPositionId($positionId);
                // $employee->setSalary($salary);
                $employee->setEmail($email);
                $employee->setPhoneNo($phone_no);
                $employee->setHireDate($hire_date);
        
                // Update the employee in the database
                $updateEmployee = $this->db->update('employee_details', $employee->getId(), $employee->toArray());
        
                if ($updateEmployee) {
                    setMessage('success', 'Employee Updated Successfully');
                    redirect('employeeController/index');
                } else {
                    setMessage('error', 'Failed to Update Employee');
                    redirect('employeeController/index');
                }
            } else {
                setMessage('error', 'Missing required fields');
                redirect('employeeController/index');
            }
        }
    }

    public function destroy($id) {
        if ($id && is_numeric($id)) {
            // Delete the employee from the database
            $isdestroy = $this->db->delete('employee_details', $id);
    
            if ($isdestroy) {
                setMessage('success', 'Employee Deleted Successfully');
            } else {
                setMessage('error', 'Failed to Delete Employee');
            }
        } else {
            setMessage('error', 'Invalid Employee ID');
        }
    
        // Redirect to the employee view page
        redirect('employeeController/index');
    }
}
