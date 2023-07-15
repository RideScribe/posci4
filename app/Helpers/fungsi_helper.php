<?php

const APP_VER = '1.0';
const APP_DEV = 'Mas Roni';
const WA_DEV  = 'https://wa.me/6281295018034';

if (!function_exists('rupiah')) {
    // format rupiah indonesia
    function rupiah($nominal)
    {
        return number_format($nominal, 0, ',', '.');
    }
}

if (!function_exists('buat_password')) {
    /**
     * Otomatis menghash kata sandi
     * @link https://paragonie.com/blog/2015/04/secure-authentication-php-with-long-term-persistence
     * @param string $password
     */
    function buat_password($password = "")
    {
        return password_hash(
            base64_encode(hash('sha384', $password, true)),
            PASSWORD_DEFAULT
        );
    }
}

if (!function_exists('verifikasi_password')) {
    /**
     * Otomatis memverifikasi password yang sudah di hash.
     * @link https://paragonie.com/blog/2015/04/secure-authentication-php-with-long-term-persistence
     *
     * @return bool
     */
    function verifikasi_password($password = "", $hash = "")
    {
        return password_verify(base64_encode(hash('sha384', $password, true)), $hash);
    }
}

if (!function_exists('uri')) {
    /**
     * Mengembalikan segmen url
     */
    function uri($segmen = 0)
    {
        $uri = service('uri');
        if ($segmen == 0) {
            return $uri;
        } else {
            return $uri->getSegment($segmen);
        }
    }
}

if (!function_exists('get_pengaturan')) {
    /**
     * Mengambil data pengaturan website
     */
    function get_pengaturan($kolom = '')
    {
        $model = model('App\Models\PengaturanModel');
        $data = $model->first();
        if ($kolom == '') {
            return $data;
        } else {
            return $data[$kolom];
        }
    }
}

if (!function_exists('get_user')) {
    /**
     * Menampilkan data user yang sedang login
     */
    function get_user($kolom = '')
    {
        $model = model('App\Models\UserModel');
        $data = $model->where('id', session()->get('id'))->get()->getRow();
        if ($kolom == '') {
            return $data;
        } else {
            return $data->{$kolom};
        }
    }
}

if (!function_exists('is_login')) {
    /**
     * Mengecek sudah login atau belum
     * @return bool ke halaman dashboard
     */
    function is_login()
    {
        if (session()->has('login')) {
            return true;
        }
        
        return false;
    }
}

if (!function_exists('get_unit')) {
    /**
     * Mengambil unit barang berdasarkan id
     * @param int $id
     * @return object
     */
    function get_unit($id)
    {
        $model = model('App\Models\UnitModel');
        return $model->where('id', $id)->get()->getRow();
    }
}

if (!function_exists('user_loggedin')) {
    /**
     * Mengecek user yang sedang login
     * @return object
     */
    function user_loggedin()
    {
        $model = model('App\Models\UserModel');
        return $model->where('id', session()->get('id'))->get()->getRow();
    }
}

// get nama from user using id_user
if (!function_exists('get_nama')) {
    function get_nama($id)
    {
        $model = model('App\Models\UserModel');
        $data = $model->where('id', $id)->get()->getRow();
        return $data->nama;
    }
}