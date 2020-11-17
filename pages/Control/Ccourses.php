<?php
	/**
	 * 
	 */
	class Courses 
	{
		//constructeur par default
		public function __construct(){}
		//Method Add Couse
		public function AddCourse($con,$title,$img,$link){
			$command = "INSERT INTO add_cour values(null,'$title','$name','$url')";
			return mysqli_query($con,$command);
		}
		public function LoadCouses($con){
			$command = "SELECT * from add_cour order by id desc";
			return $rst = mysqli_query($con,$command);
		}
		// Course learning
		public function CouseLearning($con,$id_user,$id_course){
			$command = "INSERT INTO start_learning values (null,'$id_user','$id_course')";
			return $rst = mysqli_query($con,$command);
		}
	}

?>