<?php
class Job{
    private  $db;
    
    public function  __construct(){
        
        $this->db = new Database();
        
    }

    public function getAllJobs(){

    $this->db->query("SELECT jobs.*, categories.name AS cname FROM jobs INNER JOIN categories ON jobs.catID = categories.catID WHERE   DATEDIFF(CURDATE(), DATE(post_date)) < 10  ORDER BY post_date DESC ");

        $result = $this->db->getResult();

        return $result;

    }

    public function getLocation(){
        $this->db->query("SELECT * FROM jobs");

        $result = $this->db->getResult();

        return $result;

    }

    public function getCategories(){

        $this->db->query("SELECT * FROM categories");
        $result = $this->db->getResult();

        return $result;
    }


    public function getJobsByCategory($category,$location){

        $this->db->query("SELECT jobs.*, categories.name AS cname, jobs.location As loc FROM jobs INNER JOIN categories ON
        jobs.catID = categories.catID 
        WHERE jobs.catID = $category AND jobs.location = '$location' ORDER BY post_date DESC ");

        $result = $this->db->getResult();

        return $result;

    }

    public function getCategory($category){
        $this->db->query("SELECT * FROM categories WHERE catID = :categoryID ");

        $this->db->bind(":categoryID", $category);

        $row = $this->db->fetchSingle();

        return $row;

    }

    

    public function getJob($id,$loc){

        $this->db->query("SELECT * FROM jobs WHERE jobID = :id AND location = :loc ");

        $this->db->bind(":id", $id);
        $this->db->bind(":loc", $loc);
        
        $row = $this->db->fetchSingle();

        return $row;


    }


    public function create($data){

        $this->db->query("INSERT INTO jobs (catID, jobtitle, company, description, country, location, salary, contactuser, contactemail, registerID)
        VALUES (:catID, :jobtitle, :company, :description, :country, :location, :salary, :contactuser, :contactemail, :registerID)");

        $this->db->bind(":catID", $data["catID"]);
        $this->db->bind(":jobtitle", $data["jobtitle"]);
        $this->db->bind(":company", $data["company"]);
        $this->db->bind(":description", $data["description"]);
        $this->db->bind(":country", $data["country"]);
        $this->db->bind(":location", $data["location"]);
        $this->db->bind(":salary", $data["salary"]);
        $this->db->bind(":contactuser", $data["contactuser"]);
        $this->db->bind(":contactemail", $data["contactemail"]);
        $this->db->bind(":registerID", $data["ID"]);

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


    public function update($data){

        $this->db->query("UPDATE jobs SET 
        
        jobtitle     = :jobtitle,
        company      = :company,
        description  = :description,
        country      = :country,
        location     = :location,
        salary       = :salary,
        contactuser  = :contactuser,
        contactemail = :contactemail WHERE jobID = :jobID ");

        $this->db->bind(":jobID", $data["jobID"]);
        $this->db->bind(":jobtitle", $data["jobtitle"]);
        $this->db->bind(":company", $data["company"]);
        $this->db->bind(":description", $data["description"]);
        $this->db->bind(":country", $data["country"]);
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