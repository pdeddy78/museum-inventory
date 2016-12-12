<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Data_model extends CI_Model 
{

    public function cariKondisi()
    {
        return $this->db->get("TMKondisi");
    }

    public function getIDKondisi()
    {
        $q = $this->db->query("select MAX(RIGHT(id_kondisi,4)) as id_max from TMKondisi");
        $id = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->id_max)+1;
                $id = sprintf("%04s", $tmp);
            }
        }else{
            $id = "0001";
        }
        return "DM-KK-".$id;
    }

    public function insert_kondisi()
    {
        $id_kondisi     =  $this->input->post('id_kondisi');
        $nama_kondisi   =  $this->input->post('nama_kondisi');
        $created        =  date('Y-m-d');        

        $sql = "INSERT INTO TMKondisi (id_kondisi, nama_kondisi, created)
        VALUES (".$this->db->escape($id_kondisi).",
                ".$this->db->escape($nama_kondisi).",
                ".$this->db->escape($created).")";

        $result = $this->db->query($sql);
        if($this->db->affected_rows() === 1)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function update_kondisi($id_kondisi)
    {
        $kondisi = array('nama_kondisi' => $this->input->post('nama_kondisi'),);

        $this->db->where('id_kondisi', $id_kondisi)
                 ->update('TMKondisi', $kondisi);

        if($this->db->affected_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function cariAsal()
    {
        return $this->db->get("TMAsal");
    }

    public function getIDAsal()
    {
        $q = $this->db->query("Select MAX(RIGHT(id_asal,4)) as id_max from TMAsal");
        $id = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->id_max)+1;
                $id = sprintf("%04s", $tmp);
            }
        }else{
            $id = "0001";
        }
        return "DM-AK-".$id;
    }

    public function insert_asal()
    {
        $id_asal     =  $this->input->post('id_asal');
        $nama_asal   =  $this->input->post('nama_asal');
        $created     =  date('Y-m-d');   

        $sql = "INSERT INTO TMAsal (id_asal, nama_asal, created)
        VALUES (".$this->db->escape($id_asal).",
                ".$this->db->escape($nama_asal).",
                ".$this->db->escape($created).")";

        $result = $this->db->query($sql);
        if($this->db->affected_rows() === 1)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function update_asal($id_asal)
    {
        $asal = array('nama_asal' => $this->input->post('nama_asal'),);

        $this->db->where('id_asal', $id_asal)
                 ->update('TMAsal', $asal);

        if($this->db->affected_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function cariBahan()
    {
        return $this->db->get("TMBahan");
    }

    public function getIDBahan()
    {
        $q = $this->db->query("Select MAX(RIGHT(id_bahan,4)) as id_max from TMBahan");
        $id = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->id_max)+1;
                $id = sprintf("%04s", $tmp);
            }
        }else{
            $id = "0001";
        }
        return "DM-BK-".$id;
    }

    public function insert_bahan()
    {
        $id_bahan    =  $this->input->post('id_bahan');
        $nama_bahan  =  $this->input->post('nama_bahan');
        $created     =  date('Y-m-d');        

        $sql = "INSERT INTO TMBahan (id_bahan, nama_bahan, created)
        VALUES (".$this->db->escape($id_bahan).",
                ".$this->db->escape($nama_bahan).",
                ".$this->db->escape($created).")";

        $result = $this->db->query($sql);
        if($this->db->affected_rows() === 1)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function update_bahan($id_bahan)
    {
        $bahan = array('nama_bahan' => $this->input->post('nama_bahan'),);

        $this->db->where('id_bahan', $id_bahan)
                 ->update('TMBahan', $bahan);

        if($this->db->affected_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function cariKategori()
    {
        return $this->db->get("TMKategori");
    }

    public function getIDKategori()
    {
        $q = $this->db->query("Select MAX(RIGHT(id_kategori,4)) as id_max from TMKategori");
        $id = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->id_max)+1;
                $id = sprintf("%04s", $tmp);
            }
        }else{
            $id = "0001";
        }
        return "DM-CK-".$id;
    }

    public function insert_kategori()
    {
        $id_kategori    =  $this->input->post('id_kategori');
        $nama_kategori  =  $this->input->post('nama_kategori');
        $created        =  date('Y-m-d');        

        $sql = "INSERT INTO TMKategori (id_kategori, nama_kategori, created)
        VALUES (".$this->db->escape($id_kategori).",
                ".$this->db->escape($nama_kategori).",
                ".$this->db->escape($created).")";

        $result = $this->db->query($sql);
        if($this->db->affected_rows() === 1)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function update_kategori($id_kategori)
    {
        $kategori = array('nama_kategori' => $this->input->post('nama_kategori'),);

        $this->db->where('id_kategori', $id_kategori)
                 ->update('TMKategori', $kategori);

        if($this->db->affected_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function cariTempat()
    {
        return $this->db->get("TMTempat");
    }

    public function getIDTempat()
    {
        $q = $this->db->query("Select MAX(RIGHT(id_tempat,4)) as id_max from TMTempat");
        $id = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->id_max)+1;
                $id = sprintf("%04s", $tmp);
            }
        }else{
            $id = "0001";
        }
        return "DM-TK-".$id;
    }

    public function insert_tempat()
    {
        $id_tempat      =  $this->input->post('id_tempat');
        $nama_tempat    =  $this->input->post('nama_tempat');
        $created        =  date('Y-m-d');        

        $sql = "INSERT INTO TMTempat (id_tempat, nama_tempat, created)
        VALUES (".$this->db->escape($id_tempat).",
                ".$this->db->escape($nama_tempat).",
                ".$this->db->escape($created).")";

        $result = $this->db->query($sql);
        if($this->db->affected_rows() === 1)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function update_tempat($id_tempat)
    {
        $tempat = array('nama_tempat' => $this->input->post('nama_tempat'),);

        $this->db->where('id_tempat', $id_tempat)
                 ->update('TMTempat', $tempat);

        if($this->db->affected_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function cariPenyumbang()
    {
        return $this->db->get("TMPenyumbang");
    }

    public function getIDPenyumbang()
    {
        $q = $this->db->query("Select MAX(RIGHT(id_penyumbang,4)) as id_max from TMPenyumbang");
        $id = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->id_max)+1;
                $id = sprintf("%04s", $tmp);
            }
        }else{
            $id = "0001";
        }
        return "DM-PK-".$id;
    }

    public function insert_penyumbang()
    {
        $id_penyumbang      =  $this->input->post('id_penyumbang');
        $nama_penyumbang    =  $this->input->post('nama_penyumbang');
        $kota_penyumbang    =  $this->input->post('kota_penyumbang');
        $jabatan_pekerjaan  =  $this->input->post('jabatan_pekerjaan');
        $created            =  date('Y-m-d');        

        $sql = "INSERT INTO TMPenyumbang (id_penyumbang, nama_penyumbang, kota_penyumbang, jabatan_pekerjaan, created)
        VALUES (".$this->db->escape($id_penyumbang).",
                ".$this->db->escape($nama_penyumbang).",
                ".$this->db->escape($kota_penyumbang).",
                ".$this->db->escape($jabatan_pekerjaan).",
                ".$this->db->escape($created).")";

        $result = $this->db->query($sql);
        if($this->db->affected_rows() === 1)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function update_penyumbang($id_penyumbang)
    {
        $penyumbang = array(
                        'nama_penyumbang'   =>  $this->input->post('nama_penyumbang'),
                        'kota_penyumbang'   =>  $this->input->post('kota_penyumbang'),
                        'jabatan_pekerjaan' =>  $this->input->post('jabatan_pekerjaan'),);

        $this->db->where('id_penyumbang', $id_penyumbang)
                 ->update('TMPenyumbang', $penyumbang);

        if($this->db->affected_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function cekKoleksi($id_koleksi) 
    {
        $query = $this->db->where('id_koleksi', $id_koleksi)
                          ->limit(1)
                          ->get('TMKoleksi');

        if ($query->num_rows() == 1) {            
            return TRUE;
        }
        else {
            return FALSE;
        }
    }

    public function getKoleksi($id_koleksi)
    {
        $this->db->where('TMKoleksi.id_koleksi = ', $id_koleksi);
        $this->db->join('TMKategori', 'TMKoleksi.id_kategori = TMKategori.id_kategori','left');
        $this->db->join('TMAsal', 'TMKoleksi.id_asal = TMAsal.id_asal','left');
        $this->db->join('TMPenyumbang', 'TMKoleksi.id_penyumbang = TMPenyumbang.id_penyumbang','left');
        return $this->db->get("TMKoleksi");
    }

    public function cariKoleksi()
    {
        $this->db->join('TMKategori', 'TMKoleksi.id_kategori = TMKategori.id_kategori','left');
        $this->db->join('TMAsal', 'TMKoleksi.id_asal = TMAsal.id_asal','left');
        $this->db->join('TMTempat', 'TMKoleksi.id_tempat = TMTempat.id_tempat','left');
        return $this->db->get("TMKoleksi");
    }

    public function getIDKoleksi()
    {
        $q = $this->db->query("Select MAX(RIGHT(id_koleksi,6)) as id_max from TMKoleksi");
        $id = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->id_max)+1;
                $id = sprintf("%06s", $tmp);
            }
        }else{
            $id = "000001";
        }
        return "KRP-".$id;
    }

    public function insert_koleksi()
    {

        $id_koleksi         =   $this->input->post('id_koleksi');
        $no_inventaris      =   $this->input->post('no_inventaris');
        $nama_koleksi       =   $this->input->post('nama_koleksi');
        $tanggal_masuk      =   $this->input->post('tanggal_masuk');
        $tempat_pembuatan   =   $this->input->post('tempat_pembuatan');
        $tahun_pembuatan    =   $this->input->post('tahun_pembuatan');
        $sejarah            =   $this->input->post('sejarah');
        $panjang_koleksi    =   $this->input->post('panjang_koleksi');
        $lebar_koleksi      =   $this->input->post('lebar_koleksi');
        $tinggi_koleksi     =   $this->input->post('tinggi_koleksi');
        $gambar_koleksi     =   $this->upload->data('file_name');
        $id_kondisi         =   $this->input->post('id_kondisi');
        $id_asal            =   $this->input->post('id_asal');
        $id_bahan           =   $this->input->post('id_bahan');
        $id_kategori        =   $this->input->post('id_kategori');
        $id_tempat          =   $this->input->post('id_tempat');
        $id_lemari          =   $this->input->post('id_lemari');
        $nama_penyumbang    =   $this->input->post('nama_penyumbang');

        $id_penyumbang      =   '';
        $this->db->select('id_penyumbang');
        $this->db->where('nama_penyumbang', $nama_penyumbang);
        $this->db->limit(1);
        $query = $this->db->get('TMPenyumbang')->row_array();
        $id_penyumbang = $query['id_penyumbang'];

        $sql = "INSERT INTO TMKoleksi (id_koleksi, no_inventaris, nama_koleksi, tanggal_masuk, tanggal_update, tempat_pembuatan, tahun_pembuatan,
                sejarah, panjang_koleksi, lebar_koleksi, tinggi_koleksi, gambar_koleksi, id_kondisi, id_asal, id_bahan, id_kategori,
                id_tempat, id_lemari, id_penyumbang)
        VALUES (".$this->db->escape($id_koleksi).",
                ".$this->db->escape($no_inventaris).",
                ".$this->db->escape($nama_koleksi).",
                ".$this->db->escape($tanggal_masuk).",
                ".$this->db->escape($tanggal_masuk).",
                ".$this->db->escape($tempat_pembuatan).",
                ".$this->db->escape($tahun_pembuatan).",
                ".$this->db->escape($sejarah).",
                ".$this->db->escape($panjang_koleksi).",
                ".$this->db->escape($lebar_koleksi).",
                ".$this->db->escape($tinggi_koleksi).",
                ".$this->db->escape($gambar_koleksi).",
                ".$this->db->escape($id_kondisi).",
                ".$this->db->escape($id_asal).",
                ".$this->db->escape($id_bahan).",
                ".$this->db->escape($id_kategori).",
                ".$this->db->escape($id_tempat).",
                ".$this->db->escape($id_lemari).",
                ".$this->db->escape($id_penyumbang).")";

        $result = $this->db->query($sql);
        if($this->db->affected_rows() === 1)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function update_koleksi($id_koleksi)
    {
        $nama_penyumbang    =   $this->input->post('nama_penyumbang');

        $id_penyumbang  =   '';
        $this->db->select('id_penyumbang');
        $this->db->where('nama_penyumbang', $nama_penyumbang);
        $this->db->limit(1);
        $query = $this->db->get('TMPenyumbang')->row_array();
        $id_penyumbang = $query['id_penyumbang'];

        $koleksi = array(
                    'no_inventaris'     =>  $this->input->post('no_inventaris'),
                    'nama_koleksi'      =>  $this->input->post('nama_koleksi'),
                    //'tanggal_masuk'     =>  date('Y-m-d'),
                    'tanggal_update'    =>  date('Y-m-d'),
                    'tempat_pembuatan'  =>  $this->input->post('tempat_pembuatan'),
                    'tahun_pembuatan'   =>  $this->input->post('tahun_pembuatan'),
                    'sejarah'           =>  $this->input->post('sejarah'),
                    'panjang_koleksi'   =>  $this->input->post('panjang_koleksi'),
                    'lebar_koleksi'     =>  $this->input->post('lebar_koleksi'),
                    'tinggi_koleksi'    =>  $this->input->post('tinggi_koleksi'),
                    'gambar_koleksi'    =>  $this->upload->data('file_name'),
                    'id_kondisi'        =>  $this->input->post('id_kondisi'),
                    'id_asal'           =>  $this->input->post('id_asal'),
                    'id_bahan'          =>  $this->input->post('id_bahan'),
                    'id_kategori'       =>  $this->input->post('id_kategori'),
                    'id_tempat'         =>  $this->input->post('id_tempat'),
                    'id_penyumbang'     =>  $id_penyumbang,);

        $this->db->where('id_koleksi', $id_koleksi)
                 ->update('TMKoleksi', $koleksi);

        if($this->db->affected_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

}