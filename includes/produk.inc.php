<?php
class Produk {
	private $conn;
	private $table_name = "produk";

	public $id_produk;
	public $nama_produk;
	public $keterangan;
	public $harga;
	public $jumlah;

	public function __construct($db) {
		$this->conn = $db;
	}

	function insert() {
		$query = "INSERT INTO {$this->table_name} VALUES(?, ?, ?, ?, ?)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id_produk);
		$stmt->bindParam(2, $this->nama_produk);
		$stmt->bindParam(3, $this->keterangan);
		$stmt->bindParam(4, $this->harga);
		$stmt->bindParam(5, $this->jumlah);

		if ($stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}

	function readAll() {
		$query = "SELECT * FROM {$this->table_name} ORDER BY id_produk ASC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	}

	function countAll(){
		$query = "SELECT * FROM {$this->table_name} ORDER BY id_produk ASC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt->rowCount();
	}

	function readOne(){
		$query = "SELECT * FROM {$this->table_name} WHERE id_produk=? LIMIT 0,1";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id_produk);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->id_produk = $row["id_produk"];
		$this->nama_produk = $row["nama_produk"];
		$this->keterangan = $row['keterangan'];
		$this->harga = $row['harga'];
		$this->jumlah = $row['jumlah'];
	}

	function readSatu($a) {
		$query = "SELECT * FROM {$this->table_name} WHERE id_produk='$a' LIMIT 0,1";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	}

	function getNewID() {
		$query = "SELECT MAX(id_produk) AS code FROM {$this->table_name}";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if ($row) {
			return $this->genCode($row["code"], 'P', 3);
		} else {
			return $this->genCode($nomor_terakhir, 'P', 3);
		}
	}

	function genCode($latest, $key, $chars = 0) {
    $new = intval(substr($latest, strlen($key))) + 1;
    $numb = str_pad($new, $chars, "0", STR_PAD_LEFT);
    return $key . $numb;
	}

	function genNextCode($start, $key, $chars = 0) {
    $new = str_pad($start, $chars, "0", STR_PAD_LEFT);
    return $key . $new;
	}

	function update() {
		$query = "UPDATE {$this->table_name}
				SET
					nama_produk = :nama_produk,
					keterangan = :keterangan,
					harga = :harga,
					jumlah = :jumlah
				WHERE
					id_produk = :id_produk";
		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':nama_produk', $this->nama_produk);
		$stmt->bindParam(':keterangan', $this->keterangan);
		$stmt->bindParam(':harga', $this->harga);
		$stmt->bindParam(':jumlah', $this->jumlah);
		$stmt->bindParam(':id_produk', $this->id_produk);

		if ($stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}

	function delete() {
		$query = "DELETE FROM {$this->table_name} WHERE id_produk = ?";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id_produk);
		if ($result = $stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}

	function hapusell($ax) {
		$query = "DELETE FROM {$this->table_name} WHERE id_produk in $ax";
		$stmt = $this->conn->prepare($query);
		if ($result = $stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}
}
