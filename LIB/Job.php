<?php
class Job{
    private  $db;
    
    public function  __construct(){
        
        $this->db = new Database();
        
    }

    public function getAllJobs(){

    $this->db->query("SELECT jobs.*, categories.name AS cname FROM jobs INNER JOIN categories ON jobs.catID = categories.catID ORDER BY post_date DESC ");

        $result = $this->db->getResult();

        return $result;

    }

    public function getCategories(){

        $this->db->query("SELECT * FROM categories");
        $result = $this->db->getResult();

        return $result;
    }


    public function getJobsByCategory($category){

        $this->db->query("SELECT jobs.*, categories.name AS cname FROM jobs INNER JOIN categories ON
        jobs.catID = categories.catID 
        WHERE jobs.catID = $category 
        ORDER BY post_date DESC ");

        $result = $this->db->getResult();

        return $result;

    }

    public function getCategory($category){
        $this->db->query("SELECT * FROM categories WHERE catID = :categoryID ");

        $this->db->bind(":categoryID", $category);

        $row = $this->db->fetchSingle();

        return $row;

    }

    public function getJobs($id){

        $this->db->query("SELECT * FROM jobs WHERE jobID = :id ");

        $this->db->bind(":id", $id);

        $row = $this->db->fetchSingle();

        return $row;


    }


    public function create($data){

        $this->db->query("INSERT INTO jobs (catID, jobtitle, company, description, location, salary, contactuser, contactemail)
        VALUES (:catID, :jobtitle, :company, :description, :location, :salary, :contactuser, :contactemail) ");

        $this->db->bind(":catID", $data["catID"]);
        $this->db->bind(":jobtitle", $data["jobtitle"]);
        $this->db->bind(":company", $data["company"]);
        $this->db->bind(":description", $data["description"]);
        $this->db->bind(":location", $data["location"]);
        $this->db->bind(":salary", $data["salary"]);
        $this->db->bind(":contactuser", $data["contactuser"]);
        $this->db->bind(":contactemail", $data["contactemail"]);

        if($this->db->execute()){

            return true;

        } else {

            return false;
        }
    }


    public function delete($id){

        $this->db->query("DELETE FROM jobs WHERE jobID = $id");

        if($this->db->execute()){

            return true;

        } else {

            return false;
        }
    }

    public function update($id, $data){

        $this->db->query("UPDATE jobs SET 
        catID = :catID,
        jobtitle     = :jobtitle,
        company      = :company,
        description  = :description,
        location     = :location,
        salary       = :salary,
        contactuser  = :contactuser,
        contactemail = :contactemail ");

        $this->db->bind(":catID", $data["catID"]);
        $this->db->bind(":jobtitle", $data["jobtitle"]);
        $this->db->bind(":company", $data["company"]);
        $this->db->bind(":description", $data["description"]);
        $this->db->bind(":location", $data["location"]);
        $this->db->bind(":salary", $data["salary"]);
        $this->db->bind(":contactuser", $data["contactuser"]);
        $this->db->bind(":contactemail", $data["contactemail"]);

        if($this->db->execute()){

            return true;

        } else {

            return false;
        }
    }


}
?>