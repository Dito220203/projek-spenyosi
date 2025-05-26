$(document).ready(function () {
    $('#btn-beribadah').click(function () {
        let agama = $('meta[name="user-agama"]').attr('content');
        if (agama === 'Islam') {
            $('#modalIslam').modal('show');
        } else if (agama === 'Kristen') {
            $('#modalKristen').modal('show');
        }
    });
});
