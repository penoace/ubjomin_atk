<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Fungsiku
 *
 * @author wonk4rol
 */
class Fungsi {
    
    public function waktuIndo($string) {
        $waktu = explode("-", $string);
        $tgl = $waktu[2];
        $bln = $waktu[1];
        $thn = $waktu[0];
        $nmBln = array("Error","Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember");
        return $tgl." ".$nmBln[intval($bln)]." ".$thn;
    }

    public function tanggaldmy($string) {
        $waktu = explode("-", $string);
        $tgl = $waktu[2];
        $bln = $waktu[1];
        $thn = $waktu[0];
        return $tgl."-".$bln."-".$thn;
    }
    
}

?>
