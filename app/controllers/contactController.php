<?php

class ContactController extends Controller
{
    private $db;

    public function __construct(){
        $this->model('ContactModel');
        $this->db = new Database();
    }

    public function index(){
        $contacts = $this->db->readAll('contacts');
        $data = [
            'contacts' => $contacts
        ];
        $this->view('admin/contact/allContact', $data);
    }

    public function create(){
        $this->view('admin/contact/addContact');
    }

    // public function store() {
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $address = $_POST['address'];
    //         $call_us = $_POST['call_us'];
    //         $email_us = $_POST['email_us'];
    //         $opening_hours = $_POST['opening_hours'];

    //         if (empty($address) || empty($call_us) || empty($email_us) || empty($opening_hours)) {
    //             setMessage('error', 'All fields are required!');
    //             redirect('contactController/create');
    //             return;
    //         }

    //         $contact = new ContactModel();
    //         $contact->setAddress($address);
    //         $contact->setCallUs($call_us);
    //         $contact->setEmailUs($email_us);
    //         $contact->setOpeningHours($opening_hours);

    //         $contactCreated = $this->db->create('contacts', $contact->toArray());

    //         if ($contactCreated) {
    //             setMessage('success', 'Contact Added Successfully');
    //             redirect('contactController/index');
    //         } else {
    //             setMessage('error', 'Failed to Add Contact');
    //             redirect('contactController/create');
    //         }
    //     }
    // }

    public function edit($id){
        $contact = $this->db->getById('contacts', $id);
        $data = [
            'contact' => $contact,
        ];
        $this->view('admin/contact/edit', $data);
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['id']) && isset($_POST['address']) && isset($_POST['call_us']) && isset($_POST['email_us']) && isset($_POST['opening_hours'])) {
                $id = $_POST['id'];
                $address = $_POST['address'];
                $call_us = $_POST['call_us'];
                $email_us = $_POST['email_us'];
                $opening_hours = $_POST['opening_hours'];
    
                // Validate phone number
                if (!preg_match('/^09\d{9}$/', $call_us)) {
                    setMessage('error', 'Phone number must be start with "09 and 11 digits".');
                    redirect('contactController/edit/' . $id);
                    return;
                }
    
                // Create ContactModel instance and set properties
                $contact = new ContactModel();
                $contact->setId($id);
                $contact->setAddress($address);
                $contact->setCallUs($call_us);
                $contact->setEmailUs($email_us);
                $contact->setOpeningHours($opening_hours);
    
                // Update the contact in the database
                $updateContact = $this->db->update ('contacts', $contact->getId(), $contact->toArray());
    
                if ($updateContact) {
                    setMessage('success', 'Contact Updated Successfully');
                    redirect('contactController/index');
                } else {
                    setMessage('error', 'Failed to Update Contact');
                    redirect('contactController/edit/' . $id);
                }
            } else {
                setMessage('error', 'Missing required fields');
                redirect('contactController/index');
            }
        }
    }
    
    

    public function destroy($id) {
        if ($id && is_numeric($id)) {
            $isDestroyed = $this->db->delete('contacts', $id);

            if ($isDestroyed) {
                setMessage('success', 'Contact Deleted Successfully');
            } else {
                setMessage('error', 'Failed to Delete Contact');
            }
        } else {
            setMessage('error', 'Invalid Contact ID');
        }

        redirect('contactController/index');
    }
}
?>
