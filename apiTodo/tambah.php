<?php 
require 'koneksi.php';

$input = file_get_contents('php://input');
$data = json_decode($input,true);

$pesan = [];
$taskText = trim($data['taskText']);
$taskDate = trim($data['taskDate']);


if ($taskText != '' and $taskDate != '') {
	$query = mysqli_query($koneksi,"insert into task (taskText,taskDate) values('$taskText','$taskDate')");

}else{
	$query = mysqli_query($koneksi,"delete from task where id='$id'");
}


// if ($query) {
// 	http_response_code(201);
// 	$pesan['status'] = 'sukses';
// }else{
// 	http_response_code(422);
// 	$pesan['status'] = 'gagal';
// }

echo json_encode($pesan);
echo mysqli_error($koneksi);

?>