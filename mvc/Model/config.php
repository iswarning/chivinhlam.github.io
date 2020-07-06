<?php
	class Database{
		private $hostname = 'localhost';
		private $username = 'id9494374_root';
		private $password = '123456';
		private $dbname= 'id9494374_qlda';

		private $conn = null;
		private $result = null;
		
		

		public function connect()
		{
			$this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
			if(!$this->conn)
			{
				echo "Kết nối thất bại";
				exit();
			}
			else{
				mysqli_set_charset($this->conn, 'utf8');
			}
			return $this->conn;
		}

		// thực thi câu lệnh truy vấn
		public function execute($sql)
		{
			$this->result = $this->conn->query($sql);
			return $this->result;
		}

		//Phương thức đếm số bản ghi
		public function num_rows()
		{
			if($this->result)
			{
				$num = mysqli_num_rows($this->result);
			}
			else
			{
				$num = 0;
			}
			return $num;
		}


		public function getDataSQL($sql){
			$this->result = mysqli_query($this->conn,$sql);
			if(mysqli_num_rows($this->result)>0){
				while($row = mysqli_fetch_array($this->result)){
					$data[] = $row;
				}
			}
			else{
				$data = 0;
			}
			return $data;
			
		}

		//Phương thức lấy dữ liệu theo id
		public function getDataID($sql)
		{
			$this->result = mysqli_query($this->conn,$sql);
			if(mysqli_num_rows($this->result)>0)
			{
				$data = mysqli_fetch_array($this->result);
			}
			else
			{
				$data = 0;
			}
			return $data;
		}

		


		

		//Phương thức lấy toàn bộ dữ liệu
		public function getAllData($table)
		{
			$sql = "SELECT * FROM $table";
			$this->execute($sql);
			if($this->num_rows()==0)
			{
				$data = 0;
			}
			else
			{
				while($datas = mysqli_fetch_array($this->result))
				{
					$data[] = $datas;
				}
			}
			return $data;
		}
		//Phương thức shoppingcart

		
		//Phương thức thêm dữ liệu
		public function InsertData($table, $into, $values)
		{
			$sql = "INSERT INTO $table($into) VALUES($values)";
			return $this->execute($sql);
		}

		// Phương thức sửa dữ liệu
		public function UpdateData($id, $email, $matkhau, $hoten, $sdt, $dtime, $location)
		{
			$sql = "UPDATE TAIKHOAN SET Email = '$email', MatKhau = '$matkhau', HoTen = '$hoten', SDT = '$sdt', NgaySinh='$dtime', DiaChi='$location' WHERE id='$id'";
			return $this->execute($sql);
		}

		// Phương thức xoá dữ liệu
		public function DeleteData($id)
		{
			$sql = "DELETE FROM TAIKHOAN WHERE id='$id'";
			return $this->execute($sql);
		}

		//Tìm kiếm dữ liệu thành viên
		public function Search($table, $name, $key)
		{
			$sql = "SELECT * FROM $table WHERE $name REGEXP '$key'";
			$this->execute($sql);
			if($this->num_rows()==0)
			{
				$data = 0;
			}
			else
			{
				while($datas = mysqli_fetch_array($this->result))
				{
					$data[] = $datas;
				}
			}
			return $data;
		}

		/*public function menu($parent = 0){
			$sql="SELECT * FROM LOAISANPHAM WHERE parent = '$parent'";
			$this->execute($sql);
			if(mysqli_num_rows($this->result) > 0){
				while($row=mysqli_fetch_array($this->result)){
					$data[]=$row;
					$this->menu();
				}
			}
			return $data;
		}*/
	}
?>