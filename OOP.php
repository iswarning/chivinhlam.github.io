<?php
	/**
	 * 
	 */
	class phim
	{
		public $ten;
		public $dienvien;
		public $tacgia;
		public $thoiluong;

		function phim($ten,$dienvien,$tacgia,$thoiluong)
		{
			$this->ten = $ten;
			$this->dienvien=$dienvien;
			$this->tacgia=$tacgia;
			$this->thoiluong=$thoiluong;
		}		

		function getname()
		{
			return $this->ten;
		}	

		function getdienvien()
		{
			return $this->dienvien;
		}

		function gettacgia()
		{
			return $this->dienvien;
		}

		function getthoiluong()
		{
			return $this->dienvien;
		}

	}
	$tlbb= new phim('thiên long bát bộ ','lamchivinh','kimdung','60 phút');
	//$cack= new phim('cửu âm chân kinh ');
	//$oneyear= new phim('1 năm trôi qua ');


	echo "Tên phim: ".$tlbb->getname();
	echo "Diễn viên: ".$tlbb->getdienvien();
	echo "Tác giả: ".$tlbb->gettacgia();
	echo "Thời lượng: ".$tlbb->getthoiluong();
	//echo $cack->getname();
	//echo $oneyear->getname();
?>
