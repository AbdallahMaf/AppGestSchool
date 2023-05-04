<?php 



class etudiantsController extends Controller 
{
    private $conn;

    public function __construct()
    {
        $this->conn = new etudiants();
    }


    public function index()
    {
        $data['etudiants'] = $this->conn->getAlletudiants();
        return $this->view('etudiants/index',$data);
    }





    public function add()
    {
        return $this->view('etudiants/add');
    }

    public function store()
    {
        if(isset($_POST['submit']))
        {
            $name = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $classe = $_POST['classe'];
            

            $this->conn = new etudiants();
            $dataInsert = Array ( "nom" => $name ,
                            "prenom" => $prenom ,
                            "classe" => $classe ,
                            
                            );

            if($this->conn->insertetudiants($dataInsert))
            {
                $data['success'] = "Data Added Successfully";
                return $this->view('etudiants/add',$data);
            }
            else 
            {
                $data['error'] = "Error";
                return $this->view('etudiants/add',$data);
            }
        }
        return $this->view('etudiants/add');
    }




    public function edit($id)
    {
        // var_dump($this->conn->getProduct($id));
        $data['row'] = $this->conn->getProduct($id)[0];
        return $this->view('etudiants/edit',$data);
    }

    public function update()
    {
        if(isset($_POST['submit']))
        {
            $name = $_POST['name'];
            $prenom = $_POST['prenom'];
            $price = $_POST['price'];
            $qty = $_POST['qty'];
            $id = $_POST['id'];

            $this->conn = new etudiants();
            $dataInsert = Array ( "name" => $name ,
                            "prenom" => $prenom ,
                            "price" => $price ,
                            "qty" => $qty 
                            );
            // data of product
            

            if($this->conn->updateProduct($id,$dataInsert))
            {
                $data['success'] = "Updated Successfully";
                $data['row'] = $this->conn->getProduct($id)[0];
                $this->view('etudiants/edit',$data);
            }
            else 
            {
                $data['error'] = "Error";
                $data['row'] = $this->conn->getProduct($id)[0];
                return $this->view('etudiants/edit',$data);
            }
        }
        redirect('home/index');
    }



    
    public function delete($id)
    {
        if($this->conn->deleteProduct($id))
        {
            $data['success'] = "Product Have Been Deleted";
            return $this->view('etudiants/delete',$data);
        }
        else 
        {
            $data['error'] = "Error";
            return $this->view('etudiants/delete',$data);
        }
    }
}