<?php

class alertHelper
{

    /**
     * Show sweetAlert2 popup if actions failed
     *
     * @return void
     */
    public static function failedActions($str): void
    {
        die("<script> swal({
            title: 'Gagal',
            text: '$str',
            type: 'error',
            confirmButtonColor: '#d33',
            confirmButtonText: 'OK',
        })</script>");
    }

    /**
     * Show sweetAlert2 popup if actions success
     *
     * @return void
     */
    public static function successActions($str): void
    {
        echo "<script> swal({
            title: 'Berhasil',
            text: '$str',
            type: 'success',
            confirmButtonColor: '#2BC155',
            confirmButtonText: 'OK',
        })</script>";
    }

    /**
     * Show sweetAlert2 popup if actions success and redirect
     *
     * @return void
     */
    public static function successAndRedirect($str, $redirect): void
    {
        echo "<script>
        swal({
            title: 'Berhasil',
            text: '$str',
            type: 'success',
            confirmButtonColor: '#2BC155',
            confirmButtonText: 'OK',
        })
        .then((result) => {
            window.location = '$redirect'
        })</script>";
    }
}
