<?php 

class PositionController extends Controller
{
    private $db;

    public function __construct(){
        $this->model('PositionModel');
        $this->db = new Database();
    }

    public function index(){
        $positions = $this->db->readAll ('position');
        $data = [
            'positions' => $positions
        ];
        $this->view('admin/position/allPosition', $data);
    }

    public function create(){
        $this->view('admin/position/addPosition');
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {    
            $title = $_POST['title'];
            $salary = $_POST['salary'];

            // Validate inputs
            if (empty($title) || empty($salary)) {
                setMessage('error', 'All fields are required!');
                redirect('PositionController/create');
                return;
            }
    
            // Create new position
            $position = new PositionModel();
            $position->setPosition($title);
            $position->setSalary($salary);
    
            // Save position to database
            $positionCreated = $this->db->create('position', $position->toArray());
            if ($positionCreated) {
                setMessage('success', 'Position Added Successfully');
                redirect('PositionController/index');
            } else {
                setMessage('error', 'Position Creation Failed');
                redirect('PositionController/create');
            }
        }
    }

    public function edit($id){
        $position = $this->db->getById('position', $id);
        $data = [
            'position' => $position,
        ];
        $this->view('admin/position/edit', $data);
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            // Check required fields
            if (isset($_POST['id'], $_POST['title'], $_POST['salary'])) {
                $id = $_POST['id'];
                $title = $_POST['position'];
                $salary = $_POST['salary'];
        
                // Create a new PositionModel instance and set its properties
                $position = new PositionModel();
                $position->setId($id);
                $position->setPosition($title);
                $position->setSalary($salary);
        
                // Update the position in the database
                $updatePosition = $this->db->update('position', $position->getId(), $position->toArray());
        
                if ($updatePosition) {
                    setMessage('success', 'Position Updated Successfully');
                    redirect('PositionController/index');
                } else {
                    setMessage('error', 'Failed to Update Position');
                    redirect('PositionController/index');
                }
            } else {
                setMessage('error', 'Missing required fields');
                redirect('PositionController/index');
            }
        }
    }

    public function destroy($id) {
        if ($id && is_numeric($id)) {
            // Delete the position from the database
            $isDestroy = $this->db->delete('position', $id);
        
            if ($isDestroy) {
                setMessage('success', 'Position Deleted Successfully');
            } else {
                setMessage('error', 'Failed to Delete Position');
            }
        } else {
            setMessage('error', 'Invalid Position ID');
        }
        
        // Redirect to the position view page
        redirect('PositionController/index');
    }
}
